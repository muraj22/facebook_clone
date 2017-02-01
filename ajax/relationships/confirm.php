<?php
include("start.php");

mysql_query("UPDATE lists_members SET relation_confirmed='2' WHERE id='$uid' AND sbid='$sbid'");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND sbid='$sbid'");
while($m=mysql_fetch_array($r)){
$uidv=$m['id2'];
mysql_query("UPDATE lists_members SET relation_confirmed='2' WHERE id='$uidv' AND id2='$uid' AND type='family'");
}

//relation confirmed 2 means it is not pending, it confirmed, therefore shown without pending status :)
include("end.php");
?>