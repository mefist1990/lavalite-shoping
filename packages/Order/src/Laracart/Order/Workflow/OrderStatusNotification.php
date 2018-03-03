<?php

namespace Laracart\Order\Workflow;

use Laracart\Order\Models\OrderStatus;
use Laracart\Order\Notifications\OrderStatus as OrderStatusNotifyer;
use Notification;

class OrderStatusNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param OrderStatus $order_status
     *
     * @return void
     */
    public function complete(OrderStatus $order_status)
    {
        return Notification::send($order_status->user, new OrderStatusNotifyer($order_status, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param OrderStatus $order_status
     *
     * @return void
     */
    public function verify(OrderStatus $order_status)
    {
        return Notification::send($order_status->user, new OrderStatusNotifyer($order_status, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param OrderStatus $order_status
     *
     * @return void
     */
    public function approve(OrderStatus $order_status)
    {
        return Notification::send($order_status->user, new OrderStatusNotifyer($order_status, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param OrderStatus $order_status
     *
     * @return void
     */
    public function publish(OrderStatus $order_status)
    {
        return Notification::send($order_status->user, new OrderStatusNotifyer($order_status, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param OrderStatus $order_status
     *
     * @return void
     */
    public function archive(OrderStatus $order_status)
    {
        return Notification::send($order_status->user, new OrderStatusNotifyer($order_status, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param OrderStatus $order_status
     *
     * @return void
     */
    public function unpublish(OrderStatus $order_status)
    {
        return Notification::send($order_status->user, new OrderStatusNotifyer($order_status, 'unpublish'));;

    }
}
