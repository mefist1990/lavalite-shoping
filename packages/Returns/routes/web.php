<?php

// Admin  routes  for returns
Route::group(['prefix' => '/admin/returns'], function () {
    Route::put('news/workflow/{returns}/{step}', 'ReturnsAdminController@putWorkflow');
    Route::get('returns/{returns}', 'ReturnsAdminController@show');
    Route::get('returns/action/{returns?}', 'ReturnsAdminController@returnAction');
    Route::resource('returns', 'ReturnsAdminController');
});


// User  routes for returns
Route::group(['prefix' => '/user/returns'], function () {
    Route::resource('returns', 'ReturnsUserController');
});

// Client  routes for returns
Route::group(['prefix' => '/client/returns'], function () {
    Route::get('returns/add/{product_id?}/{order_id?}', 'ReturnsClientController@returnAdd');
    Route::get('returns/check/order', 'ReturnsClientController@checkOrder');
    Route::get('returns/{returns}', 'ReturnsClientController@show');

    Route::resource('returns', 'ReturnsClientController');
});

// Public  routes for returns
Route::group(['prefix' => '/returns'], function () {
    Route::get('news/workflow/{returns}/{step}/{user}', 'ReturnsController@getWorkflow');
    Route::get('/', 'ReturnsPublicController@index');
    Route::get('/{slug?}', 'ReturnsPublicController@show');
});



// Admin  routes  for return_reason
Route::group(['prefix' => '/admin/returns'], function () {
    Route::put('news/workflow/{return_reason}/{step}', 'ReturnReasonAdminController@putWorkflow');
    Route::resource('return_reason', 'ReturnReasonAdminController');
});


// User  routes for return_reason
Route::group(['prefix' => '/user/returns'], function () {
    Route::resource('return_reason', 'ReturnReasonUserController');
});

// Public  routes for return_reason
Route::group(['prefix' => '/return_reasons'], function () {
    Route::get('news/workflow/{return_reason}/{step}/{user}', 'ReturnReasonController@getWorkflow');
    Route::get('/', 'ReturnReasonPublicController@index');
    Route::get('/{slug?}', 'ReturnReasonPublicController@show');
});


