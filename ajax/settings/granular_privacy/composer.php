<?php
include("start.php");
$secho="";
$secho.='<div class="_cue" id="u_7_0"><a class="future_posts _cuh" href="#">Close</a><div class="pvm _cug"><div class="mbm fwb">Who can see your future posts?</div><div class="mbm fcg">You can manage the privacy of things you share by using the audience selector <div class="lb" style="display:inline-block;"><a href="/?audience_usered=1">right where you post</a></div>. This control remembers your selection so future posts will be shared with the same audience unless you change it.</div><div class="_1pif"><div class="_1pig">What\'s on your mind?</div><div class="clearfix _1pih"><div class="lfloat"><i class="_1pii img masunotag_ps"></i><i class="_1pii img location_ps"></i><i class="_1pii img filter"></i></div><ul class="uiList _1dso rfloat _4ki clearfix _6-h _6-j _6-i"><li class="uiListItem">';


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

$secho.='<ul class="uiList 2ygv" style="position:relative;z-index:1;">';
$secho.= $button;
$secho.='</ul>';


$secho.='
<script type="text/javascript">
if(special_privacy_button_click===undefined){
var special_privacy_button_click="t";
$(document).on("click",".openPanel .custom_privacy, .openPanel .uiSelectorOption:not(.returnOption,.moreOption)",function(){
$("#settings-privacy-notice").removeClass("hidden_sb");	
});
}
</script>
';

$secho.='</li><li class="uiListItem"><label class="_11b uiButtonDisabled uiButton uiButtonConfirm" for="u_7_2"><input value="Post" disabled="1" id="u_7_2" type="submit"></label></li></ul></div><div class="_1pik"></div></div><div id="settings-privacy-notice" class="hidden_sb"><div class="mtm pam uiBoxYellow"><strong>Remember:</strong> This is the same setting you find <span class="lb"><a href="/?audience_usered=1">right where you post</a></span>, and by changing it here, you\'ve also updated it there.</div></div></div></div>';	

$dclass="future_posts";
include("privacy_close_config.php");

$secho.='
<script type="text/javascript">
$("#u_7_0").parents(".sbSettingsListItem").eq(0).addClass("openPanel");
</script>
';

if(!isset($_GET['section'])){
echo $secho;	
include("end.php");
}
?>