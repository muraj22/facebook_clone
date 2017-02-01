<?php
include("start.php");

$dparams=array();

$r=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
$c=mysql_num_rows($r);
if($c==0){exit();}
while($m2=mysql_fetch_array($r)){

$yk=$uidv;

if($m2['status']=="1"){
$onlineclass="online";
$onlineclassv="wrappernombre";
}
else{
$onlineclass="offline";
$onlineclassv="wrappernombrev";
}

$macc[$yk]='
<div hc="l_c" data-hhref="/'.$m2['username'].'" class="macc macc'.$yk.'" id="macc'.$yk.'" data-uidv="'.$m2['id'].'" data-onlinev="'.$onlineclassv.'" data-yk="'.$yk.'" djson=\'{"uidv":"'.$m2['id'].'","yk":"'.$yk.'","fullname":"'.$m2['fullname'].'","profilepict":"'.$m2['profilepict'].'","username":"'.$m2['username'].'","f_name":"'.$m2['f_name'].'"}\'>
<img src="/'.$m2['id'].'/pics/'.$m2['profilepict'].'" class="picis">
<div class="namemc namemc'.$yk.'" id="namemc'.$yk.'" data-fname="'.$m2['f_name'].'" data-who="'.$m2['id'].'">'.$m2['fullname'].'</div>';

$macc[$yk].='<div class="'.$onlineclass.' bubble'.$yk.'" id="bubble'.$yk.'" data-chatopenr="" data-yk="'.$yk.'" data-uidv="'.$m2['id'].'" rel="'.$m2['id'].'"><div class="onlinebubbles"></div></div>';

$macc[$yk].='</div>';
	
}

$dparams["user_info"]=$macc[$yk];

echo json_encode($dparams);
?>