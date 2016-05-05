        
<?php


foreach ($table as $key => $value) {
    echo "<li><input type='checkbox' name='question_{$table[$key]['id']}'>{$table[$key]['question']}</li>";
}

echo 'test';
?>
