<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test platform</title>
        <link rel="stylesheet" href="../../public/styles/plain.css">
    </head>     
    <body>
        <h2> You are logged in. </h2><br>        
        Please go back to <a href="<?php echo "index.php?page={$output}"; ?>">profile</a><br>
        or         <a href="index.php?page=logout&ctrl=Auth&action=logout">logout.</a> 
    </body>
</html>