<?php

namespace Core;

class Middleware {
    protected static $middleware = [];

    public static function register($name, $class) {
        self::$middleware[$name] = $class;
    }

    public static function resolve($name) {
        if (isset(self::$middleware[$name])) {
            return new self::$middleware[$name]();
        }
        throw new \Exception("Middleware {$name} no encontrado");
    }
}
