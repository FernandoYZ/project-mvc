<?php

return [
    'name' => env('APP_NAME', 'Nombre_Proyecto'),
    'env' => env('APP_ENV', 'base_de_datos'),
    'debug' => filter_var(env('APP_DEBUG', false), FILTER_VALIDATE_BOOLEAN),
    'url' => env('APP_URL', 'http://localhost'),
    'currency' => env('APP_CURRENCY', 'PEN'),
    'language' => env('APP_LANGUAGE', 'en'),
];
