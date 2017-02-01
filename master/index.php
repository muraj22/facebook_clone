<?php
session_start();
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
include("php_safety.php");
$_SERVER=array_map('php_safety',$_SERVER);
if(isset($_GET['nr'])){
$nr=$_GET['nr'];
}
$uidv=$_SERVER['REQUEST_URI'];

if(strpos($uidv,"?")!==false){
$uidvv=explode("?",$uidv);
$uidv=$uidvv[0];
$dget=$uidvv[1];	
}


if(strpos($uidv,"?sk")!==false){
$notforcede='';
$uidv=str_replace("?sk","/",$uidv);
}

if($uidv!=''){
$uidvv=explode("/",$uidv);
$uidv=$uidvv[1];
}


if(isset($dget)){
$vrget=array();
$rget=explode("&amp;",$dget);
foreach($rget as $k=>$v){
$nv=explode("=",$v);
if(isset($nv[1])){
$vrget[$nv[0]]=$nv[1];
}
}



if(isset($vrget['v']) || isset($vrget['sk'])){
if(isset($vrget['v']) AND $vrget['v']=="info" OR isset($vrget['sk']) AND $vrget['sk']=="info"){
include("info.php");
exit();	
}
else if($vrget['sk']=="notes"){
include("notes/notes.php");
exit();		
}
else if($vrget['sk']=="notes_drafts"){
include("notes/notes_drafts.php");
exit();	
}
else if($vrget['sk']=="notes_tagged"){
include("notes/notes_tagged.php");
exit();	
}
}

}


if(isset($_SESSION["login_error"]) || isset($_GET['wp'])){
if(isset($_SESSION["login_error"])){
$_SESSION["login_error_storage"]=$_SESSION["login_error"]; //to allow for refresh and get the thing appropriately through get wp
}
if(!isset($_SESSION["login_error_storage"])){}
else{
include("error/login_error.php");
if(!isset($_SESSION)){
session_start();	
}
unset($_SESSION["login_error"]);
exit();
}
}

if(isset($_POST['login_password'])){
$from_login="t";
include("components/login.php");
exit();	
}

else if(!isset($_COOKIE["login_cookie"]) AND $uidv==''){
include_once("../index.php");
exit();
}


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$result=mysql_query("SELECT * FROM registered where id='$uidv' OR username='$uidv'");
$counti=mysql_num_rows($result);
if($counti=="0"){
$forcede='';
}

if(isset($nr) AND $nr=='i' OR (isset($forcede) AND !isset($notforcede))){include("news_feed.php");}
else{$wall="t"; include("news_feed.php"); }
?>