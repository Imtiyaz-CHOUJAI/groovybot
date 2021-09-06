<?php

namespace App\Providers;

use App\Repositories\DanceOff\DanceOffRepository;
use App\Repositories\DanceOff\EloquentDanceOff;
use App\Repositories\Robot\EloquentRobot;
use App\Repositories\Robot\RobotRepository;
use App\Repositories\User\EloquentUser;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the repositories
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, EloquentUser::class);
        $this->app->singleton(RobotRepository::class, EloquentRobot::class);
        $this->app->singleton(DanceOffRepository::class, EloquentDanceOff::class);
    }
}
