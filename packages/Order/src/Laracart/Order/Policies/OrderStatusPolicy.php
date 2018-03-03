<?php

namespace Laracart\Order\Policies;

use App\User;
use Laracart\Order\Models\OrderStatus;

class OrderStatusPolicy
{

    /**
     * Determine if the given user can view the order_status.
     *
     * @param User $user
     * @param OrderStatus $order_status
     *
     * @return bool
     */
    public function view(User $user, OrderStatus $order_status)
    {
        if ($user->canDo('order.order_status.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order_status->user_id;
    }

    /**
     * Determine if the given user can create a order_status.
     *
     * @param User $user
     * @param OrderStatus $order_status
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('order.order_status.create');
    }

    /**
     * Determine if the given user can update the given order_status.
     *
     * @param User $user
     * @param OrderStatus $order_status
     *
     * @return bool
     */
    public function update(User $user, OrderStatus $order_status)
    {
        if ($user->canDo('order.order_status.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order_status->user_id;
    }

    /**
     * Determine if the given user can delete the given order_status.
     *
     * @param User $user
     * @param OrderStatus $order_status
     *
     * @return bool
     */
    public function destroy(User $user, OrderStatus $order_status)
    {
        if ($user->canDo('order.order_status.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order_status->user_id;
    }

    /**
     * Determine if the given user can verify the given order_status.
     *
     * @param User $user
     * @param OrderStatus $order_status
     *
     * @return bool
     */
    public function verify(User $user, OrderStatus $order_status)
    {
        if ($user->canDo('order.order_status.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('order.order_status.verify') 
        && $user->is('manager')
        && $order_status->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given order_status.
     *
     * @param User $user
     * @param OrderStatus $order_status
     *
     * @return bool
     */
    public function approve(User $user, OrderStatus $order_status)
    {
        if ($user->canDo('order.order_status.approve') && $user->is('admin')) {
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
