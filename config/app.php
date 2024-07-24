<?php

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = file(__DIR__ . '/../.env');
    foreach ($dotenv as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);
        if (!array_key_exists($key, $_SERVER) && !array_key_exists($key, $_ENV)) {
            putenv(sprintf('%s=%s', $key, $value));
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

return [
    'name' => getenv('APP_NAME'),
    'env' => getenv('APP_ENV'),
    'debug' => filter_var(getenv('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN),
    'url' => getenv('APP_URL'),
    'db' => [
        'connection' => getenv('DB_CONNECTION'),
        'host' => getenv('DB_HOST'),
        'port' => getenv('DB_PORT'),
        'database' => getenv('DB_DATABASE'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
    ],
];
