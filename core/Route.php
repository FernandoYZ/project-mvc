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
        self::reset();
    }

    public static function add($method, $uri, $handler) {
        $uri = self::$prefix . trim($uri, '/');
        $name = self::$name . str_replace('/', '.', $uri);
        $middlewares = array_map([MiddlewareHandler::class, 'resolve'], self::$middleware);
        self::$routes[$method][$uri] = [
            'handler' => $handler,
            'name' => $name,
            'middleware' => $middlewares
        ];
        return new static;
    }

    public static function get($uri, $handler) {
        return self::add('GET', $uri, $handler);
    }

    public static function post($uri, $handler) {
        return self::add('POST', $uri, $handler);
    }

    public static function put($uri, $handler) {
        return self::add('PUT', $uri, $handler);
    }

    public static function delete($uri, $handler) {
        return self::add('DELETE', $uri, $handler);
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

    protected static function reset() {
        self::$prefix = '';
        self::$name = '';
        self::$middleware = [];
    }
}
