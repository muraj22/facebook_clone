<?php
$oc=mysql_fetch_array(mysql_query("SELECT COUNT(*) as oc FROM tooltip WHERE id='$uid' AND tooltipid='$tooltipid'"));
$oc=$oc['oc'];
?>