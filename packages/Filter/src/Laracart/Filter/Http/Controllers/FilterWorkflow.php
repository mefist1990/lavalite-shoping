<?php

namespace Laracart\Filter\Http\Controllers;
use Litepie\Filter\Http\Requests\FilterRequest;
use Litepie\Filter\Models\Filter;

trait FilterWorkflow {
	
    /**
     * Workflow controller function for filter.
     *
     * @param Model   $filter
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(FilterRequest $request, Filter $filter, $step)
    {

        try {

            $filter->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('filter::filter.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/filter/filter/' . $filter->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/filter/filter/' . $filter->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for filter.
     *
     * @param Model   $filter
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Filter $filter, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $filter->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('filter::filter.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('filter::admin.filter.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('filter::admin.filter.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('filter::admin.filter.message', $data)->render();

        }

    }
}