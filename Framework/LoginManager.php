<?php

namespace Framework;

use Framework\Validation;
use Application\Model\Repository\UserRepository;

class LoginManager extends Validation {

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function check($requested, $items = array()) {
        foreach ($items as $item => $rules) {
            $key = array_search('primary', $rules);
            if (isset($rules[$key]) && $rules[$key] === true) {
                $primary_item = $rules['name'];
                $value = $requested[$primary_item];
            }
        }
        $entry = $this->repository->retrieve('users', $primary_item, $value);
        if (isset($entry)) {
            foreach ($items as $item => $rules) {
                foreach ($rules as $rule => $rule_value) {
                    switch ($rule_value) {
                        case 'text':
                            if ($entry[$rules['name']] !== $requested[$rules['name']]) {
                                $this->addError("{$rules['name']}", "{$rules['name']} is incorrect!");
                            }
                            break;
                        case 'password':
                            if (!password_verify($requested[$rules['name']], $entry[$rules['name']])) {
                                $this->addError("{$rules['name']}", "{$rules['name']} is incorrect!");
                            }
                            break;
                    }
                }
            }

            if (empty($this->getErrors())) {
                $this->SetSuccess(true);
            }
            return $this;
        }
    }

}
