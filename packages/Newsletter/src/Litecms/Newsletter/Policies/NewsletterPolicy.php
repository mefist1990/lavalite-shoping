<?php

namespace Litecms\Newsletter\Policies;

use App\User;
use Litecms\Newsletter\Models\Newsletter;

class NewsletterPolicy
{

    /**
     * Determine if the given user can view the newsletter.
     *
     * @param User $user
     * @param Newsletter $newsletter
     *
     * @return bool
     */
    public function view(User $user, Newsletter $newsletter)
    {
        if ($user->canDo('newsletter.newsletter.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $newsletter->user_id;
    }

    /**
     * Determine if the given user can create a newsletter.
     *
     * @param User $user
     * @param Newsletter $newsletter
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('newsletter.newsletter.create');
    }

    /**
     * Determine if the given user can update the given newsletter.
     *
     * @param User $user
     * @param Newsletter $newsletter
     *
     * @return bool
     */
    public function update(User $user, Newsletter $newsletter)
    {
        if ($user->canDo('newsletter.newsletter.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $newsletter->user_id;
    }

    /**
     * Determine if the given user can delete the given newsletter.
     *
     * @param User $user
     * @param Newsletter $newsletter
     *
     * @return bool
     */
    public function destroy(User $user, Newsletter $newsletter)
    {
        if ($user->canDo('newsletter.newsletter.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $newsletter->user_id;
    }

    /**
     * Determine if the given user can verify the given newsletter.
     *
     * @param User $user
     * @param Newsletter $newsletter
     *
     * @return bool
     */
    public function verify(User $user, Newsletter $newsletter)
    {
        if ($user->canDo('newsletter.newsletter.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('newsletter.newsletter.verify') 
        && $user->is('manager')
        && $newsletter->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given newsletter.
     *
     * @param User $user
     * @param Newsletter $newsletter
     *
     * @return bool
     */
    public function approve(User $user, Newsletter $newsletter)
    {
        if ($user->canDo('newsletter.newsletter.approve') && $user->is('admin')) {
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
