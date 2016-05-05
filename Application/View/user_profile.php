<?php
//set username
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User page</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>
    <body>      
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
            <li><a href="index.php?page=take_test">Take new test</a></li> 
            <li><a href="index.php?page=test_history">View test history</a></li>
        </ol>
    </body>
</html>