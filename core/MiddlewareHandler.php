<?php

namespace Core;

class MiddlewareHandler {
    public static function resolve($middleware) {
        return new $middleware();
    }
    
    public static function applyMiddlewares($middlewares, $handler, $params) {
        $request = new Request();
        
        $next = function() use ($handler, $params) {
            if (is_callable($handler)) {
                call_user_func_array($handler, $params);
            } elseif (is_array($handler) && count($handler) === 2) {
                list($controller, $method) = $handler;
                $controllerInstance = new $controller;
                call_user_func_array([$controllerInstance, $method], $params);
            } else {
                Route::handleException(new \Exception('Handler inválido'));
            }
        };
        
        foreach (array_reverse($middlewares) as $middleware) {
            $next = function($request) use ($next, $middleware) {
                return $middleware->handle($request, $next);
            };
        }
        
        return $next($request);
    }
}