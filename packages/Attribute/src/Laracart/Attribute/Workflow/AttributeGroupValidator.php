<?php

namespace Laracart\Attribute\Workflow;

use Laracart\Attribute\Models\AttributeGroup;
use Validator;

class AttributeGroupValidator
{

    /**
     * Determine if the given attribute_group is valid for complete status.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return bool / Validator
     */
    public function complete(AttributeGroup $attribute_group)
    {
        return Validator::make($attribute_group->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given attribute_group is valid for verify status.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return bool / Validator
     */
    public function verify(AttributeGroup $attribute_group)
    {
        return Validator::make($attribute_group->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given attribute_group is valid for approve status.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return bool / Validator
     */
    public function approve(AttributeGroup $attribute_group)
    {
        return Validator::make($attribute_group->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given attribute_group is valid for publish status.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return bool / Validator
     */
    public function publish(AttributeGroup $attribute_group)
    {
        return Validator::make($attribute_group->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given attribute_group is valid for archive status.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return bool / Validator
     */
    public function archive(AttributeGroup $attribute_group)
    {
        return Validator::make($attribute_group->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given attribute_group is valid for unpublish status.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return bool / Validator
     */
    public function unpublish(AttributeGroup $attribute_group)
    {
        return Validator::make($attribute_group->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
