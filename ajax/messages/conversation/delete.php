<?php
include("start.php");
mysql_query("UPDATE commentsvv SET status_id='3' WHERE id='$uid' AND id2='$uidv'");
mysql_query("UPDATE commentsvv SET stauts_id2='3' WHERE id='$uidv' AND id2='$uid'");
?>