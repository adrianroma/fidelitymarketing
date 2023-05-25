<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\TimeHelper;

class PlayerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Lib\TimeHelper', function ($app) {
            return new TimeHelper();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
