<?php
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;	
}
ignore_user_abort(true);

$r=mysql_query("SELECT * FROM favorites WHERE sbidv='$sbid' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){exit();}
else{
mysql_query("DELETE FROM favorites WHERE sbidv='$sbid' AND type='$type' AND id='$uid'");
if($type=="lists"){
mysql_query("UPDATE lists SET favorites='2' WHERE sbid='$sbid' AND id='$uid'");	
}
}

include("end.php");
?>