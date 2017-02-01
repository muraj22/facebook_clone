<?php

$javascript='';
$str='news_feed.php';
$line3='';
$lines = file($str);
foreach ($lines as $line_num => $line) {

if(strpos($line,'<script type="text/javascript">')!==false){
$s='t';	
unset($e);
}
if(strpos($line,'</script>')!==false){
$e='t';	
unset($s);
}

if(isset($s)){
$javascript.=$line;	
}

}

$filename='news_feed_js.php';

$fp = fopen($filename, 'w');
fwrite($fp, $javascript);
fclose($fp);

$php='';
$str='news_feed.php';
$line3='';
$lines = file($str);
foreach ($lines as $line_num => $line) {

if(strpos($line,'<script type="text/javascript">')!==false){
$s='t';	
unset($e);
}
if(strpos($line,'</script>')!==false){
$e='t';	
unset($s);
}

if(!isset($s)){
$php.=$line;
}

}

$filename='news_feed.php';

$fp = fopen($filename, 'w');
fwrite($fp, $php);
fclose($fp);

?>