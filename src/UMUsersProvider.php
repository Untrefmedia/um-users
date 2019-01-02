<?php

namespace Untrefmedia\UMUsers;

use Illuminate\Support\ServiceProvider;

class UMUsersProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/um-users.php' => config_path('um-users.php')
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        require __DIR__ . '/routes/web.php';
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'umusers');

    }
}
