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
.form_row .login_form_label {
display: block;
float: left;
padding: 3px 0;
width: 100px;
}
table {
word-wrap: normal;
}
</style>
';

$echo.='
<div class="hidden_sb" id="daylight_settings">
<input type="hidden" autocomplete="off" class="user_timezone" id="user_timezone" name="user_timezone">
<input type="hidden" autocomplete="off" class="daylight" id="daylight" name="daylight">';


session_start();
foreach($topost_login as $k=>$v){
$echo.='<textarea class="hidden_sb" name="'.$k.'">'.$v.'</textarea>';
}

$echo.='
</div>

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
$(this).find(".strigger").click();
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
</script>';

if(isset($_SESSION['login_error_storage']) && $_SESSION['login_error_storage']=="wrong" || isset($from_login)){

if(isset($from_login)){
$dclass="hidden_sb";
}
else{
$dclass="";	
}
	
$echo.='
<div class="login_page UIPage_LoggedOut webkit chrome win Locale_en_US">
<div class="_li"><div id="pagelet_bluebar" data-referrer="pagelet_bluebar"><div id="blueBarHolder"><div id="blueBar"><div><div class="loggedout_menubar_container"><div class="clearfix loggedout_menubar"><a class="lfloat" href="/" title="Go to Upfrev Home"><i class="sb_logo img"><u>Upfrev logo</u></i></a></div></div><div class="signupBanner_v1"><div class="signup_bar_container"><div class="signup_box clearfix"><a class="signup_btn uiButton uiButtonSpecial uiButtonLarge" href="/r.php?display=page" role="button"><span class="uiButtonText">Sign Up</span></a><span class="signup_box_content">Connect and share with the people in your life.</span></div></div></div></div></div></div></div><div id="globalContainer" class="uiContextualLayerParent"><div id="content" class="fb_content clearfix"><div class="UIFullPage_Container"><div class="mvl ptm uiInterstitial login_page_interstitial uiInterstitialLarge uiBoxWhite"><div class="uiHeader uiHeaderBottomBorder mhl mts uiHeaderPage interstitialHeader"><div class="clearfix uiHeaderTop"><div class="rfloat"><div class="uiHeaderActions"></div></div><div><h2 class="uiHeaderTitle" aria-hidden="true">Upfrev Login</h2></div></div></div><div class="phl ptm uiInterstitialContent"><div class="login_form_container"><form id="login_form" method="post" class="sim_submit"><input type="hidden" name="lsd" value="AVpC4Dzr" autocomplete="off"><div class="pam login_error_box uiBoxRed '.$dclass.'"><div class="fsl fwb fcb">Incorrect Email</div><div><p>The email you entered does not belong to any account.</p><p>You can login using any email, username or mobile phone number associated with your account. Make sure that it is typed correctly.</p></div></div><div id="loginform"><input type="hidden" autocomplete="off" id="display" name="display" value=""><input type="hidden" autocomplete="off" id="legacy_return" name="legacy_return" value="1"><input type="hidden" autocomplete="off" id="return_session" name="return_session" value="0"><input type="hidden" autocomplete="off" id="trynum" name="trynum" value="2"><input type="hidden" autocomplete="off" name="timezone" value="180" id="u_0_0"><input type="hidden" name="lgnrnd" value="210407_xxwr"><input type="hidden" id="lgnjs" name="lgnjs" value="1363925023"><div class="form_row clearfix"><label for="login_email" class="login_form_label">Email or Phone:</label><input type="text" class="inputtext" id="email" name="login_email" value=""></div><div class="form_row clearfix"><label for="login_password" class="login_form_label">Password:</label><input type="password" name="login_password" id="pass" class="inputpassword"></div><div class="persistent"><div class="uiInputLabel clearfix"><input id="keep_me_logged_in" type="checkbox" value="1" checked="1" name="keep_me_logged_in" class="uiInputLabelCheckbox"><label for="keep_me_logged_in">Keep me logged in</label></div></div><input type="hidden" autocomplete="off" id="default_persistent" name="default_persistent" value="1"><div id="buttons" class="form_row clearfix"><label class="login_form_label"></label><div id="login_button_inline"><div class="hidden_sb strigger" data-a_form="login_form,daylight_settings" fjax="components/login.php" data-a_custom_f="login_complete" data-a_starts="login_loading"></div><label class="uiButton uiButtonConfirm uiButtonLarge" id="loginbutton" for="u_0_1"><input value="Log In" name="login" type="submit" id="u_0_1"></label></div><div id="register_link">or <strong><div class="lb" style="display:inline-block;"><a href="/r.php?display=page" target="_self" rel="nofollow" id="reg_btn_link" tabindex="-1">Sign up for Upfrev</a></div></strong></div></div><p class="reset_password form_row lb"><a href="/login/identify?ctx=recover" tabindex="-1">Forgot your password?</a></p></div></form></div></div></div></div></div><div id="pageFooter" data-referrer="page_footer"><div id="contentCurve"></div>
<div class="mvl copyright"><div class="fsm fwn fcg"><span> Upfrev © 2013</span></div></div></div></div></div>

';
}
else if($_SESSION['login_error_storage']=="wrong_password"){
$email=$_SESSION['login_error_email'];
$r=mysql_query("SELECT * FROM registered WHERE email='$email'");
while($m=mysql_fetch_array($r)){
$uid=$m['id'];	
}
$uti=sb_user($uid);
$echo.='
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


<div class="login_page UIPage_LoggedOut webkit chrome win Locale_en_US">
<div class="_li"><div id="pagelet_bluebar" data-referrer="pagelet_bluebar"><div id="blueBarHolder"><div id="blueBar"><div><div class="loggedout_menubar_container"><div class="clearfix loggedout_menubar"><a class="lfloat" href="/" title="Go to Upfrev Home"><i class="sb_logo img"><u>Upfrev logo</u></i></a></div></div><div class="signupBanner_v1"><div class="signup_bar_container"><div class="signup_box clearfix"><a class="signup_btn uiButton uiButtonSpecial uiButtonLarge" href="/r.php?display=page" role="button"><span class="uiButtonText">Sign Up</span></a><span class="signup_box_content">Connect and share with the people in your life.</span></div></div></div></div></div></div></div><div id="globalContainer" class="uiContextualLayerParent"><div id="content" class="fb_content clearfix"><div class="UIFullPage_Container"><div class="mvl ptm uiInterstitial login_page_interstitial uiInterstitialLarge uiBoxWhite"><div class="uiHeader uiHeaderBottomBorder mhl mts uiHeaderPage interstitialHeader"><div class="clearfix uiHeaderTop"><div class="rfloat"><div class="uiHeaderActions"></div></div><div><h2 class="uiHeaderTitle" aria-hidden="true">Upfrev Login</h2></div></div></div><div class="phl ptm uiInterstitialContent"><div class="login_form_container"><form id="login_form" method="post" class="sim_submit"><input type="hidden" name="lsd" value="AVpC4Dzr" autocomplete="off"><div class="pam login_error_box uiBoxRed"><div class="fsl fwb fcb">Please re-enter your password</div><div><p>The password you entered is incorrect. Please try again (make sure your caps lock is off).</p><p>Forgot your password? <a fjax="/ajax/error/recover_password.php?email='.$email.'" data-a_custom_f="password_recovery_sent" data-a_id="password_recovery" data-a_starts="recovery_loading" tabindex="-1">Request a new one.</a></p></div></div><div id="loginform"><input type="hidden" autocomplete="off" id="display" name="display" value=""><input type="hidden" autocomplete="off" id="legacy_return" name="legacy_return" value="1"><input type="hidden" autocomplete="off" id="lhsrc" name="lhsrc" value="lau_sub"><input type="hidden" autocomplete="off" id="return_session" name="return_session" value="0"><input type="hidden" autocomplete="off" id="trynum" name="trynum" value="2"><input type="hidden" autocomplete="off" name="timezone" value="180" id="u_0_0"><input type="hidden" name="lgnrnd" value="115220_5oe5"><input type="hidden" id="lgnjs" name="lgnjs" value="1363978341"><div class="form_row clearfix"><label class="login_form_label">Login as:</label><input type="hidden" autocomplete="off" id="cuid" name="cuid" value="AYj7iJB7E2nqOPkQHkSLd_SS7MZ3yOWko4eCblA--9YLTiXD30wj5MsusS3ZXYPe5n9ISJ1OkQ8b6iENMVTy86hTsPEU8t_0f9CZ0HD25jxz-f1FOCQfPZ78XmIgmGgMA7MgOGJj2UFXGnVo5WW7-rZS"><div><table class="fbLoggedOutAccountBlock"><tbody><tr><td class="fbLoggedOutAccountInfo"><div class="clearfix"><img class="_8o _8t lfloat img" style="max-width:50px;" src="/users/'.$uti['id'].'/pics/'.$uti['profilepict'].'" alt=""><div class="_8m _42ef"><div class="_6a"><div class="_6a _6b" style="height:50px"></div><div class="_6a _6b"><div class="fsl fwb fcb">'.$uti['fullname'].'</div><div class="fsm fwn fcg">'.$uti['email'].'</div></div></div></div></div></td></tr></tbody></table></div><div class="pts not_me_link lb"><a href="/login.php" target="" tabindex="-1">Not '.$uti['f_name'].'?</a></div></div><input type="hidden" name="login_email" value="'.$uti['email'].'"><div class="form_row clearfix"><label for="login_password" class="login_form_label">Password:</label><input type="password" name="login_password" id="pass" class="inputpassword"></div><div class="persistent"><div class="uiInputLabel clearfix"><input id="keep_me_logged_in" type="checkbox" value="1" checked="1" name="keep_me_logged_in" class="uiInputLabelCheckbox"><label for="keep_me_logged_in">Keep me logged in</label></div></div><input type="hidden" autocomplete="off" id="default_persistent" name="keep_me_logged_in" value="1"><div id="buttons" class="form_row clearfix"><label class="login_form_label"></label><div id="login_button_inline"><div class="hidden_sb strigger" data-a_form="login_form,daylight_settings" fjax="components/login.php" data-a_custom_f="login_complete" data-a_starts="login_loading"></div><label class="uiButton uiButtonConfirm uiButtonLarge" id="loginbutton" for="u_0_1"><input value="Log In" name="login" type="submit" id="u_0_1"></label></div><div id="register_link">or <strong><div class="lb" style="display:inline-block;"><a href="/r.php?display=page" target="_self" rel="nofollow" id="reg_btn_link" tabindex="-1">Sign up for Upfrev</a></div></strong></div></div><p class="reset_password form_row"><a fjax="/ajax/error/recover_password.php?email='.$email.'" data-a_custom_f="password_recovery_sent" data-a_id="password_recovery" data-a_starts="recovery_loading" tabindex="-1">Forgot your password?</a></p></div></form></div></div></div></div></div><div id="pageFooter" data-referrer="page_footer"><div id="contentCurve"></div>
<div class="mvl copyright"><div class="fsm fwn fcg"><span> Upfrev © 2013</span></div></div></div></div></div>

';
}
$params['rhelper']='';
$params['rhelper_js']='';
$params['title']='Log In | Upfrev';
$params["body_class"]="scroll";
populate_page_small($echo,$params);
?>