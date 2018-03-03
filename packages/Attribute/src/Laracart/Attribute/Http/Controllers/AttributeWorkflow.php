<?php

namespace Laracart\Attribute\Http\Controllers;
use Litepie\Attribute\Http\Requests\AttributeRequest;
use Litepie\Attribute\Models\Attribute;

trait AttributeWorkflow {
	
    /**
     * Workflow controller function for attribute.
     *
     * @param Model   $attribute
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(AttributeRequest $request, Attribute $attribute, $step)
    {

        try {

            $attribute->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('attribute::attribute.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/attribute/attribute/' . $attribute->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/attribute/attribute/' . $attribute->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for attribute.
     *
     * @param Model   $attribute
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Attribute $attribute, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $attribute->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('attribute::attribute.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('attribute::admin.attribute.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('attribute::admin.attribute.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('attribute::admin.attribute.message', $data)->render();

        }

    }
}