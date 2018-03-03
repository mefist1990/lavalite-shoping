<?php

namespace Laracart\Filter\Policies;

use App\User;
use Laracart\Filter\Models\Filter;

class FilterPolicy
{

    /**
     * Determine if the given user can view the filter.
     *
     * @param User $user
     * @param Filter $filter
     *
     * @return bool
     */
    public function view(User $user, Filter $filter)
    {
        if ($user->canDo('filter.filter.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $filter->user_id;
    }

    /**
     * Determine if the given user can create a filter.
     *
     * @param User $user
     * @param Filter $filter
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('filter.filter.create');
    }

    /**
     * Determine if the given user can update the given filter.
     *
     * @param User $user
     * @param Filter $filter
     *
     * @return bool
     */
    public function update(User $user, Filter $filter)
    {
        if ($user->canDo('filter.filter.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $filter->user_id;
    }

    /**
     * Determine if the given user can delete the given filter.
     *
     * @param User $user
     * @param Filter $filter
     *
     * @return bool
     */
    public function destroy(User $user, Filter $filter)
    {
        if ($user->canDo('filter.filter.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $filter->user_id;
    }

    /**
     * Determine if the given user can verify the given filter.
     *
     * @param User $user
     * @param Filter $filter
     *
     * @return bool
     */
    public function verify(User $user, Filter $filter)
    {
        if ($user->canDo('filter.filter.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('filter.filter.verify') 
        && $user->is('manager')
        && $filter->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given filter.
     *
     * @param User $user
     * @param Filter $filter
     *
     * @return bool
     */
    public function approve(User $user, Filter $filter)
    {
        if ($user->canDo('filter.filter.approve') && $user->is('admin')) {
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
