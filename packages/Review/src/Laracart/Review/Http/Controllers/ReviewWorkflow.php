<?php

namespace Laracart\Review\Http\Controllers;
use Litepie\Review\Http\Requests\ReviewRequest;
use Litepie\Review\Models\Review;

trait ReviewWorkflow {
	
    /**
     * Workflow controller function for review.
     *
     * @param Model   $review
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(ReviewRequest $request, Review $review, $step)
    {

        try {

            $review->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('review::review.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/review/review/' . $review->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/review/review/' . $review->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for review.
     *
     * @param Model   $review
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Review $review, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $review->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('review::review.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('review::admin.review.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('review::admin.review.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('review::admin.review.message', $data)->render();

        }

    }
}