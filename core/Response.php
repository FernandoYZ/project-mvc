<?php

namespace Core;

class Response {
    protected $statusCode;
    protected $content;

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function send() {
        http_response_code($this->statusCode);
        echo $this->content;
    }

    public static function json($data, $status = 200) {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }

    public static function error($message, $status = 400) {
        self::json(['error' => $message], $status);
    }
}