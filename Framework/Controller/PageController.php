<?php

namespace Framework\Controller;

use \Framework\Model\Page;

class PageController {

    private $page;

    function __construct(Page $page) {
        $this->page = $page;
    }

    public function update($pagename = null, $content = null) {
        $this->page->setName($pagename);
        $this->page->setContent($content);
        return $this->page;
    }

}
