<?php

// Admin  routes  for review
Route::group(['prefix' => '/admin/review'], function () {
    Route::put('news/workflow/{review}/{step}', 'ReviewAdminController@putWorkflow');
    Route::post('review/status/{review?}', 'ReviewAdminController@update'); 
    Route::resource('review', 'ReviewAdminController');
});


// User  routes for review
Route::group(['prefix' => '/user/review'], function () {
    Route::resource('review', 'ReviewUserController');
});

// Client  routes for review
Route::group(['prefix' => '/client/review'], function () {
    Route::resource('review', 'ReviewClientController');
});


// Public  routes for review
Route::group(['prefix' => '/reviews'], function () {
    Route::get('news/workflow/{review}/{step}/{user}', 'ReviewController@getWorkflow');
    Route::get('/', 'ReviewPublicController@index');
    Route::get('/{slug?}', 'ReviewPublicController@show');
});


