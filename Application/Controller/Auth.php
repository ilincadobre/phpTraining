<?php

namespace Application\Controller;

use Framework\RegisterManager;
use Framework\LoginManager;;

class Auth extends AbstractController{

    private $register;
    private $login;
    private $user;
       
    public function __construct() {            
        $this->construct();
        $this->register = new RegisterManager();
        $this->login = new LoginManager();
        $this->user = new UserController();   
    }

    public function register() {
        if ($this->request->post('register')) {
            if ($this->token->check($this->request->post('token'))) {
                $validation_items = array(
                    'username' => array('name' => 'username', 'required' => true, 'unique' => true),
                    'password' => array('name' => 'password', 'required' => true, 'min' => 6),
                    'name' => array('name' => 'name', 'required' => true, 'max' => 50),
                    'email' => array('name' => 'email', 'required' => true, 'email' => true)
                );
                $requested = array(
                    'username' => $this->request->post('username'),
                    'password' => $this->request->post('password'),
                    'name' => $this->request->post('name'),
                    'email' => $this->request->post('email')
                );
                $this->register = $this->register->check($requested, $validation_items);
                if ($this->register->getSuccess()) {
                    $success = $this->user->add('users', $requested);
                    $messenger = $this->getMessenger();
                    if ($success) {
                        $messenger->flash('success', 'You registered successfully!');                        
                        $this->redirect->to('login');
                        return true;
                    }
                    else {                        
                        $messenger->flash('error', 'Registration failed!');
                        return false;
                    }
                }
                return $errors = $this->register->getErrors();
            }
        }
    }

    public function login() {
        if ($this->request->post('login')) {
            $messenger = $this->getMessenger();
            if (!$messenger->get('login')) {
                $requested = array(
                    'username' => $this->request->post('username'),
                    'password' => $this->request->post('password')
                );
                $validation_items = array(
                    'username' => array('name' => 'username', 'primary' => true, 'match' => 'text'),
                    'password' => array('name' => 'password', 'match' => 'password')
                );

                $this->login = $this->login->check($requested, $validation_items);
                if ($this->login->getSuccess()) {
                    $messenger->put('login', $requested['username']);
                    $access = $this->user->checkUserAccess('username', $requested['username']);
                    if (strcmp($access, 'admin') == 0) {
                        $messenger->put('admin', true);
                        $this->redirect->to('admin_profile');
                    } else {
                        $messenger->put('admin', false);
                        $this->redirect->to('user_profile');
                    }
                    return true;
                }
                return $errros = $this->login->getErrors();
            }
        }
    }

    public function logout() {
        $messenger = $this->getMessenger();
        if ($messenger->get('login')) {
            $messenger->delete('login');
            $messenger->delete('admin');
            session_destroy();
            return true;
        }
        return false;
    }

}
