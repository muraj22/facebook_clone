<?php include("start.php"); ?>
<?php
mysql_query("UPDATE albums SET countryc='',cityc='',statec='',location='' WHERE sbid='$sbid' AND id='$uid'");
?>
<?php include("end.php"); ?>