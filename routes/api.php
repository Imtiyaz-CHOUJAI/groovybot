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
});
