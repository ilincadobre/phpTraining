<?php

namespace Framework;

use Framework\Model\Page;

class View {

    private $page;
    private $defaultPath = 'Application/View';
    private $defaultPage;
    private $defaultExtension = 'php';

    function __construct(Page $page) {
        $this->page = $page;
        $this->defaultPath = $this->getDefaultPath();
        $this->defaultPage = $this->page->getName();
        $this->defaultExtension = $this->getDefaultExtension();
    }

    public function setDefaultPath($defaultPath) {
        $this->defaultPath = $defaultPath;
    }

    public function getDefaultPath() {
        return $this->defaultPath;
    }

    public function setDefaultPage(Page $page) {
        $this->defaultPage = $page->getName();
    }

    public function getDefaultPage() {
        return $this->page->getName();
    }

    public function setDefaultExtension($defaultExtension) {
        $this->defaultExtension = $defaultExtension;
    }

    public function getDefaultExtension() {
        return $this->defaultExtension;
    }

    public function render(Page $page) {
        $this->setDefaultPage($page);
        $filename = APP_PATH . "/{$this->defaultPath}/{$this->defaultPage}.{$this->defaultExtension}";
        $this->page->setName($filename);
        include "{$page->getName()}";        
    }

}
