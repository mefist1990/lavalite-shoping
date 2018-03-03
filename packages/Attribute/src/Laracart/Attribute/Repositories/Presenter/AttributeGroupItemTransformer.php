<?php

namespace Laracart\Attribute\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class AttributeGroupItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Attribute\Models\AttributeGroup $attribute_group)
    {
        return [
            'id'                => $attribute_group->getRouteKey(),
            'name'              => $attribute_group->name,
            'order'             => $attribute_group->order,
            'status'            => trans('app.'.$attribute_group->status),
            'created_at'        => format_date($attribute_group->created_at),
            'updated_at'        => format_date($attribute_group->updated_at),
        ];
    }
}