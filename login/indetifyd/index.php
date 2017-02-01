<?php
include("populate_page.php");
include("functions/sb_user.php");
include("security/provide_pass.php");
$publicKey = rand()%9;
$privateKey = 0.9;
$token = sha1( $publicKey * $privateKey + $privateKey );
$params['style']='<link data-h="" media="screen" rel="stylesheet" href="/master/stylesheet.php" type="text/css" />
<script type="text/javascript" src="/jquery.min.js"></script>
<script type="text/javascript" src="/jquery.fjax.js"></script>
<script src="/jquery.hotkeys.js"></script>
<script src="/js/php_js.php"></script>
<style type="text/css">
.loggedout_menubar_container {
background-color: #3b5998;
height: 82px;
min-width: 980px;
}
.loggedout_menubar .sb_logo {
margin-top: 17px;
}
.sb_logo{
width: 104px;
height: 35px;
background-position: 0 0;
background-image: url(/images/logob.png);
background-size: auto;
background-repeat: no-repeat;
display: inline-block;
}
.signupBanner_v1 div.signup_bar_container {
background-color: #3b5998;
}
.signupBanner_v1 .signup_box {
border-top: 1px solid #6684b8;
color: #fff;
font-size: 13px;
font-weight: bold;
margin: 0 auto;
padding: 9px 0;
width: 980px;
}
.signupBanner_v1 .signup_box .signup_btn {
float: left;
}
.uiButtonSpecial {
background-image: url(https://m-static.ak.fbcdn.net/rsrc.php/v2/yf/r/cDUSqVVxJZv.png);
background-repeat: no-repeat;
background-size: auto;
background-position: -352px -152px;
background-color: #69a74e;
border-color: #3b6e22 #3b6e22 #2c5115;
}
.uiButtonSpecial:active{background:#609946;border-bottom-color:#3b6e22}
.signupBanner_v1 .signup_box_content {
float: left;
font-size: 13px;
font-weight: bold;
padding: 4px 14px 6px;
}

#globalContainer {
margin: 0 auto;
position: relative;
zoom: 1;
}
.UIPage_LoggedOut .UIFullPage_Container, .UIPage_LoggedOut .UIStandardFrame_Container {
margin-top: 26px;
}
.UIFullPage_Container {
width: 940px;
padding: 20px 12px 0;
margin: 0 auto;
}

.uiInterstitialLarge {
width: 555px;
}

div.login_page_interstitial {
margin-bottom: 0;
width: 640px;
}
.uiInterstitial {
-webkit-border-radius: 4px;
margin-left: auto;
margin-right: auto;
}

.uiInterstitial .interstitialHeader {
border-color: #ccc;
padding-bottom: .5em;
}
.uiHeaderPage {
padding: 6px 0 16px;
}
.uiHeaderBottomBorder {
border-bottom: 1px solid #aaa;
padding-bottom: .5em;
}
.uiHeaderPage .uiHeaderActions {
margin-top: -1px;
}

.uiInterstitialContent {
margin-bottom: 15px;
}
.login_error_box {
margin-top: 10px;
}
p {
margin: 1em 0;
}
.login_page #loginform {
clear: left;
margin: auto;
padding: 15px 0;
text-align: left;
width: 380px;
}
.form_row {
padding: 0 0 8px 0;
text-align: left;
}
.form_row .login_form_label {
display: block;
float: left;
padding: 3px 0;
width: 100px;
}
body, button, input, label, select, td, textarea {
font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size: 11px;
}
label {
cursor: pointer;
color: #666;
font-weight: bold;
vertical-align: middle;
}
.persistent {
padding: 3px 0 3px 100px;
}
user agent stylesheetdiv {
display: block;
}

.uiInputLabelRadio, .uiInputLabelCheckbox {
float: left;
margin: 0;
padding: 0;
}
#buttons {
padding: 5px 0 0 100px;
text-align: left;
}
.form_row .login_form_label {
display: block;
float: left;
padding: 3px 0;
width: 100px;
}
#buttons label {
float: none;
width: auto;
}
#login_button_inline {
float: left;
margin-bottom: 5px;
margin-right: 5px;
}

#buttons .uiButton {
margin-right: 2px;
}
#buttons label {
float: none;
width: auto;
}
#buttons {
text-align: left;
}
.login_page #loginform p.reset_password {
margin-bottom: 0;
padding-bottom: 0;
}
.login_page #loginform p {
line-height: 16px;
margin: 10px 0;
text-align: left;
}
.reset_password, .not_me_link {
padding-left: 100px;
}
.login_page .localeSelectorList {
margin: 0 auto 40px;
width: 640px;
}
.uiInterstitial {
border-radius: 4px;
margin-left: auto;
margin-right: auto;
}
.uiBoxWhite {
background-color: #fff;
border: 1px solid #ccc;
}
.loggedout_menubar {
margin: 0 auto;
padding-top: 13px;
width: 980px;
}
.uiButtonSpecial .uiButtonText{
color: #fff;
}
#pageFooter{
width:980px;
margin-left:0;
margin:0 auto;	
}
#contentCurve{
margin-top:25px;
height:0px;
}
.logging{
background:#adbad4!important;
border-color:#94a2bf!important;
}
.logging input{
background:#adbad4!important;
}
#register_link {
margin-top: 5px;
float: left;
}
.uiInterstitialBar {
-webkit-border-bottom-right-radius: 3px;
-webkit-border-bottom-left-radius: 3px;
line-height: 16px;
padding: 8px 10px;
}
.uiInterstitialContent {
margin-bottom: 15px;
}
.help_identify .identify_yourself_block {
margin-left: auto;
margin-right: auto;
width: 330px;
}
.help_identify #identify_email {
margin-bottom: 3px;
width: 255px;
position:relative;
left:0px;
bottom:-5px;
}
.menu_login_container label {
color: rgb(255, 255, 255);
font-weight: normal;
padding-left: 1px;
}
.forgot_link a:link {
color: #9FA9CA;
font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size: 11px;
text-decoration: none;
}
.forgot_link a:active {
color: #9FA9CA;
font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size: 11px;
text-decoration: underline;
}
.forgot_link a:visited {
color: #9FA9CA;
font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size: 11px;
text-decoration: none;
}
.forgot_link a:hover {
color: #9FA9CA;
font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size: 11px;
text-decoration: underline;
}
.button_login {
color: #ffffff;
background: none repeat scroll 0% 0% transparent;
border: 0pt none;
cursor: pointer;
display: inline-block;
font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size: 11px;
font-weight: bold;
margin: 0;
padding: 1px 0pt 2px;
white-space: nowrap;
}
.label_button_login {
padding: 2px 6px!important;
}
.label_button_login {
background-image: url("/images/T9SYP2crSuG.png");
bacgkround-repeat: no-repeat;
background-position: 0pt -49px;
background-color: rgb(91,116,168);
border: 1px solid;
border-color: rgb(41, 68, 126) rgb(41, 68, 126) rgb(26, 53, 110);
-moz-border-colors: none;
box-shadow: 0pt 1px 0pt rgba(0,0,0,0.1);
cursor: pointer;
display: inline-block;
line-height: 13px;
padding: 1px 4px;
text-align: center;
text-decoration: none;
vertical-align: top;
white-space: nowrap;
}
.fbLoggedOutAccountBlock td {
vertical-align: middle;
}
.fbLoggedOutAccountAuxContent {
width: 50%;
}
._6b {
vertical-align: middle;
}
._6a {
display: inline-block;
}
._42ef {
overflow: hidden;
}
.fbLoggedOutAccountBlock td {
vertical-align: middle;
}
.fbLoggedOutAccountInfo {
width: 10000px;
}
.uiList > li:first-child {
border-width: 0;
}
</style>
';


$echo.='
<script type="text/javascript">
$(document).on("click", "[fjax]:not([data-nfjax=t])", function(e){
e.preventDefault();
if($(this).hasClass("t_ajaxified")===true){
e.stopPropagation();	
}
$(this).fjax();
});

var timezone=new Date().getTimezoneOffset()/60*-1;
$(".user_timezone").val(timezone);


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

$(".daylight").val(daylight);

$(document).on("submit",".sim_submit",function(e){
e.preventDefault();
e.stopPropagation();
if($(this).find(".strigger").length>0){
$(this).find(".strigger").click();
}
return false;
});

function login_complete(response,org_elem){//alert(response);
var res=$.parseJSON(response);
if(res.success=="t"){
location.reload(true);	
}
else if(res.error!==undefined){

if(res.error=="wrong"){
window.location="/?wp";	
}
else if(res.error=="wrong_password"){
window.location="/?wp";		
}

}
}

function login_loading(org_elem){
$(this).parents("form").eq(0).find(".");
$("#u_0_1").attr("disabled",true); $("#loginbutton").addClass("logging");
}


function validateEmail(elementValue){
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	return emailPattern.test(elementValue);
}

function submitonenter(){
var login_email=$("#login_email").val();
var login_password=$("#login_password").val();
if((login_password=="") || (login_email=="") || (validateEmail(login_email)===false)){
$("#fill_fields").css("display","block");
return false;
}
else{$("#fill_fields").css("display","none"); $(".button_login").attr("disabled",true); $(".label_button_login").addClass("logging");
$("#enter_gateway").click();
return false;
}
}

$(document).on("click","[data-cf]",function(){
if(strpos($(this).attr("data-cf"),"(")===false){
window[$(this).attr("data-cf")]();
}
else{
eval($(this).attr("data-cf"));	
}
});

function login_back(){
$(".sb_content").eq(0).remove();	
$(".sb_content").eq(0).removeClass("hidden_sb");
}
</script>';

$echo.='
<div id="enter_gateway" class="hidden_sb" fjax="/index.php" data-a_form="login" data-a_custom_f="login_complete"></div>

<div class="loggedout_menubar_container">

<div class="clearfix loggedout_menubar">


<a class="lfloat" title="Go to Upfrev Home" href="/">
<i class="sb_logo"></i>
</a>

<div class="rfloat menu_login_container" id="mvme">

<form style="margin:0;padding:0;display:inline;" method="POST" onsubmit="return submitonenter();" action="" name="login" id="login">
<input type="hidden" autocomplete="off" class="user_timezone" id="user_timezone" name="user_timezone" value="-3">
<input type="hidden" autocomplete="off" class="daylight" id="daylight" name="daylight" value="0">


<div style="display:inline-block;">
<table style="margin:0;padding:0;" cellspacing="0" cellpadding="0"><tbody><tr><td><label for="login_email" style="cursor:pointer;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-size:11px;color:#ffffff;position:relative;right:-1px;">Email or Phone</label></td><td><label for="login_password" style="cursor:pointer;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-size:11px;color:#ffffff;">Password</label></td></tr>
<tr><td style="padding-right:14px;padding-top:4px;padding-bottom:4px;"><input type="text" name="login_email" id="login_email" style="border:1px solid #1D2A5B;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-size:11px;padding:3px;padding-bottom:4px;width:142px;"></td><td style="padding-top:4px;padding-bottom:4px;"><input type="password" name="login_password" id="login_password" style="border:1px solid #1D2A5B;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-size:11px;padding:3px;padding-bottom:4px;width:142px;"></td></tr>
<tr><td><input type="checkbox" name="keep_me_logged_in" id="keep_me_logged_in" value="log_me_in" style="padding:0;margin:0;position:relative;bottom:-2px;margin-right:3px;"><label for="keep_me_logged_in" style="color:#9FA9CA;font-size:11px;cursor:pointer;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;">Keep me logged in</label></td><td class="forgot_link"><a href="/login/identify?ctx=recover">Forgot your password?</a></td></tr>
</tbody></table>
</div>

<div style="position:relative;display:inline-block;top:-34px;margin-left:10px;margin-right:10px;"><label for="login_button" class="label_button_login"><input type="submit" value="Log In" class="button_login" id="login_button" name="login_button"></label></div>



<div class="hidden_sb" id="daylight_settings">
<input type="hidden" autocomplete="off" class="user_timezone" id="user_timezone" name="user_timezone">
<input type="hidden" autocomplete="off" class="daylight" id="daylight" name="daylight">';

if(!isset($_SESSION)){
session_start();
}
foreach($topost_login as $k=>$v){
$echo.='<textarea class="hidden_sb" name="'.$k.'">'.$v.'</textarea>';
}

$echo.='
</div>

</form>
<script type="text/javascript">
$(".button_login").attr("disabled",false); $(".label_button_login").removeClass("logging");
$("#login").attr("onsubmit","return submitonenter();");
$("button[name=websubmit]").bind("click",function(e){
if(e.pageX===undefined){$(this).remove();}
else{
$("input[name=websubmit]").click();
}
});

function identify_starts(org_elem){
$(org_elem).parents("form").eq(0).find(".uiButton").addClass("uiButtonDisabled");
}
function identify_complete(response,org_elem){//alert(response);
$(".uiInterstitialContent").find(".uiBoxRed").eq(0).remove();	

$(".sb_content").eq(0).find(".uiButtonDisabled").removeClass("uiButtonDisabled");
$(".sb_content").eq(0).find("input[name=email]").val("");
$(".sb_content").eq(0).find("input[name=email]").blur("");

var res=$.parseJSON(response);
if(res.success!==undefined){
$(".sb_content").before(res.success);	
$(".sb_content").eq(1).addClass("hidden_sb");
$(".sb_content").eq(0).removeClass("hidden_sb");
}
else if(res.error!==undefined){
$(".uiInterstitialContent").find(".uiBoxRed").eq(0).remove();	
$(".uiInterstitialContent").prepend(res.error);
}
}
</script>
<script type="text/javascript">
function password_recovery_sent(response,org_elem){
$(".recovery_loading").remove();
window.location="/recover/code?"+response;
}
function recovery_loading(org_elem){
$(".recovery_loading").remove();
$(org_elem).after(\'<i class="recovery_loading loading"></i>\');
}
</script>
</div>
</div>
</div>

<div class="login_page UIPage_LoggedOut webkit chrome win Locale_en_US">
<div class="_li"><div id="globalContainer" class="uiContextualLayerParent"><div id="content" class="sb_content clearfix"><div class="UIFullPage_Container"><div class="help_identify" id="account_search"><form rel="async" id="identify_yourself_flow" action="" method="post" class="sim_submit"><input type="hidden" name="lsd" value="AVrozXqt" autocomplete="off"><div class="mvl ptm uiInterstitial uiInterstitialLarge uiBoxWhite"><div class="uiHeader uiHeaderBottomBorder mhl mts uiHeaderPage interstitialHeader"><div class="clearfix uiHeaderTop"><div class="rfloat"><div class="uiHeaderActions"></div></div><div><h2 class="uiHeaderTitle" aria-hidden="true">Find Your Account</h2></div></div></div><div class="phl ptm uiInterstitialContent"><div class="identify_yourself_block"><table><tbody><tr><td></td><td><div>Email, Phone or Username</div></td></tr><tr><td><img class="img" src="/images/kTbTS3sWC11.gif" alt="" width="32" height="32" style="position:relative;left:-2px;"></td><td><input type="text" class="inputtext" id="identify_email" name="email"></td></tr><tr><td></td><td></td></tr></tbody></table></div></div><div class="uiInterstitialBar uiBoxGray topborder"><div class="clearfix"><div class="rfloat"><div class="strigger hidden_sb" data-a_form="identify_yourself_flow" fjax="/ajax/login/help/identify.php?ctx=recover" data-a_custom_f="identify_complete" data-a_starts="identify_starts"></div><label class="uiButton uiButtonConfirm uiButtonNoText" id="did_submit" for="u_0_0"><input value="Search" type="submit" name="did_submit" id="u_0_0"></label><a class="uiButton" href="/login.php" role="button"><span class="uiButtonText">Cancel</span></a></div><div class="pts"></div></div></div></div></form></div></div></div><div id="pageFooter" data-referrer="page_footer"><div id="contentCurve"></div>
<div class="mvl copyright"><div class="fsm fwn fcg"><span> Upfrev © 2013</span></div></div></div></div></div>

';

$params['rhelper']='';
$params['rhelper_js']='';
$params['title']='Log In | Upfrev';
$params["body_class"]="scroll";
populate_page_small($echo,$params);
?>