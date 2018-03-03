<?php

// Admin  routes  for coupon
Route::group(['prefix' => '/admin/coupon'], function () {
    Route::put('news/workflow/{coupon}/{step}', 'CouponAdminController@putWorkflow');
    Route::get('coupon/check/code', 'CouponAdminController@checkCode');
    Route::resource('coupon', 'CouponAdminController');
});


// User  routes for coupon
Route::group(['prefix' => '/user/coupon'], function () {
    Route::resource('coupon', 'CouponUserController');
});

// Public  routes for coupon
Route::group(['prefix' => '/coupons'], function () {
    Route::get('news/workflow/{coupon}/{step}/{user}', 'CouponController@getWorkflow');
    Route::post('coupon/check', 'CouponPublicController@checkCoupon');
    Route::get('/', 'CouponPublicController@index');
    Route::get('/{slug?}', 'CouponPublicController@show');
});


