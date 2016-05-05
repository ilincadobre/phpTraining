<?php

namespace Application\Controller;

class TestController extends AbstractController {

    public function __construct() {
        $this->construct();
    }

    public function create() {
        $user_values = array(
            'name' => $this->request->post('name'),
            'description' => $this->request->post('description')
        );
        
    }

    public function edit() {
        
    }

    public function view() {
        
    }

}
