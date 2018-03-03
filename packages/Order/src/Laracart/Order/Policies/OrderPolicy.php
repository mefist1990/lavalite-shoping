<?php

namespace Laracart\Order\Policies;

use Litepie\User\Contracts\UserPolicy as User;
use Laracart\Order\Models\Order;

class OrderPolicy
{

    /**
     * Determine if the given user can view the order.
     *
     * @param User $user
     * @param Order $order
     *
     * @return bool
     */
    public function view(User $user, Order $order)
    {
        if ($user->canDo('order.order.view')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order->user_id;
    }

    /**
     * Determine if the given user can create a order.
     *
     * @param User $user
     * @param Order $order
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('order.order.create');
    }

    /**
     * Determine if the given user can update the given order.
     *
     * @param User $user
     * @param Order $order
     *
     * @return bool
     */
    public function update(User $user, Order $order)
    {
        if ($user->canDo('order.order.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order->user_id;
    }

    /**
     * Determine if the given user can delete the given order.
     *
     * @param User $user
     * @param Order $order
     *
     * @return bool
     */
    public function destroy(User $user, Order $order)
    {
        if ($user->canDo('order.order.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order->user_id;
    }

    /**
     * Determine if the given user can verify the given order.
     *
     * @param User $user
     * @param Order $order
     *
     * @return bool
     */
    public function verify(User $user, Order $order)
    {
        if ($user->canDo('order.order.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('order.order.verify') 
        && $user->is('manager')
        && $order->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given order.
     *
     * @param User $user
     * @param Order $order
     *
     * @return bool
     */
    public function approve(User $user, Order $order)
    {
        if ($user->canDo('order.order.approve') && $user->is('admin')) {
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
