<?php
ignore_user_abort(true);
include("start.php"); ?>
<?php 
$uidv=$_POST['w'];

$id=$_POST['id'];
$variation=$_POST['variation'];

if($variation=="t"){
$variation="commentsv";
}
else{
$variation="comments";	
}


$result=mysql_query("SELECT * FROM $variation WHERE sbid='$id'");
while($ms=mysql_fetch_array($result)){
$rwho=$ms['id'];	
$rwhov=$ms['id2'];
}
if($rwhov!=$uid){
if($rwho!=$uid){
$e='';
}
}
if(isset($e)){exit();}
else{
$who=$rwho;
mysql_query("UPDATE $variation SET visibility='d' WHERE sbid='$id'");
}
?>
<?php include("end.php"); ?>