<?php

namespace Litecms\Blog\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class BlogItemTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Blog\Models\Blog $blog)
    {
        return [
            'id'                => $blog->getRouteKey(),
            'category_id'       => $blog->category_id,
            'title'             => $blog->title,
            'details'           => $blog->details,
            'image'             => $blog->image,
            'images'            => $blog->images,
            'viewcount'         => $blog->viewcount,
            'status'            => $blog->status,
            'posted_on'         => $blog->posted_on,
            'status'            => trans('app.'.$blog->status),
            'created_at'        => format_date($blog->created_at),
            'updated_at'        => format_date($blog->updated_at),
        ];
    }
}