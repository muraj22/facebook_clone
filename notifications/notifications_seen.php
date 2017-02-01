<?php
include("start.php");

?>
<?php
$notifications=explode(",",$notifications);
foreach($notifications as $k=>$v){
if($v!=""){
$v=explode(":",$v);
$k2=$v[0]; //type
$v2=$v[1]; //id

$r=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$v2' AND type='$k2' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO notifications_seen (id,notificationid,type,datetimep) VALUES('$uid','$v2','$k2',UNIX_TIMESTAMP())");
}
}
}
?>
<?php include("end.php"); ?>