<?php

namespace Laracart\Attribute\Workflow;

use Laracart\Attribute\Models\AttributeGroup;
use Laracart\Attribute\Notifications\AttributeGroup as AttributeGroupNotifyer;
use Notification;

class AttributeGroupNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return void
     */
    public function complete(AttributeGroup $attribute_group)
    {
        return Notification::send($attribute_group->user, new AttributeGroupNotifyer($attribute_group, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return void
     */
    public function verify(AttributeGroup $attribute_group)
    {
        return Notification::send($attribute_group->user, new AttributeGroupNotifyer($attribute_group, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return void
     */
    public function approve(AttributeGroup $attribute_group)
    {
        return Notification::send($attribute_group->user, new AttributeGroupNotifyer($attribute_group, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return void
     */
    public function publish(AttributeGroup $attribute_group)
    {
        return Notification::send($attribute_group->user, new AttributeGroupNotifyer($attribute_group, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return void
     */
    public function archive(AttributeGroup $attribute_group)
    {
        return Notification::send($attribute_group->user, new AttributeGroupNotifyer($attribute_group, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return void
     */
    public function unpublish(AttributeGroup $attribute_group)
    {
        return Notification::send($attribute_group->user, new AttributeGroupNotifyer($attribute_group, 'unpublish'));;

    }
}
