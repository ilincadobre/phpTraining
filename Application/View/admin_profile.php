<?php

namespace Framework;

use Application\Controller\UserController;

$messenger = new FlashMessenger();
$user = new UserController();
$username = $user->getUserProperty('name', 'username', $messenger->get('login'));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>    
    <body> 
        <?php if ($messenger->get('login') && $messenger->get('admin')) { ?>
            <header>
                <a href="index.php?page=logout">Logout</a>
            </header>
            <h2>Welcome <?php
            if (isset($username)) {
                echo $username;
            }
            ?>
            </h2>
            <br>
            <ol>
                <li><a href="index.php?page=create_test">Create test</a></li> 
                <li><a href="index.php?page=edit_history">Edit test</a></li>
                <li><a href="index.php?page=edit_questions">Edit questions</a></li>
                <li><a href="index.php?page=view_tests">View tests</a></li>
            </ol>
        <?php } else if ($messenger->get('login') && !$messenger->get('admin')) { ?>
            You are not allowed to access this page.<br>
            Please <a href="index.php?page=logout">logout</a> or return to <a href="index.php?page=user_profile">profile.</a>      
        <?php } else if (!$messenger->get('login')) { ?>
            Please <a href="index.php?page=login">login</a> to continue.
        <?php } ?>        
    </body>
</html>