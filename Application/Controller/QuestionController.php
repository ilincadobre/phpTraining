<?php

namespace Application\Controller;

use Application\Model\Entity\QuestionStandard;
use Application\Model\Entity\QuestionMultipleChoice;
use Application\Model\Repository\QuestionRepository;

class QuestionController {

    private $question;
    private $repository;

    public function __construct() {
        $this->repository = new QuestionRepository;
    }

    private function setQuestion($fields) {
        if (!empty($fields['answer'])) {
            $this->question = new QuestionStandard();
            $this->question->setQuestion($fields['question']);
            $this->question->setAnswer($fields['answer']);
            $this->question->setType('standard');
        } else {
            $this->question = new QuestionMultipleChoice();
            $this->question->setQuestion($fields['question']);
            $this->question->setChoices($fields['choices']);
            $this->question->setAnswers($fields['answers']);
            $this->question->setType('multiple choice');
        }
        return $this->question;
    }

    private function generateId($table) {
        return $this->repository->autoIncrement($table, 'id');
    }

    public function add($table, $fields) {
        $this->question = $this->setQuestion($fields);
        $this->question->setId($this->generateId($table));
        return $this->repository->insert($table, $this->question);
    }

    public function remove($table, $field, $value) {
        return $this->repository->delete($table, $field, $value);
    }
    
    public function getAllEntries($tablename) {
        return $table = $this->repository->getTable($tablename, $this->repository->getDefaultFilename());
    }
    
    public function getAllItems($tablename, $field) {
        $table = $this->repository->getTable($tablename, $this->repository->getDefaultFilename());
        $items = [];
        foreach($table as $key => $value) {
            $items[] = $table[$key][$field];
        }
        return $items;
    }

}
