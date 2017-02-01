<?php
include("browser_detect.php");
if (!in_array('ob_gzhandler', ob_list_handlers())) {
		//it's being done
}
//here do that if on enter but previous keys were up or down arrows avoid trying to submit the forms
//all i need is the keycodes for up and down arrows to set the global variables and bind to the input:text and textarea the keydown, if up was previous key logged, do nothing
//if down was previous key logged, do nothing
include("security/provide_pass.php");
$publicKey = rand()%9;
$privateKey = 0.9;
$token = sha1( $publicKey * $privateKey + $privateKey );
?><!DOCTYPE html>
<html id="upfrev">
<head>
<meta charset="utf-8" />
<link data-h="" media="screen" rel="stylesheet" href="/master/stylesheet.php" type="text/css" />
<script type="text/javascript" src="/jquery.min.js"></script>
<script type="text/javascript" src="/jquery.fjax.js"></script>
<script src="/jquery.hotkeys.js"></script>
<script src="/js/php_js.php"></script>

<script type="text/javascript">
function retcount(t){
	if(t===undefined){
	t=1;
	}
	var retcount="";
	var x=1;
	while(x<=t){
var count=Math.random();
count=count.toString();
count=count.replace(".","");
retcount+=count;
x++;
	}
return retcount;	
}
$(document).on("click", "[fjax]:not([data-nfjax=t])", function(e){
e.preventDefault();
if($(this).hasClass("t_ajaxified")===true){
e.stopPropagation();	
}
$(this).fjax();
});
</script>
<?php
echo'<script type="text/javascript">';
include("js/dcph.php");
echo $sechov;
include("js/ignored_keys.php");
echo $sechov;
echo'</script>';
?>
<style type="text/css">
._3ma {
font-family: 'lucida grande',tahoma,verdana,arial,sans-serif !important;
font-weight: bold !important;
text-rendering: optimizelegibility;
}
._6p {
font-size: 17px;
line-height: 22px;
}
._6t {
color: #666;
}
._6q {
font-size: 15px;
line-height: 20px;
}
.clearfix:after{clear:both;content:".";display:block;font-size:0;height:0;line-height:0;visibility:hidden}
.clearfix{zoom:1}
.hidden_sb{display:none!important;}
.forgot_link a:link{color:#9FA9CA;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:none;}
.forgot_link a:visited{color:#9FA9CA;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:none;}
.forgot_link a:active{color:#`9FA9CA;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:underline;}
.forgot_link a:hover{color:#9FA9CA;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:underline;}
.fglinkv a:link{color:#3b5998;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:none;}
.fglinkv a:visited{color:#3b5998;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:none;}
.fglinkv a:active{color:#3b5998;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:underline;}
.fglinkv a:hover{color:#3b5998;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:underline;}
.fglinkvv a:link{color:#3b5998;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:none;}
.fglinkvv a:visited{color:#3b5998;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:none;}
.fglinkvv a:active{color:#3b5998;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:underline;}
.fglinkvv a:hover{color:#3b5998;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;text-decoration:underline;}
.registration td label{color:#1D2A5B;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;cursor:pointer;font-size:13px;text-align:right;}
.registration td.label{color:#1D2A5B;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:13px;text-align:right;}
.input_registration{width:250px;padding:6px;font-size:16px;margin-top:2px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;border:1px solid #96A6C5;color:#333333;text-align:left;border-collapse:collapse;border-spacing:0pt;}
.select_registration{font-size:13px;padding:5px;height:30px;margin:2px 0pt 0pt;border:1px solid #96A6C5;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;text-align:left;border-collapse:collapse;border-spacing:0pt;color:#333333;}
.button_signup{border:0pt;font0size:13px;padding:3px 25px 5px;color:#ffffff;cursor:pointer;display:inline-block;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-weight:bold;margin:0;white-space:nowrap;line-height:13px;text-align:center;background: none repeat scroll 0% 0% transparent;}
.label_button_signup{vertical-align:middle;background-image:url("/images/T9SYP2crSuG.png");background-position:0pt -343px;background-color:#69A74E;border:1px solid;border-color:#3B6E22 #3B6E22 #2C5115;line-height:13px;-moz-border-colors:none;-moz-border-image:none;box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);cursor:pointer;display:inline-block;padding:1px 4px;text-align:center;text-decoration:none;white-space:nowrap;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;}
.button_login{color:#ffffff;background:none repeat scroll 0% 0% transparent;border:0pt none;cursor:pointer;display:inline-block;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;font-weight:bold;margin:0;padding:1px 0pt 2px;white-space:nowrap;}
body{font-size:11px;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;text-align:left;direction:ltr;overflow-y:scroll;}
body{padding:0;margin:0;}
html{width:100%;height:100%;padding:0;}
.registration td{padding-top:1px;padding-bottom:1px;padding-right:4px;}
.logging{
background:#adbad4!important;
border-color:#94a2bf!important;
}
.logging input{
background:#adbad4!important;
}

._7d {
		margin-right: 11.999px !important;
}
._76 {
		width: 565px;
}
._6_ {
		display: inline-block;
		vertical-align: top;
}
.pvl {
		padding-top: 20px;
		padding-bottom: 20px;
}
._6_ {
		display: inline-block;
		vertical-align: top;
}
#content {
		width: auto;
		padding: 0px;
		margin: 0px;
}
#globalContainer {
		margin: 0px auto;
		position: relative;
}

.loggedout_menubar_container {
		background-color: rgb(59, 89, 152);
		height: 82px;
		min-width: 980px;
}

.loggedout_menubar {
		margin: 0px auto;
		padding-top: 13px;
		width: 980px;
}
.rfloat{
float:right;
}

._74 {
		width: 399px;
}


.fwb {
		font-weight: bold;
}

.sbIndexMap .title {
		color: rgb(14, 56, 95);
		font-size: 20px!important;
		line-height: 29px;
		margin-top: 40px;
		width: 450px;
		word-spacing: -1px;
}

.mtl {
		margin-top: 20px;
}

._3m8 {
font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
		font-weight: bold !important;
		text-rendering: optimizelegibility;
}
.mbs {
		margin-bottom: 5px;
}

._6s {
		color: rgb(51, 51, 51);
}
._6n {
		font-size: 23px;
		line-height: 120%;
}
h1, h2, h3, h4, h5, h6 {
		font-size: 13px;
		color: rgb(51, 51, 51);
		margin: 0px;
		padding: 0px;
}

._3m7 {
font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
		font-weight: normal !important;
		text-rendering: optimizelegibility;
}
.mbl {
		margin-bottom: 20px;
}

._6o {
		font-size: 19px;
		line-height: 126%;
}


.simple_registration_container {
		margin: 0px auto;
		padding-bottom: 30px;
}

#reg_box {
		padding: 0px;
		margin: 0px;
}

form {
		margin: 0px;
		padding: 0px;
}

#reg_box #reg div.large_form {
		padding-left: 0px;
}

#reg_box.registration_redesign .short_fields {
		width: 399px;
}

.mrm {
		margin-right: 10px;
}
.lfloat {
		float: left;
}


#reg_box.registration_redesign .uiStickyPlaceholderInput {
		background: none repeat scroll 0% 0% rgb(255, 255, 255);
		border-radius: 5px 5px 5px 5px;
		width: 399px;
}
.uiStickyPlaceholderInput {
		display: inline-block;
		position: relative;
}
#reg_box.registration_redesign .short_fields .uiStickyPlaceholderInput {
		width: 194px;
}


#reg_box.registration_redesign .uiStickyPlaceholderInput .placeholder {
		-moz-box-sizing: border-box;
		overflow: hidden;
		padding-left: 11px;
		text-overflow: ellipsis;
		white-space: nowrap;
}

div.uiStickyPlaceholderEmptyInput .placeholder {
		display: block;
}
.uiStickyPlaceholderInput .placeholder {
		color: rgb(153, 153, 153);
		cursor: text;
		display: none;
		height: 100%;
		left: 0px;
		padding: 4px 0px 0px 5px;
		position: absolute;
		top: 0px;
		width: 100%;
}


#reg_box .inputtext, #reg_box .inputpassword {
		width: 206px;
		border-color: rgb(150, 166, 197);
		margin-top: 2px;
}


.uiStickyPlaceholderInput input, .uiStickyPlaceholderInput textarea {
		background-color: transparent;
		position: relative;
}
.inputtext, .inputpassword {
		padding-bottom: 4px;
}
textarea, .inputtext, .inputpassword {
		border: 1px solid rgb(189, 199, 216);
		font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
		font-size: 11px;
		margin: 0px;
		padding: 3px;
}


#reg_box.registration_redesign .uiStickyPlaceholderInput .placeholder, #reg_box.registration_redesign .text_field {
		font-size: 18px;
		padding: 8px 10px;
}



#reg_box.registration_redesign .text_field {
		border-radius: 5px 5px 5px 5px;
		border-color: rgb(189, 199, 216);
		margin: 0px;
		width: 377px;
}
#reg_box.registration_redesign .uiStickyPlaceholderInput .placeholder, #reg_box.registration_redesign .text_field {
		font-size: 18px;
		padding: 8px 10px;
}

#reg_box.registration_redesign .short_fields .text_field {
		width: 173px;
}


#reg_box.registration_redesign .text_field {
		border-radius: 5px 5px 5px 5px;
		border-color: rgb(189, 199, 216);
		margin: 0px;
		width: 377px;
}

.mbm {
		margin-bottom: 10px;
}

.loggedout_menubar .sb_logo {
margin:0;
	margin-top: 17px;
		width: 180px;
		height: 35px;
		background-position: 0px 0px;
		background-image: url("/images/subsbookb.png");
		background-size: auto auto;
		background-repeat: no-repeat;
		display: inline-block;
padding:0;
}


.dcphlgc{color:#333333;}

.dcphlg{color:#999999;}
.dcphlgc:-moz-placeholder{color:#999999;}
.dcphlgc::-webkit-input-placeholder{color:#999999;}
.dcphlgc:-ms-input-placeholder{color:#999999;}

#error {
		margin: 10px 20px;
		text-align: center;
}
.UIMessageBoxError {
		background-color: rgb(255, 235, 232);
		border-color: rgb(221, 60, 16);
}
.UIMessageBox {
		padding: 10px;
		border-width: 1px;
		border-style: solid;
}

.UIMessageBox .sub_message {
		margin: 4px 0px 0px;
}



#reg_box.registration_redesign .gender_label, #reg_box.registration_redesign .birthday_label {
		color: rgb(51, 51, 51);
		font-size: 18px;
		font-weight: normal;
}

select {
		border: 1px solid rgb(189, 199, 216);
		font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
		font-size: 11px;
		padding: 2px;
}

#reg_box #reg div.large_form div.field_container select {
		font-size: 13px;
		padding: 5px;
		height: 30px;
}
.ff4 #reg_box select {
		border-color: rgb(150, 166, 197);
}
#reg_box select {
		margin: 2px 0px 0px;
}


.pts {
		padding-top: 5px;
}


#reg_box #birthday_warning {
		font-size: 9px;
		margin-left: 1px;
}

#reg_box #reg div.large_form #birthday_warning {
		font-size: 11px;
}

a {
		cursor: pointer;
		color: rgb(59, 89, 152);
		text-decoration: none;
}

.mtl {
		margin-top: 20px;
}

.inlineBlock {
		display: inline-block;
}

.uiInputLabelRadio, .uiInputLabelCheckbox {
		float: left;
		margin: 0px;
		padding: 0px;
}

.uiInputLabelRadio {
		margin-top: 1px;
}



.uiInputLabel label {
		color: rgb(51, 51, 51);
		display: block;
		font-weight: normal;
		margin-left: 17px;
		vertical-align: baseline;
}
label {
		cursor: pointer;
		color: rgb(102, 102, 102);
		font-weight: bold;
		vertical-align: middle;
}


#reg_box label {
		color: rgb(29, 42, 91);
		font-weight: bold;
		vertical-align: middle;
}

#reg_box.registration_redesign .gender_label, #reg_box.registration_redesign .birthday_label {
		color: rgb(51, 51, 51);
		font-size: 18px;
		font-weight: normal;
}
#reg_box.registration_redesign .gender_label {
		line-height: 18px;
		padding: 0px 10px 0px 3px;
}

.uiInputLabel + .uiInputLabel {
		margin-top: 3px;
}

.uiInputLabel + .inlineBlock.uiInputLabel {
		margin-left: 10px;
		margin-top: 0px;
}


#reg_box.registration_redesign .gender_label {
		line-height: 18px;
		padding: 0px 10px 0px 3px;
}

#reg_box.registration_redesign #ppt_container {
		width: 399px;
}

#reg_box.registration_redesign .privacy_policy_text {
		color: rgb(119, 119, 119);
		width: 316px;
}
.fbRegistrationPPT .text {
		font-size: 11px;
}
p {
		margin: 1em 0px;
}

#reg_box.registration_redesign form#reg div.large_form div.reg_btn {
		margin: 0px;
}




#reg_box.registration_redesign form#reg div.large_form div.reg_btn .signup_button {
		min-width: 194px;
		padding: 7px 20px;
		text-align: center;
}
._3m8 {
		font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
		font-weight: bold !important;
		text-rendering: optimizelegibility;
}
.mvm {
		margin-top: 10px;
		margin-bottom: 10px;
}
._6v {
		font-weight: bold;
}
._6o {
		font-size: 19px;
		line-height: 126%;
}

._6j {
		border: 1px solid;
		border-radius: 5px 5px 5px 5px;
		color: rgb(255, 255, 255);
		cursor: pointer;
		display: inline-block;
		letter-spacing: 1px;
		position: relative;
		text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.5);
}


._6wl {
		background: -moz-linear-gradient(center top , rgb(103, 174, 85), rgb(87, 136, 67)) repeat scroll 0% 0% rgb(105, 167, 78);

		background: -ms-linear-gradient(center top , rgb(103, 174, 85), rgb(87, 136, 67)) repeat scroll 0% 0% rgb(105, 167, 78);
		
		background: -webkit-linear-gradient(top, #67ae55, #578843);
background-color: #69a74e;
-webkit-box-shadow: inset 0 1px 1px #a4e388;
border-color: #3b6e22 #3b6e22 #2c5115;

		box-shadow: 0px 1px 1px rgb(164, 227, 136) inset;
		border-color: rgb(59, 110, 34) rgb(59, 110, 34) rgb(44, 81, 21);
}
._6wk {
		padding: 20px 30px;
}

.async_status {
		margin-left: 10px;
		position: relative;
		top: 3px;
}

img {
		border: 0px none;
}

.menu_login_container label {
		color: rgb(255, 255, 255);
		font-weight: normal;
		padding-left: 1px;
	
}

._6wl:hover {
		background: -moz-linear-gradient(center top , rgb(121, 188, 100), rgb(87, 136, 67)) repeat scroll 0% 0% transparent;
				background: -webkit-linear-gradient(top, #79bc64, #578843);
}
._6j:hover {
		text-decoration: none;
}

#reg_captcha {
		margin: 0px;
		padding: 10px 0px 0px;
		line-height: 16px;
}

#reg_captcha h2 {
		color: rgb(29, 42, 91);
		padding-bottom: 3px;
}

#captcha .recaptcha_text {
		font-size: 11px;
		line-height: 16px;
}

#reg_captcha #captcha div.captcha_input {
		margin: 5px 0px 7px;
		overflow: hidden;
}

#captcha .captcha_input label {
		margin-right: 4px;
}
#reg_captcha label {
		vertical-align: middle;
}

.captcha_input label {
		width: 90px;
}


#captcha .captcha_input input {
		direction: ltr;
		margin-top: 4px;
		width: 137px;
}
#captcha_response {
		border: 1px solid rgb(189, 199, 216);
		font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
		font-size: 11px;
		padding: 3px;
}

.mlm {
		margin-left: 10px;
}

.fwb {
		font-weight: bold;
}
.fsl {
		font-size: 13px;
}

#reg_captcha #captcha_buttons {
		margin: 5px 0px 0px;
		padding: 10px 0px 0px;
		text-align: left;
		display: block;
		overflow: hidden;
}

#captcha_buttons #back_button {
		width: 101px;
}
#captcha_buttons .gridCol {
		float: left;
		overflow: hidden;
		margin: 0px;
}

#reg_captcha .cancel_button_image {
		float: left;
		width: 12px;
		height: 17px;
		margin: 6px 0px 0px;
		background-image: url("/images/STeWPW2kh0m.png");
		background-position: left center;
		background-repeat: no-repeat;
}


#reg_captcha #cancel_button {
		float: left;
		font-size: 12px;
		line-height: 14px;
		font-weight: bold;
		border: 0px solid transparent;
		color: rgb(59, 89, 152);
		margin: 6px 0px 0px;
		width: 75px;
}

#captcha_buttons #A_btn_sign_up {
		width: 160px;
}
#captcha_buttons .gridCol {
		float: left;
		overflow: hidden;
		margin: 0px;
}

#reg_captcha label {
		vertical-align: middle;
}
#reg_box label {
		color: rgb(29, 42, 91);
		font-weight: bold;
		vertical-align: middle;
}
.uiButtonSpecial {
		background-image: url("/images/JPe8hBQaznk.png");
		background-repeat: no-repeat;
		background-size: auto auto;
		background-position: -1px -392px;
		background-color: rgb(105, 167, 78);
		border-color: rgb(59, 110, 34) rgb(59, 110, 34) rgb(44, 81, 21);
}


.uiButton, .uiButtonSuppressed:active, .uiButtonSuppressed:focus, .uiButtonSuppressed:hover {
		background-image: url("/images/JPe8hBQaznk.png");
		background-repeat: no-repeat;
		background-size: auto auto;
		background-position: -1px -147px;
		background-color: rgb(238, 238, 238);
		border-width: 1px;
		border-style: solid;
		border-color: rgb(153, 153, 153) rgb(153, 153, 153) rgb(136, 136, 136);
		-moz-border-top-colors: none;
		-moz-border-right-colors: none;
		-moz-border-bottom-colors: none;
		-moz-border-left-colors: none;
		border-image: none;
		box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.1);
}
.uiButton {
		cursor: pointer;
		display: inline-block;
		font-size: 11px;
		font-weight: bold;
		line-height: 13px;
		padding: 2px 6px;
		text-align: center;
		text-decoration: none;
		vertical-align: top;
		white-space: nowrap;
}

.label_button_login{background-image:url("/images/T9SYP2crSuG.png");bacgkround-repeat:no-repeat;background-position:0pt -49px;background-color:rgb(91,116,168);border:1px solid;border-color:rgb(41, 68, 126) rgb(41, 68, 126) rgb(26, 53, 110);-moz-border-colors:none;box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);cursor:pointer;display:inline-block;line-height:13px;padding:1px 4px;text-align:center;text-decoration:none;vertical-align:top;white-space:nowrap;}
<?php
if($browser=="chrome" || $browser=="safari"){
echo'.label_button_login{padding:2px 6px!important;}
';
}
?>
#reg_box #reg div.reg_btn label input {
		font-size: 13px;
		padding: 3px 25px 5px;
}
form.async_saving .uiButton.uiButtonSpecial .uiButtonText, form.async_saving .uiButton.uiButtonSpecial input, form.async_saving .uiButton.uiButtonConfirm .uiButtonText, form.async_saving .uiButton.uiButtonConfirm input, .uiButtonSpecial .uiButtonText, .uiButtonSpecial input, .uiButtonSpecial.uiButtonDisabled .uiButtonText, .uiButtonSpecial.uiButtonDisabled input, .uiButtonConfirm .uiButtonText, .uiButtonConfirm input, .uiButtonConfirm.uiButtonDisabled .uiButtonText, .uiButtonConfirm.uiButtonDisabled input {
		color: rgb(255, 255, 255);
}
.uiButtonText, .uiButton input {
		background: none repeat scroll 0% 0% transparent;
		border: 0px none;
		color: rgb(51, 51, 51);
		cursor: pointer;
		display: inline-block;
		font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
		font-size: 11px;
		font-weight: bold;
		line-height: 13px;
		margin: 0px;
		padding: 1px 0px 2px;
		white-space: nowrap;
}
label input {
		font-weight: normal;
}

.async_status {
		margin-left: 10px;
		position: relative;
		top: 3px;
}

#reg_progress {
		font-size: 13px !important;
		text-align: center;
		margin: 0px;
		font-weight: bold;
		padding: 0px;
}

#reg_progress #progress_wrap {
		padding: 80px 0px 0px;
		margin: 0px;
		text-align: center;
}

#reg_progress img {
		margin-right: 15px;
}

#reg_error, #captcha_error {
		background: none repeat scroll 0% 0% rgb(255, 235, 232);
		border: 1px solid rgb(221, 60, 16);
		line-height: 15px;
		margin: 10px 0px 0px;
		text-align: center;
		overflow: hidden;
}

#reg_error_inner {
		padding: 7px 3px;
}
.simple_registration_container .tos_container {
		margin-top: 12px;
}

p.legal_tos {
		color: rgb(85, 85, 85);
		font-size: 9px;
		padding: 0px;
		margin: 0px 0px 10px;
}

#reg_box.registration_redesign .placeholder_design_pages_msg {
		font-size: 13px;
		padding-top: 15px;
		text-align: left;
}

.pagesSection {
		border-top: 1px solid rgb(160, 169, 192);
		text-align: center;
		font-weight: bold;
		margin-top: 10px;
		font-size: 11px;
		padding-top: 10px;
		color: rgb(102, 102, 102);
}
.loggedout_menubar label.menu_login_show_link {
color: #98a9ca;
position: relative;
top: 19px;
}
.uiButtonConfirm {
background-image: url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yf/r/cDUSqVVxJZv.png);
background-repeat: no-repeat;
background-size: auto;
background-position: -352px -495px;
background-color: #5b74a8;
border-color: #29447e #29447e #1a356e;
}

.uiButtonText, .uiButton input {
background: none;
border: 0;
color: #333;
cursor: pointer;
display: inline-block;
font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
font-size: 11px;
font-weight: bold;
line-height: 13px;
margin: 0;
padding: 1px 0 2px;
white-space: nowrap;
}
form.async_saving .uiButton.uiButtonSpecial .uiButtonText, form.async_saving .uiButton.uiButtonSpecial input, form.async_saving .uiButton.uiButtonConfirm .uiButtonText, form.async_saving .uiButton.uiButtonConfirm input, .uiButtonSpecial .uiButtonText, .uiButtonSpecial input, .uiButtonSpecial.uiButtonDisabled .uiButtonText, .uiButtonSpecial.uiButtonDisabled input, .uiButtonConfirm .uiButtonText, .uiButtonConfirm input, .uiButtonConfirm.uiButtonDisabled .uiButtonText, .uiButtonConfirm.uiButtonDisabled input {
color: #fff;
}
.uiButton .uiButtonText,.button_login{
font-size:13px!important;
}
.uiButton,.label_button_login{
box-shadow: 0px 1px 1px 1px rgba(1,1,1,0.5);
padding: 6px!important;
}
.signup_button{
box-shadow: 0px 1px 1px 1px rgba(1,1,1,0.5);
padding: 11px 30px!important;
font-size:42px;
}
.uiButton {
cursor: pointer;
display: inline-block;
font-size: 11px;
font-weight: bold;
line-height: 13px;
padding: 2px 6px;
text-align: center;
text-decoration: none;
vertical-align: top;
white-space: nowrap;
}
.menu_login_container .uiButton {
padding: 2px 6px;
}
.uiButton{
border-radius:3px;	
}
.label_button_login{
border-radius:3px;
}
</style>
</head>
<body>
<div id="enter_gateway" class="hidden_sb" fjax="/index.php" data-a_form="login" data-a_custom_f="login_complete"></div>
<script type="text/javascript">
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
function validateEmail(elementValue){
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	return emailPattern.test(elementValue);
}

function submitonenter(){
var login_email=$("#login_email").val();
var login_password=$("#login_password").val();
if((login_password=='') || (login_email=='') || (validateEmail(login_email)===false)){
$("#fill_fields").css("display","block");
<?php //in here just mess up with the server and attempt to login even if something is blank - check with php server side and after a few attempts prevent the ip from trying to login for a couple of hours ?>
return false;
}
else{
$("#fill_fields").css("display","none"); $(".button_login").attr("disabled",true); $(".label_button_login").addClass("logging");
$("#enter_gateway").click();
return false;
}
}

function form_check(){
var path=$("#reg");
var f_name=$(path).find("input[name=f_name]").val();
var l_name=$(path).find("input[name=l_name]").val();
var email=$(path).find("input[name=email]").val();

var r_email=$(path).find("input[name=r_email]").val();
var password=$(path).find("input[name=password]").val();
var genderf=$(path).find("input[name=gender]").eq(0).is(":checked");
var genderm=$(path).find("input[name=gender]").eq(1).is(":checked");
var month=$(path).find("select[name=month] option:selected").text();
var day=$(path).find("select[name=day] option:selected").text();
var year=$(path).find("select[name=year] option:selected").text();


if(f_name=='' || l_name=='' || email=='' || r_email=='' || password=='' || (genderf===false && genderm===false) || month=='Month:' || day=='Day:' || year=='Year:' || validateEmail(email)===false || email!=r_email){
$("#reg_error_inner").html('You must fill in all of the fields.');
$("#reg_error").removeClass("hidden_sb");
}
else{
$("#reg_error").addClass("hidden_sb");
$("#reg").removeAttr("onsubmit");
var c=$("#reg").find("textarea[class=hidden_sb]").eq(0).attr("name");

$("#reg").attr("action","r.php?a="+c);
document.forms["reg"].submit();}
}

<?php
echo'

';
?>
</script>

<div>
<div class="loggedout_menubar_container">

<div class="clearfix loggedout_menubar">


<a class="lfloat" title="Go to Upfrev Home" href="/">
<i class="sb_logo"></i>
</a>

<div class="rfloat menu_login_container" id="mvme">

<form style="margin:0;padding:0;display:inline;" method="POST" onSubmit="javascript: return false;" action="" name="login" id="login">
<input type="hidden" autocomplete="off" class="user_timezone" id="user_timezone" name="user_timezone">
<input type="hidden" autocomplete="off" class="daylight" id="daylight" name="daylight">

<?php
if(isset($_GET['display'])){
$dclass="hidden_sb";
$dclassv="";	
}
else{
$dclass="";	
$dclassv="hidden_sb";
}
echo'
<div style="display:inline-block;" class="'.$dclassv.'">
<label class="menu_login_show_link uiButton uiButtonConfirm" id="menu_login_show_link" for="u_0_4"><input value="Log in to existing account" onclick="return false;" type="submit" id="u_0_4"></label>
<script type="text/javascript">
$("#menu_login_show_link").bind("click",function(){
$(this).addClass("hidden_sb");
$("#regular_login").removeClass("hidden_sb");
});
</script>
</div>

<div style="display:inline-block;" id="regular_login" class="'.$dclass.'">
<div style="display:inline-block;">

<table style="margin:0;padding:0;" cellspacing="0" cellpadding="0"><tr><td><label for="login_email" style="cursor:pointer;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-size:11px;color:#ffffff;position:relative;right:-1px;">Email or Phone</label></td><td><label for="login_password" style="cursor:pointer;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-size:11px;color:#ffffff;">Password</label></td></tr>
<tr><td style="padding-right:14px;padding-top:4px;padding-bottom:4px;"><input type="text" name="login_email" id="login_email" style="border:1px solid #1D2A5B;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-size:11px;padding:3px;padding-bottom:4px;width:142px;"></td><td style="padding-top:4px;padding-bottom:4px;"><input type="password" name="login_password" id="login_password" style="border:1px solid #1D2A5B;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-size:11px;padding:3px;padding-bottom:4px;width:142px;"></td></tr>
<tr><td><input type="checkbox" name="keep_me_logged_in" id="keep_me_logged_in" value="log_me_in" style="padding:0;margin:0;position:relative;bottom:-2px;margin-right:3px;"><label for="keep_me_logged_in" style="color:#9FA9CA;font-size:11px;cursor:pointer;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;">Keep me logged in</label></td><td class="forgot_link"><a href="/login/identify?ctx=recover">Forgot your password?</a></td></tr>
</table>
</div>

<div style="position:relative;display:inline-block;top:-34px;margin-left:10px;margin-right:10px;"><label for="login_button" class="label_button_login"><input type="submit" value="Log In" class="button_login" id="login_button" name="login_button"></label></div>

</div>';
?>

<?php
if(!isset($_SESSION)){
session_start();
}
foreach($topost_login as $k=>$v){
echo'<textarea class="hidden_sb" name="'.$k.'">'.$v.'</textarea>';
}
?>
</form>
<script type="text/javascript">
$(".button_login").attr("disabled",false); $(".label_button_login").removeClass("logging");
</script>
</div>
</div>
</div>

<?php
if(isset($_GET['display'])){
$dwidth=400;
$paddingTop="47px;";
}
else{
$dwidth=980;	
$paddingTop="0;";
}
echo'
<div id="globalContainer">
<div id="content">
<div style="background: #E7EBF2; min-width: 980px">
<div style="width:'.$dwidth.'px;margin:0 auto;padding-top:'.$paddingTop.'">
<div class="pvl" style="width: 980px; margin: 0 auto;display:inline-block;">
<div style="margin:0 auto;display:inline-block;">
';
?>

<?php
if(isset($_GET['display'])){
$dclass="hidden_sb";	
}
else{
$dclass="";	
}
echo'
<div class="_7d _6_ _76"><h1 class="inlineBlock _3ma _6n _6s _6v" style="padding: 42px 0 24px; font-size: 28px; line-height: 36px"> Connect with friends and the<br>world around you on Subsbook. </h1><div class="mtl pbm"><div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img" src="/images/851565_602269956474188_918638970_n.png" alt="" style="vertical-align: middle"></div><div class="_6a _6b product_desc"><span class="mtl _3ma _6p _6s _6v"> See photos and updates </span><span class="mlm _6q _6t _mf"> from friends in News Feed. </span></div></div><div class="mtl pbm"><div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img" src="/images/851585_216271631855613_2121533625_n.png" alt="" style="vertical-align: middle"></div><div class="_6a _6b product_desc"><span class="mtl _3ma _6p _6s _6v"> Share what\'s new </span><span class="mlm _6q _6t _mf"> in your life on your Timeline. </span></div></div><div class="mtl pbm"><div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img" src="/images/851558_160351450817973_1678868765_n.png" alt="" style="vertical-align: middle"></div><div class="_6a _6b product_desc"><span class="mtl _3ma _6p _6s _6v"> Transfer money </span><span class="mlm _6q _6t _mf"> to multiple recipients. </span></div></div></div>
';
?>

<div class="_6_ _74" id="mvmev">

<script type="text/javascript">
$("#login_email,#login_password").bind("keydown",function(e){
var dkey=(e.which) ? e.which : e.keyCode;
if(dlastkey!="40" && dlastkey!="38" && dkey==13){
submitonenter();
}
});

function register_starts(org_elem){
$("#async_status").removeClass("hidden_sb");	
}

function register_complete(response,org_elem){//alert(response);
$("#async_status").addClass("hidden_sb");	
var res=$.parseJSON(response);
if(res.error!==undefined){
if(res.nogo!==undefined){
$("#registration_container").html('<div id="error" class="UIMessageBox UIMessageBoxError"><h2 class="main_message" id="standard_error">Sorry, we are not able to process your registration.</h2><p class="sub_message" id="standard_explanation"></p></div>');
}
$("#reg_error_inner").html(res.error);
$("#reg_error").removeClass("hidden_sb");
}
else{
$("#reg_error").addClass("hidden_sb");
location.reload(true);
}

}
</script>
<?php
$x=0;
foreach($topost_register as $k=>$v){
if($x==0){
$dclave=$k;	
}
$x++;
}
?>

<h1 class="mbs _3m8 _6n _6s _6v " style="font-size: 36px">Sign Up</h1><h2 class="mbl _3m7 _6o _6s _mf ">It’s free and always will be.</h2><div id="registration_container"><div data-referrer="simple_registration_form"><noscript><div id="no_js_box"><h2>JavaScript is disabled on your browser.</h2><p>Please enable JavaScript on your browser or upgrade to a JavaScript-capable browser to register for Upfrev.</p></div></noscript><div id="simple_registration_container" class="simple_registration_container"><div id="reg_box" class="registration_redesign"><form method="post" id="reg" name="reg" action="/r.php" onSubmit="javascript:return false;">
<input type="hidden" autocomplete="off" class="user_timezone" id="user_timezonev" name="user_timezone">
<input type="hidden" autocomplete="off" class="daylight" id="daylightv" name="daylight">
<div id="reg_form_box" class="large_form"><div class="clearfix short_fields"><div class="mrm lfloat"><div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput"><input class="inputtext text_field dcphlgc" placeholder="First Name" id="firstname" name="f_name" value="First Name" aria-required="true" aria-label="First Name" type="text"></div></div><div class="mbm rfloat"><div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput"><input class="inputtext text_field dcphlgc" id="lastname" name="l_name" placeholder="Last Name" value="Last Name" aria-required="true" aria-label="Last Name" type="text"></div></div></div><div class="mbm"><div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput"><input class="inputtext text_field dcphlgc" id="reg_email__" name="email" placeholder="Your Email" value="Your Email" aria-required="true" aria-label="Your Email" type="text"></div></div><div class="mbm"><div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput"><input class="inputtext text_field dcphlgc" id="reg_email_confirmation__" name="r_email" placeholder="Re-enter Email" value="Re-enter Email" aria-required="true" aria-label="Re-enter Email" type="text"></div></div><div class="mbm"><div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput"><div aria-hidden="true" class="placeholder">New Password</div><input class="inputtext text_field" id="reg_passwd__" name="password" value="" aria-required="true" aria-label="New Password" type="password"></div></div><div class="mtm mbs birthday_label">Birthday:</div><div class="clearfix field_container"><div class="mrm lfloat"> <select name="month" id="birthday_month" aria-label="Month" class=""><option value="-1">Month:</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select> <select name="day" id="birthday_day" aria-label="Day" class=""><option value="-1">Day:</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> <select name="year" id="birthday_year" aria-label="Year" class=""><option value="-1">Year:</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option></select></div><div class="pts"><div id="birthday_warning"><a href="#" ajaxify="/help/ajax/reg_birthday" title="Click for more information" rel="async">Why do I need to provide my birthday?</a></div></div></div><div class="mtl mbm"><div class="uiInputLabel clearfix inlineBlock"><input name="gender" class="sex_option uiInputLabelRadio" value="1" id="gender_female" type="radio"><label class="gender_label" for="gender_female">Female</label></div><div class="uiInputLabel clearfix inlineBlock"><input name="gender" class="sex_option uiInputLabelRadio" value="2" id="gender_male" type="radio"><label class="gender_label" for="gender_male">Male</label></div></div><div class="fbRegistrationPPT" id="ppt_container"><p class="privacy_policy_text text">By clicking Sign Up, you agree to our <a href="/terms.php" target="_blank" rel="nofollow">Terms</a> and that you have read our <a href="/policy.php" target="_blank" rel="nofollow">Data Use Policy</a>, including our <a href="/help/cookies/" target="_blank" rel="nofollow">Cookie Use</a>.</p></div><div class="reg_btn clearfix" style="position:relative;"><button type="submit" class="_6j mvm _6wl _6wk signup_button _3m8 _6o _6v lfloat" name="websubmit" data-a_form="registration_container" data-a_custom_f="register_complete" data-a_starts="register_starts" fjax="/register.php?a=<?php echo $dclave; ?>">Sign Up</button><span id="async_status" class="async_status hidden_sb"><img class="img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></span></div></div><input autocomplete="off" id="reg_instance" name="reg_instance" value="OwjxUPgw0Qv3-vYIhXeQmZH0" type="hidden"><input autocomplete="off" id="asked_to_login" name="asked_to_login" type="hidden"><input autocomplete="off" id="contactpoint_label" name="contactpoint_label" value="email_only" type="hidden"><input autocomplete="off" id="locale" name="locale" value="en_US" type="hidden"><input autocomplete="off" id="terms" name="terms" value="on" type="hidden"><input autocomplete="off" id="referrer" name="referrer" value="" type="hidden"><div id="reg_captcha" style="display: none"><div><h2 id="security_check_header">Security Check</h2><div id="outer_captcha_box"><div id="captcha_box"><div class="field_error" id="captcha_response_error" style="display:none;">This field is required.</div><div id="captcha" class="captcha"><div><div id="recaptcha_scripts" style="display:none"></div><input autocomplete="off" id="captcha_session" name="captcha_session" value="WD0-gh6UUrvhrKuTikE2Mg" type="hidden"><input autocomplete="off" id="recaptcha_type" name="recaptcha_type" value="password" type="hidden"><div class="recaptcha_text"><div class="recaptcha_only_if_image">Enter both words below, separated by a space.<br>Can't read the words below? <a href="#" onClick="recaptcha_reload(); return false;" id="recaptcha_reload_btn">Try different words</a> or <a href="#" onClick="recaptcha_switch('audio'); return false;">an audio captcha</a>.</div><div class="recaptcha_only_if_audio" style="display:none">Please enter the words or numbers you hear.<br><a href="#" onClick="recaptcha_reload(); return false;" id="recaptcha_reload_btn">Try different words</a> or <a class="recaptcha_only_if_audio" href="#" onClick="recapcha_switch(\'image\'); return false;">back to text</a>.</div></div><span id="recaptcha_play_audio"></span><div class="audiocaptcha"></div><div id="recaptcha_image" class="captcha_image"></div><div id="recaptcha_loading">Loading...<img class="captcha_loading img" src="/images/loading.gif" alt="" style="height:11px;width:16px;"></div></div><div class="captcha_input"><label>Text in the box:</label><div class="field_container"><input name="captcha_response" id="captcha_response" autocomplete="off" aria-label="Captcha input. Type the words listed above to continue. Additionally you may also try the audio captcha by clicking the link above." type="text"></div><a class="mlm" href="#" onclick='$("#captcha_whats_this").removeClass("hidden_sb"); return false;'>What's this?</a><div id="captcha_whats_this" class="hidden_sb"><div class="fsl fwb">Security Check</div>This is a standard security test that we use to prevent spammers from creating fake accounts and spamming users.</div></div></div></div></div><div><div class="gridCol"></div><div class="gridCol"></div></div><div id="captcha_buttons" class="clearfix" style="display: none;"><div id="back_button" class="gridCol"><div class="cancel_button_image"> &nbsp; </div><a id="cancel_button" href="#" onClick="hide_captcha();">Back</a></div><div id="A_btn_sign_up" class="gridCol"><div class="reg_btn clearfix"><label class="big_input uiButton uiButtonSpecial" for="u_0_2"><input value="Sign Up" id="u_0_2" type="submit"></label><span id="captcha_async_status" class="async_status" style="display: none"><img class="img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></span></div></div></div></div></div>


<?php
if(!isset($_SESSION)){
session_start();
}
foreach($topost_register as $k=>$v){
echo'<textarea class="hidden_sb" name="'.$k.'">'.$v.'</textarea>';
}
foreach($topost_login as $k=>$v){
echo'<textarea class="hidden_sb" name="'.$k.'">'.$v.'</textarea>';
}
?>
<input type="hidden" name="publickey" value="<?php echo $publicKey; ?>">
<input type="hidden" name="token" value="<?php echo $token; ?>">



<?php
echo'
</form><div id="reg_progress" style="display: none"><div id="progress_wrap"><img class="img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"><div id="progress_msg">Registering…</div></div></div><div id="reg_error" class="hidden_sb"><div id="reg_error_inner">An error occurred. Please try again.</div></div><div id="tos_container" class="tos_container"><p class="legal_tos hidden_sb">By clicking Sign Up, you are indicating that you have read and agree to the <a href="/legal/terms" target="_blank" rel="nofollow">Terms of Use</a> and <a href="/policy.php" target="_blank" rel="nofollow">Privacy Policy</a>.</p></div>';

if(isset($_GET['display'])){
$dclass="hidden_sb";
}
else{
$dclass="";	
}

echo'
<div id="reg_pages_msg" class="pagesSection pagesSectionPPT placeholder_design_pages_msg '.$dclass.'"><a href="/pages/create.php">Create a Page</a> for a celebrity, band or business.</div></div></div></div></div>';

?>

</div>
</div>
</div>
</div>
</div>
</div>


<div id="pageFooter" style="width:980px;margin:0 auto;margin-top:25px;" data-referrer="page_footer"><div id="contentCurve" style="height:0px;"></div><div class="mvl copyright"><div class="fsm fwn fcg lb"><span> Upfrev © 2013</span> · <a rel="dialog" href="#" title="Use Upfrev in another language." role="button">English (US)</a></div></div></div>


<script type="text/javascript">
<?php
if(isset($_GET['w'])){
echo'
$("#reg_error_inner").html("An error occurred. Please try again.");
$("#reg_error").removeClass("hidden_sb");
';	
}
?>
var dlastkey=false;
var last_key=function(e){
dlastkey=(e.which) ? e.which : e.keyCode;
}
$(document).bind("keydown",last_key);

$("#login").attr("onsubmit","return submitonenter();");
$("button[name=websubmit]").bind("click",function(e){
if(e.pageX===undefined){$(this).remove();}
else{
$("input[name=websubmit]").click();
}
});


$("#reg").find("textarea,input:text").bind("keydown","return",function(){
if(dlastkey!="40" && dlastkey!="38"){
//if it possible wasn't a select from the browser autoselect
$("input[name=websubmit]").click();
}
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

<?php
echo'
$("#birthday_year,#birthday_month").bind("onchange",function(){

var dmonth=$("#birthday_month option:selected").val();
var dyear=$("#birthday_year option:selected").val();
var myval=$("#birthday_month option:selected").text();
var myval2=$("#birthday_day option:selected").val();

if(myval=="Feb"){
if(get_month){get_month.abort();}
var get_month=$.ajax({
	async: false,
	type: "POST",
	url: "daysinmonth.php",
	data: { dmonth:dmonth,dyear:dyear }})
	.done(function(response) {
		var extram="";
		if(response==29){
		var extram=\'<option value="29">29</option>\';
		}
$("#birthday_day").html(\'<option value="-1">Day:</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>\'+extram);
	});
}
else if((myval=="Jan") || (myval=="Mar") || (myval=="May") || (myval=="Jul") || (myval=="Aug") || (myval=="Oct") || (myval=="Dec")){
$("#birthday_day").html(\'<option value="-1">Day:</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>\');
}
else{
$("#birthday_day").html(\'<option value="-1">Day:</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>\');
}

$("#birthday_day option[value=\'"+myval2+"\']").attr("selected", "selected");
});




var ignored_keys_v=ignored_keys;

var dcount=count(ignored_keys_v);
ignored_keys_v[dcount]=8;

var manage_placeholders=function(e){
var charCode = (e.which) ? e.which : e.keyCode;
if(!in_array(charCode,ignored_keys_v)){
$(this).prev(".placeholder").addClass("hidden_sb");
}
}


$(document).on("keyup",".inputtext",manage_placeholders);
$(document).on("keydown",".inputtext",manage_placeholders);

var manage_placeholdersv=function(e){
if($(this).val()==""){
$(this).prev(".placeholder").removeClass("hidden_sb");
}
}

$(document).on("blur",".inputtext",manage_placeholdersv);


';
?>
function verme(response,org_elem){
	//alert(response);
}
</script>
</div>


</body>
</html>