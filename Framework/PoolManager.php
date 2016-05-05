<?php

namespace Framework;

class PoolManager extends Validation {

    public function check($requested, $items = []) {
        $type = $this->checkType($requested);
        if (strcmp($type, 'standard') == 0) {
            return $this->checkStandard($requested, $items);
        } else if (strcmp($type, 'multiple') == 0) {
            unset($items['answer']);
            return $this->checkMultiple($requested, $items);
        }

        return false;
    }

    private function checkType($requested) {
        if ($requested['answer'] === false) {
            return 'multiple';
        }
        return 'standard';
    }

    private function checkStandard($requested, $items) {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                $user_value = $requested["{$rules['name']}"];
                if (empty($user_value) && $rule === 'required' && $rule_value === true) {
                    $this->addError("{$rules['name']}", "{$rules['name']} is required");
                }
            }
        }
        if (empty($this->getErrors())) {
            $this->setSuccess(true);
        }
        return $this;
    }

    private function checkMultiple($requested, $items) {
        foreach ($items as $item => $rules) {
            $user_value = $requested["{$rules['name']}"];
            if (sizeof($user_value) === 1) {
                if (empty($user_value) && isset($rules['required']) && $rules['required'] === true) {
                    $this->addError("{$rules['name']}", "{$rules['name']} is required");
                }
            } else {
                $cnt = 0;
                foreach ($user_value as $choice => $choice_value) {
                    if (!empty($choice_value)) {
                        $cnt ++;
                    }
                }
                foreach ($rules as $rule => $rule_value) {
                    switch ($rule) {
                        case 'min':
                            if ($cnt < $rule_value) {
                                $this->addError("{$rules['name']}", "Complete at least {$rule_value} {$rules['name']}");
                            }
                            break;
                        case 'max':
                            if ($cnt > $rule_value) {
                                $this->addError("{$rules['name']}", "Complete maximum {$rule_value} {$rules['name']}");
                            }
                            break;
                        case 'match':
                            $match = $requested[$rule_value];
                            foreach ($match as $match_key => $match_value) {
                                if (empty($match_value) && $user_value[$match_key] !== false) {
                                    $this->addError("{$rules['name']}", 'You cannot set an empty field');
                                }
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
