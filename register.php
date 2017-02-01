<?php
if(!isset($_SESSION)){
session_start();
}
mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
include("php_safety.php");
foreach($_POST as $k=>$v){
${$k}=$v;	
}

if(!isset($from_register)){ 
$tzn="UTC";
date_default_timezone_set($tzn);
function error($w,$nogo=false){
$dparams["error"]=$w;
if($nogo){$dparams["nogo"]="t";}
echo json_encode($dparams);
exit();	
}

}
else{ //not in use, noone is supposed to go to the server file gvrrg...
function error(){
header("Location: /?w");	
}
}

include("functions/tod.php");

function tdValidAge($topv){
$topv=tod($topv); 

$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);

$td=$tdd->format('%R%Y'); $suf=" year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf=' month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}

if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf=' hour';}

if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf=' minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf=' second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($suf==" year" && $td>=13){
return 'ok';
}
else{
return 'nogo';	
}

}


if($f_name=="" OR $l_name=="" OR $password=="" OR $month==-1 OR $day==-1 OR $year==-1 OR $month=="" OR $day=="" OR $year=="" OR ($gender_male=="" AND $gender_female=="")){
error("You must fill in all of the fields.");
}

if(strlen($email)>74){error("Please enter a valid email address.");}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){error("Please enter a valid email address.");}

if($email!=$r_email){
error("Your emails do not match. Please try again.");	
}

$date=$year.'-'.$month.'-'.$day.' '.date("H:i:s");
$datev=strtotime(date($date),time());

$how=tdValidAge($datev);
if($how=="nogo"){
error("Sorry, we are not able to process your registration.","t");	
}
	
include("validation/name.php");

if(strlen($password)<6){
error("Your password must be at least 6 characters long. Please try another.");	
}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$r=mysql_query("SELECT * FROM registered WHERE email='$email'");
$c=mysql_num_rows($r);
if($c>0){
error("Sorry, it looks like ".$email." belongs to an existing account.");
}

//hacer que cada 10 segundos cambie con un chrono en la base de datos
//el nombre de el archivo, este archivo protegido por password con $_GET lo que hace
//es que cada 10 segundos copy( current file name, new file name ) despues hace update en la base de datos a el nombre por new file name y despues hace remove de current file name :) ultra proteccion anti hack

$from_register="t";
include("gvrrgvrr45.php"); //here there is validation check again... to make sure :)

include("end.php");
?>