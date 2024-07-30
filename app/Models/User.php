<?php

namespace App\Models;

use Core\QueryBuilder;

class User {
    protected static $table = 'persona';

    public static function all() {
        return (new QueryBuilder())->all(self::$table);
    }

    public static function find($id) {
        return (new QueryBuilder())->table(self::$table)->where('id', '=', $id)->first();
    }
}
