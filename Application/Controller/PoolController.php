<?php

namespace Application\Controller;

use Framework\PoolManager;
use Application\Controller\QuestionController;

class PoolController extends AbstractController {

    private $manager;
    private $question;

    public function __construct() {
        $this->construct();
        $this->manager = new PoolManager();
        $this->question = new QuestionController();
    }

    public function add() {

        if ($this->request->post('add_question')) {
            $validation_items = array(
                'question' => array('name' => 'question', 'required' => true),
                'choices' => array('name' => 'choices', 'min' => 3, "max" => 5),
                'answer' => array('name' => 'answer', 'required' => true),
                'answers' => array('name' => 'answers', 'match' => 'choices')
            );

            $requested = array(
                'question' => $this->request->post('question'),
                'answer' => $this->request->post('answer'),
                'choices' => $this->getChoiches(),
                'answers' => $this->getAnswers()
            );
            $this->manager = $this->manager->check($requested, $validation_items);
            if ($this->manager->getSuccess()) {
                $success = $this->question->add('questions', $requested);
                $messenger = $this->getMessenger();
                if ($success) {
                    $messenger->flash('success', 'Question added successfully!');
                    $this->redirect->to('edit_questions');
                    return true;
                } else {
                    $messenger->flash('error', 'Process failed!');
                    return false;
                }
            }
            return $errors = $this->manager->getErrors();
        }
    }    
    
    public function remove() {
        $questions = $this->question->getQuestionsEntries('questions', 'question');
        $id = $this->question->getQuestionsEntries('questions', 'id');
        if ($this->request->post('remove_questions')) {            
            foreach ($questions as $key => $value) {
                $requested = $this->request->post("question_{$id[$key]}");                 
                if($requested === 'on') {                   
                     $this->question->remove('questions', 'id', $id[$key]);                 
                }                
            } 
            $this->redirect->to('edit_questions');
        }
        return false;
    }

    private function getChoiches() {
        for ($i = 1; $i <= 5; $i ++) {
            $choiches[$i - 1] = $this->request->post("choice{$i}");
        }
        return $choiches;
    }

    private function getAnswers() {
        for ($i = 1; $i <= 5; $i ++) {
            $answers[$i - 1] = $this->request->post("answer{$i}");
        }
        return $answers;
    }

}
