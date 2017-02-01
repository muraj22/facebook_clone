<?php include("start.php"); ?>
<?php
$sbid=$_POST['sbid'];
$r=mysql_query("SELECT * FROM workedu WHERE sbid='$sbid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$place=$m['place'];	
}
mysql_query("UPDATE workedu SET visibility='d' WHERE sbid='$sbid' AND id='$uid'");

mysql_query("UPDATE lists SET visibility='d' WHERE id='$uid' AND institution='$place' AND type='work'");
?>
<?php include("end.php"); ?>