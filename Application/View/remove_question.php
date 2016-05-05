<?php

namespace Application\Controller;

use Application\Model\Repository\QuestionRepository;

$questions = new QuestionRepository();
$pool = new PoolController();
$table = $questions->getTable('questions', $questions->getDefaultFilename());
$pool->remove();
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
        <title>Remove questions</title>
        <link rel="stylesheet" href="./public/styles/plain.css">
    </head>
    <body>   
        <h3>Remove questions</h3>
        <p>Select one or more questions to remove:</p>
        <form action="" method="post">
            <ol>
                <?php foreach ($table as $key => $value) { ?>            
                    <li><input type="checkbox" name="<?php echo "question_{$table[$key]['id']}" ?>"><?php echo $table[$key]['question']; ?></li>
                <?php } ?>
            </ol>
            <input type="submit" name="remove_questions" value="Remove">
        </form>
    </body>
</html>