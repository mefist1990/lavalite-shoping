<?php

namespace Laracart\Attribute\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Attribute\Models\Attribute;

class AttributeAction
{
    /**
     * Perform the complete action.
     *
     * @param Attribute $attribute
     *
     * @return Attribute
     */
    public function complete(Attribute $attribute)
    {
        try {
            $attribute->status = 'complete';
            return $attribute->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Attribute $attribute
     *
     * @return Attribute
     */public function verify(Attribute $attribute)
    {
        try {
            $attribute->status = 'verify';
            return $attribute->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Attribute $attribute
     *
     * @return Attribute
     */public function approve(Attribute $attribute)
    {
        try {
            $attribute->status = 'approve';
            return $attribute->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Attribute $attribute
     *
     * @return Attribute
     */public function publish(Attribute $attribute)
    {
        try {
            $attribute->status = 'publish';
            return $attribute->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Attribute $attribute
     *
     * @return Attribute
     */
    public function archive(Attribute $attribute)
    {
        try {
            $attribute->status = 'archive';
            return $attribute->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Attribute $attribute
     *
     * @return Attribute
     */
    public function unpublish(Attribute $attribute)
    {
        try {
            $attribute->status = 'unpublish';
            return $attribute->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
