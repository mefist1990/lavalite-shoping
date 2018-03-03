<?php

namespace Laracart\Review\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ReviewItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Review\Models\Review $review)
    {
        return [
            'id'                => $review->getRouteKey(),
            'product_id'        => $review->product_id,
            'description'       => $review->description,
            'status'            => $review->status,
            'score'            => $review->score,
            'status'            => trans('app.'.$review->status),
            'created_at'        => format_date($review->created_at),
            'updated_at'        => format_date($review->updated_at),
        ];
    }
}