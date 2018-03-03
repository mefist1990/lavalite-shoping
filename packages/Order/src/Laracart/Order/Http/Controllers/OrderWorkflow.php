<?php

namespace Laracart\Order\Http\Controllers;
use Litepie\Order\Http\Requests\OrderRequest;
use Litepie\Order\Models\Order;

trait OrderWorkflow {
	
    /**
     * Workflow controller function for order.
     *
     * @param Model   $order
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(OrderRequest $request, Order $order, $step)
    {

        try {

            $order->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('order::order.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order/order/' . $order->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order/order/' . $order->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for order.
     *
     * @param Model   $order
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Order $order, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $order->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('order::order.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order.message', $data)->render();

        }

    }
}