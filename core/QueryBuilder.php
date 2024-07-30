<?php

namespace Core;

class QueryBuilder {
    protected $pdo;
    protected $query;
    protected $bindings;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
        $this->query = '';
        $this->bindings = [];
    }

    public function select($columns) {
        $this->query = "SELECT $columns";
        return $this;
    }

    public function from($table) {
        $this->query .= " FROM $table";
        return $this;
    }

    public function table($table) {
        $this->query = "SELECT * FROM $table";
        return $this;
    }

    public function join($table, $first, $operator, $second, $type = 'INNER') {
        $this->query .= " $type JOIN $table ON $first $operator $second";
        return $this;
    }

    public function leftJoin($table, $first, $operator, $second) {
        return $this->join($table, $first, $operator, $second, 'LEFT');
    }

    public function rightJoin($table, $first, $operator, $second) {
        return $this->join($table, $first, $operator, $second, 'RIGHT');
    }

    public function fullJoin($table, $first, $operator, $second) {
        return $this->join($table, $first, $operator, $second, 'FULL');
    }

    public function where($column, $operator, $value) {
        $this->query .= (strpos($this->query, 'WHERE') === false) ? " WHERE $column $operator ?" : " AND $column $operator ?";
        $this->bindings[] = $value;
        return $this;
    }

    public function orWhere($column, $operator, $value) {
        $this->query .= (strpos($this->query, 'WHERE') === false) ? " WHERE $column $operator ?" : " OR $column $operator ?";
        $this->bindings[] = $value;
        return $this;
    }

    public function groupBy($columns) {
        $this->query .= " GROUP BY $columns";
        return $this;
    }

    public function orderBy($column, $direction = 'ASC') {
        $this->query .= " ORDER BY $column $direction";
        return $this;
    }

    public function limit($number) {
        $this->query .= " LIMIT $number";
        return $this;
    }

    public function offset($number) {
        $this->query .= " OFFSET $number";
        return $this;
    }

    public function get() {
        $statement = $this->pdo->prepare($this->query);
        try {
            $statement->execute($this->bindings);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage());
        }
    }

    public function first() {
        $statement = $this->pdo->prepare($this->query);
        try {
            $statement->execute($this->bindings);
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage());
        }
    }

    public function exists() {
        $this->query = "SELECT EXISTS(" . $this->query . ")";
        $statement = $this->pdo->prepare($this->query);
        try {
            $statement->execute($this->bindings);
            return $statement->fetchColumn() > 0;
        } catch (\PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage());
        }
    }
    
    public function toSql() {
        return $this->query;
    }
    
    // Métodos comunes
    public function all($table) {
        $this->select('*')->from($table);
        return $this->get();
    }
    
    public function find($table, $value, $idColumn = 'id') {
        $this->select('*')->from($table)->where($idColumn, '=', $value);
        return $this->first();
    }
    
    public function save($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $this->query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $this->bindings = array_values($data);
        $statement = $this->pdo->prepare($this->query);
        return $statement->execute($this->bindings);
    }
    
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $this->query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $this->bindings = array_values($data);
        $statement = $this->pdo->prepare($this->query);
        return $statement->execute($this->bindings);
    }

    public function update($table, $data, $id, $idColumn = 'id') {
        $columns = implode(' = ?, ', array_keys($data)) . ' = ?';
        $this->query = "UPDATE $table SET $columns WHERE $idColumn = ?";
        $this->bindings = array_merge(array_values($data), [$id]);
        $statement = $this->pdo->prepare($this->query);
        return $statement->execute($this->bindings);
    }
    

    public function delete($table, $id, $idColumn = 'id') {
        $this->query = "DELETE FROM $table WHERE $idColumn = ?";
        $this->bindings = [$id];
        $statement = $this->pdo->prepare($this->query);
        return $statement->execute($this->bindings);
    }
    
}
