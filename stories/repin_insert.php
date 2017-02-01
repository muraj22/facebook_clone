<?php
mysql_query("INSERT INTO repins (id,likeid,count,what,datetimep)
VALUES ('$uid','$likeid','0','$ltype',UNIX_TIMESTAMP())");
?>