<?php

namespace Laracart\Attribute\Workflow;

use Laracart\Attribute\Models\Attribute;
use Laracart\Attribute\Notifications\Attribute as AttributeNotifyer;
use Notification;

class AttributeNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Attribute $attribute
     *
     * @return void
     */
    public function complete(Attribute $attribute)
    {
        return Notification::send($attribute->user, new AttributeNotifyer($attribute, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Attribute $attribute
     *
     * @return void
     */
    public function verify(Attribute $attribute)
    {
        return Notification::send($attribute->user, new AttributeNotifyer($attribute, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Attribute $attribute
     *
     * @return void
     */
    public function approve(Attribute $attribute)
    {
        return Notification::send($attribute->user, new AttributeNotifyer($attribute, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Attribute $attribute
     *
     * @return void
     */
    public function publish(Attribute $attribute)
    {
        return Notification::send($attribute->user, new AttributeNotifyer($attribute, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Attribute $attribute
     *
     * @return void
     */
    public function archive(Attribute $attribute)
    {
        return Notification::send($attribute->user, new AttributeNotifyer($attribute, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Attribute $attribute
     *
     * @return void
     */
    public function unpublish(Attribute $attribute)
    {
        return Notification::send($attribute->user, new AttributeNotifyer($attribute, 'unpublish'));;

    }
}
