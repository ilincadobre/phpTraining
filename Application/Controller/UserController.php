<?php

namespace Application\Controller;
use Application\Model\Repository\UserRepository;
use Application\Model\Entity\User;

class UserController {
    
    private $repository;
    private $user;
        
    public function __construct() {
        $this->repository = new UserRepository();
        $this->user = new User();
    }
    
    public function add($table, $fields){
        $this->user->setUsername($fields['username']);
        $this->user->setPassword(password_hash($fields['password'], PASSWORD_DEFAULT));
        $this->user->setName($fields['name']);
        $this->user->setEmail($fields['email']);
        return $this->repository->insert($table, $this->user);
    }
    
    public function checkUserAccess($item, $value) {
        return $this->getUserProperty('access', $item, $value);
    }
    
    public function getUserProperty($property, $item, $value) {
        $user = $this->repository->retrieve('users', $item, $value);
        if (isset($user[$property])) {
            return $user[$property];
        }
        return false;
    }
}

