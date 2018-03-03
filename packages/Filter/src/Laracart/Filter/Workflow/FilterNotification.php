<?php

namespace Laracart\Filter\Workflow;

use Laracart\Filter\Models\Filter;
use Laracart\Filter\Notifications\Filter as FilterNotifyer;
use Notification;

class FilterNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Filter $filter
     *
     * @return void
     */
    public function complete(Filter $filter)
    {
        return Notification::send($filter->user, new FilterNotifyer($filter, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Filter $filter
     *
     * @return void
     */
    public function verify(Filter $filter)
    {
        return Notification::send($filter->user, new FilterNotifyer($filter, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Filter $filter
     *
     * @return void
     */
    public function approve(Filter $filter)
    {
        return Notification::send($filter->user, new FilterNotifyer($filter, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Filter $filter
     *
     * @return void
     */
    public function publish(Filter $filter)
    {
        return Notification::send($filter->user, new FilterNotifyer($filter, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Filter $filter
     *
     * @return void
     */
    public function archive(Filter $filter)
    {
        return Notification::send($filter->user, new FilterNotifyer($filter, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Filter $filter
     *
     * @return void
     */
    public function unpublish(Filter $filter)
    {
        return Notification::send($filter->user, new FilterNotifyer($filter, 'unpublish'));;

    }
}
