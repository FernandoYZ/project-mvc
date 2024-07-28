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
        foreach ($this->rules as $field => $ruleSet) {
            $rules = explode('|', $ruleSet);
            foreach ($rules as $rule) {
                $this->validateRule($field, $rule);
            }
        }
        return empty($this->errors);
    }

    protected function validateRule($field, $rule) {
        if (strpos($rule, ':') !== false) {
            [$ruleName, $parameter] = explode(':', $rule);
        } else {
            $ruleName = $rule;
            $parameter = null;
        }

        $method = "validate{$ruleName}";
        if (method_exists($this, $method)) {
            $this->$method($field, $parameter);
        } else {
            throw new \Exception("Validation rule {$ruleName} does not exist.");
        }
    }

    protected function validateRequired($field) {
        if (empty($this->data[$field])) {
            $this->errors[$field][] = 'El campo es requerido';
        }
    }

    protected function validateEmail($field) {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = 'Formato de email inválido';
        }
    }

    protected function validateMax($field, $parameter) {
        if (strlen($this->data[$field]) > $parameter) {
            $this->errors[$field][] = "El campo no debe exceder {$parameter} caracteres";
        }
    }

    protected function validateMin($field, $parameter) {
        if (strlen($this->data[$field]) < $parameter) {
            $this->errors[$field][] = "El campo debe tener al menos {$parameter} caracteres";
        }
    }

    protected function validateUnique($field, $parameter) {
        // Aquí puedes implementar la lógica para verificar la unicidad en la base de datos.
    }

    public function getErrors() {
        return $this->errors;
    }
}
