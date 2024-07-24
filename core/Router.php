<?php

namespace Core;

class Router {
    protected $routes = [];

    public function get($uri, $handler)
    {
        $this->routes[$uri] = $handler;
    }

    public function route($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->callAction($this->routes[$uri]);
        }
        return "404 - Ruta no encontrada";
    }

    protected function callAction($handler)
    {
        if (is_callable($handler)) {
            return $handler();
        }
        return "Controlador no encontrado";
    }
}
