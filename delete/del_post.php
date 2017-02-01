<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php 
$id=$_POST['id'];
$uidv=$_POST['w'];

$r=mysql_query("SELECT * FROM status WHERE sbid='$id' AND (id='$uid' OR id2='$uid')");
$c=mysql_num_rows($r);

if($c==0){exit();}

mysql_query("UPDATE status SET visibility='d' WHERE sbid='$id'");
?>
<?php include("end.php"); ?>