<?php

namespace Application\Model\Repository;

use Application\Model\Entity\User;
use \Application\Model\Repository\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface {

    public function insert($tablename, User $user) {
        $user_array = ["username" => $user->getUsername(),
            "password" => $user->getPassword(),
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "access" => $user->getAccess()];
        $content = $this->getJsonContent($this->default_filename);
        array_push($content[$tablename], $user_array);
        return $this->setJsonContent($content, $this->default_filename);
    }

    
}
