<?php
$theresultsm=array();
$bydatem=array();

if(isset($other)){
$dq=4;
$dclassvvv='hidden_sb other_view';
$inbox_other="4";
unset($other);	
}
else{
$dq=0;	
$dclassvvv='inbox_view';
$inbox_other="0";
}
$r=mysql_query("(SELECT * FROM(SELECT * FROM commentsvv as dt WHERE FIND_IN_SET(id,'$dset')>0 AND id2='$uid' AND status_id2='$dq' ORDER BY datetimep DESC) as dtv GROUP BY id2 LIMIT 20) UNION (SELECT * FROM(SELECT * FROM commentsvv as dt WHERE FIND_IN_SET(id2,'$dsetv')>0 AND id='$uid' AND status_id='$dq' ORDER BY datetimep DESC) as dtv GROUP BY id2 LIMIT 20)");

while($m=mysql_fetch_array($r)){
$message2=$m['comment'];
$message3=substr($message2, 0, 54);
$msgid=$m['sbid'];

$uti=sb_user($m['id']);
$utiv=sb_user($m['id2']);

$dclass="";
if($m['id']==$uid){
$uti=$utiv; //it switches to the other person's as sender
$dclass='repliedLast';
}
else{
$dclass="";	
}


$dclassv="";
$dclassvv="_kz";	
if($m['id']!=$uid){
if($m['dread_id2']==0){
$dclassv=" _kx";
$dclassvv="_ky";	
}
}
else if($m['id']==$uid){
if($m['dread_id']==0){
$dclassv=" _kx";
$dclassvv="_ky";	
}
}

if($m['datetimepr']!==NULL){
$dclass.=' seenByAll';	
}
$message3=checkforsmileys($message3);

$bydatem[$uti['id']]=$m['datetimep'];
$theresultsm[$uti['id']]='<li class="_k- '.$dclassv.' '.$dclassvvv.'" role="listitem"><div class="clearfix"><div class="_l7 rfloat"><a class="unread_conversations_left _l8 '.$dclassvv.'" data-sbid="'.$uti['id'].'" href="#" data-t_text="Mark as Unread" data-t_topleft="t" fjax="/ajax/messages/unread.php?sbid='.$m['sbid'].'" data-a_starts="set_unread"></a><a class="_l8 _l9" href="#" data-t_text="Archive" data-t_topleft="left" data-a_starts="archive_message" fjax="/ajax/messages/archive.php?uidv='.$uti['id'].'"></a><a class="_l8 hidden_sb" href="/messages/#"></a></div><a class="_k_ conversaciones" data-p_nogo="t" data-a_id="conversaciones" fjax="/ajax/messages/conversation.php?uidv='.$uti['id'].'&inbox_other='.$inbox_other.'" data-a_starts="conversation_loading" data-a_custom_f="conversation_loaded" rel="ignore" href="/messages/'.$uti['username'].'" data-fullname="'.$uti['fullname'].'" data-uidv="'.$uti['id'].'" data-username="'.$uti['username'].'"><div class="clearfix pvs"><div class="MercuryThreadImage mrm lfloat"><img class="_s0 _rw img" src="/users/'.$uti['id'].'/pics/'.$uti['profilepict'].'" alt=""></div><div class="_l4"><abbr title="'.turndate4_messages($m['datetimep']).'" data-utime="'.$m['datetimep'].'" class="_l0 timestamp">'.turndate4_messages($m['datetimep']).'</abbr><div class="_l2"><span class="_l1">'.$uti['fullname'].'</span><span class="_l5 hidden_sb">inbox</span></div><div class="clearfix"><div class="_l6 rfloat"></div><div class="_l3 fsm fwn fcg"><span class="MercuryRepliedIndicator seenByListener '.$dclass.'"></span>'.$message3.'</div></div></div></div></a></div></li>';
}
?>