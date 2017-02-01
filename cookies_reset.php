<?php
setcookie ("keep_me_logged_in", "", time() - 3600,"/");
setcookie ("login_cookie", "", time() - 3600,"/");
setcookie ("login_cookie2", "", time() - 3600,"/");
setcookie ("tz", "", time() - 3600,"/");
setcookie ("dst", "", time() - 3600,"/");
setcookie ("slt", "", time() - 3600,"/");
setcookie ("ts", "", time() - 3600,"/");

if(isset($_COOKIE["keep_me_logged_in"])){
$time_f_cookie=60*60*24*14;
setcookie("keep_me_logged_in",$uid, time()+$time_f_cookie,"/");
}
else{$time_f_cookie=60*60*24*2;}

$salted=$uid."norisk";
$mysalt="oaksdas98129uijasojd0123";
$dsalt=crypt($salted,$mysalt);

mysql_query("UPDATE registered SET dsalt='$dsalt' WHERE id='$uid'");

setcookie("login_cookie",$uid, time()+$time_f_cookie,"/");
setcookie("login_cookie2",$nusername,time()+$time_f_cookie,"/");
setcookie("tz",$ctimezone,time()+$time_f_cookie,"/");
setcookie("dst",$cdaylight,time()+$time_f_cookie,"/");
setcookie("slt",$dsalt,time()+$time_f_cookie,"/");
setcookie("ts",time(),time()+$time_f_cookie,"/");
?>