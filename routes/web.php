<?php

use App\Controllers\UserController;
use Core\Route;

Route::get('/', function () {
    return view('welcome');
});

