<?php

namespace Framework;

use \Framework\Model\Page;

class Controller {

    private $page;

    function __construct(Page $page) {
        $this->page = $page;
    }

    public function updatePage($pagename, $data=null) {
        $this->page->setName($pagename);
        $this->page->setData($data);
        return $this->page;
    }

}
