<?php

namespace Core;

class Router {
    protected $database;
    protected $views;
    protected $exceptionHandler;

    public function __construct(Database $database, Views $views) {
        $this->database = $database;
        $this->views = $views;
    }

    public function setExceptionHandler(ExceptionHandler $handler) {
        $this->exceptionHandler = $handler;
    }

    public function route($requestUri) {
        $routes = Route::getRoutes();
        $request = new Request();
        $method = $request->getMethod();
        $uri = trim($requestUri, '/');

        if (!isset($routes[$method])) {
            $this->handleException(new \Exception('Método HTTP no soportado', 405));
            return;
        }

        foreach ($routes[$method] as $route => $details) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                array_shift($matches); // Remove full match
                return MiddlewareHandler::applyMiddlewares($details['middleware'], $details['handler'], $matches, $this->views, $this->database);
            }
        }

        $this->handleException(new \Exception('Ruta no encontrada', 404));
    }

    protected function handleException(\Exception $e) {
        if ($this->exceptionHandler) {
            $this->exceptionHandler->handle($e);
        } else {
            throw $e;
        }
    }
}