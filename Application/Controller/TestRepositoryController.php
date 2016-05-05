<?php

namespace Application\Controller;

use Application\Model\Entity\Test;
use Application\Model\Repository\TestRepository;

class TestRepositoryController {

    private $test;
    private $repository;

    public function __construct() {
        $this->repository = new TestRepository;
        $this->test = new Test();
    }

    private function setTest($fields) {
        $this->test->setName($fields['name']);
        $this->test->setDescription($fields['description']);
        $this->test->setQuestions($fields['questions']);
        return $this->test;
    }

    public function add($table, $fields) {
        $this->test = $this->setTest($fields);
        $this->test->setId($this->repository->autoIncrement($table, 'id'));
        return $this->repository->insert($table, $this->test);
    }

}
