<?php
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;	
}
ignore_user_abort(true);

$r=mysql_query("SELECT * FROM favorites WHERE sbidv='$sbid' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO favorites (id,sbidv,visibility,type,datetimep) VALUES('$uid','$sbid','v','$type',UNIX_TIMESTAMP())");
if($type=="lists"){
mysql_query("UPDATE lists SET favorites='1' WHERE sbid='$sbid' AND id='$uid'");	
}
}

include("end.php");
?>