<?php

namespace AirPetr\LaravelFindRouteHandler\Tests;

use AirPetr\LaravelFindRouteHandler\Providers\RouteFindHandlerServiceProvider;
use AirPetr\LaravelFindRouteHandler\Tests\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase;

class RouteFindHandlerCommandTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [RouteFindHandlerServiceProvider::class];
    }

    protected function setUp(): void
    {
        parent::setUp();

        Route::get('/', fn () => 'Hello, world!');
        Route::get('/test', [TestController::class, 'index']);
    }

    public function testCommandOnClosure()
    {
        $this->artisan('route:find-handler', ['verb' => 'GET', 'uri' => '/'])
            ->expectsOutputToContain('Route is defined in closure ');
    }

    public function testCommandOnController()
    {
        $this->artisan('route:find-handler', ['verb' => 'GET', 'uri' => '/test'])
            ->expectsOutputToContain('Controller of route: AirPetr\LaravelFindRouteHandler\Tests\Controllers\TestController@index');
    }
}
