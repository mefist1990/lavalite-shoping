<?php

namespace Laracart\Currency\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Currency\Models\Currency;

class CurrencyAction
{
    /**
     * Perform the complete action.
     *
     * @param Currency $currency
     *
     * @return Currency
     */
    public function complete(Currency $currency)
    {
        try {
            $currency->status = 'complete';
            return $currency->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Currency $currency
     *
     * @return Currency
     */public function verify(Currency $currency)
    {
        try {
            $currency->status = 'verify';
            return $currency->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Currency $currency
     *
     * @return Currency
     */public function approve(Currency $currency)
    {
        try {
            $currency->status = 'approve';
            return $currency->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Currency $currency
     *
     * @return Currency
     */public function publish(Currency $currency)
    {
        try {
            $currency->status = 'publish';
            return $currency->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Currency $currency
     *
     * @return Currency
     */
    public function archive(Currency $currency)
    {
        try {
            $currency->status = 'archive';
            return $currency->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Currency $currency
     *
     * @return Currency
     */
    public function unpublish(Currency $currency)
    {
        try {
            $currency->status = 'unpublish';
            return $currency->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
