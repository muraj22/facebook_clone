<?php
 mysql_select_db("registered"); //nunca esta de mas

$uti=sb_user($duidv);

if($uid==$duidv){
$friend_bt_class="hidden_sb"; //friends
$friend_bt_classv="hidden_sb"; //friend request sent
$friend_bt_classvv="hidden_sb"; //add friend
$friend_bt_classvvv="hidden_sb"; //friend request received
}
else{

if(in_array($duidv,$uid_friends)){
$friend_bt_class=""; //friends
$friend_bt_classv="hidden_sb"; //friend request sent
$friend_bt_classvv="hidden_sb"; //add friend
$friend_bt_classvvv="hidden_sb"; //friend request received
}

else{
if(in_array($duidv,$uid_friends_rs)){
$friend_bt_class="hidden_sb"; //friends
$friend_bt_classv=""; //friend request sent
$friend_bt_classvv="hidden_sb"; //add friend
$friend_bt_classvvv="hidden_sb"; //friend request received
}
else if(in_array($duidv,$uid_friends_rsv)){
$friend_bt_class="hidden_sb"; //friends
$friend_bt_classv="hidden_sb"; //friend request sent
$friend_bt_classvv="hidden_sb"; //add friend
$friend_bt_classvvv=""; //friend request received
}
else{
$friend_bt_class="hidden_sb"; //friends
$friend_bt_classv="hidden_sb"; //friend request sent

$b_qf=return_bq("friend_requests");
$r5=mysql_query("SELECT * FROM registered as friend_requests WHERE id='$duidv' $b_qf");
$c5=mysql_num_rows($r5);
if($c5==0){
$friend_bt_classvv="hidden_sb"; //add friend
}
else{
$friend_bt_classvv=""; //add friend
}
$friend_bt_classvvv="hidden_sb"; //friend request received
}
}

}


if(in_array($duidv,$uid_friends_rsv)){
$friend_request_incoming='<div class="clearfix"><a class="FriendRequestIncoming enableFriendListFlyout incomingButton uiButton '.$friend_bt_classvvv.'" href="#" role="button" style="float:right;"><i class="masuno img"></i><span class="uiButtonText">Respond to Friend Request</span></a></div>';
}
else{
$friend_request_incoming="";
}

if($friend_bt_class==""){

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM lists_members WHERE id='$uid' AND id2='$duidv' AND type='close_friends' AND visibility='v'"));
$c=$c['c'];

$cv=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM lists_members WHERE id='$uid' AND id2='$duidv' AND type='acquaintances' AND visibility='v'"));
$cv=$cv['c'];

if($c>0){
$dclass="estrellita";
$dclassv="checked";
$dfjax='fjax="/ajax/friends_actions/close_friends/remove.php?uidv='.$duidv.'"';
}else{
$dclass="";
$dclassv="";
$dfjax='fjax="/ajax/friends_actions/close_friends/add.php?uidv='.$duidv.'"';
}

if($cv>0){
$dclass="jornalcito";
$dclassvv="checked";
$dfjaxv='fjax="/ajax/friends_actions/acquaintances/remove.php?uidv='.$duidv.'"';
}else{
$dclassvv="";
$dfjaxv='fjax="/ajax/friends_actions/acquaintances/add.php?uidv='.$duidv.'"';
}

if($c>0 && $cv>0){
$dclass="";
}

$bt_friends='

<div style="display:inline-block;position:relative;float:right;" class="isfriend_wrapper">
<a onmouseover="dmg();" class="FriendRequestFriends enableFriendListFlyout friendButton uiButton '.$friend_bt_class.'" href="#" role="button" data-flloc="hovercard" id="ulqlcg211" aria-haspopup="true" data-uidv="'.$duidv.'"><i class="defaultIcon img ckm customimg '.$dclass.'"></i><span class="uiButtonText">Friends</span></a>


<div style="position:absolute;padding:0;margin:0;display:none;padding-top:10px;" class="unfriend_wrapper">
<div style="position:relative;margin:0;padding:0;display:inline-block;">

';


$bt_friends.='
<div style="width:190px;border:1px solid #8c8c8c;border-bottom:1px solid #666666;position:relative;top:0px;box-shadow:0pt 3px 8px rgba(0,0,0,0.21);background:#fff;">
<div style="margin:0;padding:0;background-image:url(\'/images/opincho.png\');background-repeat:no-repeat;background-color:transparent;background-position:0 0;width:16px;height:9px;position:absolute;top:-9px;left:15px;"></div>
<ul style="list-style-type:none;width:100%;margin:0;padding:0;background:#fff;"><li class="itemali" onclick="$(this).parents(\'.tiptip_holder\').css(\'display\',\'none\'); punfriend(\''.$duidv.'\',\''.$uti['fullname'].'\',\''.$uti['profilepict'].'\');" style="width:168px;margin:0;padding:0;text-align:left;list-style-type:none;padding-left:22px;margin-top:4px;margin-bottom:4px;padding-top:2px;padding-bottom:2px;">Unfriend</li><li class="uiMenuXSeparator"></li><li class="itemali '.$dclassv.'" '.$dfjax.' data-a_starts="close_friends_completed" style="width:168px;margin:0;padding:0;text-align:left;list-style-type:none;padding-left:22px;margin-top:4px;margin-bottom:4px;padding-top:2px;padding-bottom:2px;" id="close_friends_li">Close Friends</li><li class="itemali '.$dclassvv.'" '.$dfjaxv.' data-a_starts="acquaintances_completed" style="width:168px;margin:0;padding:0;text-align:left;list-style-type:none;padding-left:22px;margin-top:4px;margin-bottom:4px;padding-top:2px;padding-bottom:2px;" id="acquaintances_li">Acquaintances</li></ul>
</div>


</div>
</div>

</div>';
}
else{
$bt_friends="";
}

$sechov="";
$sechov='<div class="FriendButton" style="display:inline-block;float:right;"><label class="FriendRequestAdd  addButton uiButton '.$friend_bt_classvv.'" for="ulqlcg213" style="float:right;" data-uidv="'.$duidv.'"><i class="masuno img"></i><input value="Add Friend" id="ulqlcg213" type="button"></label>'.$bt_friends.'<a class="FriendRequestOutgoing enableFriendListFlyout outgoingButton uiButton '.$friend_bt_classv.'" href="#" role="button" style="float:right;"><span class="uiButtonText">Friend Request Sent</span></a>'.$friend_request_incoming.'</div>';
?>