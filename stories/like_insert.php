<?php
mysql_query("INSERT INTO likes (id,likeid,count,what,datetimep)
VALUES ('$uid','$likeid','0','$ltype',UNIX_TIMESTAMP())");
include("stories/report_insert.php");
?>