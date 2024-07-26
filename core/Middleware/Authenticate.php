<?php

namespace Core\Middleware;

class Authenticate {
    public function handle($request, $next) {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        return $next($request);
    }
}