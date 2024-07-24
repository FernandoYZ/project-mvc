<?php

namespace Core;

class Controller {
    protected $views;
    protected $model;

    public function __construct() {
        $this->views = new Views();
        $this->loadModel();
    }

    public function loadModel() {
        $model = get_class($this) . "Model";
        $path = __DIR__ . '/../app/Models/' . $model . '.php';
        if (file_exists($path)) {
            require_once $path;
            $this->model = new $model();
        }
    }
}
