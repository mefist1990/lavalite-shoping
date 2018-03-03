<?php

namespace Litecms\Blog\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Litecms\Blog\Models\Category;

class CategoryAction
{
    /**
     * Perform the complete action.
     *
     * @param Category $category
     *
     * @return Category
     */
    public function complete(Category $category)
    {
        try {
            $category->status = 'complete';
            return $category->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Category $category
     *
     * @return Category
     */public function verify(Category $category)
    {
        try {
            $category->status = 'verify';
            return $category->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Category $category
     *
     * @return Category
     */public function approve(Category $category)
    {
        try {
            $category->status = 'approve';
            return $category->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Category $category
     *
     * @return Category
     */public function publish(Category $category)
    {
        try {
            $category->status = 'publish';
            return $category->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Category $category
     *
     * @return Category
     */
    public function archive(Category $category)
    {
        try {
            $category->status = 'archive';
            return $category->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Category $category
     *
     * @return Category
     */
    public function unpublish(Category $category)
    {
        try {
            $category->status = 'unpublish';
            return $category->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
