<?php

namespace Laracart\Filter\Http\Controllers;
use Litepie\Filter\Http\Requests\FilterGroupRequest;
use Litepie\Filter\Models\FilterGroup;

trait FilterGroupWorkflow {
	
    /**
     * Workflow controller function for filter_group.
     *
     * @param Model   $filter_group
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(FilterGroupRequest $request, FilterGroup $filter_group, $step)
    {

        try {

            $filter_group->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('filter::filter_group.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/filter_group/filter_group/' . $filter_group->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/filter_group/filter_group/' . $filter_group->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for filter_group.
     *
     * @param Model   $filter_group
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(FilterGroup $filter_group, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $filter_group->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('filter::filter_group.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('filter::admin.filter_group.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('filter::admin.filter_group.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('filter::admin.filter_group.message', $data)->render();

        }

    }
}