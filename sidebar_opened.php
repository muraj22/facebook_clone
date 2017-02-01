<?php
ignore_user_abort(true);
include("start.php");
?>
<?php
$w=$_POST['w'];
if($w!=1 && $w!=0){
exit();
}
mysql_query("UPDATE sidebar SET opened='$w',datetimep=UNIX_TIMESTAMP() WHERE id='$uid'");
?>
<?php include("end.php"); ?>