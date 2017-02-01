<?php  
include("start.php");
?>
<?php
$fajax=$_POST['fajax'];

$fajaxv=explode("{}",$fajax);

foreach($fajaxv as $key => $value){

if(strpos($value,":")!==false){
$valuev=explode(":",$value);
$currentpos=$valuev[0];
$newpos=$valuev[1];

echo $currentpos.':'.$newpos; 
  
mysql_query("UPDATE albums SET norder='$currentpos' WHERE id='$uid' AND oldorder='$newpos' AND pinboard='$pin'");
}
	
}

$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND visibility!='d' AND pinboard='$pin' ORDER BY norder ASC");
while($m=mysql_fetch_array($r)){
$newpos=$m['norder'];
mysql_query("UPDATE albums SET oldorder='$newpos' WHERE id='$uid' AND norder='$newpos' AND pinboard='$pin'");	
}
mysql_close($con);
?>