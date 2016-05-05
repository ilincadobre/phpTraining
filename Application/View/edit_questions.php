<?php ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit pool</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>
    <body>   
        <h3>Edit pool</h3>
        <p>Select one of the below options:</p>
        <ul>
            <li>Add question
                <ul>
                    <li><a href="index.php?page=add_question_standard">Add standard question</a></li>
                    <li><a href="index.php?page=add_question_multiple">Add multiple choice question</a></li>
                </ul>
            </li>
            <li><a href="index.php?page=remove_question">Remove question</a></li>
        </ul>        
        <a href="index.php?page=admin_profile">Go back to profile</a>
    </body>
</html>