<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php 
$id=$_POST['id'];
$uidv=$_POST['w'];

$whatisit='shared_status_update';

$r=mysql_query("SELECT * FROM shares WHERE elemid='$id' AND whatisit='shared_status_update' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){exit();}

mysql_query("UPDATE shares SET visibility='d' WHERE elemid='$id' AND whatisit='shared_status_update' AND id='$uid'");

?>
<?php include("end.php"); ?>
