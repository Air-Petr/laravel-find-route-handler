<?php

namespace AirPetr\LaravelFindRouteHandler\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use ReflectionFunction;

class RouteFindHandlerCommand extends Command
{
    protected $signature = 'route:find-handler {verb} {uri}';
    protected $description = 'Show handler of a route';
    protected Router $router;

    public function __construct(Router $router)
    {
        parent::__construct();
        $this->router = $router;
    }

    public function handle()
    {
        $verb = $this->argument('verb');
        $uri = $this->argument('uri');
        $request = Request::create($uri, $verb);
        $route = $this->router->getRoutes()->match($request);

        if (!$route) {
            $this->error("Route '{$uri}' not found for verb '{$verb}'.");
            return;
        }
        if ($route->getAction('uses') instanceof \Closure) {
            $reflection = new ReflectionFunction($route->getAction('uses'));
            $file = $reflection->getFileName();
            $line = $reflection->getStartLine();
            var_dump("Route is defined in closure at {$file}:{$line}");
            $this->info("Route is defined in closure at {$file}:{$line}");
            return;
        }

        if ($controller = $route->getAction('controller')) {
            $this->info("Controller of route: {$controller}");
        }
    }
}
