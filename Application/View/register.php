<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>
    <body>        
        <div>
            <h1>Sign Up</h1>
            <form action="" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($request->post('username')); ?>" autocomplete="off">
                <span class="error">
                    <?php
                    if (!empty($output['username'])) {
                        echo ' *' . $output['username'];
                    }
                    ?>    
                </span><br>             
                <label for="password">Password</label>
                <input type="password" name="password" autocomplete="off">
                <span class="error">
                    <?php
                    if (!empty($output['password'])) {
                        echo ' *' . $output['password'];
                    }
                    ?>  
                </span><br>
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($request->post('name')); ?>" autocomplete="off">
                <span class="error">
                    <?php
                    if (!empty($output['name'])) {
                        echo ' *' . $output['name'];
                    }
                    ?>  
                </span><br>
                <label for="email">Email</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($request->post('email')); ?>" autocomplete="off"> 
                <span class="error">
                    <?php
                    if (!empty($output['email'])) {
                        echo ' *' . $output['email'];
                    }
                    ?>  
                </span><br>
                <input type="submit" name="register" value="Sign Up!">
                <input type="hidden" name="token" value="<?php echo $token->generate(); ?>">
            </form>
        </div>         
    </body>
</html>