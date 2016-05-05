<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>    
    <body>         
            <header>
                <a href="index.php?page=logout&ctrl=Auth&action=logout&ctrl=Auth&action=logout">Logout</a>
            </header>
            <h2>Welcome <?php
            if (isset($output)) {
                echo $output;
            }
            ?>
            </h2>
            <br>
            <ol>
                <li><a href="index.php?page=create_test&ctrl=TestController&action=create">Create test</a></li> 
                <li><a href="index.php?page=edit_history">Edit test</a></li>
                <li><a href="index.php?page=edit_questions">Edit questions</a></li>
                <li><a href="index.php?page=view_tests">View tests</a></li>
            </ol>    
    </body>
</html>