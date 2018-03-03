<?php

namespace Laracart\Currency\Http\Controllers;
use Litepie\Currency\Http\Requests\CurrencyRequest;
use Litepie\Currency\Models\Currency;

trait CurrencyWorkflow {
	
    /**
     * Workflow controller function for currency.
     *
     * @param Model   $currency
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(CurrencyRequest $request, Currency $currency, $step)
    {

        try {

            $currency->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('currency::currency.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/currency/currency/' . $currency->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/currency/currency/' . $currency->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for currency.
     *
     * @param Model   $currency
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Currency $currency, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $currency->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('currency::currency.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('currency::admin.currency.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('currency::admin.currency.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('currency::admin.currency.message', $data)->render();

        }

    }
}