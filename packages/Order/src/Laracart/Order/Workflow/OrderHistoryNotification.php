<?php

namespace Laracart\Order\Workflow;

use Laracart\Order\Models\OrderHistory;
use Laracart\Order\Notifications\OrderHistory as OrderHistoryNotifyer;
use Notification;

class OrderHistoryNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param OrderHistory $order_history
     *
     * @return void
     */
    public function complete(OrderHistory $order_history)
    {
        return Notification::send($order_history->user, new OrderHistoryNotifyer($order_history, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param OrderHistory $order_history
     *
     * @return void
     */
    public function verify(OrderHistory $order_history)
    {
        return Notification::send($order_history->user, new OrderHistoryNotifyer($order_history, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param OrderHistory $order_history
     *
     * @return void
     */
    public function approve(OrderHistory $order_history)
    {
        return Notification::send($order_history->user, new OrderHistoryNotifyer($order_history, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param OrderHistory $order_history
     *
     * @return void
     */
    public function publish(OrderHistory $order_history)
    {
        return Notification::send($order_history->user, new OrderHistoryNotifyer($order_history, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param OrderHistory $order_history
     *
     * @return void
     */
    public function archive(OrderHistory $order_history)
    {
        return Notification::send($order_history->user, new OrderHistoryNotifyer($order_history, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param OrderHistory $order_history
     *
     * @return void
     */
    public function unpublish(OrderHistory $order_history)
    {
        return Notification::send($order_history->user, new OrderHistoryNotifyer($order_history, 'unpublish'));;

    }
}
