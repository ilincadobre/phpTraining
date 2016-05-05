<?php

namespace Application\Model\Repository;

use Application\Model\Entity\QuestionStandard;
use Application\Model\Entity\QuestionMultipleChoice;
use \Application\Model\Repository\QuestionRepositoryInterface;

class QuestionRepository extends Repository implements QuestionRepositoryInterface {

    public function insert($tablename, $question) {
        switch ($question->getType()) {
            case 'standard':
                return $this->insertStandard($tablename, $question);
            case 'multiple choice':
                return $this->insertMultipleChoice($tablename, $question);
            default:
                return false;
        }
    }

    private function insertStandard($tablename, QuestionStandard $question) {
        $question_array = ["id" => $question->getId(),
            "type" => $question->getType(),
            "question" => $question->getQuestion(),
            "answer" => $question->getAnswer()
        ];
        $content = $this->getJsonContent($this->default_filename);
        array_push($content[$tablename], $question_array);        
        return $this->setJsonContent($content, $this->default_filename);
    }

    private function insertMultipleChoice($tablename, QuestionMultipleChoice $question) {
        $answers_array = [];
        $answers = $question->getAnswers();       
        $choices = $question->getChoices();
        foreach($choices as $choice => $choice_value){ 
            if($answers[$choice] === '') {
                $answers[$choice] = true;
            }
            $answers_array[] = array(
                'choice' => $choice_value,
                'correct' => $answers[$choice]
            ); 
        }
        
        $question_array = ["id" => $question->getId(),
            "type" => $question->getType(),
            "question" => $question->getQuestion(),
            "answer" => $answers_array
        ];        
        
        $content = $this->getJsonContent($this->default_filename);
        array_push($content[$tablename], $question_array);        
        return $this->setJsonContent($content, $this->default_filename);
    }

}
