<?php
include("start.php");
mysql_query("UPDATE media SET cityc='$cityc',countryc='$countryc',statec='$statec' WHERE sbid='$sbid' AND id='$uid'");

$v="";
mysql_select_db("registered");

$rvd=mysql_query("SELECT * FROM media WHERE sbid='$sbid'");
while($mvd=mysql_fetch_array($rvd)){
$cityc=$mvd['cityc'];
$statec=$mvd['statec'];
$countryc=$mvd['countryc'];

$cityc=addslashes($cityc);
$cityc=addslashes($cityc);	
}

if($cityc!="" && $cityc!="undefined"){	
$f='';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$rvd=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$staten=$mvd['staten'];	
}
$rvd=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$countryn=$mvd['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}

mysql_query("UPDATE media SET location='$v' WHERE sbid='$sbid' AND id='$uid'");
echo $v;
include("end.php");
?>