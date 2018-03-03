<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Laracart\Coupon\Interfaces\CouponRepositoryInterface;
use Illuminate\Http\Request;
use Cart;

class OrderPublicController extends BaseController
{
    // use OrderWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\Order\Interfaces\OrderRepositoryInterface $order
     *
     * @return type
     */
    public function __construct(OrderRepositoryInterface $order,CouponRepositoryInterface $coupon)
    {
        $this->repository = $order;
        $this->coupon = $coupon;
        parent::__construct();
    }

    /**
     * Show order's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index(Request $request)
    {
        $cart           = Cart::content();
        $subtotal       = floatval(preg_replace( '#[^\d.]#', '', Cart::subtotal()));
        $result         = $subtotal;        
        $coupon_code    = $request->get('coupon');
        if ($coupon_code!='') {
            $coupon         = $this->coupon->scopeQuery(function($query) use ($coupon_code) {
                                return $query->where('code','=', $coupon_code);
                        })->first(['*']);
       
            if($coupon->type=='Percentage'){
                $result     = $subtotal - $subtotal * ( $coupon->discount / 100 ); 
            }else{ 
                $result     = $subtotal - $coupon->discount;
            }
        }
        
       
        $orders = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('order::public.order.index', compact('orders','result','coupon','coupon_code'))->render();
    }

    /**
     * Show order.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $order = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('order::public.order.show', compact('order'))->render();
    }

  public function store(OrderRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $order          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('order::order.name')]),
                'code'     => 204,
                
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * track order
     *
     * @param Request $request
     *
     * @return Response
     */
    public function trackOrder(Request $request)
    {     
        return $this->theme->of('order::public.order.track')->render();
        
    }

    /**
     * track order status
     *
     * @param Request $request
     *
     * @return Response
     */
    public function orderStatus(Request $request)
    {         
        $attributes = $request->all();
        $order= $attributes['order']; 
        $email= $attributes['email'];

        $order = $this->repository
                ->scopeQuery(function ($query) use ($order, $email) {
                    return $query->whereId($order);
                })->first(['*']);

        $status=$order['status']['name'];
        return $status;
    }

}
