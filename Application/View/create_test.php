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
            function showQuestions() {
                var xhttp = new XMLHttpRequest();                
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        document.getElementById("show_questions").innerHTML = xhttp.responseText;                         
                    }
                };
                document.getElementById("submit_add").disabled = false;
                xhttp.open("GET", "index.php?page=showQuestions&ctrl=PoolController&action=listAll", true);
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
                if (!empty($output['name'])) {
                    echo '* ', $output['name'];
                }
                ?>
            </span>
            <br><br>
            <textarea name="description" rows="10" cols="50" placeholder="Type the test description here" maxlength=100></textarea>
            <span class="error">
                <?php
                if (!empty($output['description'])) {
                    echo '* ', $output['description'];
                }
                ?>
            </span>
            <br><br>
            <button type="button" onclick="showQuestions()">Add questions</button><br>            
            <div id="show_questions"></div>           
            <br><br>
            <input type="submit" id="submit_add" name="create_test" value="Create" disabled>
        </form>
    </body>
</html>

