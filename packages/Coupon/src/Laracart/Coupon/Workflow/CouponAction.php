<?php

namespace Laracart\Coupon\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Coupon\Models\Coupon;

class CouponAction
{
    /**
     * Perform the complete action.
     *
     * @param Coupon $coupon
     *
     * @return Coupon
     */
    public function complete(Coupon $coupon)
    {
        try {
            $coupon->status = 'complete';
            return $coupon->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Coupon $coupon
     *
     * @return Coupon
     */public function verify(Coupon $coupon)
    {
        try {
            $coupon->status = 'verify';
            return $coupon->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Coupon $coupon
     *
     * @return Coupon
     */public function approve(Coupon $coupon)
    {
        try {
            $coupon->status = 'approve';
            return $coupon->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Coupon $coupon
     *
     * @return Coupon
     */public function publish(Coupon $coupon)
    {
        try {
            $coupon->status = 'publish';
            return $coupon->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Coupon $coupon
     *
     * @return Coupon
     */
    public function archive(Coupon $coupon)
    {
        try {
            $coupon->status = 'archive';
            return $coupon->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Coupon $coupon
     *
     * @return Coupon
     */
    public function unpublish(Coupon $coupon)
    {
        try {
            $coupon->status = 'unpublish';
            return $coupon->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
