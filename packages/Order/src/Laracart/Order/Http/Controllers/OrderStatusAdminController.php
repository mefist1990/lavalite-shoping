<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Order\Http\Requests\OrderStatusRequest;
use Laracart\Order\Interfaces\OrderStatusRepositoryInterface;
use Laracart\Order\Models\OrderStatus;

/**
 * Admin web controller class.
 */
class OrderStatusAdminController extends BaseController
{
    // use OrderStatusWorkflow;
    /**
     * Initialize order_status controller.
     *
     * @param type OrderStatusRepositoryInterface $order_status
     *
     * @return type
     */
    public function __construct(OrderStatusRepositoryInterface $order_status)
    {
        $this->repository = $order_status;
        parent::__construct();
    }

    /**
     * Display a list of order_status.
     *
     * @return Response
     */
    public function index(OrderStatusRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('order::order_status.names').' :: ');
        return $this->theme->of('order::admin.order_status.index')->render();
    }

    /**
     * Display a list of order_status.
     *
     * @return Response
     */
    public function getJson(OrderStatusRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $order_statuses  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderStatusListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $order_statuses['recordsTotal']    = $order_statuses['meta']['pagination']['total'];
        $order_statuses['recordsFiltered'] = $order_statuses['meta']['pagination']['total'];
        $order_statuses['request']         = $request->all();
        return response()->json($order_statuses, 200);

    }

    /**
     * Display order_status.
     *
     * @param Request $request
     * @param Model   $order_status
     *
     * @return Response
     */
    public function show(OrderStatusRequest $request, OrderStatus $order_status)
    {
        if (!$order_status->exists) {
            return response()->view('order::admin.order_status.new', compact('order_status'));
        }

        Form::populate($order_status);
        return response()->view('order::admin.order_status.show', compact('order_status'));
    }

    /**
     * Show the form for creating a new order_status.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(OrderStatusRequest $request)
    {

        $order_status = $this->repository->newInstance([]);

        Form::populate($order_status);

        return response()->view('order::admin.order_status.create', compact('order_status'));

    }

    /**
     * Create new order_status.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(OrderStatusRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $order_status          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('order::order_status.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order/order_status/'.$order_status->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show order_status for editing.
     *
     * @param Request $request
     * @param Model   $order_status
     *
     * @return Response
     */
    public function edit(OrderStatusRequest $request, OrderStatus $order_status)
    {
        Form::populate($order_status);
        return  response()->view('order::admin.order_status.edit', compact('order_status'));
    }

    /**
     * Update the order_status.
     *
     * @param Request $request
     * @param Model   $order_status
     *
     * @return Response
     */
    public function update(OrderStatusRequest $request, OrderStatus $order_status)
    {
        try {

            $attributes = $request->all();

            $order_status->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('order::order_status.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order/order_status/'.$order_status->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order/order_status/'.$order_status->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the order_status.
     *
     * @param Model   $order_status
     *
     * @return Response
     */
    public function destroy(OrderStatusRequest $request, OrderStatus $order_status)
    {

        try {

            $t = $order_status->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('order::order_status.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/order/order_status/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order/order_status/'.$order_status->getRouteKey()),
            ], 400);
        }
    }

}
