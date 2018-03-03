<?php

namespace Laracart\Filter\Workflow;

use Laracart\Filter\Models\Filter;
use Validator;

class FilterValidator
{

    /**
     * Determine if the given filter is valid for complete status.
     *
     * @param Filter $filter
     *
     * @return bool / Validator
     */
    public function complete(Filter $filter)
    {
        return Validator::make($filter->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given filter is valid for verify status.
     *
     * @param Filter $filter
     *
     * @return bool / Validator
     */
    public function verify(Filter $filter)
    {
        return Validator::make($filter->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given filter is valid for approve status.
     *
     * @param Filter $filter
     *
     * @return bool / Validator
     */
    public function approve(Filter $filter)
    {
        return Validator::make($filter->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given filter is valid for publish status.
     *
     * @param Filter $filter
     *
     * @return bool / Validator
     */
    public function publish(Filter $filter)
    {
        return Validator::make($filter->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given filter is valid for archive status.
     *
     * @param Filter $filter
     *
     * @return bool / Validator
     */
    public function archive(Filter $filter)
    {
        return Validator::make($filter->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given filter is valid for unpublish status.
     *
     * @param Filter $filter
     *
     * @return bool / Validator
     */
    public function unpublish(Filter $filter)
    {
        return Validator::make($filter->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
