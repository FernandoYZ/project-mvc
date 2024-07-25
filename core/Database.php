<?php

namespace Core;

class Database {
    protected $connection;

    public function __construct($config) {
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        try {
            $this->connection = new \PDO($dsn, $config['username'], $config['password']);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception('Conexión fallida: ' . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
