<?php

namespace Laracart\Cart\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class CartItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Cart\Models\Cart $cart)
    {
        return [
            'id'                => $cart->getRouteKey(),
            'identifier'        => $cart->identifier,
            'instance'          => $cart->instance,
            'content'           => $cart->content,
            'status'            => trans('app.'.$cart->status),
            'created_at'        => format_date($cart->created_at),
            'updated_at'        => format_date($cart->updated_at),
        ];
    }
}