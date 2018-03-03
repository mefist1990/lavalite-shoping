<?php

namespace Litecms\Newsletter\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class NewsletterItemTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Newsletter\Models\Newsletter $newsletter)
    {
        return [
            'id'                => $newsletter->getRouteKey(),
            'name'              => $newsletter->name,
            'email'             => $newsletter->email,
            'phone'             => $newsletter->phone,
            'status'            => trans('app.'.$newsletter->status),
            'created_at'        => format_date($newsletter->created_at),
            'updated_at'        => format_date($newsletter->updated_at),
        ];
    }
}