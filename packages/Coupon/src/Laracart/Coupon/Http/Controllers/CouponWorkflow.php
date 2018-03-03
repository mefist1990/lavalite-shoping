<?php

namespace Laracart\Coupon\Http\Controllers;
use Litepie\Coupon\Http\Requests\CouponRequest;
use Litepie\Coupon\Models\Coupon;

trait CouponWorkflow {
	
    /**
     * Workflow controller function for coupon.
     *
     * @param Model   $coupon
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(CouponRequest $request, Coupon $coupon, $step)
    {

        try {

            $coupon->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('coupon::coupon.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/coupon/coupon/' . $coupon->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/coupon/coupon/' . $coupon->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for coupon.
     *
     * @param Model   $coupon
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Coupon $coupon, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $coupon->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('coupon::coupon.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('coupon::admin.coupon.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('coupon::admin.coupon.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('coupon::admin.coupon.message', $data)->render();

        }

    }
}