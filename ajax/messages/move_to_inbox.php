<?php
include("start.php");
foreach($sbid as $k=>$v){
mysql_query("UPDATE	commentsvv SET status_id='0' WHERE id='$uid' AND sbid='$v'");
mysql_query("UPDATE	commentsvv SET status_id2='0' WHERE id2='$uid' AND sbid='$v'");
}
?>