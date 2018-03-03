<?php

namespace Laracart\Coupon\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Coupon\Interfaces\CouponRepositoryInterface;
use Illuminate\Http\Request;
use Cart;
use Laracart\Product\Interfaces\ProductRepositoryInterface;
use Laracart\Order\Interfaces\OrderRepositoryInterface;

class CouponPublicController extends BaseController
{
    // use CouponWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\Coupon\Interfaces\CouponRepositoryInterface $coupon
     *
     * @return type
     */
    public function __construct(CouponRepositoryInterface $coupon,ProductRepositoryInterface $product,OrderRepositoryInterface $order)
    {
        $this->repository = $coupon;
        $this->product = $product;
        $this->order = $order;
        parent::__construct();
    }

    /**
     * Show coupon's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $coupons = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('coupon::public.coupon.index', compact('coupons'))->render();
    }

    /**
     * Show coupon.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $coupon = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('coupon::public.coupon.show', compact('coupon'))->render();
    }

    protected function checkCoupon(Request $request)
    {

       
        $coupon_code    = $request->get('coupon'); 
        $total          = floatval(preg_replace( '#[^\d.]#', '', Cart::total()));
        $subtotal       = floatval(preg_replace( '#[^\d.]#', '', Cart::subtotal()));
        $coupon         = $this->repository->scopeQuery(function($query) use ($coupon_code,$total) {
                                return $query->where('code','=', $coupon_code)
                                       ->where('start_date', '<=', date('Y-m-d')) 
                                       ->where('end_date', '>=', date('Y-m-d'))
                                       ->where('status', '=', 'Enabled')
                                       ->where('total', '<=', $total)
                                       ->where(function($query){
                                            if(!user('client.web'))
                                                $query->where('logged', '<>', 'Yes');
                                       });
        })->first(['*']);

        if(empty($coupon)){
            return 0; 
        }

        if(!empty($coupon)){

            $coupon_id=$coupon->id;
            $order    =   $this->order->scopeQuery(function($query) use ($coupon_id) {
                                        return $query->where('coupon_id','=', $coupon_id);
                                    })->count();

            if(!empty($coupon->uses_total))
            {
                if($order>=$coupon->uses_total)
                {
                    return 0;
                }
            }

            if(user('client.web'))
            {
                $customer= user('client.web')->id;
                $limit    =   $this->order->scopeQuery(function($query) use ($coupon_id,$customer) {
                                        return $query->where('coupon_id','=', $coupon_id)
                                                     ->where('user_id','=', $customer);
                                    })->count();
                if(!empty($coupon->uses_customer))
                {
                    if($limit>=$coupon->uses_customer)
                    {
                        return 0;
                    }
                }
            }

            $cart   = Cart::content();
            if($coupon->type=='Percentage'){
                $res     = $subtotal - $subtotal * ( $coupon->discount / 100 ); 
                $result  = number_format($res, 2);
            }else{ 
                $res     = $subtotal - $coupon->discount;
                $result  = number_format($res, 2);
            }

            if($coupon->products->count() > 0){
                foreach($cart as $key => $row) { 
                    if($coupon->products->contains($row->id)){
                        return $result;
                    }
                }
                
                return 0;
            }

            if($coupon->categories->count() > 0){
                foreach($cart as $key => $row) { 
                    $product    =   $this->product->scopeQuery(function($query) use ($row) {
                                        return $query->where('id','=', $row->id);
                                    })->first(['*']);
                    foreach($product->categories as $ke => $value) {
                        if($coupon->categories->contains($value->id)){
                            return $result;
                        }
                    }
                }

                return 0;
            }

            return $result;
        }
    }
}