<?php
$harea="";
$harea.='';

$harea.='
<div style="margin-left:20px;">
<div style="position:absolute;right:0px;width:auto;">
<div style="float:right;width:100%;">';

if($uid==$uidv){
$harea.='<label class="uiButton mrl" style="float:right;" onclick="window.location=\'/editprofile.php\'"><i class="editpv mrs" style="display:inline-block;"></i><input type="button" value="Edit Profile"></label>';	
}


$uti=sb_user($uidv);

if($uid!=$uidv){


$harea.='<div class="uiSelector inlineBlock uiSelectorRight mls uiSelectorNormal  mrl" style="text-align:left;float:right;">
<div class="wrap"><a aria-expanded="true" class="uiButton uiSelectorButton" href="#" role="button" aria-label="Other actions" aria-haspopup="1" rel="toggle"><i class="img tuerca_w"></i><span class="uiButtonText"></span></a><div class="uiSelectorMenuWrapper uiToggleFlyout"><div class="uiMenuContainer uiSelectorMenu"><div role="menu" class="uiMenu"><ul class="uiMenuInner"><li class="uiMenuItem" data-label="Poke" id="profile_action_poke"><a class="itemAnchor displaydialog" role="menuitem" tabindex="-1" href="#" data-d_okay="Okay" data-d_okay_function="close_dialog" data-d_isajax="t" data-d_fjax="/pokesd/poke_dialog.php?uidv='.$uti['id'].'&amp;pokeback=0&amp;ask_for_confirm=0" rel="dialog-post" id="poke_user"><span class="itemLabel fsm">Poke</span></a></li>';

if(in_array($uid,$uidv_friends)){
$harea.='<li class="uiMenuSeparator"></li><li class="uiMenuItem" data-label="Unfriend..." id="profile_action_remove_friend"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#" fjax="/ajax/profile/removefriendconfirm.php?uid=100004266369260" rel="dialog-post"><span class="itemLabel fsm">Unfriend...</span></a></li>';
}


$harea.='</ul></div></div></div></div>
</div>';


$harea.='<a class="uiButton displaydialog npjax transfer" style="padding:1px 3px;margin-left:5px;float:right;" '; include("anchors_data/transfer_anchor.php"); $harea.=$sechov.'><input id="wmsg" type="button" value="Transfer" style="text-align:right;padding:0;"></a>';

$harea.='
<a class="uiButton displaydialog npjax" style="padding:1px 3px;margin-left:5px;float:right;" '; include("anchors_data/send_message_anchor.php"); $harea.=$sechov.'><input id="wmsg" type="button" value="Message" style="text-align:right;padding:0;"></a>';	

$duidv=$uidv;
include("buttons/friends_button.php");
$harea.=$sechov;

}

$harea.='
</div>
</div>';

$harea.='<div id="wall_content" style="margin:0;padding:0;display:inline-block;">';
$harea.='<div style="font-size:20px;color:rgb(28, 42, 71);font-weight:bold;position:relative;margin:0;padding:0;display:block;">'.$uti['fullname'].'</div>';
$harea.='</div>';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$stt='2';
include("info_short.php");

$harea.=$secho;

$harea.='</div>';
?>