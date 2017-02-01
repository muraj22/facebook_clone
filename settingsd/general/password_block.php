<?php
include("start.php");
?>
<?php  

include("start.php");
?>
<?php
echo'
<script type="text/javascript">
function changepass(){
$(".mgcf").attr("disabled",true);
var opass=$("#opass").val();	
var npass=$("#npass").val();
var npassr=$("#npassr").val();


$.ajax({
  type: "POST",
  url: "settingsd/general/change_password.php",
  data: { opass:opass,npass:npass,npassr:npassr},
  success: function(response) {
	  //alert(response);
$(".namegenlabel").css("color","rgb(102, 102, 102)");
$("#password_error,#password_errorv,#password_errorvv").css("visibility","hidden");

var res=$.parseJSON(response);
if(res.error!==undefined){
$("#password_error").html(res.error);
$("#password_error").css("visibility","visible");
$("#colorerr4_6").css("color","rgb(204, 102, 102)");
enablesave(4,1);
}
else if(res.errorv!==undefined){
$("#password_errorv").html(res.errorv);
$("#password_errorv").css("visibility","visible");
}
else if(res.errorvv!==undefined){
$("#password_errorvv").html(res.errorvv);
$("#password_errorvv").css("visibility","visible");
}
else if(res.ok!==undefined){
 $("#blockedita4").val("n");

$("#editblock4").css("display","none");
$("#spsul4").css("display","none");

$("#pchange").html("Updated 2 seconds ago.");

$("#peditblock4").css("background","#FFF9D7");
$("#peditblock4").fadeIn("slow",function(){
$("#pspsul4").fadeIn("slow", function() {
$("#peditblock4").animate({ backgroundColor: "#FFF9D7" }, "slow");

$.doTimeout(90, function(){
$("#pspsul4").fadeOut("medium",function(){

$.doTimeout(165, function(){
$("#peditblock4").animate({ backgroundColor: "#ffffff" }, "slow");
$("#spsul4").fadeIn("fast");	
$("#alreadyl4").remove();

 $("#blockedita4").val("y");
});	
	
});

});	

});	

});	
 

	}

$(".mgcf").attr("disabled",false);
$(".inputsave").attr("disabled",true);
}
});
}
</script>

<div style="margin:0;padding:0;border: medium none;background-color: rgb(242, 242, 242);position:relative;" id="alreadyl3">
<div style="margin:0;padding:0;left: 0px;position: absolute;width: 155px;margin: 10px;"><strong>Password</strong></div>
<div style="margin:0;padding:0;margin-left: 175px;width: 400px;padding-bottom: 10px;padding-top:10px;">
<table style="table-layout: fixed;border: 0px none;border-collapse: collapse;border-spacing: 0px;width: 100%;">

<tr>
<th class="namegen"><label for="username" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr4_6">Current:</label></th>
<td class="namegenvv" style="padding-top:5px;">
<input autocomplete="off" type="password" class="namegenv mgcf" id="opass" onkeyup="enablesave(4);"><div id="password_error" style="position:relative;display:inline-block;"></div>
</td>
</tr>
<tr>
<th></th>
<td><div style="margin:0;padding:0;">&nbsp;</div></td>
</tr>
<tr>
<th class="namegen"><label for="username" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr4_7">New:</label></th>
<td class="namegenvv" style="padding-top:5px;">
<script type="text/javascript" src="/js/password_security.php"></script>
<input autocomplete="off" type="password" class="namegenv mgcf" id="npass" onkeyup="enablesave(4); setps($(this).val());"><div id="password_errorv" style="position:relative;display:inline-block;"></div>
</td>
</tr>
<tr>
<th></th>
<td><div style="margin:0;padding:0;position:absolute;visibility:hidden;color:orange;font-weight:bold;" id="pstrengthvv">Too Short</div>
<div style="margin:0;padding:0;visibility:hidden;" id="pstrengthv">Password strength: <span id="pstrength" style="font-weight:bold;"></span></div></td>
</tr>
<tr>
<th class="namegen"><label for="username" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr4_4">Re-type new:</label></th>
<td class="namegenvv" style="padding-top:5px;">
<input autocomplete="off" type="password" class="namegenv mgcf" id="npassr" onkeyup="enablesave(4); dopwm(this.value);"><div id="password_errorvv" style="position:relative;display:inline-block;"></div>
</td>
</tr>
<tr>
<th></th>
<td><div style="margin:0;padding:0;font-weight:bold;" id="pmatch">&nbsp;</div></td>
</tr>
<tr>
<td colspan="2" style="padding:5px 0;padding-bottom:0;"><hr style="background:#cccccc;height:1px;color:#cccccc;font-size:11px;border-width:0px;border-collapse: collapse;border-spacing: 0px;margin:0;margin-bottom:1px;"></td>
</tr>
<tr>
<td colspan="2" style="padding-top:0;">
<script type="text/javascript">
function cancelpchange(){
$("#editblock4").hide();	
$("#alreadyl4").remove();
$("#peditblock4").show();
}
</script>
<label class="labelsave uiButton uiButtonConfirm mtm" id="psavec4" style="display:inline-block;" onclick="changepass();"><input autocomplete="off" type="button" value="Save Changes" class="inputsave mgcf uiButtonText"  disabled="disabled" id="savec4" style="position:relative;left:0px;border:none;"></label>
<label class="cancellabel uiButton mtm" style="position:relative;left:-4px;" onclick="cancelpchange();"><input autocomplete="off" type="button" value="Cancel" class="cancelinput mgcf uiButtonText" style="color:#333333;"></label>
</td>
</tr>
</table>

</div>
</div>';
?>
<?php include("end.php"); ?>