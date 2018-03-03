<?php

namespace Laracart\Order\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Order\Models\Order;

class OrderAction
{
    /**
     * Perform the complete action.
     *
     * @param Order $order
     *
     * @return Order
     */
    public function complete(Order $order)
    {
        try {
            $order->status = 'complete';
            return $order->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Order $order
     *
     * @return Order
     */public function verify(Order $order)
    {
        try {
            $order->status = 'verify';
            return $order->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Order $order
     *
     * @return Order
     */public function approve(Order $order)
    {
        try {
            $order->status = 'approve';
            return $order->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Order $order
     *
     * @return Order
     */public function publish(Order $order)
    {
        try {
            $order->status = 'publish';
            return $order->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Order $order
     *
     * @return Order
     */
    public function archive(Order $order)
    {
        try {
            $order->status = 'archive';
            return $order->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Order $order
     *
     * @return Order
     */
    public function unpublish(Order $order)
    {
        try {
            $order->status = 'unpublish';
            return $order->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
