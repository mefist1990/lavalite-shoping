<?php

namespace Laracart\Cart\Policies;

use App\User;
use Laracart\Cart\Models\Cart;

class CartPolicy
{

    /**
     * Determine if the given user can view the cart.
     *
     * @param User $user
     * @param Cart $cart
     *
     * @return bool
     */
    public function view(User $user, Cart $cart)
    {
        if ($user->canDo('cart.cart.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $cart->user_id;
    }

    /**
     * Determine if the given user can create a cart.
     *
     * @param User $user
     * @param Cart $cart
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('cart.cart.create');
    }

    /**
     * Determine if the given user can update the given cart.
     *
     * @param User $user
     * @param Cart $cart
     *
     * @return bool
     */
    public function update(User $user, Cart $cart)
    {
        if ($user->canDo('cart.cart.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $cart->user_id;
    }

    /**
     * Determine if the given user can delete the given cart.
     *
     * @param User $user
     * @param Cart $cart
     *
     * @return bool
     */
    public function destroy(User $user, Cart $cart)
    {
        if ($user->canDo('cart.cart.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $cart->user_id;
    }

    /**
     * Determine if the given user can verify the given cart.
     *
     * @param User $user
     * @param Cart $cart
     *
     * @return bool
     */
    public function verify(User $user, Cart $cart)
    {
        if ($user->canDo('cart.cart.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('cart.cart.verify') 
        && $user->is('manager')
        && $cart->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given cart.
     *
     * @param User $user
     * @param Cart $cart
     *
     * @return bool
     */
    public function approve(User $user, Cart $cart)
    {
        if ($user->canDo('cart.cart.approve') && $user->is('admin')) {
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
