<?php

namespace Laracart\Order\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Order\Http\Requests\OrderStatusRequest;
use Laracart\Order\Interfaces\OrderStatusRepositoryInterface;
use Laracart\Order\Models\OrderStatus;

/**
 * User API controller class.
 */
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
     * Display a list of order_status.
     *
     * @return json
     */
    public function index(OrderStatusRequest $request)
    {
        $order_statuses  = $this->repository
            ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderStatusListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $order_statuses['code'] = 2000;
        return response()->json($order_statuses) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display order_status.
     *
     * @param Request $request
     * @param Model   OrderStatus
     *
     * @return Json
     */
    public function show(OrderStatusRequest $request, OrderStatus $order_status)
    {

        if ($order_status->exists) {
            $order_status         = $order_status->presenter();
            $order_status['code'] = 2001;
            return response()->json($order_status)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new order_status.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(OrderStatusRequest $request, OrderStatus $order_status)
    {
        $order_status         = $order_status->presenter();
        $order_status['code'] = 2002;
        return response()->json($order_status)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new order_status.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(OrderStatusRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $order_status          = $this->repository->create($attributes);
            $order_status          = $order_status->presenter();
            $order_status['code']  = 2004;

            return response()->json($order_status)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show order_status for editing.
     *
     * @param Request $request
     * @param Model   $order_status
     *
     * @return json
     */
    public function edit(OrderStatusRequest $request, OrderStatus $order_status)
    {
        if ($order_status->exists) {
            $order_status         = $order_status->presenter();
            $order_status['code'] = 2003;
            return response()-> json($order_status)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the order_status.
     *
     * @param Request $request
     * @param Model   $order_status
     *
     * @return json
     */
    public function update(OrderStatusRequest $request, OrderStatus $order_status)
    {
        try {

            $attributes = $request->all();

            $order_status->update($attributes);
            $order_status         = $order_status->presenter();
            $order_status['code'] = 2005;

            return response()->json($order_status)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the order_status.
     *
     * @param Request $request
     * @param Model   $order_status
     *
     * @return json
     */
    public function destroy(OrderStatusRequest $request, OrderStatus $order_status)
    {

        try {

            $t = $order_status->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('order::order_status.name')]),
                'code'     => 2006
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
