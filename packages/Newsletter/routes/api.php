<?php

// Admin routes  for newsletter
Route::group(['prefix' => 'admin/newsletter'], function () {
    Route::resource('newsletter', 'NewsletterAdminController');
});

// User routes for newsletter
Route::group(['prefix' => 'user/newsletter'], function () {
    Route::resource('newsletter', 'NewsletterUserController');
});

// Public routes for newsletter
Route::group(['prefix' => 'newsletters'], function () {
    Route::get('/', 'NewsletterPublicController@index');
    Route::get('/{slug?}', 'NewsletterPublicController@show');
});

