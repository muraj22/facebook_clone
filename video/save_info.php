<?php
include("start.php");

session_start();

$insert_dk='insert'.$dk;
$_SESSION[$insert_dk]=true;

$descr=$desc_text;

$pinboard=1;

$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='Videos'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp) VALUES('$uid','Videos','','','v','','1000000000','1000000000','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),'')");
$albumid=mysql_insert_id();
$likeid=$albumid;
$ltype='album';
include("stories/like_insert.php");

}
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='Videos'");
while($m=mysql_fetch_array($r)){
$albumid=$m['sbid'];	
}


$sbidv=$dk;
$r=mysql_query("SELECT * FROM media WHERE sbidv='$sbidv' AND id='$uid'");
$c=mysql_num_rows($r);

if($vidso!="" && file_exists("../users/".$uid."/vids/$vidso")){
$nye='2';
}
else{
$nye='1';	
}


if($c==0){
$r=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$albumid' AND visibility!='d' ORDER BY norder DESC LIMIT 1");
$c2=mysql_num_rows($r);
if($c2==0){$norder=0;}
else{
while($m=mysql_fetch_array($r)){
$norder=$m['norder'];	
}
}
$norder=$norder+1;

include("stories/media_insert.php");

$photoid=mysql_insert_id();

$ltype='photo';
$likeid=$photoid;
include("stories/like_insert.php");

}
else{
mysql_query("UPDATE media SET vids='',vidshd='',vidso='$vidso',descr='$descr',location='$location',title='$title',nye='$nye',privacy='$privacy',privacyh='$privacyh' WHERE sbidv='$sbidv' AND id='$uid'");	
}

if($nye=="2"){
$r=mysql_query("SELECT * FROM media WHERE sbidv='$sbidv' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$sbid=$m['sbid'];
if($uploadready=="2"){
echo'<script type="text/javascript">
upload_video_completef();
$.doTimeout(50,function(){window.location="/video/video.php?v='.$sbid.'"});
</script>';		
}
else if($uploadready=="3"){
echo'<script type="text/javascript">
upload_video_completefv();
</script>';	
}
else{
echo'<script type="text/javascript">
upload_video_completef();
</script>';	
}
}
}

unset($_SESSION[$insert_dk]);
include("end.php");
?>