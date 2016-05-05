<?php

namespace Framework;

use Framework\Model\Page;
use Framework\Controller\PageController;
use Framework\View\PageView;

require_once './core/init.php';
define("APP_PATH", dirname(__FILE__));

$dispecer = new Dispecer();
$request = new Request();
$messenger = new FlashMessenger();
$token = new Token();

$page = new Page('home');
$controller = new PageController($page);
$view = new PageView($page);

$pagename = $request->get('page');
$action = $request->get('action');
$ctrl = $request->get('ctrl');

$output = $dispecer->dispatch($ctrl, $action, $request, $messenger, $token);
if ($pagename) {
    switch ($pagename) {
        case 'login':
            if ($messenger->get('login')) {
                if ($messenger->get('admin')) {
                    $output = 'admin_profile';
                } else {
                    $output = 'user_profile';
                }
                $page = $controller->update('loggedin');
            } else {
                $page = $controller->update($pagename);
            }
            break;
        case 'register':
            if ($messenger->get('login')) {
                if ($messenger->get('admin')) {
                    $output = 'admin_profile';
                } else {
                    $output = 'user_profile';
                }
                $page = $controller->update('loggedin');
            } else {
                $page = $controller->update($pagename);
            }
            break;
        case 'admin_profile':
            if ($messenger->get('login') && !$messenger->get('admin')) {
                $page = $controller->update('forbidden');
            } else if (!$messenger->get('login')) {
                $page = $controller->update('continue_to_login');
            }
            else {
                $page = $controller->update($pagename);
            }
            break;
        case '': //all pages from admin must output forbidden when user is not admin: create_test, edit_test, edit_questions, add(standard/multiple), remove_questions
                break;
        default:
            $page = $controller->update($pagename);
            break;
    }
}
$view->render($page, $output, $request, $token);


