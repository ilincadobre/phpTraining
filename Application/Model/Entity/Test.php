<?php

namespace Application\Model\Entity;

class Test {
    private $name;
    private $description;
    private $questions;
    
    public function __construct($name = null, $description = null, $questions = array()) {
        $this->name = $name;
        $this->description = $description;
        $this->questions = $questions;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getQuestions() {
        return $this->questions;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function setQuestions($questions){
        $this->questions = $questions;
    }
    
}

