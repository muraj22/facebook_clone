<?php	
include("cron/settings.php");
include("functions/sbmail.php");
include("functions/grs.php");
include("functions/sb_user.php");

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
$r=mysql_query("SELECT * FROM parsing_video");
while($m=mysql_fetch_array($r)){
$parsing=$m['parsing'];
}
if($parsing==1){
include("functions/tod.php");

function last_datetimep($topv){
$topv=tod($topv); 

$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);

$td=$tdd->format('%R%Y'); $suf=" year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf=' month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}

if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf=' hour';}

if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf=' minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf=' second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($td>1){$suf.='s';}

if($suf==' hour' && $td>2){
return 'ok';
}
else{
return 'nogo';	
}
	
}
$aver=last_datetimep($m['datetimep']);	
if($aver=="nogo"){exit();}
else{
mysql_query("UPDATE parsing_video SET parsing='0',datetimep=UNIX_TIMESTAMP()");	
}
}
$r=mysql_query("SELECT * FROM media WHERE nye='2' AND visibility!='d' ORDER BY datetimep ASC LIMIT 1");
while($m=mysql_fetch_array($r)){
$sbid=$m['sbid'];
mysql_query("UPDATE media SET nye='6' WHERE sbid='$sbid'");
mysql_query("UPDATE parsing_video SET parsing='1',photoid='$sbid',datetimep=UNIX_TIMESTAMP()");

$uid=$m['id'];

echo $uid;

define('FFMPEG_LIBRARY', '/usr/local/bin/ffmpeg ');

$vido=$m['vidso'];

$path="../users/".$uid."/vids/$vido";

$path_parts=pathinfo("$path");

$basename=$path_parts['basename'];
$ext=$path_parts['extension'];
$extv=$ext;
$basename=basename($path, ".".$ext);


$vid=basename($path, ".".$ext);
$vid.='.mp4';

$vidv=basename($path, ".".$ext);
$vidv.='v.mp4';

$vidhd=basename($path, ".".$ext);
$vidhd.='_hd.mp4';

$toconvert="/var/www/html/users/".$uid."/vids/$vido";

echo $toconvert;

$bitrate=0;
$ffmpeg_output = shell_exec(FFMPEG_LIBRARY." -i $toconvert 2>&1");
if( preg_match('/.*bitrate: ([0-9:]+).*/', $ffmpeg_output, $matches) ) {
   $bitrate=$matches[1];
} 
else{$bitrate=0;}

$vidres=explode("Video:",$ffmpeg_output);
$vidres=explode(",",$vidres[1]);
$vidres=$vidres[2];
$size=explode("x",$vidres);

$width=$size[0];
$height=$size[1];



if($height>=720 && $width>=1024 && $bitrate>1100){
$hd='t';
} 
else{$hd='f';}

if($hd=="t"){
$converted = "/var/www/html/users/".$uid."/vids/$vidhd";
$convertedv = "/var/www/html/users/".$uid."/vids/$vidv";	
}
else{
$converted = "/var/www/html/".$uid."/vids/$vid";	
}


$duration="00:00:01";

if( preg_match('/.*Duration: ([0-9:]+).*/', $ffmpeg_output, $matches) ) {
   $duration=$matches[1];
} 
else{$duration="00:00:01";}

mysql_query("UPDATE media SET duration='$duration',videow='$width',videoh='$height' WHERE sbid='$sbid'");

$durationv=explode(":",$duration);

$sec1=$durationv[0]*60*60;
$sec2=$durationv[1]*60;
$sec=$sec1+$sec2+$durationv[2];

$mins=$sec/60;


if($mins>20){
mysql_query("UPDATE media SET nye='5' WHERE sbid='$sbid'");	
mysql_query("UPDATE parsing_video SET parsing='1',photoid='$sbid',datetimep=UNIX_TIMESTAMP()");
exit();	
}

if($sec==1){
$tsnaps=2;
}
else if($sec>1 && $sec<=10){
$tsnaps=2;	
}
else if($sec>10 && $sec<=60){
$tsnaps=9;	
}
else{
$tsnaps=10;	
}

$snapst=$sec/$tsnaps;


$tsnapsv=array();
$dsnapt=0;
if($sec==1 && $tsnaps=2){
$snapst=1;
$tsnapsv[1]=0.8;	
}
else{
$tsnapsv[1]=1;
}
$x=2;

while($x<=$tsnaps){
$dsnapt=$dsnapt+$snapst;
$tsnapsv[$x]=$dsnapt;
$x++;
}


 foreach($tsnapsv as $k=>$v){
   $exec_string = FFMPEG_LIBRARY." -ss $v -i $toconvert -r 1 -vframes 6 /var/www/html/users/".$uid."/pics/".$basename."shot".$k.".png";
   exec($exec_string);
 }

 
 foreach($tsnapsv as $k=>$v){

$target_path=$root."/users/".$uid."/pics";

$ufile=$root."/users/".$uid."/pics/".$basename."shot".$k.".png";

$path_parts = pathinfo("$ufile");

$ext=$path_parts['extension']; 

$ran = $basename."shot".$k;
$ran2 = $ran.".";
$target_path1=$root."/users/$uid/pics/";

$target_path = $target_path1.$ran2.$ext; 
$target_paths = $target_path1.$ran.'v.'.$ext; 


$target_pathv=$target_path;
$target_pathvv=$target_paths;
$target_pathvvv='';


$actual_pic=$ran2.$ext;
$actual_pic2=$ran.'s.'.$ext;
$actual_pic3='';
$actual_pic4=$ran.'v.'.$ext;
$actual_pic7=$ran.'a.'.$ext;

$rhelper_jsv="../";
include("add_photos/include.php");

$albumid=$m['albumid'];

$pics=$actual_pic;
$picss=$actual_pic2;
$picsm=$actual_pic3;
$picsr=$actual_pic4;
$picsa=$actual_pic7;
if($k==1){
mysql_query("UPDATE media SET pics='$pics',picss='$picss',picsm='$picsm',picsr='$picsr',picsa='$picsa' WHERE sbid='$sbid'");
}

mysql_query("INSERT INTO video_shots (id,videoid,albumid,shot,pics,picss,picsm,picsr,picsa,datetimep)
VALUES ('$uid','$sbid','$albumid','$k','$actual_pic','$actual_pic2','$actual_pic3','$actual_pic4','$actual_pic7',UNIX_TIMESTAMP())");
$shotid=mysql_insert_id();

 }

echo $extv;
echo ':'.$hd;
if($extv=="mp4"){
if($hd=="t"){
copy($toconvert,$converted);	
}
}
else{
$exec_string = FFMPEG_LIBRARY."-i $toconvert $converted";
exec($exec_string);	
}



if($hd=="t"){
mysql_query("UPDATE media SET vidshd='$vidhd' WHERE sbid='$sbid'");
}
else{
mysql_query("UPDATE media SET vids='$vid' WHERE sbid='$sbid'");	
}
   
if($hd=="t"){
   $exec_string = FFMPEG_LIBRARY."-i $toconvert -b 700k $convertedv";
   exec($exec_string);
mysql_query("UPDATE media SET vids='$vidv' WHERE sbid='$sbid'");	  
}   




mysql_query("UPDATE media SET nye='3',shot='1',shott='$tsnaps' WHERE sbid='$sbid'");
mysql_query("UPDATE parsing_video SET parsing='0',photoid='$sbid',datetimep=UNIX_TIMESTAMP()");

$uti=sb_user($uid);
$p=array();
$p['s']='Your video is ready';
$p['m']='<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:98%" border="0"><tbody><tr><td style="font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="font-size:16px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;background:#3b5998;color:#ffffff;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px"><a style="text-decoration:none" href="http://www.subsbook.com/video.php?v='.$sbid.'" target="_blank"><span style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;font-size:16px;letter-spacing:-0.03em;text-align:left;vertical-align:baseline">upfrev</span></a></td></tr></tbody></table><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px" border="0" width="620px"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" width="620px" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:20px;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-bottom:10px">You video is now ready to view on Upfrev!</td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:10px;padding-bottom:10px">To edit its details and pick a thumbnail, go to:</td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:10px"><a href="http://www.subsbook.com/video/editvideo.php?v='.$sbid.'" target="_blank"http://www.subsbook.com/video/editvideo.php?v='.$sbid.'</a></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0;background-color:#fff;border-left:none;border-right:none;border-top:1px solid #ccc;border-bottom:none"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>{footer}<span style="width:620px"><img style="border:0;width:1px;min-height:1px"></span></td></tr></tbody></table>';
$p['t']=$uti['email'];
$p['f']='Upfrev';
$p['e']="notification+".grs(15).'@upfrevmail.com';

sbmail($p);

	echo'termino';
}
include("end.php");
?>