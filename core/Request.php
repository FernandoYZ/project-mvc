<?php

namespace Core;

class Request {
    protected $uri;
    protected $method;
    protected $params;

    public function __construct() {
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params = $_REQUEST;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getParams() {
        return $this->params;
    }
}
