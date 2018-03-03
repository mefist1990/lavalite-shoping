<?php

namespace Laracart\Cart\Workflow;

use Laracart\Cart\Models\Cart;
use Validator;

class CartValidator
{

    /**
     * Determine if the given cart is valid for complete status.
     *
     * @param Cart $cart
     *
     * @return bool / Validator
     */
    public function complete(Cart $cart)
    {
        return Validator::make($cart->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given cart is valid for verify status.
     *
     * @param Cart $cart
     *
     * @return bool / Validator
     */
    public function verify(Cart $cart)
    {
        return Validator::make($cart->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given cart is valid for approve status.
     *
     * @param Cart $cart
     *
     * @return bool / Validator
     */
    public function approve(Cart $cart)
    {
        return Validator::make($cart->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given cart is valid for publish status.
     *
     * @param Cart $cart
     *
     * @return bool / Validator
     */
    public function publish(Cart $cart)
    {
        return Validator::make($cart->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given cart is valid for archive status.
     *
     * @param Cart $cart
     *
     * @return bool / Validator
     */
    public function archive(Cart $cart)
    {
        return Validator::make($cart->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given cart is valid for unpublish status.
     *
     * @param Cart $cart
     *
     * @return bool / Validator
     */
    public function unpublish(Cart $cart)
    {
        return Validator::make($cart->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
