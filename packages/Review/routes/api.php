<?php

// Admin routes  for review
Route::group(['prefix' => 'admin/review'], function () {
    Route::resource('review', 'ReviewAdminController');
});

// User routes for review
Route::group(['prefix' => 'user/review'], function () {
    Route::resource('review', 'ReviewUserController');
});

// Public routes for review
Route::group(['prefix' => 'reviews'], function () {
    Route::get('/', 'ReviewPublicController@index');
    Route::get('/{slug?}', 'ReviewPublicController@show');
});

