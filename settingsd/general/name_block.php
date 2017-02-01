<?php
include("start.php");
?>
<?php  

include("start.php");
?>
<?php
include("functions/sb_user.php");

$uti=sb_user($uid);
$r=mysql_query("SELECT * FROM namechange WHERE id='$uid' ORDER BY datetimep ASC LIMIT 5");
$c=mysql_num_rows($r);
if($c>4){
echo'
<div style="margin:0;padding:0;border: medium none;background-color: rgb(242, 242, 242);position:relative;" id="alreadyl1">
<div style="margin:0;padding:0;left: 0px;position: absolute;width: 155px;margin: 10px;"><strong>Name</strong></div>
<div style="margin:0;padding:0;margin-left: 175px;width: 400px;padding-bottom: 10px;padding-top:10px;">
<table style="table-layout: fixed;border: 0px none;border-collapse: collapse;border-spacing: 0px;width: 100%;">
<tr>
<th class="namegen"><label for="f_name" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr1">Full Name:</label></th>
<td class="namegenvv"><select class="namegenv mgcf" id="fullname" onchange="enablesave(1);">';
$fln=array();
$ax=0;
while($m=mysql_fetch_array($r)){
$fln[$ax]=$m['fullname'];
$ax++;
}

echo'<option value="'.$fln[4].'">'.$fln[4].'</option>';
echo'<option value="'.$fln[0].'">'.$fln[0].'</option>';
echo'<option value="'.$fln[3].'">'.$fln[3].'</option>';
echo'<option value="'.$fln[2].'">'.$fln[2].'</option>';
echo'<option value="'.$fln[1].'">'.$fln[1].'</option>';

echo'</select><script type="text/javascript">$("#fullname").val("'.$uti['fullname'].'");</script></td>
</tr>
<tr>
<td colspan="2" style="padding-bottom:10px;">
<div style="line-height: 16px;color: gray;font-size: 11px;margin-top: 5px;">We require everyone to use their real name on Upfrev.<br>Note that it usually takes 24 hours to confirm name changes.</div>
</td>
</tr>
<tr>
<td colspan="2" style="font-size:11px;font-weight:bold;color:#333333;border-top:1px solid rgb(204, 204, 204);padding-top:10px;">
To save these settings, please enter your Upfrev password.
</td>
</tr>
<tr>
<th class="namegen">
<label for="password1" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr3" onkeyup="enablesave(1);">Password:</label>
</th>
<td>
<input autocomplete="off" type="password" id="password1" class="namegenv mgcf" style="display:inline-block;" onkeyup="enablesave(1);"><span class="passwordn" style="display:inline-block;visibility:hidden;" id="colorerr3v"><span class="passwordnv"><i class="passwordnvv"></i>Wrong password</span></span>
</td>
</tr>
<tr>
<td colspan="2">
<script type="text/javascript">
function cancelnchange(){
$("#editblock1").hide();	
$("#alreadyl1").remove();
$("#peditblock1").show();
}
</script>
<label class="labelsave uiButton uiButtonConfirm" id="psavec1" style="display:inline;padding:3px 3px;padding-right:4px;padding-bottom:4px;" onclick="changenamev();"><input autocomplete="off" type="button" value="Save Changes" class="inputsave mgcf uiButtonText"  disabled="disabled" id="savec1" style="margin-top:10px;position:relative;left:0px;border:none;"></label>
<label class="cancellabel uiButton" style="padding:1px 3px;position:relative;top:8px;left:-4px;" onclick="cancelnchange();"><input autocomplete="off" type="button" value="Cancel" class="cancelinput mgcf uiButtonText" style="color:#333333;"></label>
</td>
</tr>
</table>
</div>
</div>
';	
}
else{
echo'
<div style="margin:0;padding:0;border: medium none;background-color: rgb(242, 242, 242);position:relative;" id="alreadyl1">
<div style="margin:0;padding: 10px;border: medium none;background-color: rgb(255, 235, 232);display:none;" id="errorcode1"><div style="padding:0;margin:0;margin-left: 159px;position:relative;"><span style="padding-left: 16px;display: inline-block;"><i style="top: 1px;left: 0px;position: absolute;vertical-align: middle;width: 11px;height: 11px;background-position: 0px -13px;background-image: url(\'/images/aBZpXx5UW0u.png\');background-repeat: no-repeat;display: inline-block;" id="errorcode_ra1"></i></span></div></div>
<div style="margin:0;padding:0;left: 0px;position: absolute;width: 155px;margin: 10px;"><strong>Name</strong></div>
<div style="margin:0;padding:0;margin-left: 175px;width: 400px;padding-bottom: 10px;padding-top:10px;">
<table style="table-layout: fixed;border: 0px none;border-collapse: collapse;border-spacing: 0px;width: 100%;">
<tr>
<th class="namegen"><label for="f_name" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr1">First:</label></th>
<td class="namegenvv"><input autocomplete="off" type="text" class="namegenv mgcf" id="f_name" onkeyup="enablesave(1);"><span class="passwordn" style="display:inline-block;visibility:hidden;" id="colorerr1v"><span class="passwordnv"><i class="passwordnvv"></i>You must provide a first name.</span></span><script type="text/javascript">$("#f_name").val("'.$uti['f_name'].'");</script></td>
</tr>
<tr>
<th class="namegen"><label for="m_name" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel">Middle:</label></th>';
$r=mysql_query("SELECT * FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$uti['middlename']=$m['middlename'];	
}
if($uti['middlename']==''){
$mdname='Optional';
$mdnamec='rgb(119, 119, 119)';	
}
else{
$mdname=$uti['middlename'];
$mdnamec='#333333';	
}
echo'<td class="namegenvv">
<script type="text/javascript">
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
</script><input autocomplete="off" type="text" class="namegenv mgcf" id="m_name" onfocus="clearme(this.id);" onblur="blurme(this.id);" onkeyup="enablesave(1);"><script type="text/javascript">$("#m_name").val("'.$mdname.'"); $("#m_name").css("color","'.$mdnamec.'");</script></td>
</tr>
<tr>
<th class="namegen"><label for="l_name" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr2">Last:</label></th>';

$uti['l_name']=str_replace($uti['middlename'],'',$uti['l_name']);
$uti['l_name']=trim($uti['l_name']);

if($uti['middlename']!=''){
$mdexists='<input autocomplete="off" type="hidden" id="mdexists">';
}
else{
$mdexists='';	
}

echo'<td class="namegenvv">'.$mdexists.'<input autocomplete="off" type="text" class="namegenv mgcf" id="l_name" onkeyup="enablesave(1);"><span class="passwordn" style="display:inline-block;visibility:hidden;" id="colorerr2v"><span class="passwordnv"><i class="passwordnvv"></i>You must provide a last name.</span></span><script type="text/javascript">$("#l_name").val("'.$uti['l_name'].'");</script></td>
</tr>
<tr>
<th class="namegen"><label for="fullname" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel">Display as:</label></th>
<td class="namegenvv">
<select id="fullname" class="selname mgcf" onchange="enablesave(1);">';
if($uti['middlename']!=''){
echo'<option value="'.$uti['f_name'].' '.$uti['middlename'].' '.$uti['l_name'].'" id="mdexistsv">'.$uti['f_name'].' '.$uti['middlename'].' '.$uti['l_name'].'</option>';	
}
echo'<option value="'.$uti['f_name'].' '.$uti['l_name'].'">'.$uti['f_name'].' '.$uti['l_name'].'</option>
<option value="'.$uti['l_name'].' '.$uti['f_name'].'">'.$uti['l_name'].' '.$uti['f_name'].'</option>
</select><script type="text/javascript">$("#fullname").val("'.$uti['fullname'].'");</script></td>
</tr>
<tr>
<td colspan="2" style="padding-bottom:10px;">
<div style="line-height: 16px;color: gray;font-size: 11px;margin-top: 5px;">We require everyone to use their real name on Upfrev.<br>Note that it usually takes 24 hours to confirm name changes.</div>
</td>
</tr>
<tr>
<td colspan="2" style="font-size:11px;font-weight:bold;color:#333333;border-top:1px solid rgb(204, 204, 204);padding-top:10px;">
To save these settings, please enter your Upfrev password.
</td>
</tr>
<tr>
<th class="namegen">
<label for="password1" style="cursor: pointer;color: rgb(102, 102, 102);font-weight: bold;vertical-align: middle;" class="namegenlabel" id="colorerr3" onkeyup="enablesave(1);">Password:</label>
</th>
<td>
<input autocomplete="off" type="password" id="password1" class="namegenv mgcf" style="display:inline-block;" onkeyup="enablesave(1);"><span class="passwordn" style="display:inline-block;visibility:hidden;" id="colorerr3v"><span class="passwordnv"><i class="passwordnvv"></i>Wrong password</span></span>
</td>
</tr>
<tr>
<td colspan="2">
<script type="text/javascript">
function cancelnchange(){
$("#editblock1").hide();	
$("#alreadyl1").remove();
$("#peditblock1").show();
}
</script>
<label class="uiButton uiButtonConfirm labelsave mtm" id="psavec1" style="display:inline-block;" onclick="changename();"><input autocomplete="off" type="button" value="Save Changes" class="uiButtonText inputsave mgcf"  disabled="disabled" id="savec1" style="position:relative;left:0px;border:none;"></label>
<label class="uiButton cancellabel mtm" style="position:relative;left:-4px;" onclick="cancelnchange();"><input autocomplete="off" type="button" value="Cancel" class="cancelinput uiButtonText mgcf" style="color:#333333;"></label>
</td>
</tr>
</table>
</div>
</div>';
}
?>
<?php include("end.php"); ?>