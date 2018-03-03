<?php

// Admin  routes  for cart
Route::group(['prefix' => '/admin/cart'], function () {
    Route::put('news/workflow/{cart}/{step}', 'CartAdminController@putWorkflow');
    Route::resource('cart', 'CartAdminController');
});


// User  routes for cart
Route::group(['prefix' => '/user/cart'], function () {
    Route::resource('cart', 'CartUserController');
});

// Public  routes for cart
Route::group(['prefix' => '/carts'], function () {
	Route::post('cart/add', 'CartPublicController@addCart');
	Route::post('cart/delete', 'CartPublicController@deleteCart');
	Route::post('cart/edit', 'CartPublicController@editCart');
	Route::post('cart/update', 'CartPublicController@updateCart');
    Route::get('news/workflow/{cart}/{step}/{user}', 'CartController@getWorkflow');
    Route::get('/', 'CartPublicController@index');
    Route::get('/{slug?}', 'CartPublicController@show');
    Route::get('/cart/latest', 'CartPublicController@latest');
    Route::post('/cart/clear', 'CartPublicController@clear');
});


