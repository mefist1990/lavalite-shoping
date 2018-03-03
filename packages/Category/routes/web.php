<?php

// Admin  routes  for category
Route::group(['prefix' => '/admin/category'], function () {
    Route::put('news/workflow/{category}/{step}', 'CategoryAdminController@putWorkflow');
    Route::get('category/select2', 'CategoryAdminController@select2');

    Route::resource('category', 'CategoryAdminController');
});


// User  routes for category
Route::group(['prefix' => '/user/category'], function () {
    Route::resource('category', 'CategoryUserController');
});

// Public  routes for category
Route::group(['prefix' => '/categories'], function () {
    Route::get('news/workflow/{category}/{step}/{user}', 'CategoryController@getWorkflow');
    Route::get('/', 'CategoryPublicController@index');
    Route::get('/{slug?}', 'CategoryPublicController@show');
    Route::get('category/select2', 'CategoryPublicController@select2');
});


