<?php

namespace Laracart\Order\Http\Controllers;
use Litepie\Order\Http\Requests\OrderStatusRequest;
use Litepie\Order\Models\OrderStatus;

trait OrderStatusWorkflow {
	
    /**
     * Workflow controller function for order_status.
     *
     * @param Model   $order_status
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(OrderStatusRequest $request, OrderStatus $order_status, $step)
    {

        try {

            $order_status->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('order::order_status.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order_status/order_status/' . $order_status->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order_status/order_status/' . $order_status->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for order_status.
     *
     * @param Model   $order_status
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(OrderStatus $order_status, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $order_status->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('order::order_status.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order_status.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order_status.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order_status.message', $data)->render();

        }

    }
}