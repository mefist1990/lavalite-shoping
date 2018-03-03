<?php

namespace Laracart\Product\Policies;

use App\User;
use Laracart\Product\Models\Product;

class ProductPolicy
{

    /**
     * Determine if the given user can view the product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function view(User $user, Product $product)
    {
        if ($user->canDo('product.product.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $product->user_id;
    }

    /**
     * Determine if the given user can create a product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('product.product.create');
    }

    /**
     * Determine if the given user can update the given product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function update(User $user, Product $product)
    {
        if ($user->canDo('product.product.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $product->user_id;
    }

    /**
     * Determine if the given user can delete the given product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function destroy(User $user, Product $product)
    {
        if ($user->canDo('product.product.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $product->user_id;
    }

    /**
     * Determine if the given user can verify the given product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function verify(User $user, Product $product)
    {
        if ($user->canDo('product.product.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('product.product.verify') 
        && $user->is('manager')
        && $product->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function approve(User $user, Product $product)
    {
        if ($user->canDo('product.product.approve') && $user->is('admin')) {
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
