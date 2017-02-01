<?php
include("start.php");
include("populate_page.php");

$params['style']='
<style type="text/css">
body{color:#333333;}
body{font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;text-align:left;direction:ltr;}
body table td{font-size:11px;vertical-align:top;}
.masunofriends{
display:block;
margin-right:5px;
float:left;
background-position:-16px -34px;
background-image:url("/images/rV4dcwwzxNw.png");
background-repeat:no-repeat;
height:16px;
width:16px;	
}
.friendslink2s{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;cursor:pointer;
}
.friendslink2s:hover{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;cursor:pointer;
}
.friendslink2sv{
font-size:9px;font-weight:normal;color:#808080;cursor:pointer;
}
.friendslink2sv:hover{
font-size:9px;font-weight:normal;color:#808080;cursor:pointer;	
}
.xhover,.xhoverv{cursor:pointer;
float:right;visibility:hidden;vertical-align:top;background-clip:padding-box;border:1px solid tranparent;margin:0pt;background-image:url(\'/images/4WSewcWboV8.png\');background-repeat:no-repeat;height:15px;width:15px;cursor:pointer;display:inline-block;margin-top:4px;margin-right:10px;	position:relative;z-index:10;
}
.xhover:hover,.xhoverv:hover{cursor:pointer;
float:right;visibility:visible;vertical-align:top;background-clip:padding-box;border:1px solid tranparent;margin:0pt;background-image:url(\'/images/4WSewcWboV8.png\');background-repeat:no-repeat;background-position:0 -32px;height:15px;width:15px;cursor:pointer;display:inline-block;margin-top:4px;margin-right:10px;	position:relative;z-index:10;
}
</style>';



$echo.='
<script type="text/javascript">
function removealert(w,yk){
	
$.ajax({
  type: "GET",
  url: "notifications/notifications_seen.php",
  data: { notifications:w },
  success: function(data) {
$("#cnotificationstable"+yk).remove();
//alert(data);

  }
});

}

$(document).on("mouseleave",".nch",function(){ //notifications children hide
$(this).children().eq(0).css("visibility","hidden");
});
$(document).on("mouseenter",".nch",function(){ //notifications children hide
$(this).children().eq(0).css("visibility","visible");
});
</script>
<div style="line-height:20px;min-height:20px;vertical-align:bottom;outline:medium none;color:rgb(28,42,71);font-size:16px;margin:0;padding:0;padding-bottom:2px;font-weight:bold;margin-top:15px;">Your Notifications
</div>';


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");



$notifications=0;
$notifications_alert=0;
$r = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmedrecently='y' AND removealert!='y'");
if($r){
	while($m = mysql_fetch_array($r))
{
$notifications++;
}
}

function turndatelf($date){$date=tod($date);
return date('G:ia', strtotime($date));	
}
function turndate4_notifications($date){$date=tod($date);
  return date('F j', strtotime($date));
}

function turndate5_notifications($date){$date=tod($date);
  return date('l', strtotime($date));
}

function td5_notifications($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf="month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}


$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
if($suf=='month' || $suf=='day' && $td>7){$suf='past';}
if($suf=='month' || $suf=='day' && $td>14){$suf='wpast';}
if($suf=='second' || $suf=='minute' || $suf=='hour'){$suf='today';}
	return $suf;
}

include("functions/sb_user.php");
include("functions/td.php");

$notifications_seen_notifications='';

$yxmv=0;
$nn_dt=array();
$newnotifications=array();

$r=mysql_query("SELECT * FROM pokes WHERE id2='$uid' AND pokedback='0' ORDER BY datetimep DESC LIMIT 10");
while($m=mysql_fetch_array($r)){

$uti=sb_user($m['id']);
$flagtoc='y';
	$timeh=$m['datetimep'];
	$timehl=turndatelf($timeh);
	$timehv=td5_notifications($timeh);
	if($timehv!='past'){
	if($timehv=='today'){$timeh=turndate5_notifications($timeh);}
	else{$timeh='last '.turndate5_notifications($timeh);}
		}
	else if($timeh=="wpast"){$flagtoc='no';}
	else{$timeh=turndate4_notifications($timeh);}
	
	$notificationid=$m['pokeid'];
	
	$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND type='pokev' AND id='$uid'");

$ac=mysql_num_rows($ar);

if($ac==0){
	$nn_dt[$yxmv]=$m['datetimep'];
	if($flagtoc=="y"){
$newnotifications[$yxmv]='<table cellspacing="0" cellpadding="0" id="cnotificationstable'.$yxmv.'" style="border:0;width:650px;margin-top:10px;background:#ffffff;padding-left:0px;padding-right:4px;padding-top:2px;padding-bottom:2px;" class="notificationstable"><tr><td style="border-bottom:1px solid rgb(233,233,233);padding-bottom:3px;"><div style="position:relative;left:0px;top:0px;font-size:11px;font-weight:bold;" id="notificavv'.$yxmv.'" class="tiempof">Sent '.$timeh.'</div></td></tr><tr><td style="text-align:left;padding-left:8px;" class="nch"><div class="xhover" title="Remove" onclick="removealert(\'pokev:'.$m['pokeid'].',\',\''.$yxmv.'\');"></div><div style="position:relative;"><div class="pokessp_notifications" style="position:absolute;left:0px;top:4px;cursor:default;" id="masunofriends'.$yxmv.'"></div></div><div style="position:relative;top:4px;left:22px;"><div style="font-weight:normal;display:inline-block;" id="notificav'.$yxmv.'" class="llb"><a href="/'.$uti['username'].'">'.$uti['fullname'].'</a>&nbsp;<a href="/pokes">poked you</a></div>.&nbsp;<div class="llg" style="display:inline-block;"><a href="/pokes?ref=notif&notif_t=poke" class="friendslink2sv">'.$timehl.'</a></div></div></td></tr></table>';
$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'poke:'.$m['pokeid'].'\'; ax_notifications++;';
	}
	
$yxmv++;	
}

}




$time=time()-30*24*60*60; //just up to 30 days - for the user to take action ;)

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND type='family' AND relation_confirmed='1' AND datetimep<$time");
while($m=mysql_fetch_array($r)){


	$timeh=$m['datetimep'];
	$timehl=turndatelf($timeh);
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


$newnotifications[$yxmv]='<table cellspacing="0" cellpadding="0" id="cnotificationstable'.$yxmv.'" style="border:0;width:650px;margin-top:10px;background:#ffffff;padding-left:0px;padding-right:4px;padding-top:2px;padding-bottom:2px;" class="notificationstable"><tr><td style="border-bottom:1px solid rgb(233,233,233);padding-bottom:3px;"><div style="position:relative;left:0px;top:0px;font-size:11px;font-weight:bold;" id="notificavv'.$yxmv.'" class="tiempof">Sent '.$timeh.'</div></td></tr><tr><td style="text-align:left;padding-left:8px;" class="nch"><div class="xhoverv" style="opacity:0!important;"></div><div style="position:relative;"><i class="arbolito" style="position:absolute;left:0px;top:4px;cursor:default;" id="videocamera'.$yxmv.'"></i></div><div style="position:relative;top:4px;left:22px;" class="lb"><a hc="" href="/'.$uti['username'].'">'.$uti['fullname'].'</a> listed you as '.$uti['prefix'].' <span class="drelation"><script type="text/javascript">
var dval=$("#family_complete").find("option[value='.$m['relation'].']").text().toLowerCase();
$(".drelation:last").html(dval);
</script></span>. To approve this relationship for your wall, go to <span class="lb"><a href="/editprofile.php?sk=relationships">Relationships</a></span>.&nbsp;<div class="llg" style="display:inline-block;"><a href="/'.$uti['username'].'" class="friendslink2sv">'.$timehl.'</a></div></div></td></tr></table>';
$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'relation_confirmation:'.$m['sbid'].'\'; ax_notifications++;';

$notifications++;
if($ac==0){
$notifications_alert++;
}

$yxmv++;


}





include("functions/video_title_in_date.php");

$r=mysql_query("SELECT * FROM media WHERE id='$uid' AND vids!='' AND nye='3' AND notify='1' ORDER BY datetimep DESC LIMIT 50");
while($m=mysql_fetch_array($r)){


$vt=$m['title'];
if($vt==""){
$vt=video_title_in_date($m['datetimep']);
}

	$timeh=$m['datetimep'];
	$timehl=turndatelf($timeh);
	$timehv=td5($timeh);
	if($timehv=='today'){$timeh="Today";}
	else if($timehv=='this_week'){
	$timeh='on '.turndate4($timeh);	
	}
	else if($timehv=='past'){ // > 7 && <14
	$timeh='last '.turndate4($timeh);
		}
	else if($timehv=="wpast"){$timeh=turndate4_dfn($timeh); $flagtoc='y';} //optional not to display notifications after a determined amount of time


$uti=sb_user($m['id']);

$notificationid=$m['sbid'];
$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND type='video_parsedv' AND id='$uid'");

$ac=mysql_num_rows($ar);

if($ac==0){
	$nn_dt[$yxmv]=$m['datetimep'];
	


$newnotifications[$yxmv]='<table cellspacing="0" cellpadding="0" id="cnotificationstable'.$yxmv.'" style="border:0;width:650px;margin-top:10px;background:#ffffff;padding-left:0px;padding-right:4px;padding-top:2px;padding-bottom:2px;" class="notificationstable"><tr><td style="border-bottom:1px solid rgb(233,233,233);padding-bottom:3px;"><div style="position:relative;left:0px;top:0px;font-size:11px;font-weight:bold;" id="notificavv'.$yxmv.'" class="tiempof">Sent '.$timeh.'</div></td></tr><tr><td style="text-align:left;padding-left:8px;" class="nch"><div class="xhoverv" style="opacity:0!important;"></div><div style="position:relative;"><i class="videocamera" style="position:absolute;left:0px;top:4px;cursor:default;" id="videocamera'.$yxmv.'"></i></div><div style="position:relative;top:4px;left:22px;" class="lb">Your video "'.$vt.'" is ready to view. You can now  <a href="/video/video.php?v='.$m['sbid'].'">watch it</a> or <a href="/video/editvideo.php?v='.$m['sbid'].'">select a thumbnail</a>.&nbsp;<div class="llg" style="display:inline-block;"><a href="/'.$uti['username'].'" class="friendslink2sv">'.$timehl.'</a></div></div></td></tr></table>';
$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'video_parsed:'.$m['sbid'].'\'; ax_notifications++;';
$notifications++;
$notifications_alert++;

$yxmv++;



}

}

$r = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmedrecently='y' ORDER BY datetimep DESC LIMIT 25");
while($m = mysql_fetch_array($r))
{
	$flagtoc='y';
	$timeh=$m['datetimep'];
	$timehl=turndatelf($timeh);
	$timehv=td5($timeh);
	if($timehv=='today'){$timeh="Today";}
	else if($timehv=='this_week'){
	$timeh='on '.turndate4($timeh);	
	}
	else if($timehv=='past'){ // > 7 && <14
	$timeh='last '.turndate4($timeh);
		}
	else if($timehv=="wpast"){$timeh=turndate4_dfn($timeh); $flagtoc='y';} //optional not to display notifications after a determined amount of time
		$notificationid=$m['id2'];
	
	$ar=mysql_query("SELECT * FROM notifications_seen WHERE notificationid='$notificationid' AND type='request_acceptedv' AND id='$uid'");

$ac=mysql_num_rows($ar);

if($ac==0){
	
	if($flagtoc=="y"){
	$thefriend=$m['id2'];

$uti=sb_user($m['id2']);
$nn_dt[$yxmv]=$m['datetimep'];

$newnotifications[$yxmv]='<table cellspacing="0" cellpadding="0" id="cnotificationstable'.$yxmv.'" style="border:0;width:650px;margin-top:10px;background:#ffffff;padding-left:0px;padding-right:4px;padding-top:2px;padding-bottom:2px;" class="notificationstable"><tr><td style="border-bottom:1px solid rgb(233,233,233);padding-bottom:3px;"><div style="position:relative;left:0px;top:0px;font-size:11px;font-weight:bold;" id="notificavv'.$yxmv.'" class="tiempof">Sent '.$timeh.'</div></td></tr><tr><td style="text-align:left;padding-left:8px;" class="nch"><div class="xhover" title="Remove" onclick="removealert(\'request_acceptedv:'.$m['id2'].',\',\''.$yxmv.'\');"></div><div style="position:relative;"><div class="masunofriends" style="position:absolute;left:0px;top:4px;cursor:default;" id="masunofriends'.$yxmv.'"></div></div><div style="position:relative;top:4px;left:22px;"><span class="lb"><a href="/'.$uti['username'].'">'.$uti['fullname'].'</a></span> accepted your friend request. <span class="lb"><a hc="" href="/'.$uti['username'].'">Write on '.$uti['f_name'].'\'s Wall</a></span>.&nbsp;<div class="llg" style="display:inline-block;"><a href="/'.$uti['username'].'" class="friendslink2sv">'.$timehl.'</a></div></div></td></tr></table>';
$notifications_seen_notifications.='notifications_seen_notifications[ax_notifications]=\'request_accepted:'.$m['id2'].'\'; ax_notifications++;';
$yxmv++;

	}
	
}

}

arsort($nn_dt);

$c=count($nn_dt);

if($c==0){
$echo.='
<div class="mtm"><div class="pam uiBoxYellow">You have no notifications.</div><p>You will receive notifications about activities that your friends are doing that might be of interest to you. For example, if a friend comments on your status or a a friend posts in a group that you belong to, you might receive a notification.</p></div>';	
}

foreach($nn_dt as $key => $value){
$echo.=$newnotifications[$key];	
}


$echo.='<div style="display:none;" fjax="/notifications/notifications_seen.php" id="notifications_seen_linkv" data-a_form="notifications_seen_notificationsv"></div>
<div id="notifications_seen_notificationsv" class="displaynoneimportant">
<input type="hidden" autocomplete="off" name="notifications" id="notifications_notificationsv">
</div>
<script type="text/javascript">
var ax_notifications=0;
var notifications_seen_notifications=new Array();
'.$notifications_seen_notifications.'
$("#notifications_notificationsv").val(notifications_seen_notifications);
$(document).ready(function(){
$("#notifications_seen_linkv").click();	
});
</script>
';
$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='right_column_n_no_borders';

$params["body_class"]="scroll";

include("end.php");
?>