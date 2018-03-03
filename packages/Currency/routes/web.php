<?php

// Admin  routes  for currency
Route::group(['prefix' => '/admin/currency'], function () {
    Route::put('news/workflow/{currency}/{step}', 'CurrencyAdminController@putWorkflow');
    Route::resource('currency', 'CurrencyAdminController');
});


// User  routes for currency
Route::group(['prefix' => '/user/currency'], function () {
    Route::resource('currency', 'CurrencyUserController');
});

// Public  routes for currency
Route::group(['prefix' => '/currencies'], function () {
    Route::get('news/workflow/{currency}/{step}/{user}', 'CurrencyController@getWorkflow');
    Route::get('/', 'CurrencyPublicController@index');
    Route::get('/{slug?}', 'CurrencyPublicController@show');
});


