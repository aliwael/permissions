<?php

namespace Permissions\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PermissionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register middleware
        $router = $this->app['router'];
        $router->aliasMiddleware('permission', \Permissions\Middleware\CheckPermission::class);
        $router->aliasMiddleware('role', \Permissions\Middleware\CheckRole::class);
    }

    public function register()
    {
        //
    }
}
