<?php

namespace Framework\Model;

class Page {

    private $name;
    private $content;

    public function __construct($name = null, $content = null) {
        $this->name = $name;
        $this->content = $content;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }
}
