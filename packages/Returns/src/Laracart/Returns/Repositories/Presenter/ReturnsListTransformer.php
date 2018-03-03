<?php

namespace Laracart\Returns\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ReturnsListTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Returns\Models\Returns $returns)
    {
        return [
            'id'                => $returns->getRouteKey(),
            'return_id'         => $returns->return_id,
            'order_id'          => 'OD-'.$returns->order_id,
            'product_id'        => $returns->product_id,
            'product'           => $returns->product,
            'customer_id'       => $returns->customer_id,
            'user_id'           => $returns->client->name,
            'return_reason_id'  => @$returns->reasons->name,
            'return_action_id'  => $returns->return_action_id,
            'return_status_id'  => $returns->return_status_id,
            'comment'           => $returns->comment,
            'date_ordered'      => $returns->date_ordered,
            'date_added'        => $returns->date_added,
            'date_modified'     => $returns->date_modified,
            'status'            => $returns->status,
            'created_at'        => format_date($returns->created_at),
            'updated_at'        => format_date($returns->updated_at),
        ];
    }
}