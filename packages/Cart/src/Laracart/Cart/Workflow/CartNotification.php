<?php

namespace Laracart\Cart\Workflow;

use Laracart\Cart\Models\Cart;
use Laracart\Cart\Notifications\Cart as CartNotifyer;
use Notification;

class CartNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Cart $cart
     *
     * @return void
     */
    public function complete(Cart $cart)
    {
        return Notification::send($cart->user, new CartNotifyer($cart, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Cart $cart
     *
     * @return void
     */
    public function verify(Cart $cart)
    {
        return Notification::send($cart->user, new CartNotifyer($cart, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Cart $cart
     *
     * @return void
     */
    public function approve(Cart $cart)
    {
        return Notification::send($cart->user, new CartNotifyer($cart, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Cart $cart
     *
     * @return void
     */
    public function publish(Cart $cart)
    {
        return Notification::send($cart->user, new CartNotifyer($cart, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Cart $cart
     *
     * @return void
     */
    public function archive(Cart $cart)
    {
        return Notification::send($cart->user, new CartNotifyer($cart, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Cart $cart
     *
     * @return void
     */
    public function unpublish(Cart $cart)
    {
        return Notification::send($cart->user, new CartNotifyer($cart, 'unpublish'));;

    }
}
