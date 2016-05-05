<?php

namespace Application\Model\Entity;

class QuestionMultipleChoice extends Question{
    
    private $answers;
    private $choices;
    
    public function __construct($id = null, $question = null, $choices = null, $answers = null, $score = null) {
        $this->id;
        $this->question = $question;
        $this->choices = $choices;
        $this->answers = $answers;
        $this->score = $score;
    }
    
    public function getChoices() {
        return $this->choices;
    }
    
    public function setChoices(array $choices) {
        $this->choices = $choices;
    }
    
    public function getAnswers() {
        return $this->answers;
    }
    
    public function setAnswers(array $answers) {
        $this->answers = $answers;
    }
    
}

