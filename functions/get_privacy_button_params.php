<?php
if(!function_exists("get_privacy_button_params")){

function handle_privacyv($privacy,$uidv){
global $uid;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$privacy_holder=str_replace("p","",$privacy);

$dtags="";
$r6=mysql_query("SELECT * FROM friends WHERE id='$uidv' AND FIND_IN_SET(id2,'$privacy_holder')>0 AND confirmed='y'");
$c6=mysql_num_rows($r6);

$tagsids="";
$tagsnames="";
$sca=mysql_num_rows($r6);

while($m6=mysql_fetch_array($r6)){
$uti=sb_user($m6['id2']);
$dtags.=", ".$uti['fullname'];

$tagsids.=',p'.$m6['id2'];

$mm=stripslashes($uti['fullname']);
$mm=addslashes($mm);

$tagsnames.=','.$mm;

}

$privacy=str_replace("l","",$privacy);

$r6=mysql_query("SELECT * FROM lists WHERE id='$uidv' AND FIND_IN_SET(sbid,'$privacy')>0 AND visibility='v'");
$c6=mysql_num_rows($r6)+$c6;

$scb=mysql_num_rows($r6);
while($m6=mysql_fetch_array($r6)){
$dtags.=", ".$m6['listn'];

$tagsids.=',l'.$m6['sbid'];

$mm=stripslashes($m6['listn']);
$mm=addslashes($mm);

$tagsnames.=','.$mm;
	
}

if(strpos($dtags,",")!==false){
$dtags=substr($dtags,2);	
}


$dparams["tagsids"]=$tagsids;
$dparams["tagsnames"]=$tagsnames;

$dparams["c6"]=$c6;
$dparams["scb"]=$scb;
$dparams["dtags"]=$dtags;

return $dparams;
}


function get_privacy_button_params($uidv,$sbid,$table,$extra_param,$shared_privacy,$privacy_configuration="big",$photos="f",$photos_id=null){
global $con;
global $uid;

if($sbid!=""){
$dqf=" AND sbid='$sbid'";
}
else{
$dqf="";
if($extra_param!=""){
$dqf.=" AND type='$extra_param'";
}

}

$params=array();

if($sbid!="" || ($sbid=="" && $table=="options")){
$r5=mysql_query("SELECT * FROM $table WHERE id='$uidv' $dqf ORDER BY datetimep DESC LIMIT 1");
$c5=mysql_num_rows($r5);
}
else{
$c5=0;
}


if($c5==0){
if($extra_param!=""){
$dqf=" AND category='$extra_param'";
}

$r5=mysql_query("SELECT * FROM privacy_last WHERE id='$uidv' AND type='$table' $dqf");
$c5=mysql_num_rows($r5);

if($c5==0){

if($shared_privacy=="t"){
$r5=mysql_query("SELECT * FROM options WHERE id='$uidv'");
$c5=mysql_num_rows($r5); //trick
}
else{
$privacy=0;
$privacyh="";
}

}

}

if($c5!=0){
while($m5=mysql_fetch_array($r5)){
$privacy=$m5['privacy'];	
$privacyh=$m5['privacyh'];
}
}


$use_tagsids="";
$use_tagsidsv="";

$tagsids="";
$tagsnames="";

$tagsidsv="";
$tagsnamesv="";

if(strlen($privacy)>1){

$dparams=handle_privacyv($privacy,$uidv);

$dtags=$dparams["dtags"];

$tagsids=$dparams["tagsids"]; 
$tagsnames=$dparams["tagsnames"]; 


if($dparams["c6"]==1){ //sum of both was only one

if($dparams["scb"]==1){
$r6=mysql_query("SELECT * FROM lists WHERE id='$uidv' AND FIND_IN_SET(sbid,'$privacy')>0 AND visibility='v'");
while($m6=mysql_fetch_array($r6)){
$listtext=$m6['listn'];	
$listtooltip=$m6['listn'];
$listclass=get_list_class($m6['type']);
}


}


}


}



if(strlen($privacy)==1){
if($privacy==0){
$listtext="Public";
}
else if($privacy==1){
$listtext="Friends";
}
else if($privacy==2){
$listtext="Only Me";
}
else if($privacy==4){
$listtext="Custom";	
}

}





if(!isset($listtext)){
$listtext="Custom";	
$usedtags="t";
}
else{
$usedtags="f";	
}

if($photos=="t"){
$uti=sb_user($photos_id); //photos_id in this scenario stands for id2 in which the post to the wall with the photo was made
}
else{
$uti=sb_user($uidv);
}

if($listtext=="Only Me" && $privacy_configuration=="big"){
$listtooltip="Only you"; //determine when it is applicable actually
}
else if($listtext=="Friends"){
	if($uid==$uidv && $photos=="f"){
$listtooltip="Your friends";	
	}
	else if($uid==$photos_id){
	$listtooltip="Your friends";	
	}
	else{
	$listtooltip=$uti['fullname'].'\'s friends';	
	}
	}
else{
$listtooltip=$listtext;	
}

if($listtext=="Custom"){
$listtext="Customv";	
}
if(!isset($listclass)){

if($privacyh!=""){$listtext="Customv";}

$listclass=get_list_class(strtolower(str_replace(" ","_",$listtext)));
}


if($privacyh!=""){$listtext="Customv";}
if(!isset($dtags)){
$dtags="";	
}

if($listtext=="Customv"){
if($privacy==4){
	if($uid==$uidv){
$listtooltip="Friends of Friends";	
	}
else{
$listtooltip=$uti['fullname']." Friends of Friends";	
}
}
else{$usedtags="t";}


if($privacyh!=""){
//here check on privacyh to append

$dparams=handle_privacyv($privacyh,$uidv);

$tagsidsv=$dparams["tagsids"]; 
$tagsnamesv=$dparams["tagsnames"]; 

if($dparams["dtags"]!=""){
if($dtags==""){
$dtags.=$listtooltip;	
}
else{
$use_tagsids="t";
//properly set up the field to fill in the autocomplete select	
}
$use_tagsidsv="t";
if($uidv==$uid){
$dtags.="; Except ".$dparams["dtags"];
}

}

$usedtags="t";	
}
else if($usedtags=="t"){
$use_tagsids="t";
}

if($usedtags=="t"){ //keep it going to come up with the same as it is done with js
$prepared_listtooltip=$dtags;
$listtooltip=$prepared_listtooltip;
}

if($usedtags=="t" && $dtags==""){
$listtooltip="Custom"; //nothing is lost, it just says custom but nothing is applied really as custom - nobody might exist to watch it or not watch it..
}


}


if($listtext=="Customv"){
$listtext="Custom";
}


if($privacy==4 && $privacy_configuration!="big"){
if($uid==$uidv){
$listtooltip="Your friends of friends";
}
else{
$listtooltip=$uti['fullname']." friends of friends";	
}
$listclass="friendsofsp";
}


$params["use_tagsids"]=$use_tagsids;
$params["use_tagsidsv"]=$use_tagsidsv;

$params["tagsids"]=$tagsids;
$params["tagsnames"]=$tagsnames;

$params["tagsidsv"]=$tagsidsv;
$params["tagsnamesv"]=$tagsnamesv;

$params["privacy"]=$privacy;
$params["privacyh"]=$privacyh;
$params["listclass"]=$listclass;
$params["listtext"]=$listtext;
$params["listtooltip"]=$listtooltip;

if($privacy!=4){
$typical=$listtext;	
}
else{
if($uid==$uidv){
$typical="Friends of Friends";	//por que encima puede ser que privacy configuration sea small
}
else{
$typical=$uti['fullname']." Friends of Friends";	
}
}

$params["config"]=$typical;

return $params;


}
}
?>