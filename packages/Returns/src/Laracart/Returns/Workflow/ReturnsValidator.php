<?php

namespace Laracart\Returns\Workflow;

use Laracart\Returns\Models\Returns;
use Validator;

class ReturnsValidator
{

    /**
     * Determine if the given returns is valid for complete status.
     *
     * @param Returns $returns
     *
     * @return bool / Validator
     */
    public function complete(Returns $returns)
    {
        return Validator::make($returns->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given returns is valid for verify status.
     *
     * @param Returns $returns
     *
     * @return bool / Validator
     */
    public function verify(Returns $returns)
    {
        return Validator::make($returns->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given returns is valid for approve status.
     *
     * @param Returns $returns
     *
     * @return bool / Validator
     */
    public function approve(Returns $returns)
    {
        return Validator::make($returns->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given returns is valid for publish status.
     *
     * @param Returns $returns
     *
     * @return bool / Validator
     */
    public function publish(Returns $returns)
    {
        return Validator::make($returns->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given returns is valid for archive status.
     *
     * @param Returns $returns
     *
     * @return bool / Validator
     */
    public function archive(Returns $returns)
    {
        return Validator::make($returns->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given returns is valid for unpublish status.
     *
     * @param Returns $returns
     *
     * @return bool / Validator
     */
    public function unpublish(Returns $returns)
    {
        return Validator::make($returns->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
