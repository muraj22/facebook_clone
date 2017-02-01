<?php
$rand=rand(1,1000);
if($rand<=3 OR isset($strigger)){ //about 5 times an hour just from refreshtimes.php, other 5 from any other recurring net source, such as chat, etc
if(isset($strigger)){
unset($strigger);	
}
$r=mysql_query("SELECT * FROM options WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$octimezone=$m['original_user_timezone'];	
$cdaylight=$m['user_timezone_daylight'];
}

if(isset($_COOKIE["keep_me_logged_in"])){
$time_f_cookie=60*60*24*14;
setcookie("keep_me_logged_in",$uid, time()+$time_f_cookie,"/");
}
else{$time_f_cookie=60*60*24*2;}
setcookie("login_cookie",$_COOKIE["login_cookie"],time()+$time_f_cookie,"/");
setcookie("login_cookie2",$_COOKIE["login_cookie2"],time()+$time_f_cookie,"/");
setcookie("tz",$_COOKIE["tz"],time()+$time_f_cookie,"/");
setcookie("dst",$cdaylight,time()+$time_f_cookie,"/");
setcookie("ts",$_COOKIE["ts"],time()+$time_f_cookie,"/");
}
if(!isset($_SESSION)){
session_start();
}
$_SESSION['logged']=$uid;
session_write_close();
?>