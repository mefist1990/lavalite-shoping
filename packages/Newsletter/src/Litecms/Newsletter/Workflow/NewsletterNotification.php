<?php

namespace Litecms\Newsletter\Workflow;

use Litecms\Newsletter\Models\Newsletter;
use Litecms\Newsletter\Notifications\Newsletter as NewsletterNotifyer;
use Notification;

class NewsletterNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Newsletter $newsletter
     *
     * @return void
     */
    public function complete(Newsletter $newsletter)
    {
        return Notification::send($newsletter->user, new NewsletterNotifyer($newsletter, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Newsletter $newsletter
     *
     * @return void
     */
    public function verify(Newsletter $newsletter)
    {
        return Notification::send($newsletter->user, new NewsletterNotifyer($newsletter, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Newsletter $newsletter
     *
     * @return void
     */
    public function approve(Newsletter $newsletter)
    {
        return Notification::send($newsletter->user, new NewsletterNotifyer($newsletter, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Newsletter $newsletter
     *
     * @return void
     */
    public function publish(Newsletter $newsletter)
    {
        return Notification::send($newsletter->user, new NewsletterNotifyer($newsletter, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Newsletter $newsletter
     *
     * @return void
     */
    public function archive(Newsletter $newsletter)
    {
        return Notification::send($newsletter->user, new NewsletterNotifyer($newsletter, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Newsletter $newsletter
     *
     * @return void
     */
    public function unpublish(Newsletter $newsletter)
    {
        return Notification::send($newsletter->user, new NewsletterNotifyer($newsletter, 'unpublish'));;

    }
}
