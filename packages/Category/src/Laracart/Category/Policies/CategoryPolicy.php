<?php

namespace Laracart\Category\Policies;

use App\User;
use Laracart\Category\Models\Category;

class CategoryPolicy
{

    /**
     * Determine if the given user can view the category.
     *
     * @param User $user
     * @param Category $category
     *
     * @return bool
     */
    public function view(User $user, Category $category)
    {
        if ($user->canDo('category.category.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $category->user_id;
    }

    /**
     * Determine if the given user can create a category.
     *
     * @param User $user
     * @param Category $category
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('category.category.create');
    }

    /**
     * Determine if the given user can update the given category.
     *
     * @param User $user
     * @param Category $category
     *
     * @return bool
     */
    public function update(User $user, Category $category)
    {
        if ($user->canDo('category.category.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $category->user_id;
    }

    /**
     * Determine if the given user can delete the given category.
     *
     * @param User $user
     * @param Category $category
     *
     * @return bool
     */
    public function destroy(User $user, Category $category)
    {
        if ($user->canDo('category.category.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $category->user_id;
    }

    /**
     * Determine if the given user can verify the given category.
     *
     * @param User $user
     * @param Category $category
     *
     * @return bool
     */
    public function verify(User $user, Category $category)
    {
        if ($user->canDo('category.category.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('category.category.verify') 
        && $user->is('manager')
        && $category->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given category.
     *
     * @param User $user
     * @param Category $category
     *
     * @return bool
     */
    public function approve(User $user, Category $category)
    {
        if ($user->canDo('category.category.approve') && $user->is('admin')) {
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
