<?php

namespace Litecms\Blog\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class CategoryItemTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Blog\Models\Category $category)
    {
        return [
            'id'                => $category->getRouteKey(),
            'name'              => $category->name,
            'status'            => $category->status,
            'created_at'        => format_date($category->created_at),
            'updated_at'        => format_date($category->updated_at),
        ];
    }
}