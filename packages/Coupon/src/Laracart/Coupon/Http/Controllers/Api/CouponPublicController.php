<?php

namespace Laracart\Coupon\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Laracart\Coupon\Interfaces\CouponRepositoryInterface;
use Laracart\Coupon\Repositories\Presenter\CouponItemTransformer;

/**
 * Pubic API controller class.
 */
class CouponPublicController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Laracart\Coupon\Interfaces\CouponRepositoryInterface $coupon
     *
     * @return type
     */
    public function __construct(CouponRepositoryInterface $coupon)
    {
        $this->repository = $coupon;
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
            ->setPresenter('\\Laracart\\Coupon\\Repositories\\Presenter\\CouponListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $coupons['code'] = 2000;
        return response()->json($coupons)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $coupon = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($coupon)) {
            $coupon         = $this->itemPresenter($module, new CouponItemTransformer);
            $coupon['code'] = 2001;
            return response()->json($coupon)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
