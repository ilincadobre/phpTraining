<?php

namespace Application\Controller;

use Framework\TestManager;
use Framework\Request;
use Framework\FlashMessenger;
use Framework\Token;

class TestController extends AbstractController {

    private $question;

    public function __construct() {
        $this->construct();
        $this->manager = new TestManager();
        $this->test = new TestRepostioryController();
    }

    public function create(Request $request, FlashMessenger $messenger, Token $token) {
        if ($request->post('create_test')) {
            $user_values = array(
                'name' => $request->post('name'),
                'description' => $request->post('description'),
                'questions' => $this->getQuestions($request)
            );
            $validation_items = array(
                'name' => array('name' => 'name', 'required' => true),
                'description' => array('name' => 'description', 'required' => true),
                'questions' => array('name' => 'questions', 'min' => 3)
            );
            $this->manager = $this->manager->check($user_values, $validation_items);            
            if ($this->manager->getSuccess()) {
                $success = $this->test->add('tests', $requested);                
                if ($success) {
                    $messenger->flash('success', 'Test created successfully!');
                    $this->redirect->to('admin_profile');
                    return true;
                } else {
                    $messenger->flash('error', 'Process failed!');
                    return false;
                }
            }
            return $errors = $this->manager->getErrors();
          
        }
    }

    private function getQuestions(Request $request) {
        $question_ids = $this->question->getAllItems('questions', 'id');        
        $requested = [];
        foreach ($question_ids as $key => $value) {
            $checked = $request->post("question_{$question_ids[$key]}");
            if ($checked === 'on') {
                $requested[] = $question_ids[$key];
            }
        }
        return $requested;
    }

    public function edit() {
        
    }

    public function view() {
        
    }

}
