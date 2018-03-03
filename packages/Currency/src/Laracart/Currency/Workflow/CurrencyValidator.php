<?php

namespace Laracart\Currency\Workflow;

use Laracart\Currency\Models\Currency;
use Validator;

class CurrencyValidator
{

    /**
     * Determine if the given currency is valid for complete status.
     *
     * @param Currency $currency
     *
     * @return bool / Validator
     */
    public function complete(Currency $currency)
    {
        return Validator::make($currency->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given currency is valid for verify status.
     *
     * @param Currency $currency
     *
     * @return bool / Validator
     */
    public function verify(Currency $currency)
    {
        return Validator::make($currency->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given currency is valid for approve status.
     *
     * @param Currency $currency
     *
     * @return bool / Validator
     */
    public function approve(Currency $currency)
    {
        return Validator::make($currency->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given currency is valid for publish status.
     *
     * @param Currency $currency
     *
     * @return bool / Validator
     */
    public function publish(Currency $currency)
    {
        return Validator::make($currency->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given currency is valid for archive status.
     *
     * @param Currency $currency
     *
     * @return bool / Validator
     */
    public function archive(Currency $currency)
    {
        return Validator::make($currency->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given currency is valid for unpublish status.
     *
     * @param Currency $currency
     *
     * @return bool / Validator
     */
    public function unpublish(Currency $currency)
    {
        return Validator::make($currency->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
