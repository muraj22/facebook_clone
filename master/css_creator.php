<?php

$css='';
$str='wall.php';
$line3='';
$lines = file($str);
foreach ($lines as $line_num => $line) {

if(strpos($line,'<style type="text/css">')!==false){
$s='t';	
unset($e);
}
if(strpos($line,'</style>')!==false){
$e='t';	
unset($s);
}

if(isset($s)){
$css.=$line;	
}

}

$filename='wall_css.php';

$fp = fopen($filename, 'w');
fwrite($fp, $css);
fclose($fp);


$php='';
$str='wall.php';
$line3='';
$lines = file($str);
foreach ($lines as $line_num => $line) {

if(strpos($line,'<style type="text/css">')!==false){
$s='t';	
unset($e);
}
if(strpos($line,'</style>')!==false){
$e='t';	
unset($s);
}

if(!isset($s)){
$php.=$line;
}

}

$filename='wall.php';

$fp = fopen($filename, 'w');
fwrite($fp, $php);
fclose($fp);

?>