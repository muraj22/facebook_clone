<?php
include("functions/get_list_class.php");

$optional_tooltip=array();

$optional_tooltip[2]="Only you";

$regular_array=array();
$regular_array[0]="Public";
$regular_array[1]="Your friends";
$regular_array[2]="Only Me";
$regular_array[3]="Custom";

echo'<div id="privacy_options" class="hidden_sb">';

echo'<div class="uiSelectorMenuWrapper uiToggleFlyout"><div role="menu" class="uiMenu uiSelectorMenu"><ul class="uiMenuInner">';

foreach($regular_array as $k=>$v){
$vvv=$v;	

if($v=="Custom"){$vv="customv";} //little hack as there are two custom on function get_list_class
else{$vv=$v;}

if($v=="Your friends"){ //it is only for the tooltip
$v="Friends";
$vv=$v;	
}


if($k==2){
$ot=$optional_tooltip[$k];
}
else{$ot=$vvv;}

if($vv=="customv"){
echo'<li class="custom_privacy_option uiMenuItem uiMenuItemRadio uiSelectorOption fbPrivacyAudienceSelectorOption" data-label="'.$v.'"><a class="itemAnchor itemWithIcon displaydialog" role="menuitemradio" tabindex="0" href="#" aria-checked="false" data-tt="'.$vvv.'" data-privacy="'.$k.'" data-d_width="445" data-d_isajax="t" data-d_cancel="Cancel" data-d_cancel_function="close_dialog_f" data-d_special_append="t" data-a_formo=\'$(this).parents("ul").eq(1);\' data-d_fjax="/privacy/custom.php"><div class="_icw mrs hidden_sb inlineBlock"><i class="itemIcon img '.get_list_class(str_replace(" ","_",strtolower($vv))).'"></i></div><i class="mrs itemIcon img '.get_list_class(str_replace(" ","_",strtolower($vv))).'"></i><span class="itemLabel fsm">'.$v.'</span></a><div class="hidden_sb dialog_msgs"><div class="custom_privacy"></div></div></li>';	
}
else{
echo'<li class="uiMenuItem uiMenuItemRadio uiSelectorOption fbPrivacyAudienceSelectorOption" data-label="'.$v.'"><a class="itemAnchor itemWithIcon" role="menuitemradio" tabindex="0" href="#" aria-checked="false" data-tt="'.$vvv.'" data-tto="'.$ot.'" data-privacy="'.$k.'" rel="async-post" fjax="/ajax/privacy/simple_save.php?id='.$k.'" data-a_formo=\'$(this).parents(".audienceSelector").eq(0).parents("li").eq(0);\'><div class="_icw mrs hidden_sb inlineBlock"><i class="itemIcon img '.get_list_class(str_replace(" ","_",strtolower($vv))).'"></i></div><i class="mrs itemIcon img '.get_list_class(str_replace(" ","_",strtolower($vv))).'"></i><span class="itemLabel fsm">'.$v.'</span></a></li>';	
}


}


echo'<li class="uiMenuSeparator"></li>';

$r=mysql_query("(SELECT * FROM lists WHERE id='$uid' AND type='close_friends') UNION (SELECT * FROM lists WHERE id='$uid' AND visibility='v' AND (type='custom' OR type='work' OR type='education' OR type='location' OR type='family') AND visibility='v' ORDER BY datetimep DESC LIMIT 1)"); //here order by list members count, lm_count field
while($m=mysql_fetch_array($r)){
echo'<li class="uiMenuItem uiMenuItemRadio uiSelectorOption fbPrivacyAudienceSelectorOption friendListOption specialOption" data-label="'.$m['listn'].'" id="u_1e_m"><a class="itemAnchor itemWithIcon" role="menuitemradio" tabindex="-1" href="#" aria-checked="false" data-tt="'.$m['listn'].'" data-privacy="l'.$m['sbid'].'" rel="async-post" fjax="/ajax/privacy/simple_save.php?id=l'.$m['sbid'].'" data-a_formo=\'$(this).parents(".audienceSelector").eq(0).parents("li").eq(0);\'><div class="_icw mrs hidden_sb inlineBlock"><i class="itemIcon img '.get_list_class($m['type']).'"></i></div><i class="mrs itemIcon img '.get_list_class($m['type']).'"></i><span class="itemLabel fsm">'.$m['listn'].'</span></a></li>';	
}

echo'
<li class="uiMenuItem uiMenuItemRadio uiSelectorOption moreOption specialOption selected" data-label="See all lists..."><a class="itemAnchor" role="menuitemradio" tabindex="-1" href="#" aria-checked="false" data-type="friendList"><span class="itemLabel fsm">See all lists...</span></a></li>';


$r=mysql_query("(SELECT * FROM lists WHERE id='$uid' AND (type='custom' OR type='work' OR type='education' OR type='location' OR type='family') AND visibility='v' ORDER BY datetimep DESC LIMIT 1,599) UNION (SELECT * FROM lists WHERE id='$uid' AND type='acquaintances')"); //here order by lm_count (list members count)

while($m=mysql_fetch_array($r)){
echo'<li class="uiMenuItem uiMenuItemRadio uiSelectorOption fbPrivacyAudienceSelectorOption friendListOption specialOption secondaryOption" data-label="'.$m['listn'].'" id="u_1e_m"><a class="itemAnchor itemWithIcon" role="menuitemradio" tabindex="-1" href="#" aria-checked="false" data-tt="'.$m['listn'].'" data-privacy="l'.$m['sbid'].'" rel="async-post" fjax="/ajax/privacy/simple_save.php?id=l'.$m['sbid'].'" data-a_formo=\'$(this).parents(".audienceSelector").eq(0).parents("li").eq(0);\'><div class="_icw mrs hidden_sb inlineBlock"><i class="itemIcon img '.get_list_class($m['type']).'"></i></div><i class="mrs itemIcon img '.get_list_class($m['type']).'"></i><span class="itemLabel fsm">'.$m['listn'].'</span></a></li>';
}

echo'<li class="uiMenuSeparator secondaryOption"></li><li class="uiMenuItem uiMenuItemRadio uiSelectorOption returnOption secondaryOption specialOption" data-label="Go Back"><a class="itemAnchor" role="menuitemradio" tabindex="-1" href="#" aria-checked="false"><span class="itemLabel fsm">Go Back</span></a></li></ul></div></div>';

echo'</div>';


echo'<div id="ealbum_privacy_options" class="hidden_sb">';

echo'<div class="uiSelectorMenuWrapper uiToggleFlyout"><div role="menu" class="uiMenu uiSelectorMenu"><ul class="uiMenuInner">';

echo'<li class="uiMenuItem uiMenuItemRadio uiSelectorOption"><a class="itemAnchor itemWithIcon" role="menuitemradio" tabindex="0" href="#" aria-checked="false"><span class="itemLabel fsm">Edit Album Privacy</span></a></li>';

echo'</ul></div></div>';

echo'</div>';
?>