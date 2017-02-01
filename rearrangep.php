<?php  
include("start.php");
?>
<?php

$selected_album=$_POST['selected_album'];
$fajax=$_POST['fajax'];

$fajaxv=explode("{}",$fajax);

foreach($fajaxv as $key => $value){

if(strpos($value,":")!==false){
$valuev=explode(":",$value);
$currentpos=$valuev[0];
$newpos=$valuev[1];

//echo $currentpos.':'.$newpos; 
  
mysql_query("UPDATE media SET norder='$currentpos' WHERE id='$uid' AND albumid='$selected_album' AND oldorder='$newpos'");
}
	
}

$result=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$selected_album' AND visibility!='d' ORDER BY norder ASC");
while($ms=mysql_fetch_array($result)){
$newpos=$ms['norder'];
echo $newpos;
mysql_query("UPDATE media SET oldorder='$newpos' WHERE id='$uid' AND albumid='$selected_album' AND norder='$newpos'");	
}
mysql_close($con);
?>