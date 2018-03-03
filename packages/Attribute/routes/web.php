<?php

// Admin  routes  for attribute
Route::group(['prefix' => '/admin/attribute'], function () {
    Route::put('news/workflow/{attribute}/{step}', 'AttributeAdminController@putWorkflow');
    Route::get('attribute/select2', 'AttributeAdminController@select2');
    Route::resource('attribute', 'AttributeAdminController');

});


// User  routes for attribute
Route::group(['prefix' => '/user/attribute'], function () {
    Route::resource('attribute', 'AttributeUserController');
});

// Public  routes for attribute
Route::group(['prefix' => '/attributes'], function () {
    Route::get('news/workflow/{attribute}/{step}/{user}', 'AttributeController@getWorkflow');
    Route::get('/', 'AttributePublicController@index');
    Route::get('/{slug?}', 'AttributePublicController@show');
});



// Admin  routes  for attribute_group
Route::group(['prefix' => '/admin/attribute'], function () {
    Route::put('news/workflow/{attribute_group}/{step}', 'AttributeGroupAdminController@putWorkflow');
    Route::resource('attribute_group', 'AttributeGroupAdminController');
});


// User  routes for attribute_group
Route::group(['prefix' => '/user/attribute'], function () {
    Route::resource('attribute_group', 'AttributeGroupUserController');
});

// Public  routes for attribute_group
Route::group(['prefix' => '/attributes'], function () {
    Route::get('news/workflow/{attribute_group}/{step}/{user}', 'AttributeGroupController@getWorkflow');
    Route::get('/', 'AttributeGroupPublicController@index');
    Route::get('/{slug?}', 'AttributeGroupPublicController@show');
});


