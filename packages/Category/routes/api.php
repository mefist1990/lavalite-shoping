<?php

// Admin routes  for category
Route::group(['prefix' => 'admin/category'], function () {
    Route::resource('category', 'CategoryAdminController');
});

// User routes for category
Route::group(['prefix' => 'user/category'], function () {
    Route::resource('category', 'CategoryUserController');
});

// Public routes for category
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryPublicController@index');
    Route::get('/{slug?}', 'CategoryPublicController@show');
});

