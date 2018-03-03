<?php

namespace Laracart\Order\Workflow;

use Laracart\Order\Models\Order;
use Laracart\Order\Notifications\Order as OrderNotifyer;
use Notification;

class OrderNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Order $order
     *
     * @return void
     */
    public function complete(Order $order)
    {
        return Notification::send($order->user, new OrderNotifyer($order, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Order $order
     *
     * @return void
     */
    public function verify(Order $order)
    {
        return Notification::send($order->user, new OrderNotifyer($order, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Order $order
     *
     * @return void
     */
    public function approve(Order $order)
    {
        return Notification::send($order->user, new OrderNotifyer($order, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Order $order
     *
     * @return void
     */
    public function publish(Order $order)
    {
        return Notification::send($order->user, new OrderNotifyer($order, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Order $order
     *
     * @return void
     */
    public function archive(Order $order)
    {
        return Notification::send($order->user, new OrderNotifyer($order, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Order $order
     *
     * @return void
     */
    public function unpublish(Order $order)
    {
        return Notification::send($order->user, new OrderNotifyer($order, 'unpublish'));;

    }
}
