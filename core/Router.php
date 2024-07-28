<?php

namespace Core;

class Router {
    protected $database;
    protected $exceptionHandler;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function setExceptionHandler(ExceptionHandler $handler) {
        $this->exceptionHandler = $handler;
        Route::setExceptionHandler($handler);
    }

    public function route($requestUri) {
        try {
            Route::run($requestUri);
        } catch (\Exception $e) {
            if ($this->exceptionHandler) {
                $this->exceptionHandler->handle($e);
            } else {
                throw $e;
            }
        }
    }
}