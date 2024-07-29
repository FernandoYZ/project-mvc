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
        $modelPath = __DIR__ . '/../app/Models/' . basename(str_replace('\\', '/', $modelClass)) . '.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            if (class_exists($modelClass)) {
                $this->model = new $modelClass();
                $this->model->setConnection($this->database->getConnection());
            } else {
                throw new \Exception("Modelo $modelClass no encontrado");
            }
        }
    }    

    protected function validate($data, $rules) {
        $validator = new Validation($data, $rules);
        if ($validator->validate()) {
            return true;
        }
        return $validator->getErrors();
    }

    protected function response($data, $status = 200) {
        Response::json($data, $status);
    }

    protected function errorResponse($message, $status = 400) {
        Response::error($message, $status);
    }
}
