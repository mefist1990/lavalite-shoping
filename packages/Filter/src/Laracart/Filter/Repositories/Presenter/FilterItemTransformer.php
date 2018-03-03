<?php

namespace Laracart\Filter\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class FilterItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Filter\Models\Filter $filter)
    {
        return [
            'id'                => $filter->getRouteKey(),
            'name'              => $filter->name,
            'order'             => $filter->order,
            'filter_id'         => $filter->filter_id,
            'status'            => trans('app.'.$filter->status),
            'created_at'        => format_date($filter->created_at),
            'updated_at'        => format_date($filter->updated_at),
        ];
    }
}