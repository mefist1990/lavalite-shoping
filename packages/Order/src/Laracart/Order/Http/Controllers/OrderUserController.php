<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Order\Http\Requests\OrderRequest;
use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Laracart\Order\Models\Order;

class OrderUserController extends BaseController
{
    /**
     * Initialize order controller.
     *
     * @param type OrderRepositoryInterface $order
     *
     * @return type
     */
    public function __construct(OrderRepositoryInterface $order)
    {
    dd('rr');
        $this->repository = $order;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Order\Repositories\Criteria\OrderUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(OrderRequest $request)
    {
        $orders = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('order::order.names'));

        return $this->theme->of('order::user.order.index', compact('orders'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Order $order
     *
     * @return Response
     */
    public function show(OrderRequest $request, Order $order)
    {
        Form::populate($order);

        return $this->theme->of('order::user.order.show', compact('order'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(OrderRequest $request)
    {

        $order = $this->repository->newInstance([]);
        Form::populate($order);

        $this->theme->prependTitle(trans('order::order.names'));
        return $this->theme->of('order::user.order.create', compact('order'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(OrderRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $order = $this->repository->create($attributes);

            return redirect(trans_url('/user/order/order'))
                -> with('message', trans('messages.success.created', ['Module' => trans('order::order.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Order $order
     *
     * @return Response
     */
    public function edit(OrderRequest $request, Order $order)
    {

        Form::populate($order);
        $this->theme->prependTitle(trans('order::order.names'));

        return $this->theme->of('order::user.order.edit', compact('order'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Order $order
     *
     * @return Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        try {
            $this->repository->update($request->all(), $order->getRouteKey());

            return redirect(trans_url('/user/order/order'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('order::order.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(OrderRequest $request, Order $order)
    {
        try {
            $this->repository->delete($order->getRouteKey());
            return redirect(trans_url('/user/order/order'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('order::order.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
