<?php
include("start.php");

include("start.php");
?>
<?php
$hd=$_POST['hd'];
mysql_query("UPDATE options SET hd='$hd',datetimep_hd=UNIX_TIMESTAMP() WHERE id='$uid'");
?>
<?php include("end.php"); ?>