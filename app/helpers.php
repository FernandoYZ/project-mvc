<?php

function env($key, $default = null) {
    $value = getenv($key);
    if ($value === false) {
        return $default;
    }
    return $value;
}

function view($view, $data = []) {
    extract($data);
    $view = str_replace('.','/', $view);
    $file = __DIR__ . '/../resources/Views/' . $view. 'php';
    if (file_exists($file)) {
        require $file;
    } else {
        throw new Exception("Vista no encontrada: $file");
    }
}