<?php
if($uid!=$value){


if($mp['privacy']=='2'){
$pause="t";	
}


if($mp['privacy']!='1' AND $mp['privacy']!='0' AND $mp['privacy']!='2'){
$listid=$mp['privacy']; // assuming one list only

//multiple lists

$lists=array();

if(strpos($listid,",")!==false){
$listid=json_decode($mp['privacy']);

foreach($listid as $lk=>$lv){
if($lv!=""){
$lists[]=$lv;
}
}
}
else{
$lists[]=$mp['privacy'];
}

foreach($lists as $lk=>$listid){

$r5=mysql_query("SELECT * FROM lists_members WHERE listid='$listid' AND id='$value' AND id2='$uid' AND visibility='v'");
$c5=mysql_num_rows($r5);
if($c5==0){$pause="t";}
else{$isonlist="t";}
}


} //finish if does not equal regular options


$c5=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c5 FROM friends WHERE id='$value' AND id2='$uid' AND confirmed='y'"));
$c5=$c5['c5'];

if($c5==0 AND $uid!==$value AND $mp['privacy']=="1"){
$pause="t";
}


if(isset($pause) && $pause=="t" && isset($isonlist)){
unset($pause);
}

if(isset($pause) && $pause=="t"){}
else{

if($mp['privacyh']!=""){

$listid=$mp['privacyh']; // assuming one list only

//multiple lists

$lists=array();

if(strpos($listid,",")!==false){
$listid=json_decode($listid);
foreach($listid as $lk=>$lv){
if($lv!=""){
$lists[]=$lv;
}
}
}
else{
$lists[]=$mp['privacyh'];
}

foreach($lists as $lk=>$listid){

$r5=mysql_query("SELECT * FROM lists_members WHERE listid='$listid' AND id='$value' AND id2='$uid' AND visibility='v'");
$c5=mysql_numrows($r5);
if($c5==1){echo 'grancagada'; $pause="t";}
}



}

}

} //ends if uid!=value
?>