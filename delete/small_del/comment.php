<?php
$id=$likeid;
mysql_query("UPDATE comments SET visibility='s' WHERE sbid='$id'"); //marked as spam
?>