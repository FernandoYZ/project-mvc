<?php

use Core\Router;
use App\Controllers\UserController;

$router->get('/', function () {
    return view('welcome');
});