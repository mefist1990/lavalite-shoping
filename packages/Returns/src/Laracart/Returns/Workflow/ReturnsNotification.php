<?php

namespace Laracart\Returns\Workflow;

use Laracart\Returns\Models\Returns;
use Laracart\Returns\Notifications\Returns as ReturnsNotifyer;
use Notification;

class ReturnsNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Returns $returns
     *
     * @return void
     */
    public function complete(Returns $returns)
    {
        return Notification::send($returns->user, new ReturnsNotifyer($returns, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Returns $returns
     *
     * @return void
     */
    public function verify(Returns $returns)
    {
        return Notification::send($returns->user, new ReturnsNotifyer($returns, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Returns $returns
     *
     * @return void
     */
    public function approve(Returns $returns)
    {
        return Notification::send($returns->user, new ReturnsNotifyer($returns, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Returns $returns
     *
     * @return void
     */
    public function publish(Returns $returns)
    {
        return Notification::send($returns->user, new ReturnsNotifyer($returns, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Returns $returns
     *
     * @return void
     */
    public function archive(Returns $returns)
    {
        return Notification::send($returns->user, new ReturnsNotifyer($returns, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Returns $returns
     *
     * @return void
     */
    public function unpublish(Returns $returns)
    {
        return Notification::send($returns->user, new ReturnsNotifyer($returns, 'unpublish'));;

    }
}
