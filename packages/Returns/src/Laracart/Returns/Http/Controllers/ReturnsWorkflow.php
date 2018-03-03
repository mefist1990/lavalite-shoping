<?php

namespace Laracart\Returns\Http\Controllers;
use Litepie\Returns\Http\Requests\ReturnsRequest;
use Litepie\Returns\Models\Returns;

trait ReturnsWorkflow {
	
    /**
     * Workflow controller function for returns.
     *
     * @param Model   $returns
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(ReturnsRequest $request, Returns $returns, $step)
    {

        try {

            $returns->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('returns::returns.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/returns/returns/' . $returns->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/returns/returns/' . $returns->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for returns.
     *
     * @param Model   $returns
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Returns $returns, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $returns->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('returns::returns.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('returns::admin.returns.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('returns::admin.returns.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('returns::admin.returns.message', $data)->render();

        }

    }
}