<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php 
$ids=$_POST['ids'];
$who=$_POST['w'];
$alb=$_POST['a'];

$whott=$who.'tt';
$uidtt=$uid.'tt';



$result=mysql_query("SELECT * FROM $uidtt WHERE albumid='$alb' AND cuidvjs='$uid'");
while($ms=mysql_fetch_array($result)){
$uidjs=$ms['cuidvjs'];	
}



if(!isset($uidjs)){exit();}

if($uidjs!=$uid){exit();}
else{
	
$ids=explode("{}",$ids);

foreach($ids as $key=> $id){
echo $id.':'.$alb.' ';
mysql_query("UPDATE $uidtt SET visibility='n' WHERE photoid='$id' AND albumid='$alb' AND cuidvjs='$uid'");
mysql_query("UPDATE $whott SET visibility='n' WHERE photoid='$id' AND albumid='$alb' AND cuidvjs='$uid'");

}

}
?>
<?php include("end.php"); ?>