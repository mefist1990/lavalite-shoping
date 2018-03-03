<?php

namespace Laracart\Attribute\Policies;

use App\User;
use Laracart\Attribute\Models\Attribute;

class AttributePolicy
{

    /**
     * Determine if the given user can view the attribute.
     *
     * @param User $user
     * @param Attribute $attribute
     *
     * @return bool
     */
    public function view(User $user, Attribute $attribute)
    {
        if ($user->canDo('attribute.attribute.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $attribute->user_id;
    }

    /**
     * Determine if the given user can create a attribute.
     *
     * @param User $user
     * @param Attribute $attribute
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('attribute.attribute.create');
    }

    /**
     * Determine if the given user can update the given attribute.
     *
     * @param User $user
     * @param Attribute $attribute
     *
     * @return bool
     */
    public function update(User $user, Attribute $attribute)
    {
        if ($user->canDo('attribute.attribute.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $attribute->user_id;
    }

    /**
     * Determine if the given user can delete the given attribute.
     *
     * @param User $user
     * @param Attribute $attribute
     *
     * @return bool
     */
    public function destroy(User $user, Attribute $attribute)
    {
        if ($user->canDo('attribute.attribute.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $attribute->user_id;
    }

    /**
     * Determine if the given user can verify the given attribute.
     *
     * @param User $user
     * @param Attribute $attribute
     *
     * @return bool
     */
    public function verify(User $user, Attribute $attribute)
    {
        if ($user->canDo('attribute.attribute.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('attribute.attribute.verify') 
        && $user->is('manager')
        && $attribute->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given attribute.
     *
     * @param User $user
     * @param Attribute $attribute
     *
     * @return bool
     */
    public function approve(User $user, Attribute $attribute)
    {
        if ($user->canDo('attribute.attribute.approve') && $user->is('admin')) {
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
