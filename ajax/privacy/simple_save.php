<?php
if(!isset($privacy)){ //the isset of privacy is done to use this also in post files besides ajax post method
ignore_user_abort(true);

$endt="t";

include("start.php");

if(!isset($use_val)){
$privacy=$id; //it is id via simple_save, does not get to write to formo when doing it via fjax
$privacyh="";
} //otherwise whatever was posted will be used, not old but precisely new as this is triggered when it comes to automatic via custom

}


if(!function_exists("handle_privacy")){
function handle_privacy($privacy){
if($privacy==""){return;}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
global $uid;
global $uid_friends;

if(strpos($privacy,",")!==false){
$fexp=array();
$exp=explode(",",$privacy);
foreach($exp as $k=>$v){
if($v!=""){
if(strpos($v,"p")!==false){	
$dk="p";
$v=str_replace("p","",$v);
}
else{
$dk="l";
$v=str_replace("l","",$v);
}
$fexp[$dk]=$v;	

}
}
}
else{
$v=$privacy;
if(strpos($v,"p")!==false){	
$dk="p";
$v=str_replace("p","",$v);
}
else{
$dk="l";
$v=str_replace("l","",$v);
}
$fexp[$dk]=$v;	
}


foreach($fexp as $k=>$v){
if($k=="p"){
if(!in_array($v,$uid_friends)){
exit();
}
	
}
else{
$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND sbid='$v' AND visibility='v'");
$c=mysql_num_rows($r);
if($c==0){
exit();	
}
	
}

}
//is a list and does not belong to the user or is uid that is not friend of the user


}


}


handle_privacy($privacyh);

if(strlen($privacy)>1){ // 0 - up to 3 the basic privacy types, 10 million and forth all which belong to a list id on database
handle_privacy($privacy);
}
else if($privacy>4){exit();} //not a supported privacy type

//se hace include para ejecutar la parte de arriba pretendiendo hacer un debido exit si asi lo corresponde

if($sbid!=""){ //we'd be looking at existing tables only - it still will throw many errors (boolean type) if not configured to bypass this line

if($ptype=="albums"){
//check for snoofy users
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND sbid='$sbid'");
while($m=mysql_fetch_array($r)){
$albumn=$m['albumn'];	
}
if($albumn=="Profile Pictures" OR $albumn=="Wall Photos" OR $albumn=="Videos"){
exit();	
}

}
mysql_query("UPDATE $ptype SET privacy='$privacy',privacyh='$privacyh' WHERE id='$uid' AND sbid='$sbid'");
$c=mysql_affected_rows();
}

/*
if($ptype=="workedu"){
mysql_query("UPDATE $ptype SET privacy='$privacy' WHERE id='$uid'"); //it applies at global scale for workedu disregardless of sbid..
}
*/


//very good module that helds in a blank table the values for the actual privacy setting to retrieve although there is nothing set yet, example on edit profile


if($extra_param!=""){
$dqf=" AND category='$extra_param'";
}
else{
$dqf="";	
}

if($ptype=="email_search" || $ptype=="friend_requests" || $ptype=="inbox_filter"){
if($privacy==2){ //no only me support for this one
exit();
}
else if(strlen($privacyh)>0){ //no support for privacyh on this one
exit();
}
}

if($ptype=="robot_engine"){
if($privacy!=0 && $privacy!=2){ //evidently you're playing
$privacy=0;
}
if(strlen($privacyh)>0){
$privacyh="";	
}

}

$r=mysql_query("SELECT * FROM privacy_last WHERE id='$uid' AND type='$ptype' $dqf");	
$c=mysql_num_rows($r);

if($c==0){
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','$ptype','$extra_param','$privacy','$privacyh',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE privacy_last SET privacy='$privacy',privacyh='$privacyh' WHERE id='$uid' AND type='$ptype'");
}


mysql_query("UPDATE options SET privacy='$privacy',privacyh='$privacyh' WHERE id='$uid'");
//update albums set privacy='0' (public) WHERE sbid='$albumid' AND id='$uid' , get it? :) 

if(isset($endt)){
include("end.php");
}
?>