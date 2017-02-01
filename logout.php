<?php  
include("start.php");
session_destroy();
?>
<?php
if($uid!="none"){ //it came from start.php ...
mysql_query("UPDATE registered SET status='2' WHERE id='$uid'");
mysql_close($con);
}


setcookie ("keep_me_logged_in", "", time() - 3600,"/");
setcookie ("login_cookie", "", time() - 3600,"/");
setcookie ("login_cookie2", "", time() - 3600,"/");
setcookie ("tz", "", time() - 3600,"/");
setcookie ("dst", "", time() - 3600,"/");
setcookie ("slt", "", time() - 3600,"/");
setcookie ("ts", "", time() - 3600,"/");


if($uid!="none" || $uid=="none"){
if(!isset($noloop)){
header('Location: /');
}
}
else{
//determine a way to specify to start.php which files should trigger a dialog and which files should redirect to the homepage..
//display response which will trigger a js that will pop the please login dialog
}
?>