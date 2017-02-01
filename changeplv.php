<?php  
include("start.php");
?>
<?php
$uida='albums';
$uidp="media";

if(isset($_POST['uidv'])){
$uidv=$_POST['uidv'];
}
else{$uidv=$uid;}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$selected_album=$_POST['selected_album'];
$location=$_POST['location'];
$photoid=$_POST['photoid'];

if($uidv==$uid){
$locationsetby="f";
}


$r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND sbid='$photoid'");
while($m=mysql_fetch_array($r)){
$dlocation=$m['location'];
$locationsetby=$m['locationsetby'];
}
if($dlocation==""){
$r2=mysql_query("SELECT * FROM albums WHERE sbid='$selected_album' AND id='$uidv'");
while($m2=mysql_fetch_array($r2)){
$dlocation=$m2['location'];	
}
}


if($locationsetby=="f" && $uid!=$uidv){exit();}
else if($locationsetby==$uid AND $dlocation!="" AND $uid!=$uidv){
exit();
}

mysql_query("UPDATE $uidp SET location='$location' WHERE id='$uidv' AND sbid='$photoid'"); //locationsetby to false to prevent more adds of locations, was set for the first time by owner
mysql_query("UPDATE $uidp SET locationsetby='$uid' WHERE id='$uidv' AND sbid='$photoid'"); //locationsetby to false to prevent more adds of locations, was set for the first time by owner


echo $location;

mysql_close($con);
?>