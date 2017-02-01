<?php
if(!isset($including_notifications)){
include("start.php");
}

$poken='';
$relation_confirmation_bn='';
$relation_confirmationn='';
$video_parsedn='';
$request_acceptedvn='';
$transfern='';
$friend_requestsn='';
$messagen='';

$preparations=array();
$preparations["poke"]="";
$preparations["relation_confirmation_b"]="";
$preparations["relation_confirmation"]="";
$preparations["video_parsed"]="";
$preparations["request_acceptedv"]="";
$preparations["transfer"]="";
$preparations["friend_requests"]="";
$preparations["message"]="";

if(isset($_POST['notifications_notifications'])){

$notificationsv=explode(",",$notifications_notifications);
$notificationsvv=explode(",",$notifications_bank);
$notificationsvvv=explode(",",$notifications_friendrequests);
$notificationsvvvv=explode(",",$notifications_messages);

$notifications=array_merge($notificationsv,$notificationsvv);
$notifications=array_merge($notifications,$notificationsvvv);
$notifications=array_merge($notifications,$notificationsvvvv);

if(count($notifications)>0){
foreach($notifications as $k=>$v){
if($v!=""){
$v=explode(":",$v);
$k2=$v[0]; //type
$v2=$v[1]; //id

if(!isset(${$k2.'n'})){
${$k2.'n'}='';
}
${$k2.'n'}.=",".$v2;

if(!isset(${$k2.'a'})){
${$k2.'a'}=array();
}
${$k2.'a'}[]=$v2;

}
}
foreach($preparations as $k2=>$v){

if(strpos(${$k2.'n'},",")!==false){
${$k2.'n'}=substr(${$k2.'n'},1);
}

}
}
}else{
$pokegs=200;
$confirmed_recentlygs=10;
$transfergs=30;
$friend_requestsgs=30;
}

if(isset($pokea)){
$pokegs=count($pokea);
if($pokegs>=200){
$pokegs=0;
}
}else{
$pokegs=200;
}

if(isset($request_acceptedva)){
$confirmed_recentlygs=count($request_acceptedva);
if($confirmed_recentlygs>=10){
$confirmed_recentlygs=0;
}
}else{
$confirmed_recentlygs=10;
}

if(isset($transfera)){
$transfergs=count($transfera);
if($transfergs>=30){
$transfergs=0;
}
}else{
$transfergs=30;
}

if(isset($friend_requestsa)){
$friend_requestsgs=count($friend_requestsa);
if($friend_requestsgs>=30){
$friend_requestsgs=0;
}
}else{
$friend_requestsgs=30;
}

if(isset($messagea)){
$messagesgs=20-count($messagea);
}else{
$messagesgs=20;
}

$notifications=0;
$notifications_alert=0;
$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmedrecently='y' AND removealert!='y'");
//$notifications=mysql_num_rows($r);

include("functions/td.php");



$yxmv=0;
$nn_dt=array();
$newnotifications=array();

include("functions/dd.php");

$notifications_seen_friendrequests='';
$notifications_seen_messages='';
$notifications_seen_notifications='';
$notifications_seen_bank='';

$secho='';
$secho_arr[]=array();
$ax=0;
$nn_pokes_dates=array();
$nn_dt_pokes=array();
$nn_pokes=array();
$r=mysql_query("SELECT * FROM pokes WHERE id2='$uid' AND pokedback='0' AND find_in_set(pokeid,'$poken')=0 ORDER BY datetimep DESC LIMIT $pokegs");
while($m=mysql_fetch_array($r)){

$uti=sb_user($m['id']);
	$timeh=td($m['datetimep']);

$nn_pokes_dates[$ax]=$m['datetimep'];
$axv=$ax-1;

if(isset($nn_pokes_dates[$axv])){
$diff=dp($nn_pokes_dates[$ax],$nn_pokes_dates[$axv]);
print_r($diff);
}

if(isset($nn_pokes_dates[$axv]) AND $diff['hours']<24){

if($total_names_chunk>=3){$secho_arr[$pax]=$total_names_chunk;}
else{
$secho_arr[$pax][]=$uti['fullname'];
}
$total_names_chunk++;
$ax++;
}
else{
$pax=$ax;
$secho='';
$secho_arr[$ax]='';
$total_names_chunk=1;


$notificationid=$m['pokeid'];
$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND (type='poke' OR type='pokev') AND id='$uid'");

$ac=mysql_num_rows($ar);

if($ac==0){
	$nn_dt_pokes[$ax]=$m['datetimep'];

$nn_pokes[$ax]='<a href="/pokes?ref=notif&notif_t=poke" style="display:block;" class="notifications_linkvv notifications_linkvvv"><div id="cnotificationstable_pokes'.$ax.'" style="border:0;width:340px;cursor:pointer;padding-left:4px;padding-right:4px;padding-top:7px;padding-bottom:7px;" class="notificationstable clearfix"><div style="display:block;"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="float:left;width:50px;display:inline-block;margin-right:5px;width:50px;height:50px;"><div class="friendslink" style="text-align:left;position: relative;max-width: 243px;word-wrap:break-word;display:inline-block;"><span style="position:relative;top:4px;"><span style="font-weight:bold;" class="notifica notifica_pokes">'.$uti['fullname'].'</span><span> poked you.</span></span></div></div><div style="display:block;padding-top:7px;" class="clearfix"><div class="pokessp_notifications" style="display:inline-block;position:relative;margin-right:5px;float:left;top:0;margin-top:1px;"></div><div id="notifica_pokes'.$ax.'" class="tiempof" style="display:inline-block;">'.$timeh.'</div></div></div></a>';
$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'poke:'.$m['pokeid'].'\'; ax_notifications++;';
$ax++;
}

}



}

foreach($nn_pokes as $k=>$v){
$newnotifications[$yxmv]=$v;
$nn_dt[$yxmv]=$nn_dt_pokes[$k];

$acount=count($secho_arr[$k]);
if($secho_arr[$k]==''){$v2='';}
else if(is_numeric($secho_arr[$k])){$v2='<script type="text/javascript">$("#cnotificationstable_pokes'.$k.'").find(".notifica_pokes").after(\' and <span style="font-weight:bold;" class="notifica notifica_pokes">'.$secho_arr[$k].' others</span>\');</script>';}
else if($acount=="1"){$v2='<script type="text/javascript">$("#cnotificationstable_pokes'.$k.'").find(".notifica_pokes").after(\' and <span style="font-weight:bold;" class="notifica notifica_pokes">'.$secho_arr[$k][0].'</span>\');</script>';}
else{
$v2='<script type="text/javascript">$("#cnotificationstable_pokes'.$k.'").find(".notifica_pokes").after(\', <span style="font-weight:bold;" class="notifica notifica_pokes">'.$secho_arr[$k][0].'</span> and <span style="font-weight:bold;" class="notifica notifica_pokes">'.$secho_arr[$k][1].'</span>\');</script>';
}
$newnotifications[$yxmv].=$v2;

$notifications++;
$notifications_alert++;
$yxmv++;
}




$relation_love_array=array();
$relation_love_array[2]="in a relationship";
$relation_love_array[3]="engaged";
$relation_love_array[4]="married";
$relation_love_array[5]="in a complicated relationship";
$relation_love_array[6]="in an open relationship";

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND type='love' AND relation_confirmed='1' AND find_in_set(sbid,'$relation_confirmation_bn')=0 LIMIT 1");
while($m=mysql_fetch_array($r)){

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

$uti=sb_user($m['id2']);

$notificationid=$m['sbid'];
$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND (type='relation_confirmation_b') AND id='$uid'");
$ac=mysql_num_rows($ar);

	

$nn_dt[$yxmv]=$m['datetimep'];

$newnotifications[$yxmv]='<a href="/reqs.php" style="display:block;" class="notifications_linkvv notifications_linkvvv"><div id="cnotificationstable'.$yxmv.'" style="border:0;width:340px;cursor:pointer;padding-left:4px;padding-right:4px;padding-top:7px;padding-bottom:7px;" class="notificationstable clearfix"><div style="display:block;"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="float:left;width:50px;display:inline-block;margin-right:5px;width:50px;height:50px;"><div class="friendslink" style="text-align:left;position: relative;max-width: 243px;word-wrap:break-word;display:inline-block;"><span style="position:relative;top:4px;"><span class="blueName">'.$uti['fullname'].'</span> listed that you two are '.$relation_love_array[$m['relation']].'.</span></span></div></div><div style="display:block;padding-top:7px;" class="clearfix"><i class="corazon_grande" style="display:inline-block;position:relative;margin-top:-1px;margin-right:5px;float:left;top:0;"></i><div id="notificavv'.$yxmv.'" class="tiempof" style="display:inline-block;">'.$timeh.'</div></div></div></a>';

$notifications++;
if($ac==0){
$notifications_alert++;
}

$yxmv++;

$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'relation_confirmation_b:'.$m['sbid'].'\'; ax_notifications++;';
}




$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND type='family' AND relation_confirmed='1' AND find_in_set(sbid,'$relation_confirmationn')=0");
while($m=mysql_fetch_array($r)){


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


$uti=sb_user($m['id2']);

$notificationid=$m['sbid'];
$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND (type='relation_confirmation') AND id='$uid'");
$ac=mysql_num_rows($ar);


$nn_dt[$yxmv]=$m['datetimep'];

$newnotifications[$yxmv]='<a href="/editprofile.php?sk=relationships" style="display:block;" class="notifications_linkvv notifications_linkvvv"><div id="cnotificationstable'.$yxmv.'" style="border:0;width:340px;cursor:pointer;padding-left:4px;padding-right:4px;padding-top:7px;padding-bottom:7px;" class="notificationstable clearfix"><div style="display:block;"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="float:left;width:50px;display:inline-block;margin-right:5px;width:50px;height:50px;"><div class="friendslink" style="text-align:left;position: relative;max-width: 243px;word-wrap:break-word;display:inline-block;"><span style="position:relative;top:4px;"><span class="blueName">'.$uti['fullname'].'</span> listed you as '.$uti['prefix'].' <span class="drelation"><script type="text/javascript">
var dval=$("#family_complete").find("option[value='.$m['relation'].']").text().toLowerCase();
$(".drelation:last").html(dval);
</script></span>. To approve this relationship for your wall, go to Relationships. </span></span></div></div><div style="display:block;padding-top:7px;" class="clearfix"><i class="arbolito" style="display:inline-block;position:relative;margin-top:-1px;margin-right:5px;float:left;top:0;"></i><div id="notificavv'.$yxmv.'" class="tiempof" style="display:inline-block;">'.$timeh.'</div></div></div></a>';

$notifications++;
if($ac==0){
$notifications_alert++;
}

$yxmv++;

$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'relation_confirmation:'.$m['sbid'].'\'; ax_notifications++;
';
}


include("functions/video_title_in_date.php");

$r=mysql_query("SELECT * FROM media WHERE id='$uid' AND vids!='' AND nye='3' AND notify='1' AND find_in_set(sbid,'$video_parsedn')=0");
while($m=mysql_fetch_array($r)){


$vt=$m['title'];
if($vt==""){
$vt=video_title_in_date($m['datetimep']);
}

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


$uti=sb_user($m['id']);

$notificationid=$m['sbid'];
$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND (type='video_parsed' OR type='video_parsedv') AND id='$uid'");

$ac=mysql_num_rows($ar);

if($ac==0){
	$nn_dt[$yxmv]=$m['datetimep'];

$newnotifications[$yxmv]='<a href="/video/video.php?v='.$m['sbid'].'" style="display:block;" class="notifications_linkvv notifications_linkvvv"><div id="cnotificationstable'.$yxmv.'" style="border:0;width:340px;cursor:pointer;padding-left:4px;padding-right:4px;padding-top:7px;padding-bottom:7px;" class="notificationstable clearfix"><div style="display:block;"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="float:left;width:50px;display:inline-block;margin-right:5px;width:50px;height:50px;"><div class="friendslink" style="text-align:left;position: relative;max-width: 243px;word-wrap:break-word;display:inline-block;"><span style="position:relative;top:4px;">Your video "'.$vt.'" is ready to view. You can now watch it or select a thumbnail.</span></span></div></div><div style="display:block;padding-top:7px;" class="clearfix"><i class="videocamera" style="display:inline-block;position:relative;margin-top:-1px;margin-right:5px;float:left;top:0;"></i><div id="notificavv'.$yxmv.'" class="tiempof" style="display:inline-block;">'.$timeh.'</div></div></div></a>';

$notifications++;
$notifications_alert++;


$yxmv++;

$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'video_parsed:'.$m['sbid'].'\'; ax_notifications++;';

}

}

$r = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmedrecently='y' AND find_in_set(id2,'$request_acceptedvn')=0 ORDER BY datetimep DESC LIMIT $confirmed_recentlygs");
while($m = mysql_fetch_array($r))
{
	$flagtoc='y';
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
	if($flagtoc=="y"){
	$thefriend=$m['id2'];

$uti=sb_user($m['id2']);


$notificationid=$m['id2'];
$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND (type='request_accepted' OR type='request_acceptedv') AND id='$uid'");

$ac=mysql_num_rows($ar);

if($ac==0){
$nn_dt[$yxmv]=$m['datetimep'];

$newnotifications[$yxmv]='<a href="/'.$uti['username'].'" style="display:block;" class="notifications_linkvv notifications_linkvvv"><div id="cnotificationstable'.$yxmv.'" style="border:0;width:340px;cursor:pointer;padding-left:4px;padding-right:4px;padding-top:7px;padding-bottom:7px;" class="notificationstable clearfix"><div style="display:block;"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="float:left;width:50px;display:inline-block;margin-right:5px;width:50px;height:50px;"><div class="friendslink" style="text-align:left;position: relative;max-width: 243px;word-wrap:break-word;display:inline-block;"><span style="position:relative;top:4px;"><span style="font-weight:bold;" class="notifica" id="notificav'.$yxmv.'">'.$uti['fullname'].'</span> accepted your friend request. Write on '.$uti['f_name'].'\'s Wall.</span></span></div></div><div style="display:block;padding-top:7px;" class="clearfix"><div class="masunofriends" style="display:inline-block;position:relative;margin-top:-1px;margin-right:5px;float:left;top:0;"></div><div id="notificavv'.$yxmv.'" class="tiempof" style="display:inline-block;">'.$timeh.'</div></div></div></a>';
$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'request_acceptedv:'.$m['id2'].'\'; ax_notifications++;';

$notifications++;
$notifications_alert++;


$yxmv++;
}

}

}

arsort($nn_dt);

$nn_dtv=array();

$transactions=0;
$transactions_alert=0;
$yxmvv=0;

$r = mysql_query("SELECT * FROM transactions WHERE (id='$uid' OR id2='$uid') AND find_in_set(sbid,'$transfern')=0 ORDER BY datetimep DESC LIMIT $transfergs");
while($m = mysql_fetch_array($r))
{
	$flagtoc='y';
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
	if($flagtoc=="y"){
	$thefriend=$m['id2'];

$uti=sb_user($m['id']);


$notificationid=$m['sbid'];
$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND (type='transfer') AND id='$uid' ORDER BY datetimep DESC LIMIT 30");

$ac=mysql_num_rows($ar);


$nn_dtv[$yxmvv]=$m['datetimep'];

$to='.';

$utiv=sb_user($m['id2']);
if(($m['id']==$uid AND $m['id2']==$uid) OR $m['id']=$uid AND !is_numeric($m['id2'])){
    $uti['fullname']='You';
    if($m['amount']>0){
        $chunk='added';
    }
    else{
        $chunk='withdrawed';
        $m['amount']=str_replace("-","",$m['amount']);
        $to=' to '.$m['id2'].'.';
    }
}else{
    if($m['id2']==$uid){
        $chunk='sent you';	
    }
    else{
        $uti['fullname']='You';
        $chunk='sent to '.$utiv['fullname'];   
    }
}
$newnotificationsv[$yxmvv]='<a href="/transactions.php" style="display:block;" class="notifications_linkvv notifications_linkvvv"><div id="cnotificationstable'.$yxmv.'" style="border:0;width:340px;cursor:pointer;padding-left:4px;padding-right:4px;padding-top:7px;padding-bottom:7px;" class="notificationstable clearfix"><div style="display:block;"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="float:left;width:50px;display:inline-block;margin-right:5px;width:50px;height:50px;"><div class="friendslink" style="text-align:left;position: relative;max-width: 243px;word-wrap:break-word;display:inline-block;"><span style="position:relative;top:4px;"><span style="font-weight:bold;" class="notifica" id="notificav'.$yxmv.'">'.$uti['fullname'].'</span> '.$chunk.' $'.number_format($m['amount'],2).$to.'</span></span></div></div><div style="display:block;padding-top:7px;" class="clearfix"><div class="masunofriends" style="display:inline-block;position:relative;margin-top:-1px;margin-right:5px;float:left;top:0;"></div><div id="notificavv'.$yxmv.'" class="tiempof" style="display:inline-block;">'.$timeh.'</div></div></div></a>';
$notifications_seen_bank.='notifications_seen_bank[ax_bank]=\'transfer:'.$m['sbid'].'\'; ax_bank++;';

if($ac==0){
$transactions++;

if(($m['id']==$uid AND $m['id2']==$uid) OR $m['id']=$uid AND !is_numeric($m['id2']) OR $m['id2']!=$uid){
}else{
$transactions_alert++;
}

}

$yxmvv++;


}

}

arsort($nn_dtv);

$yxmvvv=0;
$newfriends=array();

$r = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='nc' AND find_in_set(sbid,'$friend_requestsn')=0 ORDER BY datetimep DESC LIMIT $friend_requestsgs");
while($m = mysql_fetch_array($r))
{
	$thefriend=$m['id2'];
	$r2=mysql_query("SELECT * FROM registered WHERE id='$thefriend'");
while($m2=mysql_fetch_array($r2)){
$newfriends[$yxmvvv]='<table style="border:0;width:340px;margin-top:0px;margin-bottom:0;background:none repeat scroll 0% 0% rgb(239, 241, 247);padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;" id="confirmv'.$yxmv.'" class="confirmv"><tr><td style="width:50px;"><a href="/'.$m2['username'].'/"><img src="/'.$m2['id'].'/pics/'.$m2['profilepict'].'" style="width:50px;height:50px;"></a></td><td class="friendslink" style="text-align:left;width:125px;"><span style="position:relative;top:12px;left:5px;"><a style="text-overflow: ellipsis;max-width: 105px;overflow: hidden;white-space: nowrap;display: inline-block;" href="/'.$m2['username'].'/">'.$m2['fullname'].'</a></span></td><td style="vertical-align:middle;"><div style="position:relative;margin:0;padding:0;"><div style="position:absolute;margin:0;padding:0;left:-5px;top:-10px;"><input autocomplete="off" type="button" class="confirmrequest" id="confirm'.$yxmv.'" value="Confirm" data-sbid="'.$m['id2'].'" data-yk="'.$yxmv.'"><input autocomplete="off" type="button" class="addfriend" value="Friends" style="color:#666666;text-align:right;padding-left:17px;cursor:default;display:none;" id="confirmvv'.$yxmv.'"><div class="check" style="position:absolute;top:3px;left:8px;cursor:default;display:none;" id="confirmvvv'.$yxmv.'"></div><input autocomplete="off" id="notnow'.$yxmv.'" type="button" class="notnow" data-sbid="'.$m['id2'].'" data-yk="'.$yxmv.'" value="Not Now" style="margin-left:4px;"><div id="notnowv'.$yxmv.'" style="display:none;">Friend request hidden.</div></div></div></td></tr></table>';
$notifications_seen_friendrequests.='notifications_seen_friendrequests[ax_friendrequests]=\'friend_requests:'.$m['sbid'].'\'; ax_friendrequests++;';

$yxmvvv++;
//friend notifications never go away unless you take action
}

}

if(isset($notifications_notifications)){

include("new_messages.php");

arsort($bydatem);

$dparams=array();

$dparams["total_notifications"]=count($nn_dt);
$dparams["new_notifications"]="";

foreach($nn_dt as $k=>$v){
$dparams["new_notifications"].=$newnotifications[$k];
}

$dparams["new_notifications"].='
<script type="text/javascript">
'.$notifications_seen_notifications.'
$("#notifications_notifications").val(notifications_seen_notifications);
</script>';

$dparams["total_transactions"]=$transactions_alert;
$dparams["total_transactionsv"]=count($nn_dtv);
$dparams["new_transactions"]="";
foreach($nn_dtv as $k=>$v){
$dparams["new_transactions"]=$newnotificationsv[$k];
}

$dparams["new_transactions"].='
<script type="text/javascript">
'.$notifications_seen_bank.'
$("#notifications_bank").val(notifications_seen_bank);
</script>';


$dparams["total_messages"]=$unread;
$dparams["total_messagesv"]=count($bydatem);
$dparams["new_messages"]="";
foreach($bydatem as $k=> $v){
$dparams["new_messages"].=$drm[$k];
}
$dparams["new_messages"].='
<script type="text/javascript">
'.$notifications_seen_messages.'
$("#notifications_messages").val(notifications_seen_messages);
</script>';

$dparams["total_friend_requests"]=count($newfriends);
$dparams["new_friend_requests"]="";
foreach($newfriends as $k=>$v){
$dparams["new_friend_requests"].=$v;
}

$dparams["new_friend_requests"].='
<script type="text/javascript">
'.$notifications_seen_friendrequests.'
$("#notifications_friendrequests").val(notifications_seen_friendrequests);
</script>';


echo json_encode($dparams);
}

?>