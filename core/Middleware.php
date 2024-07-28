<?php

namespace Core;

abstract class Middleware {
    abstract public function handle($request, \Closure $next);
}

