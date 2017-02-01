<?php
ignore_user_abort(true);
include("start.php");
?>
<?php 
$ids=$_POST['ids'];
$alb=$_POST['a'];

$r=mysql_query("SELECT * FROM media WHERE albumid='$alb' AND id='$uid' LIMIT 1");
$c=mysql_num_rows($r);
if($c==0){mysql_close($con); exit();}

else{

$ids=explode(",",$ids);

foreach($ids as $key => $value){
if($value!=""){
mysql_query("UPDATE media SET visibility='n' WHERE sbid='$value' AND id='$uid'");
}
	
}

}
?>
<?php include("end.php"); ?>