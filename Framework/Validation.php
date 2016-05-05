<?php

namespace Framework;

abstract class Validation {

    private $errors = array();
    private $success = false;

    public function getErrors() {
        return $this->errors;
    }

    public function getSuccess() {
        return $this->success;
    }

    protected function addError($item, $error) {
        $this->errors[$item] = $error;
    }
    
    protected function setSuccess($value) {
        $this->success = $value;
    }

}
