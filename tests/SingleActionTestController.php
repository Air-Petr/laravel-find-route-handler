<?php

namespace AirPetr\LaravelFindRouteHandler\Tests;

use Illuminate\Routing\Controller;

class SingleActionTestController extends Controller
{
    public function __invoke()
    {
        return 'Hello from SingleActionTestController!';
    }
}
