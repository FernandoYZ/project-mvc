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
        foreach ($this->rules as $field => $rule) {
            $method = "validate{$rule}";
            if (method_exists($this, $method)) {
                $this->$method($field);
            }
        }
        return empty($this->errors);
    }

    protected function validateRequired($field) {
        if (empty($this->data[$field])) {
            $this->errors[$field] = 'El campo es requerido';
        }
    }

    protected function validateEmail($field) {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = 'Formato de email inválido';
        }
    }

    public function getErrors() {
        return $this->errors;
    }
}