<?php

namespace Core;

class Router {
    protected $database;
    protected $exceptionHandler;

    public function __construct(Database $database) {
        $this->database = $database;
        $this->exceptionHandler = new ExceptionHandler();
    }

    public function route($requestUri) {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim($requestUri, '/');
        $routes = Route::getRoutes();

        if (isset($routes[$method])) {
            foreach ($routes[$method] as $route => $details) {
                if (preg_match("#^$route$#", $uri, $matches)) {
                    array_shift($matches); // Remove full match
                    return $this->dispatch($details['handler'], $matches);
                }
            }
        }

        $this->exceptionHandler->handle(new \Exception('Ruta no encontrada', 404));
    }

    protected function dispatch($handler, $params) {
        try {
            if (is_callable($handler)) {
                call_user_func_array($handler, $params);
            } elseif (is_array($handler) && count($handler) == 2) {
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
