<?php

namespace Laracart\Order\Policies;

use App\User;
use Laracart\Order\Models\OrderHistory;

class OrderHistoryPolicy
{

    /**
     * Determine if the given user can view the order_history.
     *
     * @param User $user
     * @param OrderHistory $order_history
     *
     * @return bool
     */
    public function view(User $user, OrderHistory $order_history)
    {
        if ($user->canDo('order.order_history.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order_history->user_id;
    }

    /**
     * Determine if the given user can create a order_history.
     *
     * @param User $user
     * @param OrderHistory $order_history
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('order.order_history.create');
    }

    /**
     * Determine if the given user can update the given order_history.
     *
     * @param User $user
     * @param OrderHistory $order_history
     *
     * @return bool
     */
    public function update(User $user, OrderHistory $order_history)
    {
        if ($user->canDo('order.order_history.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order_history->user_id;
    }

    /**
     * Determine if the given user can delete the given order_history.
     *
     * @param User $user
     * @param OrderHistory $order_history
     *
     * @return bool
     */
    public function destroy(User $user, OrderHistory $order_history)
    {
        if ($user->canDo('order.order_history.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $order_history->user_id;
    }

    /**
     * Determine if the given user can verify the given order_history.
     *
     * @param User $user
     * @param OrderHistory $order_history
     *
     * @return bool
     */
    public function verify(User $user, OrderHistory $order_history)
    {
        if ($user->canDo('order.order_history.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('order.order_history.verify') 
        && $user->is('manager')
        && $order_history->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given order_history.
     *
     * @param User $user
     * @param OrderHistory $order_history
     *
     * @return bool
     */
    public function approve(User $user, OrderHistory $order_history)
    {
        if ($user->canDo('order.order_history.approve') && $user->is('admin')) {
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
