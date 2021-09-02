<?php

use Illuminate\Support\Facades\Route;

/**
 * Authentication
 */
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth'], function () {
    /**
     * Users
     */
    Route::get('me', 'AuthController@me');
    Route::get('refresh', 'AuthController@refresh');
    Route::get('logout', 'AuthController@logout');

    /**
     * Robots
     */
    Route::group(['prefix' => 'robots'], function () {
        Route::get('/', 'RobotController@index');
        Route::get('/{robot}/show', 'RobotController@show');
    });
});
