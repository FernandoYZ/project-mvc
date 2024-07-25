<?php

namespace Core;

class Model {
    protected $queryBuilder;
    protected $validationRules = [];

    public function setConnection($pdo) {
        $this->queryBuilder = new QueryBuilder($pdo);
    }

    public function validate($data) {
        $validator = new Validation($data, $this->validationRules);
        if ($validator->validate()) {
            return true;
        }
        return $validator->getErrors();
    }

    public function save($data) {
        $errors = $this->validate($data);
        if ($errors === true) {
            return $this->queryBuilder->save($this->getTable(), $data);
        }
        return $errors;
    }

    public function update($data, $id, $idColumn = 'id') {
        $errors = $this->validate($data);
        if ($errors === true) {
            return $this->queryBuilder->update($this->getTable(), $data, $id, $idColumn);
        }
        return $errors;
    }

    public function delete($id, $idColumn = 'id') {
        return $this->queryBuilder->delete($this->getTable(), $id, $idColumn);
    }

    public function all() {
        return $this->queryBuilder->all($this->getTable());
    }

    public function find($id, $idColumn = 'id') {
        return $this->queryBuilder->find($this->getTable(), $id, $idColumn);
    }

    protected function getTable() {
        return strtolower((new \ReflectionClass($this))->getShortName());
    }
}
