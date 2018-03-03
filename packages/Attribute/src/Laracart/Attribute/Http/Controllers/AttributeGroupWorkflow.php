<?php

namespace Laracart\Attribute\Http\Controllers;
use Litepie\Attribute\Http\Requests\AttributeGroupRequest;
use Litepie\Attribute\Models\AttributeGroup;

trait AttributeGroupWorkflow {
	
    /**
     * Workflow controller function for attribute_group.
     *
     * @param Model   $attribute_group
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(AttributeGroupRequest $request, AttributeGroup $attribute_group, $step)
    {

        try {

            $attribute_group->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('attribute::attribute_group.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/attribute_group/attribute_group/' . $attribute_group->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/attribute_group/attribute_group/' . $attribute_group->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for attribute_group.
     *
     * @param Model   $attribute_group
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(AttributeGroup $attribute_group, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $attribute_group->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('attribute::attribute_group.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('attribute::admin.attribute_group.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('attribute::admin.attribute_group.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('attribute::admin.attribute_group.message', $data)->render();

        }

    }
}