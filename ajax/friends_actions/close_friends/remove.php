<?php
include("start.php");
mysql_query("UPDATE lists_members SET visibility='d' WHERE id='$uid' AND id2='$uidv' AND type='close_friends'");
?>