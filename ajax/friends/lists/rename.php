<?php
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;	
}

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM lists WHERE sbid='$sbid' AND id='$uid' AND listn='$rename'"));
$c=$c['c'];

if($c>0){
echo'e';	
}
else{
	
$r=mysql_query("SELECT * FROM lists WHERE sbid='$sbid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$type=$m['type'];	
}
$noname=array();
$noname[]="acquaintances";
$noname[]="restricted";
$noname[]="close_friends";
if(!in_array($type,$noname)){
mysql_query("UPDATE lists SET listn='$rename' WHERE sbid='$sbid' AND id='$uid'");
}
else{
echo'e';
exit();	
}
}

include("end.php");
?>