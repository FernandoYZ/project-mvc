<?php

$app = require_once __DIR__ . '/../bootstrap/app.php';

$request = $_SERVER['REQUEST_URI'];

$app->handle($request);