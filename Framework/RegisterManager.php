<?php

namespace Framework;

use Framework\Validation;
use Application\Model\Repository\UserRepository;

class RegisterManager extends Validation {

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function check($requested, $items = array()) {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                $user_value = $requested["{$rules['name']}"];
                if (empty($user_value) && $rule === 'required' && $rule_value === true) {
                    $this->addError("{$rules['name']}", "{$rules['name']} is required");
                } else if (!empty($user_value)) {
                    switch ($rule) {
                        case 'unique':
                            if ($this->repository->search('users', $rules['name'], $user_value) !== false) {
                                $this->addError("{$rules['name']}", "{$rules['name']} $user_value is already taken");
                            }
                            break;
                        case 'min':
                            if (strlen($user_value) < $rule_value) {
                                $this->addError("{$rules['name']}", "Minimum length of {$rules['name']} should be {$rule_value}");
                            }
                            break;
                        case 'max':
                            if (strlen($user_value) > $rule_value) {
                                $this->addError("{$rules['name']}", "Maximum length of {$rules['name']} should be {$rule_value}");
                            }
                            break;
                        case 'email':
                            if (!filter_var($user_value, FILTER_VALIDATE_EMAIL)) {
                                $this->addError("{$rules['name']}", "{$rules['name']} is not valid");
                            }
                            break;
                    }
                }
            }
        }

        if (empty($this->getErrors())) {            
            $this->setSuccess(true);            
        }
        return $this;
    }

}
