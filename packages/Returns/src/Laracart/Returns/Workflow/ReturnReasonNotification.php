<?php

namespace Laracart\Returns\Workflow;

use Laracart\Returns\Models\ReturnReason;
use Laracart\Returns\Notifications\ReturnReason as ReturnReasonNotifyer;
use Notification;

class ReturnReasonNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param ReturnReason $return_reason
     *
     * @return void
     */
    public function complete(ReturnReason $return_reason)
    {
        return Notification::send($return_reason->user, new ReturnReasonNotifyer($return_reason, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param ReturnReason $return_reason
     *
     * @return void
     */
    public function verify(ReturnReason $return_reason)
    {
        return Notification::send($return_reason->user, new ReturnReasonNotifyer($return_reason, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param ReturnReason $return_reason
     *
     * @return void
     */
    public function approve(ReturnReason $return_reason)
    {
        return Notification::send($return_reason->user, new ReturnReasonNotifyer($return_reason, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param ReturnReason $return_reason
     *
     * @return void
     */
    public function publish(ReturnReason $return_reason)
    {
        return Notification::send($return_reason->user, new ReturnReasonNotifyer($return_reason, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param ReturnReason $return_reason
     *
     * @return void
     */
    public function archive(ReturnReason $return_reason)
    {
        return Notification::send($return_reason->user, new ReturnReasonNotifyer($return_reason, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param ReturnReason $return_reason
     *
     * @return void
     */
    public function unpublish(ReturnReason $return_reason)
    {
        return Notification::send($return_reason->user, new ReturnReasonNotifyer($return_reason, 'unpublish'));;

    }
}
