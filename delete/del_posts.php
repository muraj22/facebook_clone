<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php 
$id=$_POST['id'];
$uidv=$_POST['w'];
$whatisit=$_POST['i'];

mysql_query("UPDATE shares SET visibility='d' WHERE sbid='$id' AND whatisit='$whatisit' AND id='$uid'");
?>
<?php include("end.php"); ?>