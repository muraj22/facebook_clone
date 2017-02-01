<?php
include("start.php");

mysql_query("UPDATE lists_members SET relation_confirmed='3' WHERE id='$uid' AND sbid='$sbid'");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND sbid='$sbid'");
while($m=mysql_fetch_array($r)){
$uidv=$m['id2'];
mysql_query("UPDATE lists_members SET relation_confirmed='3' WHERE id='$uidv' AND id2='$uid' AND type='family'");
}

//relation confirmed 3 means it is not pending, it was not confirmed, therefore not shown although it can remain in lists_members... (it isn't implicit visibility d)
include("end.php");
?>