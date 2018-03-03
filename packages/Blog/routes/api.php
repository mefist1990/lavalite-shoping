<?php

// Admin routes  for blog
Route::group(['prefix' => 'admin/blog'], function () {
    Route::resource('blog', 'BlogAdminController');
});

// User routes for blog
Route::group(['prefix' => 'user/blog'], function () {
    Route::resource('blog', 'BlogUserController');
});

// Public routes for blog
Route::group(['prefix' => 'blogs'], function () {
    Route::get('/', 'BlogPublicController@index');
    Route::get('/{slug?}', 'BlogPublicController@show');
});


// Admin routes  for category
Route::group(['prefix' => 'admin/blog'], function () {
    Route::resource('category', 'CategoryAdminController');
});

// User routes for category
Route::group(['prefix' => 'user/blog'], function () {
    Route::resource('category', 'CategoryUserController');
});

// Public routes for category
Route::group(['prefix' => 'blogs'], function () {
    Route::get('/', 'CategoryPublicController@index');
    Route::get('/{slug?}', 'CategoryPublicController@show');
});

