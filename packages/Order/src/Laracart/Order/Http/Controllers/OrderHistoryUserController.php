<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Order\Http\Requests\OrderHistoryRequest;
use Laracart\Order\Interfaces\OrderHistoryRepositoryInterface;
use Laracart\Order\Models\OrderHistory;

class OrderHistoryUserController extends BaseController
{
    /**
     * Initialize order_history controller.
     *
     * @param type OrderHistoryRepositoryInterface $order_history
     *
     * @return type
     */
    public function __construct(OrderHistoryRepositoryInterface $order_history)
    {
        $this->repository = $order_history;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Order\Repositories\Criteria\OrderHistoryUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(OrderHistoryRequest $request)
    {
        $order_histories = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('order::order_history.names'));

        return $this->theme->of('order::user.order_history.index', compact('order_histories'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param OrderHistory $order_history
     *
     * @return Response
     */
    public function show(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        Form::populate($order_history);

        return $this->theme->of('order::user.order_history.show', compact('order_history'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(OrderHistoryRequest $request)
    {

        $order_history = $this->repository->newInstance([]);
        Form::populate($order_history);

        $this->theme->prependTitle(trans('order::order_history.names'));
        return $this->theme->of('order::user.order_history.create', compact('order_history'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(OrderHistoryRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $order_history = $this->repository->create($attributes);

            return redirect(trans_url('/user/order/order_history'))
                -> with('message', trans('messages.success.created', ['Module' => trans('order::order_history.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param OrderHistory $order_history
     *
     * @return Response
     */
    public function edit(OrderHistoryRequest $request, OrderHistory $order_history)
    {

        Form::populate($order_history);
        $this->theme->prependTitle(trans('order::order_history.names'));

        return $this->theme->of('order::user.order_history.edit', compact('order_history'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param OrderHistory $order_history
     *
     * @return Response
     */
    public function update(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        try {
            $this->repository->update($request->all(), $order_history->getRouteKey());

            return redirect(trans_url('/user/order/order_history'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('order::order_history.name')]))
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
    public function destroy(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        try {
            $this->repository->delete($order_history->getRouteKey());
            return redirect(trans_url('/user/order/order_history'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('order::order_history.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
