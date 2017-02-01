<?php
mysql_query("INSERT INTO report (id,count2,likeid,whatisit,datetimep)
VALUES ('$uid','0','$likeid','$ltype',UNIX_TIMESTAMP())");
?>