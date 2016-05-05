<?php

namespace Framework;

class TestManager extends Validation {

    public function check($requested, $items) {
        foreach ($items as $item => $rules) {
            $user_value = $requested["{$rules['name']}"];
            if (sizeof($user_value) === 1) {
                if (empty($user_value) && isset($rules['required']) && $rules['required'] === true) {
                    $this->addError("{$rules['name']}", "{$rules['name']} is required");
                }
            } else {
                $cnt = count($user_value);
                foreach ($rules as $rule => $rule_value) {
                    switch ($rule) {
                        case 'min':
                            if ($cnt < $rule_value) {
                                $this->addError("{$rules['name']}", "Complete at least {$rule_value} {$rules['name']}");
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
