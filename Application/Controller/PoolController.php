<?php

namespace Application\Controller;

use Application\Controller\QuestionController;
use Framework\PoolManager;
use Framework\Request;
use Framework\FlashMessenger;
use Framework\Token;

class PoolController extends AbstractController {

    private $manager;
    private $question;

    public function __construct() {
        $this->construct();
        $this->manager = new PoolManager();
        $this->question = new QuestionController();
    }

    public function add(Request $request, FlashMessenger $messenger, Token $token) {

        if ($request->post('add_question')) {
            $validation_items = array(
                'question' => array('name' => 'question', 'required' => true),
                'choices' => array('name' => 'choices', 'min' => 3, "max" => 5),
                'answer' => array('name' => 'answer', 'required' => true),
                'answers' => array('name' => 'answers', 'match' => 'choices')
            );

            $requested = array(
                'question' => $request->post('question'),
                'answer' => $request->post('answer'),
                'choices' => $this->getChoiches($request),
                'answers' => $this->getAnswers($request)
            );
            $this->manager = $this->manager->check($requested, $validation_items);
            if ($this->manager->getSuccess()) {
                $success = $this->question->add('questions', $requested);                
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
    
    public function remove(Request $request, FlashMessenger $messenger, Token $token) {
        $questions = $this->question->getAllItems('questions', 'question');              
        $ids = $this->question->getAllItems('questions', 'id');  
        if ($request->post('remove_questions')) {            
            foreach ($questions as $key => $value) {
                $requested = $request->post("question_{$ids[$key]}");                 
                if($requested === 'on') {                   
                     $this->question->remove('questions', 'id', $ids[$key]);                 
                }                
            } 
            $this->redirect->to('edit_questions');
        }
        return false;
    } 
    
    public function listAll() {
        return $this->question->getAllEntries('questions');       
    }
    
    private function getChoiches(Request $request) {
        for ($i = 1; $i <= 5; $i ++) {
            $choiches[$i - 1] = $request->post("choice{$i}");
        }
        return $choiches;
    }

    private function getAnswers(Request $request) {
        for ($i = 1; $i <= 5; $i ++) {
            $answers[$i - 1] = $request->post("answer{$i}");
        }
        return $answers;
    }

}
