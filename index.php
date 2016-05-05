<?php

namespace Framework;
use Framework\Model\Page;

require_once './core/init.php';
define("APP_PATH", dirname(__FILE__));



$page = new Page('home');
$controller = new Controller($page);
$view = new View($page);
$request = new Request;
$pagename = $request->get('page');
if ($pagename){
        $page = $controller->updatePage($pagename);
 
}
$view->render($page);


//tmp
//session_destroy();
$messenger = new FlashMessenger();
if(isset($_SESSION['login'])){    
    var_dump($_SESSION['login']);
}
if(isset($_SESSION['admin'])){
    var_dump($_SESSION['admin']);
}


