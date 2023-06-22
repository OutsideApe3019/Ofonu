<?php

namespace App\Helpers;

use App\Helpers\Route;
use Exception;

class Routes
{
    public static array $routes;

    public static function add(Route $route): bool
    {
        if (!empty(self::$routes)) {
            foreach (self::$routes as $name => $r) {
                if ($name == $route->name) {
                    throw new Exception("The route with the name \"$route->name\" already exist.");

                    return false;
                } else if ($r['url'] == $route->url) {
                    throw new Exception("The route with the url \"$route->url\" already exist.");

                    return false;
                }
            }
        }

        self::$routes[$route->name] = [
            'method' => $route->method,
            'url' => $route->url,
            'controller' => $route->controller,
        ];

        return true;
    }

    public static function check(): bool
    {
        if (empty(self::$routes)) {
            throw new Exception("The routes are empty, create more in \"config/routes.php\".");

            return false;
        }

        foreach (self::$routes as $name => $route) {
            if ($route['url'] == $_SERVER["REQUEST_URI"]) {
                $found = true;

                if ($route['method'] !== $_SERVER['REQUEST_METHOD']) {
                    Helpers::abort(405);
                    return false;
                }

                $route['controller']->call();

                return true;
            }

            $found = false;
        }

        if (!$found) {
            Helpers::abort(404);
            return false;
        }
    }
}
