<?php

if (!function_exists('env')) {
    function env($key, $default = null) {
        return $_ENV[$key] ?? $default;
    }
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

function assets($file = ''){
    return '/build/assets/' . $file;
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
