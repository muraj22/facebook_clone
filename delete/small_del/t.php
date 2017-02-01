<?php
$id=$likeid;
mysql_query("UPDATE status SET visibility='d' WHERE sbid='$id'");
?>