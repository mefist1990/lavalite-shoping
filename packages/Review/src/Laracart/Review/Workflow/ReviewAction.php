<?php

namespace Laracart\Review\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Review\Models\Review;

class ReviewAction
{
    /**
     * Perform the complete action.
     *
     * @param Review $review
     *
     * @return Review
     */
    public function complete(Review $review)
    {
        try {
            $review->status = 'complete';
            return $review->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Review $review
     *
     * @return Review
     */public function verify(Review $review)
    {
        try {
            $review->status = 'verify';
            return $review->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Review $review
     *
     * @return Review
     */public function approve(Review $review)
    {
        try {
            $review->status = 'approve';
            return $review->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Review $review
     *
     * @return Review
     */public function publish(Review $review)
    {
        try {
            $review->status = 'publish';
            return $review->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Review $review
     *
     * @return Review
     */
    public function archive(Review $review)
    {
        try {
            $review->status = 'archive';
            return $review->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Review $review
     *
     * @return Review
     */
    public function unpublish(Review $review)
    {
        try {
            $review->status = 'unpublish';
            return $review->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
