<?php
include("start.php");

$body='<div class="sbPrivacyCustomControl"><div class="pvm phl explainTags" id="u_ak_4"><div class="uiHeader uiHeaderWithImage uiHeaderMiddleBorder"><div class="clearfix uiHeaderTop"><div><h4 class="uiHeaderTitle"><i class="uiHeaderImage img greencheck"></i>Share this with</h4></div></div></div><table class="uiInfoTable fbPrivacyCustomControl noBorder" role="presentation"><tbody><tr class="dataRow"><th class="label">These people or lists:</th><td class="data"><select data-onchange="custom_privacy_change" class="" name="friends_value" id="u_ak_2"><option value="50" class="expandTag">Friends of Friends</option><option value="40" selected="1" class="expandTag">Friends</option><option value="30" class="showInclusions">Specific People or Lists...</option><option value="10" class="hideExclusionUnit">Only Me</option></select><div class="mtm"><div class="clearfix uiTokenizer uiInlineTokenizer hidden_sb" onclick=\\\'$("#tagcustom_privacy").focus();\\\' id="u_ak_8"><div class="tokenarea " id="u_ak_7"></div><div class="uiTypeahead" id="u_ak_9" style="width:100%;"><div class="wrap" style="width:100%;"><input autocomplete="off" class="hiddenInput" type="hidden"><div class="innerWrap" style="width:100%;overflow:visible;"><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;" class="inputtext displaynoneimportant" data-ac_enable="custom_privacy" data-ac_liwidth="198" data-ac_inputw="218" data-ac_url="/autocomplete/jump_note.php?friends=t&location=t&list=t" data-ac_style="with_pic" data-ac_placeholder=""></div></div></div></div></div></div></td></tr><tr class="expandCheckbox"><th class="label">Friends of those tagged:</th><td class="data"><ul><li><div class="uiInputLabel clearfix"><input name="enable_tag_expansion" value="1" checked="1" class="uiInputLabelCheckbox" id="u_ak_a" type="checkbox"><label for="u_ak_a"></label></div></li></ul></td></tr><tr class="dataRow"><th class="label noLabel"></th><td class="data"><div class="pvs prs fsm fwn fcg"><span class="noExpandNotice">Note: Anyone tagged can also see this post.</span></div></td></tr></tbody></table><div id="u_ak_5"><div class="uiHeader uiHeaderWithImage uiHeaderMiddleBorder"><div class="clearfix uiHeaderTop"><div><h4 class="uiHeaderTitle"><img class="uiHeaderImage img" src="/images/e9MKv7IClnn.gif" alt="" height="11" width="11">Don\\\'t share this with</h4></div></div></div><table class="uiInfoTable fbPrivacyCustomControl noBorder" role="presentation"><tbody><tr class="dataRow"><th class="label">These people or lists:</th><td class="data"><div class="clearfix uiTokenizer uiInlineTokenizer" onclick=\\\'$("#tagcustom_privacyh").focus();\\\' style="width:100%;" id="u_ak_d"><div class="tokenarea " id="u_ak_c"></div><div class="uiTypeahead" id="u_ak_e" style="width:100%;"><div class="wrap"><input autocomplete="off" class="hiddenInput" type="hidden"><div class="innerWrap" style="width:100%;overflow:visible;"><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;" class="inputtext displaynoneimportant" data-ac_enable="custom_privacyh" data-ac_custom_f="privacy_tags_remove_hidden" data-ac_liwidth="198" data-ac_inputw="218" data-ac_url="/autocomplete/jump_note.php?friends=t&location=t&list=t" data-ac_style="with_pic" data-ac_placeholder=""></div></div></div></div></div></td></tr><tr class="dataRow"><th class="label noLabel"></th><td class="data"><div class="pvs prs hidden_sb fsm fwn fcg" id="u_ak_3">Upfrev never reveals when you choose not to share a post with somebody.</div></td></tr></tbody></table></div></div><input autocomplete="off" name="option_id" value="u_9t_9" type="hidden"><input autocomplete="off" name="fbid" value="0" type="hidden"><input autocomplete="off" name="source" value="" type="hidden"></div><input type="hidden" autocomplete="off" name="tagsidsh"><input type="hidden" autocomplete="off" name="tagsnamesh"><input type="hidden" autocomplete="off" name="tagsidshv"><input type="hidden" autocomplete="off" name="tagsnameshv">';


echo'
<script type="text/javascript">
$("#d_container_'.$mid.$uid.'").prepend(\'<div class="hidden_sb custom_privacy"></div>\');

$("#d_title_'.$mid.$uid.'").html("Custom Privacy");
$("#d_body_'.$mid.$uid.'").html(\''.$body.'\');';


echo'
var privacy="'.$privacy.'";
var privacyh="'.$privacyh.'";

var path=$("#d_body_'.$mid.$uid.'");

if(privacy==1){
$(path).find("select[name=friends_value]").val("40");
}
else if(privacy==4){
$(path).find("select[name=friends_value]").val("50");
}
else if(privacy==2){
$(path).find("select[name=friends_value]").val("10");
}
else if(privacy==0){
$(path).find("select[name=friends_value]").val("50");
}
else{
$(path).find("select[name=friends_value]").val("30");
}
$(path).find("select[name=friends_value]").trigger("change");


';	






if(!isset($ptagsids)){ //ok lists
$ptagsids="";
$ptagsnames="";	
}
echo'
$(path).find("input[name=tagsidsh]").val("'.$ptagsids.'");
$(path).find("input[name=tagsnamesh]").val("'.$ptagsnames.'");
';


if(!isset($ptagsidsv)){ //not ok lists
$ptagsidsv="";
$ptagsnamesv="";	
}
echo'
$(path).find("input[name=tagsidshv]").val("'.$ptagsidsv.'");
$(path).find("input[name=tagsnameshv]").val("'.$ptagsnamesv.'");

var tocheck="'.$ptagsidsv.'";
if(tocheck!=""){
$("#u_ak_3").removeClass("hidden_sb");
}
';



echo'

$("#d_container_'.$mid.$uid.'").css("opacity","0");


$("#d_container_'.$mid.$uid.'").css("display","block");



$("#d_button_confirm_'.$mid.$uid.'").val("Save Changes");

if(save_custom_privacy===undefined){

function privacy_tags_remove_hidden(){
$("#u_ak_3").removeClass("hidden_sb");
}

function load_privacy_tags(e){

var suf="custom_privacy";
e.preventDefault();
e.stopPropagation();

var tagsidsh=$(path).find("input[name=tagsidsh]").val();
var tagsnamesh=$(path).find("input[name=tagsnamesh]").val();

$("#tags"+suf).val(tagsidsh);
$("#tags"+suf+"v").val(tagsnamesh);

renewvv_mt("",suf);
return false;
	
}

var psuf="custom_privacy";
$("body").on("click","#tag_l"+psuf,load_privacy_tags);


function load_privacy_tagsv(e){

var suf="custom_privacyh";
e.preventDefault();
e.stopPropagation();

var tagsidshv=$(path).find("input[name=tagsidshv]").val();
var tagsnameshv=$(path).find("input[name=tagsnameshv]").val();

$("#tags"+suf).val(tagsidshv);
$("#tags"+suf+"v").val(tagsnameshv);

renewvv_mt("",suf);
return false;
	
}

var psuf="custom_privacyh";
$("body").on("click","#tag_l"+psuf,load_privacy_tagsv);


var save_custom_privacy=function(){
var dval=$(this).parents(".pop_container3").eq(0).find("select[name=friends_value]").val();
if(dval==50){
dval=4;	
}
else if(dval==40){
dval=1;	
}
else if(dval==30){
var dvalv=$(this).parents(".pop_container3").eq(0).find("#u_ak_9").find("input[name=tags]").val();
if(dvalv!=""){
dval=dvalv;
}
else{
dval=2;	//here set to only me if specific but nothing entered..
}
}
else if(dval==10){
dval=2;	
}

var did=$(this).parents(".pop_container3").eq(0).attr("data-opener");


if(dval==2){
$(this).parents(".pop_container3").eq(0).find("#u_ak_5").find("input[name=tags]").val("");
$(this).parents(".pop_container3").eq(0).find("#u_ak_5").find("input[name=tagsv]").val("");
}


var dvalv=$(this).parents(".pop_container3").eq(0).find("#u_ak_5").find("input[name=tags]").val();
if(dvalv!=""){
dvalv=dvalv.substr(1);
}
$("#"+did).parents("ul").eq(1).find("input[name=privacyh]").val(dvalv);



var mgclick="";
if(dvalv!=""){
mgclick="t";
}
else{

if(strpos(dval,",")!==false){
mgclick="t";
}
else if(dval==4){
mgclick="t";
}


if(dval==1){
$("#"+did).parents("ul").eq(1).find("a[data-privacy=1]").click();
}
else if(dval==2){
$("#"+did).parents("ul").eq(1).find("a[data-privacy=2]").click();
}
else if(dval==0){
$("#"+did).parents("ul").eq(1).find("a[data-privacy=0]").click();
}

	
}


if(strpos(dval,",")!==false){
var dval=dval.substr(1);	
}

$("#"+did).parents("ul").eq(1).find("input[name=privacy]").val(dval);


if(mgclick=="t"){ 
$("#"+did).parents("ul").eq(1).find(".custom_privacy").click();
} 




var empty_boxes="t";

var privacy_configuration=$("#"+did).parents("ul").eq(1).find("li:first").attr("data-pconfig");

if(mgclick=="t"){
if(dval==4){
if(privacy_configuration=="big"){
var dtags="Friends of Friends";	
}
else{ //for "small" privacy buttons
var dtags="Your friends of friends";	
}
}
else if(dval==1){
var dtags="Friends";	
}
else if(dval==0){
var dtags="Public";	
}
else{
var dtags=$("#u_ak_9").find("input[name=tagsv]").val();
if(strpos(dtags,",")!==false){
dtags=dtags.substr(1);	
}
dtags=dtags.replace(/,/g, ", ");
var empty_boxes="f";
}


var dtagsv=$("#u_ak_5").find("input[name=tagsv]").val();

if(strpos(dtagsv,",")!==false){
dtagsv=dtagsv.substr(1);	
}
dtagsv=dtagsv.replace(/,/g, ", ");

var final=dtags;
if(dtagsv.length>0){
final+="; Except: "+dtagsv;
}



$("#"+did).parents("ul").eq(1).find(".tooltip_text").html(final);

} //finish if mgclick





if(empty_boxes=="t"){
$("#u_ak_9").find("input[name=tags]").val("");	
$("#u_ak_9").find("input[name=tagsv]").val("");	
}

if(dval==2){
$("#u_ak_5").find("input[name=tags]").val("");	
$("#u_ak_5").find("input[name=tagsv]").val("");	
}



var tags=$("#u_ak_9").find("input[name=tags]").clone();
$(tags).attr("name","ptagsids");
$(tags).removeAttr("id");

$("#"+did).parents("ul").eq(1).find("input[name=ptagsids]").remove();
$("#"+did).parents("ul").eq(1).find("input[name=extra_param]").before($(tags));


var tagsv=$("#u_ak_9").find("input[name=tagsv]").clone();
$(tagsv).attr("name","ptagsnames");
$(tagsv).removeAttr("id");

$("#"+did).parents("ul").eq(1).find("input[name=ptagsnames]").remove();
$("#"+did).parents("ul").eq(1).find("input[name=extra_param]").before($(tagsv));


var tags=$("#u_ak_5").find("input[name=tags]").clone();
$(tags).attr("name","ptagsidsv");
$(tags).removeAttr("id");

$("#"+did).parents("ul").eq(1).find("input[name=ptagsidsv]").remove();
$("#"+did).parents("ul").eq(1).find("input[name=extra_param]").before($(tags));

var tagsv=$("#u_ak_5").find("input[name=tagsv]").clone();
$(tagsv).attr("name","ptagsnamesv");
$(tagsv).removeAttr("id");

$("#"+did).parents("ul").eq(1).find("input[name=ptagsnamesv]").remove();
$("#"+did).parents("ul").eq(1).find("input[name=extra_param]").before($(tagsv));


if(mgclick=="t"){
$("#"+did).parents("ul").eq(1).find(".custom_privacy_option").addClass("custom_privacy_optionb");
$("#"+did).parents("ul").eq(1).find(".custom_privacy_option").removeClass("custom_privacy_option");

$("#"+did).parents("ul").eq(1).find(".custom_privacy_optionb").click();

$("#"+did).parents("ul").eq(1).find(".custom_privacy_optionb").addClass("custom_privacy_option");
$("#"+did).parents("ul").eq(1).find(".custom_privacy_option").removeClass("custom_privacy_optionb");
}


$(this).parents(".white_overlay").eq(0).fadeOut("slow",function(){
var dialogid=$("#"+did).attr("data-dialogid");
remove_dialog(dialogid);	
});



} //function end





} //finish if is not defined


$("#d_body_'.$mid.$uid.'").find("div[data-ac_enable]").click();


$("#d_label_confirm_'.$mid.$uid.'").unbind("click",save_custom_privacy);
$("#d_label_confirm_'.$mid.$uid.'").bind("click",save_custom_privacy);

$("#d_label_confirm_'.$mid.$uid.'").css("display","inline-block");
$("#d_label_cancel_'.$mid.$uid.'").css("display","inline-block");



$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("opacity","1");

$("#d_container_'.$mid.$uid.'").parent().eq(0).wrap(\'<div id="d_overlay_'.$mid.$uid.'" class="white_overlay"></div>\');

</script>';

include("end.php");
?>