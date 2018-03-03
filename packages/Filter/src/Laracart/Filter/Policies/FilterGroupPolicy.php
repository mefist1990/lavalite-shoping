<?php

namespace Laracart\Filter\Policies;

use App\User;
use Laracart\Filter\Models\FilterGroup;

class FilterGroupPolicy
{

    /**
     * Determine if the given user can view the filter_group.
     *
     * @param User $user
     * @param FilterGroup $filter_group
     *
     * @return bool
     */
    public function view(User $user, FilterGroup $filter_group)
    {
        if ($user->canDo('filter.filter_group.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $filter_group->user_id;
    }

    /**
     * Determine if the given user can create a filter_group.
     *
     * @param User $user
     * @param FilterGroup $filter_group
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('filter.filter_group.create');
    }

    /**
     * Determine if the given user can update the given filter_group.
     *
     * @param User $user
     * @param FilterGroup $filter_group
     *
     * @return bool
     */
    public function update(User $user, FilterGroup $filter_group)
    {
        if ($user->canDo('filter.filter_group.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $filter_group->user_id;
    }

    /**
     * Determine if the given user can delete the given filter_group.
     *
     * @param User $user
     * @param FilterGroup $filter_group
     *
     * @return bool
     */
    public function destroy(User $user, FilterGroup $filter_group)
    {
        if ($user->canDo('filter.filter_group.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $filter_group->user_id;
    }

    /**
     * Determine if the given user can verify the given filter_group.
     *
     * @param User $user
     * @param FilterGroup $filter_group
     *
     * @return bool
     */
    public function verify(User $user, FilterGroup $filter_group)
    {
        if ($user->canDo('filter.filter_group.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('filter.filter_group.verify') 
        && $user->is('manager')
        && $filter_group->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given filter_group.
     *
     * @param User $user
     * @param FilterGroup $filter_group
     *
     * @return bool
     */
    public function approve(User $user, FilterGroup $filter_group)
    {
        if ($user->canDo('filter.filter_group.approve') && $user->is('admin')) {
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
