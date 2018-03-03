<?php

namespace Laracart\Currency\Policies;

use App\User;
use Laracart\Currency\Models\Currency;

class CurrencyPolicy
{

    /**
     * Determine if the given user can view the currency.
     *
     * @param User $user
     * @param Currency $currency
     *
     * @return bool
     */
    public function view(User $user, Currency $currency)
    {
        if ($user->canDo('currency.currency.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $currency->user_id;
    }

    /**
     * Determine if the given user can create a currency.
     *
     * @param User $user
     * @param Currency $currency
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('currency.currency.create');
    }

    /**
     * Determine if the given user can update the given currency.
     *
     * @param User $user
     * @param Currency $currency
     *
     * @return bool
     */
    public function update(User $user, Currency $currency)
    {
        if ($user->canDo('currency.currency.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $currency->user_id;
    }

    /**
     * Determine if the given user can delete the given currency.
     *
     * @param User $user
     * @param Currency $currency
     *
     * @return bool
     */
    public function destroy(User $user, Currency $currency)
    {
        if ($user->canDo('currency.currency.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $currency->user_id;
    }

    /**
     * Determine if the given user can verify the given currency.
     *
     * @param User $user
     * @param Currency $currency
     *
     * @return bool
     */
    public function verify(User $user, Currency $currency)
    {
        if ($user->canDo('currency.currency.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('currency.currency.verify') 
        && $user->is('manager')
        && $currency->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given currency.
     *
     * @param User $user
     * @param Currency $currency
     *
     * @return bool
     */
    public function approve(User $user, Currency $currency)
    {
        if ($user->canDo('currency.currency.approve') && $user->is('admin')) {
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
