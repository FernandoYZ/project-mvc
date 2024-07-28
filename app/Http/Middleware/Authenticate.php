<?php

namespace App\Http\Middleware;

use Core\Middleware;

class Authenticate extends Middleware {
    public function handle($request, \Closure $next) {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        return $next($request);
    }
}