<?php

namespace Laracart\Cart\Http\Controllers\Api;

use App\Http\Controllers\Api\AdminController as BaseController;
use Laracart\Cart\Http\Requests\CartRequest;
use Laracart\Cart\Interfaces\CartRepositoryInterface;
use Laracart\Cart\Models\Cart;

/**
 * Admin API controller class.
 */
class CartAdminController extends BaseController
{
    /**
     * Initialize cart controller.
     *
     * @param type CartRepositoryInterface $cart
     *
     * @return type
     */
    public function __construct(CartRepositoryInterface $cart)
    {
        $this->repository = $cart;
        parent::__construct();
    }

    /**
     * Display a list of cart.
     *
     * @return json
     */
    public function index(CartRequest $request)
    {
        $carts  = $this->repository
            ->setPresenter('\\Laracart\\Cart\\Repositories\\Presenter\\CartListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $carts['code'] = 2000;
        return response()->json($carts) 
                         ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display cart.
     *
     * @param Request $request
     * @param Model   Cart
     *
     * @return Json
     */
    public function show(CartRequest $request, Cart $cart)
    {
        $cart         = $cart->presenter();
        $cart['code'] = 2001;
        return response()->json($cart)
                         ->setStatusCode(200, 'SHOW_SUCCESS');;

    }

    /**
     * Show the form for creating a new cart.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(CartRequest $request, Cart $cart)
    {
        $cart         = $cart->presenter();
        $cart['code'] = 2002;
        return response()->json($cart)
                         ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new cart.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(CartRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $cart          = $this->repository->create($attributes);
            $cart          = $cart->presenter();
            $cart['code']  = 2004;

            return response()->json($cart)
                             ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }
    }

    /**
     * Show cart for editing.
     *
     * @param Request $request
     * @param Model   $cart
     *
     * @return json
     */
    public function edit(CartRequest $request, Cart $cart)
    {
        $cart         = $cart->presenter();
        $cart['code'] = 2003;
        return response()-> json($cart)
                        ->setStatusCode(200, 'EDIT_SUCCESS');;
    }

    /**
     * Update the cart.
     *
     * @param Request $request
     * @param Model   $cart
     *
     * @return json
     */
    public function update(CartRequest $request, Cart $cart)
    {
        try {

            $attributes = $request->all();

            $cart->update($attributes);
            $cart         = $cart->presenter();
            $cart['code'] = 2005;

            return response()->json($cart)
                             ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the cart.
     *
     * @param Request $request
     * @param Model   $cart
     *
     * @return json
     */
    public function destroy(CartRequest $request, Cart $cart)
    {
        try {
            $t = $cart->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('cart::cart.name')]),
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
