<?php
$id=$likeid;
mysql_query("UPDATE commentsv SET visibility='s' WHERE sbid='$id'"); //marked as spam
?>