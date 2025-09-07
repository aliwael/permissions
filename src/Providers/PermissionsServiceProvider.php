<?php

namespace Aliwael\Permissions\Providers;

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

        // Publish migrations automatically
        $this->publishes([
            __DIR__ . '/../../database/migrations' => database_path('migrations'),
            __DIR__ . '/../../src/helpers.php' => app_path('helpers/permissions_helpers.php'),
        ], 'permissions-assets');
    }

    public function register()
    {
        //
    }
}
