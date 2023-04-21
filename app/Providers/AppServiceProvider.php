<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //$this->app->make(UserTaskController::class);
        // $this->app->make(TaskController::class);
        // $this->app->make(TaskUserController::class);
        // $this->app->make(StatusController::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    $this->app->make(\App\Http\Controllers\TaskUserController::class);
    $this->app->make(\App\Http\Controllers\TaskController::class);
    $this->app->make(\App\Http\Controllers\StatusController::class);
    $this->app->make(\App\Http\Controllers\UserTaskController::class);
    }
}
