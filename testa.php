<?php
include("start.php");
mysql_select_db("modules");
mysql_query("DELETE FROM modules WHERE module='p'");
mysql_query("DELETE FROM modules WHERE module='a'");
include("end.php");
?>