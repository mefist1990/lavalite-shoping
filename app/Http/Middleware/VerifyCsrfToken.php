<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
         'favourite'=>'/*product/favourite*/',
         'removefav'=>'/*product/removefav*/',
         'carts'=>'/*carts/cart/add*/',
         'remove'=>'/*carts/cart/delete*/',
         'edit'=>'/*carts/cart/edit*/',
         'update'=>'/*carts/cart/update*/',
         'coupon'=>'/*coupons/coupon/check*/',
         'track'=>'/*orders/order/track/status*/'
    ];
}
