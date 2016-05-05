<?php

namespace Application\Controller;

$question = new PoolController();
$request = $question->getRequest();
$errors = $question->add();
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
        <title>Add multiple choice question</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>
    <body>     
        <form action="" method="post">
            Question
            <input type="text" name="question" value="<?php echo htmlspecialchars($request->post('question')); ?>" autocomplete="off">
            <span class="error">
                <?php
                if (!empty($errors['question'])) {
                    echo '* ', $errors['question'];
                }
                ?>
            </span><br>
            <br>
            Choices*
            <ol>
                <li><input type="text" name="choice1" value="<?php echo htmlspecialchars($request->post('choice1')); ?>" autocomplete="off"><input type="checkbox" name="answer1" value=""></li>
                <li><input type="text" name="choice2" value="<?php echo htmlspecialchars($request->post('choice2')); ?>" autocomplete="off"><input type="checkbox" name="answer2" value=""></li>
                <li><input type="text" name="choice3" value="<?php echo htmlspecialchars($request->post('choice3')); ?>" autocomplete="off"><input type="checkbox" name="answer3" value=""></li>
                <li><input type="text" name="choice4" value="<?php echo htmlspecialchars($request->post('choice4')); ?>" autocomplete="off"><input type="checkbox" name="answer4" value=""></li>
                <li><input type="text" name="choice5" value="<?php echo htmlspecialchars($request->post('choice5')); ?>" autocomplete="off"><input type="checkbox" name="answer5" value=""></li>
            </ol>
            <span class="error">
                <?php
                if (!empty($errors['choices'])) {
                    echo '* ', $errors['choices'], PHP_EOL;
                }
                if (!empty($errors['answers'])) {
                    echo '* ', $errors['answers'];
                }
                ?>
            </span><br>
            <p>*check one or more boxes for the correct answer(s)</p>
            <input type="submit" name="add_question" value="Done">
        </form>
    </body>
</html>