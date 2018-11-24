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
    }

    /**
     * Register the application services.
     */
    public function register()
    {

        require __DIR__ . '/Http/routes.php';
        $this->loadViewsFrom(__DIR__ . '/views', 'umusers');



    }
}