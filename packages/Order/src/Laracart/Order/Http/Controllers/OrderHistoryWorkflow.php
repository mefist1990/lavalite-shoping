<?php

namespace Laracart\Order\Http\Controllers;
use Litepie\Order\Http\Requests\OrderHistoryRequest;
use Litepie\Order\Models\OrderHistory;

trait OrderHistoryWorkflow {
	
    /**
     * Workflow controller function for order_history.
     *
     * @param Model   $order_history
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(OrderHistoryRequest $request, OrderHistory $order_history, $step)
    {

        try {

            $order_history->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('order::order_history.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/order_history/order_history/' . $order_history->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/order_history/order_history/' . $order_history->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for order_history.
     *
     * @param Model   $order_history
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(OrderHistory $order_history, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $order_history->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('order::order_history.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order_history.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order_history.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('order::admin.order_history.message', $data)->render();

        }

    }
}