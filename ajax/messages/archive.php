<?php
include("start.php");
mysql_query("UPDATE commentsvv SET status_id='2' WHERE id='$uid' AND id2='$uidv'");
mysql_query("UPDATE commentsvv SET status_id2='2' WHERE id='$uidv' AND id2='$uid'");
?>