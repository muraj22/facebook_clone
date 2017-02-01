<?php
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$notifications_alert=0;


$r = mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m = mysql_fetch_array($r))
	{
$fullname=$m['f_name'].' '.$m['l_name'];
$profilephoto=$m['profilepict'];
}


$u_friends=array();

$r3 = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($m3=mysql_fetch_array($r3)){
$u_friends[]=$m3['id2'];
}


$uti=sb_user($uid);
$commentid='reserved';
$saddo='<div data-sbid="'.$commentid.'" data-uidv="'.$uid.'" class="cmnc hidden_sb" data-type="1"></div><div class="cmnc_edit cmnc_editvv" data-t_align="center" data-t_text="Edit or Delete"></div><div class="hidden_sb edit_del_container"><ul class="cmncdc" style="border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;"><li class="itemaliv delete_comment" style="list-style-type:none;">Delete...</li><li class="itemaliv edit_comment doc_click" style="list-style-type:none;">Edit...</li></ul></div>';

$ltype='comment';
$wp_table='like';
$commentid='reserved';
$udvtag=$uid;

$dclass="";
$dclassv=" div_comment_clone hidden_sb new_comment";
$dclassvv=" hidden_sb animateme ";

$like='display:inline-block;';
$like2='display:none;';

$comment="";
$comment_chunk="";
$utime="";
$dttime="";
$dtime="a few seconds ago";

$ltypev="";

$data_lparams="";

echo'
<script type="text/javascript">
var data=\'';

include("js/clone_comment_div.php");
echo $sechov;

echo '\';

$("body").prepend(data);
</script>';


include("buttons/privacy_button_configured.php");

echo'
<script type="text/javascript">
function new_notifications(response,org_elem){console.log(response);
var res=$.parseJSON(response);
var total_notifications=res.total_notifications;
total_notifications=parseInt(total_notifications);
var total_transactions=res.total_transactions;
var total_transactionsv=res.total_transactionsv;
total_transactionsv=parseInt(total_transactionsv);
total_transactions=parseInt(total_transactions);
var total_messages=res.total_messages;
var total_messagesv=res.total_messagesv;
total_messages=parseInt(total_messages);
var total_friend_requests=res.total_friend_requests;
total_friend_requests=parseInt(total_friend_requests);
var dtotal=total_notifications+total_transactions+total_messages+total_friend_requests;
var dtitle=document.title;

var new_messages=res.new_messages;
var new_transactions=res.new_transactions;
var new_friend_requests=res.new_friend_requests;
var new_notifications=res.new_notifications;

var numberPattern = /\d+/g;
var l=dtitle.match(numberPattern);

if(l>0){
var original_l=l;
l=parseInt(l);
l=l+dtotal;
var noreplace="t";
}else{
l=dtotal;
var noreplace="f";
}

if(l>0){
if(noreplace=="t"){
var dtitlev=dtitle.replace("("+original_l+")","");
}else{
var dtitlev=dtitle;
}
var dtitlev=" ("+l+")"+dtitlev;
document.title=dtitlev;
}

var actual_notifications=$("#notifications").html();
var actual_friend_requests=$("#unconfirmed").html();
var actual_transactions=$("#transactions").html();
var actual_messages=$("#unread").html();
actual_notifications=parseInt(actual_notifications);
actual_friend_requests=parseInt(actual_friend_requests);
actual_transactions=parseInt(actual_transactions);
actual_messages=parseInt(actual_messages);


$("#notifications").html(actual_notifications+total_notifications);
$("#unconfirmed").html(actual_friend_requests+total_friend_requests);
$("#transactions").html(actual_transactions+total_transactions);
$("#unread").html(actual_messages+total_messages);

if(total_notifications>0){
$("#notifications").removeClass("hidden_sb");
$("#notificationswrapper").find("#notifications_text").addClass("hidden_sb");
if($("#notificationswrapper").find(".notifications_linkvv").eq(0).length>0){
$("#notificationswrapper").find(".notifications_linkvv").eq(0).before(new_notifications);
}else{
$("#notificationswrapper").find("#notifications_text").before(new_notifications);
}
setSlider($("#notifications_link"));
}
if(total_friend_requests>0){
$("#friend_requests_textv").css("border-bottom","1px solid #eeeeee");
$("#friend_requests_textv").css("margin-bottom","10px");
$("#unconfirmed").removeClass("hidden_sb");
$("#friendrequestswrapper").find("#friend_requests_text").addClass("hidden_sb");
if($("#friendrequestswrapper").find(".confirmv").eq(0).length>0){
$("#friendrequestswrapper").find(".confirmv").eq(0).before(new_friend_requests);
}else{
$("#friendrequestswrapper").find("#friend_requests_text").before(new_friend_requests);
}
setSlider($("#fr_link"));
}
if(total_transactionsv>0){
if(total_transactions>0){
$("#transactions").removeClass("hidden_sb");
}
$("#banktransactionswrapper").find("#transactions_text").addClass("hidden_sb");
if($("#banktransactionswrapper").find(".notifications_linkvv").eq(0).length>0){
$("#banktransactionswrapper").find(".notifications_linkvv").eq(0).before(new_transactions);
}else{
$("#banktransactionswrapper").find("#transactions_text").before(new_transactions);
}
setSlider($("#transfers_link"));
}
if(total_messagesv>0){
$("#messageswrapper").find(".jewelItemList").removeClass("hidden_sb");
if(total_messages>0){
$("#unread").removeClass("hidden_sb");
}
$("#messageswrapper").find(".jewelContent").prepend(new_messages);
setSlider($("#messages_link"));
}

setTimeout(header_new_notifications,200);
}
</script>
';

echo'
<div class="hidden_sb stopprop" fjax="/new_notifications.php" data-a_form="notifications_loaded" data-a_ismultiple="t" data-a_custom_f="new_notifications" id="header_new_notifications" class="stopimm"></div>
';

echo'
<script type="text/javascript">
function header_new_notifications(){
$("#header_new_notifications").click();
}

$(document).ready(function(){
setTimeout(header_new_notifications,0);
});
</script>
';

echo'
<script type="text/javascript">
function resendce(){
$(\'#resend_l\').before(\'<span style="margin:0;padding:0;color:#333333;">Confirmation email resent</span>\');
$("#resend_l").remove();
$.ajax({
	type: "POST",
	url: "/settingsd/general/resend_confirmation.php",
	data: { },
	success: function(response) {
		//alert(response);
}
});
}

function closeallbt(){
	$("#birthdays_modulev").fadeOut("slow");
}


function show_msg_dialog2(){
	close_dialog3();
	close_dialog4();
	close_dialog5();
	hidelogout();
	if($("#jewelbutton").hasClass("jewelbutton")){
$("#jewelbutton").removeClass("jewelbutton");
$("#jewelbutton").addClass("jewelbutton2");
$("#messageswrapper").removeClass("hidden_sbs");
$("#unread").addClass("hidden_sb");
	}
	else if($("#jewelbutton").hasClass("jewelbutton2")){
	$("#jewelbutton").removeClass("jewelbutton2");
$("#jewelbutton").addClass("jewelbutton");
$("#messageswrapper").addClass("hidden_sbs");
	}

}


function show_msg_dialog3(){
	close_dialog2();
	close_dialog4();
	close_dialog5();
	hidelogout();
	if($("#jewelbuttonv").hasClass("jewelbuttonv")){
$("#jewelbuttonv").removeClass("jewelbuttonv");
$("#jewelbuttonv").addClass("jewelbuttonv2");
$("#notificationswrapper").removeClass("hidden_sbs");
$("#notifications").addClass("hidden_sb");
	}
	else if($("#jewelbuttonv").hasClass("jewelbuttonv2")){
	$("#jewelbuttonv").removeClass("jewelbuttonv2");
$("#jewelbuttonv").addClass("jewelbuttonv");
$("#notificationswrapper").addClass("hidden_sbs");
	}

}

function show_msg_dialog4(){
	close_dialog3();
	close_dialog2();
	close_dialog5();
	hidelogout();
	if($("#jewelbuttonvv").hasClass("jewelbuttonvv")){
$("#jewelbuttonvv").removeClass("jewelbuttonvv");
$("#jewelbuttonvv").addClass("jewelbuttonvv2");
$("#friendrequestswrapper").removeClass("hidden_sbs");
$("#unconfirmed").addClass("hidden_sb");
	}
	else if($("#jewelbuttonvv").hasClass("jewelbuttonvv2")){
	$("#jewelbuttonvv").removeClass("jewelbuttonvv2");
$("#jewelbuttonvv").addClass("jewelbuttonvv");
$("#friendrequestswrapper").addClass("hidden_sbs");
	}

}

function show_msg_dialog5(){
	close_dialog3();
	close_dialog2();
	close_dialog4();
	hidelogout();
	if($("#jewelbuttonvvv").hasClass("jewelbuttonvvv")){
$("#jewelbuttonvvv").removeClass("jewelbuttonvvv");
$("#jewelbuttonvvv").addClass("jewelbuttonvvv2");
$("#banktransactionswrapper").removeClass("hidden_sbs");
$("#transactions").addClass("hidden_sb");
	}
	else if($("#jewelbuttonvvv").hasClass("jewelbuttonvvv2")){
	$("#jewelbuttonvvv").removeClass("jewelbuttonvvv2");
$("#jewelbuttonvvv").addClass("jewelbuttonvvv");
$("#banktransactionswrapper").addClass("hidden_sbs");
	}

}

function close_dialog2(){
		$("#jewelbutton").removeClass("jewelbutton2");
$("#jewelbutton").addClass("jewelbutton");
$("#messageswrapper").addClass("hidden_sbs");
}

function close_dialog3(){
		$("#jewelbuttonv").removeClass("jewelbutton2v");
$("#jewelbuttonv").addClass("jewelbuttonv");
$("#notificationswrapper").addClass("hidden_sbs");
}

function close_dialog4(){
		$("#jewelbuttonvv").removeClass("jewelbutton2vv");
$("#jewelbuttonvv").addClass("jewelbuttonvv");
$("#friendrequestswrapper").addClass("hidden_sbs");
}

function close_dialog5(){
		$("#jewelbuttonvvv").removeClass("jewelbutton2vvv");
$("#jewelbuttonvvv").addClass("jewelbuttonvvv");
$("#banktransactionswrapper").addClass("hidden_sbs");
}

function cnotificationstable(w){
	var tochange="#cnotificationstable"+w;
	var tochange2="#notifica"+w;
	var tochange3="#notificav"+w;
	var tochange4="#masunofriends"+w;
	var tochange5="#notificavv"+w;
		$(tochange).removeClass("notificationstable");
$(tochange).addClass("notificationstable2");
		$(tochange2).removeClass("notifica");
$(tochange2).addClass("notificav");
		$(tochange3).removeClass("notifica");
$(tochange3).addClass("notificav");
		$(tochange4).removeClass("masunofriends");
$(tochange4).addClass("masunofriendsv");
		$(tochange5).removeClass("tiempof");
$(tochange5).addClass("tiempofv");
}

function cnotificationstable2(w){
	var tochange="#cnotificationstable"+w;
	var tochange2="#notifica"+w;
	var tochange3="#notificav"+w;
	var tochange4="#masunofriends"+w;
	var tochange5="#notificavv"+w;
		$(tochange).removeClass("notificationstable2");
$(tochange).addClass("notificationstable");
		$(tochange2).removeClass("notificav");
$(tochange2).addClass("notifica");
		$(tochange3).removeClass("notificav");
$(tochange3).addClass("notifica");
		$(tochange4).removeClass("masunofriendsv");
$(tochange4).addClass("masunofriends");
		$(tochange5).removeClass("tiempofv");
$(tochange5).addClass("tiempof");
}
</script>
<div class="scrollbar-measure" id="scrollbar-measure"></div>
<script type="text/javascript">
var scrollbarWidth =document.getElementById("scrollbar-measure").offsetWidth - document.getElementById("scrollbar-measure").clientWidth;

$("#scrollbar-measure").remove();
</script>


<div style="position:fixed;left:0;top:0;z-index:300;width:100%;" id="head_content">';

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM registration_keys WHERE id='$uid' AND confirmed='0'"));
$c=$c['c'];

if($c==1 AND !isset($flocalhost)){
$confirm_email="t";
$ddomain=explode("@",$uid_a['email']);
$ddomain=$ddomain[1];
echo'
<div class="pam fbPageBanner uiBoxYellow noborder"><div class="fbPageBannerInner"><div class="clearfix"><div class="clearfix lfloat" style="width: 70%;"><i class="mts _29h _3eb img mail_confirm"></i><a class="_302 togglereal uiButton uiButtonLarge" data-url="http://'.$ddomain.'" role="button" target="_blank" rel="nofollow" href="#"><span class="uiButtonText">Go to your email</span></a><span class="pts _29k fsl fwb">'.$uid_a['f_name'].', go to '.$uid_a['email'].' to complete the sign-up process.</span></div><div class="mts rfloat fsm fwn fcg lb"><a class="displaydialog pts fsl" href="#" rel="dialog-post" '; include("anchors_data/resend_confirmation_email.php"); echo $sechov; echo'role="button">Resend Email</a> &#183; <a class="pts fsl" href="#" rel="dialog" '; include("anchors_data/change_email.php"); echo $sechov; echo' role="button">Change Email Address</a></div></div></div></div>

<div id="error_email_loading" class="hidden_sb displaydialog" data-d_okay="Okay" data-d_okay_function="close_dialog" data-d_overlay="white_create" data-d_title="Invalid Email"></div><div class="dialog_msgs">You have entered an invalid email. Please check your email address and try again.</div>
<div id="success_email_loading" class="hidden_sb displaydialog"'; include("anchors_data/success_change_email.php"); echo $sechov; echo'></div>

<script type="text/javascript">
function set_email_loading(org_elem){
$(org_elem).parents(".pop_container3").eq(0).addClass("hidden_sb");
$(org_elem).parents(".clone_container_wrapper").prev().find(".pop_container3").css("display","block");
}

function email_loading_response(response,org_elem){
var dremove=$(org_elem).attr("data-dialogid");
remove_dialog(dremove);
if(response=="e"){
$("#error_email_loading").click();	
}
else{
$("#success_email_loading").click();
}
}
</script>';

}

echo'
<script type="text/javascript">
$(document).on("mouseover",".togglereal",function(){
$(this).attr("href",$(this).data("url"));
});
$(document).on("mouseout",".togglereal",function(){
$(this).attr("href","#");
});
</script>
';

if(!isset($confirm_email)){$dclass="headerwrapper_shadow";}
else{
$dclass="";	
}

echo'<div class="headerwrapper '.$dclass.'" style="width:100%;position:relative!important;">

<div style="margin-left:0px;">

<div class="header" style="z-index:300;width:980px;margin:0 auto;position:relative!important;">
<div style="position:relative;margin-left:0px;width:100%;">

<a href="/" title="Home" style="display:inline-block;float:left;position:relative;margin-top:10px;width:68px;">
<div class="logowrapper" style="position:relative;left:-25px;bottom:0px;margin:0;padding:0;padding-left:6px;padding-right:6px;display:inline-block;padding-top:5px;padding-bottom:7px;width:68x;height:18px;z-index:301;"><img src="/images/logos.png" style="width:95px;height:19px;position:relative;">
</div>
</a>';

echo'


<div style="margin:0 auto;padding:0;position:relative;left:0px;display: inline-block;top:0;float: left;margin-left:10px;margin-top:10px;" id="header_buttons_wrapper">

<div class="buttonwrapper" style="display:inline-block;position:absolute;"><div id="notificationswrapper" class="hidden_sbs" style="background:none repeat scroll 0% 0% padding-box rgba(255,255,255,0.98);box-shadow:0pt 3px 8px rgba(0,0,0,0.25);border:1px solid rgba(100,100,100,0.4);border-radius:3px;position:absolute;left:-147px;top:35px;cursor:default;display:inline-block;z-index:320;width:350px;padding-bottom:1px;height:auto;"><div style="position:absolute;left:148px;background-image:url(\'/images/NzutSkRQeOa.png\');background-repeat:no-repeat;background-position:0 0;height:11px;top:-11px;width:20px;"></div><div style="color:#333333;font-weight:bold;padding:0;margin:0;margin-top:5px;padding-left:8px;padding-top:1px;border-bottom:1px solid #dddddd;width:342px;padding-bottom:3px;">Notifications</div>';

echo'
<script type="text/javascript">
function confirmfriend(w,yk){
	$("#notnow"+yk).css("display","none");
	$("#confirm"+yk).css("display","none");
	$("#confirmvv"+yk).css("display","inline-block");
	$("#confirmvvv"+yk).css("display","inline-block");
		$("#confirmv"+yk).css("background","none repeat scroll 0% 0% #FFF9D7");
		
$.ajax({
	type: "POST",
	url: "/confirmfriend.php",
	data: { amigo : w },
	success: function(data) {
	}
});

}

function removealert(yk,w){

$.ajax({
	type: "POST",
	url: "/removealert.php",
	data: { amigo : w },
	success: function(data) {
if(data.length>0){
window.location="/"+w;
}
	}
});

}
</script>';


include("components/love_select.php");
echo $secho;
include("components/family_select.php");
echo $secho;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$including_notifications="t";
include("new_notifications.php");

echo'<div class="notifications_links fader_holder" style="display:inline-block;max-height:325px;overflow-y:auto;" id="notifications_link">';
foreach($nn_dt as $key => $value){
echo $newnotifications[$key];
}
echo'</div>';

if($yxmv=='0'){
$dclass="";
}else{
$dclass="hidden_sb";
}
echo'<div style="margin:0;padding:0;display:block;color:grey;padding-left:8px;position:relative;bottom:-4px;border-top:0;padding-top:4px;padding-bottom:10px;" id="notifications_text" class="'.$dclass.'">No new notifications</div><div style="width:100%;height:4px;margin:0;padding:0;"></div>';

echo'
<script type="text/javascript">

setSlider($("#notifications_link"));

$(".notifications_linkvvv:first").css("border-top","0");

function seeallvv(){
$("#seeall3").removeClass("seeall");
$("#seeall3").addClass("seeall2");
}
function seeall2vv(){
	$("#seeall3").removeClass("seeall2");
	$("#seeall3").addClass("seeall");
}
</script>
';

echo'
<a class="doc_click" href="/notifications.php" style="text-decoration:none!important;"><div id="seeall3" class="seeall" onmouseover="seeallvv();" onmouseout="seeall2vv();"><span style="position:relative;bottom:-9px;">See All Notifications</span></div></a></div></div>';

//bank notifications

echo'
<div class="buttonwrapper" style="display:inline-block;position:absolute;"><div id="banktransactionswrapper" style="background:none repeat scroll 0% 0% padding-box rgba(255,255,255,0.98);box-shadow:0pt 3px 8px rgba(0,0,0,0.25);border:1px solid rgba(100,100,100,0.4);border-radius:3px;position:absolute;left:-80px;top:36px;cursor:default;display:inline-block;z-index:320;padding-bottom:1px;height:auto;" class="hidden_sbs"><div style="position:absolute;left:160px;background-image:url(\'/images/NzutSkRQeOa.png\');background-repeat:no-repeat;background-position:0 0;height:11px;top:-11px;width:20px;"></div><div style="color:#333333;font-weight:bold;position:relative;top:5px;padding:0;margin:0;padding-top:1px;padding-left:8px;width:332px;padding-bottom:6px;">Transactions</div><div class="lb" style="position:absolute;right:5px;top:5px;"><a class="npjax displaydialog" '; $from_header="t"; include("anchors_data/transfer_anchor.php"); echo $sechov.'>Send a New Transaction</a></div>';

echo'<div class="fader_holder" id="transfers_link" style="display:inline-block;max-height:325px;overflow-y:auto;">';
foreach($nn_dtv as $key => $value){
echo $newnotificationsv[$key];
}
echo'</div>';

if($yxmvv=='0'){
$dclass="";
}else{
$dclass="hidden_sb";
}
echo'<div style="margin:0;padding:0;display:block;color:grey;padding-left:8px;position:relative;bottom:-2px;border-top:1px solid #e0e0e0;padding-top:2px;padding-bottom:10px;" class="'.$dclass.'" id="transactions_text">No new transactions</div>';


echo'
<a class="doc_click" href="/transactions.php"><div id="seeall3" class="seeall" onmouseover="seeallvv();" onmouseout="seeall2vv();"><span style="position:relative;bottom:-9px;">See All Transactions</span></div></a></div></div>';


echo'
<script type="text/javascript">
setSlider($("#transfers_link"));
</script>
';

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$uid' AND confirmed='nc'"));
$c=$c['c'];
$unconfirmed=$c;

$firstval='';
$secondval='';
$thirdval='0';

if($unconfirmed>0){
$firstval='border-bottom:1px solid #eeeeee;';
$secondval='margin-bottom:10px;';
$thirdval='11';
}

echo'
<div class="buttonwrapper" style="display:inline-block;position:absolute;"><div id="friendrequestswrapper" style="background:none repeat scroll 0% 0% padding-box rgba(255,255,255,0.98);box-shadow:0pt 3px 8px rgba(0,0,0,0.25);border:1px solid rgba(100,100,100,0.4);border-radius:3px;position:absolute;left:-181px;top:36px;cursor:default;display:inline-block;z-index:320;padding-bottom:1px;height:auto;" class="hidden_sbs"><div style="position:absolute;left:105px;background-image:url(\'/images/NzutSkRQeOa.png\');background-repeat:no-repeat;background-position:0 0;height:11px;top:-11px;width:20px;"></div><div style="color:#333333;font-weight:bold;position:relative;top:5px;padding:0;margin:0;padding-top:1px;'.$firstval.$secondval.'padding-left:8px;width:332px;padding-bottom:6px;" id="friend_requests_textv">Friend Requests</div>';

echo'
<script type="text/javascript">
function unconfirmfriend(w,yk){

	$("#confirm"+yk).css("display","none");
	$("#notnow"+yk).css("display","none");
	$("#confirmv"+yk).css("background","none repeat scroll 0% 0% #FFF9D7");
	$("#notnowv"+yk).css("display","inline-block");
	
$.ajax({
	type: "POST",
	url: "/unconfirmfriend.php",
	data: { amigo : w },
	success: function(data) {
	}
});

}
</script>';

echo'<div class="fader_holder" id="fr_link" style="display:inline-block;max-height:325px;overflow-y:auto;">';

foreach($newfriends as $key => $value){
echo $value;
}

echo'</div>';

if($yxmvvv=='0'){
$dclass="";
}else{
$dclass="hidden_sb";
}
echo'<div style="margin:0;padding:0;display:block;color:grey;padding-left:8px;position:relative;bottom:-2px;border-top:1px solid #e0e0e0;padding-top:2px;padding-bottom:2px;" class="'.$dclass.'" id="friend_requests_text">No new requests</div>';


$u_friends_c=r_friends($uid,"","","complete");
include("stories/pymk_core.php");
arsort($mutual); //aqui ya estan las personas que mas mutual friends tienen conmigo

if(count($mutual)>0){

echo'
<div style="color:#333333;font-weight:bold;position:relative;top:0px;padding:0;margin:0;padding-top:1px;border-top:1px solid #eeeeee;border-bottom:1px solid #eeeeee;padding-left:8px;width:332px;padding-bottom:6px;padding-top:6px;">People You May Know</div>
';
	
$s=201; //por si en algun momento lo quiero cortar y dejo que se carguen igual sin ajax en una funcion attacheada al coso para cuando el div toca 0
$dc=1;
foreach($mutual as $k=>$v){
$mutualc2[$k]=$v;	
$dc++;
if($dc==200){break;} //aca es 200 - break it ahi por ahora, algun dia pagination
}
$mutualc3=shuffle_assoc($mutualc2);

$dc=0;
$dcv='block';
foreach($mutualc3 as $uo=>$v){
$tc=$v;

$uti=sb_user($uo);
$uo_un=$uti['username'];
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];

$rx=grsn(8);
echo'
<div class="head_design_pymk" style="vertical-align:top;margin-top:0;display:'.$dcv.';padding-top:3px;padding-bottom:3px;border-bottom:1px solid #eeeeee;" id="pymk'.$rx.'">
<div style="display:inline-block;margin:0;padding:0;padding-left:7px;">
<a href="/'.$uo_un.'" style="text-decoration:none!important;display:block;">
<img src="/'.$uo.'/pics/'.$uo_pic.'" style="height:50px;width:50px;">
</a>
</div>
';
echo '<div style="display:inline-block;margin:0;padding:0;text-align:left;vertical-align:top;padding-left:5px;margin-top:7px;">
<div style="display:block;vertical-align:top;margin:0;padding:0;" class="lb fwb">
'.$uti['link'].'
</div>';
if($tc>1){$as='s';}
else{$as='';}

$d_title="Mutual Friends";
$fjax_l='table=mutual_friends&uo='.$uid.'&ud='.$uo;

if($tc>0){
echo'
<div style="display:block;margin:0;padding:0;" class="pymk_dv">
<a href="#" class="displaydialog" data-d_okay="Close" data-d_width="447" data-d_title="'.$d_title.'" data-d_okay_function="close_dialog" data-d_leave_loading="show_loading" data-d_isajax="t" data-d_fjax="/stories/show_users_listv.php?'.$fjax_l.'" data-a_custom_f="show_users_list" style="font-weight:normal!important;">
'.$tc.' mutual friend'.$as.'
</a>
</div>';
}

	echo'</div>';
	
	echo'<div style="display:inline-block;float:right;margin-top:15px;margin-right:7px;">';
$duidv=$uo;
include("buttons/friends_button.php");
echo $sechov;

echo'</div>';

echo'</div>';


	$dc++;
	if($dc>=$s){
	$dcv='none';	
	}
}

echo'
<div style="color:#333333;font-weight:bold;position:relative;top:0px;padding:0;margin:0;padding-top:1px;border-top:1px solid #eeeeee;border-bottom:1px solid #eeeeee;padding-left:8px;width:332px;padding-bottom:6px;padding-top:6px;">Invite Friends</div>';

echo'<div class="clearfix header_find_friends" style="padding-left:0px;"><a class="lfloat doc_click" href="/find_friends.php?a=g"><div class="gmail"></div></a><a class="lfloat doc_click" href="/find_friends.php?a=y"><div class="yahoo"></div></a><a class="lfloat doc_click" href="/find_friends.php?a=h"><div class="hotmail"></div></a><a class="lfloat doc_click" href="/invite.php"><div class="othertools"></div></a></div>
';

echo'<script type="text/javascript">
$(".head_design_pymk:last").addClass("borderbottomnone");
</script>';
}


echo'
<script type="text/javascript">
setSlider($("#fr_link"));

function seeallv(){
$("#seeall2").removeClass("seeall");
$("#seeall2").addClass("seeall2");
}
function seeall2v(){
	$("#seeall2").removeClass("seeall2");
	$("#seeall2").addClass("seeall");
}
</script>
';

$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='nc' OR confirmed='no'");
$num_rows = mysql_num_rows($r);

if($num_rows>0){
$seewhat='See All Friend Requests';
$seewhatv='reqs.php';
}
else{$seewhat='See All Friends';
$seewhatv=$uid.'/friends';}

echo'<div style="width:100%;height:4px;margin:0;padding:0;"></div>
<a class="doc_click" href="/'.$seewhatv.'" style="text-decoration:none!important;"><div id="seeall2" class="seeall" onmouseover="seeallv();" onmouseout="seeall2v();"><span style="position:relative;bottom:-9px;">'.$seewhat.'</span></div></a></div></div>';


echo'<div class="buttonwrapper" style="display:inline-block;position:absolute;left:-97px;"><div id="messageswrapper" class="hidden_sbs upJewelFlyout" style="background:none repeat scroll 0% 0% padding-box rgba(255,255,255,0.98);box-shadow:0pt 3px 8px rgba(0,0,0,0.25);border:1px solid rgba(100,100,100,0.4);border-radius:3px;position:absolute;left:0px;top:35px;cursor:default;z-index:320;width:350px;padding-bottom:1px;height:auto;"><div style="position:absolute;left:126px;background-image:url(\'/images/NzutSkRQeOa.png\');background-repeat:no-repeat;background-position:0 0;height:11px;top:-11px;width:20px;"></div><div style="color:#333333;font-weight:bold;display:inline;position:relative;top:5px;padding-left:8px;padding-top:1px;">Messages</div><div class="lb" style="position:relative;display:inline;right:-170px;top:5px;"><a class="npjax displaydialog" '; $from_header="t"; include("anchors_data/send_message_anchor.php"); echo $sechov.'>Send a New Message</a></div><div style="display:block;height:10px;width:100%;"></div>';

//acacarajo

include("new_messages.php");

arsort($bydatem);

echo'<div class="messages_links fader_holder" style="display:inline-block;max-height:325px;overflow-y:auto;width:100%;" id="messages_link">';
if(count($bydatem)>0){
$dclass="";
}else{
$dclass="hidden_sb";
}
echo'<ul class="uiList jewelItemList jewelHighlight _4kg _6-h _6-j _4kt '.$dclass.'">';
echo'<div class="jewelContent"><div>';	

foreach($bydatem as $key=> $value){
echo $drm[$key];
}

echo'</div></div>';
echo'</ul>';	

echo'</div>';

echo'
<script type="text/javascript">
setSlider($("#messages_link"));

function seeall(){
$("#seeall").removeClass("seeall");
$("#seeall").addClass("seeall2");
}
function seeall2(){
	$("#seeall").removeClass("seeall2");
	$("#seeall").addClass("seeall");
}
</script>
';

echo'<a class="doc_click" href="/messages/" style="text-decoration:none!important;"><div id="seeall" class="seeall" onmouseover="seeall();" onmouseout="seeall2();"><span style="position:relative;bottom:-9px;">See All Messages</span></div></a>';

echo'</div></div>';

if($unread>0){
$dclass="";
}else{
$dclass="hidden_sb";
}
echo'
<div class="redalert stopprop '.$dclass.'" style="position:absolute;top:0px;left:41px;z-index:302;cursor:pointer;" onclick="show_msg_dialog2();" id="unread">'.$unread.'</div>
';

if($unconfirmed>0){
$dclass="";
}else{
$dclass="hidden_sb";
}

echo'<div class="redalert stopprop '.$dclass.'" style="position:absolute;top:0px;left:15px;z-index:302;cursor:pointer;" onclick="show_msg_dialog4();" id="unconfirmed">'.$unconfirmed.'</div>';

if($notifications_alert>0){
$dclass="";
}else{
$dclass="hidden_sb";
}
echo'<div class="redalert stopprop '.$dclass.'" style="display:inline-block;position:absolute;top:0px;left:66px;z-index:302;cursor:pointer;" onclick="show_msg_dialog3();" id="notifications">'.$notifications_alert.'</div>';

if($transactions_alert>0){
$dclass="";
}else{
$dclass="hidden_sb";
}
echo'<div class="redalert stopprop '.$dclass.'" style="position:absolute;top:0px;left:90px;z-index:302;cursor:pointer;" onclick="show_msg_dialog5();" id="transactions">'.$transactions.'</div>';


$totalnot=$unread+$unconfirmed+$notifications+$transactions_alert;

if($totalnot>0){
echo'
<script type="text/javascript">
document.title="('.$totalnot.') "+document.title;
</script>
';
}

echo'
<div class="buttonwrapper" data-itis="notifications" style="position:relative;top:0;left:0;display:inline-block;float:left;" id="premsg3"><div id="jewelbuttonvv" class="jewelbuttonvv dialog_openers" style="z-index:301;position:relative;top:0;left:0;"></div></div>';

echo'<div class="buttonwrapper" data-itis="messages" style="position:relative;top:0;left:0;display:inline-block;float:left;" id="premsg1"><div fjax="/notifications/notifications_seen.php" data-a_form="notifications_seen_messages" id="jewelbutton" class="jewelbutton dialog_openers" style="z-index:301;position:relative;top:0;left:0;"></div></div>';

echo'
<div class="buttonwrapper" data-itis="friend_requests" style="margin-right:0px;position:relative;top:0;left:0;display:inline-block;float:left;" id="premsg2"><div fjax="/notifications/notifications_seen.php" data-a_form="notifications_seen_notifications" id="jewelbuttonv" class="jewelbuttonv dialog_openers" style="z-index:301;position:relative;top:0;left:0;"></div></div>';

echo'
<div class="buttonwrapper" data-itis="bank_transactions" style="margin-right:0px;position:relative;top:0;left:0;display:inline-block;float:left;" id="premsg4"><div fjax="/notifications/notifications_seen.php" data-a_form="notifications_seen_bank" id="jewelbuttonvvv" class="jewelbuttonvvv dialog_openers" style="z-index:301;position:relative;top:0;left:0;"></div></div>';

echo'

<div id="notifications_loaded">

<div id="notifications_seen_friendrequests" class="displaynoneimportant">
<input type="hidden" autocomplete="off" name="notifications" id="notifications_friendrequests">
</div>

<div id="notifications_seen_messages" class="displaynoneimportant">
<input type="hidden" autocomplete="off" name="notifications" id="notifications_messages">
</div>

<div id="notifications_seen_notifications" class="displaynoneimportant">
<input type="hidden" autocomplete="off" name="notifications" id="notifications_notifications">
</div>

<div id="notifications_seen_bank" class="displaynoneimportant">
<input type="hidden" autocomplete="off" name="notifications" id="notifications_bank">
</div>

</div>



<script type="text/javascript">
var ax_friendrequests=0;
var notifications_seen_friendrequests=new Array();
'.$notifications_seen_friendrequests.'
$("#notifications_friendrequests").val(notifications_seen_friendrequests);

var ax_messages=0;
var notifications_seen_messages=new Array();
'.$notifications_seen_messages.'
$("#notifications_messages").val(notifications_seen_messages);

var ax_notifications=0;
var notifications_seen_notifications=new Array();
'.$notifications_seen_notifications.'
$("#notifications_notifications").val(notifications_seen_notifications);

var ax_bank=0;
var notifications_seen_bank=new Array();
'.$notifications_seen_bank.'
$("#notifications_bank").val(notifications_seen_bank);
</script>

</div>';


echo'<div style="position:relative!important;left:0px;margin:0;padding:0;display:inline-block;float:left;margin-left:-1px;"><form name="searchq" id="searchq" action="/search_friends.php" method="POST" style="display:inline;margin:0;padding:0;">
<div class="nheader"></div>
<table cellspacing="0" cellpadding="0"><tr><td style="position:relative;">
<div style="z-index:10;width:350px;height:22px;background:#ffffff;border-radius:2px;border:1px solid #123682;position:absolute;left:0px;margin-left:5px;top:15px;"></div>
<div class="oinnerWrap" style="margin-top:18px;position:relative;right:0px;overflow:hidden;z-index:11;margin-left:9px;">
<span class="uiSearchInput">
<span style="position:relative;height: 22px !important;">
<input autocomplete="off" name="dquery" id="dquery" class="input_search dcphmgc" style="margin-left:2px;" placeholder="Search for people, places and things" aria-autocomplete="list" aria-expanded="false" aria-invalid="false" role="combobox" spellcheck="false" aria-label="Search for people, places and things" type="text">
<script type="text/javascript">
function check_f(){
var tocheck=$("#dquery").val();
if(tocheck==""){return false;}
else{
window.location="/search/results.php?q="+tocheck+"&type=all";
}
}
</script>
<input autocomplete="off" type="button" onclick="check_f();" class="button_search" style="top:-2px;">
</span></span>
</div></td></tr></table></form></div>';

$fullnamev=$fullname;

$fullnamevlength=strlen($fullnamev);

if($fullnamevlength>31){
$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$fullnamev=$m['f_name'];
}
$fullnamevlength=strlen($fullnamev);
}

if($fullnamevlength>31){
$fullnamev=substr($fullnamev,0,31);
$fullnamevlength=strlen($fullnamev);
}


echo'
<div style="margin:0;padding:0;float:right;margin-top:11px;position:relative;right:0px;">

<div style="margin:0;padding:0;position:relative;display:inline-block;float:left;">
<div style="margin-left:0px;position:relative;top:0px;left:0px;float:left;display:inline-block;text-align:right;vertical-align:middle;" class="aprofilepic lw"><a href="/" class="navLink" style="display:inline-block;line-height:30px;"><span style="vertical-align:middle;position:relative;top:0px;padding-right:10px;padding-left:10px;">Home</span></a></div></div>



<div style="position:relative;float:left;">
<div style="position:relative;right:0px;top:0px;z-index:306;float:left;">
<span style="position:relative;top:0px;left:0px;margin:0;padding:0;float:left;" class="aprofilepic lw">
<a class="navLink" href="/'.$un.'" style="padding-left:11px;padding-right:10px;display:inline-block;line-height:30px;"><span style="position:relative;top:0px;vertical-align:middle;">Profile</span></a>
</span>

<div style="float:left;" class="aprofilepic">
<div class="notifNegativeBase navItem middleItem" style="float:left;max-height: 30px !important;">

<div class="_8-a sbJewel" id="u_0_4"><a style="padding-left:8px;padding-right:8px;" class="_91j navLink" aria-labelledby="privacyFlyoutLabel" href="#" rel="toggle" role="button" aria-haspopup="true" aria-owns="u_0_3"><div class="_8qn" id="privacyFlyoutLabel"></div></a><div class="_8-b jewelFlyout sbJewelFlyout toggleTargetClosed uiToggleFlyout" id="u_0_3"><div class="jewelBeeperHeader"><div class="beeperNubWrapper"><div class="beeperNub"></div></div></div><div class="uiHeader uiHeaderBottomBorder _26y1"><div class="clearfix uiHeaderTop"><div><h3 class="uiHeaderTitle" aria-hidden="true">Privacy Shortcuts</h3></div></div></div><ul class="uiList _26y4 _4kg  _4ks"><li class="uiListItem"><div class="_9ot" id="u_5_k"><div class="_6a _9ou"><div class="_6a _6b" style="height:39px"></div><div class="_6a _6b"><img class="img" src="/images/Exf83CRIuqR.png" alt="" height="35" width="39"></div></div><div class="_6a _9ov"><div class="_6a _6b" style="height:39px"></div><div class="_6a _6b"><span class="fsl fcg">Who can see my stuff?</span></div></div><div class="_6a _9ow"><div class="_6a _6b" style="height:39px"></div><div class="_6a _6b"><div class="_9or" id="u_5_l"></div></div></div></div><div style="" class="_9ox hidden_sb" id="u_5_m"><ul class="uiList _4kg "><li class="_9oy uiListItem" id="u_5_8"><div class="clearfix"><div class="_9oz lfloat"><img class="img" src="/images/R53LGL-DyvS.png" alt="" height="31" width="41"></div><div class="_9o-"><span class="fcg">Who can see my future posts?</span><div class="_9p2">';

$uidv=$uid;
$sbid="";
$ltypev="options";

$peditable="t";

$nfjax="";
$data_t='';

$dclass="";

$use_edit_album="";

$privacy_configuration="big";
$privacy_source="hps"; //privacy settings

include("buttons/privacy_button.php");

echo'<ul class="uiList" style="position:relative;z-index:1;">';
echo $button;
echo'</ul>';



echo'<div class="mts pts _2v9_ hidden_sb"></div>';

$tooltipid="1";
include("tooltip/load.php");
if($oc==0){

echo'<div id="u_4_a" class="mtm _o1t _9o_"><a class="_o1w uiCloseButton" href="#" role="button" title="Remove" id="u_4_b" onclick=\'$(this).parent().eq(0).addClass("hidden_sb");\' fjax="/ajax/tooltip/remove/?sbid='.$tooltipid.'"></a><span class="fcg"><strong>Remember:</strong> This is the same setting you find <span class="lb"><a href="/?audience_usered=1">right where you post</a></span>, and by changing it here, you\'ve also updated it there.</span></div>';
}

echo'
</div></div></li></ul></div></li><li class="uiListItem"><div class="_9ot" id="u_5_n"><div class="_6a _9ou"><div class="_6a _6b" style="height:39px"></div><div class="_6a _6b"><img class="img" src="/images/gENOO0xZxk2.png" alt="" height="37" width="38"></div></div><div class="_6a _9ov"><div class="_6a _6b" style="height:39px"></div><div class="_6a _6b"><span class="fsl fcg">Who can contact me?</span></div></div><div class="_6a _9ow"><div class="_6a _6b" style="height:39px"></div><div class="_6a _6b"><div class="_9or" id="u_5_o"></div></div></div></div><div style="" class="_9ox hidden_sb" id="u_5_p"><ul class="uiList _4kg "><li class="_9oy uiListItem"><div class="clearfix"><div class="_9oz lfloat"><img class="img" src="/images/MH5xKyeaVCq.png" alt="" height="29" width="37"></div><div class="_9o-"><span class="fcg">Whose messages do I want filtered into my Inbox?</span><div class="mvs">';


$uidv=$uid;
$sbid="";
$ltypev="inbox_filter";

$peditable="t";

$nfjax="";
$data_t='';

$dclass="";

$use_edit_album="";

$privacy_configuration="big";
$privacy_source="hps"; //privacy settings

include("buttons/privacy_button.php");

echo'
<div class="hidden_sb data_formo">
<input type="hidden" name="ptype" value="'.$ltypev.'" autocomplete="off"><input type="hidden" name="sbid" value="'.$sbid.'" autocomplete="off"><input type="hidden" name="privacy" value="'.$privacy["privacy"].'" autocomplete="off"><input type="hidden" name="privacyh" value="'.$privacy["privacyh"].'" autocomplete="off">
</div>
<div class="uiInputLabel clearfix hidden_sb" id="u_5_4">
<input class="_fv0 uiInputLabelRadio" name="message_filtering" id="u_5_3" type="radio"><a class="hidden_sb nfjax" fjax="/ajax/privacy/simple_save.php?id=0" data-a_id="privacy_inbox_filter" data-privacy="0" data-a_formo=\'$(this).parents("#u_5_p").find(".data_formo").eq(0);\'></a>


<label class="_1msz" for="u_5_3"><div><div class="fsm fwn fcg"><span class="fwb fcg">Basic Filtering</span> · <span class="fcg">Recommended</span></div></div><div><span class="fcg">Mostly friends and people you may know</span></div></label>

</div></div><div class="mvs"><div class="uiInputLabel clearfix hidden_sb" id="u_5_6"><input class="_fv0 uiInputLabelRadio" name="message_filtering" id="u_5_5" type="radio"><a class="hidden_sb nfjax" fjax="/ajax/privacy/simple_save.php?id=4" data-a_id="privacy_inbox_filter" data-privacy="4" data-a_formo=\'$(this).parents("#u_5_p").find(".data_formo").eq(0);\'></a><label class="_1msz" for="u_5_5"><div><span class="fwb fcg">Strict Filtering</span></div><div><span class="fcg">Mostly just friends — you may miss messages from other people you know</span></div></label></div></div></div></div>

<script type="text/javascript">
$("#u_5_3").bind("click",function(){
$(this).next("a").click();
});
$("#u_5_5").bind("click",function(){
$(this).next("a").click();
});

var path=$("#u_5_p");
$(path).find("[data-privacy='.$privacy["privacy"].']").prev().attr("checked","checked");
$(path).find("#u_5_4,#u_5_6").removeClass("hidden_sb");
</script>
</li>

<li class="_9oy uiListItem"><div class="clearfix"><div class="_9oz lfloat"><img class="img" src="/images/sQH5tBkHPY7.png" alt="" height="40" width="40"></div><div class="_9o-"><span class="fcg">Who can send me friend requests?</span><div class="_9p2">';


echo'<div class="formo_data hidden_sb">';
$uidv=$uid;
$sbid="";
$ltypev="friend_requests";

$peditable="t";

$nfjax="";
$data_t='';

$dclass="";

$use_edit_album="";

$privacy_configuration="big";
$privacy_source="hps"; //wall uploader

$extra_param="";

$shared_privacy="";

include("buttons/privacy_button.php");


echo'
<input type="hidden" name="ptype" value="'.$ltypev.'" autocomplete="off"><input type="hidden" name="sbid" value="'.$sbid.'" autocomplete="off"><input type="hidden" name="privacy" value="'.$privacy["privacy"].'" autocomplete="off"><input type="hidden" name="privacyh" value="'.$privacy["privacyh"].'" autocomplete="off">

</div>
';


echo'
<div class="composerAudienceWrapper audienceopacity1h stat_elem widget">
<div class="selector uiSelector inlineBlock audienceSelector uiSelectorNormal audienceSelectorNoTruncate dynamicIconSelector uiSelectorRight uiSelectorDynamicLabel uiSelectorDynamicTooltip hidden_sb" id="j_68_6"><div class="wrap"><a data-hover="tooltip" aria-label="Everyone" data-tooltip-alignh="right" class="uiButton uiSelectorButton uiButtonSuppressed find_contact" href="#" role="button" aria-haspopup="1" aria-expanded="false" data-t_reload="f" data-t_text="" data-label="" data-length="30" rel="toggle"><i class="mrs defaultIcon customimg img mundop"></i><span class="uiButtonText">Everyone</span></a><div class="hidden_sb tooltip_text">Everyone</div>


<div class="uiSelectorMenuWrapper uiToggleFlyout">
<div role="menu" class="uiMenu uiSelectorMenu">
<ul class="uiMenuInner">
<li class="uiMenuItem uiMenuItemRadio uiSelectorOption sbPrivacyAudienceSelectorOption checked" data-label="Everyone">
<a class="itemAnchor itemWithIcon npjax" role="menuitemradio" tabindex="0" href="#" fjax="/ajax/privacy/simple_save.php?id=0" data-a_formo=\'$(this).parents(".composerAudienceWrapper").eq(0).prev(".formo_data").eq(0);\' data-privacy="0" data-tt="Everyone" aria-checked="true" rel="async-post"><i class="mrs itemIcon img mundop"></i><span class="itemLabel fsm">Everyone</span></a></li>
<li class="uiMenuItem uiMenuItemRadio uiSelectorOption sbPrivacyAudienceSelectorOption" data-label="Friends of Friends"><a class="itemAnchor itemWithIcon npjax" role="menuitemradio" data-privacy="4" tabindex="-1" href="#" fjax="/ajax/privacy/simple_save.php?id=4" data-a_formo=\'$(this).parents(".composerAudienceWrapper").eq(0).prev(".formo_data").eq(0);\' data-tt="Friends of Friends" aria-checked="false" rel="async-post"><i class="mrs itemIcon img friendsofsp"></i><span class="itemLabel fsm">Friends of Friends</span></a></li>
<li class="uiMenuSeparator secondaryOption"></li>
</ul>

</div></div>



</div></div>
</div>

<script type="text/javascript">
var path=$("#j_68_6");
$(path).find("[data-privacy='.$privacy["privacy"].']").attr("data-nfjax","t");
$(path).find("[data-privacy='.$privacy["privacy"].']").click();
$(path).find("[data-privacy='.$privacy["privacy"].']").removeAttr("data-nfjax");
$(path).removeClass("hidden_sb");
</script>';


echo'</div></div></li></ul></div></li></ul><div class="_bxv"><div class="_awf"><a class="_awi" href="#" id="u_0_6"><i class="default img sp_9gnlw9 sx_e84268"></i></a></div><div class="_awg"><div class="_awk hidden_sb" id="u_0_a"></div><div class="_awl hidden_sb" id="u_0_b"><img class="img" src="/images/jKEcVPZFk-2.gif" alt="" height="32" width="32"></div></div></div><div class="_26y3 lb"><a class="_8-c" href="/settings/?tab=privacy&amp;privacy_source=privacy_lite">See More Settings</a></div></div></div>

</div>

</div>

<span style="position:relative;top:0px;left:0px;margin:0;padding:0;float:left;" id="accountwrapper" class="aprofilepic lw">
<a href="#" class="navLink" id="pulldown2" style="padding-right:23px;padding-left:10px;line-height:30px;display:inline-block;">
<span style="position:relative;top:0px;vertical-align:middle;">
Account
<i class="pinchoacc" style="padding:0;" id="pinchoacc"></i>

</span>
</a>
</span>

<script type="text/javascript">
$(document).on("click","#pulldown2",function(e){
	var dis=$("#pulldown").css("opacity");
	if(dis=="0"){
	showlogout();
	}
	else{
	hidelogout();
	}
e.stopPropagation();
});
</script>

</div>

</div>
';

echo'	<script type="text/javascript">

			$(function() {

		$("#dquery").autocomplete({
			minLength: 1,
			autoFocus:true,
			appendTo: $("#dquery").parent(),
			source: "/autocomplete/jump_note.php?aemail=t&info_lines=t&dmax=8&fheader=t",
				open: function(event, ui){
					var where=$("#dquery").parent().children(".ui-autocomplete");
					$(where).prepend(\'<li style="background:#f2f2f2;color:#000000;padding-top:1px;padding-left:7px;padding-bottom:3px;font-weight:bold;" id="peopleh">People</li>\');
					$(where).css("width","350px");

								var ot=$(where).offset().top;
								var nt=ot+3;
								$(where).css("top",nt+"px");
				var ol=$(where).offset().left;
								var nl=ol-6;
								$(where).css("left", nl+"px");
						},
			focus : function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				$( "#dquery" ).val( "" );
				var c=retcount();
				$("body").prepend(\'<a href="/\'+ui.item.url+\'" id="ac\'+c+\'"></a>\');
				$("#ac"+c).click();
				return false;
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			$(ul).css("position","fixed");
			$(ul).css("margin-right","5px");
			$(ul).css("margin-bottom","-7px");

			if(item.imgurl.length>0){
			return $( \'<li style="cursor:pointer;padding:0;width:350px!important;border-collapse:collapse;" id="rs_auto_\'+item.nameid+\'"></li>\' )
				.data( "ui-autocomplete-item", item )
				.append( \'<a class="clearfix"><img src="\'+item.imgurl+\'" style="width:50px;height:50px;float:left;"><div class="clearfix"><div style="float:left;position:relative;margin-left:5px;font-weight:bold;">\'+item.value+\'</div></div></a>\' )
				.appendTo( ul );


			}
			else{
				return $( "<li style=\\"cursor:pointer;background:#f2f2f2;border-top:1px solid #c9c9c9;padding:0;padding-top:6px;padding-bottom:8px;\\" onmouseover=\'this.style.background=\\"#6d84b4\\"; this.style.color=\\"#ffffff\\"; $(this).find(\\"a\\").css(\\"background\\",\\"#6d84b4\\"); $(\\"#showmorer\\").css(\\"color\\",\\"#ffffff\\"); $(\\"#morerrv\\").css(\\"color\\",\\"#ffffff\\");  $(\\"#morerrvv\\").css(\\"color\\",\\"#ffffff\\");\' onmouseout=\'this.style.background=\\"#f2f2f2\\"; this.style.color=\\"gray\\"; $(this).find(\\"a\\").css(\\"background\\",\\"#f2f2f2\\"); $(\\"#showmorer\\").css(\\"color\\",\\"gray\\"); $(\\"#morerrv\\").css(\\"color\\",\\"#3b5998\\");  $(\\"#morerrvv\\").css(\\"color\\",\\"gray\\");\'></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a style="border-top-color:transparent!important;border-bottom-color:transparent!important;">\' + \'<div style="position:relative;top:0px;right:0px;font-weight:bold;color:gray;" id="showmorer"onmouseover=\\\'this.style.color="#ffffff"; $("#showmorer").css("color","#ffffff"); $("#morerrv").css("color","#ffffff");  $("#morerrvv").css("color","#ffffff");\\\' onmouseout=\\\'this.style.color="gray"; $("#showmorer").css("color","gray"); $("#morerrv").css("color","#3b5998");  $("#morerrvv").css("color","gray");\\\'>\'+item.value + \'</div></a>\' )
				.appendTo( ul );
			}

		};
	});
</script>';


echo'
</div>
<div style="position:absolute;top:41px;right:0px;background:#ffffff;border:1px solid #333333;border-bottom:2px solid #333333;" class="hidden_sb" id="pulldown">
<a href="/'.$un.'" style="text-decoration:none!important;">
<div style="margin:0;padding:0;display:inline-block;padding:4px 10px 5px;padding-bottom:8px;margin-top:6px;cursor:pointer;" onclick="window.location=\'/'.$un.'\'">
<img src="/'.$uid.'/pics/'.$profilephoto.'" style="width:50px;height:50px;">
</div>
</a>

<div style="display:inline-block;margin:0;padding:0;vertical-align:top;margin-top:14px;position:relative;left:-4px;" class="linkbig"><a href="/'.$un.'">'.$fullname.'</a></div>

<ul style="margin:0;padding:0;margin-top:-6px;">
<li class="divider" style="height:1px;position:relative;top:2px;width:196px;margin-left:4px;margin-right:4px;"></li>
</ul>';
/*
<span class="logout" style="position:relative;top:1px;height:auto;">
<a href="/">Use Upfrev as Page</a>
</span>
<span class="logout" style="position:relative;top:1px;height:auto;">
<a href="/">Create an Ad</a>
</span>
*/

echo'
<span class="logout" style="position:relative;top:1px;height:auto;">
<a href="/settings.php?ref=mb">Account Settings</a>
</span>
<span class="logout" style="position:relative;top:1px;height:auto;">
<a href="/settings?tab=privacy&ref=mb&privacy_source=settings_menu">Privacy Settings</a>
</span>
<span class="logout" style="position:relative;top:1px;height:auto;">
<a href="/logout.php" class="npjax">Log Out</a>
</span>
<div style="height:5px;margin:0;padding:0;"></div>
</div>
</div>
</div>
</div>
</div>
</div>

<div style="height:41px;width:0;line-height:41px;padding:0;margin:0;visibility:hidden;" id="taquito"></div>
<script type="text/javascript">
var dheight=$("#head_content").height();
$("#taquito").css("height",dheight);
$("#taquito").css("line-height",dheight);';
echo'
</script>
<div onclick="" id="awrap" style="position:relative;margin-left:0px;width:980px;padding-top:0px;">
';



$uidvav='albums';

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='Wall Photos'");

while($m=mysql_fetch_array($r)){
$albumid=$m['sbid'];
}


if($uid==$uidv){}
else{
$addphoto='<div class="addphotoimg"></div><a href="/add_photos.php?album='.$albumid.'">Add Photo</a>';
//not account owner
$flag='n';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$r = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");

while($m = mysql_fetch_array($r))
	{
if($m['id2']==$uid){
//friends
$flag='y';
break;
}

	}
mysql_close($con);

if($flag=='y'){}

/*add friend
else{
echo'<form action="addfriend.php" method="POST" style="display:inline;margin:0;padding:0;"><input autocomplete="off" type="hidden" value="'.$uidv.'" name="uidv" id="uidv"><input autocomplete="off" type="submit" value="Add friend"></form>';}
*/
}




$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");



mysql_close($con);

echo'
<script type="text/javascript">
function show_msg_dialogv(id,fullname){
$("#fullnamebt").html(fullname);
$("#tov").val("id");
$("#messagev").val("Send Birthday Wish");
$("#messagev").css("height","34px");
$("#pop_containervv").css("height","127px");
$("#div_dialog_bodyv").css("height","34px");

$("#pop_containervv").css("display","block");
}

function cleant(){
var tocheck=$("#messagev").val();
tocheck=$.trim(tocheck);
if(tocheck=="Send Birthday Wish"){$("#messagev").val(""); $("#messagev").css("color","#333333");}
}

function cleantv(){
var tocheck=$("#messagev").val();
tocheck=$.trim(tocheck);
if(tocheck==""){$("#messagev").css("color","#777777"); $("#messagev").val("Send Birthday Wish");}
}



function fadeoutv(){
	$("#pop_containervvv").fadeOut("slow");
}

function send_msgv(){
var to=$("#tov").val();
var message=$("#messagev").val();

$.ajax({
	async: "false",
	type: "POST",
	url: "/writeonwall.php",
	data: { duser : to, message : message },
	success: function(data) {
$("#pop_containervv").css("display","none");
$("#pop_containervvv").css("display","block");
setTimeout("fadeoutv()",1500);
	}
});

}
</script>

<div style="position:relative;">
<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:580px;height:100%;z-index:302;margin:0 auto;" id="width_msgv">

<div class="pop_container" id="pop_containervvv" style="height:auto;display:none;position:fixed;"><div class="div_dialog_header">Message Sent</div><div class="div_dialog_body" id="div_dialog_bodyvv" style="height:auto;color:#333333;font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;">Your message was succesfully sent!</div></div>

<div class="pop_container" id="pop_containervv" style="height:214px;display:none;position:fixed;"><div class="div_dialog_header" id="div_dialog_headerv">Post on <span id="fullnamebt"></span>\'s wall</div>
<div class="div_dialog_body" id="div_dialog_bodyv" style="height:119px;">
<table style="margin-left:0px;margin-top:0px;position:relative;top:-3px;left:-3px;">';

echo'<tr><td><input autocomplete="off" type="hidden" class="towrite" id="tov" name="tov"><textarea autocomplete="off" name="messagev" id="messagev" onfocus="cleant();" onblur="cleantv();" data-au_grow="" data-au_nopadding="" style="height:
34px;min-height:34px;width:379px;max-height:480px;color:#333333;cursor:text;margin-left:0px;border:1px solid #bdc7d8;color:#777777;" class="textwrite"></textarea></td><tr><td colspan="2" style="text-align:right;"></td></table>';


echo'
</div><div class="div_dialog_footer" style="height:25px;" id="div_dialog_footerv"><label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="send_msgv();"><input autocomplete="off" type="button" value="Share" class="uiButtonText"></label><label class="fsl uiButton" onclick="close_msgv();" style="position:absolute;right:23px;"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label></div></div></div></div></div>';

echo'


<div id="pre_pop_container2dpg" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owidth_msgv2dpg">

<div class="pop_container3" id="pop_containervvo2dpg" style="height:109px;display:block;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervo2dpg">Delete Photo</div>
<div class="div_dialog_body3" id="div_dialog_bodyvo2dpg" style="height:14px;">Are you sure you want to delete this photo?</div><div class="div_dialog_footer3" style="height:28px;" id="div_dialog_footervo2dpg"></div></div></div></div>

</div>

<div style="position:relative;">
<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:560px;height:100%;z-index:302;margin:0 auto;" id="width_msgvv">

</div></div></div>

<div id="pre_pop_container2" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owidth_msgv">

<div class="pop_container3" id="pop_containervvo" style="height:109px;display:block;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervo">Delete <span id="delwhat"></div>
<div class="div_dialog_body3" id="div_dialog_bodyvo" style="height:14px;">Are you sure you want to delete this <span id="delwhat2"></span>?


</div><div class="div_dialog_footer3" style="height:28px;" id="div_dialog_footervo"></div></div></div></div>

</div>

';




echo'
<div style="position:relative;">
<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:580px;height:100%;z-index:602;margin:0 auto;" id="swidth_msgv">


</div></div></div>';

echo'
<script type="text/javascript">



function show_msg_dialogs_note(uidv,did,uidvn,content,title,x){

var e=\'<div id="dialog_wrapper\'+x+\'" style="margin:0;padding:0;z-index:602;"><div class="pop_container" id="loading_\'+x+\'" style="height:auto;display:block;position:fixed;width:465px;"><div class="loading_div_dialog">Loading...</div></div><div class="pop_container" id="spop_containerv\'+x+\'" style="height:auto;display:none;position:fixed;width:465px;z-index:602;"><div class="div_dialog_header">Success</div><div class="div_dialog_body" id="sdiv_dialog_bodyv\'+x+\'" style="height:auto;color:#333333;font-size:11px;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif;background:#FFF9D7;">This was succesfully posted to your profile.</div></div><div class="pop_container hidden_sb" id="spop_containervv\'+x+\'" style="height:auto;display:block;position:fixed;width:465px;z-index:602;"><div class="div_dialog_header" id="div_dialog_headerv\'+x+\'">Share This <span id="whatisits\'+x+\'"></span></div><div class="div_dialog_body" id="sdiv_dialog_bodyvv\'+x+\'" style="height:auto;"><div style="margin:0;margin-bottom:0px;padding:0;padding-bottom:10px;"><div class="librito"></div>Share: <span class="wtshare" style="line-height:13px;text-align:center;color:rgb(51,51,51);display:inline-block;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif;font-size:11px;font-weight:bold;">On your own Wall</span></div><table style="margin-left:30px;margin-top:0px;position:relative;top:0px;left:0px;"><tr><td><input autocomplete="off" type="hidden" class="towrite" id="tov\'+x+\'" name="tov"><textarea autocomplete="off" name="messagevs" id="messagevs\'+x+\'" data-au_grow="" data-au_nopadding="" style="max-height:480px;width:379px;cursor:text;margin-left:0px;border:1px solid #bdc7d8;" class="textwrite dcphc" title="Write something..." placeholder="Write something...">Write something...</textarea></td><tr><td colspan="2" style="text-align:right;"></td></table><div style="margin:0;padding:0;margin-left:33px;margin-top:2px;" class="share_dialog"><div id="fromm\'+x+\'" style="margin:0;padding:0;display:inline-block;color:#000000;font-weight:bold;font-size:12px;vertical-align:top;margin-left:2px;max-width:400px;word-wrap:break-word;"></div></div></div><div class="div_dialog_footer" style="height:25px;" id="sdiv_dialog_footerv\'+x+\'"><label class="fsl uiButton" style="float:right;" onclick="close_msgvs(\\\'\'+x+\'\\\');"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label><label class="fsl uiButton uiButtonConfirm mrs" style="float:right;" id="sharebtd\'+x+\'"><input autocomplete="off" id="sharebtdv\'+x+\'" type="button" value="Share" class="uiButtonText"></label></div></div></div>\';

var spoph=$("#spop_containervv"+x).css("height");
var ftime="";
if(spoph===undefined){
	var ftime="a";
	$("#swidth_msgv").append(e);
}



$.ajax({
	async: "false",
	type: "POST",
	url: "/show_msg_dialogs/show_msg_dialogs_sharew.php",
	data: {}
}).done(function(response){
var res=$.parseJSON(response);
$("#sharebtd"+x).after(res.privacy_button);

$("#messagevs"+x).blur();

$("#loading_"+x).addClass("hidden_sb");

var minipw=50;
var miniph=50;

$("#spop_containervv"+x).removeClass("hidden_sb");

$("#whatisits"+x).html("Note");

$(\'#fromm\'+x).html(title+\'<br><div style="color:#808080;margin:0;padding:0;font-weight:normal;font-size:11px;position:relative;top:-1px;">By \'+uidvn+\'</div><div style="margin:0;padding:0;margin-top:5px;color:#333333;font-size:11px;font-weight:normal;">\'+content+\'</div>\');

$("#sharebtdv"+x).val("Share Note");

if(ftime=="a"){
$("#sharebtd"+x).click(function () {
var valu=$("#messagevs"+x).val();
if(valu=="Write something..."){valu="";}
var privacy=$("#sharebtd"+x).parents(".pop_container").eq(0).find("input[name=privacy]").val();
var privacyh=$("#sharebtd"+x).parents(".pop_container").eq(0).find("input[name=privacyh]").val();
sharew(uidv,did,valu,\'shared_notes\',privacy,privacyh);
	$("#spop_containervv"+x).css("display","none");
	$("#spop_containerv"+x).css("display","block");
$("#spop_containerv"+x).delay(1500).fadeOut("slow");
$.doTimeout( 2200, function(){
$("#dialog_wrapper"+x).remove();
});

	});
}

});


}



function show_msg_dialogs_status(profilepict,uidv,did,uidvn,statusupdate,x){
console.log(x);
var e=\'<div id="dialog_wrapper\'+x+\'" style="margin:0;padding:0;z-index:602;"><div class="pop_container" id="loading_\'+x+\'" style="height:auto;display:block;position:fixed;width:465px;"><div class="loading_div_dialog">Loading...</div></div><div class="pop_container" id="spop_containerv\'+x+\'" style="height:auto;display:none;position:fixed;width:465px;z-index:602;"><div class="div_dialog_header">Success</div><div class="div_dialog_body" id="sdiv_dialog_bodyv\'+x+\'" style="height:auto;color:#333333;font-size:11px;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif;background:#FFF9D7;">This was succesfully posted to your profile.</div></div><div class="pop_container hidden_sb" id="spop_containervv\'+x+\'" style="height:auto;display:block;position:fixed;width:465px;z-index:602;"><div class="div_dialog_header" id="div_dialog_headerv\'+x+\'">Share This <span id="whatisits\'+x+\'"></span></div><div class="div_dialog_body" id="sdiv_dialog_bodyvv\'+x+\'" style="height:auto;"><div style="margin:0;margin-bottom:0px;padding:0;padding-bottom:10px;"><div class="librito"></div>Share: <span class="wtshare" style="line-height:13px;text-align:center;color:rgb(51,51,51);display:inline-block;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif;font-size:11px;font-weight:bold;">On your own Wall</span></div><table style="margin-left:30px;margin-top:0px;position:relative;top:0px;left:0px;"><tr><td><input autocomplete="off" type="hidden" class="towrite" id="tov\'+x+\'" name="tov"><textarea autocomplete="off" name="messagevs" id="messagevs\'+x+\'" data-au_grow="" data-au_nopadding="" style="max-height:480px;width:379px;cursor:text;margin-left:0px;border:1px solid #bdc7d8;" class="textwrite dcphc" title="Write something..." placeholder="Write something...">Write something...</textarea></td><tr><td colspan="2" style="text-align:right;"></td></table><div style="margin:0;padding:0;margin-left:33px;margin-top:2px;"><div id="minip\'+x+\'" style="margin:0;padding:0;display:inline-block;"></div><div id="fromm\'+x+\'" style="margin:0;padding:0;display:inline-block;color:#000000;font-weight:bold;font-size:12px;vertical-align:top;margin-left:10px;max-width:400px;word-wrap:break-word;"></div></div></div><div class="div_dialog_footer" style="height:25px;" id="sdiv_dialog_footerv\'+x+\'"><label class="fsl uiButton" style="float:right;" onclick="close_msgvs(\\\'\'+x+\'\\\');"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label><label class="fsl uiButton uiButtonConfirm mrs" style="float:right;" id="sharebtd\'+x+\'"><input autocomplete="off" id="sharebtdv\'+x+\'" type="button" value="Share" class="uiButtonText"></label></div></div></div>\';

var spoph=$("#spop_containervv"+x).css("height");
var ftime="";
if(spoph===undefined){
	var ftime="a";
	$("#swidth_msgv").append(e);
}

$.ajax({
	async: "false",
	type: "POST",
	url: "/show_msg_dialogs/show_msg_dialogs_sharew.php",
	data: {}
}).done(function(response){
var res=$.parseJSON(response);
$("#sharebtd"+x).after(res.privacy_button);

$("#messagevs"+x).blur();

$("#loading_"+x).addClass("hidden_sb");

var minipw=50;
var miniph=50;

$(\'#minip\'+x).html(\'<img src="/\'+uidv+\'/pics/\'+profilepict+\'" style="width:\'+minipw+\'px;height:\'+miniph+\'px;">\');

$("#spop_containervv"+x).removeClass("hidden_sb");

$("#whatisits"+x).html("Status");

$(\'#fromm\'+x).html(\'Status Update <br><div style="color:#808080;margin:0;padding:0;font-weight:normal;font-size:11px;position:relative;top:-1px;">By \'+uidvn+\'</div><div class="dstatus" style="margin:0;padding:0;margin-top:5px;color:#333333;font-size:11px;font-weight:normal;"></div>\');

var dhtml=$(".dstatus"+x).html();
dhtml=dhtml.substr(0,240);
$("#sharebtd"+x).parents(".pop_container").eq(0).find(".dstatus").html(dhtml);

$("#sharebtdv"+x).val("Share Status");

if(ftime=="a"){
$("#sharebtd"+x).click(function () {
var valu=$("#messagevs"+x).val();
if(valu=="Write something..."){valu="";}
var privacy=$("#sharebtd"+x).parents(".pop_container").eq(0).find("input[name=privacy]").val();
var privacyh=$("#sharebtd"+x).parents(".pop_container").eq(0).find("input[name=privacyh]").val();
sharew(uidv,did,valu,\'shared_status_update\',privacy,privacyh);
	$("#spop_containervv"+x).css("display","none");
	$("#spop_containerv"+x).css("display","block");
$("#spop_containerv"+x).delay(1500).fadeOut("slow");
$.doTimeout( 2200, function(){
$("#dialog_wrapper"+x).remove();
});

	});
}

		});
}

function close_msgvs(x){
$("#spop_containervv"+x).fadeOut("slow",function(){
$("#dialog_wrapper"+x).remove();
});
}

function show_msg_dialogs(albumid,w,uidv,photoid,pq,x,vidl,vidt,vidd,pin){

var e=\'<div id="dialog_wrapper\'+x+\'" style="margin:0;padding:0;z-index:602;"><div class="pop_container" id="loading_\'+x+\'" style="height:auto;display:block;position:fixed;width:465px;"><div class="loading_div_dialog">Loading...</div></div><div class="pop_container" id="spop_containerv\'+x+\'" style="height:auto;display:none;position:fixed;width:465px;z-index:602;"><div class="div_dialog_header">Success</div><div class="div_dialog_body" id="sdiv_dialog_bodyv\'+x+\'" style="height:auto;color:#333333;font-size:11px;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif;background:#FFF9D7;">This was succesfully posted to your profile.</div></div><div class="pop_container hidden_sb" id="spop_containervv\'+x+\'" style="height:auto;display:block;position:fixed;width:465px;z-index:602;"><div class="div_dialog_header" id="div_dialog_headerv\'+x+\'">Share this <span id="whatisits\'+x+\'"></span></div><div class="div_dialog_body" id="sdiv_dialog_bodyvv\'+x+\'" style="height:auto;"><div style="margin:0;margin-bottom:0px;padding:0;padding-bottom:10px;"><div class="librito"></div>Share: <span class="wtshare" style="line-height:13px;text-align:center;color:rgb(51,51,51);display:inline-block;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif;font-size:11px;font-weight:bold;">On your own Wall</span></div><table style="margin-left:30px;margin-top:0px;position:relative;top:0px;left:0px;"><tr><td><input autocomplete="off" type="hidden" class="towrite" id="tov\'+x+\'" name="tov"><textarea autocomplete="off" name="messagevs" id="messagevs\'+x+\'" data-au_grow="" data-au_nopadding="" style="max-height:480px;width:379px;cursor:text;margin-left:0px;border:1px solid #bdc7d8;" class="textwrite dcphc" title="Write something..." placeholder="Write something...">Write something...</textarea></td><tr><td colspan="2" style="text-align:right;"></td></table><div style="margin:0;padding:0;margin-left:33px;margin-top:2px;"><div id="minip\'+x+\'" style="margin:0;padding:0;display:inline-block;"></div><div id="fromm\'+x+\'" style="margin:0;padding:0;display:inline-block;color:#000000;font-weight:bold;font-size:12px;vertical-align:top;margin-left:8px;max-width:400px;word-wrap:break-word;"></div></div></div><div class="div_dialog_footer" style="height:25px;" id="sdiv_dialog_footerv\'+x+\'"><label class="fsl uiButton" style="float:right;" onclick="close_msgvs(\\\'\'+x+\'\\\');"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label><label class="fsl uiButton uiButtonConfirm mrs" style="float:right;" id="sharebtd\'+x+\'"><input autocomplete="off" type="button" value="Share" class="uiButtonText"></label></div></div></div>\';

var spoph=$("#spop_containervv"+x).css("height");
var ftime="";
if(spoph===undefined){
	var ftime="a";
	$("#swidth_msgv").append(e);
}


$.ajax({
	async: "false",
	type: "POST",
	url: "/show_msg_dialogs/show_msg_dialogs.php",
	data: {albumid:albumid,w:w,uidv:uidv,photoid:photoid}
}).done(function(response){
var res=$.parseJSON(response);

$("#messagevs"+x).blur();

$("#sharebtd"+x).after(res.privacy_button);

$("#loading_"+x).addClass("hidden_sb");

var minip=res.picsa;
var minipw=res.width;
var miniph=res.height;
var albumn=res.albumn;
var uidvn=res.fullname;
var desc=res.descr;

var minipw=Math.floor(minipw/4.5);
var miniph=Math.floor(miniph/4.5);

$(\'#minip\'+x).html(\'<img src="/\'+uidv+\'/pics/\'+minip+\'" style="width:\'+minipw+\'px;height:\'+miniph+\'px;">\');

$("#spop_containervv"+x).removeClass("hidden_sb");

if(w=="shared_photo"){

if(pin==2){
var dtext="Pin";
var dtextv="From the board:";
var dtextvv="Share Pin";
}else{
var dtext="Photo";
var dtextv="From the album:";
var dtextvv="Share Photo";
}

$("#whatisits"+x).html(dtext);

$(\'#fromm\'+x).html(dtextv+\' <span style="color:#808080;">\'+albumn+\'</span><br><div style="color:#808080;margin:0;padding:0;font-weight:normal;font-size:11px;position:relative;top:-1px;">By: \'+uidvn+\'</div><div style="margin:0;padding:0;margin-top:5px;color:#333333;font-size:11px;font-weight:normal;">\'+desc+\'</div>\');

$("#sharebtd"+x).find("input").val(dtextvv);

}
else if(w=="shared_video"){
$("#whatisits"+x).html("Video");

$(\'#fromm\'+x).css("margin","0");
$(\'#fromm\'+x).css("margin-top","8px");

$(\'#fromm\'+x).css("display","block");

$(\'#fromm\'+x).html(vidt+\'<br><div style="color:#808080;margin:0;padding:0;font-weight:normal;font-size:11px;position:relative;top:-1px;">By \'+uidvn+\'</div><div style="margin:0;padding:0;margin-top:3px;color:#333333;font-size:11px;">\'+vidl+\' <span style="color:#808080;font-weight:normal">Added \'+vidd+\'</span></div>\');

$("#sharebtd"+x).find("input").val("Share Video");
}
else if(w=="shared_album"){
$("#whatisits"+x).html("Album");
if(pq>1){var plural="s";}
else{var plural="";}
$(\'#fromm\'+x).html(\'\'+albumn+\'<br><div style="color:#808080;margin:0;padding:0;font-weight:normal;font-size:11px;position:relative;top:-1px;">By: \'+uidvn+\'</div><div style="color:#808080;margin:0;padding:0;margin-top:5px;font-weight:normal;font-size:11px;position:relative;top:-2px;">\'+pq+\' photo\'+plural+\'</div><div style="margin:0;padding:0;margin-top:5px;color:#333333;font-size:11px;font-weight:normal;">\'+desc+\'</div>\');

$("#sharebtd"+x).find("input").val("Share Album");

}
if(ftime=="a"){
$("#sharebtd"+x).click(function () {
var valu=$("#messagevs"+x).val();
if(valu=="Write something..."){valu="";}
var privacy=$("#sharebtd"+x).parents(".pop_container").eq(0).find("input[name=privacy]").val();
var privacyh=$("#sharebtd"+x).parents(".pop_container").eq(0).find("input[name=privacyh]").val();
share(albumid,w,uidv,photoid,valu,privacy,privacyh);
	$("#spop_containervv"+x).css("display","none");
	$("#spop_containerv"+x).css("display","block");
$("#spop_containerv"+x).delay(1500).fadeOut("slow");
$.doTimeout( 2200, function(){
$("#dialog_wrapper"+x).remove();
});

	});
}

});



}
function validateEmail(elementValue){
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	return emailPattern.test(elementValue);
}
</script>';


echo'
<script type="text/javascript">
function rcount(){
var count=Math.random();
count=count.toString();
count=count.replace(".","");
return count;
}
</script>
';

include("components/modal_header.php");
echo $sechov;

echo'
<div style="position:relative;">
<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owidth_msgvr">

<div class="pop_container3" id="pop_containervvor" style="height:auto;display:none;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervor">Remove <span class="wremove" style="padding:0;margin:0;"></span> as a friend?</div>
<div class="div_dialog_body3" id="div_dialog_bodyvor" style="height:auto;"><div style="float:left;margin-right:10px;" id="wremovei"></div>Are you sure you want to remove <span class="wremove" style="padding:0;margin:0;"></span> as your friend?

</div><div class="div_dialog_footer3" style="height:28px;" id="div_dialog_footervor"></div></div></div></div></div>


<div id="ppc_edita" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owm_edita">

<div class="pop_container3" id="ppci_edita" style="height:auto;display:block;position:fixed;"><div class="div_dialog_header3" id="ddh_edita">Edit Album</div>
<div class="div_dialog_body3" id="ddb_edita" style="height:auto;">

<table style="margin:0;padding:0;border: 0px none;border-collapse: collapse;border-spacing: 0px;width: 100%;" cellspacing="0" cellpadding="0">
<tr>
<th class="editath" style="padding-right:12px;" id="dalbum_name">Album Name:</th>
<td class="editatd"><input type="text" id="albname_edita" class="editain" style="color:#333333;"></td>
</tr>
<tr>
<th class="editath" style="padding-right:12px;">Where:</th>
<td class="editatd"><div id="editpiw300003" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;top:0px;margin-top:0px;margin-right:12px;float:right;width:288px;"><div id="editpiwv300003" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;height:22px;top:0px;"><label id="removeedit300003" class="removeedit" style="display:none;z-index:10;" title="Remove" onclick="swapc(1,300003);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label><input type="text" id="city300003" class="editain" style="color:#333333;width:250px!important;background:transparent;" onfocus="cto(this.id,\'Where were these photos taken?\');" onblur="ctov(this.id,\'Where were these photos taken?\',\'#999999\');"></div></div><input autocomplete="off" type="hidden" id="statec300003"><input autocomplete="off" type="hidden" id="countryc300003"><input autocomplete="off" type="hidden" id="cityc300003"><input autocomplete="off" type="hidden" id="stateedit300003"><input autocomplete="off" type="hidden" id="cityv300003"><input autocomplete="off" type="hidden" id="edita_albumid"></td>
</tr>
<tr>
<th class="editath" style="padding-right:12px;" style="color:#333333;">Description:</th>
<td class="editatd">

<div style="position:relative;margin-bottom:12px;">
<div class="highlighter_wrapper" style="position:relative;height:51px;"><div class="highlighter" style="padding:0;position:absolute;width:258px;overflow-y:hidden;max-height:95px;padding-top:1px;"><div style="width:auto;min-height:21px;"><span class="highlighterContent" style="max-width:100%;vertical-align:top;display:inline-block;position:relative;top:3px;color:transparent;font-size:11px!important;padding:0 4px;line-height:13px!important;"></span><div class="highlighterAuxContent" style="vertical-align:top;display:inline-block;position:relative;"><div class="metadataFragment"></div></div></div></div><div style="background: none repeat scroll 0% 0% transparent;height:auto;border:0px none;" class="uiTypeahead composerTypeahead mentionsTypeahead"><div style="padding:0px;border:0px none;" class="step_autocomplete"><div style="overflow:hidden;cursor:default;"><textarea style="cursor:text;visibility:visible;z-index:5;border:1px solid rgb(189, 199, 216);display:block;position:relative;width:258px;max-height:100px;background-color:transparent;resize:none;" class="uiTextareaAutogrow input mentionsTextarea textInput editate dcphmgc to_highlighter" data-au_grow="" data-au_nopadding="t" title="Add details about this album..." placeholder="Add details about this album..." autocomplete="off" id="descr_edita" onfocus="cto(this.id,\'Add details about this album...\');" onblur="ctov(this.id,\'Add details about this album...\',\'rgb(119, 119, 119)\');"></textarea></div></div><div><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;line-height:13px!important;" class="autocomplete_findme inputtext dcphlgc displaynoneimportant hidden_sb" data-ac_enable="wall_uploaderdv30002" data-ac_liwidth="256" data-ac_inputw="280" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_custom_f="add_to_highlighter" data-ac_placeholder="Who where you with?" data-ac_position="fixed" data-ac_custom_ul=\'$(this).css("margin-left","-1px"); $(this).css("margin-top","-14px");\'></div><input type="hidden" name="descriptionv" autocomplete="off"></div></div></div>
</div>

<script type="text/javascript">
$("#descr_edita").bind("keyup",to_highlighter_keyup);
$("#descr_edita").bind("scroll",keep_scroll_to_highlighter);
$("#descr_edita").bind("keyup",keep_scroll_to_highlighter);
$(document).ready(function(){
$("#ppc_edita").addClass("hidden_sbs");
$("#ppc_edita").css("display","block");
$("#descr_edita").trigger("keydown");
$("#descr_edita").trigger("keyup");
$("#ppc_edita").css("display","none");
$("#ppc_edita").removeClass("hidden_sbs");
});
</script>

</td>
</tr>
<tr>
<th class="editath" style="padding-right:12px;" style="color:#333333;">Privacy:</th>
<td class="editatd"></td>
</tr>
</table>


</div><div class="div_dialog_footer3" style="height:28px;text-align:right;" id="ddf_edita"><div class="edital" style="color:gray;"><div style="color: gray;font-weight: normal;font-size: 11px;line-height: 17px;text-align: right;" class="editalv"><a href="#" id="edita_l">Edit Photos</a> &#183; <a href="#" id="edita_l2">Delete Album</a></div></div><label class="editasv" onclick="" id="editasv"><input value="Save" name="submit" type="button" class="editasv2"></label><label class="editacn" onclick="cancel_edita();"><input value="Cancel" name="cancel" type="button"></label></div></div></div></div>

</div>

<div id="ppc_edita2" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owm_edita2">

<div class="pop_container3" id="ppci_edita2v" style="height:78px;display:none;position:fixed;"><div class="div_dialog_header3">Processing Your Request</div><div class="div_dialog_body3" id="ddb_edita2v" style="height:28px;color:#333333;font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;">This will just take a moment</div></div>

<div class="pop_container3" id="ppci_edita2" style="height:auto;display:block;position:fixed;"><div class="div_dialog_header3" id="ddh_edita2">Edit Album</div>
<div class="div_dialog_body3" id="ddb_edita2" style="height:auto;">

Are you sure you want to delete <span id="delw_edita"></span>?

</div><div class="div_dialog_footer3" style="height:28px;text-align:right;" id="ddf_edita2"><label class="editasv" onclick="" id="editasv2"><input value="Delete Album" name="submit" type="button" class="editasv2" id="del_album_input"></label><label class="editacn" onclick="cancel_edita2();"><input value="Cancel" name="cancel" type="button"></label></div></div></div></div>

</div>


<div class="div_clone hidden_sb"></div>';
?>