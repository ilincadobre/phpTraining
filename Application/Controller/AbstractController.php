<?php

namespace Application\Controller;

use Framework\Request;
use Framework\Redirect;
use Framework\Token;
use Framework\FlashMessenger;

abstract class AbstractController {
    
    protected $request;
    protected $token;
    protected $redirect;
    protected $messenger;

    public function construct() {
        //$this->request = new Request();
        //$this->token = new Token();
        $this->redirect = new Redirect();
        //$this->messenger = new FlashMessenger();
    }

    public function getRequest() {
        return $this->request;
    }

    public function getToken() {
        return $this->token;
    }

    public function getMessenger() {
        return $this->token->getMessenger();
    }
}