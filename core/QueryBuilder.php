<?php

namespace Core;

/**
 * Clase QueryBuilder
 *
 * Esta clase proporciona una interfaz fluida para construir consultas SQL de manera dinámica.
 */
class QueryBuilder {
    protected $pdo;
    protected $query;
    protected $bindings;

    /**
     * Constructor de la clase QueryBuilder.
     *
     * Inicializa la conexión PDO y los valores predeterminados de la consulta.
     */
    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
        $this->query = '';
        $this->bindings = [];
    }

    /**
     * Establece las columnas a seleccionar.
     *
     * @param string $columns Columnas a seleccionar.
     * @return $this
     */
    public function select($columns) {
        $this->query = "SELECT $columns";
        return $this;
    }

    /**
     * Establece la tabla de la que seleccionar datos.
     *
     * @param string $table Nombre de la tabla.
     * @return $this
     */
    public function from($table) {
        $this->query .= " FROM $table";
        return $this;
    }

    /**
     * Establece una tabla para seleccionar todos los campos.
     *
     * @param string $table Nombre de la tabla.
     * @return $this
     */
    public function table($table) {
        $this->query = "SELECT * FROM $table";
        return $this;
    }

    /**
     * Añade una cláusula JOIN a la consulta.
     *
     * @param string $table Nombre de la tabla a unir.
     * @param string $first Columna de la primera tabla.
     * @param string $operator Operador de comparación.
     * @param string $second Columna de la segunda tabla.
     * @param string $type Tipo de JOIN (INNER, LEFT, RIGHT, FULL).
     * @return $this
     */
    public function join($table, $first, $operator, $second, $type = 'INNER') {
        $this->query .= " $type JOIN $table ON $first $operator $second";
        return $this;
    }

    /**
     * Añade una cláusula LEFT JOIN a la consulta.
     *
     * @param string $table Nombre de la tabla a unir.
     * @param string $first Columna de la primera tabla.
     * @param string $operator Operador de comparación.
     * @param string $second Columna de la segunda tabla.
     * @return $this
     */
    public function leftJoin($table, $first, $operator, $second) {
        return $this->join($table, $first, $operator, $second, 'LEFT');
    }

    /**
     * Añade una cláusula RIGHT JOIN a la consulta.
     *
     * @param string $table Nombre de la tabla a unir.
     * @param string $first Columna de la primera tabla.
     * @param string $operator Operador de comparación.
     * @param string $second Columna de la segunda tabla.
     * @return $this
     */
    public function rightJoin($table, $first, $operator, $second) {
        return $this->join($table, $first, $operator, $second, 'RIGHT');
    }

    /**
     * Añade una cláusula FULL JOIN a la consulta.
     *
     * @param string $table Nombre de la tabla a unir.
     * @param string $first Columna de la primera tabla.
     * @param string $operator Operador de comparación.
     * @param string $second Columna de la segunda tabla.
     * @return $this
     */
    public function fullJoin($table, $first, $operator, $second) {
        return $this->join($table, $first, $operator, $second, 'FULL');
    }

    /**
     * Añade una cláusula WHERE a la consulta.
     *
     * @param string $column Columna a comparar.
     * @param string $operator Operador de comparación.
     * @param mixed $value Valor a comparar.
     * @return $this
     */
    public function where($column, $operator, $value) {
        $this->query .= (strpos($this->query, 'WHERE') === false) ? " WHERE $column $operator ?" : " AND $column $operator ?";
        $this->bindings[] = $value;
        return $this;
    }

    /**
     * Añade una cláusula OR WHERE a la consulta.
     *
     * @param string $column Columna a comparar.
     * @param string $operator Operador de comparación.
     * @param mixed $value Valor a comparar.
     * @return $this
     */
    public function orWhere($column, $operator, $value) {
        $this->query .= (strpos($this->query, 'WHERE') === false) ? " WHERE $column $operator ?" : " OR $column $operator ?";
        $this->bindings[] = $value;
        return $this;
    }

    /**
     * Añade una cláusula GROUP BY a la consulta.
     *
     * @param string $columns Columnas para agrupar.
     * @return $this
     */
    public function groupBy($columns) {
        $this->query .= " GROUP BY $columns";
        return $this;
    }

    /**
     * Añade una cláusula ORDER BY a la consulta.
     *
     * @param string $column Columna para ordenar.
     * @param string $direction Dirección del orden (ASC o DESC).
     * @return $this
     */
    public function orderBy($column, $direction = 'ASC') {
        $this->query .= " ORDER BY $column $direction";
        return $this;
    }

    /**
     * Añade una cláusula LIMIT a la consulta.
     *
     * @param int $number Número máximo de resultados.
     * @return $this
     */
    public function limit($number) {
        $this->query .= " LIMIT $number";
        return $this;
    }

    /**
     * Añade una cláusula OFFSET a la consulta.
     *
     * @param int $number Número de resultados a omitir.
     * @return $this
     */
    public function offset($number) {
        $this->query .= " OFFSET $number";
        return $this;
    }

    /**
     * Ejecuta la consulta y devuelve todos los resultados.
     *
     * @return array
     * @throws \Exception Si la consulta falla.
     */
    public function get() {
        $statement = $this->pdo->prepare($this->query);
        try {
            $statement->execute($this->bindings);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage());
        }
    }

    /**
     * Ejecuta la consulta y devuelve el primer resultado.
     *
     * @return array|null
     * @throws \Exception Si la consulta falla.
     */
    public function first() {
        $statement = $this->pdo->prepare($this->query);
        try {
            $statement->execute($this->bindings);
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage());
        }
    }

    /**
     * Verifica si la consulta devuelve algún resultado.
     *
     * @return bool
     * @throws \Exception Si la consulta falla.
     */
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

    /**
     * Devuelve la consulta SQL generada en formato de cadena.
     *
     * @return string
     */
    public function toSql() {
        return $this->query;
    }

    /**
     * Obtiene todos los registros de una tabla.
     *
     * @param string $table Nombre de la tabla.
     * @return array
     */
    public function all($table) {
        $this->select('*')->from($table);
        return $this->get();
    }

    /**
     * Encuentra un registro por su valor de columna.
     *
     * @param string $table Nombre de la tabla.
     * @param mixed $value Valor de la columna.
     * @param string $idColumn Nombre de la columna ID.
     * @return array|null
     */
    public function find($table, $value, $idColumn = 'id') {
        $this->select('*')->from($table)->where($idColumn, '=', $value);
        return $this->first();
    }

    /**
     * Guarda un nuevo registro en una tabla.
     *
     * @param string $table Nombre de la tabla.
     * @param array $data Datos del registro.
     * @return bool
     */
    public function save($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $this->query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $this->bindings = array_values($data);
        return $this->execute();
    }

    /**
     * Actualiza un registro en una tabla.
     *
     * @param string $table Nombre de la tabla.
     * @param array $data Datos a actualizar.
     * @param string $idColumn Columna ID para la condición.
     * @param mixed $id Valor de la columna ID.
     * @return bool
     */
    public function update($table, $data, $idColumn, $id) {
        $setClause = implode(', ', array_map(function($col) {
            return "$col = ?";
        }, array_keys($data)));
        $this->query = "UPDATE $table SET $setClause WHERE $idColumn = ?";
        $this->bindings = array_merge(array_values($data), [$id]);
        return $this->execute();
    }

    /**
     * Elimina un registro de una tabla.
     *
     * @param string $table Nombre de la tabla.
     * @param string $idColumn Columna ID para la condición.
     * @param mixed $id Valor de la columna ID.
     * @return bool
     */
    public function delete($table, $idColumn, $id) {
        $this->query = "DELETE FROM $table WHERE $idColumn = ?";
        $this->bindings = [$id];
        return $this->execute();
    }

    /**
     * Ejecuta la consulta SQL construida.
     *
     * @return bool
     * @throws \Exception Si la consulta falla.
     */
    protected function execute() {
        $statement = $this->pdo->prepare($this->query);
        try {
            return $statement->execute($this->bindings);
        } catch (\PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage());
        }
    }
}
