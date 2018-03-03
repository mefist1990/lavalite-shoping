<?php

// Admin routes  for cart
Route::group(['prefix' => 'admin/cart'], function () {
    Route::resource('cart', 'CartAdminController');
});

// User routes for cart
Route::group(['prefix' => 'user/cart'], function () {
    Route::resource('cart', 'CartUserController');
});

// Public routes for cart
Route::group(['prefix' => 'carts'], function () {
    Route::get('/', 'CartPublicController@index');
    Route::get('/{slug?}', 'CartPublicController@show');
});

