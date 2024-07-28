<?php

namespace App\Http\Middleware;

class Guest {
    public function handle($request, $next) {
        if (isset($_SESSION['user'])) {
            throw new \Exception('Ya autenticado', 403);
        }
        return $next($request);
    }
}