<?php

namespace Laracart\Coupon\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Laracart\Coupon\Http\Requests\CouponRequest;
use Laracart\Coupon\Interfaces\CouponRepositoryInterface;
use Laracart\Coupon\Models\Coupon;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CouponRequest $request)
    {
        $coupons = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('coupon::coupon.names'));

        return $this->theme->of('coupon::user.coupon.index', compact('coupons'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Coupon $coupon
     *
     * @return Response
     */
    public function show(CouponRequest $request, Coupon $coupon)
    {
        Form::populate($coupon);

        return $this->theme->of('coupon::user.coupon.show', compact('coupon'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CouponRequest $request)
    {

        $coupon = $this->repository->newInstance([]);
        Form::populate($coupon);

        $this->theme->prependTitle(trans('coupon::coupon.names'));
        return $this->theme->of('coupon::user.coupon.create', compact('coupon'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CouponRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $coupon = $this->repository->create($attributes);

            return redirect(trans_url('/user/coupon/coupon'))
                -> with('message', trans('messages.success.created', ['Module' => trans('coupon::coupon.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Coupon $coupon
     *
     * @return Response
     */
    public function edit(CouponRequest $request, Coupon $coupon)
    {

        Form::populate($coupon);
        $this->theme->prependTitle(trans('coupon::coupon.names'));

        return $this->theme->of('coupon::user.coupon.edit', compact('coupon'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Coupon $coupon
     *
     * @return Response
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        try {
            $this->repository->update($request->all(), $coupon->getRouteKey());

            return redirect(trans_url('/user/coupon/coupon'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('coupon::coupon.name')]))
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
    public function destroy(CouponRequest $request, Coupon $coupon)
    {
        try {
            $this->repository->delete($coupon->getRouteKey());
            return redirect(trans_url('/user/coupon/coupon'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('coupon::coupon.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
