<?php include("start.php"); ?>
<?php
mysql_set_charset ('utf8' );
foreach($_POST as $key => $value){$value=trim($value); $value=addcslashes($value, "'\\/"); ${$key}=$value;}
$posted=array();
$onbase=array();

//currentcity
$posted['statec']=$statec;
$posted['countryc']=$countryc;
$posted['cityc']=$cityc;

//hometown
$posted['statec2']=$statec2;
$posted['countryc2']=$countryc2;
$posted['cityc2']=$cityc2;


$onbase['statec']="";
$onbase['countryc']="";
$onbase['cityc']="";

$r=mysql_query("SELECT * FROM living WHERE id='$uid' AND type='current_city' AND (visibility='v' OR visibility='h')");
while($m=mysql_fetch_array($r)){
$onbase['statec']=$m['statec'];
$onbase['countryc']=$m['countryc'];
$onbase['cityc']=$m['cityc'];
}


if($statec!="" && $countryc!="" && $cityc!=""){
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM living WHERE id='$uid' AND statec='$statec' AND countryc='$countryc' AND cityc='$cityc' AND type='current_city' AND (visibility='v' OR visibility='h')"));
$c=$c['c'];

if($c==0){
mysql_query("UPDATE living SET visibility='o' WHERE id='$uid' AND type='current_city' AND visibility='v'");

mysql_query("INSERT INTO living (id,statec,countryc,cityc,type,visibility,datetimep)

VALUES ('$uid','$statec','$countryc','$cityc','current_city','v',UNIX_TIMESTAMP())");

$likeid=mysql_insert_id();
$ltype="current_city";
include("stories/like_insert.php");

include("../smart_list_area.php");
}

}
else{
mysql_query("UPDATE living SET visibility='d' WHERE id='$uid' AND type='current_city' AND (visibility='v' OR visibility='h')");	
}



if($statec2!="" && $countryc2!="" && $cityc2!=""){
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM living WHERE id='$uid' AND statec='$statec2' AND countryc='$countryc2' AND cityc='$cityc2' AND type='hometown' AND (visibility='v' OR visibility='h')"));
$c=$c['c'];


if($c==0){
mysql_query("UPDATE living SET visibility='o' WHERE id='$uid' AND type='hometown' AND (visibility='v' OR visibility='h')");

mysql_query("INSERT INTO living (id,statec,countryc,cityc,type,visibility,datetimep)
VALUES ('$uid','$statec2','$countryc2','$cityc2','hometown','v',UNIX_TIMESTAMP())");

$likeid=mysql_insert_id();
$ltype="hometown";
include("stories/like_insert.php");

}
}
else{
mysql_query("UPDATE living SET visibility='d' WHERE id='$uid' AND type='hometown' AND (visibility='v' OR visibility='h')");	
}


if($cnbvv=="2"){
if($agechanged!=""){
$r=mysql_query("SELECT birthdayc FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$birthdayc=$m['birthdayc'];
if($birthdayc==""){mysql_query("UPDATE optionsv SET birthdayc='1' WHERE id='$uid'");}
else if($birthdayc>4){$birthdaycv='';}
else{$birthdayc++; mysql_query("UPDATE optionsv SET birthdayc='$birthdayc' WHERE id='$uid'");}
}
}
if(!isset($birthdaycv)){
//here check for a valid birthday date with php, composing it with $day $month and $year, if invalid exit();
mysql_query("UPDATE registered SET day='$day', month='$month', year='$year' WHERE id='$uid'");
}
}
if($gender!=1 && $gender!=2){
exit();	
}
mysql_query("UPDATE registered SET gender='$gender' WHERE id='$uid'");
if(!is_numeric($showsex) || !is_numeric($showbirthday)){exit();}
if($showsex<1 || $showsex>2){exit();} //only options are 1 or 2
if($showbirthday>3 OR $showbirthday<1){exit();} //valid options range in between 1-3
mysql_query("UPDATE optionsv SET showsex='$showsex', showbirthday='$showbirthday' WHERE id='$uid'");
if(strpos($tagslanguages,",")!==false){
$languages=array();
$tagslanguagesv=explode(",",$tagslanguages);
foreach($tagslanguagesv as $key=> $value){
if($value!=""){
$languages[]=$value;
$r=mysql_query("SELECT * FROM languages WHERE language='$value' AND id='$uid' AND (visibility='v' OR visibility='h')");
$c=mysql_num_rows($r);
if($c=="0"){

mysql_query("INSERT INTO languages (id,language,visibility,datetimep) VALUES('$uid','$value','v',UNIX_TIMESTAMP())");	
$likeid=mysql_insert_id();
$ltype="languages";
include("stories/like_insert.php");

}
}
}
$languagesdb=array();
$r=mysql_query("SELECT * FROM languages WHERE id='$uid' AND (visibility='v' OR visibility='h')");

while($m=mysql_fetch_array($r)){
$languagesdb[]=$m['language'];
}
foreach($languagesdb as $llave => $valor){
$valor=addcslashes($valor, "'\\/");
if(!in_array($valor,$languages)){
mysql_query("UPDATE languages SET visibility='d' WHERE id='$uid' AND language='$valor' AND (visibility='v' OR visibility='h')");	
}
}
}
else{
mysql_query("UPDATE languages SET visibility='d' WHERE id='$uid' AND (visibility='v' OR visibility='h')");	
}

$r=mysql_query("SELECT * FROM about WHERE id='$uid'"); //no visibility field for this table
mysql_query("UPDATE about SET about='$aboutme' WHERE id='$uid'"); //no datetimep updates though, even if about changes.. no intentions to post this as a story	

$interested=$finterested.$minterested;

$r=mysql_query("SELECT * FROM insterested WHERE id='$uid'");
mysql_query("UPDATE interested SET interested='$interested' WHERE id='$uid'");


?>
<?php include("end.php"); ?>