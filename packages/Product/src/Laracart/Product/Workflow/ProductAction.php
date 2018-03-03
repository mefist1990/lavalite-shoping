<?php

namespace Laracart\Product\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Laracart\Product\Models\Product;

class ProductAction
{
    /**
     * Perform the complete action.
     *
     * @param Product $product
     *
     * @return Product
     */
    public function complete(Product $product)
    {
        try {
            $product->status = 'complete';
            return $product->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Product $product
     *
     * @return Product
     */public function verify(Product $product)
    {
        try {
            $product->status = 'verify';
            return $product->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Product $product
     *
     * @return Product
     */public function approve(Product $product)
    {
        try {
            $product->status = 'approve';
            return $product->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Product $product
     *
     * @return Product
     */public function publish(Product $product)
    {
        try {
            $product->status = 'publish';
            return $product->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Product $product
     *
     * @return Product
     */
    public function archive(Product $product)
    {
        try {
            $product->status = 'archive';
            return $product->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Product $product
     *
     * @return Product
     */
    public function unpublish(Product $product)
    {
        try {
            $product->status = 'unpublish';
            return $product->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
