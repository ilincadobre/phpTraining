<?php

namespace Application\Model\Entity;

class User implements UserInterface {

    private $username;
    private $name;
    private $password;
    private $email;
    private $access;

    function __construct($username = null, $password = null, $name = null, $email = null, $access = 'general') {
        $this->username = $username;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->access = $access;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
        //to do: write encryption here
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAccess($access) {
        $this->access = $access;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAccess() {
        return $this->access;
    }

}
