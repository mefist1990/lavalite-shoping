<?php

namespace Laracart\Returns\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Returns\Models\ReturnReason;

class ReturnReasonAction
{
    /**
     * Perform the complete action.
     *
     * @param ReturnReason $return_reason
     *
     * @return ReturnReason
     */
    public function complete(ReturnReason $return_reason)
    {
        try {
            $return_reason->status = 'complete';
            return $return_reason->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param ReturnReason $return_reason
     *
     * @return ReturnReason
     */public function verify(ReturnReason $return_reason)
    {
        try {
            $return_reason->status = 'verify';
            return $return_reason->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param ReturnReason $return_reason
     *
     * @return ReturnReason
     */public function approve(ReturnReason $return_reason)
    {
        try {
            $return_reason->status = 'approve';
            return $return_reason->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param ReturnReason $return_reason
     *
     * @return ReturnReason
     */public function publish(ReturnReason $return_reason)
    {
        try {
            $return_reason->status = 'publish';
            return $return_reason->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param ReturnReason $return_reason
     *
     * @return ReturnReason
     */
    public function archive(ReturnReason $return_reason)
    {
        try {
            $return_reason->status = 'archive';
            return $return_reason->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param ReturnReason $return_reason
     *
     * @return ReturnReason
     */
    public function unpublish(ReturnReason $return_reason)
    {
        try {
            $return_reason->status = 'unpublish';
            return $return_reason->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
