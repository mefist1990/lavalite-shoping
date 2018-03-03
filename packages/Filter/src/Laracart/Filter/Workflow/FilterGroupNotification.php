<?php

namespace Laracart\Filter\Workflow;

use Laracart\Filter\Models\FilterGroup;
use Laracart\Filter\Notifications\FilterGroup as FilterGroupNotifyer;
use Notification;

class FilterGroupNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param FilterGroup $filter_group
     *
     * @return void
     */
    public function complete(FilterGroup $filter_group)
    {
        return Notification::send($filter_group->user, new FilterGroupNotifyer($filter_group, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param FilterGroup $filter_group
     *
     * @return void
     */
    public function verify(FilterGroup $filter_group)
    {
        return Notification::send($filter_group->user, new FilterGroupNotifyer($filter_group, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param FilterGroup $filter_group
     *
     * @return void
     */
    public function approve(FilterGroup $filter_group)
    {
        return Notification::send($filter_group->user, new FilterGroupNotifyer($filter_group, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param FilterGroup $filter_group
     *
     * @return void
     */
    public function publish(FilterGroup $filter_group)
    {
        return Notification::send($filter_group->user, new FilterGroupNotifyer($filter_group, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param FilterGroup $filter_group
     *
     * @return void
     */
    public function archive(FilterGroup $filter_group)
    {
        return Notification::send($filter_group->user, new FilterGroupNotifyer($filter_group, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param FilterGroup $filter_group
     *
     * @return void
     */
    public function unpublish(FilterGroup $filter_group)
    {
        return Notification::send($filter_group->user, new FilterGroupNotifyer($filter_group, 'unpublish'));;

    }
}
