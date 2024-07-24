<?php

if (!function_exists('loadEnv')) {
    function loadEnv($path) {
        if (!file_exists($path)) {
            return;
        }

        $dotenv = file($path);
        foreach ($dotenv as $line) {
            if(strpos(trim($line), '#')===0) {
                continue;
            }

            list($key, $value) = explode('=', $line, 2);
            $key=trim($key);
            $value=trim($value);

            if (!array_key_exists($key, $_SERVER) && !array_key_exists($key, $_ENV)) {
                putenv(sprintf('%s=%s', $key, $value));
                $_ENV[$key]=$value;
                $_SERVER[$key]=$value;
            }
        }
    }
}