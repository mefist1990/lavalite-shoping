<?php

namespace Laracart\Attribute\Policies;

use App\User;
use Laracart\Attribute\Models\AttributeGroup;

class AttributeGroupPolicy
{

    /**
     * Determine if the given user can view the attribute_group.
     *
     * @param User $user
     * @param AttributeGroup $attribute_group
     *
     * @return bool
     */
    public function view(User $user, AttributeGroup $attribute_group)
    {
        if ($user->canDo('attribute.attribute_group.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $attribute_group->user_id;
    }

    /**
     * Determine if the given user can create a attribute_group.
     *
     * @param User $user
     * @param AttributeGroup $attribute_group
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('attribute.attribute_group.create');
    }

    /**
     * Determine if the given user can update the given attribute_group.
     *
     * @param User $user
     * @param AttributeGroup $attribute_group
     *
     * @return bool
     */
    public function update(User $user, AttributeGroup $attribute_group)
    {
        if ($user->canDo('attribute.attribute_group.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $attribute_group->user_id;
    }

    /**
     * Determine if the given user can delete the given attribute_group.
     *
     * @param User $user
     * @param AttributeGroup $attribute_group
     *
     * @return bool
     */
    public function destroy(User $user, AttributeGroup $attribute_group)
    {
        if ($user->canDo('attribute.attribute_group.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $attribute_group->user_id;
    }

    /**
     * Determine if the given user can verify the given attribute_group.
     *
     * @param User $user
     * @param AttributeGroup $attribute_group
     *
     * @return bool
     */
    public function verify(User $user, AttributeGroup $attribute_group)
    {
        if ($user->canDo('attribute.attribute_group.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('attribute.attribute_group.verify') 
        && $user->is('manager')
        && $attribute_group->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given attribute_group.
     *
     * @param User $user
     * @param AttributeGroup $attribute_group
     *
     * @return bool
     */
    public function approve(User $user, AttributeGroup $attribute_group)
    {
        if ($user->canDo('attribute.attribute_group.approve') && $user->is('admin')) {
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
