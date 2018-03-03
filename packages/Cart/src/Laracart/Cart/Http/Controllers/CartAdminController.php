<?php

namespace Laracart\Cart\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Cart\Http\Requests\CartRequest;
use Laracart\Cart\Interfaces\CartRepositoryInterface;
use Laracart\Cart\Models\Cart;

/**
 * Admin web controller class.
 */
class CartAdminController extends BaseController
{
    // use CartWorkflow;
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
     * @return Response
     */
    public function index(CartRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('cart::cart.names').' :: ');
        return $this->theme->of('cart::admin.cart.index')->render();
    }

    /**
     * Display a list of cart.
     *
     * @return Response
     */
    public function getJson(CartRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $carts  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Cart\\Repositories\\Presenter\\CartListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $carts['recordsTotal']    = $carts['meta']['pagination']['total'];
        $carts['recordsFiltered'] = $carts['meta']['pagination']['total'];
        $carts['request']         = $request->all();
        return response()->json($carts, 200);

    }

    /**
     * Display cart.
     *
     * @param Request $request
     * @param Model   $cart
     *
     * @return Response
     */
    public function show(CartRequest $request, Cart $cart)
    {
        if (!$cart->exists) {
            return response()->view('cart::admin.cart.new', compact('cart'));
        }

        Form::populate($cart);
        return response()->view('cart::admin.cart.show', compact('cart'));
    }

    /**
     * Show the form for creating a new cart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CartRequest $request)
    {

        $cart = $this->repository->newInstance([]);

        Form::populate($cart);

        return response()->view('cart::admin.cart.create', compact('cart'));

    }

    /**
     * Create new cart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CartRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $cart          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('cart::cart.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/cart/cart/'.$cart->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show cart for editing.
     *
     * @param Request $request
     * @param Model   $cart
     *
     * @return Response
     */
    public function edit(CartRequest $request, Cart $cart)
    {
        Form::populate($cart);
        return  response()->view('cart::admin.cart.edit', compact('cart'));
    }

    /**
     * Update the cart.
     *
     * @param Request $request
     * @param Model   $cart
     *
     * @return Response
     */
    public function update(CartRequest $request, Cart $cart)
    {
        try {

            $attributes = $request->all();

            $cart->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('cart::cart.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/cart/cart/'.$cart->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/cart/cart/'.$cart->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the cart.
     *
     * @param Model   $cart
     *
     * @return Response
     */
    public function destroy(CartRequest $request, Cart $cart)
    {

        try {

            $t = $cart->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('cart::cart.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/cart/cart/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/cart/cart/'.$cart->getRouteKey()),
            ], 400);
        }
    }

}
