<?php
$secho.='<script type="text/javascript">
$("._cuh:not(.'.$dclass.')").each(function(){
$(this).parents(".openPanel").eq(0).find(".content").addClass("hidden_sb");
$(this).parents(".openPanel").eq(0).removeClass("openPanel");

if($(this).hasClass("future_posts")===true || $(this).hasClass("findcontact")===true){
var ok=$(this).parents(".sbSettingsListItem").eq(0).find(".uiButtonText").eq(0).html();
$(this).parents(".sbSettingsList").eq(0).find(".saved_data:first").html(ok);
}

if($(this).hasClass("privacysearch")===true){
var ok=$(this).parents(".sbSettingsListItem").eq(0).find(".input_box").find("input[type=checkbox]").is(":checked");
if(ok===true){
var nok="On";	
}
else{
var nok="Off";	
}

$(this).parents(".sbSettingsList").eq(0).find(".saved_data").html(nok);

}

$(this).parents(".openPanel").eq(0).find(".content").html("");	
});
</script>';
?>