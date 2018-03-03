<?php

namespace Laracart\Returns\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Returns\Models\Returns;

class ReturnsAction
{
    /**
     * Perform the complete action.
     *
     * @param Returns $returns
     *
     * @return Returns
     */
    public function complete(Returns $returns)
    {
        try {
            $returns->status = 'complete';
            return $returns->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Returns $returns
     *
     * @return Returns
     */public function verify(Returns $returns)
    {
        try {
            $returns->status = 'verify';
            return $returns->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Returns $returns
     *
     * @return Returns
     */public function approve(Returns $returns)
    {
        try {
            $returns->status = 'approve';
            return $returns->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Returns $returns
     *
     * @return Returns
     */public function publish(Returns $returns)
    {
        try {
            $returns->status = 'publish';
            return $returns->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Returns $returns
     *
     * @return Returns
     */
    public function archive(Returns $returns)
    {
        try {
            $returns->status = 'archive';
            return $returns->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Returns $returns
     *
     * @return Returns
     */
    public function unpublish(Returns $returns)
    {
        try {
            $returns->status = 'unpublish';
            return $returns->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
