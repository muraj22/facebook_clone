<?php
include("start.php");
include("populate_page.php");

if(isset($_GET['tab']) && $_GET['tab']=="privacy"){
$params["header_area"]='<div id="headerArea" class="normal"><div class="uiHeader uiHeaderPage"><div class="clearfix uiHeaderTop"><div><h2 class="uiHeaderTitle" aria-hidden="true">Privacy Settings and Tools</h2></div></div></div></div>';

$echo.='<div style="margin-left:20px;">';

$echo.='<div id="SettingsPage_Content" style="width:759px;"><ul class="uiList sbSettingsSections _4kg "><li class="sbSettingsSectionsItem uiListItem sbSettingsSectionsItemBorderTop"><div class="clearfix"><span class="mlm sbSettingsSectionsItemName lfloat fwb">Who can see my stuff?</span><div class="sbSettingsSectionsItemContent rfloat"><ul class="uiList sbSettingsList _4kg  _4ks">';


$echo.='<li class="sbSettingsListItem clearfix uiListItem">';

$uidv=$uid;
$sbid="";
$ltypev="options";

$peditable="t";

$nfjax="";
$data_t='';

$dclass="";

$use_edit_album="";

$privacy_configuration="big";
$privacy_source="ps"; //privacy settings

include("buttons/privacy_button.php");


$echo.='<a class="pvm phs sbSettingsListLink clearfix" data-ojaxv="t" href="/settings?tab=privacy&amp;section=composer" data-a_id="privacy_settings" data-a_load=\'$(thisv).parents(".sbSettingsListItem").eq(0).find(".content").eq(0);\' data-p_nogo="t" fjax="/ajax/settings/granular_privacy/composer.php" rel="async"><span style="padding-left: 23px;" class="uiIconText sbSettingsListItemEdit"><i class="img lapiz_settings" style="top: -2px;"></i>Edit</span><span class="sbSettingsListItemSaved hidden_sb">Changes saved</span><span class="sbSettingsListItemContent fcg"><div class="_nll">Who can see your future posts?</div><div class="saved_data _nlm fwb">'.$privacy["config"].'</div></span></a><div class="content">';


if(isset($_GET['section']) && $_GET['section']=="composer"){
include("ajax/settings/granular_privacy/composer.php");	
$echo.=$secho;
}

$echo.='</div></li><li class="sbSettingsListItem clearfix uiListItem"><a class="pvm phs sbSettingsListLink clearfix" href="/settings?tab=privacy&amp;section=masher" data-p_nogo="t" data-a_id="privacy_settings" data-a_load=\'$(thisv).parents(".sbSettingsListItem").eq(0).find(".content").eq(0);\'  fjax="/ajax/settings/granular_privacy/masher.php" rel="async"><span style="padding-left: 23px;" class="uiIconText sbSettingsListItemEdit"><i class="img lapiz_settings" style="top: -2px;"></i>Limit Past Posts</span><span class="sbSettingsListItemSaved hidden_sb">Changes saved</span><span class="sbSettingsListItemContent fcg"><div class="_nll">Limit the audience for posts you\'ve shared with friends of friends or Public?</div><div class="_nlm fwb"></div></span></a><div class="content">';


if(isset($_GET['section']) && $_GET['section']=="masher"){
include("ajax/settings/granular_privacy/masher.php");	
$echo.=$secho;
}



$uidv=$uid;
$sbid="";
$ltypev="email_search";

$peditable="t";

$nfjax="";
$data_t='';

$dclass="";

$use_edit_album="";

$privacy_configuration="big";
$privacy_source="ps"; //privacy settings

include("buttons/privacy_button.php");

if($privacy["listtext"]=="Public"){
$privacy["listtext"]="Everyone";	
}


$echo.='</div></li></ul></div></div></li><li class="sbSettingsSectionsItem uiListItem sbSettingsSectionsItemBorderTop"><div class="clearfix"><span class="mlm sbSettingsSectionsItemName lfloat fwb">Who can look me up?</span><div class="sbSettingsSectionsItemContent rfloat"><ul class="uiList sbSettingsList _4kg  _4ks"><li class="sbSettingsListItem clearfix uiListItem"><a class="pvm phs sbSettingsListLink clearfix" data-onclick="[[&quot;SettingsController&quot;,&quot;handleLinkClick&quot;]]" href="/settings?tab=privacy&amp;section=findcontact" data-a_id="privacy_settings" data-a_load=\'$(thisv).parents(".sbSettingsListItem").eq(0).find(".content").eq(0);\' data-p_nogo="t" fjax="/ajax/settings/granular_privacy/find_contact.php" rel="async"><span style="padding-left: 23px;" class="uiIconText sbSettingsListItemEdit"><i class="img lapiz_settings" style="top: -2px;"></i>Edit</span><span class="sbSettingsListItemSaved hidden_sb">Changes saved</span><span class="sbSettingsListItemContent fcg"><div class="_nll">Who can look you up using the email address or phone number you provided?</div><div class="saved_data _nlm fwb">'.$privacy["listtext"].'</div></span></a><div class="content">';


if(isset($_GET['section']) && $_GET['section']=="findcontact"){
include("ajax/settings/granular_privacy/find_contact.php");	
$echo.=$secho;
}



$uidv=$uid;
$sbid="";
$ltypev="robot_engine";

$peditable="t";

$nfjax="";
$data_t='';

$dclass="";

$use_edit_album="";

$privacy_configuration="big";
$privacy_source="ps"; //privacy settings

include("buttons/privacy_button.php");

if($privacy["listtext"]=="Public"){
$privacy["listtext"]="On";	
}
else{
$privacy["listtext"]="Off";	
}


$echo.='</div></li><li class="sbSettingsListItem clearfix uiListItem"><a class="pvm phs sbSettingsListLink clearfix" data-onclick="[[&quot;SettingsController&quot;,&quot;handleLinkClick&quot;]]" href="/settings?tab=privacy&amp;section=search" data-a_id="privacy_settings" data-a_load=\'$(thisv).parents(".sbSettingsListItem").eq(0).find(".content").eq(0);\' data-p_nogo="t" fjax="/ajax/settings/granular_privacy/search.php" rel="async"><span style="padding-left: 23px;" class="uiIconText sbSettingsListItemEdit"><i class="img lapiz_settings" style="top: -2px;"></i>Edit</span><span class="sbSettingsListItemSaved hidden_sb">Changes saved</span><span class="sbSettingsListItemContent fcg"><div class="_nll">Do you want other search engines to link to your wall?</div><div class="saved_data _nlm fwb">'.$privacy["listtext"].'</div></span></a><div class="content">';


if(isset($_GET['section']) && $_GET['section']=="search"){
include("ajax/settings/granular_privacy/search.php");	
$echo.=$secho;
}



$echo.='</div></li></ul></div></div></li></ul></div>';

$echo.='</div>';

}
else{
include("settingsd/account.php");
}


$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['left_column_id']="settings";

$params['left_column']='<ul class="uiSideNav sbSettingsNavigation" style="margin-right:-1px;"><li class="sideNavItem stat_elem" id="navItem_account"><div class="buttonWrap"></div><a class="item clearfix" href="/settings?tab=account"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><i class="img tuercassp"></i></span><div class="linkWrap noCount">General&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li><li class="divider" id="u_0_1"></li><li class="sideNavItem stat_elem" id="navItem_privacy"><div class="buttonWrap"></div><a class="item clearfix" href="/settings?tab=privacy"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><i class="img privacysp"></i></span><div class="linkWrap noCount">Privacy&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li></ul>';

if(isset($_GET['tab']) && $_GET['tab']=="privacy"){
$echo.='
<script type="text/javascript">
if(_cuhclick===undefined){
var _cuhclick="t";
$(document).on("click","._cuh",function(){
$(this).parents(".openPanel").eq(0).find(".content").addClass("hidden_sb");
$(this).parents(".openPanel").eq(0).removeClass("openPanel");
$(this).after(\'<a class="hidden_sb" href="/settings?tab=privacy&view" data-p_nogo="t"></a>\');
$(this).next("a").click();
if($(this).hasClass("future_posts")===true || $(this).hasClass("findcontact")===true){
var ok=$(this).parents(".sbSettingsListItem").eq(0).find(".uiButtonText").eq(0).html();
$(this).parents(".sbSettingsListItem").eq(0).find(".saved_data:first").html(ok);
}


if($(this).hasClass("privacysearch")===true){
var ok=$(this).parents(".sbSettingsList").eq(0).find(".input_box").find("input[type=checkbox]").is(":checked");
if(ok===true){var nok="On";} else{var nok="Off";}
$(this).parents(".sbSettingsListItem").eq(0).find(".saved_data").html(nok);
}


$(this).parents(".openPanel").eq(0).find(".content").html("");
});

}

$(".uiSideNav").find("#navItem_privacy").addClass("open");
$(".uiSideNav").find("#navItem_privacy").addClass("selectedItem");
</script>
';	
}
else{
$echo.='
<script type="text/javascript">
$(".uiSideNav").find("#navItem_account").addClass("open");
$(".uiSideNav").find("#navItem_account").addClass("selectedItem");
</script>
';	
}

$params["body_class"]="scroll";
$params['layout']='left_column_n';



include("end.php");
?>