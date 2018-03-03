<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Order\Http\Requests\OrderRequest;
use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Laracart\Order\Models\Order;

/**
 * Admin web controller class.
 */
class OrderAdminController extends BaseController
{
    // use OrderWorkflow;
    /**
     * Initialize order controller.
     *
     * @param type OrderRepositoryInterface $order
     *
     * @return type
     */
    public function __construct(OrderRepositoryInterface $order)
    {
        $this->repository = $order;
        parent::__construct();
    }

    /**
     * Display a list of order.
     *
     * @return Response
     */
    public function index(OrderRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('order::order.names').' :: ');
        return $this->theme->of('order::admin.order.index')->render();
    }

    /**
     * Display a list of order.
     *
     * @return Response
     */
    public function getJson(OrderRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $orders  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $orders['recordsTotal']    = $orders['meta']['pagination']['total'];
        $orders['recordsFiltered'] = $orders['meta']['pagination']['total'];
        $orders['request']         = $request->all();
        return response()->json($orders, 200);

    }

    /**
     * Display order.
     *
     * @param Request $request
     * @param Model   $order
     *
     * @return Response
     */
    public function show(OrderRequest $request, Order $order)
    {
        if (!$order->exists) {
            return response()->view('order::admin.order.new', compact('order'));
        }

        Form::populate($order);
        return response()->view('order::admin.order.show', compact('order'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(OrderRequest $request)
    {

        $order = $this->repository->newInstance([]);

        Form::populate($order);

        return response()->view('order::admin.order.create', compact('order'));

    }

    /**
     * Create new order.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(OrderRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $order          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('order::order.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order/order/'.$order->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show order for editing.
     *
     * @param Request $request
     * @param Model   $order
     *
     * @return Response
     */
    public function edit(OrderRequest $request, Order $order)
    {
        Form::populate($order);
        return  response()->view('order::admin.order.edit', compact('order'));
    }

    /**
     * Update the order.
     *
     * @param Request $request
     * @param Model   $order
     *
     * @return Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        try {

            $attributes = $request->all();

            $order->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('order::order.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order/order/'.$order->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order/order/'.$order->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the order.
     *
     * @param Model   $order
     *
     * @return Response
     */
    public function destroy(OrderRequest $request, Order $order)
    {

        try {

            $t = $order->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('order::order.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/order/order/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order/order/'.$order->getRouteKey()),
            ], 400);
        }
    }

}
