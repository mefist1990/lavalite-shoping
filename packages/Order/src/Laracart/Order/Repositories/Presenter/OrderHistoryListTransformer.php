<?php

namespace Laracart\Order\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class OrderHistoryListTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Order\Models\OrderHistory $order_history)
    {
        return [
            'id'                => $order_history->getRouteKey(),
            'order_id'          => $order_history->order_id,
            'order_status_id'   => $order_history->order_status_id,
            'notify'            => $order_history->notify,
            'comment'           => $order_history->comment,
            
            'status'            => trans('app.'.$order_history->status),
            'created_at'        => format_date($order_history->created_at),
            'updated_at'        => format_date($order_history->updated_at),
        ];
    }
}