<?php

namespace Laracart\Coupon\Policies;

use App\User;
use Laracart\Coupon\Models\Coupon;

class CouponPolicy
{

    /**
     * Determine if the given user can view the coupon.
     *
     * @param User $user
     * @param Coupon $coupon
     *
     * @return bool
     */
    public function view(User $user, Coupon $coupon)
    {
        if ($user->canDo('coupon.coupon.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $coupon->user_id;
    }

    /**
     * Determine if the given user can create a coupon.
     *
     * @param User $user
     * @param Coupon $coupon
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('coupon.coupon.create');
    }

    /**
     * Determine if the given user can update the given coupon.
     *
     * @param User $user
     * @param Coupon $coupon
     *
     * @return bool
     */
    public function update(User $user, Coupon $coupon)
    {
        if ($user->canDo('coupon.coupon.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $coupon->user_id;
    }

    /**
     * Determine if the given user can delete the given coupon.
     *
     * @param User $user
     * @param Coupon $coupon
     *
     * @return bool
     */
    public function destroy(User $user, Coupon $coupon)
    {
        if ($user->canDo('coupon.coupon.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $coupon->user_id;
    }

    /**
     * Determine if the given user can verify the given coupon.
     *
     * @param User $user
     * @param Coupon $coupon
     *
     * @return bool
     */
    public function verify(User $user, Coupon $coupon)
    {
        if ($user->canDo('coupon.coupon.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('coupon.coupon.verify') 
        && $user->is('manager')
        && $coupon->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given coupon.
     *
     * @param User $user
     * @param Coupon $coupon
     *
     * @return bool
     */
    public function approve(User $user, Coupon $coupon)
    {
        if ($user->canDo('coupon.coupon.approve') && $user->is('admin')) {
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
