<?php

namespace Laracart\Coupon\Workflow;

use Laracart\Coupon\Models\Coupon;
use Laracart\Coupon\Notifications\Coupon as CouponNotifyer;
use Notification;

class CouponNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Coupon $coupon
     *
     * @return void
     */
    public function complete(Coupon $coupon)
    {
        return Notification::send($coupon->user, new CouponNotifyer($coupon, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Coupon $coupon
     *
     * @return void
     */
    public function verify(Coupon $coupon)
    {
        return Notification::send($coupon->user, new CouponNotifyer($coupon, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Coupon $coupon
     *
     * @return void
     */
    public function approve(Coupon $coupon)
    {
        return Notification::send($coupon->user, new CouponNotifyer($coupon, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Coupon $coupon
     *
     * @return void
     */
    public function publish(Coupon $coupon)
    {
        return Notification::send($coupon->user, new CouponNotifyer($coupon, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Coupon $coupon
     *
     * @return void
     */
    public function archive(Coupon $coupon)
    {
        return Notification::send($coupon->user, new CouponNotifyer($coupon, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Coupon $coupon
     *
     * @return void
     */
    public function unpublish(Coupon $coupon)
    {
        return Notification::send($coupon->user, new CouponNotifyer($coupon, 'unpublish'));;

    }
}
