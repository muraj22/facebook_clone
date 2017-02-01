<?php
include("start.php");
foreach($_POST as $k=>$v){
${$k}=$v;	
}

?>
<?php

$uid_fr=r_friends($uid,'');

$dfullname=array();
$dprofilepic=array();
$duid=array();


if(!isset($start)){
$gs=0;	
}
else{
$gs=$start;	
}

if($table=="tags"){
$r=mysql_query("SELECT * FROM $table WHERE id='$uo' AND id3!='' AND photoid='$sbid' ORDER BY datetimep DESC limit $gs,99");

$r2=mysql_query("SELECT COUNT(*) as tr FROM $table WHERE id='$uo' AND id3!='' AND photoid='$sbid'");
$m2=mysql_fetch_array($r2);
$tr=$m2['tr'];

}
else if($table=="n_friends"){
$r=mysql_query("SELECT * FROM friends WHERE id='$uo' AND confirmed='y' AND datetimep>=$start_date AND datetimep<=$end_date ORDER BY datetimep DESC limit $gs,99");

$r2=mysql_query("SELECT COUNT(*) as tr FROM friends WHERE id='$uo' AND confirmed='y' AND datetimep>=$start_date AND datetimep<=$end_date");
$m2=mysql_fetch_array($r2);
$tr=$m2['tr'];

}else if($table=="like" || $table=="repin"){
$liket=$uo.'ml';

if($table=="like"){
    $dtable="likew";
}else{
    $dtable="repinw";
}

if(!isset($start)){
$r=mysql_query("SELECT * FROM $dtable WHERE likeid='$sbid' AND what='$ltype' AND id='$uid' ORDER BY datetimep DESC LIMIT 1");
$c=mysql_num_rows($r);
if($c>0){$sgs=98;}
else{$sgs=99;}

$r=mysql_query("(SELECT * FROM $dtable WHERE likeid='$sbid' AND what='$ltype' AND id='$uid' ORDER BY datetimep DESC LIMIT 1) UNION (SELECT * FROM $dtable WHERE likeid='$sbid' AND what='$ltype' AND id!='$uid' ORDER BY datetimep DESC LIMIT $gs,$sgs)");
}
else{
$r=mysql_query("SELECT * FROM $dtable WHERE likeid='$sbid' AND what='$ltype' AND id!='$uid' ORDER BY datetimep DESC LIMIT $gs,99");	
}


$r2=mysql_query("SELECT COUNT(*) as tr FROM $dtable WHERE likeid='$sbid' AND what='$ltype'");
$m2=mysql_fetch_array($r2);
$tr=$m2['tr'];
}else if($table=="mutual_friends"){
$mutual=array();

$friends_comma='';
foreach($uid_fr as $k=>$v){
$friends_comma.=','.$v;
}
$friends_comma=substr($friends_comma,1);

$persona=$ud;

$r=mysql_query("SELECT * FROM friends WHERE FIND_IN_SET(id2,'$friends_comma')>0 AND id='$persona' AND confirmed='y' ORDER BY datetimep DESC LIMIT $gs,99"); // en esta linea tengo todos los pymk de una persona conmigo


$r2=mysql_query("SELECT COUNT(*) as tr FROM friends WHERE FIND_IN_SET(id2,'$friends_comma')>0 AND id='$persona' AND confirmed='y'");
$m2=mysql_fetch_array($r2);
$tr=$m2['tr'];
}else if($table=="shares"){

    $r=mysql_query("SELECT COUNT(datetimep) AS theCount, `id`,`visibility`,`whatisit`,`elemid` from `shares` WHERE elemid='$sbid' AND whatisit='$dshare' AND visibility='v' GROUP BY `id` ORDER BY theCount DESC LIMIT $gs,99");

    $r2=mysql_query("SELECT COUNT(distinct id) as tr FROM shares WHERE elemid='$sbid' AND whatisit='$dshare' AND visibility='v'");
    $m2=mysql_fetch_array($r2);
    $tr=$m2['tr'];  
}


$anx=mysql_num_rows($r);


$k=0;
while($m=mysql_fetch_array($r)){

if($table=="tags"){
$check=$m['id3'];
}else if($table=="n_friends"){
$check=$m['id2'];
}else if($table=="like" || $table=="repin"){
$check=$m['id2'];	
}else if($table=="mutual_friends"){
$check=$m['id2'];	
}else if($table=="shares"){
    $check=$m['id'];   
}

$r2=mysql_query("SELECT * FROM registered WHERE id='$check'");

while($m2=mysql_fetch_array($r2)){
$duid[$k]=$check;
$k++;
}

}



$otherpeoplev='';

		
	if($anx>6){$mposr='margin-right:12px;'; $mposrv='88';}
	else{$mposr=''; $mposrv='76';}

foreach($duid as $k=>$v){
$uti=sb_user($v);

$otherpeoplev.='<div style="margin:0;padding:0;width:100%;position:relative;left:0;border-bottom:1px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="lb fwb list_item"><div class="clearfix" style="display:inline-block;"><a href="/'.$uti['username'].'" class="andbl"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="max-height:50px;max-width:50px;position:relative;left:4px;" class="profilepict"></a></div><a hc="" href="/'.$uti['username'].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uti['fullname'].'</a><div style="display:inline-block;float:right;position:absolute;right:9px;top:16px;">'; $duidv=$v; include("buttons/friends_button.php"); $otherpeoplev.=$sechov.'</div></div>';


}

if(!isset($start)){
$with='<div style="display:inline-block;width:100%;" class="users_list_wrapper">'.$otherpeoplev.'</div>';
}
else{$with=$otherpeoplev;}

$gs=$anx+$gs;

if($table=="tags"){
$fjax_l='table=tags&uo='.$uo.'&ud='.$ud.'&sbid='.$sbid;
}else if($table=="n_friends"){
$fjax_l='table=n_friends&uo='.$uo.'&ud='.$ud.'&start_date='.$start_date.'&end_date='.$end_date;	
}else if($table=="like"){
$fjax_l='table=like&uo='.$uo.'&sbid='.$sbid.'&ltype='.$ltype;	
}else if($table=="repin"){
    $fjax_l='table=repin&uo='.$uo.'&sbid='.$sbid.'&ltype='.$ltype;	
}else if($table=="shares"){
    $fjax_l='table=shares&uo='.$uo.'&sbid='.$sbid.'&dshare='.$dshare;   
}

if(!isset($start) && $anx!=$tr){
$with.='<div class="clearfix mam uiMorePager stat_elem morePager uiMorePagerCenter"><div><a class="pam uiBoxLightblue  uiMorePagerPrimary" fjax="/stories/show_users_listv.php?'.$fjax_l.'&start='.$gs.'" data-a_starts="morepager_loading" data-a_custom_f="show_users_listv" id="ul33kuq2">See More</a><span class="uiMorePagerLoader pam uiBoxLightblue "><img class="img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></span></div></div>';
}
else if(isset($start)){
if($gs==$tr){
$gs=-1;	
}
$with.='{}'.$start.'{}'.$gs;	
}

echo $with;



include("end.php");
?>