<?php

namespace Core;

class Views {
    public function getView($controller, $view, $data = []) {
        $controller = str_replace('App\\Controllers\\', '', $controller);
        $viewPath = __DIR__ . '/../resources/Views/' . $controller . '/' . $view . '.php';
        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            throw new \Exception("View file not found: $viewPath");
        }
    }
}