<?php

namespace Core;

class Mysql {
    protected $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    public function select_all(string $query, array $params = []) {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
