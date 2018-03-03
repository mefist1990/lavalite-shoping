<?php

namespace Laracart\Review\Workflow;

use Laracart\Review\Models\Review;
use Validator;

class ReviewValidator
{

    /**
     * Determine if the given review is valid for complete status.
     *
     * @param Review $review
     *
     * @return bool / Validator
     */
    public function complete(Review $review)
    {
        return Validator::make($review->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given review is valid for verify status.
     *
     * @param Review $review
     *
     * @return bool / Validator
     */
    public function verify(Review $review)
    {
        return Validator::make($review->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given review is valid for approve status.
     *
     * @param Review $review
     *
     * @return bool / Validator
     */
    public function approve(Review $review)
    {
        return Validator::make($review->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given review is valid for publish status.
     *
     * @param Review $review
     *
     * @return bool / Validator
     */
    public function publish(Review $review)
    {
        return Validator::make($review->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given review is valid for archive status.
     *
     * @param Review $review
     *
     * @return bool / Validator
     */
    public function archive(Review $review)
    {
        return Validator::make($review->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given review is valid for unpublish status.
     *
     * @param Review $review
     *
     * @return bool / Validator
     */
    public function unpublish(Review $review)
    {
        return Validator::make($review->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
