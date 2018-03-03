<?php

namespace Laracart\Filter\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Filter\Models\FilterGroup;

class FilterGroupAction
{
    /**
     * Perform the complete action.
     *
     * @param FilterGroup $filter_group
     *
     * @return FilterGroup
     */
    public function complete(FilterGroup $filter_group)
    {
        try {
            $filter_group->status = 'complete';
            return $filter_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param FilterGroup $filter_group
     *
     * @return FilterGroup
     */public function verify(FilterGroup $filter_group)
    {
        try {
            $filter_group->status = 'verify';
            return $filter_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param FilterGroup $filter_group
     *
     * @return FilterGroup
     */public function approve(FilterGroup $filter_group)
    {
        try {
            $filter_group->status = 'approve';
            return $filter_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param FilterGroup $filter_group
     *
     * @return FilterGroup
     */public function publish(FilterGroup $filter_group)
    {
        try {
            $filter_group->status = 'publish';
            return $filter_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param FilterGroup $filter_group
     *
     * @return FilterGroup
     */
    public function archive(FilterGroup $filter_group)
    {
        try {
            $filter_group->status = 'archive';
            return $filter_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param FilterGroup $filter_group
     *
     * @return FilterGroup
     */
    public function unpublish(FilterGroup $filter_group)
    {
        try {
            $filter_group->status = 'unpublish';
            return $filter_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
