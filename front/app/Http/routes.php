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

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@showIndex');
    
    Route::get('profile', 'ProfileController@show');
    Route::get('profile/edit', 'ProfileController@editForm');
    Route::post('profile/edit', 'ProfileController@edit');

    Route::get('domains', 'DomainController@getPage');
});