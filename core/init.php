<?php

session_start();

$GLOBALS['config'] = array(    
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function($class) {
    include_once(str_replace('\\', '/', $class) . '.php');
});