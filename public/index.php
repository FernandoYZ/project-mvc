<?php

require __DIR__ . '/../bootstrap/app.php';

try {
    $app->handle($_SERVER['REQUEST_URI']);
} catch (\Exception $e) {
    $handler = new \Core\ExceptionHandler();
    $handler->handle($e);
}
