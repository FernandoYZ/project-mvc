<?php

namespace Core;

class Response {
    public static function json($data, $status = 200) {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }

    public static function error($message, $status = 400) {
        self::json(['error' => $message], $status);
    }

    protected function response($data, $status = 200) {
        Response::json($data, $status);
    }

    protected function errorResponse($message, $status = 400) {
        Response::error($message, $status);
    }
}