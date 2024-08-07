<?php

namespace App\Http\Controllers\Auth;

use Core\Controller;
use Core\Request;
use Core\Password;

class ConfirmablePasswordController extends Controller
{
    public function __construct(Views $views, Database $database) {
        parent::__construct($views, $database);
        $this->password = new Password($database);
    }

    public function show() {
        return $this->views->render('auth.confirm-password');
    }

    public function store(Request $request) {
        $password = $request->input('password');
        $userId = Session::get('user_id');

        $user = $this->model->find('users', $userId);
        if ($user && $this->password->verify($password, $user['password'])) {
            return $this->response(['message' => 'Password confirmed']);
        }

        return $this->errorResponse('Incorrect password');
    }
}
