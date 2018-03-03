<?php

namespace Laracart\Cart\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Cart\Models\Cart;

class CartAction
{
    /**
     * Perform the complete action.
     *
     * @param Cart $cart
     *
     * @return Cart
     */
    public function complete(Cart $cart)
    {
        try {
            $cart->status = 'complete';
            return $cart->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Cart $cart
     *
     * @return Cart
     */public function verify(Cart $cart)
    {
        try {
            $cart->status = 'verify';
            return $cart->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Cart $cart
     *
     * @return Cart
     */public function approve(Cart $cart)
    {
        try {
            $cart->status = 'approve';
            return $cart->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Cart $cart
     *
     * @return Cart
     */public function publish(Cart $cart)
    {
        try {
            $cart->status = 'publish';
            return $cart->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Cart $cart
     *
     * @return Cart
     */
    public function archive(Cart $cart)
    {
        try {
            $cart->status = 'archive';
            return $cart->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Cart $cart
     *
     * @return Cart
     */
    public function unpublish(Cart $cart)
    {
        try {
            $cart->status = 'unpublish';
            return $cart->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
