<?php

namespace Laracart\Product\Workflow;

use Laracart\Product\Models\Product;
use Laracart\Product\Notifications\Product as ProductNotifyer;
use Notification;

class ProductNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Product $product
     *
     * @return void
     */
    public function complete(Product $product)
    {
        return Notification::send($product->user, new ProductNotifyer($product, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Product $product
     *
     * @return void
     */
    public function verify(Product $product)
    {
        return Notification::send($product->user, new ProductNotifyer($product, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Product $product
     *
     * @return void
     */
    public function approve(Product $product)
    {
        return Notification::send($product->user, new ProductNotifyer($product, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Product $product
     *
     * @return void
     */
    public function publish(Product $product)
    {
        return Notification::send($product->user, new ProductNotifyer($product, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Product $product
     *
     * @return void
     */
    public function archive(Product $product)
    {
        return Notification::send($product->user, new ProductNotifyer($product, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Product $product
     *
     * @return void
     */
    public function unpublish(Product $product)
    {
        return Notification::send($product->user, new ProductNotifyer($product, 'unpublish'));;

    }
}
