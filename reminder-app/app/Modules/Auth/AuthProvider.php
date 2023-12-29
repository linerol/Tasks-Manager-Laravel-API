<?php

namespace App\Modules\Auth;

use Illuminate\Support\ServiceProvider;
use App\Modules\Auth\Repositories\AuthRepositoryInterface;
use App\Modules\Auth\Repositories\AuthRepository;
class AuthProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config.php', 'auth',
        );
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        // echo config('auth.key');
    }

    public function boot()
    {
        // $this->loadRoutesFrom(
        //     __DIR__ . '/routes.php'
        // );
        // Load all routes, but it better to load them in RouteServiceProvider.php
    }
}