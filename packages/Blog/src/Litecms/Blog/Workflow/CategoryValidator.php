<?php

namespace Litecms\Blog\Workflow;

use Litecms\Blog\Models\Category;
use Validator;

class CategoryValidator
{

    /**
     * Determine if the given category is valid for complete status.
     *
     * @param Category $category
     *
     * @return bool / Validator
     */
    public function complete(Category $category)
    {
        return Validator::make($category->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given category is valid for verify status.
     *
     * @param Category $category
     *
     * @return bool / Validator
     */
    public function verify(Category $category)
    {
        return Validator::make($category->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given category is valid for approve status.
     *
     * @param Category $category
     *
     * @return bool / Validator
     */
    public function approve(Category $category)
    {
        return Validator::make($category->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given category is valid for publish status.
     *
     * @param Category $category
     *
     * @return bool / Validator
     */
    public function publish(Category $category)
    {
        return Validator::make($category->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given category is valid for archive status.
     *
     * @param Category $category
     *
     * @return bool / Validator
     */
    public function archive(Category $category)
    {
        return Validator::make($category->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given category is valid for unpublish status.
     *
     * @param Category $category
     *
     * @return bool / Validator
     */
    public function unpublish(Category $category)
    {
        return Validator::make($category->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
