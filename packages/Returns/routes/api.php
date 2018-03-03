<?php

// Admin routes  for returns
Route::group(['prefix' => 'admin/returns'], function () {
    Route::resource('returns', 'ReturnsAdminController');
});

// User routes for returns
Route::group(['prefix' => 'user/returns'], function () {
    Route::resource('returns', 'ReturnsUserController');
});

// Public routes for returns
Route::group(['prefix' => 'returns'], function () {
    Route::get('/', 'ReturnsPublicController@index');
    Route::get('/{slug?}', 'ReturnsPublicController@show');
});


// Admin routes  for return_reason
Route::group(['prefix' => 'admin/returns'], function () {
    Route::resource('return_reason', 'ReturnReasonAdminController');
});

// User routes for return_reason
Route::group(['prefix' => 'user/returns'], function () {
    Route::resource('return_reason', 'ReturnReasonUserController');
});

// Public routes for return_reason
Route::group(['prefix' => 'returns'], function () {
    Route::get('/', 'ReturnReasonPublicController@index');
    Route::get('/{slug?}', 'ReturnReasonPublicController@show');
});

