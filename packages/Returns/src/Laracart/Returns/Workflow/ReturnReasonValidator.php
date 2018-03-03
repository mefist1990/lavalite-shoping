<?php

namespace Laracart\Returns\Workflow;

use Laracart\Returns\Models\ReturnReason;
use Validator;

class ReturnReasonValidator
{

    /**
     * Determine if the given return_reason is valid for complete status.
     *
     * @param ReturnReason $return_reason
     *
     * @return bool / Validator
     */
    public function complete(ReturnReason $return_reason)
    {
        return Validator::make($return_reason->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given return_reason is valid for verify status.
     *
     * @param ReturnReason $return_reason
     *
     * @return bool / Validator
     */
    public function verify(ReturnReason $return_reason)
    {
        return Validator::make($return_reason->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given return_reason is valid for approve status.
     *
     * @param ReturnReason $return_reason
     *
     * @return bool / Validator
     */
    public function approve(ReturnReason $return_reason)
    {
        return Validator::make($return_reason->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given return_reason is valid for publish status.
     *
     * @param ReturnReason $return_reason
     *
     * @return bool / Validator
     */
    public function publish(ReturnReason $return_reason)
    {
        return Validator::make($return_reason->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given return_reason is valid for archive status.
     *
     * @param ReturnReason $return_reason
     *
     * @return bool / Validator
     */
    public function archive(ReturnReason $return_reason)
    {
        return Validator::make($return_reason->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given return_reason is valid for unpublish status.
     *
     * @param ReturnReason $return_reason
     *
     * @return bool / Validator
     */
    public function unpublish(ReturnReason $return_reason)
    {
        return Validator::make($return_reason->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
