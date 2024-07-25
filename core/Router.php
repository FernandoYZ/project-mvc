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
        $this->addRoute('GET', $uri, $handler);
    }

    public function post($uri, $handler) {
        $this->addRoute('POST', $uri, $handler);
    }

    public function put($uri, $handler) {
        $this->addRoute('PUT', $uri, $handler);
    }

    public function delete($uri, $handler) {
        $this->addRoute('DELETE', $uri, $handler);
    }

    protected function addRoute($method, $uri, $handler) {
        $uri = trim($uri, '/');
        $uriPattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $uri);
        $this->routes[$method][$uriPattern] = $handler;
    }

    public function route($requestUri) {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim($requestUri, '/');

        foreach ($this->routes[$method] as $route => $handler) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                array_shift($matches); // Remove full match
                return $this->dispatch($handler, $matches);
            }
        }

        $this->exceptionHandler->handle(new \Exception('Ruta no encontrada', 404));
    }

    protected function dispatch($handler, $params) {
        try {
            if (is_callable($handler)) {
                call_user_func_array($handler, $params);
            } elseif (is_string($handler)) {
                list($controller, $action) = explode('@', $handler);
                $controller = "App\\Controllers\\" . $controller;
                if (class_exists($controller)) {
                    $controllerInstance = new $controller($this->database);
                    if (method_exists($controllerInstance, $action)) {
                        call_user_func_array([$controllerInstance, $action], $params);
                    } else {
                        throw new \Exception('Método no encontrado', 404);
                    }
                } else {
                    throw new \Exception('Controlador no encontrado', 404);
                }
            } elseif (is_array($handler)) {
                list($controller, $action) = $handler;
                if (class_exists($controller)) {
                    $controllerInstance = new $controller($this->database);
                    if (method_exists($controllerInstance, $action)) {
                        call_user_func_array([$controllerInstance, $action], $params);
                    } else {
                        throw new \Exception('Método no encontrado', 404);
                    }
                } else {
                    throw new \Exception('Controlador no encontrado', 404);
                }
            } else {
                throw new \Exception('Handler inválido', 500);
            }
        } catch (\Exception $e) {
            $this->exceptionHandler->handle($e);
        }
    }
}
