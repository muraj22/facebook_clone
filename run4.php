<?php

$str='jobs.txt';
$line3='INSERT INTO job_titles (job) VALUES ';
$lines = file($str);
foreach ($lines as $line_num => $line) {

$line=trim($line);
$line=ucwords($line);
$line=addslashes($line);

$line3.='(\''.$line.'\'),';
}

$filename='insert_job_titles.php';

$fp = fopen($filename, 'w');
fwrite($fp, $line3);
fclose($fp);

?>