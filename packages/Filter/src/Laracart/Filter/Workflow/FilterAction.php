<?php

namespace Laracart\Filter\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Filter\Models\Filter;

class FilterAction
{
    /**
     * Perform the complete action.
     *
     * @param Filter $filter
     *
     * @return Filter
     */
    public function complete(Filter $filter)
    {
        try {
            $filter->status = 'complete';
            return $filter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Filter $filter
     *
     * @return Filter
     */public function verify(Filter $filter)
    {
        try {
            $filter->status = 'verify';
            return $filter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Filter $filter
     *
     * @return Filter
     */public function approve(Filter $filter)
    {
        try {
            $filter->status = 'approve';
            return $filter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Filter $filter
     *
     * @return Filter
     */public function publish(Filter $filter)
    {
        try {
            $filter->status = 'publish';
            return $filter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Filter $filter
     *
     * @return Filter
     */
    public function archive(Filter $filter)
    {
        try {
            $filter->status = 'archive';
            return $filter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Filter $filter
     *
     * @return Filter
     */
    public function unpublish(Filter $filter)
    {
        try {
            $filter->status = 'unpublish';
            return $filter->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
