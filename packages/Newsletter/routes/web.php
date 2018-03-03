<?php

// Admin  routes  for newsletter
Route::group(['prefix' => '/admin/newsletter'], function () {
    Route::put('news/workflow/{newsletter}/{step}', 'NewsletterAdminController@putWorkflow');
    Route::resource('newsletter', 'NewsletterAdminController');
});


// User  routes for newsletter
Route::group(['prefix' => '/user/newsletter'], function () {
    Route::resource('newsletter', 'NewsletterUserController');
});

// Public  routes for newsletter
Route::group(['prefix' => '/newsletters'], function () {
    Route::get('news/workflow/{newsletter}/{step}/{user}', 'NewsletterController@getWorkflow');
    Route::post('/', 'NewsletterPublicController@show');    
    Route::post('update/{slug?}', 'NewsletterPublicController@update');
});


