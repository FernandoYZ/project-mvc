<?php

namespace Core;

class Views {
    protected $compiler;
    protected $cacheDir;

    public function __construct() {
        $this->compiler = new ViewCompiler();
        $this->cacheDir = __DIR__ . '/../storage/cache/views/';
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0755, true);
        }
    }

    public function getView($controller, $view, $data = []) {
        $viewPath = $this->getViewPath($controller, $view);
        $layoutPath = $this->getViewPath('layouts', 'base');

        $cacheKey = md5($viewPath);
        $cacheFile = $this->cacheDir . $cacheKey . '.php';
        $lastModified = filemtime($viewPath);

        if (file_exists($cacheFile) && filemtime($cacheFile) >= $lastModified) {
            include $cacheFile;
        } else {
            $output = $this->compiler->renderWithLayout($layoutPath, $viewPath, $data);
            file_put_contents($cacheFile, $output);
            include $cacheFile;
        }
    }

    protected function getViewPath($controller, $view) {
        $controller = str_replace('App\\Controllers\\', '', $controller);
        return __DIR__ . '/../resources/Views/' . $controller . '/' . $view . '.php';
    }
}