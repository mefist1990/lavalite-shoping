<?php

namespace Laracart\Order\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class OrderStatusItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Order\Models\OrderStatus $order_status)
    {
        return [
            'id'                => $order_status->getRouteKey(),
            'name'              => $order_status->name,
            'status'            => trans('app.'.$order_status->status),
            'created_at'        => format_date($order_status->created_at),
            'updated_at'        => format_date($order_status->updated_at),
        ];
    }
}