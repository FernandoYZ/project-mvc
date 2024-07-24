<?php

namespace Core;

class ViewCompiler {

    public function render($viewPath, $data = []) {
        if (!file_exists($viewPath)) {
            throw new \Exception("Vista no encontrada: $viewPath");
        }

        extract($data);

        ob_start();
        require $viewPath;
        return ob_get_clean();
    }

    // Limpieza en las vistas para usar layouts
    public function renderWithLayout($layoutPath, $viewPath, $data = []) {
        ob_start();
        
        $content = $this->render($viewPath, $data);
        
        $data['content'] = $content;
        
        return $this->render($layoutPath, $data);
    }
}
