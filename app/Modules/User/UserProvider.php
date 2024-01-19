<?php

namespace App\Modules\User;

use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config.php', 'user',
        );
        // echo config('user.key');
    }

    public function boot()
    {
        // $this->loadRoutesFrom(
        //     __DIR__ . '/routes.php'
        // );
    }
}