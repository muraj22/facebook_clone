<?php
include("start.php");
foreach($sbid as $k=>$v){
mysql_query("UPDATE	commentsvv SET status_id='4' WHERE id='$uid' AND sbid='$v'");
mysql_query("UPDATE	commentsvv SET status_id2='4' WHERE id2='$uid' AND sbid='$v'");
}
?>