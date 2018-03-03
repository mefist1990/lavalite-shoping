<?php

namespace Laracart\Returns\Http\Controllers;
use Litepie\Returns\Http\Requests\ReturnReasonRequest;
use Litepie\Returns\Models\ReturnReason;

trait ReturnReasonWorkflow {
	
    /**
     * Workflow controller function for return_reason.
     *
     * @param Model   $return_reason
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(ReturnReasonRequest $request, ReturnReason $return_reason, $step)
    {

        try {

            $return_reason->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('returns::return_reason.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/return_reason/return_reason/' . $return_reason->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/return_reason/return_reason/' . $return_reason->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for return_reason.
     *
     * @param Model   $return_reason
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(ReturnReason $return_reason, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $return_reason->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('returns::return_reason.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('returns::admin.return_reason.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('returns::admin.return_reason.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('returns::admin.return_reason.message', $data)->render();

        }

    }
}