<?php

namespace Application\Model\Entity;

abstract class Question {

    protected $id;
    protected $question;
    protected $score;
    protected $type;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setQuestion($question) {
        $this->question = $question;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function getScore() {
        return $this->score;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

}
