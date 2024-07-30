<?php

namespace Core;

class Database {
    protected $connections = [];
    protected $config;
    protected static $instance;

    public function __construct(array $config) {
        $this->config = $config;
        $this->addConnection('default', $config);
        self::$instance = $this;
    }

    public static function getInstance() {
        return self::$instance;
    }

    public function addConnection($name, array $config) {
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        try {
            $this->connections[$name] = new \PDO($dsn, $config['username'], $config['password']);
            $this->connections[$name]->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception('Conexión fallida: ' . $e->getMessage());
        }
    }

    public function getConnection($name = 'default') {
        return $this->connections[$name] ?? null;
    }
    
    public function beginTransaction() {
        $this->getConnection()->beginTransaction();
    }

    public function transaction(callable $callback) {
        try {
            $this->beginTransaction();
            $callback($this->getConnection());
            $this->commit();
        } catch (\Exception $e) {
            $this->rollBack();
            throw $e;
        }
    }
    

    public function commit() {
        $this->getConnection()->commit();
    }

    public function rollBack() {
        $this->getConnection()->rollBack();
    }
}
