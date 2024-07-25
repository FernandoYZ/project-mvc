<?php

spl_autoload_register(function ($class) {
    // Define the namespaces and their corresponding base directories
    $namespaces = [
        'App\\' => __DIR__ . '/../app/',
        'Core\\' => __DIR__ . '/../core/'
    ];

    foreach ($namespaces as $prefix => $base_dir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }
        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});
