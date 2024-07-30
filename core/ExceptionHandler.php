<?php

namespace Core;

class ExceptionHandler {
    public function handle(\Exception $exception) {
        error_log($exception->getMessage());

        $code = $exception->getCode();
        if ($code < 400 || $code >= 600) {
            $code = 500;
        }
        http_response_code($code);

        $viewPath = __DIR__ . '/../resources/views/errors/' . $code . '.php';
        if (!file_exists($viewPath)) {
            $viewPath = __DIR__ . '/../resources/views/errors/500.php';
        }

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo 'Ocurrió un error';
        }
    }
}
