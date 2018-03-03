<?php

namespace Laracart\Order\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Order\Http\Requests\OrderRequest;
use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Laracart\Order\Models\Order;

/**
 * User API controller class.
 */
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
    
        $this->repository = $order;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Order\Repositories\Criteria\OrderUserCriteria());
        parent::__construct();
    }

    /**
     * Display a list of order.
     *
     * @return json
     */
    public function index(OrderRequest $request)
    {
        $orders  = $this->repository
            ->setPresenter('\\Laracart\\Order\\Repositories\\Presenter\\OrderListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $orders['code'] = 2000;
        return response()->json($orders) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display order.
     *
     * @param Request $request
     * @param Model   Order
     *
     * @return Json
     */
    public function show(OrderRequest $request, Order $order)
    {

        if ($order->exists) {
            $order         = $order->presenter();
            $order['code'] = 2001;
            return response()->json($order)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new order.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(OrderRequest $request, Order $order)
    {
        $order         = $order->presenter();
        $order['code'] = 2002;
        return response()->json($order)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new order.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(OrderRequest $request)
    {
     
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $order          = $this->repository->create($attributes);
            $order          = $order->presenter();
            $order['code']  = 2004;
            $temp = [];
            $products = $request->input('products');
            $product_array = json_decode($products,true);
            foreach ($product_array as $key => $value) {
                // $product_array[$key] = hashids_decode($key);
                $temp[hashids_decode($key)]['quantity'] = $value ;

                # code...
            }
           
            // dd($product_array);
            // dd($temp);
            $order_id=$order['data']['id'];
            $order  = $this->repository
            ->scopeQuery(function($query) use($order_id){
                return $query->whereId($order_id);
            })->first();
            
                $order->products()->sync($temp);               
            // $order->products()->sync(['14','18','18']);
            return response()->json($order)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show order for editing.
     *
     * @param Request $request
     * @param Model   $order
     *
     * @return json
     */
    public function edit(OrderRequest $request, Order $order)
    {
        if ($order->exists) {
            $order         = $order->presenter();
            $order['code'] = 2003;
            return response()-> json($order)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the order.
     *
     * @param Request $request
     * @param Model   $order
     *
     * @return json
     */
    public function update(OrderRequest $request, Order $order)
    {
        try {

            $attributes = $request->all();

            $order->update($attributes);
            $order         = $order->presenter();
            $order['code'] = 2005;

            return response()->json($order)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the order.
     *
     * @param Request $request
     * @param Model   $order
     *
     * @return json
     */
    public function destroy(OrderRequest $request, Order $order)
    {

        try {

            $t = $order->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('order::order.name')]),
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
