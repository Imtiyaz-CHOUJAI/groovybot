<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function register()
    {
        Route::group([
            'namespace' => 'App\Http\Controllers',
            'prefix' => 'api',
            'domain' => env('APP_URL'),
        ], function () {
            require base_path('routes/api.php');
        });
    }
}
