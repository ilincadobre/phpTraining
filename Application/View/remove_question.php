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
        <script>
            function showQuestions() {
                var xhttp = new XMLHttpRequest();                
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        document.getElementById("show_questions").innerHTML = xhttp.responseText;                         
                    }
                };
                document.getElementById("submit_remove").disabled = false;
                xhttp.open("GET", "index.php?page=showQuestions&ctrl=PoolController&action=listAll", true);
                xhttp.send();
            }
        </script>
    </head>
    <body>   
        <h3>Remove questions</h3>
        <p>Select one or more questions to remove:</p>

        <button type="button" onclick="showQuestions()">Show all questions</button><br>       
        <form action="" method="post" id="form">
            <br>
            <div id="show_questions"></div> 
            <br>
            <input type="submit" id="submit_remove" name="remove_questions" value="Delete selected" disabled>
        </form>
    </body>
</html>