<?php
$d=scandir("C:/xampp/htdocs/pablo_mp3/",0);

print_r($d);

foreach($d as $k=>$v){
if($v!="." || $v!=".."){
if(strpos($v,".mp3")!==false){
$files[]=$v;
}
}
}


define('FFMPEG_LIBRARY', 'C:/xampp/htdocs/ffmpeg/bin/ffmpeg.exe ');

foreach($files as $k=>$v){

$v2=str_replace(" ","_",$v);
$v2=str_replace("'","",$v2);
$v2=str_replace("`","",$v2);
$v2=str_replace("!","",$v2);
$v2=str_replace(",","",$v2);
$v2=str_replace("&","",$v2);

rename("pablo_mp3/".$v,"pablo_mp3/".$v2);

$v2=str_replace(".mp3","",$v2);

$toconvert="C:/xampp/htdocs/pablo_mp3/";
$converted="C:/xampp/htdocs/pablo_mp3/wav/";

$toconvert.=$v2.'.mp3';
$converted.=$v2.'.wav';

echo $converted;

$exec_string = FFMPEG_LIBRARY."-i $toconvert -ar 44100 -ab 16 $converted";
exec($exec_string);	


}







?>