<?php
include("start.php");
$secho="";
$secho='<div class="_cue" id="u_8_5"><a class="findcontact _cuh" href="#">Close</a><div class="pvm _cug"><div class="mbm fwb">Who can look you up using the email address or phone number you provided?</div><div class="mbm fcg">This applies to people who can\'t already see your email address or phone number.</div>';


$secho.='<div class="formo_data hidden_sb">';
$uidv=$uid;
$sbid="";
$ltypev="email_search";

$peditable="t";

$nfjax="";
$data_t='';

$dclass="";

$use_edit_album="";

$privacy_configuration="big";
$privacy_source="wu"; //wall uploader

$extra_param="";

$shared_privacy="";


$privacy=get_privacy_button_params($uidv,$sbid,$ltypev,$extra_param,$shared_privacy,$privacy_configuration);

$secho.='
<input type="hidden" name="ptype" value="'.$ltypev.'" autocomplete="off"><input type="hidden" name="sbid" value="'.$sbid.'" autocomplete="off"><input type="hidden" name="privacy" value="'.$privacy["privacy"].'" autocomplete="off"><input type="hidden" name="privacyh" value="'.$privacy["privacyh"].'" autocomplete="off">

</div>
';


$secho.='
<div class="selector uiSelector inlineBlock audienceSelector audienceSelectorNoTruncate dynamicIconSelector uiSelectorRight uiSelectorNormal uiSelectorDynamicLabel uiSelectorDynamicTooltip hidden_sb" id="u_8_6"><div class="wrap"><a data-hover="tooltip" aria-label="Everyone" data-tooltip-alignh="right" class="uiSelectorButton uiButton find_contact" href="#" role="button" aria-haspopup="1" aria-expanded="false" data-t_reload="f" data-t_text="" data-label="" data-length="30" rel="toggle"><i class="mrs defaultIcon customimg img mundop"></i><span class="uiButtonText">Everyone</span></a><div class="hidden_sb tooltip_text">Everyone</div>


<div class="uiSelectorMenuWrapper uiToggleFlyout">
<div role="menu" class="uiMenu uiSelectorMenu">
<ul class="uiMenuInner">
<li class="uiMenuItem uiMenuItemRadio uiSelectorOption sbPrivacyAudienceSelectorOption checked" data-label="Everyone">
<a class="itemAnchor itemWithIcon" role="menuitemradio" tabindex="0" href="#" fjax="/ajax/privacy/simple_save.php?id=0" data-a_formo=\'$(this).parents(".audienceSelector").eq(0).prev(".formo_data").eq(0);\' data-privacy="0" data-tt="Everyone" aria-checked="true" rel="async-post" ajaxify="/simple_save.php"><i class="mrs itemIcon img mundop"></i><span class="itemLabel fsm">Everyone</span></a></li>
<li class="uiMenuItem uiMenuItemRadio uiSelectorOption sbPrivacyAudienceSelectorOption" data-label="Friends of Friends"><a class="itemAnchor itemWithIcon" role="menuitemradio" data-privacy="4" tabindex="-1" href="#" fjax="/ajax/privacy/simple_save.php?id=4" data-a_formo=\'$(this).parents(".audienceSelector").eq(0).prev(".formo_data").eq(0);\' data-tt="Friends of Friends" aria-checked="false" rel="async-post" ajaxify="simple_save.php"><i class="mrs itemIcon img friendsofsp"></i><span class="itemLabel fsm">Friends of Friends</span></a></li>
<li class="uiMenuItem uiMenuItemRadio uiSelectorOption sbPrivacyAudienceSelectorOption" data-label="Friends"><a class="itemAnchor itemWithIcon" role="menuitemradio" tabindex="-1" href="#" fjax="/ajax/privacy/simple_save.php?id=1" data-a_formo=\'$(this).parents(".audienceSelector").eq(0).prev(".formo_data").eq(0);\' data-privacy="1"  data-tt="Friends" aria-checked="false" rel="async-post" ajaxify="simple_save.php"><i class="mrs itemIcon img friendsp"></i><span class="itemLabel fsm">Friends</span></a></li>
<li class="uiMenuSeparator secondaryOption"></li>
</ul>

</div></div>



</div></div>


<script type="text/javascript">
var path=$("#u_8_5").find(".audienceSelector");
$(path).find("[data-privacy='.$privacy["privacy"].']").attr("data-nfjax","t");
$(path).find("[data-privacy='.$privacy["privacy"].']").click();
$(path).find("[data-privacy='.$privacy["privacy"].']").removeAttr("data-nfjax");
$(path).removeClass("hidden_sb");
</script>

';

$dclass="findcontact";
include("privacy_close_config.php");


$secho.='
<script type="text/javascript">
$("#u_8_5").parents(".sbSettingsListItem").eq(0).addClass("openPanel");
</script>
';

if(!isset($_GET['section'])){
echo $secho;	
include("end.php");
}
?>