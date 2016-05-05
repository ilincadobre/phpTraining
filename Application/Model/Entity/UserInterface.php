<?php

namespace Application\Model\Entity;

interface UserInterface {

    public function getUsername();

    public function getName();

    public function getPassword();

    public function getEmail();

    public function getAccess();

    public function setUsername($username);

    public function setName($name);

    public function setPassword($password);

    public function setEmail($email);

    public function setAccess($access);
}
