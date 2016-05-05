<?php

namespace Application\Model\Entity;

class QuestionStandard extends Question{
    
    private $answer;
    
    public function __construct($id = null, $question = null, $answer = null, $score = null) {
        $this->id;
        $this->question = $question;
        $this->answer = $answer;
        $this->score = $score;
    }
    
    public function getAnswer() {
        return $this->answer;
    } 

    public function setAnswer($answer) {
        $this->answer = $answer;
    }
    

}

