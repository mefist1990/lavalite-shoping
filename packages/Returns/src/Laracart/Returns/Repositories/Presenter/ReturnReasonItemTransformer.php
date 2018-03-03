<?php

namespace Laracart\Returns\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ReturnReasonItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Returns\Models\ReturnReason $return_reason)
    {
        return [
            'id'                => $return_reason->getRouteKey(),
            'return_reason_id'  => $return_reason->return_reason_id,
            'language_id'       => $return_reason->language_id,
            'name'              => $return_reason->name,
            'status'            => trans('app.'.$return_reason->status),
            'created_at'        => format_date($return_reason->created_at),
            'updated_at'        => format_date($return_reason->updated_at),
        ];
    }
}