<?php

namespace Framework;

$messenger = new FlashMessenger();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test platform</title>
        <link rel="stylesheet" href="../../public/styles/plain.css">
    </head>    
    <body> 
        <?php if (!$messenger->get('login')) { ?>
            <h1>Welcome!</h1>
            Login or register if you don't already have an account.
            <br>
            <br>
            <a href="index.php?page=login">Login</a> 
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?page=register">Sign Up</a>
        <?php
        } else {
            include 'loggedin.php';
        }
        ?>            
    </body>
</html>