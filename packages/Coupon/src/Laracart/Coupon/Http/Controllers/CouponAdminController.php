<?php

namespace Laracart\Coupon\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Laracart\Coupon\Http\Requests\CouponRequest;
use Laracart\Coupon\Interfaces\CouponRepositoryInterface;
use Laracart\Coupon\Models\Coupon;

/**
 * Admin web controller class.
 */
class CouponAdminController extends BaseController
{
    // use CouponWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of coupon.
     *
     * @return Response
     */
    public function index(CouponRequest $request)
    {
         $this->theme->asset()->add('select2-css', 'themes/admin/assets/packages/select2/css/select2.min.css');
         $this->theme->asset()->container('footer')->add('select2-js', 'themes/admin/assets/packages/select2/js/select2.full.js');
        
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('coupon::coupon.names').' :: ');
        return $this->theme->of('coupon::admin.coupon.index')->render();
    }

    /**
     * Display a list of coupon.
     *
     * @return Response
     */
    public function getJson(CouponRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $coupons  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Laracart\\Coupon\\Repositories\\Presenter\\CouponListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $coupons['recordsTotal']    = $coupons['meta']['pagination']['total'];
        $coupons['recordsFiltered'] = $coupons['meta']['pagination']['total'];
        $coupons['request']         = $request->all();
        return response()->json($coupons, 200);

    }

    /**
     * Display coupon.
     *
     * @param Request $request
     * @param Model   $coupon
     *
     * @return Response
     */
    public function show(CouponRequest $request, Coupon $coupon)
    {
        if (!$coupon->exists) {
            return response()->view('coupon::admin.coupon.new', compact('coupon'));
        }

        Form::populate($coupon);
        return response()->view('coupon::admin.coupon.show', compact('coupon'));
    }

    /**
     * Show the form for creating a new coupon.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CouponRequest $request)
    {

        $coupon = $this->repository->newInstance([]);

        Form::populate($coupon);

        return response()->view('coupon::admin.coupon.create', compact('coupon'));

    }

    /**
     * Create new coupon.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CouponRequest $request)
    {

        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $coupon          = $this->repository->create($attributes);

            if ($request->get('category')) {
                $coupon->categories()->sync($request->get('category'));
            }

            if ($request->get('product')) {
                $coupon->products()->sync($request->get('product'));
            }


            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('coupon::coupon.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/coupon/coupon/'.$coupon->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show coupon for editing.
     *
     * @param Request $request
     * @param Model   $coupon
     *
     * @return Response
     */
    public function edit(CouponRequest $request, Coupon $coupon)
    {
        Form::populate($coupon);
        return  response()->view('coupon::admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the coupon.
     *
     * @param Request $request
     * @param Model   $coupon
     *
     * @return Response
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        try {

            $attributes = $request->all(); 

            $coupon->update($attributes);
              if ($request->get('category')) {
                $coupon->categories()->sync($request->get('category'));
            }
            else{
                $coupon->categories()->detach();
            }

            if ($request->get('product')) {
                $coupon->products()->sync($request->get('product'));
            }
             else{
                $coupon->products()->detach();
            }



            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('coupon::coupon.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/coupon/coupon/'.$coupon->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/coupon/coupon/'.$coupon->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the coupon.
     *
     * @param Model   $coupon
     *
     * @return Response
     */
    public function destroy(CouponRequest $request, Coupon $coupon)
    {

        try {

            $t = $coupon->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('coupon::coupon.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/coupon/coupon/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/coupon/coupon/'.$coupon->getRouteKey()),
            ], 400);
        }
    }

    /**
     * check code of coupon
     *
     * @param Request $request
     *
     * @return Response
     */
    public function checkCode(CouponRequest $request)
    {
        
        $arr = $request->get('formData');
        $code = $arr[0];
       
        return $this->repository
                ->scopeQuery(function ($query) use ($code) {
                    return $query->where(function ($query) use ($code) {
                        $query->where('code', '=', $code);                        
                    });
                })->count();
    }

}
