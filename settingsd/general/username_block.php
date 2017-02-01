<?php
include("start.php");
?>
<?php  

include("start.php");
?>
<?php
include("functions/sb_user.php");

$uti=sb_user($uid);
echo'
<div style="margin:0;padding:0;border: medium none;background-color: rgb(242, 242, 242);position:relative;" id="alreadyl2">
<div style="margin:0;padding:0;left: 0px;position: absolute;width: 155px;margin: 10px;"><strong>Username</strong></div>
<div style="margin:0;padding:0;margin-left: 175px;width: 400px;padding-bottom: 10px;padding-top:10px;">
<table style="table-layout: fixed;border: 0px none;border-collapse: collapse;border-spacing: 0px;width: 100%;">
<tr>
<td colspan="2" style="color:gray;padding-top:10px;">
<div style="margin:0;padding:0;padding-bottom:5px;">
Your public username is the same as your address for:
</div>
<ul class="publicusername" style="margin-bottom:10px;">
<li style="color:#333333;">Timeline: subsbook.com/<span style="font-weight:bold;margin:0;padding:0;" id="usernamet1"></span></li>
</ul>
<script type="text/javascript">
function copymir(v){
$("#usernamet1").html(v);	
}
</script>
</td>
</tr>
<tr>
<th class="namegen"><label for="username" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel">Username:</label></th>
<td class="namegenvv" style="padding-bottom:10px;"><input autocomplete="off" type="text" class="namegenv mgcf" id="username" onkeyup="enablesave(2); copymir(this.value);"><span class="passwordn" style="display:inline-block;visibility:hidden;" id="avx"><span class="passwordnv"><i class="avx"></i>Username is not available</span></span><span class="passwordn" style="display:inline-block;visibility:hidden;" id="avc"><span class="passwordnv"><i class="avc"></i>Username is available</span></span><span class="passwordn" style="display:inline-block;visibility:hidden;" id="pecodeu"><span class="passwordnv"><i class="avx"></i><span id="ecodeu"></span></span></span><span class="passwordn" style="display:inline-block;visibility:hidden;" id="loadingdeu"><span class="passwordnv"><img style="position:absolute;left:0;top:-10px;vertical-align:middle;border:0 none;display:inline-block;" height="11" width="16" src="/images/GsNJNwuI-UM.gif"></span></span><script type="text/javascript">$("#username").val("'.$un.'");
$("#usernamet1").html("'.$un.'");</script></td>
</tr>
<tr>
<td colspan="2" style="color:gray;padding-top:2px;">
<div style="margin:0;padding:0;padding-bottom:5px;">
Note:
</div>
<ul class="publicusername" style="margin-bottom:10px;">
<li style="color:#333333;">Your username can only be changed once and should include your real name.</li>
</ul>
</td>
</tr>
<tr>
<td colspan="2" style="font-size:11px;font-weight:bold;color:#333333;border-top:1px solid rgb(204, 204, 204);padding-top:10px;">
To save these settings, please enter your Upfrev password.
</td>
</tr>
<tr>
<th class="namegen">
<label for="password2" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr3_2">Password:</label>
</th>
<td>
<input autocomplete="off" type="password" id="password2" class="namegenv mgcf" style="display:inline-block;" onkeyup="enablesave(2);"><span class="passwordn" style="display:inline-block;visibility:hidden;" id="colorerr3_2v"><span class="passwordnv"><i class="passwordnvv"></i>Wrong password</span></span>
</td>
<tr>
<td colspan="2">
<script type="text/javascript">
function canceluchange(){
$("#editblock2").hide();	
$("#alreadyl2").remove();
$("#peditblock2").show();
var a=$("#usernamem").val();


$("#usernamet1").html(a);
$("#username").val(a);
$("#password2").val("");
$("#avx").css("visibility","hidden");
$("#avc").css("visibility","hidden");

$(".namegenlabel").css("color","rgb(102, 102, 102)");

$("#colorerr3_2v").css("visibility","hidden");
 clearTimeout(timeravailability);
enablesave(2,1);
}
</script>
<input autocomplete="off" type="hidden" id="pusernamec">
<input autocomplete="off" type="hidden" id="usernamem">
<script type="text/javascript">
$("#usernamem").val("'.$uti['username'].'");
$("#pusernamec").val("'.$uti['username'].'");
</script>
<label class="labelsave uiButton uiButtonConfirm mtm" id="psavec2" style="display:inline-block;" onclick="changeusername();"><input autocomplete="off" type="button" value="Save Changes" class="inputsave mgcf uiButtonText"  disabled="disabled" id="savec2" style="position:relative;left:0px;border:none;"></label>
<label class="cancellabel uiButton mtm" style="position:relative;left:-4px;" onclick="canceluchange();"><input autocomplete="off" type="button" value="Cancel" class="cancelinput mgcf uiButtonText" style="color:#333333;"></label>
</td>
</tr>
</table>
</div>
</div>';
?>
<?php include("end.php"); ?>