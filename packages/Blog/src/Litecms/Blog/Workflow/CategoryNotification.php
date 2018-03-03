<?php

namespace Litecms\Blog\Workflow;

use Litecms\Blog\Models\Category;
use Litecms\Blog\Notifications\Category as CategoryNotifyer;
use Notification;

class CategoryNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Category $category
     *
     * @return void
     */
    public function complete(Category $category)
    {
        return Notification::send($category->user, new CategoryNotifyer($category, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Category $category
     *
     * @return void
     */
    public function verify(Category $category)
    {
        return Notification::send($category->user, new CategoryNotifyer($category, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Category $category
     *
     * @return void
     */
    public function approve(Category $category)
    {
        return Notification::send($category->user, new CategoryNotifyer($category, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Category $category
     *
     * @return void
     */
    public function publish(Category $category)
    {
        return Notification::send($category->user, new CategoryNotifyer($category, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Category $category
     *
     * @return void
     */
    public function archive(Category $category)
    {
        return Notification::send($category->user, new CategoryNotifyer($category, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Category $category
     *
     * @return void
     */
    public function unpublish(Category $category)
    {
        return Notification::send($category->user, new CategoryNotifyer($category, 'unpublish'));;

    }
}
