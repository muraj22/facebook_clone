<?php
$echo.='
<script type="text/javascript">
$("#linksedit6").removeClass("linkseditv");
$("#linksedit6").addClass("linksedit");
</script>
<div class="mainweduwork" style="height:auto;">
<table class="eduworkft" cellspacing="0" cellpadding="0" style="margin-left:20px;">
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Music:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="music" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="What music do you like?"></div>
';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="music";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="music";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND type='music' AND (visibility='v' OR visibility='h') ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){

	$valuev=strtolower($m['taste']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['taste']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	

	
}

$echo.='
$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});
</script>';

$echo.='

</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="tastes";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="music";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Books:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="books" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="What books do you like?"></div>



';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="books";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="books";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND type='books' AND (visibility='v' OR visibility='h') ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){

	$valuev=strtolower($m['taste']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['taste']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	

	
}

$echo.='
$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});
</script>';

$echo.='
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="tastes";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="books";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Movies:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="movies" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="What movies do you like?"></div>



';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="movies";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="movies";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND type='movies' AND (visibility='v' OR visibility='h') ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){

	$valuev=strtolower($m['taste']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['taste']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;

	
}

$echo.='
$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});
</script>';

$echo.='
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="tastes";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="movies";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Television:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="television" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="What TV shows do you like?"></div>




';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="television";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="television";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND type='television' AND (visibility='v' OR visibility='h') ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){

	$valuev=strtolower($m['taste']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['taste']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	

	
}

$echo.='
$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});
</script>';

$echo.='
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="tastes";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="television";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Games:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="games" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="What games do you like?"></div>
';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="games";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="games";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND type='games' AND (visibility='v' OR visibility='h') ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){

	$valuev=strtolower($m['taste']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['taste']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	

	
}

$echo.='
$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});
</script>';

$echo.='
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="tastes";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="games";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th></th>
<td style="padding-top:4px;">
<script type="text/javascript">

function employeri3(v,vv,vvv,vvvv){
if(vv==vvvv){
$("#"+v).css("width","100px");
}
}
function employeriv3(v,vv,vvv,vvvv){
if(vv==""){
var pallt=$("#tagsids"+vvv).val();
if(pallt==""){
$("#"+v).attr("placeholder",vvvv);
$("#"+v).css("width","360px");	
}
}
}

function send_post_start(){
$("#warns").css("display","none");
}

function send_post_done(){
$(\'#warns\').html(\'<i class="warnsv"></i>Your changes have been saved.\');
$("#warns").css("display","inline-block");
}
</script>
<input type="hidden" autocomplete="off" id="from" value="entertainment">
<label class="savecedit" fjax="/editprofile/entertainment_post.php" data-a_form=".mainweduwork" data-a_custom_f="send_post_done" data-a_starts="send_post_start" data-a_ismultiple="t"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label>
<div style="overflow:visible;margin:0;padding:0;display:none;position:absolute;padding-left:17px;margin-left:10px;margin-top:2px;" id="warns">
</div></td>
</tr>
</table>
</div>
';
?>