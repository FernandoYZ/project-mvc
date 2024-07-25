<?php

namespace App\Controllers;

use Core\Controller;

class UserController extends Controller {

    public function index() {
        $users = $this->model->getAllUsers();
        $this->views->getView('users', 'index', [
            'title' => 'Usuarios',
            'tag' => 'Lista de usuarios',
            'description' => 'Lista de todos los usuarios',
            'users' => $users,
            'js' => ['/pages/UserPage.js'], // integración frontend
            'css' => ['/pages/user.css']
        ]);
    }
}