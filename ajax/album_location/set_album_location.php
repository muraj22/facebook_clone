<?php include("start.php"); ?>
<?php
$v="";

$cityc=addslashes($cityc);
$cityc=addslashes($cityc);

if($cityc!="" && $cityc!="undefined"){	
$f='';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$r=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$staten=$m['staten'];	
}
$r=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$countryn=$m['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}
mysql_select_db("registered");
mysql_query("UPDATE albums SET countryc='$countryc',cityc='$cityc',statec='$statec',location='$v' WHERE sbid='$sbid' AND id='$uid'");

?>
<?php include("end.php"); ?>