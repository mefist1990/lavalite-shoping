<?php

namespace Laracart\Order\Workflow;

use Laracart\Order\Models\OrderStatus;
use Validator;

class OrderStatusValidator
{

    /**
     * Determine if the given order_status is valid for complete status.
     *
     * @param OrderStatus $order_status
     *
     * @return bool / Validator
     */
    public function complete(OrderStatus $order_status)
    {
        return Validator::make($order_status->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given order_status is valid for verify status.
     *
     * @param OrderStatus $order_status
     *
     * @return bool / Validator
     */
    public function verify(OrderStatus $order_status)
    {
        return Validator::make($order_status->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given order_status is valid for approve status.
     *
     * @param OrderStatus $order_status
     *
     * @return bool / Validator
     */
    public function approve(OrderStatus $order_status)
    {
        return Validator::make($order_status->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given order_status is valid for publish status.
     *
     * @param OrderStatus $order_status
     *
     * @return bool / Validator
     */
    public function publish(OrderStatus $order_status)
    {
        return Validator::make($order_status->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given order_status is valid for archive status.
     *
     * @param OrderStatus $order_status
     *
     * @return bool / Validator
     */
    public function archive(OrderStatus $order_status)
    {
        return Validator::make($order_status->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given order_status is valid for unpublish status.
     *
     * @param OrderStatus $order_status
     *
     * @return bool / Validator
     */
    public function unpublish(OrderStatus $order_status)
    {
        return Validator::make($order_status->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
