<?php

namespace Laracart\Returns\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ReturnsItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Returns\Models\Returns $returns)
    {
        return [
            'id'                => $returns->getRouteKey(),
            'return_id'         => $returns->return_id,
            'order_id'          => $returns->order_id,
            'product_id'        => $returns->product_id,
            'customer_id'       => $returns->customer_id,
            'return_reason_id'  => $returns->return_reason_id,
            'return_action_id'  => $returns->return_action_id,
            'return_status_id'  => $returns->return_status_id,
            'comment'           => $returns->comment,
            'date_ordered'      => $returns->date_ordered,
            'date_added'        => $returns->date_added,
            'date_modified'     => $returns->date_modified,
            'status'            => trans('app.'.$returns->status),
            'created_at'        => format_date($returns->created_at),
            'updated_at'        => format_date($returns->updated_at),
        ];
    }
}