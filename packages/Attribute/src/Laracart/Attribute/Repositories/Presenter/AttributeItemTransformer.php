<?php

namespace Laracart\Attribute\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class AttributeItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Attribute\Models\Attribute $attribute)
    {
        return [
            'id'                => $attribute->getRouteKey(),
            'group_id'          => $attribute->group_id,
            'name'              => $attribute->name,
            'order'             => $attribute->order,
            'status'            => trans('app.'.$attribute->status),
            'created_at'        => format_date($attribute->created_at),
            'updated_at'        => format_date($attribute->updated_at),
        ];
    }
}