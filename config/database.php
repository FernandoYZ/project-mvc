<?php

// Mejorar el autoload de vendor no retoma los valores de .env solo del array
// Funciona, por ahora trabaja en la lógica del backend.

return [
    'driver' => env('DB_DRIVER', 'mysql'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'base_de_datos'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', '1234567890'),
    'charset' => env('DB_CHARSET', 'utf8mb4'),
    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
    'prefix' => '',
];
