<?php

namespace App\Http\Middleware;

use Core\Middleware;

class Authenticate {
    public function handle($request, $next) {
        if (!isset($_SESSION['user'])) {
            throw new \Exception('No autenticado', 401);
        }
        return $next($request);
    }
}