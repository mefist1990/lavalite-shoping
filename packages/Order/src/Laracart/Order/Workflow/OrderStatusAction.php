<?php

namespace Laracart\Order\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Order\Models\OrderStatus;

class OrderStatusAction
{
    /**
     * Perform the complete action.
     *
     * @param OrderStatus $order_status
     *
     * @return OrderStatus
     */
    public function complete(OrderStatus $order_status)
    {
        try {
            $order_status->status = 'complete';
            return $order_status->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param OrderStatus $order_status
     *
     * @return OrderStatus
     */public function verify(OrderStatus $order_status)
    {
        try {
            $order_status->status = 'verify';
            return $order_status->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param OrderStatus $order_status
     *
     * @return OrderStatus
     */public function approve(OrderStatus $order_status)
    {
        try {
            $order_status->status = 'approve';
            return $order_status->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param OrderStatus $order_status
     *
     * @return OrderStatus
     */public function publish(OrderStatus $order_status)
    {
        try {
            $order_status->status = 'publish';
            return $order_status->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param OrderStatus $order_status
     *
     * @return OrderStatus
     */
    public function archive(OrderStatus $order_status)
    {
        try {
            $order_status->status = 'archive';
            return $order_status->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param OrderStatus $order_status
     *
     * @return OrderStatus
     */
    public function unpublish(OrderStatus $order_status)
    {
        try {
            $order_status->status = 'unpublish';
            return $order_status->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
