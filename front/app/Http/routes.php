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
    
    Route::get('profile',                   ['middleware' =>    'permission:view.profile',  'uses' =>   'ProfileController@show']);
    Route::get('profile/edit',              ['middleware' =>    'permission:edit.profile',  'uses' =>   'ProfileController@editForm']);
    Route::post('profile/edit',             ['middleware' =>    'permission:edit.profile',  'uses' =>   'ProfileController@edit']);
    
    Route::get('settings',                  ['middleware' =>    'permission:view.settings', 'uses' =>   'SettingsController@show']);
    Route::post('settings',                 ['middleware' =>    'permission:edit.settings', 'uses' =>   'SettingsController@edit']);
    
    Route::get('domains',                   ['middleware' =>    'permission:view.domains',  'uses' =>   'DomainController@getAll']);
    Route::get('domain/{domain}',           ['middleware' =>    'permission:view.domains',  'uses' =>   'DomainController@getView']);
    Route::get('domain/edit/{domain}',      ['middleware' =>    'permission:edit.domains',  'uses' =>   'DomainController@getEdit']);
    Route::get('domain/delete/{domain}',    ['middleware' =>    'permission:edit.domains',  'uses' =>   'DomainController@getDelete']);

    Route::post('domain/edit/{domain}',     ['middleware' =>    'permission:edit.domains',  'uses' =>   'DomainController@postEdit']);
    Route::post('domain/delete/{domain}',   ['middleware' =>    'permission:edit.domains',  'uses' =>   'DomainController@postDelete']);
    
    Route::get('users',                     ['middleware' =>    'permission:view.users',    'uses' =>   'UsersController@show']);
    Route::get('users/{id}',                ['middleware' =>    'permission:view.users',    'uses' =>   'UsersController@details']);
});