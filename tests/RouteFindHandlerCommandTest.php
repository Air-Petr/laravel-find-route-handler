<?php

namespace AirPetr\LaravelFindRouteHandler\Tests;

use AirPetr\LaravelFindRouteHandler\Providers\RouteFindHandlerServiceProvider;
use AirPetr\LaravelFindRouteHandler\Tests\SingleActionTestController;
use AirPetr\LaravelFindRouteHandler\Tests\TestController;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase;

class RouteFindHandlerCommandTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [RouteFindHandlerServiceProvider::class];
    }

    public function testCommandOnClosure(): void
    {
        Route::get('/', function () {
            return 'Hello, world!';
        });

        $this->artisan('route:find-handler', ['verb' => 'GET', 'uri' => '/'])
            ->expectsOutputToContain('Route is defined in closure ');
    }

    public function testCommandOnController(): void
    {
        Route::get('/test', [TestController::class, 'index']);

        $this->artisan('route:find-handler', ['verb' => 'GET', 'uri' => '/test'])
            ->expectsOutputToContain('Controller of route: AirPetr\LaravelFindRouteHandler\Tests\TestController@index');
    }

    public function testCommandSingleActionController(): void
    {
        Route::get('/single-action-test', SingleActionTestController::class);

        $this->artisan('route:find-handler', ['verb' => 'GET', 'uri' => '/single-action-test'])
            ->expectsOutputToContain('Controller of route: AirPetr\LaravelFindRouteHandler\Tests\SingleActionTestController');
    }
}
