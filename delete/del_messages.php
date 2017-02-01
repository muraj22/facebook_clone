<?php
ignore_user_abort(true);
include("start.php");
?>
<?php

if(isset($_POST['dellall'])){

$uidstrip=substr("$uid",0,22);
$value=$_POST['sid'];

$valuestrip=substr("$value",0,22);

$uidvm=$uidstrip.'break'.$valuestrip.'m';

mysql_query("DELETE FROM $uidvm");

mysql_query("DELETE FROM $uidc WHERE who='$value' OR whos='$value'");	

mysql_close($con);
exit();	
}
$msgs=$_POST['msgs'];

$uidstrip=substr("$uid",0,22);
$value=$_POST['sid'];

$valuestrip=substr("$value",0,22);

$uidvm=$uidstrip.'break'.$valuestrip.'m';

$msgs=explode(",",$msgs);
foreach($msgs as $key => $msgid){
if($msgid!=""){

mysql_query("DELETE FROM $uidvm WHERE msgid='$msgid'");

mysql_query("DELETE FROM $uidc WHERE msgid='$msgid'");	
}
	
}
?>
<?php include("end.php"); ?>