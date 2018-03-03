<?php

namespace Laracart\Coupon\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class CouponItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Coupon\Models\Coupon $coupon)
    {
        return [
            'id'                => $coupon->getRouteKey(),
            'name'              => $coupon->name,
            'description'       => $coupon->description,
            'code'              => $coupon->code,
            'type'              => $coupon->type,
            'discount'          => $coupon->discount,
            'logged'            => $coupon->logged,
            'shipping'          => $coupon->shipping,
            'total'             => $coupon->total,
            'start_date'        => $coupon->start_date,
            'end_date'          => $coupon->end_date,
            'uses_total'        => $coupon->uses_total,
            'uses_customer'     => $coupon->uses_customer,
            'status'            => $coupon->status,
            'status'            => trans('app.'.$coupon->status),
            'created_at'        => format_date($coupon->created_at),
            'updated_at'        => format_date($coupon->updated_at),
        ];
    }
}