<?php

// Admin routes  for order
Route::group(['prefix' => 'admin/order'], function () {
    Route::resource('order', 'OrderAdminController');
});

// User routes for order
Route::group(['prefix' => 'user'], function () {
    Route::post('/', 'OrderUserController@store');
    Route::resource('orders', 'OrderUserController');
});

// Public routes for order
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'OrderPublicController@index');
    Route::get('/{slug?}', 'OrderPublicController@show');
});


// Admin routes  for order_status
Route::group(['prefix' => 'admin/order'], function () {
    Route::resource('order_status', 'OrderStatusAdminController');
});

// User routes for order_status
Route::group(['prefix' => 'user/order'], function () {
    Route::resource('order_status', 'OrderStatusUserController');
});

// Public routes for order_status
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'OrderStatusPublicController@index');
    Route::get('/{slug?}', 'OrderStatusPublicController@show');
});


// Admin routes  for order_history
Route::group(['prefix' => 'admin/order'], function () {
    Route::resource('order_history', 'OrderHistoryAdminController');
});

// User routes for order_history
Route::group(['prefix' => 'user/order'], function () {
     Route::post('/', 'OrderHistoryUserController@store');
    Route::resource('order_history', 'OrderHistoryUserController');
});

// Public routes for order_history
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'OrderPublicController@index');
    Route::get('/{slug?}', 'OrderPublicController@index');
});