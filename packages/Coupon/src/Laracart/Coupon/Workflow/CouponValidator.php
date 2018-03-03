<?php

namespace Laracart\Coupon\Workflow;

use Laracart\Coupon\Models\Coupon;
use Validator;

class CouponValidator
{

    /**
     * Determine if the given coupon is valid for complete status.
     *
     * @param Coupon $coupon
     *
     * @return bool / Validator
     */
    public function complete(Coupon $coupon)
    {
        return Validator::make($coupon->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given coupon is valid for verify status.
     *
     * @param Coupon $coupon
     *
     * @return bool / Validator
     */
    public function verify(Coupon $coupon)
    {
        return Validator::make($coupon->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given coupon is valid for approve status.
     *
     * @param Coupon $coupon
     *
     * @return bool / Validator
     */
    public function approve(Coupon $coupon)
    {
        return Validator::make($coupon->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given coupon is valid for publish status.
     *
     * @param Coupon $coupon
     *
     * @return bool / Validator
     */
    public function publish(Coupon $coupon)
    {
        return Validator::make($coupon->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given coupon is valid for archive status.
     *
     * @param Coupon $coupon
     *
     * @return bool / Validator
     */
    public function archive(Coupon $coupon)
    {
        return Validator::make($coupon->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given coupon is valid for unpublish status.
     *
     * @param Coupon $coupon
     *
     * @return bool / Validator
     */
    public function unpublish(Coupon $coupon)
    {
        return Validator::make($coupon->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
