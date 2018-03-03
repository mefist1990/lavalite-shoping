<?php

namespace Laracart\Attribute\Workflow;

use Laracart\Attribute\Models\Attribute;
use Validator;

class AttributeValidator
{

    /**
     * Determine if the given attribute is valid for complete status.
     *
     * @param Attribute $attribute
     *
     * @return bool / Validator
     */
    public function complete(Attribute $attribute)
    {
        return Validator::make($attribute->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given attribute is valid for verify status.
     *
     * @param Attribute $attribute
     *
     * @return bool / Validator
     */
    public function verify(Attribute $attribute)
    {
        return Validator::make($attribute->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given attribute is valid for approve status.
     *
     * @param Attribute $attribute
     *
     * @return bool / Validator
     */
    public function approve(Attribute $attribute)
    {
        return Validator::make($attribute->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given attribute is valid for publish status.
     *
     * @param Attribute $attribute
     *
     * @return bool / Validator
     */
    public function publish(Attribute $attribute)
    {
        return Validator::make($attribute->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given attribute is valid for archive status.
     *
     * @param Attribute $attribute
     *
     * @return bool / Validator
     */
    public function archive(Attribute $attribute)
    {
        return Validator::make($attribute->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given attribute is valid for unpublish status.
     *
     * @param Attribute $attribute
     *
     * @return bool / Validator
     */
    public function unpublish(Attribute $attribute)
    {
        return Validator::make($attribute->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
