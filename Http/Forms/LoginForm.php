<?php

namespace Http\Forms;
use Core\Validator;

class LoginForm {
    protected $errors = [];
    public function validate($email, $password) {

        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($password, 1, 5)) { 
            $this->errors['password'] = "Password must be valid";
        }

        return empty($this->errors);
    }

    //getter method to get errors if there are not empty
    public function errors() {
        return $this->errors;
    }
}