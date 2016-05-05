<?php

namespace Application\Model\Repository;
use \Application\Model\Entity\User;

interface UserRepositoryInterface {

    public function insert($table, User $user);   

}
