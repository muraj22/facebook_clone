<?php
$sechov='
$(document).on("click",".dialog_remover",function(){//alert(1);
var dremove=$(this).parents(".pop_container3").eq(0).attr("dialogid");
remove_dialog(dremove);
});


$("input:text,textarea").attr("autocomplete","off");

$(document).on("focus","input:text[autocomplete!=off],textarea[autocomplete!=off]",function(){
$(this).attr("autocomplete","off");	
});


$(".ego_unit").hover(function(){$(this).find(".uiCloseButton").css("opacity","1");},function(){$(this).find(".uiCloseButton").css("opacity","0");});




$("a[data-tooltip]").each(function(){
$(this).click(function(){$(this).next(".tooltip").css("display","none");});
$(this).hover(function(){$(this).next(".tooltip").css("display","block");},function(){$(this).next(".tooltip").css("display","none");});	
});

function uiautogrow(w){
var maxh=$("#"+w).css("max-height"); 
if(maxh=="none"){
maxh="10000px";
}
var exists=$("#commentidm"+w).length;
var smw=$("#"+w).css("width");
var smh=$("#"+w).css("height");
if(exists=="0"){
$(\'#\'+w).after(\'<div id="commentidm\'+w+\'" class="writeacommentm_uiautogrow"></div>\');
smw=smw.replace("px","");
smw=parseInt(smw);
smw=smw-11;
smh=parseInt(smh);
smh=smh-6;
$("#commentidm"+w).css("width",smw);
$("#commentidm"+w).css("min-height",smh);
$("#commentidm"+w).css("height","auto");
$("#commentidm"+w).css("max-height",maxh);
}
var wval=$("#"+w).val();
wval=wval.replace(/\n/g, \'<br>&nbsp;&nbsp;&nbsp;&nbsp;\');
$("#commentidm"+w).html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+wval);
var hh=$("#commentidm"+w).innerHeight();

maxh=maxh.replace("px","");
maxh=parseInt(maxh);  
if(hh>=maxh){
$("#"+w).css("overflow-y","visible");
}
else{
$("#"+w).css("overflow-y","hidden");	
}
$("#"+w).css("height",hh);
}


$("body").on("keydown",".uiautogrow",uiautogrowh);
$("body").on("keyup",".uiautogrow",uiautogrowh);

function is_msg_empty(org_elem){
var dialogid=$(org_elem).attr("data-dialogid");
var isfunds=$("#d_container_"+dialogid+"'.$uid.'").find("input[name=fundsv]").length;

var msg=$("#d_container_"+dialogid+"'.$uid.'").find("textarea[name=message]").val();
msg=$.trim(msg);
var tags=$("#d_container_"+dialogid+"'.$uid.'").find("input[name=tags]").val();
tags=$.trim(tags);

if(isfunds>0){
if(tags.length==0){
return false;
}	
}
else{
if(msg.length==0 || tags.length==0){
return false;
}
}

$("#d_container_"+dialogid+"'.$uid.'").find("textarea[name=message]").attr("disabled",true);
$("#d_button_confirm_"+dialogid+"'.$uid.'").attr("disabled",true);
$("#d_label_confirm_"+dialogid+"'.$uid.'").addClass("uiButtonDisabled");

return true;
}

//the following function is custom just for messages - not a global to use function
function set_msg_response(response,org_elem){
//org_elem en este caso es un copy de confirm ajaxified
var dialogid=$(org_elem).attr("data-dialogid");
var did="dialog_trigger"+retcount();
var isfunds=$(org_elem).parents(".pop_container3").eq(0).find("input[name=fundsv]").length;
if(isfunds>0){
$("body").append(\'<div id="\'+did+\'" data-d_width="447" data-d_autoclose="t" data-d_nofooter="t" data-d_title="Transaction Completed" class="displaydialog hidden_sb"></div><div class="dialog_msgs">Transaction completed succesfully.</div>\');
}
else{
$("body").append(\'<div id="\'+did+\'" data-d_width="447" data-d_autoclose="t" data-d_nofooter="t" data-d_title="Message Sent" class="displaydialog hidden_sb"></div><div class="dialog_msgs">Your message was succesfully sent.</div>\');
}
remove_dialog(dialogid);
$("#"+did).click();

}

function select_uidv_ac(suf,ac_url,ac_justone,custom_func,final_custom_func,uidv,fullname){
var ui=false;
var event=false;
select_one_ac(event,ui,suf,ac_url,ac_justone,custom_func,final_custom_func,false,uidv,fullname);
}

function remove_dialog(dialogid){
$("#d_container_"+dialogid+"'.$uid.'").find("[data-t_f]").mouseleave();

$("#d_label_confirm_"+dialogid+"'.$uid.'_copy").remove(); //could be placed elsewhere

$("#d_container_"+dialogid+"'.$uid.'").css("display","none");
$("#d_container_"+dialogid+"'.$uid.'").parents(".clone_container_wrapper").eq(0).css("display","none");
$("#d_container_"+dialogid+"'.$uid.'").parents(".clone_container_wrapper").eq(0).remove();

$("#loading_d_"+dialogid+"'.$uid.'").css("display","none");
$("#loading_d_"+dialogid+"'.$uid.'").parents(".clone_loading_wrapper").eq(0).css("display","none");
$("#loading_d_"+dialogid+"'.$uid.'").parents(".clone_loading_wrapper").eq(0).remove();

$("#d_overlay_"+dialogid+"'.$uid.'").css("display","none");
$("#d_overlay_"+dialogid+"'.$uid.'").remove();	

}

function remove_dialog_ajax(response,org_elem){
var dialogid=$(org_elem).attr("data-dialogid");
$(org_elem).parents(".pop_container3").fadeOut("slow",function(){
remove_dialog(dialogid);
});
}

function set_dialog_identity(dialogid,specific){
if(specific===undefined){
specific="";	
}

$("#d_container_"+dialogid+"'.$uid.'").attr("dialogid",dialogid);
$("#d_container_"+dialogid+"'.$uid.'").addClass(specific);

$("#loading_d_"+dialogid+"'.$uid.'").attr("dialogid",dialogid);
$("#loading_d_"+dialogid+"'.$uid.'").addClass(specific);

$("#d_overlay_"+dialogid+"'.$uid.'").attr("dialogid",dialogid);	
$("#d_overlay_"+dialogid+"'.$uid.'").addClass(specific);	
}

function msg_response(response,org_elem){
if(response=="e"){
$(".msg_dialog").each(function(){
remove_dialog($(this).attr("data-dialogid"));
});
return false;
}

var dialogid=$(org_elem).attr("data-dialogid");
$("#loading_d_"+dialogid+"'.$uid.'").css("display","none");
if($(org_elem).attr("d_l_wrap")!==undefined){//alert(13);
$("#d_container_"+dialogid+"'.$uid.'").parent().wrap(\'<div id="d_overlay_\'+dialogid+\''.$uid.'" class="white_overlay"></div>\');
}
$("#d_container_"+dialogid+"'.$uid.'").css("display","block");


$("#d_body_"+dialogid+"'.$uid.'").html(response);
$("#d_body_"+dialogid+"'.$uid.'").find("textarea").focus();

$("#d_body_"+dialogid+"'.$uid.'").find("[data-ac_enable]").click();
//any existing tags input gets initialized

}

function dialog_response(response,org_elem){
var dopener=$(org_elem).data("dopener");
$(dopener).parents(".tiptip_holder").find(".ttclose").click();
$("#ajax_container").append(response);
}


$(document).on("click",".displaydialog,[rel=dialog]",function(e){
e.preventDefault();
var stop=true;
//funca a la inversa :)

if($(this).data("is-composer")=="t" && $(this).data("is-transfer")===undefined){
var uidv=$(this).data("uidv");
stop=start_chat(uidv);
}

if(!stop){
$(this).parents(".tiptip_holder").css("display","none");
return false;
}

if($(this).attr("id")===undefined){
var w=retcount(3);
$(this).attr("id",w);	
}

var l=$(".pop_container3[data-opener="+$(this).attr("id")+"]").length;
if(l==0){
var w=retcount(3);	
clone_dialog(w,\''.$uid.'\');

var thisv=$(this);

$(this).attr("data-dialogid",w);

$("#d_container_"+w+"'.$uid.'").attr("data-opener",$(this).attr("id"));

if($(this).data("d_startf")!==undefined){
window[$(this).data("d_startf")]();	
}

var dtitle=$(this).data("d_title");

var dwidth=$(this).data("d_width");
if(dwidth===undefined){dwidth=467;}

if($(this).data("d_nofooter")=="t"){
$("#d_body_"+w+"'.$uid.'").css("border-bottom","1px solid #555555");
$("#d_footer_"+w+"'.$uid.'").addClass("hidden_sb");
}


var dialogid=w;
if($(this).data("d_specific")!==undefined){
set_dialog_identity(dialogid,$(this).data("d_specific"));
}
else{
set_dialog_identity(dialogid);
}

$("#loading_d"+w+"'.$uid.'_parent").css("width",dwidth+"px");

$("#loading_d_"+w+"'.$uid.'").css("width",dwidth+"px").parent().css("width",dwidth+"px");

$("#d_container_"+w+"'.$uid.'").css("width",dwidth+"px").parent().css("width",dwidth+"px");

$("#d_title_"+w+"'.$uid.'").html(dtitle);

var dbody=$(this).next(".dialog_msgs").html();


$("#d_body_"+w+"'.$uid.'").html(dbody);

var dcancelc=$(this).data("d_cancel_class");
if(dcancelc===undefined){}
else{
$("#d_label_cancel_"+w+"'.$uid.'").css("margin-left","4px");
$("#d_label_cancel_"+w+"'.$uid.'").addClass("uiButtonConfirm");


$("#d_button_cancel_"+w+"'.$uid.'").addClass("uiButtonText");
}
var dcancel=$(this).data("d_cancel");

if(dcancel===undefined){
$("#d_label_cancel_"+w+"'.$uid.'").css("display","none");	
}
else{
$("#d_button_cancel_"+w+"'.$uid.'").val(dcancel);	
}

var dokay=$(this).data("d_okay");

if(dokay===undefined){
$("#d_label_confirm_"+w+"'.$uid.'").css("display","none");	
}
else{
$("#d_button_confirm_"+w+"'.$uid.'").val(dokay);	
}


var dcancelf=$(this).data("d_cancel_function");

if(dcancelf=="close_dialog" || dcancelf=="close_dialog_f"){
$("#d_label_cancel_"+w+"'.$uid.'").css("display","inline-block");
$("#d_label_cancel_"+w+"'.$uid.'").click(function(){

if(dcancelf=="close_dialog"){
remove_dialog(w);
}
else{
if($(thisv).attr("data-d_overlay")!==undefined){var tofade="d_overlay_"+w+"'.$uid.'";}
else{var tofade="d_container_"+w+"'.$uid.'";}
$("#"+tofade).fadeTo(400,0,function(){
remove_dialog(w);
});	
}

});
}

var dokayf=$(this).data("d_okay_function");

if($(this).data("d_okay_function")=="close_dialog_custom" || $(this).data("d_okay_function")=="custom" || $(this).data("d_isajax")!==undefined){
var dokayfc=$(this).data("d_okay_function_custom");

if(dokayfc=="fjax" || $(this).data("d_isajax")!==undefined){
var w_fjax=$(this).data("d_fjax");

var toappend=\'<div style="display:none;" id="d_label_confirm_\'+w+\''.$uid.'_copy" class="cerda" data-a_isclone="true"></div>\';
if($(thisv).attr("data-d_special_append")===undefined){
$("#d_container_"+w+"'.$uid.'").append(toappend);
}
else{
$(thisv).before(toappend);
}

$("#d_label_confirm_"+w+"'.$uid.'_copy").attr("fjax",w_fjax);

var fade_on_response=$(this).attr("data-d_okay_a_fade");
var custom_func=$(this).attr("data-a_custom_f");

if(custom_func!==undefined && fade_on_response!==undefined){
custom_func="remove_dialog_ajax,"+custom_func;	
}


$("#d_label_confirm_"+w+"'.$uid.'_copy").attr("data-dialogid",w);

$("#d_label_confirm_"+w+"'.$uid.'_copy").attr("data-a_custom_f",custom_func);

$.each( $(this).data(),function(k, v) {

if(k.lastIndexOf("a_", 0) === 0){
if(k!="a_custom_f"){
$("#d_label_confirm_"+w+"'.$uid.'_copy").attr("data-"+k,v);
}
}


});

$("#d_label_confirm_"+w+"'.$uid.'_copy").attr("data-dialogid",$(thisv).attr("data-dialogid"));

if($(this).data("d_isajax")!==undefined){
	if(strpos(w_fjax,"?")!==false){
	var que="";
	}
	else{
	var que="?";	
	}
	if(strpos(w_fjax,"=")!==false){
	var amp="&";	
	}
	else{var amp="";}
w_fjax=w_fjax+que+amp+\'mid=\'+w;
$("#d_label_confirm_"+w+"'.$uid.'_copy").attr("fjax",w_fjax);
}



}

if($(this).data("d_okay_function")=="close_dialog_custom"){
$("#d_label_confirm_"+w+"'.$uid.'").click(function(){

if($(thisv).data("d_video_upload")!==undefined){
var video_upload_name=$("#video_upload_name").val();

var popUp = window.open("/video/?video_form_upload", video_upload_name, "width=550, height=225, left=0, top=0, scrollbars,resizable");
popUp.focus();
upload_window_is_opened();

$("#d_container_"+w+"'.$uid.'").css("display","none");
}


if(dokayfc=="fjax"){$("#d_label_confirm_"+w+"'.$uid.'_copy").click();}
else{
$("#d_container_"+w+"'.$uid.'").fadeOut("slow",function(){
window[dokayfc]();
});	
}

});	

}
else if($(this).data("d_isajax")===undefined){
$("#d_label_confirm_"+w+"'.$uid.'").click(function(){	

if($(thisv).data("d_okay_function_custom2")!==undefined){

if($(thisv).data("d_okay_function_custom2")=="rewrite_dialog"){

var dtitle=$(thisv).data("d_title2");

$("#d_title_"+w+"'.$uid.'").html(dtitle);

var dbody=$(thisv).next(".dialog_msgs").next(".dialog_msgs").html();

$("#d_body_"+w+"'.$uid.'").html(dbody);

$("#d_footer_"+w+"'.$uid.'").remove();
	
}
	else{
window[data-d_okay_function_custom]();
	}
}

if(dokayfc=="fjax"){$("#d_label_confirm_"+w+"'.$uid.'_copy").click();}
else{window[dokayfc]();}
});	
}
}

if($(this).data("d_okay_function")=="close_dialog" || $(this).data("d_okay_function")=="close_dialog_nofade"){

if($(this).data("d_okay_function")=="close_dialog_nofade"){
var fadet=0;	
}
else{
var fadet=400;	
}

$("#d_label_confirm_"+w+"'.$uid.'").click(function(){

if($(thisv).attr("data-d_overlay")!==undefined){var tofade="d_overlay_"+w+"'.$uid.'";}
else{var tofade="d_container_"+w+"'.$uid.'";}

$("#"+tofade).fadeOut(fadet,function(){
remove_dialog(w);
});	


});	

}




if($(this).data("d_leave_loading")!==undefined || $(this).data("d_isajax")!==undefined){
if($(this).data("d_leave_loading")=="show_loading" || $(this).data("d_leave_loading")=="show_loading_timeout" || $(this).data("d_isajax")!==undefined){
$("#d_container_"+w+"'.$uid.'").css("display","none");
if($(this).data("d_no_loading")===undefined){
$("#loading_d_"+w+"'.$uid.'").css("display","block");
}
}
else{
$("#loading_d_"+w+"'.$uid.'").css("display","none");
$("#d_container_"+w+"'.$uid.'").css("display","block");	
}
}
else{
$("#loading_d_"+w+"'.$uid.'").css("display","none");
$("#d_container_"+w+"'.$uid.'").css("display","block");
}

if($(this).data("d_exec_on_end")!==undefined){
window[$(this).data("d_exec_on_end")]();
}

if($(this).data("d_overlay")=="white_create" && $(this).data("d_leave_loading")===undefined){
$("#d_container_"+w+"'.$uid.'").parent().wrap(\'<div id="d_overlay_\'+w+\''.$uid.'" class="white_overlay"></div>\');
}



if($(this).data("d_leave_loading")=="show_loading_timeout"){
$.doTimeout(250,function(){
$("#loading_d_"+w+"'.$uid.'").css("display","none");
if($(thisv).data("d_overlay")=="white_create"){//alert(12);
$("#d_container_"+w+"'.$uid.'").parent().wrap(\'<div id="d_overlay_\'+w+\''.$uid.'" class="white_overlay"></div>\');
}
$("#d_container_"+w+"'.$uid.'").css("display","block");
});

}

if($(this).data("d_isajax")!==undefined){
$("#d_label_confirm_"+w+"'.$uid.'_copy").click();	
}


}



if($(this).attr("data-d_l_fjax")!==undefined){
var dialogid=$(this).attr("data-dialogid");
var duidv=$(this).attr("data-uidv");
//data dialog load fjax
var dialog_fjax=$(this).attr("data-d_l_fjax");

if($(this).attr("data-d_l_a_custom_f")!==undefined){
var custom_f=$(this).attr("data-d_l_a_custom_f")+",dialog_response";
}
else{
custom_f="dialog_response";
}

if(strpos(dialog_fjax,"?")===false){
dialog_fjax=dialog_fjax+"?mid="+dialogid;
}
else if(strpos(dialog_fjax,"&")===false){
dialog_fjax=dialog_fjax+"&mid="+dialogid;
}


$("#loading_d_"+dialogid+"'.$uid.'").prepend(\'<a style="display:none;" data-dialogid="\'+dialogid+\'" id="ajax_\'+dialogid+\'" fjax="\'+dialog_fjax+\'"></a>\');

$.each( $(this).data(),function(k, v) {

if(k.lastIndexOf("d_l_a_", 0) === 0){
k=k.replace("d_l_","");
if(k!="a_custom_f"){
$("#ajax_"+dialogid).attr("data-"+k,v);
}
}

});

$("#ajax_"+dialogid).attr("data-a_custom_f",custom_f);	

if($(this).data("dil_a_id")!==undefined){
$("#ajax_"+dialogid).attr("data-a_id",$(this).data("dil_a_id"));
//here perform loop instead to grab all propertis of dil_a just like d_a above
}
$("#ajax_"+dialogid).data("dopener",$(this));
$("#ajax_"+dialogid).click();
//en algun momento va a ver que tener que separar entre los que abren el dialogo via ajax y los que hacen confirm via confirm button en ajax
}

if($(this).data("d_autoclose")=="t"){

$.doTimeout(700,function(){
$("#d_container_"+w+"'.$uid.'").fadeOut("slow",function(){
remove_dialog(w);
});
});


}

});

$(document).ready(function(){


$(".ui-autocomplete-input").off("blur").on("blur", function() {
		$.doTimeout(0,function(){
        if(hasFocus()) {
            $("ul.ui-autocomplete").hide();
        }
		});
    });
});

';

if($uid!=""){ //check on forgotten password enter sent key page

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$r=mysql_query("SELECT  * FROM options WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$stimezone=$m['original_user_timezone'];
$sdaylight=$m['user_timezone_daylight'];
}

$c=mysql_num_rows($r);


$sechov.='

var sdaylight="'.$sdaylight.'";

var stimezone="'.$stimezone.'";
var atimezone=new Date().getTimezoneOffset()/60*-1;

Date.prototype.stdTimezoneOffset = function() {
    var jan = new Date(this.getFullYear(), 0, 1);
    var jul = new Date(this.getFullYear(), 6, 1);
    return Math.max(jan.getTimezoneOffset(), jul.getTimezoneOffset());
}

Date.prototype.dst = function() {
    return this.getTimezoneOffset() < this.stdTimezoneOffset();
}

var today=new Date();
if (today.dst()) {
var daylight="1";
}
else{
var daylight="0";
}




if(stimezone!=atimezone || sdaylight!=daylight){
$(document).ready(function(){
$("body").append(\'<div style="display:none;" id="update_timezone" fjax="/update_timezone.php?timezone=\'+atimezone+\'&daylight=\'+daylight+\'"></div>\');	
$("#update_timezone").click();
});
}
';
}

$sechov.='
$(document).waitForImages({
    waitForAll: true,
    finished: function() {
   
    }  
});';
include("autocomplete.php");
?>