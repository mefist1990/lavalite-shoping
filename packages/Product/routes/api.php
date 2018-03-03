<?php

// Admin routes  for product
Route::group(['prefix' => 'admin/product'], function () {
    Route::resource('product', 'ProductAdminController');
});

// User routes for product
Route::group(['prefix' => 'user/product'], function () {
    Route::resource('product', 'ProductUserController');
});

// Public routes for product
Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductPublicController@index');
    Route::get('/{slug?}', 'ProductPublicController@show');
});

