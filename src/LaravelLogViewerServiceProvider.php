<?php

namespace hanakivan\LaravelLogViewer;

use Illuminate\Support\ServiceProvider;

class LaravelLogViewerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', "hanakivan");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(
            config("hanakivan.laravellogviewer.isenabled") &&
            config("hanakivan.laravellogviewer.routeprefix")
        ) {
            $this->loadRoutesFrom(__DIR__.'/routes.php');
            $this->loadViewsFrom(__DIR__.'/resources/views', 'hanakivan');
        }
    }
}
