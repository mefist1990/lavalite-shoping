<?php

// Admin  routes  for order
Route::group(['prefix' => '/admin/order'], function () {
    Route::put('news/workflow/{order}/{step}', 'OrderAdminController@putWorkflow');    
    Route::resource('order', 'OrderAdminController');
});

// Client  routes for order
Route::group(['prefix' => '/client/order'], function () {
    Route::post('order/favourite/{order}', 'OrderClientController@favourite');
    Route::post('payment/post', 'OrderClientController@payment');
    Route::get('payment/success', 'OrderClientController@getPayment');
    Route::get('order/favourite', 'OrderClientController@myFavourite');    
    Route::resource('order', 'OrderClientController');    
});

// User  routes for order
Route::group(['prefix' => '/user/order'], function () {
    Route::resource('order', 'OrderUserController');
});

// Public  routes for order
Route::group(['prefix' => '/orders'], function () {
    Route::get('news/workflow/{order}/{step}/{user}', 'OrderController@getWorkflow');
    Route::post('/order/track/status', 'OrderPublicController@orderStatus');
    Route::get('/track', 'OrderPublicController@trackOrder');
    
    Route::get('/', 'OrderPublicController@index');
    Route::get('/{slug?}', 'OrderPublicController@show');
});



// Admin  routes  for order_status
Route::group(['prefix' => '/admin/order'], function () {
    Route::put('news/workflow/{order_status}/{step}', 'OrderStatusAdminController@putWorkflow');
    Route::resource('order_status', 'OrderStatusAdminController');
});


// User  routes for order_status
Route::group(['prefix' => '/user/order'], function () {
    Route::resource('order_status', 'OrderStatusUserController');
});

// Public  routes for order_status
Route::group(['prefix' => '/orderstatus'], function () {
    Route::get('news/workflow/{order_status}/{step}/{user}', 'OrderStatusController@getWorkflow');
    Route::get('/', 'OrderStatusPublicController@index');
    Route::get('/{slug?}', 'OrderStatusPublicController@show');
});

// Admin  routes  for order_history
Route::group(['prefix' => '/admin/order'], function () {
    Route::put('news/workflow/{order_history}/{step}', 'OrderHistoryAdminController@putWorkflow');
    Route::get('order_history/list/{order?}', 'OrderHistoryAdminController@historyList');
    Route::resource('order_history', 'OrderHistoryAdminController');
});


// User  routes for order_history
Route::group(['prefix' => '/user/order'], function () {
    Route::resource('order_history', 'OrderHistoryUserController');
});

// Public  routes for order_history
Route::group(['prefix' => '/orderhistory'], function () {
    Route::get('news/workflow/{order_history}/{step}/{user}', 'OrderHistoryController@getWorkflow');
    Route::get('/', 'OrderHistoryPublicController@index');
    Route::get('/{slug?}', 'OrderHistoryPublicController@show');
});


