<?php
include("start.php"); 
?>
<?php

foreach($_POST as $k=>$v){
if(!array($v)){
$v=addcslashes($v, "'\\/");
}
${$k}=$v;	
}


$privacy=0;
$privacyh="";

$workingp=array();
if(strpos($mphoneextp,",")!==false){
$mphoneextpv=explode(",",$mphoneextp);
foreach($mphoneextpv as $k=>$v){
if(!empty($v)){

$workingp[]=$v;
	
}
}
}

$workingpv=array();
if(strpos($mphoneinp,",")!==false){
$mphoneinpv=explode(",",$mphoneinp);
foreach($mphoneinpv as $k=>$v){
if(!empty($v)){
$v=preg_replace("/[^0-9]/","", $v); 
if($v!=""){
$workingpv[]='0'.$v;	//0 is to mimic its type to allow for reading inside a single array for work and home phone types
}
}
}
}

$drphones='';
foreach($workingp as $k=>$v){
if(isset($workingpv[$k])){
$drphones.='{}'.$v.':'.$workingpv[$k];
}
else{echo 'invalid'; mysql_close($con); exit();}
}

$drphonesv=$drphones;




if(strpos($ophoneextp,",")!==false){
$mphoneextpv=explode(",",$ophoneextp);
foreach($mphoneextpv as $k=>$v){
if(!empty($v)){
$workingp[]=$v;
}
}
}


if(strpos($ophoneinp,",")!==false){
$mphoneinpv=explode(",",$ophoneinp);
foreach($mphoneinpv as $k=>$v){
if(!empty($v)){
$v = preg_replace("/[^0-9]/","", $v); 
if($v!="1" AND $v!="2"){
$workingpv[]=$v;	
}
}
}
}





$phones=array();
foreach($workingp as $k=>$v){
if(isset($workingpv[$k])){
//$drphones.='{}'.$v.':'.$workingpv[$k];

$ext=$v;
$phone=substr($workingpv[$k],1);
$type=substr($workingpv[$k],0,1);


$phones[]=$type.':'.$ext.':'.$phone;

$r=mysql_query("SELECT * FROM contact_phones WHERE id='$uid' AND type='$type' AND phone='$phone' AND ext='$ext' AND visibility='v'");
$cv=mysql_num_rows($r);


$privacy=$contact_privacy[$k];
$privacyh=$contact_privacyh[$k];

if($cv=="0"){
$sbid="";
}
else{
while($m=mysql_fetch_array($r)){
$sbid=$m['sbid'];	
}
}
$ptype="contact_phones";

$extra_param=$type;

include("ajax/privacy/simple_save.php");


if($cv==0){
mysql_query("INSERT INTO contact_phones (id,phone,ext,type,primary2,confirmed,visibility,privacy,privacyh,datetimep) VALUES('$uid','$phone','$ext','$type','','u','v','$privacy','$privacyh',UNIX_TIMESTAMP())");	
}
else{
mysql_query("UPDATE contact_phones SET privacy='$privacy',privacyh='$privacyh' WHERE id='$uid' AND type='$type' AND phone='$phone' AND ext='$ext' AND visibility='v'");
}


}
else{echo 'invalid'; mysql_close($con); exit();}
}


if(count($phones)>0){
$phonesdb=array();
$r=mysql_query("SELECT * FROM contact_phones WHERE id='$uid' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$phonesdb[]=$m['type'].':'.$m['ext'].':'.$m['phone'];
}
foreach($phonesdb as $llave => $valor){
if(!in_array($valor,$phones)){
$exp=explode(":",$valor);
$type=$exp[0];
$ext=$exp[1];
$phone=$exp[2];

mysql_query("UPDATE contact_phones SET visibility='d' WHERE id='$uid' AND phone='$phone' AND ext='$ext' AND type='$type' AND visibility='v'");	
}
}

}
else{ //all phones were deleted..
mysql_query("UPDATE contact_phones SET visibility='d' WHERE id='$uid'");
}


mysql_query("UPDATE address SET address='$addressf', statec='$statec', countryc='$countryc', cityc='$cityc', zip='$zip', neighborhood='$neighborhood' WHERE id='$uid' AND visibility='v'");

mysql_query("UPDATE website SET website='$website' WHERE id='$uid' AND visibility='v'");

//mphones='$drphonesv', ophones='$drphonesvv', 


$workingp=array();
if(strpos($improvider,",.,")!==false){
$mphoneextpv=explode(",.,",$improvider);
foreach($mphoneextpv as $k=>$v){
if(!empty($v)){

$workingp[]=$v;
	
}
}
}

$workingpv=array();
if(strpos($imsname,",.,")!==false){
$mphoneinpv=explode(",.,",$imsname);
foreach($mphoneinpv as $k=>$v){
if(!empty($v)){
$workingpv[]=$v;	
}
}
}

$drphones='';
foreach($workingp as $k=>$v){
$drphones.=',.,'.$v.'user->'.$workingpv[$k];
}

$drphonesvv=$drphones;
$tagsids=$drphones;


if(strpos($tagsids,",.,")!==false){
$inspirations=array();
$tagsnames=explode(",.,",$tagsids);
foreach($tagsnames as $key=> $value){
if($value==""){$key--;}
if($value!=""){
$key=$key-1;

$smallexp=explode("user->",$value);

$valori=$smallexp[0];
$valori2=$smallexp[1];

$inspirations[]=$valori.',,..,,'.$valori2;
$r=mysql_query("SELECT * FROM contact_im WHERE id='$uid' AND provider='$valori' AND user='$valori2' AND visibility='v'");
$cv=mysql_num_rows($r);

$privacy=$contact_privacy_im[$key];
$privacyh=$contact_privacyh_im[$key];

if($cv=="0"){
$sbid="";
}
else{
while($m=mysql_fetch_array($r)){
$sbid=$m['sbid'];	
}
}
$ptype="contact_im";

include("ajax/privacy/simple_save.php");

if($cv=="0"){
mysql_query("INSERT INTO contact_im (id,provider,user,visibility,privacy,privacyh,datetimep) VALUES('$uid','$valori','$valori2','v','$privacy','$privacyh',UNIX_TIMESTAMP())");	
}
else{
mysql_query("UPDATE contact_im SET privacy='$privacy',privacyh='$privacyh' WHERE id='$uid' AND provider='$valori' AND user='$valori2' AND visibility='v'");	
}
}
}
$inspirationsdb=array();
$r=mysql_query("SELECT * FROM contact_im WHERE id='$uid' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$inspirationsdb[]=$m['provider'].',,..,,'.$m['user'];
}
foreach($inspirationsdb as $llave => $valor){
if(!in_array($valor,$inspirations)){
$smallexp=explode(",,..,,",$valor);
$valori=$smallexp[0];
$valori2=$smallexp[1];
mysql_query("UPDATE contact_im SET visibility='o' WHERE id='$uid' AND provider='$valori' AND user='$valori2' AND visibility='v'");	
}
}
}
else{
mysql_query("UPDATE contact_im SET visibility='d' WHERE id='$uid' AND visibility='v'");	
}
?>
<?php include("end.php"); ?>