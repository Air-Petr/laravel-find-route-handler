<?php

namespace AirPetr\LaravelFindRouteHandler\Providers;

use AirPetr\LaravelFindRouteHandler\Commands\RouteFindHandlerCommand;
use Illuminate\Support\ServiceProvider;

class RouteFindHandlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            RouteFindHandlerCommand::class,
        ]);
    }

    public function boot()
    {
        //
    }
}
