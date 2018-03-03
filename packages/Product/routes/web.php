<?php

// Admin  routes  for product
Route::group(['prefix' => '/admin/product'], function () {
    Route::put('news/workflow/{product}/{step}', 'ProductAdminController@putWorkflow');
    Route::get('product/select2', 'ProductAdminController@select2');

    Route::resource('product', 'ProductAdminController');
});

// Client  routes for product
Route::group(['prefix' => '/client/product'], function () {
    Route::post('product/favourite/{product}', 'ProductClientController@favourite');
    Route::post('product/removefav/{product}', 'ProductClientController@removeFavourite');
    Route::get('product/favourite', 'ProductClientController@myFavourite');    
    Route::resource('product', 'ProductClientController');
});

// User  routes for product
Route::group(['prefix' => '/user/product'], function () {
    Route::resource('product', 'ProductUserController');
});

// Public  routes for product
Route::group(['prefix' => '/products'], function () {
    Route::get('news/workflow/{product}/{step}/{user}', 'ProductController@getWorkflow');
    Route::get('/', 'ProductPublicController@index');
    Route::get('/{slug?}', 'ProductPublicController@show');
});


