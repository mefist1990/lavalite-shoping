<?php

namespace Laracart\Product\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ProductListTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Product\Models\Product $product)
    {
        return [
            'id'                => $product->getRouteKey(),
            'model'             => $product->model,
            'download'          => $product->download,
            'related_products'  => $product->related_products,
            'name'              => $product->name,
            'price'             => $product->price,
            'status'            => $product->status,
            'quantity'          => $product->quantity,
            'description'       => $product->description,
            'return_policy'     => $product->return_policy,
            'meta_title'        => $product->meta_title,
            'meta_description'  => $product->meta_description,
            'meta_keyword'      => $product->meta_keyword,
            'tags'              => $product->tags,
            'image'             => $product->image,
            'sku'               => $product->sku,
            'upc'               => $product->upc,
            'ean'               => $product->ean,
            'jan'               => $product->jan,
            'isbn'              => $product->isbn,
            'mpn'               => $product->mpn,
            'location'          => $product->location,
            'tax_class'         => $product->tax_class,
            'substract_stock'   => $product->substract_stock,
            'outofstock_status' => $product->outofstock_status,
            'seo_keyword'       => $product->seo_keyword,
            'order'             => $product->order,
            'dimensions'        => $product->dimensions,
            'weight_class'      => $product->weight_class,
            'length_class'      => $product->length_class,
            'date_available'    => $product->date_available,
            'manufacturer'      => $product->manufacturer,
            'attributes'        => $product->attributes,
            'discounts'         => $product->discounts,
            'special'           => $product->special,
            'images'            => $product->images,
            'slug'              => $product->slug,
            'status'            => ucfirst($product->status),
            'created_at'        => format_date($product->created_at),
            'updated_at'        => format_date($product->updated_at),

        ];
    }
}