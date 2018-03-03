<?php

namespace Laracart\Product\Workflow;

use Laracart\Product\Models\Product;
use Validator;

class ProductValidator
{

    /**
     * Determine if the given product is valid for complete status.
     *
     * @param Product $product
     *
     * @return bool / Validator
     */
    public function complete(Product $product)
    {
        return Validator::make($product->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given product is valid for verify status.
     *
     * @param Product $product
     *
     * @return bool / Validator
     */
    public function verify(Product $product)
    {
        return Validator::make($product->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given product is valid for approve status.
     *
     * @param Product $product
     *
     * @return bool / Validator
     */
    public function approve(Product $product)
    {
        return Validator::make($product->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given product is valid for publish status.
     *
     * @param Product $product
     *
     * @return bool / Validator
     */
    public function publish(Product $product)
    {
        return Validator::make($product->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given product is valid for archive status.
     *
     * @param Product $product
     *
     * @return bool / Validator
     */
    public function archive(Product $product)
    {
        return Validator::make($product->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given product is valid for unpublish status.
     *
     * @param Product $product
     *
     * @return bool / Validator
     */
    public function unpublish(Product $product)
    {
        return Validator::make($product->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
