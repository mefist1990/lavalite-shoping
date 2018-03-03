<?php

namespace Laracart\Returns\Policies;

use Litepie\User\Contracts\UserPolicy as User;
use Laracart\Returns\Models\Returns;

class ReturnsPolicy
{

    /**
     * Determine if the given user can view the returns.
     *
     * @param User $user
     * @param Returns $returns
     *
     * @return bool
     */
    public function view(User $user, Returns $returns)
    {
        if ($user->canDo('returns.returns.view')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $returns->user_id;
    }

    /**
     * Determine if the given user can create a returns.
     *
     * @param User $user
     * @param Returns $returns
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('returns.returns.create');
    }

    /**
     * Determine if the given user can update the given returns.
     *
     * @param User $user
     * @param Returns $returns
     *
     * @return bool
     */
    public function update(User $user, Returns $returns)
    {
        if ($user->canDo('returns.returns.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $returns->user_id;
    }

    /**
     * Determine if the given user can delete the given returns.
     *
     * @param User $user
     * @param Returns $returns
     *
     * @return bool
     */
    public function destroy(User $user, Returns $returns)
    {
        if ($user->canDo('returns.returns.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $returns->user_id;
    }

    /**
     * Determine if the given user can verify the given returns.
     *
     * @param User $user
     * @param Returns $returns
     *
     * @return bool
     */
    public function verify(User $user, Returns $returns)
    {
        if ($user->canDo('returns.returns.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('returns.returns.verify') 
        && $user->is('manager')
        && $returns->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given returns.
     *
     * @param User $user
     * @param Returns $returns
     *
     * @return bool
     */
    public function approve(User $user, Returns $returns)
    {
        if ($user->canDo('returns.returns.approve') && $user->is('admin')) {
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
