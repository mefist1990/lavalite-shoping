<?php

namespace Laracart\Attribute\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Attribute\Models\AttributeGroup;

class AttributeGroupAction
{
    /**
     * Perform the complete action.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return AttributeGroup
     */
    public function complete(AttributeGroup $attribute_group)
    {
        try {
            $attribute_group->status = 'complete';
            return $attribute_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return AttributeGroup
     */public function verify(AttributeGroup $attribute_group)
    {
        try {
            $attribute_group->status = 'verify';
            return $attribute_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return AttributeGroup
     */public function approve(AttributeGroup $attribute_group)
    {
        try {
            $attribute_group->status = 'approve';
            return $attribute_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return AttributeGroup
     */public function publish(AttributeGroup $attribute_group)
    {
        try {
            $attribute_group->status = 'publish';
            return $attribute_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return AttributeGroup
     */
    public function archive(AttributeGroup $attribute_group)
    {
        try {
            $attribute_group->status = 'archive';
            return $attribute_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param AttributeGroup $attribute_group
     *
     * @return AttributeGroup
     */
    public function unpublish(AttributeGroup $attribute_group)
    {
        try {
            $attribute_group->status = 'unpublish';
            return $attribute_group->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
