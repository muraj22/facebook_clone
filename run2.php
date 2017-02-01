<?php

$str='states2.txt';
$line3='';
$lines = file($str);
foreach ($lines as $line_num => $line) {

$linev=explode(',',$line);
$countrycode=$linev[0];
$statec=$linev[1];

$staten=str_replace('"','',$linev[2]);
$staten=trim($staten);

$staten=addslashes($staten);

$line3.='INSERT INTO states (countryc,statec,staten)
VALUES (\''.$countrycode.'\',\''.$statec.'\',\''.$staten.'\');';
}

$filename='insert2.php';

$fp = fopen($filename, 'w');
fwrite($fp, $line3);
fclose($fp);

?>