<?php

namespace Laracart\Category\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class CategoryItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Category\Models\Category $category)
    {
        return [
            'id'                => $category->getRouteKey(),
            'parent_id'         => $category->parent_id,
            'name'              => $category->name,
            'status'            => $category->status,
            'meta_title'        => $category->meta_title,
            'meta_description'  => $category->meta_description,
            'meta_keyword'      => $category->meta_keyword,
            'image'             => $category->image,
            'top'               => $category->top,
            'order'             => $category->order,
            'status'            => trans('app.'.$category->status),
            'created_at'        => format_date($category->created_at),
            'updated_at'        => format_date($category->updated_at),
        ];
    }
}