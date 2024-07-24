<?php

namespace Core;

class Model {
    protected $queryBuilder;

    public function setConnection($pdo) {
        $this->queryBuilder = new QueryBuilder($pdo);
    }
}
