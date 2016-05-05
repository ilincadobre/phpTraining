<?php

namespace Framework\View;

use Framework\Model\Page;
use Framework\Request;
use \Framework\FlashMessenger;
use \Framework\Token;

class PageView {

    private $page;
    private $defaultPath = 'Application/View';
    private $defaultExtension = 'php';

    public function __construct(Page $page = null) {
        $this->page = $page;
    }

    public function setDefaultPath($defaultPath) {
        $this->defaultPath = $defaultPath;
    }

    public function getDefaultPath() {
        return $this->defaultPath;
    }

    public function setDefaultExtension($defaultExtension) {
        $this->defaultExtension = $defaultExtension;
    }

    public function getDefaultExtension() {
        return $this->defaultExtension;
    }

    public function render(Page $page, $output = null, Request $request = null, Token $token = null) {
        if ($page->getName()) {
            $filename = APP_PATH . "/{$this->defaultPath}/{$page->getName()}.{$this->defaultExtension}";
            $this->page->setName($filename);
            $this->page->setContent($output);
            include "{$page->getName()}";
            return true;
        }
        return false;
    }

}
