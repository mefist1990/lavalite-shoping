<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Order\Http\Requests\OrderHistoryRequest;
use Laracart\Order\Interfaces\OrderHistoryRepositoryInterface;
use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Laracart\Order\Models\OrderHistory;
use Crypt;

/**
 * Admin web controller class.
 */
class OrderHistoryAdminController extends BaseController
{
    // use OrderHistoryWorkflow;
    /**
     * Initialize order_history controller.
     *
     * @param type OrderHistoryRepositoryInterface $order_history
     *
     * @return type
     */
    public function __construct(OrderHistoryRepositoryInterface $order_history, OrderRepositoryInterface $order)
    {
        $this->repository = $order_history;
        $this->order = $order;
        parent::__construct();
    }

    /**
     * Display a list of order_history.
     *
     * @return Response
     */
    public function index(OrderHistoryRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('order::order_history.names').' :: ');
        return $this->theme->of('order::admin.order_history.index')->render();
    }

    /**
     * Display a list of order_history.
     *
     * @return Response
     */
    public function getJson(OrderHistoryRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $order_histories  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderHistoryListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $order_histories['recordsTotal']    = $order_histories['meta']['pagination']['total'];
        $order_histories['recordsFiltered'] = $order_histories['meta']['pagination']['total'];
        $order_histories['request']         = $request->all();
        return response()->json($order_histories, 200);

    }

    /**
     * Display order_history.
     *
     * @param Request $request
     * @param Model   $order_history
     *
     * @return Response
     */
    public function show(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        if (!$order_history->exists) {
            return response()->view('order::admin.order_history.new', compact('order_history'));
        }

        Form::populate($order_history);
        return response()->view('order::admin.order_history.show', compact('order_history'));
    }

    /**
     * Show the form for creating a new order_history.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(OrderHistoryRequest $request)
    {

        $order_history = $this->repository->newInstance([]);

        Form::populate($order_history);

        return response()->view('order::admin.order_history.create', compact('order_history'));

    }

    /**
     * Create new order_history.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(OrderHistoryRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $order_history          = $this->repository->create($attributes);
            $this->order->updateStatus($attributes['order_status_id'], $order_history->order_id);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('order::order_history.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order/order_history/'.$order_history->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show order_history for editing.
     *
     * @param Request $request
     * @param Model   $order_history
     *
     * @return Response
     */
    public function edit(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        Form::populate($order_history);
        return  response()->view('order::admin.order_history.edit', compact('order_history'));
    }

    /**
     * Update the order_history.
     *
     * @param Request $request
     * @param Model   $order_history
     *
     * @return Response
     */
    public function update(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        try {

            $attributes = $request->all();

            $order_history->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('order::order_history.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order/order_history/'.$order_history->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order/order_history/'.$order_history->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the order_history.
     *
     * @param Model   $order_history
     *
     * @return Response
     */
    public function destroy(OrderHistoryRequest $request, OrderHistory $order_history)
    {

        try {

            $t = $order_history->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('order::order_history.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/order/order_history/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order/order_history/'.$order_history->getRouteKey()),
            ], 400);
        }
    }

    /**
     * Returns all orderhistories.
     *
     * @param array $filter
     *
     * @return array
     */

     public function historyList($order)
    {
        $order_id = Crypt::decrypt($order);
        
            $order_history = $this->repository            
                      ->scopeQuery(function ($query) use($order_id){
                         return $query->orderBy('id', 'DESC')
                         ->where('order_id','=',$order_id);
                      })->all();
                       
        return view('order::admin.order_history.list', compact('order_history','order_id'));
    }

}
