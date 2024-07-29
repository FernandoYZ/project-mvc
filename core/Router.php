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
        Route::setExceptionHandler($handler);
    }

    public function route($requestUri) {
        try {
            Route::run($requestUri, $this->views, $this->database);
        } catch (\Exception $e) {
            if ($this->exceptionHandler) {
                $this->exceptionHandler->handle($e);
            } else {
                throw $e;
            }
        }
    }
}