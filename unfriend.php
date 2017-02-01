<?php include("start.php"); ?>
<?php
$uidv=$_POST['w'];

mysql_query("UPDATE friends SET confirmed='d' WHERE id='$uid' AND id2='$uidv'");
mysql_query("UPDATE friends SET confirmed='d' WHERE id='$uidv' AND id2='$uid'");

?>
<?php include("end.php"); ?>