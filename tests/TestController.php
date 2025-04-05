<?php

namespace AirPetr\LaravelFindRouteHandler\Tests\Controllers;

use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function index()
    {
        return 'Hello from TestController!';
    }
}
