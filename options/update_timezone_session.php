<?php
session_start();
include("start.php");
$godmode='';
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;	
}

$ctimezone=$timezone;
$octimezone=$timezone;


$ctimezone=str_replace("-","",$ctimezone);

$hours=$ctimezone;

if(strpos($hours,".")===true){
$split=explode(".",$hours);
$minutesv=explode(".",$hours);
$minutesv=".".$minutesv[1];
$minutesv=floatval($minutesv); //.755555
$minutesv=$minutesv*60;
if(strlen($minutesv)==1){
$minutesv='0'.$minutesv;	
}
$ctimezone=$split[0].':'.$minutesv;
}
else{
$ctimezone=$hours.':00';	
}

if(substr($octimezone,0,1)=="-"){
$ctimezone="-".$ctimezone;
}else{$ctimezone="+".$ctimezone;}



$_SESSION['tz']=$ctimezone;
$_SESSION['otz']=$octimezone;

include("end.php");
?>