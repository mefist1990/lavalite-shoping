<?php

namespace Laracart\Order\Http\Controllers;

use App\Http\Controllers\ClientController as BaseController;
use Form;
use Laracart\Order\Http\Requests\OrderRequest;
use Laracart\Order\Interfaces\OrderRepositoryInterface;
use Laracart\Coupon\Interfaces\CouponRepositoryInterface;
use Litepie\User\Interfaces\ClientRepositoryInterface;
use Laracart\Order\Models\Order;
use Cart;
use Omnipay\Omnipay;
use Session;
class OrderClientController extends BaseController
{
    /**
     * Initialize order controller.
     *
     * @param type OrderRepositoryInterface $order
     *
     * @return type
     */
    public function __construct(OrderRepositoryInterface $order,ClientRepositoryInterface $client,CouponRepositoryInterface $coupon)
    {
        $this->repository = $order;
        $this->coupon = $coupon;
        $this->client = $client;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Order\Repositories\Criteria\OrderClientCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(OrderRequest $request)
    {
        $this->theme->asset()->add('select2-css', 'themes/user/assets/packages/select2/css/select2.min.css');
        $this->theme->asset()->container('footer')->add('select2-js', 'themes/user/assets/packages/select2/js/select2.full.js');

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
        try{
            $attributes = $request->all();
            $temp_coupon = $attributes['temp_coupon'];

            if($attributes['billingaddress']=='register')
            {
                $attributes['payment_address'] = implode(",", $attributes['payment']);
            }
            else
            {                
                $attributes['payment_address']=$attributes['address_id'];
            }

            if($attributes['shippingaddress']=='register')
            {
                $attributes['shipping_address'] = implode(",", $attributes['shipping']);
            }
            else
            {
                $attributes['shipping_address']=$attributes['shippingaddress_id'];
            }

            if($attributes['temp_coupon']=='') 
            {
                $attributes['subtotal']=Cart::total();
                $attributes['total']=Cart::subtotal();
            }
            else
            {
                $coupon = $this->coupon->scopeQuery(function($query) use ($temp_coupon) {
                                return $query->where('code','=', $temp_coupon);
                        })->first(['*']);

                $attributes['coupon_id'] = $coupon->id;
                $attributes['subtotal']  = Cart::total();
                $subtotal = floatval(preg_replace( '#[^\d.]#', '', Cart::subtotal()));

                if($coupon->type=='Percentage'){
                    $attributes['total']     = number_format(($subtotal - $subtotal * ( $coupon->discount / 100 )),2); 
                }else{ 
                    $attributes['total']     = number_format($subtotal - $coupon->discount,2);
                }

            }


            $attributes['user_id'] = user_id();
            $attributes['order_status_id'] = '1'; 
         
            $order = $this->repository->create($attributes);


            foreach (Cart::content() as $key=>$row) {
                $order->products()->attach($row->id,['quantity' => $row->qty]);               
            }

            Cart::destroy();
            return redirect(trans_url('/client/order/order'))
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
            $attributes=$request->all();
            $attributes['status'] = 'Pending';
            $this->repository->update($attributes, $order->getRouteKey());

            return redirect(trans_url('/client/order/order'))
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
            $t = $order->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('order::order.name')]),
                'code'     => 202,
                'redirect' => trans_url('/client/order/order/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/client/order/order/'.$order->getRouteKey()),
            ], 400);
        }
    }
    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Order $order
     *
     * @return Response
     */
    public function favourite(Order $order)
    {
        try {  
            $order->favourite()->attach(user_id('client.web'));
            return response([ 'name' => $order->name]);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function myFavourite(OrderRequest $request)
    {       
       
        $orders =  $this->client->order();
        
        $this->theme->prependTitle(trans('order::order.names'));

        return $this->theme->of('order::user.order.favourite', compact('orders'))->render();
    }

    public function payment(OrderRequest $request)
    {
        $attributes = $request->all();
        $temp_coupon = $attributes['temp_coupon']; 
        if($attributes['payment_method']=='Paypal')
        {
            $items = array();
            foreach(Cart::content() as $item)
            {
                $items[] = array('name' => $item->name, 'quantity' => $item->qty, 'price' => $item->price);
            }

            if($attributes['temp_coupon']=='') 
            {
                $params = array(
                'cancelUrl'=> trans_url('/carts'),
                'returnUrl'=> trans_url('client/order/payment/success'),
                'amount'   => str_replace(',','',Cart::total()),
                'currency' => 'USD',
                'data' => $attributes
                );
            }
            else
            {
                $coupon = $this->coupon->scopeQuery(function($query) use ($temp_coupon) {
                                return $query->where('code','=', $temp_coupon);
                        })->first(['*']);

                $attributes['coupon_id'] = $coupon->id;
                $attributes['subtotal']  = Cart::total();
                $subtotal = floatval(preg_replace( '#[^\d.]#', '', Cart::subtotal()));

                if($coupon->type=='Percentage'){
                    $attributes['total']     = number_format(($subtotal - $subtotal * ( $coupon->discount / 100 )),2); 
                }else{ 
                    $attributes['total']     = number_format($subtotal - $coupon->discount,2);
                }

                $params = array(
                'cancelUrl'=> trans_url('/oders'),
                'returnUrl'=> trans_url('client/order/payment/success'),
                'amount'   => str_replace(',','',$attributes['total'] ),
                'currency' => 'USD',
                'data' => $attributes
                );

            }
            
            Session::put('params', $params);
            Session::save();        

            $gateway = Omnipay::create('PayPal_Express');
     
            $gateway->setUsername('aswathi-facilitator_api1.renfos.com');
            $gateway->setPassword('MEWMDA98XBY8XK36');
            $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31Ap9nNYJ7nTb7Hg6BcTCOC3C3.z4Y');
            $gateway->setTestMode(true);

            $response = $gateway->purchase($params)->setItems($items)->send();

            if ($response->isSuccessful()) {

                // payment was successful: update database
                print_r($response);
            } elseif ($response->isRedirect()) {

                // redirect to offsite payment gateway
                $response->redirect();
            } else {
                
                // payment failed: display message to customer
                echo $response->getMessage();
            }
        }
        else{
            return $this->store($request);
        }
    }

    public function getPayment(OrderRequest $request)
    {
        $gateway = Omnipay::create('PayPal_Express');
        $gateway->setUsername('aswathi-facilitator_api1.renfos.com');
        $gateway->setPassword('MEWMDA98XBY8XK36');
        $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31Ap9nNYJ7nTb7Hg6BcTCOC3C3.z4Y');
        $gateway->setTestMode(true);

        $params     = Session::get('params');
        $attributes = $params['data']; 

        $response = $gateway->completePurchase($params)->send();
        $paypalResponse = $response->getData();// this is the raw response object

        if(isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success') {
            return $this->storePayment($attributes);
        } else {
            echo $response->getMessage();
            //Failed transaction

        }
    }

    public function storePayment($attributes)
    {        
        try {            
            $temp_coupon = $attributes['temp_coupon'];

            if($attributes['billingaddress']=='register')
            {
                $attributes['payment_address'] = implode(",", $attributes['payment']);
            }
            else
            {                
                $attributes['payment_address']=$attributes['address_id'];
            }

            if($attributes['shippingaddress']=='register')
            {
                $attributes['shipping_address'] = implode(",", $attributes['shipping']);
            }
            else
            {
                $attributes['shipping_address']=$attributes['shippingaddress_id'];
            }

            if($attributes['temp_coupon']=='') 
            {
                $attributes['subtotal']=Cart::total();
                $attributes['total']=Cart::subtotal();
            }
            else
            {
                $coupon = $this->coupon->scopeQuery(function($query) use ($temp_coupon) {
                                return $query->where('code','=', $temp_coupon);
                        })->first(['*']);

                $attributes['coupon_id'] = $coupon->id;
                $attributes['subtotal']  = Cart::total();
                $subtotal = floatval(preg_replace( '#[^\d.]#', '', Cart::subtotal()));

                if($coupon->type=='Percentage'){
                    $attributes['total']     = number_format(($subtotal - $subtotal * ( $coupon->discount / 100 )),2); 
                }else{ 
                    $attributes['total']     = number_format($subtotal - $coupon->discount,2);
                }

            }


            $attributes['user_id'] = user_id();
            $attributes['order_status_id'] = '1';
            $attributes['payment_status'] = 'Success';  
         
            $order = $this->repository->create($attributes);


            foreach (Cart::content() as $key=>$row) {
                $order->products()->attach($row->id,['quantity' => $row->qty]);               
            }

            Cart::destroy();
            return redirect(trans_url('/client/order/order'))
                -> with('message', trans('messages.success.created', ['Module' => trans('order::order.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }
}