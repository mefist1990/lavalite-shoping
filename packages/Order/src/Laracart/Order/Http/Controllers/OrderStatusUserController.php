<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Order\Http\Requests\OrderStatusRequest;
use Laracart\Order\Interfaces\OrderStatusRepositoryInterface;
use Laracart\Order\Models\OrderStatus;

class OrderStatusUserController extends BaseController
{
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
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Order\Repositories\Criteria\OrderStatusUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(OrderStatusRequest $request)
    {
        $order_statuses = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('order::order_status.names'));

        return $this->theme->of('order::user.order_status.index', compact('order_statuses'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param OrderStatus $order_status
     *
     * @return Response
     */
    public function show(OrderStatusRequest $request, OrderStatus $order_status)
    {
        Form::populate($order_status);

        return $this->theme->of('order::user.order_status.show', compact('order_status'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(OrderStatusRequest $request)
    {

        $order_status = $this->repository->newInstance([]);
        Form::populate($order_status);

        $this->theme->prependTitle(trans('order::order_status.names'));
        return $this->theme->of('order::user.order_status.create', compact('order_status'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(OrderStatusRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $order_status = $this->repository->create($attributes);

            return redirect(trans_url('/user/order/order_status'))
                -> with('message', trans('messages.success.created', ['Module' => trans('order::order_status.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param OrderStatus $order_status
     *
     * @return Response
     */
    public function edit(OrderStatusRequest $request, OrderStatus $order_status)
    {

        Form::populate($order_status);
        $this->theme->prependTitle(trans('order::order_status.names'));

        return $this->theme->of('order::user.order_status.edit', compact('order_status'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param OrderStatus $order_status
     *
     * @return Response
     */
    public function update(OrderStatusRequest $request, OrderStatus $order_status)
    {
        try {
            $this->repository->update($request->all(), $order_status->getRouteKey());

            return redirect(trans_url('/user/order/order_status'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('order::order_status.name')]))
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
    public function destroy(OrderStatusRequest $request, OrderStatus $order_status)
    {
        try {
            $this->repository->delete($order_status->getRouteKey());
            return redirect(trans_url('/user/order/order_status'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('order::order_status.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
