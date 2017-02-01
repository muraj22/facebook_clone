<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php 
$id=$_POST['id'];
$uidv=$_POST['w'];

$whatisit='shared_notes';

$r=mysql_query("SELECT * FROM shares WHERE photoid='$id' AND whatisit='shared_notes' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){exit();}

mysql_query("UPDATE shares SET visibility='d' WHERE photoid='$id' AND whatisit='shared_notes' AND id='$uid'");

?>
<?php include("end.php"); ?>
