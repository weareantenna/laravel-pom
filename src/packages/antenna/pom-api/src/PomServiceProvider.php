<?php

namespace Antenna\PomAPI;

use Carbon\Laravel\ServiceProvider;

class PomServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/pomapi.php' => config_path('pomapi.php')
        ]);
    }

    public function register()
    {
//        $this->app->singleton(PomApi::class, function () {
//            return new PomApi();
//        });
    }
}
