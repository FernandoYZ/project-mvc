<?php

namespace Core;

class Validation {
    protected $data;
    protected $rules;
    protected $errors = [];

    public function __construct($data, $rules) {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate() {
        foreach ($this->rules as $field => $rules) {
            $rulesArray = explode('|', $rules);
            foreach ($rulesArray as $rule) {
                $this->validateRule($field, $rule);
            }
        }
        return empty($this->errors);
    }

    protected function validateRule($field, $rule) {
        $value = $this->data[$field] ?? null;
        if (strpos($rule, ':')) {
            [$ruleName, $ruleValue] = explode(':', $rule);
        } else {
            $ruleName = $rule;
            $ruleValue = null;
        }
        
        switch ($ruleName) {
            case 'required':
                if (is_null($value)) {
                    $this->addError($field, "$field es requerido");
                }
                break;
            case 'string':
                if (!is_string($value)) {
                    $this->addError($field, "$field debe ser una cadena");
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, "$field debe ser un correo electrónico válido");
                }
                break;
            case 'max':
                if (strlen($value) > $ruleValue) {
                    $this->addError($field, "$field no debe tener más de $ruleValue caracteres");
                }
                break;
            case 'min':
                if (strlen($value) < $ruleValue) {
                    $this->addError($field, "$field debe tener al menos $ruleValue caracteres");
                }
                break;
            case 'confirmed':
                $confirmationField = $field . '_confirmation';
                if ($value !== $this->data[$confirmationField] ?? null) {
                    $this->addError($field, "$field no coincide con la confirmación");
                }
                break;
            case 'unique':
                $tableAndColumn = explode(',', $ruleValue);
                $table = $tableAndColumn[0];
                $column = $tableAndColumn[1];
                $queryBuilder = new QueryBuilder(Database::getConnection()); //acá me sale error por no ser un método estático, lo quería mejorar
                $exists = $queryBuilder->table($table)->where($column, '=', $value)->exists();
                if ($exists) {
                    $this->addError($field, "$field ya está en uso");
                }
                break;
            default:
                break;
        }
    }

    protected function addError($field, $message) {
        $this->errors[$field][] = $message;
    }

    public function getErrors() {
        return $this->errors;
    }
}
