<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['can:admin', 'auth'], 'namespace' => 'App\Http\Controllers'], function () {
	Route::get('/', 'DashboardController@index')->name('home');
	Route::resource('users', UserController::class, ["as" => 'admin']);
	Route::post('users/update/{user_id}', 'UserController@update', ["as" => 'admin']);
	Route::resource('roles', RoleController::class, ["as" => 'admin']);
	Route::resource('countries', CountryController::class, ["as" => 'admin']);
    Route::resource('custom_fields', CustomFieldController::class, ['as' => 'admin']);
    Route::resource('themes', ThemeController::class, ["as" => 'admin']);
    Route::resource('sites', SiteController::class, ["as" => 'admin']);
    Route::get('delete_file/{id}', 'SiteController@delete_file')->name('delete_file');
    Route::resource('inquiries', InquiryController::class, ['as' => 'admin']);


});
