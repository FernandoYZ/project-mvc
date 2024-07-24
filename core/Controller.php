<?php

namespace Core;

class Controller {
    protected $views;
    protected $model;
    protected $database;

    public function __construct(Database $database) {
        $this->views = new Views();
        $this->database = $database;
        $this->loadModel();
    }

    protected function loadModel() {
        $modelClass = str_replace('App\\Controllers\\', 'App\\Models\\', get_class($this));
        $modelClass = str_replace('Controller', '', $modelClass);
        $modelPath = __DIR__ . '/../app/Models/' . basename(str_replace('\\', '/', $modelClass)) . '.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            if (class_exists($modelClass)) {
                $this->model = new $modelClass();
                if (method_exists($this->model, 'setConnection')) {
                    $this->model->setConnection($this->database->getConnection());
                }
            }
        }
    }

    protected function validate($data, $rules) {
        // Aquí podrías implementar la lógica de validación
        return true;
    }

    protected function jsonResponse($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
