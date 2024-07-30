<?php

namespace Core;

class Controller {
    protected $views;
    protected $model;
    protected $database;

    public function __construct(Views $views, Database $database) {
        $this->views = $views;
        $this->database = $database;
        $this->loadModel();
    }

    protected function loadModel() {
        $modelClass = str_replace('App\\Http\\Controllers\\', 'App\\Models\\', get_class($this));
        $modelClass = str_replace('Controller', '', $modelClass);
        if (class_exists($modelClass)) {
            $this->model = new $modelClass($this->database->getConnection());
        } else {
            throw new \Exception("Modelo $modelClass no encontrado");
        }
    }

    protected function response($data, $status = 200) {
        Response::json($data, $status);
    }

    protected function errorResponse($message, $status = 400) {
        Response::error($message, $status);
    }
}
