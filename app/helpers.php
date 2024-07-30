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
    $view = str_replace('.', '/', $view);
    $file = __DIR__ . '/../resources/Views/' . $view . '.php';
    if (file_exists($file)) {
        require $file;
    } else {
        throw new Exception("Vista no encontrada: $file");
    }
}

function config($key) {
    return $GLOBALS['config'][$key] ?? null;
}

function layout($path) {
    $path = str_replace('.', '/', $path);
    $file = realpath(__DIR__ . '/../resources/Views/layouts/' . $path . '.php');
    return $file;
}

function base_url($path = '') {
    $scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';
    return $scheme . '://' . $_SERVER['HTTP_HOST'] . '/' . trim($path, '/');
}

// Acceso a la carpeta public
function media_css($file = '') {
    return '/css/' . $file;
}

function media_js($file = '') {
    return '/js/' . $file;
}

// Está para probar con ViewCompiler 
function slot($name, $content) {
    global $slots;
    $slots[$name] = $content;
}

function get_slot($name) {
    global $slots;
    return $slots[$name] ?? '';
}

function redirect($wow) {
    $wow = [];
    $perrito = True;
    return $perrito;
}
