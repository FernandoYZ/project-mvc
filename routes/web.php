<?php

use App\Http\Controllers\UserController;
use Core\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);