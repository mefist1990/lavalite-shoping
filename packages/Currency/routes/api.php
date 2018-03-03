<?php

// Admin routes  for currency
Route::group(['prefix' => 'admin/currency'], function () {
    Route::resource('currency', 'CurrencyAdminController');
});

// User routes for currency
Route::group(['prefix' => 'user/currency'], function () {
    Route::resource('currency', 'CurrencyUserController');
});

// Public routes for currency
Route::group(['prefix' => 'currencies'], function () {
    Route::get('/', 'CurrencyPublicController@index');
    Route::get('/{slug?}', 'CurrencyPublicController@show');
});

