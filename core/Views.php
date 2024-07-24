<?php

namespace Core;

class Views {
    protected $compiler;
    protected $cache = [];
    protected $cacheTimestamps = [];

    public function __construct() {
        $this->compiler = new ViewCompiler();
    }

    public function getView($controller, $view, $data = []) {
        $viewPath = $this->getViewPath($controller, $view);
        $layoutPath = $this->getViewPath('layouts', 'base');

        $lastModified = filemtime($viewPath);

        if (isset($this->cache[$viewPath]) && $this->cacheTimestamps[$viewPath] >= $lastModified) {
            echo $this->cache[$viewPath];
        } else {
            $output = $this->compiler->renderWithLayout($layoutPath, $viewPath, $data);
            $this->cache[$viewPath] = $output;
            $this->cacheTimestamps[$viewPath] = $lastModified;
            echo $output;
        }
    }

    protected function getViewPath($controller, $view) {
        $controller = str_replace('App\\Controllers\\', '', $controller);
        return __DIR__ . '/../resources/Views/' . $controller . '/' . $view . '.php';
    }
}
