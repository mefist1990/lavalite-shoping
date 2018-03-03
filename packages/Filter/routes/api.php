<?php

// Admin routes  for filter
Route::group(['prefix' => 'admin/filter'], function () {
    Route::resource('filter', 'FilterAdminController');
});

// User routes for filter
Route::group(['prefix' => 'user/filter'], function () {
    Route::resource('filter', 'FilterUserController');
});

// Public routes for filter
Route::group(['prefix' => 'filters'], function () {
    Route::get('/', 'FilterPublicController@index');
    Route::get('/{slug?}', 'FilterPublicController@show');
});


// Admin routes  for filter_group
Route::group(['prefix' => 'admin/filter'], function () {
    Route::resource('filter_group', 'FilterGroupAdminController');
});

// User routes for filter_group
Route::group(['prefix' => 'user/filter'], function () {
    Route::resource('filter_group', 'FilterGroupUserController');
});

// Public routes for filter_group
Route::group(['prefix' => 'filters'], function () {
    Route::get('/', 'FilterGroupPublicController@index');
    Route::get('/{slug?}', 'FilterGroupPublicController@show');
});

