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

    /*
    |---------------------------------------------------------------------------
    | Define una relación de uno a uno
    |---------------------------------------------------------------------------
    */
    public function hasOne($relatedModel, $foreignKey, $localKey = 'id') {
        $relatedInstance = new $relatedModel();
        return $relatedInstance->where($foreignKey, '=', $this->$localKey)->first();
    }
    
    /*
    |---------------------------------------------------------------------------
    | Define una relación de uno a muchos.
    |---------------------------------------------------------------------------
    */
    public function hasMany($relatedModel, $foreignKey, $localKey = 'id') {
        $relatedInstance = new $relatedModel();
        return $relatedInstance->where($foreignKey, '=', $this->$localKey)->get();
    }
    
    /*
    |---------------------------------------------------------------------------
    | Define una relación inversa de uno a muchos.
    |---------------------------------------------------------------------------
    */
    public function belongsTo($relatedModel, $foreignKey, $ownerKey = 'id') {
        $relatedInstance = new $relatedModel();
        return $relatedInstance->where($ownerKey, '=', $this->$foreignKey)->first();
    }
    
    /*
    |---------------------------------------------------------------------------
    | Define una relación de muchos a muchos a través de una tabla pivote.
    |---------------------------------------------------------------------------
    */
    public function belongsToMany($relatedModel, $pivotTable, $foreignKey, $relatedKey, $localKey = 'id') {
        $queryBuilder = new QueryBuilder($this->queryBuilder->getPdo());
        $results = $queryBuilder
        ->select('*')
        ->from($pivotTable)
        ->where($foreignKey, '=', $this->$localKey)
        ->get();
        
        $relatedInstance = new $relatedModel();
        $ids = array_column($results, $relatedKey);
        
        return $relatedInstance->whereIn('id', $ids)->get();
    }
    
    /*
    |---------------------------------------------------------------------------
    | Define una relación de uno a muchos a través de un modelo intermedio.
    |---------------------------------------------------------------------------
    */
    public function hasManyThrough($relatedModel, $throughModel, $foreignKey, $secondForeignKey, $localKey = 'id') {
        $throughInstance = new $throughModel();
        $relatedInstance = new $relatedModel();
        
        $throughResults = $throughInstance->where($foreignKey, '=', $this->$localKey)->get();
        $ids = array_column($throughResults, $secondForeignKey);
        
        return $relatedInstance->whereIn('id', $ids)->get();
    }
}
