<?php

namespace Laracart\Review\Workflow;

use Laracart\Review\Models\Review;
use Laracart\Review\Notifications\Review as ReviewNotifyer;
use Notification;

class ReviewNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Review $review
     *
     * @return void
     */
    public function complete(Review $review)
    {
        return Notification::send($review->user, new ReviewNotifyer($review, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Review $review
     *
     * @return void
     */
    public function verify(Review $review)
    {
        return Notification::send($review->user, new ReviewNotifyer($review, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Review $review
     *
     * @return void
     */
    public function approve(Review $review)
    {
        return Notification::send($review->user, new ReviewNotifyer($review, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Review $review
     *
     * @return void
     */
    public function publish(Review $review)
    {
        return Notification::send($review->user, new ReviewNotifyer($review, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Review $review
     *
     * @return void
     */
    public function archive(Review $review)
    {
        return Notification::send($review->user, new ReviewNotifyer($review, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Review $review
     *
     * @return void
     */
    public function unpublish(Review $review)
    {
        return Notification::send($review->user, new ReviewNotifyer($review, 'unpublish'));;

    }
}
