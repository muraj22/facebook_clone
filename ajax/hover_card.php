<?php
include("start.php");
?>
<?php
$r=mysql_query("SELECT * FROM registered WHERE username='$unv'");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
$uidv=$m['id'];
}

$dpic=$uti['profilepic'];
$dpic=str_replace("a.","_s.",$dpic);

$b_qf=return_bq("workedu","j");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='j' AND currently='2' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 1");
$c=mysql_num_rows($r);
if($c==0){
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='j' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 1");
$c=mysql_num_rows($r);
$position_past='';	
}
if($c>0){
while($m=mysql_fetch_array($r)){
$place=$m['place'];	
$position=$m['position'];
}
if(isset($position_past)){$position='Worked';}
else if($position==''){$position='Works';}
$one_line=$position.' at <span>'.$place.'</span>';
}
$b_qf=return_bq("workedu","c");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='c' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 1");
$c=mysql_num_rows($r);
if($c>0){
while($m=mysql_fetch_array($r)){
$place=$m['place'];	
$acollege='';
}
$one_line='<span>'.$place.'</span>';
}
if(!isset($acollege)){
$b_qf=return_bq("workedu","h");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='h' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 1");
$c=mysql_num_rows($r);
if($c>0){
while($m=mysql_fetch_array($r)){
$place=$m['place'];	
}
$one_line='<span>'.$place.'</span>';
}
}
if(!isset($one_line)){

$statec="";
$countryc="";
$cityc="";
$v="";

$b_qf=return_bq("living","current_city");

$result=mysql_query("SELECT * FROM living WHERE id='$uidv' AND type='current_city' AND (visibility='v' OR visibility='h') $b_qf");
while($ms=mysql_fetch_array($result)){
$statec=$ms['statec'];
$countryc=$ms['countryc'];
$cityc=$ms['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}
}

mysql_select_db("modules");
if(isset($f)){
$r=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$staten=$m['staten'];	
}
$r=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$countryn=$m['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
if($v!=""){
$one_line='<span>'.$v.'</span>';	
}

}

if(!isset($one_line)){
$one_line="";
}

$wp_table="mutual_friends";
$owner_c=$uidv;
$gs=0;

if($uid!=$uidv){
$extra_class="";
include("stories/with_plugin.php");
}
else{
$with="";
$extra_class=" hidden_sb ";
}

if(isset($_POST['nomessage'])){
$extra_class=" hidden_sb ";
}

if(in_array($uidv,$uid_friends)){
$with_class=" fcg ";
}
else{
$with_class="";
}
$mutual_line=$with;

echo'
<div style="display:inline-block;padding-top:8px;width:100%;text-align:left;z-index:400;" class="_7ll"><table class="_7lu" cellpadding="0" cellspacing="0" style="margin-left:10px;padding-bottom:10px;padding-right:10px;"><tbody><tr><td rowspan="2" valign="top"><a href="/'.$uti['username'].'"><div class="_7ls"><img class="_s0 _7lw _rv img" src="/'.$uti['id'].'/pics/'.$dpic.'" alt=""></div></a></td><td valign="top"><div class="_7ln fsl fwb fcb lb"><a href="/'.$uti['username'].'"><div class="ellipsis">'.$uti['fullname'].'</div></a><span class="uiLinkSubtle fwn fsm">'.$one_line.'</span></div></td></tr><tr valign="bottom"><td class="_7lv" style="vertical-align:bottom;"><div class="'.$with_class.' fsm fwn">'.$mutual_line.'</div></td></tr></tbody></table>

<div class="_tlo _k7 clearfix uiBoxGray topborder '.$extra_class.'" style="display:block;float:none;border-right:0;border-left:0;"><div class="clearfix">

<span class="lastItem uiButtonGroupItem buttonItem"><a class="HovercardMessagesButton uiButton displaydialog npjax" '; include("anchors_data/transfer_anchor.php"); echo $sechov.' role="button" rel="dialog" style="float:right;border-left:0;"><i class="mrs img bank_small"></i><span class="uiButtonText">Transfer</span></a></span>

<span class="uiButtonGroupItem buttonItem"><a class="HovercardMessagesButton uiButton displaydialog npjax" '; include("anchors_data/send_message_anchor.php"); echo $sechov.' role="button" rel="dialog" style="float:right;border-left:0;"><i class="mrs img msgbubble"></i><span class="uiButtonText">Message</span></a></span>';

 $duidv=$uidv;
 include("buttons/friends_button.php"); echo $sechov.'<div class="hidden_sb" id="ulqlcg212"><i class="defaultIcon img sp_c6q8pv sx_d93462"></i><i class="acqIcon img sp_c6q8pv sx_d2842b"></i></div></div></div>

<div class="hidden_sb ttclose" data-t_close="t"></div>
';

/*
abajo

tenes add friend, friend request sent
y friends [funcionando claro, al ultra rapido el add friend que pasa a friend request sent automatico sin espera de la respuesta y de una funcion global que es $(document).on("click",".FriendRequestAdd",function(){
var e=$(this).parent().find(".friend_request_add").length;
if(e==0){
$(this).parent().append(\'<div class="friend_request_add" fjax="/addfriend.php?uidv='.$uidv.'"></div>\'); // uidv equals the friend I want to add.
}
$(this).parent().find(".friend_request_add").click();
$(this).addClass("hidden_sb");
$(this).next("FriendRequestOutgoing").removeClass("hidden_sb");

});

//ese es el codigo for Friend request add (Add Friend) y toggle a Friend request sent alli mismo. se ubica en pdcph.php

con php determinar si son friends y hacer el echo correcto que es otro a este, por ahora implementar este de add friend para aquellos que no son mis friends.

<div class="clearfix"><span class="uiButtonGroup rfloat" id="u5e39x51"><span class="firstItem uiButtonGroupItem buttonItem"><div class="FriendButton" id="u5e39x513"><label class="FriendRequestAdd addButton uiButton" for="u5e39x512"><i class="mrs img sp_c6q8pv sx_452990"></i><input value="Add Friend" id="u5e39x512" type="button"></label><a class="FriendRequestOutgoing enableFriendListFlyout  outgoingButton uiButton" href="#" role="button" data-profileid="1566500836" data-memorialized="false" data-cansuggestfriends="true" data-flloc="hovercard"><i class="mrs img sp_c6q8pv sx_452990"></i><span class="uiButtonText">Friend Request Sent</span></a></div></span><span class="lastItem uiButtonGroupItem buttonItem"><a class="HovercardMessagesButton uiButton" href="/messages/diego.jauregui.31" role="button" rel="dialog" fjax="/ajax/messaging/composer.php?ids%5B0%5D=1566500836"><i class="mrs img sp_38839k sx_abc5df"></i><span class="uiButtonText">Message</span></a></span></span></div>

luego triangulo que sale con gris... [2 horas]

domingo 2 de diciembre

friends - si es que ya son friends

$u_friends=r_friends($uid);
$u_friends_r=r_friends($uid,"","","frs"); //friend request sent

if(in_array($u_friends,$uidv)){
echo friends
}
else{
if(in_array($u_friends_r,$uidv)){
$class=" hidden_sb ";
$classv="";
}
else{
$class="";
$classv="";
}
echo add friend friend request sent code with $class and $classv applied accordingly
}

el boton de mensaje solo estilado y no funcional


lunes 3 de diciembre

el boton de mensaje funcional

martes 4 de diciembre

mutual friends :)


*/
?>
<?php
include("end.php");
?>