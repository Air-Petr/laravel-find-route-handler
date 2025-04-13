<?php

namespace AirPetr\LaravelFindRouteHandler\Tests;

use Illuminate\Routing\Controller;

class ResourceTestController extends Controller
{
    public function update($id)
    {
        return "Hello from ResourceTestController update! ID: $id";
    }
}
