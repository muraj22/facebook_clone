<?php

$str='countries.txt';
$line3='';
$lines = file($str);
foreach ($lines as $line_num => $line) {

$linev=explode(',"',$line);
$countrycode=$linev[0];

$countryname=str_replace('"','',$linev[1]);
$countryname=trim($countryname);

$line3.='mysql_query("INSERT INTO countries (countryc,countryn)
VALUES (\''.$countrycode.'\',\''.$countryname.'\')");';
}

$filename='insert.php';

$fp = fopen($filename, 'w');
fwrite($fp, $line3);
fclose($fp);

?>