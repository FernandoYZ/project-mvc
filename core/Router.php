<?php

namespace Core;

class Router {
    protected $routes = [];
    protected $database;
    protected $exceptionHandler;

    public function __construct(Database $database) {
        $this->database = $database;
        $this->exceptionHandler = new ExceptionHandler();
    }

    public function get($uri, $handler) {
        $this->routes['GET'][$uri] = $handler;
    }

    public function post($uri, $handler) {
        $this->routes['POST'][$uri] = $handler;
    }

    public function route($uri) {
        $method = $_SERVER['REQUEST_METHOD'];
        try {
            if (array_key_exists($uri, $this->routes[$method])) {
                $handler = $this->routes[$method][$uri];

                if (is_callable($handler)) {
                    call_user_func($handler);
                } elseif (is_string($handler)) {
                    list($controller, $action) = explode('@', $handler);
                    $controller = "App\\Controllers\\" . $controller;
                    if (class_exists($controller)) {
                        $controllerInstance = new $controller($this->database);
                        if (method_exists($controllerInstance, $action)) {
                            call_user_func([$controllerInstance, $action]);
                        } else {
                            throw new \Exception('Method inválido', 404);
                        }
                    } else {
                        throw new \Exception('Controller no encontrado', 404);
                    }
                } elseif (is_array($handler)) {
                    list($controller, $action) = $handler;
                    if (class_exists($controller)) {
                        $controllerInstance = new $controller($this->database);
                        if (method_exists($controllerInstance, $action)) {
                            call_user_func([$controllerInstance, $action]);
                        } else {
                            throw new \Exception('Method inválido', 404);
                        }
                    } else {
                        throw new \Exception('Controller no encontrado', 404);
                    }
                } else {
                    throw new \Exception('Error de servidor', 500);
                }
            } else {
                throw new \Exception('Ruta errónea', 404);
            }
        } catch (\Exception $e) {
            $this->exceptionHandler->handle($e);
        }
    }
}
