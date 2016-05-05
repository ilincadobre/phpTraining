<?php

namespace Framework;
use Framework\FlashMessenger;

class Token {

    private $messenger;
    
    public function __construct() {        
        $this->messenger = new FlashMessenger;
    }
    
    public function getMessenger() {
        return $this->messenger;
    }
    
    public function generate() {
        return $this->messenger->put(Config::getConfig('session/token_name'), md5(uniqid()));
    }

    public function check($token) {
        $token_name = Config::getConfig('session/token_name');
        if ($token === $this->messenger->get($token_name)) {
            $this->messenger->delete($token_name);
            return true;
        }
        return false;
    }

}
