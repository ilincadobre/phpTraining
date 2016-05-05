<?php

namespace Framework;

use Application\Controller\Auth;

$logout = new Auth();
$output = $logout->logout();

//$messenger = new FlashMessenger();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logout</title>
        <link rel="stylesheet" href="../../public/styles/plain.css">
    </head>
    <body>            
        <h1><?php if($output) echo 'You have been logged out!' ?></h1>
        Return to <a href="index.php?page=home">Home</a> 
    </body>
</html>