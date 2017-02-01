<?php
$id=$likeid;
mysql_query("UPDATE shares SET visibility='d' WHERE photoid='$id' AND whatisit='$whatisit'");
?>