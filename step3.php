<?php
$wp=$_POST['provider'];
if($wp=="yahoo"){$wp="Yahoo!";}
if($x>1){$sd='s';}
else{$sd='';}

if(!isset($bd)){
echo'
<div class="friendstitlewrapper">
<div class="friendstitle" style="position:relative;"><div class="friendstitleicon"></div>Friends</div>
</div>

<div class="friendslinkv" style="margin:0;padding:0;display:block;margin-top:5px;font-size:16px;color:rgb(28, 42, 71);">
<img src="/images/UHkKDRwgbaw.png" style="display:inline-block;margin-right:5px;"><span style="display:inline-block;position:relative;top:-15px;">Invite Friends and Family to Upfrev
</span></div>

<div class="stepswrapper">

<div class="partback2"></div>
<div class="partmiddle2" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 1</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Find Friends</div></div>
<div class="partfront2"></div>


<div class="partmiddle2" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 2</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Add Friends</div></div>


<div class="partback3"></div>
<div class="partmiddle" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 3</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Invite Friends</div></div>
<div class="partfront"></div>

</div>


<script type="text/javascript">
function selallf(){
var dem=$(".checkb").length;
var demv=$(".checkb:checked").length
var deml=dem-demv;
if(deml>0){
$(".checkb").attr("checked","checked");	
$("#selectallf").attr("checked","checked");
}
else{
$(".checkb:checked").removeAttr("checked");	
$("#selectallf").removeAttr("checked");	
}
}
function goc(w){
var a=$(\'#checkb\'+w).attr(\'checked\');
if(a===false){
$(\'#checkb\'+w).attr(\'checked\',\'checked\');	
}
else{
$(\'#checkb\'+w).removeAttr(\'checked\');		
}
var toti=$(".checkb").length;
var totc=$(".checkb:checked");
var totcl=totc.length;
if(toti==totcl){$("#selectallf").attr("checked","checked");}
else{$("#selectallf").removeAttr("checked");}
}
function goce(){
var toti=$(".checkb").length;
var totc=$(".checkb:checked");
var totcl=totc.length;
if(toti==totcl){$("#selectallf").attr("checked","checked");}
else{$("#selectallf").removeAttr("checked");}
}
</script>

<div style="display:none;margin:0;padding:0;" id="selectem">

<table class="tableselfv" cellspacing="0" cellpadding="0" style="width:100%;">
<tr><td style="width:24px;padding:5px;"><input type="checkbox" id="selectallf" name="selectallf" onclick="selallf();"></td>
<td style="padding:5px;font-size:11px;text-align:left;" class="selectallf"><a href="#" onclick="selallf(); return false;">Select All/None</a></td></tr>
</table>

<div style="border:1px solid rgb(187, 187, 187);margin:0;padding:0;display:block;max-height:270px;overflow-y:auto;">
<table style="border-collapse:collapse;width:100%;">';

$r=0;
$topost='';
foreach($dname as $key=>$value){
$topost.=$demail2[$key].',';	
	echo'<tr onmouseover="$(\'.tdi'.$r.'\').css(\'background-color\',\'#e6e6fa\');" onmouseout="$(\'.tdi'.$r.'\').css(\'background-color\',\'\');"><td class="tdi'.$r.'" style="width:24px;padding:5px;"><input value="'.$demail2[$key].'" type="checkbox" id="checkb'.$r.'" class="checkb" onclick="goce();"></td>
	<td class="tdi'.$r.'" style="padding:5px;text-align:left;cursor:pointer;width:50%;" title="'.$value.'"><div style="margin:0;padding:0;color:#333333;font-weight:bold;font-size:13px;display:block;text-overflow:ellipsis;">'.$value.'</div></td>
	<td class="tdi'.$r.'" style="padding:5px;text-align:left;" onclick="goc('.$r.');" title="'.$demail2[$key].'"><div style="display:block;margin:0;padding:0;color:gray;font-size:13px;font-weight:normal;text-overflow:ellipsis;">'.$demail2[$key].'</div></td></tr>';
$r++;
}

echo'
</table>

</div>

</div>


<script type="text/javascript">
function sendinvv(){
var nenas="'.$topost.'";
	$.ajax({
  async: "false",
  type: "POST",
  url: "sendinvites.php",
  data: {emails:nenas},
  success: function(response) {
  window.location="/find_friends.php?invites_sent_now="+response;
  }
});	
}
function sendinv(){
	
	var nenas="";

$(".checkb:checked").each(function() {
                var nena=$(this).val();
				nenas+=nena+",";	
        }); 

	$.ajax({
  async: "false",
  type: "POST",
  url: "sendinvites.php",
  data: {emails:nenas},
  success: function(response) {
	  //alert(response);
  window.location="/find_friends.php?invites_sent_now="+response;
  }
});

}
</script>

';

}

if(isset($bv)){
echo'<div style="margin:20px 0;font-size:11px;padding:0;display:block;" class="friendslinkv">
We couldn\'t find any contacts. Please <a href="find_friends.php">try another account</a>.</div>';
}
else if(isset($bd)){
echo'
<div style="background-color: rgb(242, 242, 242);border-bottom: medium none;border-top: 1px solid rgb(226, 226, 226);padding: 4px 6px 5px;font-weight:bold;color:#333333;" class="friendslinkv">
  Everyone on this contact list is already on Facebook or has already been invited. 
</div>
<div style="margin:0;padding:0;margin-top:20px;margin-bottom:20px;" class="friendslinkv">Would you like to <a href="find_friends.php">try another email account</a>?</div>
<label class="skipa" style="float:left;position:relative;right:0px;display:inline-block;" onclick="window.location=\'/find_friends.php\'"><input class="skipa2" type="button" value="Skip"></label>
';
}
else{
echo'
<div style="margin:20px 0;font-size:16px;padding:0;display:block;" id="selectemv">
Would you like to send friend invites to all of your imported contacts?
</div>

<div style="display:block;margin:0;padding:0;position:relative;position:relative;top:-5px;" id="sendinvv">
<label style="float:right;display:inline-block;position:relative;right:0px;" class="noinv" onclick="$(\'#selectemv\').css(\'display\',\'none\'); $(\'#selectem\').css(\'display\',\'block\'); $(\'#sendinvv\').css(\'display\',\'none\'); $(\'#sendinv\').css(\'display\',\'block\');"><input type="button" class="noinv2" value="No"></label>
<label style="float:right;display:inline-block;position:relative;right:0px;" class="yesinv" onclick="sendinvv();"><input type="button" class="yesinv2" value="Yes"></label>
</div>


<div style="display:none;margin:0;padding:0;position:relative;top:10px;" id="sendinv">
<label class="skipa" style="float:right;position:relative;right:0px;display:inline-block;" onclick="window.location=\'/find_friends.php\'"><input class="skipa2" type="button" value="Skip"></label>
<label class="addfriendsb" style="float:right;position:relative;right:0px;display:inline-block;" onclick="sendinv();"><input class="addfriendsb2" type="button" value="Send Invites"></label>
</div>

<div class="friendslinkv" style="color:gray;display:block;margin-top:45px;">Please send invites only to people you know personally who will be glad to get them. We\'ll automatically send up to 3 reminders after the first invite. <a href="#" onclick="return false;">Learn more</a> or <a href="#" onclick="return false;">see sample</a>.</div>


';
}




echo'';
?>