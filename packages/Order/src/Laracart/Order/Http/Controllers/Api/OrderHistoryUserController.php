<?php

namespace Laracart\Order\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Order\Http\Requests\OrderHistoryRequest;
use Laracart\Order\Interfaces\OrderHistoryRepositoryInterface;
use Laracart\Order\Models\OrderHistory;

/**
 * User API controller class.
 */
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
     * Display a list of order_history.
     *
     * @return json
     */
    public function index(OrderHistoryRequest $request)
    {
        $order_histories  = $this->repository
            ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderHistoryListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $order_histories['code'] = 2000;
        return response()->json($order_histories) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display order_history.
     *
     * @param Request $request
     * @param Model   OrderHistory
     *
     * @return Json
     */
    public function show(OrderHistoryRequest $request, OrderHistory $order_history)
    {

        if ($order_history->exists) {
            $order_history         = $order_history->presenter();
            $order_history['code'] = 2001;
            return response()->json($order_history)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new order_history.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        $order_history         = $order_history->presenter();
        $order_history['code'] = 2002;
        return response()->json($order_history)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new order_history.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(OrderHistoryRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $order_history          = $this->repository->create($attributes);
            $order_history          = $order_history->presenter();
            $order_history['code']  = 2004;

            return response()->json($order_history)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show order_history for editing.
     *
     * @param Request $request
     * @param Model   $order_history
     *
     * @return json
     */
    public function edit(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        if ($order_history->exists) {
            $order_history         = $order_history->presenter();
            $order_history['code'] = 2003;
            return response()-> json($order_history)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the order_history.
     *
     * @param Request $request
     * @param Model   $order_history
     *
     * @return json
     */
    public function update(OrderHistoryRequest $request, OrderHistory $order_history)
    {
        try {

            $attributes = $request->all();

            $order_history->update($attributes);
            $order_history         = $order_history->presenter();
            $order_history['code'] = 2005;

            return response()->json($order_history)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the order_history.
     *
     * @param Request $request
     * @param Model   $order_history
     *
     * @return json
     */
    public function destroy(OrderHistoryRequest $request, OrderHistory $order_history)
    {

        try {

            $t = $order_history->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('order::order_history.name')]),
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
