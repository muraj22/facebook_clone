<?php
include("start.php");
?>
<?php

include("start.php");
?>
<?php
echo'
<script type="text/javascript">
function addnemail(){
$(".mgcf").attr("disabled",true);
var nemail=$("#n_email").val();
var pass=$("#password3").val();

var remove_emails=new Array();

var ax=0;
$("input[name=\'remove_emails[]\']").each(function()
{
var cj=$(this).is(":checked");
if(cj===true){
remove_emails[ax]=$(this).val();
ax++;
}
});

var primarye=new Array();
var ax=0;

var addemail=$("#n_email").val();
if(addemail=="Optional"){var action=2;}
else{var action=1;}

$("input[name=\'primary_email[]\']").each(function()
{
var cj=$(this).is(":checked");

if(cj===true){
primarye[ax]=$(this).val();

}
});




$.ajax({
	type: "POST",
	url: "settingsd/general/nemail.php",
	data: { nemail : nemail,pass:pass,remove_emails:remove_emails,action:action,primarye:primarye},
	success: function(response) {
		//alert(response);
$(".namegenlabel").css("color","rgb(102, 102, 102)");
$("#colorerr3_3v").css("visibility","hidden");
$("#colorerr2_3v").css("visibility","hidden");

if(strpos(response,"<-")!==false){
var res=response.split("<-");

var nemailav=res[0];

var response="ok";
}
else if(strpos(response,"->")!==false){

var res=response.split("->");

var nemaila=res[0];

var response="ok";
}

if(strpos(response,"{}")!==false){

var res=response.split("{}");
var response="ok";
$("#echange").html(res[0]);
}

if(response=="e2"){
$("#colorerr2_3").css("color","rgb(204, 102, 102)");
$("#ecode_em").html("You have already added this email address.");
$("#colorerr2_3v").css("visibility","visible");
}
else if(response=="e"){

$("#colorerr2_3").css("color","rgb(204, 102, 102)");
$("#ecode_em").html("You must provide a valid email.");
$("#colorerr2_3v").css("visibility","visible");

}
else if(response=="ok"){
$("#blockedita3").val("n");

$("#editblock3").css("display","none");
$("#spsul3").css("display","none");

if(nemaila){

	$("#nemaila").html(nemaila);

$(\'#ddfv2_emb\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:21px;padding:0;" onclick="okay_confirm();"><input autocomplete="off" type="button" value="Okay" class="uiButtonText" style="padding:0;padding-right:3px;padding-left:3px;padding-top:2px;"></label>\');

$("#ppc2_emb").css("display","block");

}
else if(nemailav){
	$("#nemailav").html(nemailav);

	$(\'#ddfv2_embv\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:21px;padding:0;" onclick="okay_confirm();"><input autocomplete="off" type="button" value="Okay" class="uiButtonText" style="padding:0;padding-right:3px;padding-left:3px;padding-top:2px;"></label>\');

	$("#ppc2_embv").css("display","block");
}

$("#peditblock3").css("background","#FFF9D7");
$("#peditblock3").fadeIn("slow",function(){
$("#pspsul3").fadeIn("slow", function() {
$("#peditblock3").animate({ backgroundColor: "#FFF9D7" }, "slow");

$.doTimeout(90, function(){
$("#pspsul3").fadeOut("medium",function(){

$.doTimeout(165, function(){
$("#peditblock3").animate({ backgroundColor: "#ffffff" }, "slow");
$("#spsul3").fadeIn("fast");
$("#alreadyl3").remove();

$("#blockedita3").val("y");
});

});

});

});

});


$("#password3").val("");

$(".namegenlabel").css("color","rgb(102, 102, 102)");

$("#colorerr3_3v").css("visibility","hidden");
enablesave(3,1);
	}
else if(response=="e3"){

$("#colorerr3_3").css("color","rgb(204, 102, 102)");
$("#colorerr3_3v").css("visibility","visible");
enablesave(3,1);
	}
else{

}

$(".mgcf").attr("disabled",false);
$(".inputsave").attr("disabled",true);
}
});
}
</script>
<div style="margin:0;padding:0;border: medium none;background-color: rgb(242, 242, 242);position:relative;" id="alreadyl3">
<div style="margin:0;padding:0;left: 0px;position: absolute;width: 155px;margin: 10px;"><strong>Email</strong></div>
<div style="margin:0;padding:0;margin-left: 175px;width: 400px;padding-bottom: 10px;padding-top:10px;">
<table style="table-layout: fixed;border: 0px none;border-collapse: collapse;border-spacing: 0px;width: 100%;">

<tr>';

$emailsa=array();
$r=mysql_query("SELECT * FROM contact_emails WHERE id='$uid' AND confirmed!='u' AND primary2='p' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$emailsa[]=$m['email'];
}
$r=mysql_query("SELECT * FROM contact_emails WHERE id='$uid' AND confirmed!='u' AND primary2!='p' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$emailsa[]=$m['email'];
}


$r=mysql_query("SELECT * FROM contact_emails WHERE id='$uid' AND confirmed='u' AND visibility='v'");
$c=mysql_num_rows($r);
if($c>0){
while($m=mysql_fetch_array($r)){
$anemws=$m['email'];
}
}

echo'
<th class="namegen"><label for="username" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel">Primary email:</label></th>
<td class="namegenvv" style="padding-top:5px;">';
echo'
<script type="text/javascript">
function remove_email(w){

var ic=$("#radio_email"+w).is(":checked");
if(ic===true){
var wv=w-1;
$("#radio_email"+wv).attr("checked",true);
}
$("#radio_email"+w).attr("disabled",true);
$("#radio_emailv"+w).css("text-decoration","line-through");
$("#radio_emailv"+w).css("color","rgb(119, 119, 119)");
$("#radio_emailv"+w).css("cursor","default");

$("#remove"+w).css("display","none");
$("#undo"+w).css("display","inline-block");
$("#removev"+w).attr("checked",true);
}
function undo_remove(w){
$("#radio_email"+w).attr("disabled",false);
$("#radio_emailv"+w).css("text-decoration","");
$("#radio_emailv"+w).css("color","#333333");
$("#radio_emailv"+w).css("cursor","pointer");

$("#undo"+w).css("display","none");
$("#remove"+w).css("display","inline-block");
$("#removev"+w).attr("checked",false);
}
</script>
';
$ax=1;
foreach($emailsa as $k=>$v){
echo'
<div style="display:block;margin:0;padding:0;width:430px;">
<input autocomplete="off" type="radio" name="primary_email[]" id="radio_email'.$ax.'" style="margin:0;padding:0;margin-top:3px;" class="mgcf" value="'.$v.'"><label for="radio_email'.$ax.'" style="margin:0;padding:0;position:relative;top:-6px;margin-left:2px;cursor:pointer;" class="label_email" id="radio_emailv'.$ax.'">'.$v.'</label>';

if($ax!=1){
echo'<div style="position:relative;top:-3px;left:0px;margin:0;padding:0;display:inline-block;">&nbsp;<span style="color:gray;margin:0;padding:0;">&#183; </span><input autocomplete="off" type="checkbox" style="display:none;" name="remove_emails[]" value="'.$v.'" id="removev'.$ax.'"><div class="onel" style="display:inline-block;margin:0;padding:0;"><a id="remove'.$ax.'" href="#" onclick="remove_email('.$ax.'); return false;" style="display:inline-block;margin:0;padding:0;background:transparent;">Remove</a><a id="undo'.$ax.'" href="#" onclick="undo_remove('.$ax.');" style="display:none;margin:0;padding:0;background:transparent;">Undo</a></div></div>
</div>
';
}
$ax++;
}

echo'
<script type="text/javascript">
$("#radio_email1").attr("checked",true);
</script>
</td>
</tr>
<tr>
<td colspan="2" style="padding:5px 0;"><hr style="background:#cccccc;height:1px;color:#cccccc;font-size:11px;border-width:0px;border-collapse: collapse;border-spacing: 0px;"></td>
</tr>';
$dis='table-row;';
if(isset($anemws)){
$dis='none';
$anemws=str_replace("unconfirmed{","",$anemws);
echo'
<tr id="anemws">
<td colspan="2" style="padding:0;">
<script type="text/javascript">
function cancelae(){
var nemail="'.$anemws.'";
$.ajax({
	type: "POST",
	url: "/settingsd/general/cancelemail.php",
	data: { nemail:nemail},
	success: function(response) {
		//alert(response);
$("#anemws").css("display","none");
$("#addnemaill").css("display","table-row");
}
});
}

</script>
<div style="color:gray;line-height:16px;margin:0;padding:0;">
Please check your email at '.$anemws.' to verify the address.
</div>
<div class="onel" style="display:block;padding:0;margin:0;color:gray;">
<a href="#" onclick="resendce(); return false;" style="background:transparent!important;padding:0!important;margin:0!important;display:inline-block;" id="resend_l">Resend confirmation email</a> &#183; <a href="#" onclick="cancelae(); return false;" style="background:transparent!important;padding:0!important;margin:0!important;display:inline-block;">Cancel</a>
</div>
</td>
</tr>
';
}

echo'
<tr id="addnemaill" style="display:'.$dis.'">
<td colspan="2" style="padding:0;">
<script type="text/javascript">
function addnemailv(){
$("#addnemaill").css("display","none");
$("#addnemaillv").css("display","table-row");
}
</script>
<div class="onel" style="display:inline-block;padding:0;margin:0;"><a href="#" onclick="addnemailv(); return false;" style="background:transparent!important;padding:0!important;margin:0!important;">Add another email</a></div>
</td>
</tr>
<tr style="display:none;" id="addnemaillv">
<th class="namegen"><label for="n_email" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr2_3">New email:</label>
</th>
<td class="namegenvv"><script type="text/javascript">
function clearme(w){
var elval=$("#"+w).val();
if(elval=="Optional"){
$("#"+w).val("");
$("#"+w).css("color","#333333");
}
}
function blurme(w){
var elval=$("#"+w).val();
elval=$.trim(elval);
if(elval==""){
$("#"+w).css("color","rgb(119, 119, 119)");
$("#"+w).val("Optional");
}
}
</script><input autocomplete="off" type="text" class="namegenv mgcf" id="n_email" onfocus="clearme(this.id);" onblur="blurme(this.id);" onkeyup="enablesave(3);"><span class="passwordn" style="display:inline-block;visibility:hidden;" id="colorerr2_3v"><span class="passwordnv"><i class="passwordnvv"></i><span style="margin:0;padding;0;" id="ecode_em"></span></span></span><script type="text/javascript">$("#n_email").val("Optional"); $("#n_email").css("color","rgb(119, 119, 119)");</script></td>
</tr>
<tr>
<td colspan="2" style="padding:5px 0;"><hr style="background:#cccccc;height:1px;color:#cccccc;font-size:11px;border-width:0px;border-collapse: collapse;border-spacing: 0px;"></td>
</tr>
<tr>
<td colspan="2" style="font-size:11px;font-weight:bold;color:#333333;">
To save these settings, please enter your Upfrev password.
</td>
</tr>
<tr>
<th class="namegen">
<label for="password3" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr3_3">Password:</label>
</th>
<td>
<input autocomplete="off" type="password" id="password3" class="namegenv mgcf" style="display:inline-block;" onkeyup="enablesave(3);"><span class="passwordn" style="display:inline-block;visibility:hidden;" id="colorerr3_3v"><span class="passwordnv"><i class="passwordnvv"></i>Wrong password</span></span>
</td>
</tr>
<tr>
<td colspan="2">
<script type="text/javascript">
function cancelechange(){
$("#editblock3").hide();
$("#alreadyl3").remove();
$("#peditblock3").show();
}
</script>

<script type="text/javascript">

</script>
<label class="labelsave uiButton uiButtonConfirm mtm" id="psavec3" style="display:inline-block;" onclick="addnemail();"><input autocomplete="off" type="button" value="Save Changes" class="inputsave mgcf uiButtonText"  disabled="disabled" id="savec3" style="position:relative;left:0px;border:none;"></label>
<label class="cancellabel uiButton mtm" style="position:relative;left:-4px;" onclick="cancelechange();"><input autocomplete="off" type="button" value="Cancel" class="cancelinput mgcf uiButtonText" style="color:#333333;"></label>
</td>
</tr>
</table>

</div>
</div>';
?>
<?php include("end.php"); ?>