<?php

namespace Laracart\Cart\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Cart\Interfaces\CartRepositoryInterface;
use Laracart\Cart\Repositories\Presenter\CartItemTransformer;

/**
 * Pubic API controller class.
 */
class CartPublicController extends BaseController
{
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
            ->setPresenter('\\Laracart\\Cart\\Repositories\\Presenter\\CartListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $carts['code'] = 2000;
        return response()->json($carts)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $cart = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($cart)) {
            $cart         = $this->itemPresenter($module, new CartItemTransformer);
            $cart['code'] = 2001;
            return response()->json($cart)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
