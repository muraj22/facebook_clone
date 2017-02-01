<?php
include("start.php");

$r=mysql_query("SELECT * FROM tooltip WHERE id='$uid' AND tooltipid='$sbid'");
$c=mysql_num_rows($r);

if($c==0){
if(is_numeric($sbid) && $sbid>0){
mysql_query("INSERT INTO tooltip(id,tooltipid,datetimep) VALUES('$uid','$sbid',UNIX_TIMESTAMP())");	
}
}
include("end.php");
?>