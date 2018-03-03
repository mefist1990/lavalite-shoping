<?php

namespace Laracart\Attribute\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class AttributeListTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Attribute\Models\Attribute $attribute)
    {
        return [
            'id'                => $attribute->getRouteKey(),
            'group_id'          => @$attribute->group->name,
            'name'              => @$attribute->name,
            'order'             => @$attribute->order,
            'status'            => @$attribute->status,
            'created_at'        => format_date($attribute->created_at),
            'updated_at'        => format_date($attribute->updated_at),
        ];
    }
}