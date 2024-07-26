<?php

namespace Core;

class Route {
    protected static $routes = [];
    protected static $prefix = '';
    protected static $name = '';
    protected static $middleware = [];

    /**
     * Set prefix for routes
     */
    public static function prefix($prefix) {
        self::$prefix = trim($prefix, '/') . '/';
        return new static;
    }

    /**
     * Set name for routes
     */
    public static function name($name) {
        self::$name = trim($name, '.') . '.';
        return new static;
    }

    /**
     * Set middleware for routes
     */
    public static function middleware($middleware) {
        self::$middleware = is_array($middleware) ? $middleware : [$middleware];
        return new static;
    }

    /**
     * Group routes
     */
    public static function group($callback) {
        call_user_func($callback);
        self::$prefix = '';
        self::$name = '';
        self::$middleware = [];
    }

    /**
     * Add a route
     */
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

    /**
     * Get all routes
     */
    public static function getRoutes() {
        return self::$routes;
    }
}
