<?php
foreach ($output as $key => $value) {
    echo "<input type='checkbox' name='question_{$output[$key]['id']}'>{$key}.{$output[$key]['question']}<br>";
}
?>

