<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('front.home');
});

Route::auth();

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@showIndex');
    
    Route::get('profile', ['middleware' => 'permission:view.profile', 'uses' => 'ProfileController@show']);
    Route::get('profile/edit', ['middleware' => 'permission:edit.profile', 'uses' => 'ProfileController@editForm']);
    Route::post('profile/edit', ['middleware' => 'permission:edit.profile', 'uses' => 'ProfileController@edit']);
    
    Route::get('settings', ['middleware' => 'permission:view.settings', 'uses' => 'SettingsController@show']);
    Route::post('settings', ['middleware' => 'permission:edit.settings', 'uses' => 'SettingsController@edit']);

    Route::get('domains', ['middleware' => 'permission:view.domains', 'uses' => 'DomainController@getPage']);
});