<?php

namespace Laracart\Order\Workflow;

use Laracart\Order\Models\Order;
use Validator;

class OrderValidator
{

    /**
     * Determine if the given order is valid for complete status.
     *
     * @param Order $order
     *
     * @return bool / Validator
     */
    public function complete(Order $order)
    {
        return Validator::make($order->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given order is valid for verify status.
     *
     * @param Order $order
     *
     * @return bool / Validator
     */
    public function verify(Order $order)
    {
        return Validator::make($order->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given order is valid for approve status.
     *
     * @param Order $order
     *
     * @return bool / Validator
     */
    public function approve(Order $order)
    {
        return Validator::make($order->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given order is valid for publish status.
     *
     * @param Order $order
     *
     * @return bool / Validator
     */
    public function publish(Order $order)
    {
        return Validator::make($order->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given order is valid for archive status.
     *
     * @param Order $order
     *
     * @return bool / Validator
     */
    public function archive(Order $order)
    {
        return Validator::make($order->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given order is valid for unpublish status.
     *
     * @param Order $order
     *
     * @return bool / Validator
     */
    public function unpublish(Order $order)
    {
        return Validator::make($order->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
