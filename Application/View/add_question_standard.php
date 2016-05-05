<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add standard question</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>
    <body>     
        <form action="" method="post">
                Question
                <input type="text" name="question" value="<?php echo htmlspecialchars($request->post('question')); ?>" autocomplete="off">
                <span class="error">
                    <?php
                    if (!empty($output['question'])) {
                        echo '* ', $output['question'];
                    }
                    ?>
                </span><br>     
                Answer
                <input type="text" name="answer" value="<?php echo htmlspecialchars($request->post('answer')); ?>" autocomplete="off">
                <span class="error">
                    <?php
                    if (!empty($output['answer'])) {
                        echo '* ', $output['answer'];
                    }
                    ?>
                </span><br>               
                <input type="submit" name="add_question" value="Done">
        </form>
    </body>
</html>