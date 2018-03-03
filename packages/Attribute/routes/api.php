<?php

// Admin routes  for attribute
Route::group(['prefix' => 'admin/attribute'], function () {
    Route::resource('attribute', 'AttributeAdminController');
});

// User routes for attribute
Route::group(['prefix' => 'user/attribute'], function () {
    Route::resource('attribute', 'AttributeUserController');
});

// Public routes for attribute
Route::group(['prefix' => 'attributes'], function () {
    Route::get('/', 'AttributePublicController@index');
    Route::get('/{slug?}', 'AttributePublicController@show');
});


// Admin routes  for attribute_group
Route::group(['prefix' => 'admin/attribute'], function () {
    Route::resource('attribute_group', 'AttributeGroupAdminController');
});

// User routes for attribute_group
Route::group(['prefix' => 'user/attribute'], function () {
    Route::resource('attribute_group', 'AttributeGroupUserController');
});

// Public routes for attribute_group
Route::group(['prefix' => 'attributes'], function () {
    Route::get('/', 'AttributeGroupPublicController@index');
    Route::get('/{slug?}', 'AttributeGroupPublicController@show');
});

