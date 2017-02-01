<?php
include("start.php");

$ctimezone=$timezone;
$octimezone=$timezone;
$cdaylight=$daylight;

$ctimezone=str_replace("-","",$ctimezone);

$hours=$ctimezone;

if(strpos($hours,".")===true){
$split=explode(".",$hours);
$minutesv=explode(".",$hours);
$minutesv=".".$minutesv[1];
$minutesv=floatval($minutesv); //.755555
$minutesv=$minutesv*60;
if(strlen($minutesv)==1){
$minutesv='0'.$minutesv;	
}
$ctimezone=$split[0].':'.$minutesv;
}
else{
$ctimezone=$hours.':00';	
}

if(substr($octimezone,0,1)=="-"){
$ctimezone="-".$ctimezone;
}else{$ctimezone="+".$ctimezone;}


mysql_query("UPDATE options SET user_timezone='$ctimezone',original_user_timezone='$octimezone',daylight='$cdaylight',datetimep_user_timezone=UNIX_TIMESTAMP() WHERE id='$uid'");

if(isset($_COOKIE["keep_me_logged_in"])){
$time_f_cookie=60*60*24*14;
setcookie("keep_me_logged_in",$uid, time()+$time_f_cookie,"/");
}
else{$time_f_cookie=60*60*24*2;}
setcookie("login_cookie",$uid, time()+$time_f_cookie,"/");
setcookie("login_cookie2",$un,time()+$time_f_cookie,"/");
setcookie("tz",$ctimezone,time()+$time_f_cookie,"/");
setcookie("dst",$cdaylight,time()+$time_f_cookie,"/");

include("end.php");
?>