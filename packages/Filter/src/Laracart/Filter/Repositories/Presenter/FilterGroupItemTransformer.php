<?php

namespace Laracart\Filter\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class FilterGroupItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Filter\Models\FilterGroup $filter_group)
    {
        return [
            'id'                => $filter_group->getRouteKey(),
            'name'              => $filter_group->name,
            'order'             => $filter_group->order,
            'status'            => trans('app.'.$filter_group->status),
            'created_at'        => format_date($filter_group->created_at),
            'updated_at'        => format_date($filter_group->updated_at),
        ];
    }
}