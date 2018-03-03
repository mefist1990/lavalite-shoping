<?php

namespace Laracart\Category\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class CategoryListTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Category\Models\Category $category)
    {
        return [
            'id'                => $category->getRouteKey(),
            'parent_id'         => ($category->parent_id == '0' ) ? "Root" : $category->parent->name,
            'name'              => $category->name,
            'status'            => $category->status,
            'slug'              => $category->slug,
            'meta_title'        => $category->meta_title,
            'meta_description'  => $category->meta_description,
            'meta_keyword'      => $category->meta_keyword,
            'image'             => ($category->image==null)? [] : $category->image,
            'top'               => $category->top,
            'order'             => $category->order,
            'status'            => $category->status,
            'created_at'        => format_date($category->created_at),
            'updated_at'        => format_date($category->updated_at),
        ];
    }
}