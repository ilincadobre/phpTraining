<?php

namespace Framework\Model;

class Page {

    private $pagename;
    private $content;
    private $data;

    public function __construct($pagename = null, $content = null, $data = null) {
        $this->pagename = $pagename;
        $this->content = $content;
        $this->data = $data;
    }

    public function setName($pagename) {
        $this->pagename = $pagename;
    }

    public function getName() {
        return $this->pagename;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }
    
    public function setData($data) {
        $this->data = $data;
    }
    
    public function getData() {
        return $this->data;
    }

}
