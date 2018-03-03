<?php

// Admin routes  for coupon
Route::group(['prefix' => 'admin/coupon'], function () {
    Route::resource('coupon', 'CouponAdminController');
});

// User routes for coupon
Route::group(['prefix' => 'user/coupon'], function () {
    Route::resource('coupon', 'CouponUserController');
});

// Public routes for coupon
Route::group(['prefix' => 'coupons'], function () {
    Route::get('/', 'CouponPublicController@index');
    Route::get('/{slug?}', 'CouponPublicController@show');
});

