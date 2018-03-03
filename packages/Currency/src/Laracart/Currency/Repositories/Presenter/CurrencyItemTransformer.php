<?php

namespace Laracart\Currency\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class CurrencyItemTransformer extends TransformerAbstract
{
    public function transform(\Laracart\Currency\Models\Currency $currency)
    {
        return [
            'id'                => $currency->getRouteKey(),
            'title'             => $currency->title,
            'code'              => $currency->code,
            'symbol_left'       => $currency->symbol_left,
            'symbol_right'      => $currency->symbol_right,
            'decimal_place'     => $currency->decimal_place,
            'value'             => $currency->value,
            'status'            => $currency->status,
            'status'            => trans('app.'.$currency->status),
            'created_at'        => format_date($currency->created_at),
            'updated_at'        => format_date($currency->updated_at),
        ];
    }
}