<?php

namespace App\Http\Controllers\Auth;

use Core\Controller;
use Core\Request;
use Core\Session;
use Core\Password;

class AuthenticatedSessionController extends Controller
{
    public function __construct(Views $views, Database $database) {
        parent::__construct($views, $database);
        $this->password = new Password($database);
    }

    public function create() {
        return $this->views->render('auth.login');
    }

    public function store(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = $this->model->find('users', $email, 'email');
        if ($user && $this->password->verify($password, $user['password'])) {
            Session::start();
            Session::set('user_id', $user['id']);
            return $this->response(['message' => 'Login successful']);
        }

        return $this->errorResponse('Invalid credentials');
    }

    public function destroy() {
        Session::start();
        Session::destroy();
        return $this->response(['message' => 'Logged out']);
    }
}
