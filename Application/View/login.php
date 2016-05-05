<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>
    <body>      
        <h1>Sign In</h1>
        <form action="" method="post">
            Username: <input name="username" type="text" value="<?php echo htmlspecialchars($request->post('username')); ?>" autocomplete="off">
            <span class="error">
                <?php
                if (!empty($output['username'])) {
                    echo ' *' . $output['username'];
                }
                ?>    
            </span><br>       
            Password: <input name="password" type="password" autocomplete="off">
            <span class="error">
                <?php
                if (!empty($output['password'])) {
                    echo ' *' . $output['password'];
                }
                ?>  
            </span><br>
            <input name="login" type="submit" value="Sign In!">
        </form>       
    </body>
</html>