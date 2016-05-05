<?php

namespace Framework;

class FlashMessenger {

    public function put($name, $value) {
        return $_SESSION[$name] = $value;
    }

    public function get($name) {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    public function delete($name) {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
            return true;
        }
        return false;
    }

    public function flash($name, $value = '') {
        $session = $this->get($name);
        if($session){
            $this->delete($name);
            return $session;
        }
        else {
            $this->put($name, $value);
        }
    }
}
