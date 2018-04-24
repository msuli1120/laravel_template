<?php

Route::get('/', 'PageController@welcome');
Route::get('about', 'PageController@about')->name('about');
Route::get('contact', 'PageController@contact')->name('contact');

Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@emailVerified')->name('emailVerified');

Auth::routes();

Route::get('profile', 'ProfileController@index')->name('profile');
Route::get('edit-profile', 'ProfileController@editProfile')->name('edit.profile');
Route::post('update-profile', 'ProfileController@updateProfile')->name('update.profile');