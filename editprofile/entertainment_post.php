<?php
include("start.php");
?>
<?php

$posted=array();
$ontable=array();
foreach($_POST as $key => $value){
$value=trim($value);
$value=addcslashes($value, "'\\/");
$posted[$key]=$value;
${$key}=$value;
}


unset($posted['from']);
$key_name=array();

if($from=="entertainment"){
$key_name['tagsmusicv']='music';
$key_name['tagsbooksv']='books';
$key_name['tagsmoviesv']='movies';
$key_name['tagstelevisionv']='television';
$key_name['tagsgamesv']='games';
}
else if($from=="sports"){
$key_name['tagssportsv']='sports';
$key_name['tagsteamsv']='teams';
$key_name['tagsathletesv']='athletes';	
}
else if($from=="activities"){
$key_name['tagsactivitiesv']='activities';
$key_name['tagsinterestsv']='interests';	
}

foreach($key_name as $dmk => $dmv){
$dkn=$posted[$dmk];
if(strpos($dkn,",")!==false){
${$dkn}=array();
${$dkn.'v'}=explode(",",$dkn);
foreach(${$dkn.'v'} as $key=> $value){
if($value!=""){
${$dkn}[]=$value;

$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND taste='$value' AND type='$dmv' AND (visibility='v' OR visibility='h')");
$c=mysql_num_rows($r);
if($c=="0"){
mysql_query("INSERT INTO tastes (id,taste,type,visibility,datetimep) VALUES('$uid','$value','$dmv','v',UNIX_TIMESTAMP())");	
$likeid=mysql_insert_id();
$ltype=$dmv;
include("stories/like_insert.php");

}
else{
//mysql_query("UPDATE tastes SET privacy='$privacy',privacyh='$privacyh' WHERE id='$uid' AND taste='$value' AND type='$dmv' AND (visibility='v' OR visibility='h')");	
}
}
}
${$dkn.'db'}=array();
$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND type='$dmv' AND visibility='v'");
while($m=mysql_fetch_array($r)){
${$dkn.'db'}[]=$m['taste'];
}
foreach(${$dkn.'db'} as $llave => $valor){
$valor=addcslashes($valor, "'\\/");
if(!in_array($valor,${$dkn})){
mysql_query("UPDATE tastes SET visibility='o' WHERE id='$uid' AND taste='$valor' AND type='$dmv' AND (visibility='v' OR visibility='h')");	
}
}
}
else{
mysql_query("UPDATE tastes SET visibility='d' WHERE id='$uid' AND type='$dmv' AND (visibility='v' OR visibility='h')");	
}
}
?>
<?php include("end.php"); ?>