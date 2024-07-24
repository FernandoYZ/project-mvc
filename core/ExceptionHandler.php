<?php

namespace Core;

class ExceptionHandler {
    public function handle(\Exception $exception) {
        // 
        error_log($exception->getMessage());

        // Retornar las páginas de errores
        $code = $exception->getCode();
        switch ($code) {
            case 404:
                http_response_code(404);
                $viewPath = __DIR__ . '/../resources/Views/errors/404.php';
                break;
            default:
                http_response_code(500);
                $viewPath = __DIR__ . '/../resources/Views/errors/500.php';
                break;
        }

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo 'An error occurred.';
        }
    }
}
