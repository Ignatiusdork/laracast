<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
    protected $errors = [];

    //public $attributes;
    public function __construct(public array $attributes) {
        if (!Validator::email($attributes['$email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($attributes['$password'], 1, 255)) { 
            $this->errors['password'] = "Password must be valid";
        }
    }

    public static function validate($attributes) {
    
        $instance = new static($attributes);

        if ($instance->failed()) {
            //throw new ValidationException();
            ValidationException::throw($instance->errors(), $instance->attributes);
        }

        return $instance;
    }

    public function failed() {
        return count($this->errors);
    }

    //getter method to get errors if there are not empty
    public function errors() {
        return $this->errors;
    }

    public function error($field, $message) {
        $this->errors[$field] = $message;
    }
}