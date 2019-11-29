<?php
$name = $_POST['name'];
$text = $_POST['yourtext'];


$f = fopen('file.csv', 'w');
fputs($f, $name.",".$text);
fclose($f);
?>