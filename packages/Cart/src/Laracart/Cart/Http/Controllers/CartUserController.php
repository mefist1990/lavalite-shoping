<?php

namespace Laracart\Cart\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Cart\Http\Requests\CartRequest;
use Laracart\Cart\Interfaces\CartRepositoryInterface;
use Laracart\Cart\Models\Cart;

class CartUserController extends BaseController
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
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Cart\Repositories\Criteria\CartUserCriteria());
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CartRequest $request)
    {
        $carts = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('cart::cart.names'));

        return $this->theme->of('cart::user.cart.index', compact('carts'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Cart $cart
     *
     * @return Response
     */
    public function show(CartRequest $request, Cart $cart)
    {
        Form::populate($cart);

        return $this->theme->of('cart::user.cart.show', compact('cart'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CartRequest $request)
    {

        $cart = $this->repository->newInstance([]);
        Form::populate($cart);

        $this->theme->prependTitle(trans('cart::cart.names'));
        return $this->theme->of('cart::user.cart.create', compact('cart'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CartRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $cart = $this->repository->create($attributes);

            return redirect(trans_url('/user/cart/cart'))
                -> with('message', trans('messages.success.created', ['Module' => trans('cart::cart.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Cart $cart
     *
     * @return Response
     */
    public function edit(CartRequest $request, Cart $cart)
    {

        Form::populate($cart);
        $this->theme->prependTitle(trans('cart::cart.names'));

        return $this->theme->of('cart::user.cart.edit', compact('cart'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Cart $cart
     *
     * @return Response
     */
    public function update(CartRequest $request, Cart $cart)
    {
        try {
            $this->repository->update($request->all(), $cart->getRouteKey());

            return redirect(trans_url('/user/cart/cart'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('cart::cart.name')]))
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
    public function destroy(CartRequest $request, Cart $cart)
    {
        try {
            $this->repository->delete($cart->getRouteKey());
            return redirect(trans_url('/user/cart/cart'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('cart::cart.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
