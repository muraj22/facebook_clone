<?php
include("checkforsmilies.php");

$xmsg=0;
$ykm=0;

$drm=array();
$bydatem=array();

$unread=0;

$dset="";
$dsetv="";
$r=mysql_query("(SELECT * FROM commentsvv as dt WHERE id2='$uid' GROUP BY id) UNION(SELECT * FROM commentsvv as dtv WHERE id='$uid' GROUP by id2)");
while($m=mysql_fetch_array($r)){
$dset.=",".$m['id'];
$dsetv.=",".$m['id2'];
}

$r=mysql_query("(SELECT * FROM(SELECT * FROM commentsvv as dt WHERE FIND_IN_SET(id,'$dset')>0 AND id2='$uid' AND status_id2='0' ORDER BY datetimep DESC) as dtv GROUP BY id2 LIMIT $messagesgs) UNION (SELECT * FROM(SELECT * FROM commentsvv as dt WHERE FIND_IN_SET(id2,'$dsetv')>0 AND id='$uid' AND status_id='0' ORDER BY datetimep DESC) as dtv GROUP BY id2 LIMIT $messagesgs)");

while($m=mysql_fetch_array($r)){
if(isset($messagea) AND in_array($m['sbid'],$messagea)){
$dbreak="t";
}

if(!isset($dbreak)){

if($m['id']!=$uid){
if($m['dread_id2']=="0"){
$unread++;
}
}

$v1=$m['id'];
$v2=$m['id2'];

$uti=sb_user($m['id']);
$utiv=sb_user($m['id2']);

$message2=$m['comment'];
$message3=substr("$message2", 0, 54);
$msgid=$m['sbid'];

$dclass="";
if($m['id']==$uid){
$dclass='repliedLast';
$uti=$utiv;
}

if($m['datetimepr']!==NULL){
$dclass.=' seenByAll';	
}
else if($dclass==""){
$dclass="hidden_sb";
}

if($m['id']==$uid){
$read=$m['dread_id'];
}
else{
$read=$m['dread_id2'];
}
if($read=='0'){
$dclassv='jewelItemNew';
}
else{
$dclassv='';
}

$notificationid=$m['sbid'];
$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND type='message' AND id='$uid'");

$ac=mysql_num_rows($ar);
if($read=='0' && $ac>0){
$unread--;
}
//if($ac==0){
$bydatem[$ykm]=$m['datetimep'];

$timeh=$m['datetimep'];
	$timehv=td5($timeh);
	if($timehv=='today'){$timeh=td($timeh);}
	else if($timehv=='this_week'){
	$timeh='on '.turndate4($timeh);
	}
	else if($timehv=='past'){ // > 7 && <14
	$timeh='last '.turndate4($timeh);
		}
	else if($timehv=="wpast"){$timeh=turndate4_dfn($timeh); $flagtoc='y';} //optional not to display notifications after a determined amount of time

$message3=checkforsmileys($message3);

$drm[$ykm]='<li class="'.$dclassv.'"><a class="messagesContent" href="/'.$uti['username'].'"><div class="clearfix"><div class="MercuryThreadImage _8o _8s lfloat"><img class="_s0 _rw img" src="/'.$m['id'].'/pics/'.$uti['profilepict'].'" alt=""></div><div class="_8m _42ef"><div class="content fsm fwn fcg"><div class="author"><strong>'.$uti['fullname'].'</strong></div><div class="snippet preview fsm fwn fcg"><span><span class="MercuryRepliedIndicator seenByListener '.$dclass.'"></span>'.$message3.'</span></div><div class="time"><abbr title="'.$timeh.'" data-utime="'.$m['datetimep'].'" class="timestamp">'.$timeh.'</abbr></div></div></div></div></a></li>';

$notifications_seen_messages.='notifications_seen_messages[ax_messages]=\'message:'.$m['sbid'].'\'; ax_messages++;';
$xmsg++;
$ykm++;
//}
}
unset($dbreak);
}
?>