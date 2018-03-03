<?php

namespace Laracart\Order\Workflow;

use Laracart\Order\Models\OrderHistory;
use Validator;

class OrderHistoryValidator
{

    /**
     * Determine if the given order_history is valid for complete status.
     *
     * @param OrderHistory $order_history
     *
     * @return bool / Validator
     */
    public function complete(OrderHistory $order_history)
    {
        return Validator::make($order_history->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given order_history is valid for verify status.
     *
     * @param OrderHistory $order_history
     *
     * @return bool / Validator
     */
    public function verify(OrderHistory $order_history)
    {
        return Validator::make($order_history->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given order_history is valid for approve status.
     *
     * @param OrderHistory $order_history
     *
     * @return bool / Validator
     */
    public function approve(OrderHistory $order_history)
    {
        return Validator::make($order_history->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given order_history is valid for publish status.
     *
     * @param OrderHistory $order_history
     *
     * @return bool / Validator
     */
    public function publish(OrderHistory $order_history)
    {
        return Validator::make($order_history->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given order_history is valid for archive status.
     *
     * @param OrderHistory $order_history
     *
     * @return bool / Validator
     */
    public function archive(OrderHistory $order_history)
    {
        return Validator::make($order_history->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given order_history is valid for unpublish status.
     *
     * @param OrderHistory $order_history
     *
     * @return bool / Validator
     */
    public function unpublish(OrderHistory $order_history)
    {
        return Validator::make($order_history->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
