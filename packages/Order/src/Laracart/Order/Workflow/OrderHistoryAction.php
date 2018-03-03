<?php

namespace Laracart\Order\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Order\Models\OrderHistory;

class OrderHistoryAction
{
    /**
     * Perform the complete action.
     *
     * @param OrderHistory $order_history
     *
     * @return OrderHistory
     */
    public function complete(OrderHistory $order_history)
    {
        try {
            $order_history->status = 'complete';
            return $order_history->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param OrderHistory $order_history
     *
     * @return OrderHistory
     */public function verify(OrderHistory $order_history)
    {
        try {
            $order_history->status = 'verify';
            return $order_history->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param OrderHistory $order_history
     *
     * @return OrderHistory
     */public function approve(OrderHistory $order_history)
    {
        try {
            $order_history->status = 'approve';
            return $order_history->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param OrderHistory $order_history
     *
     * @return OrderHistory
     */public function publish(OrderHistory $order_history)
    {
        try {
            $order_history->status = 'publish';
            return $order_history->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param OrderHistory $order_history
     *
     * @return OrderHistory
     */
    public function archive(OrderHistory $order_history)
    {
        try {
            $order_history->status = 'archive';
            return $order_history->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param OrderHistory $order_history
     *
     * @return OrderHistory
     */
    public function unpublish(OrderHistory $order_history)
    {
        try {
            $order_history->status = 'unpublish';
            return $order_history->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
