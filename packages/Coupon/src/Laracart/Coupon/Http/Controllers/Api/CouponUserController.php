<?php

namespace Laracart\Coupon\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Laracart\Coupon\Http\Requests\CouponRequest;
use Laracart\Coupon\Interfaces\CouponRepositoryInterface;
use Laracart\Coupon\Models\Coupon;

/**
 * User API controller class.
 */
class CouponUserController extends BaseController
{
    /**
     * Initialize coupon controller.
     *
     * @param type CouponRepositoryInterface $coupon
     *
     * @return type
     */
    public function __construct(CouponRepositoryInterface $coupon)
    {
        $this->repository = $coupon;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Laracart\Coupon\Repositories\Criteria\CouponUserCriteria());
        parent::__construct();
    }

    /**
     * Display a list of coupon.
     *
     * @return json
     */
    public function index(CouponRequest $request)
    {
        $coupons  = $this->repository
            ->setPresenter('\\Laracart\\Coupon\\Repositories\\Presenter\\CouponListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $coupons['code'] = 2000;
        return response()->json($coupons) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display coupon.
     *
     * @param Request $request
     * @param Model   Coupon
     *
     * @return Json
     */
    public function show(CouponRequest $request, Coupon $coupon)
    {

        if ($coupon->exists) {
            $coupon         = $coupon->presenter();
            $coupon['code'] = 2001;
            return response()->json($coupon)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new coupon.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(CouponRequest $request, Coupon $coupon)
    {
        $coupon         = $coupon->presenter();
        $coupon['code'] = 2002;
        return response()->json($coupon)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new coupon.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(CouponRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $coupon          = $this->repository->create($attributes);
            $coupon          = $coupon->presenter();
            $coupon['code']  = 2004;

            return response()->json($coupon)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show coupon for editing.
     *
     * @param Request $request
     * @param Model   $coupon
     *
     * @return json
     */
    public function edit(CouponRequest $request, Coupon $coupon)
    {
        if ($coupon->exists) {
            $coupon         = $coupon->presenter();
            $coupon['code'] = 2003;
            return response()-> json($coupon)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the coupon.
     *
     * @param Request $request
     * @param Model   $coupon
     *
     * @return json
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        try {

            $attributes = $request->all();

            $coupon->update($attributes);
            $coupon         = $coupon->presenter();
            $coupon['code'] = 2005;

            return response()->json($coupon)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the coupon.
     *
     * @param Request $request
     * @param Model   $coupon
     *
     * @return json
     */
    public function destroy(CouponRequest $request, Coupon $coupon)
    {

        try {

            $t = $coupon->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('coupon::coupon.name')]),
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
