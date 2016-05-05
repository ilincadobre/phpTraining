<?php

namespace Framework;

use Application\Controller\TestController;
use Application\Model\Repository\QuestionRepository;

$test = new TestController();
$questions = new QuestionRepository;
$table = $questions->getTable('questions', $questions->getDefaultFilename());
$request = $test->getRequest();
$create = $test->create();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create test</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
        <script>
            /*
                $('#button_show').click(function() {
                $.ajax({
            type: 'POST',
            url: './Application/View/showQuestions.php',
            data: {},
            success: function(response) {
                $('#show_questions').html(response);
            }
        });
    });*/
           
            function showQuestions() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        document.getElementById("show_questions").innerHTML = xhttp.responseText;
                    }
                };
                xhttp.open("GET", "./Application/View/showQuestions.php", true);
                xhttp.send();
            }
            
        </script>
    </head>
    <body>   
        <h3> Create test </h3>        
        <form action="" method="post">
            Test name
            <input type="text" name="name" value="<?php echo htmlspecialchars($request->post('name')); ?>" autocomplete="off">
            <span class="error">
                <?php
                if (!empty($errors['name'])) {
                    echo '* ', $errors['name'];
                }
                ?>
            </span>
            <br><br>
            <textarea name="description" rows="10" cols="50" placeholder="Type the test description here" maxlength=100></textarea>
            <span class="error">
                <?php
                if (!empty($errors['description'])) {
                    echo '* ', $errors['description'];
                }
                ?>
            </span>
            <br><br>
            <button type="button" onclick="showQuestions()">Add questions</button>
            <div id="show_questions"></div>           
            <br><br>
            <input type="submit" name="create_test" value="Done">
        </form>
    </body>
</html>

<!--onclick="showQuestions()"-->