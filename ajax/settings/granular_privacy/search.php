<?php
include("start.php");
$secho="";




$secho.='<div class="formo_data hidden_sb">';
$uidv=$uid;
$sbid="";
$ltypev="robot_engine";

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

if($privacy["privacy"]==0){
$checked="checked";	
}else{$checked="";}
$secho.='<div class="_cue" id="u_0_5"><a class="robot_engine privacysearch _cuh" href="#">Close</a><div class="pvm _cug"><div class="mbm fwb">Do you want other search engines to link to your wall?</div><div class="mbm fcg">Please note:</div><ul class="uiList mvm plm _4of _4kg "><li><div class="fcg">When this setting is on, it is easier for other search engines to link to your wall in search results.</div></li><li><div class="fcg">If you turn off this setting, it may take a while for search engines to stop showing the link to your wall in their results.</div></li></ul><label class="mvm"><span id="privacy_public_search_input" class="input_box privacy_checkbox_loader"><span class="show_loading"><img class="img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></span><span class="hide_loading"><a class="hidden_sb" fjax="/ajax/privacy/simple_save.php?id=0" data-a_formo=\'$(this).parents(".sbSettingsListItem").eq(0).find(".formo_data").eq(0);\' data-a_custom_f="savedprivacyb" data-a_id="privacy_settings"></a><input name="search_filter_public" id="search_filter_public" value="'.$privacy["privacy"].'" type="checkbox" '.$checked.'><a class="displaydialog hidden_sb" data-d_isajax="t" data-d_cancel="Cancel" data-d_cancel_function="close_dialog_f" data-d_fjax="/ajax/settings/privacy/search_confirm.php"></a><a class="hidden_sb" fjax="/ajax/privacy/simple_save.php?id=2" data-a_formo=\'$(this).parents(".sbSettingsListItem").eq(0).find(".formo_data").eq(0);\' data-a_starts="checkdprivacy" data-a_custom_f="savedprivacy" data-a_id="privacy_settings"></a></span></span>Let other search engines link to your wall</label></div></div>';

$secho.='
<script type="text/javascript">
function checkdprivacy(org_elem){
$(org_elem).parents(".input_box").eq(0).addClass("showLoading");
}

function savedprivacy(response,org_elem){
$(org_elem).parents(".input_box").eq(0).find("input[type=checkbox]").attr("checked",false);
$(org_elem).parents(".input_box").eq(0).removeClass("showLoading");
}

function savedprivacyb(response,org_elem){
$(org_elem).parents(".input_box").eq(0).find("input[type=checkbox]").attr("checked",true);
$(org_elem).parents(".input_box").eq(0).removeClass("showLoading");
}

$("#search_filter_public").bind("click",function(){
if($(this).is(":checked")===true){
$(this).parents(".input_box").eq(0).addClass("showLoading");
$(this).prev("a").click();
}
else{
$(this).next("a").click();
return false;
}
});
</script>
';

$dclass="robot_engine";
include("privacy_close_config.php");


$secho.='
<script type="text/javascript">
$("#u_0_5").parents(".sbSettingsListItem").eq(0).addClass("openPanel");
</script>
';


if(!isset($_GET['section'])){
echo $secho;	
include("end.php");
}
?>