<?php

namespace Laracart\Cart\Http\Controllers;
use Litepie\Cart\Http\Requests\CartRequest;
use Litepie\Cart\Models\Cart;

trait CartWorkflow {
	
    /**
     * Workflow controller function for cart.
     *
     * @param Model   $cart
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(CartRequest $request, Cart $cart, $step)
    {

        try {

            $cart->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('cart::cart.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/cart/cart/' . $cart->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/cart/cart/' . $cart->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for cart.
     *
     * @param Model   $cart
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Cart $cart, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $cart->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('cart::cart.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('cart::admin.cart.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('cart::admin.cart.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('cart::admin.cart.message', $data)->render();

        }

    }
}