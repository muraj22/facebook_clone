<?php
include("start.php");
include("populate_page.php");
$rhelper_js='../';
$params['style']='';
?>
<?php
include("functions/grs.php");
$dk_upload=grs(25);
$dk_upload2=grs(25);


$echo.='
<div id="show_invalid_ext" class="displaydialog" style="display:none;" data-d_title="Invalid extension" data-d_okay="Okay" data-d_okay_function="close_dialog"></div>
<div class="dialog_msgs"><div id="dlist_invalid_ext">Sorry, that\'s not a video file that we support. We currently only support the following extensions:<ul class="square_bullets" style="padding-left: 30px;"><li><span style="color:#000"><strong>3g2</strong> (Mobile Video)</span></li><li><span style="color:#000"><strong>3gp</strong> (Mobile Video)</span></li><li><span style="color:#000"><strong>3gpp</strong> (Mobile Video)</span></li><li><span style="color:#000"><strong>asf</strong> (Windows Media Video)</span></li><li><span style="color:#000"><strong>avi</strong> (AVI Video)</span></li><li><span style="color:#000"><strong>dat</strong> (MPEG Video)</span></li><li><span style="color:#000"><strong>divx</strong> (DIVX Video)</span></li><li><span style="color:#000"><strong>dv</strong> (DV Video)</span></li><li><span style="color:#000"><strong>f4v</strong> (Flash Video)</span></li><li><span style="color:#000"><strong>flv</strong> (Flash Video)</span></li><li><span style="color:#000"><strong>m2ts</strong> (M2TS Video)</span></li><li><span style="color:#000"><strong>m4v</strong> (MPEG-4 Video)</span></li><li><span style="color:#000"><strong>mkv</strong> (Matroska Format)</span></li><li><span style="color:#000"><strong>mod</strong> (MOD Video)</span></li><li><span style="color:#000"><strong>mov</strong> (QuickTime Movie)</span></li><li><span style="color:#000"><strong>mp4</strong> (MPEG-4 Video)</span></li><li><span style="color:#000"><strong>mpe</strong> (MPEG Video)</span></li><li><span style="color:#000"><strong>mpeg</strong> (MPEG Video)</span></li><li><span style="color:#000"><strong>mpeg4</strong> (MPEG-4 Video)</span></li><li><span style="color:#000"><strong>mpg</strong> (MPEG Video)</span></li><li><span style="color:#000"><strong>mts</strong> (AVCHD Video)</span></li><li><span style="color:#000"><strong>nsv</strong> (Nullsoft Video)</span></li><li><span style="color:#000"><strong>ogm</strong> (Ogg Media Format)</span></li><li><span style="color:#000"><strong>ogv</strong> (Ogg Video Format)</span></li><li><span style="color:#000"><strong>qt</strong> (QuickTime Movie)</span></li><li><span style="color:#000"><strong>tod</strong> (TOD Video)</span></li><li><span style="color:#000"><strong>ts</strong> (MPEG Transport Stream)</span></li><li><span style="color:#000"><strong>vob</strong> (DVD Video)</span></li><li><span style="color:#000"><strong>wmv</strong> (Windows Media Video)</span></li></ul></div></div>';
if(isset($_GET['video_form_upload'])){
$echo.='<div id="el_holder"></div>';	
}
$echo.='<script type="text/javascript">';
if(isset($_GET['video_form_upload'])){
$params['style']='
<style type="text/css">
.body,#main_divg,#awrap{width:100%!important;}
#awrap{position:relative;right:0!important;margin-left:0!important;}
.header *{display:none!important;}
#header_buttons_wrapper{display:none!important;}
body{overflow:hidden;}
</style>
';
$echo.='
function video_dialog_resize(){
$("#ds_wrapper").children(":first").css("width","100%");
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
if(y>317){
$("#d_container_cancel_video_upload'.$uid.'").css("margin-top","125px");	
}
else{
$("#d_container_cancel_video_upload'.$uid.'").css("margin-top","40px");		
}
}

var resizeTimer_video_dialog;
$(window).resize(function() {
    clearTimeout(resizeTimer_video_dialog);
    resizeTimer_video_dialog = setTimeout(video_dialog_resize, 100);
});

$(".header").prepend(\'<img src="/images/logos.png" style="display:inline-block!important;position:fixed;left:5px;top:16px;">\');
var video_form_upload=true;


';
}else{
$echo.='
function video_dialog_resize(){return true;}
var video_form_upload=false;
';
}

$echo.='

var dance=false;

if(video_form_upload){
function track_progress(){

}
function video_upload_trigger(response){

updater_video_upload(response);
}

function whoa_video(){
						$("#wait_panel_wrapper").css("margin-top","27px");
						moved_panel=true;
						
$("#vidu_wrapper").before($("#wait_panel_wrapper"));
$("#wait_panel_wrapper").css("margin-top","0");
$("#upload_video_wrapper").html($("#whoa"));
$("#h2_please_wait").remove();
$("#whoa").css("display","inline-block");
$("#wait_panel_wrapper").css("display","block");	
}


$(document).ready(function(){

var has_changed=$("._2yg",window.opener.document).find(":file",window.opener.document).attr("data-has_changed");
if(has_changed=="f"){

whoa_video();

return false;	
}

window.onbeforeunload = function() { 
$("._2yg",window.opener.document).find(":file",window.opener.document).attr("data-has_changed","t");
}

$("._2yg",window.opener.document).find(":file",window.opener.document).attr("data-has_changed","f");

$("#cancel_video_upload_popup").val("1");
var adesc=$("._2yg",window.opener.document).find("input[name=descriptionv]",window.opener.document).val();
$("#desc_text").val(adesc);
var alocation=$("._2yg",window.opener.document).find("input[name=location]",window.opener.document).val();
$("#location").val(alocation);

$("#metadata").find("input[name=notify]").val("1");

var ok=$("._2yg",window.opener.document).clone();

$(ok).addClass("hidden_sb");
$("body").append($(ok));

var okv=$("._2yg",window.opener.document).find(":file");
var vid_clone=$(okv).clone();

$("._2yg").find(":file").remove();
$("._2yg").find("input[name=notify]").before($(okv));

$("._2yg").find("input[name=notify]").before($(okv));


$("._2yg",window.opener.document).find("input[name=notify]").before($(vid_clone));

var okv=$(ok).find("#composerTourAudience").parents("ul").eq(0).clone();
$("#vid_privacy").append($(okv));

$("#show_invalid_ext").before(\'<div data-u_trigger="t" data-u_form="._2yg" data-u_receiver="video/upload_receiver.php" data-u_progress="t" data-u_function="video_upload_trigger" data-u_starts="acas" data-u_disable="f" data-u_fails="whoa_video" class="displaynoneimportant" id="video_upload"></div>\');

$("#video_upload").click();	
window.opener.upload_window_is_openedv();

});
}

var moved_panel=false;

								var dk="'.$dk_upload.'";
								var dk2="'.$dk_upload2.'";
								
		                 function acas(params) {
				
							 
							 if(!params || params==""){
								var params="";
								dk="'.$dk_upload.'";
								dk2="'.$dk_upload2.'"; 
							 }
							 else{
							var paramsv=params.split(",");
							dk=paramsv[0];
							dk2=paramsv[1];
							$("#getprogressr").find("name[dk]").val(dk);
							$("#getprogressr").find("name[dk2]").val(dk2);
							$("#video_infow").css("display","none");
							 }
							 
						if(video_form_upload && !moved_panel){
						$("#vidu_wrapper").before($("#wait_panel_wrapper"));
						$("#wait_panel_wrapper").css("margin-top","27px");
						moved_panel=true;
						}
						
						$("#upload_action").css("display","none");
						$("#wait_panel_wrapper").css("display","block");
						$("#video_info").fadeIn("slow");
						
							 $.ajax({
  type: "POST",
  url: "/video/upload_progress.php",
  data: { dk:dk,dk2:dk2}}).done(
function(response) {
var res=response.split("{}");
var res1=res[0];
var res2=res[1]; 
var res3=res[2];
if(res3=="complete"){
$("#progress_datavv").html(res1);	
}
if(res1!="" && res2!=""){
if(res1!=""){
if(res3!="complete"){
$("#progress_data").html(res1);
$("#progress_datav").html(res1);
}
}
if(res2=="100"){dance=99;}
else{
var aupl=$("#dincr").val();
aupl=parseInt(aupl);
if(res2>aupl){
if(dance){if(res2==dance){}else{dance=res2;}}
else{dance=res2;}	
}
incr();
}
}
if(res3=="complete"){upload_video_complete();}
else{$.doTimeout(0,function(){acas(params);});}

});	     
if($("#upload_video_form").css("display")=="none"){
animate_pager();
}
                    }
				



     function animate_pager() {
				
$("#dk").val(dk);
$("#dk2").val(dk2);
						
						var count=retcount();
						
						count=count+"asd="+count;
						
						$("#getprogressr").attr("action","/video/blank.php?"+count);
						document.forms["getprogressr"].submit();
				
	           
                    }
					
				

function incr(){
if(dance){
	
var dincr=$("#dincr").val();
dincr=parseInt(dincr);
if(dincr<dance){
dincr=dincr+1;
$("#dincr").val(dincr);
}

if(dincr==100){
var reset_dincr=true;
}

if(dincr==100){
$("#video_upload_bar").css("border-right","1px solid #3b5998");	
}

$("#video_upload_bar").css("width",dincr+"%");

if(reset_dincr){
$("#dincr").val("0");
dance=false;	
$.doTimeout(100,function(){upload_video_complete();});
}
else{
if(dance==100){
dance=false;	
$.doTimeout(100,function(){upload_video_complete();});}
else{
$.doTimeout(50,function(){
incr();
});	
}
}
	
}
}';

$echo.='
function upload_video_complete(s){


var alreadysaved=$("#video_infow").css("display");

if(alreadysaved=="none"){
if(s){ //aca te redirecciona
if(video_form_upload){
$("#uploadready").val("3");	
$("#save_info_button").click();
}
else{
$("#uploadready").val("2");
$("#save_info_button").click();
}
}
}
else{
if(s){
$("#uploadready").val("1"); 
$("#save_info_button").click(); 
$("#uploadready").val("2");  
}

}
}

function upload_video_completef(){
$("#progress_data").html($("#progress_datavv").html());	
$("#progress_datav").html($("#progress_datavv").html());	

$("#video_upload_bar").css("width","100%");
$.doTimeout(50,function(){
$("#h2_please_wait").html("Upload Successful");
$("#upload_video_wrapper").html("After you finish editing your video data, click \\"Save Info\\" to continue.");
});
}

function upload_video_completefv(){
$("#progress_data").html($("#progress_datavv").html());	
$("#progress_datav").html($("#progress_datavv").html());	

$("#video_upload_bar").css("width","100%");
$.doTimeout(50,function(){
$("#h2_please_wait").remove();
$("#wait_panel_wrapper").css("margin-top","0");
$("#upload_video_wrapper").html($("#upload_video_form"));
$("#upload_video_form").css("display","inline-block");
});
}


function cancel_video_upload(){
window.location="/video/?upload&canceled";
}

function video_upload_close_popup_and_edit(){
var vidid=$("#videoid").val();	
window.opener.location="/video/editvideo.php?v="+vidid;

window.close();
}

function video_upload_close_popup_and_retry(){
window.opener.location="/video/?upload";
window.close();
}
</script>

<div id="whoa" style="display:none;">
<div class="mam pam uiBoxRed" style="margin-left:0;text-align:left;"><div class="mbs fsl fwb" id="upload_error">Something bad happened.</div><div id="upload_error_subtext">Sorry, we\'re having some technical difficulties with Video right now. Please try again.</div></div><div class="popup_buttons"><label class="uiButton uiButtonConfirm" for="ux8g62k1"><input value="Close and Try Again" onclick="video_upload_close_popup_and_retry()" id="ux8g62k1" type="submit"></label><label class="uiButton" for="ux8g62k2"><input value="Close" onclick="window.close()" id="ux8g62k2" type="submit"></label></div>
</div>

<div id="upload_video_form" style="display:none;">
<div class="mam pam uiBoxYellow" style="text-align:left;">
<div class="mbs fsl fwb">Upload Complete</div><div id="upload_popup_status">Your video has finished uploading. You will be notified when it has been processed. You can edit your video if you want to add a title or tag friends.</div>
</div>

<div class="popup_buttons">
<label class="uiButton uiButtonConfirm" for="unppomm2"><input value="Close and Edit Video" onclick="video_upload_close_popup_and_edit();" id="unppomm2" type="submit"></label><label class="uiButton" for="unppomm3"><input value="Close" onclick="window.close()" id="unppomm3" type="submit"></label>
</div>
</div>


<form name="getprogressr" id="getprogressr" action="" method="post" target="getprogressrv">
<input type="hidden" name="dk" id="dk" autocomplete="off">
<input type="hidden" name="dk2" id="dk2" autocomplete="off">
<input type="hidden" name="uploadready" id="uploadready" autocomplete="off">
<input type="hidden" id="vidso" name="vidso" autocomplete="off">
<input type="hidden" id="videoid" name="videoid" autocomplete="off">
</form>';

if(!isset($_GET['video_form_upload'])){
$echo.='
<script type="text/javascript">
$("#getprogressr").find("name[dk]").val(dk);
$("#getprogressr").find("name[dk2]").val(dk2);
</script>
';
}

$echo.='
<iframe src="/video/blank.php" style="display:none;" name="getprogressrv" id="getprogressrv"></iframe>

<input type="hidden" id="dincr" autocomplete="off">
<script type="text/javascript">
$("#dincr").val("0");
function updater_video_upload(response){ 
if(video_form_upload){
$("._2yg",window.opener.document).find(":file",window.opener.document).attr("data-has_changed","t");
}
var res=response.split(":");
$("#vidso").val(res[0]);
$("#videoid").val(res[1]); 
//alert(res[1]);
var dk=res[2];
var dk2=res[3];
$("#getprogressr").find("name[dk]").val(dk);
$("#getprogressr").find("name[dk2]").val(dk2);
upload_video_complete("s");
}
</script>
';

if(isset($_GET['video_form_upload'])){
$adis='none';	
}
else{
$adis='block';
}

$echo.='
<div style="width:760px;margin-top:6px;display:'.$adis.'" id="vidu_wrapper">
<div class="clearfix UIDashboardHeader_BottomMargin">
<div style="float:left;margin-right:6px;">
<i class="videocamera"></i>
</div>
<h2 class="uiHeaderTitle" style="font-size:14px;">Upload Video</h2>
</div>';
if(isset($_GET['canceled'])){
$echo.='
<div class="mvm mhl pam uiBoxYellow">
<h2>Your file upload has been canceled.</h2>
</div>
';	
}

$echo.='
<div style="padding: 0px;border-bottom: 1px solid rgb(204, 204, 204);margin-top:0px;" class="clearfix"><div style="float:left;margin-left:10px;"><ul style="text-align:center;margin-bottom:-1px;" class="toggle_tabs"><li class="first "><a class="selected_link" href="/video/?upload">File Upload</a></li>';

//<li class="last "><a href="/video/?record">Record Video</a></li>

$echo.='</ul></div></div>
<div class="upload_video_pane video_pane upload_video clearfix">
<div class="panel clearfix">
<form id="video_metadata_form" onsubmit="return " action="#" method="post">

<div id="wait_panel_wrapper" style="display:none;">
<div id="wait_panel" style="width:100%;">
<h2 id="h2_please_wait">Please wait while your video is uploading.</h2>
<div id="upload_video_wrapper">
<div style="width:auto;min-width:348px;height:20px;border:1px solid #a4a4a4;display:inline-block;text-align:left;margin:0 auto;position:relative;">
<span id="progress_data" style="color:#333333;position:absolute;z-index:1;left:4px;top:3px;"></span>
<div id="video_upload_bar" style="background:#6d84b4;height:20px;width:0%;overflow-x:hidden;z-index:2;display:inline-block;border:1px solid #3b5998;margin-top:-1px;margin-left:-1px;border-right:1px solid #6d84b4;">
<div id="progress_datav" style="color:#ffffff;position:relative;background:#6d84b4;z-index:2;max-width:100%;margin-left:4px;margin-top:3px;white-space:pre;display:inline-block;" aria-hidden="true"></div>
</div>
</div><a class="uiButton uiButtonConfirm displaydialog" data-d_okay="Cancel Upload" data-d_cancel="Don\'t Cancel" data-d_title="Cancel Upload" data-d_cancel_function="close_dialog" data-d_okay_function="close_dialog_custom" data-d_okay_function_custom="cancel_video_upload" data-d_cancel_class="blue" data-d_startf="video_dialog_resize" id="cancel_video_upload" href="#" role="button"><span class="uiButtonText" style="color:#ffffff;">Cancel</span></a><div class="dialog_msgs">Are you sure you want to cancel this video upload?</div>
</div>
</div>
</div>

<div id="video_infow">
<div id="video_info" style="display:none;">
<h2>Enter the following info while you wait for your upload to finish.</h2>
<div id="metadata">
<div class="dividerv"></div>
<div>
<div class="metadata_wrapper">
<label class="metadata_label" for="title">Title:</label><div class="metadata_input"><input class="inputtext" autocomplete="off" maxlength="65" id="title" name="title" value="" type="text" style="width:274px;"></div>
</div>
<div class="metadata_wrapper">
<label class="metadata_label" for="location">Where:</label><div class="metadata_input"><input class="inputtext dcphlgc" autocomplete="off" placeholder="Where was this video taken?" id="location" name="location" value="" type="text" style="width:274px;"></div>
</div>
<div class="metadata_wrapper">
<label class="metadata_label" for="desc_text">Description:</label><div class="metadata_input"><div style="height: auto;" class="uiTypeahead"><div class="wrap"><textarea placeholder="" class="textInput uiautogrow" name="desc_text" id="desc_text" style="max-height:480px;width:280px;" data-au_grow=""></textarea></div></div></div>
</div>
<div class="metadata_wrapper">
<label class="metadata_label">Privacy:</label><div class="metadata_input" id="vid_privacy">';

if(!isset($_GET['video_form_upload'])){ //to save info it takes it well without being here
$uidv=$uid;

$albumn="Videos";
$ltypev="media";

$sbid="";

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';
}


$echo.='
</div>
</div>
<input type="hidden" name="notify" autocomplete="off">
<div id="upload_buttons" style="padding-left:35px;" >
<input class="inputbutton" id="save_info_button" name="save_info_button" data-a_common_id="video_upload_save_info" data-a_form="metadata,getprogressr" fjax="/video/save_info.php" value="Save Info" type="button">
<a href="#" id="save_info_buttonv" data-a_common_id="video_upload_save_info" data-a_form="metadata,getprogressr" fjax="/video/save_info.php"></a>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
if(video_form_upload){
$("#save_info_button").attr("data-a_starts","upload_video_completefv");
}

$("#save_info_button").click(function(){
var uploadready=$("#uploadready").val();
if(uploadready==1 || uploadready==2){}
else{
$("#video_infow").fadeOut("slow");
}
});
</script>

<div id="upload_action">
<div style="text-align:left;margin-left:93px;margin-bottom:5px;">Choose a file to upload.</div>';

if(!isset($_GET['video_form_upload'])){
$echo.='
<div style="text-align:center;" id="upload_iframe_wrapper">

</div>
<script type="text/javascript">
var count=retcount(); 
$("#upload_iframe_wrapper").html(\'<iframe id="upload_iframe" src="/video/upload_giver.php?dk_upload='.$dk_upload.'&dk2_upload='.$dk_upload2.'&count=\'+count+\'" marginwidth="0" marginheight="0" height="160" frameborder="0" scrolling="no" width="100%"></iframe>\');
</script>
</div>
';
}
$echo.='
</form>
</div>
</div>
</div>';
?>
<?php
$params['rhelper_js']='../';
$params['rhelper']='../';
$params['title']='Upfrev';

if(isset($_GET['video_form_upload'])){
$params['nochat']='t';
}
$params['layout']='no_columns_no_borders';


include("end.php");
?>