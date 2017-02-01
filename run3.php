<?php

$str='languages.txt';
$line3='INSERT INTO languages (language) VALUES ';
$lines = file($str);
foreach ($lines as $line_num => $line) {

$line=trim($line);
$line=addslashes($line);

$line3.='(\''.$line.'\'),';
}

$filename='insert_languages.php';

$fp = fopen($filename, 'w');
fwrite($fp, $line3);
fclose($fp);

?>