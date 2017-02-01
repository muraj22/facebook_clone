<?php
//los dos requisitos son, asumir como dueño de la historia a $value, y que tanto privacy, como privacyh provengan de un $m=mysql_fetch_array($r) - nada mas :)
if($value!=$uid){
$dqf=" AND privacy!='onlyme'";
}

//query

if($m['privacy']!='friends' AND $m['privacy']!='public'AND $m['privacy']!='onlyme'){
$listid=$m['privacy']; // assuming one list only

//multiple lists

$lists=array();

if(strpos($listid,",")!==false){
$listidv=explode(",",$listid);
foreach($listidv as $lk=>$lv){
if($lv!=""){
$lists[]=$lv;
}
}
}
else{
$lists[]=$m['privacy'];
}

foreach($lists as $lk=>$listid){

$r5=mysql_query("SELECT * FROM lists_members WHERE listid='$listid'
AND id='$value' AND id2='$uid'");
$c5=mysql_numrows($r5);
if($c5==0){$pause="t";}
else{$isonlist="t";}
}


}
}

$c5=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c5 FROM friends WHERE id='$value' AND id2='$uid' AND confirmed='y'"));
$c5=$c5['c5'];

if($c5==0 AND $uid!==$value AND $m['privacy']=="friends"){
$pause="t";
}

if($pause=="t" && isset($isonlist)){
unset($pause);
}

//hasta aca domino toda la privacidad para cuando se habilita a un grupo de personas a poder ver algo, incluyendo publico!

if(isset($pause)){unset($pause);}
else{

//y a partir de aca domino toda la privacidad para cuando no se habilita a un grupo de personas a poder ver algo

if($m['privacyh']!=""){

$listid=$m['privacyh']; // assuming one list only

//multiple lists

$lists=array();

if(strpos($listid,",")!==false){
$listidv=explode(",",$listid);
foreach($listidv as $lk=>$lv){
if($lv!=""){
$lists[]=$lv;
}
}
}
else{
$lists[]=$m['privacyh'];
}

foreach($lists as $lk=>$listid){

$r5=mysql_query("SELECT * FROM lists_members WHERE listid='$listid'
AND id='$value' AND id2='$uid'");
$c5=mysql_numrows($r5);
if($c5==1){$pause="t";}
}


}

}

//this has to be a file! - privacy.php - stored in directory master
?>

<?php
include("privacy.php");
if(isset($pause)){unset($pause);}
else{

//code that follows
//all regular queries go here for each story


}
?>