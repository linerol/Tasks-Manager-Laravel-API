<?php

namespace App\Modules\Task;

use Illuminate\Support\ServiceProvider;
use App\Modules\Task\Repositories\TaskRepositoryInterface;
use App\Modules\Task\Repositories\TaskRepository;
class TaskProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config.php', 'task',
        );
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    public function boot()
    {
        // $this->loadRoutesFrom(
        //     __DIR__ . '/routes.php'
        // );
        // Load all routes, but it better to load them in RouteServiceProvider.php
    }
}