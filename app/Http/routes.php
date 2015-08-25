<?php

// Authentication
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.login.store', 'uses' => 'Auth\AuthController@postLogin' ]);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout' ]);

// Registration
Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'auth.register.store', 'uses' => 'Auth\AuthController@postRegister']);

// Main routes
Route::group(['middleware' => 'auth'], function(){

    // Home
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

});