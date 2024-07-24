<?php

return [
    'name' => env('APP_NAME', 'MiAplicacion'),
    'env' => env('APP_ENV', 'production'),
    'debug' => filter_var(env('APP_DEBUG', false), FILTER_VALIDATE_BOOLEAN),
    'url' => env('APP_URL', 'http://localhost'),
    'db' => [
        'connection' => env('DB_CONNECTION', 'mysql'),
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', '3306'),
        'database' => env('DB_DATABASE', 'nombre_base_datos'),
        'username' => env('DB_USERNAME', 'usuario'),
        'password' => env('DB_PASSWORD', 'contraseña'),
    ],
    'currency' => env('APP_CURRENCY', 'USD'),
    'language' => env('APP_LANGUAGE', 'en'),
];
