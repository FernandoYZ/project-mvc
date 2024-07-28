<?php

namespace Core;

class Router {
    protected $database;
    protected $exceptionHandler;

    public function __construct(Database $database) {
        $this->database = $database;
        $this->exceptionHandler = new ExceptionHandler();
        Route::setExceptionHandler($this->exceptionHandler);
    }

    public function route($requestUri) {
        try {
            Route::run($requestUri);
        } catch (\Exception $e) {
            $this->exceptionHandler->handle($e);
        }
    }
}