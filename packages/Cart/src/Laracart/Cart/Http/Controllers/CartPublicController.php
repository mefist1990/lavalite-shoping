<?php

namespace Laracart\Cart\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Laracart\Cart\Interfaces\CartRepositoryInterface;
use Illuminate\Http\Request;
use Product;
use Cart;
use Session;

class CartPublicController extends BaseController
{
    // use CartWorkflow;

    /**
     * Constructor.
     *
     * @param type \Laracart\Cart\Interfaces\CartRepositoryInterface $cart
     *
     * @return type
     */ 
    public function __construct(CartRepositoryInterface $cart)
    {
        $this->repository = $cart;
        parent::__construct();
    }

    /**
     * Show cart's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $carts = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('cart::public.cart.index', compact('carts'))->render();
    }

    /**
     * Show cart.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $cart = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('cart::public.cart.show', compact('cart'))->render();
    }

    public function addCart(Request $request)
    {  
        $qty        = 1;
        if(!empty($request->get('qty'))){
            $qty    = $request->get('qty');
        }
        $product_id = $request->get('id');
        $products   = Product::productDetails($product_id);
        Cart::add($products->id, $products->name,$qty, $products->price,['image' => $products->images]);  

    }

    public function latest(Request $request)
    {

        return response()->view('cart::public.cart.latest');    
    }

     public function deleteCart(Request $request)
    {
        $row_id=$request->get('id');
        Cart::remove($row_id);       
    }

      public function editCart(Request $request)
    {
        $row_id=$request->get('id');
        $qty=$request->get('qty');
        Cart::update($row_id, $qty);
            
    }

      public function updateCart(Request $request)
    {
        $carts=$request->all();
        foreach($carts['qty'] as $key => $val) {
            Cart::update($key, $val);
        }
        
        return 'true';
    }

    public function clear()
    {

        Cart::destroy();
        return 'true';
    }


}
