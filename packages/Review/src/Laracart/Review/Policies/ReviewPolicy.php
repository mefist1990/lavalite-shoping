<?php

namespace Laracart\Review\Policies;

use App\User;
use Laracart\Review\Models\Review;

class ReviewPolicy
{

    /**
     * Determine if the given user can view the review.
     *
     * @param User $user
     * @param Review $review
     *
     * @return bool
     */
    public function view(User $user, Review $review)
    {
        if ($user->canDo('review.review.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $review->user_id;
    }

    /**
     * Determine if the given user can create a review.
     *
     * @param User $user
     * @param Review $review
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('review.review.create');
    }

    /**
     * Determine if the given user can update the given review.
     *
     * @param User $user
     * @param Review $review
     *
     * @return bool
     */
    public function update(User $user, Review $review)
    {
        if ($user->canDo('review.review.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $review->user_id;
    }

    /**
     * Determine if the given user can delete the given review.
     *
     * @param User $user
     * @param Review $review
     *
     * @return bool
     */
    public function destroy(User $user, Review $review)
    {
        if ($user->canDo('review.review.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $review->user_id;
    }

    /**
     * Determine if the given user can verify the given review.
     *
     * @param User $user
     * @param Review $review
     *
     * @return bool
     */
    public function verify(User $user, Review $review)
    {
        if ($user->canDo('review.review.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('review.review.verify') 
        && $user->is('manager')
        && $review->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given review.
     *
     * @param User $user
     * @param Review $review
     *
     * @return bool
     */
    public function approve(User $user, Review $review)
    {
        if ($user->canDo('review.review.approve') && $user->is('admin')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
    }
}
