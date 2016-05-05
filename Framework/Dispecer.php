<?php

namespace Framework;

use Framework\Request;
use Framework\FlashMessenger;

class Dispecer {

    private $controller;
    private $action;
    private $defaultControllerPath = 'Application\Controller';

    public function __construct($controller = null, $action = null) {
        $this->controller = $controller;
        $this->action = $action;
    }

    public function setController($controller) {
        $this->controller = $controller;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->getAction();
    }

    public function dispatch($controller, $action, Request $request = null, FlashMessenger $messenger = null, Token $token = null) {
        if ($controller && $action) {
            $classname = $this->defaultControllerPath . '\\' . $controller;
            $controller_object = new $classname;
            return $controller_object->$action($request, $messenger, $token);
        }
        return false;
    }

}
