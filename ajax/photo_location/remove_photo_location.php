<?php
include("start.php");
mysql_query("UPDATE media SET cityc='',countryc='',statec='',location='' WHERE sbid='$sbid' AND id='$uid'");
include("end.php");
?>