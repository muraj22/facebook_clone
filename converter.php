<?php
ignore_user_abort(true);

define('FFMPEG_LIBRARY', 'C:/xampp/htdocs/upfrev/ffmpeg/bin/ffmpeg.exe ');
   
   $srcFile = "C:/xampp/htdocs/upfrev/ffmpeg/hanging2.flv";

$bitrate=0;
$ffmpeg_output = shell_exec(FFMPEG_LIBRARY." -i \"$srcFile\" 2>&1");
if( preg_match('/.*bitrate: ([0-9:]+).*/', $ffmpeg_output, $matches) ) {
   $bitrate=$matches[1];
} 
else{$bitrate=0;}
echo $bitrate;

$vidres=explode("Video:",$ffmpeg_output);
$vidres=explode(",",$vidres[1]);
$vidres=$vidres[2];
$size=explode("x",$vidres);

$width=$size[0];
$height=$size[1];

if($height>=720 && $width>=1024 && $bitrate>1100){
$hq='t';
} 
else{$hq='f';}

if($hq=="t"){
$destFile = "C:/xampp/htdocs/upfrev/ffmpeg/prueba_hq.avi";
$destFilev = "C:/xampp/htdocs/upfrev/ffmpeg/prueba.avi";	
}
else{
$destFile = "C:/xampp/htdocs/upfrev/ffmpeg/prueba.avi";	
}

$duration="00:00:01";

if( preg_match('/.*Duration: ([0-9:]+).*/', $ffmpeg_output, $matches) ) {
   $duration=$matches[1];
} 
else{$duration="00:00:01";}

$durationv=explode(":",$duration);

$sec1=$durationv[0]*60*60;
$sec2=$durationv[1]*60;
$sec=$sec1+$sec2+$durationv[2];

if($sec==1){
$tsnaps=1;
}
else if($sec>1 && $sec<=10){
$tsnaps=2;	
}
else{
$tsnaps=10;	
}

$snapst=$sec/$tsnaps;


$tsnapsv=array();
$dsnapt=0;
$x=1;
while($x<=$tsnaps){
$dsnapt=$dsnapt+$snapst;
$tsnapsv[$x]=$dsnapt;
$x++;
}



 //creates shot
 foreach($tsnapsv as $k=>$v){
   $exec_string = FFMPEG_LIBRARY." -ss $v -i $srcFile -r 1 -vframes 6 C:/xampp/htdocs/upfrev/ffmpeg/shot".$k.".png";
   exec($exec_string);
 }



   $exec_string = FFMPEG_LIBRARY."-i $srcFile $destFile";
   exec($exec_string);	
   
if($hq=="t"){
   $exec_string = FFMPEG_LIBRARY."-i $srcFile -b 500k $destFilev";
   exec($exec_string);
}   



?>