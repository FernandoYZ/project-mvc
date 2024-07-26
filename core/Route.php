<?php

namespace Core;

class Route {
    protected static $routes = [];
    protected static $prefix = '';
    protected static $name = '';
    protected static $middleware = [];

    public static function prefix($prefix) {
        self::$prefix = trim($prefix, '/') . '/';
        return new static;
    }

    public static function name($name) {
        self::$name = trim($name, '.') . '.';
        return new static;
    }

    public static function middleware($middleware) {
        self::$middleware = is_array($middleware) ? $middleware : [$middleware];
        return new static;
    }

    public static function group($callback) {
        call_user_func($callback);
        self::$prefix = '';
        self::$name = '';
        self::$middleware = [];
    }

    public static function add($method, $uri, $handler) {
        $uri = self::$prefix . trim($uri, '/');
        $name = self::$name . $uri;
        $middlewares = self::$middleware;
        self::$routes[$method][$uri] = [
            'handler' => $handler,
            'name' => $name,
            'middleware' => $middlewares
        ];
    }

    public static function get($uri, $handler) {
        self::add('GET', $uri, $handler);
    }

    public static function post($uri, $handler) {
        self::add('POST', $uri, $handler);
    }

    public static function put($uri, $handler) {
        self::add('PUT', $uri, $handler);
    }

    public static function delete($uri, $handler) {
        self::add('DELETE', $uri, $handler);
    }

    public static function resource($uri, $controller) {
        $baseUri = self::$prefix . trim($uri, '/');
        self::get($baseUri, [$controller, 'index']);
        self::post($baseUri, [$controller, 'store']);
        self::get("$baseUri/create", [$controller, 'create']);
        self::get("$baseUri/{id}", [$controller, 'show']);
        self::get("$baseUri/{id}/edit", [$controller, 'edit']);
        self::put("$baseUri/{id}", [$controller, 'update']);
        self::delete("$baseUri/{id}", [$controller, 'destroy']);
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function run($uri) {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim($uri, '/');

        foreach (self::$routes[$method] as $route => $details) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                array_shift($matches); // Remove full match
                return self::dispatch($details['handler'], $details['middleware'], $matches);
            }
        }

        throw new \Exception('Ruta no encontrada', 404);
    }

    protected static function dispatch($handler, $middlewares, $params) {
        $middlewarePipeline = array_reduce(
            array_reverse($middlewares),
            function ($next, $middleware) {
                return function ($request) use ($next, $middleware) {
                    return (new $middleware)->handle($request, $next);
                };
            },
            function ($request) use ($handler, $params) {
                if (is_callable($handler)) {
                    call_user_func_array($handler, $params);
                } elseif (is_array($handler) && count($handler) === 2) {
                    list($controller, $method) = $handler;
                    $controllerInstance = new $controller;
                    call_user_func_array([$controllerInstance, $method], $params);
                } else {
                    throw new \Exception('Handler inválido');
                }
            }
        );

        return $middlewarePipeline($_SERVER);
    }
}
