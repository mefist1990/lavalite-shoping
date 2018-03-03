<?php

namespace Laracart\Filter\Workflow;

use Laracart\Filter\Models\FilterGroup;
use Validator;

class FilterGroupValidator
{

    /**
     * Determine if the given filter_group is valid for complete status.
     *
     * @param FilterGroup $filter_group
     *
     * @return bool / Validator
     */
    public function complete(FilterGroup $filter_group)
    {
        return Validator::make($filter_group->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given filter_group is valid for verify status.
     *
     * @param FilterGroup $filter_group
     *
     * @return bool / Validator
     */
    public function verify(FilterGroup $filter_group)
    {
        return Validator::make($filter_group->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given filter_group is valid for approve status.
     *
     * @param FilterGroup $filter_group
     *
     * @return bool / Validator
     */
    public function approve(FilterGroup $filter_group)
    {
        return Validator::make($filter_group->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given filter_group is valid for publish status.
     *
     * @param FilterGroup $filter_group
     *
     * @return bool / Validator
     */
    public function publish(FilterGroup $filter_group)
    {
        return Validator::make($filter_group->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given filter_group is valid for archive status.
     *
     * @param FilterGroup $filter_group
     *
     * @return bool / Validator
     */
    public function archive(FilterGroup $filter_group)
    {
        return Validator::make($filter_group->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given filter_group is valid for unpublish status.
     *
     * @param FilterGroup $filter_group
     *
     * @return bool / Validator
     */
    public function unpublish(FilterGroup $filter_group)
    {
        return Validator::make($filter_group->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
