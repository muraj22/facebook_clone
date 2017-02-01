<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php 
$id=$_POST['id'];
$uidv=$_POST['w'];

$r=mysql_query("SELECT * FROM nt WHERE sbid='$id' AND id='$uidv'");
$c=mysql_num_rows($r);

if($c==0){exit();}
else{
mysql_query("UPDATE nt SET visibility='n' WHERE sbid='$id'");
mysql_query("UPDATE nta SET visibility='n' WHERE noteid='$id'");
}
?>
<?php include("end.php"); ?>