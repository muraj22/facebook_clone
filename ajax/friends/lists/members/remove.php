<?php
include("start.php");

mysql_query("UPDATE lists_members SET visibility='d' WHERE listid='$sbid' AND id='$uid' AND id2='$uidv'");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$sbid' AND id2='$uidv'");
while($m=mysql_fetch_array($r)){
$type=$m['type'];
if($type=="family"){
mysql_query("UPDATE lists_members SET relation_confirmed='3' WHERE id='$uidv' AND id2='$uid'");	
}
}


echo $uidv;
include("end.php");
?>