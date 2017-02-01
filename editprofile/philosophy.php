<?php
$echo.='
<script type="text/javascript">
$("#linksedit5").removeClass("linkseditv");
$("#linksedit5").addClass("linksedit");
</script>
<div class="mainweduwork" style="height:auto;">
<table class="eduworkft" cellspacing="0" cellpadding="0" style="margin-left:20px;">
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Religion:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">

<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="religion" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="What are your religious beliefs?" data-ac_justone="t"></div>


';

$tagsids='';
$tagsnames='';

$v2='';
$r=mysql_query("SELECT * FROM relipo WHERE id='$uid' AND type='religion' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$v2=for_textarea($m['kind_d']);
}

$echo.='
<textarea autocomplete="off" disabled="" class="hidden_sb" id="tagreligiontextaream">'.$v2.'</textarea>

<script type="text/javascript">
var psuf="religion";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="religion";
e.preventDefault();
e.stopPropagation();';

$v='What are your religious beliefs?';

$r=mysql_query("SELECT * FROM relipo WHERE id='$uid' AND type='religion' AND visibility='v'");
while($m=mysql_fetch_array($r)){
	
	$v=$m['kind'];
	
	$valuev=strtolower($m['kind']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['kind']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	
	$echo.='
			var ilusert=\''.$valuev.'\';
			var dusern=\''.$mm.'\'; 
	';
	
}
$c=mysql_num_rows($r);
if($c==0){
$echo.='var dusern="";';
}
$echo.='
var itv=$("#tag"+suf+"textaream").val();

ac_load_one_mt(suf,dusern,itv);
return false;
});
</script>';

$echo.='
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="relipo";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="religion";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Description:</div></th>
<td style="padding-top:4px;">
<textarea autocomplete="off" disabled="" class="disabled_textarea" id="tagreligiontextarea"></textarea>
<script type="text/javascript">';

if($v!="What are your religious beliefs?"){
$echo.='
				$("#tagreligiontextarea").removeAttr("disabled");
				$("#tagreligiontextarea").css("background","#ffffff");
';
}
$echo.='
</script>
</td>
<td></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Political&nbsp;Views:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="political" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="/autocomplete/political.php" data-ac_placeholder="What are your political beliefs?" data-ac_justone="t"></div>


';

$tagsids='';
$tagsnames='';

$v2='';
$r=mysql_query("SELECT * FROM relipo WHERE id='$uid' AND type='political' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$v2=for_textarea($m['kind_d']);
}

$echo.='
<textarea autocomplete="off" disabled="" class="hidden_sb" id="tagpoliticaltextaream">'.$v2.'</textarea>

<script type="text/javascript">
var psuf="political";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="political";
e.preventDefault();
e.stopPropagation();';

$v='What are your political beliefs?';

$r=mysql_query("SELECT * FROM relipo WHERE id='$uid' AND type='political' AND visibility='v'");
while($m=mysql_fetch_array($r)){
	
	$v=$m['kind'];
	
	$valuev=strtolower($m['kind']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['kind']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	
	$echo.='
			var ilusert=\''.$valuev.'\';
			var dusern=\''.$mm.'\'; 
	';
	
}
$c=mysql_num_rows($r);
if($c==0){
$echo.='var dusern="";';
}
$echo.='
var itv=$("#tag"+suf+"textaream").val();

ac_load_one_mt(suf,dusern,itv);
return false;
});
</script>';

$echo.='
</td>


</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="relipo";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="political";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Description:</div></th>
<td style="padding-top:4px;">
<textarea autocomplete="off" disabled="" class="disabled_textarea" id="tagpoliticaltextarea">'.$v2.'</textarea>
<script type="text/javascript">';

if($v!="What are your political beliefs?"){
$echo.='

				$("#political_description").removeAttr("disabled");
				$("#political_description").css("background","#ffffff");
';
}
$echo.='
</script>
</td>
<td></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">People&nbsp;Who&nbsp;Inspire You:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="inspirations" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="Who inspires you?"></div>
';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="inspirations";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="inspirations";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM inspirational WHERE id='$uid' AND (visibility='v' OR visibility='h') ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){

	$valuev=strtolower($m['person']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['person']);
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

$ltypev="inspirational";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Favorite&nbsp;Quotations:</div></th>
<td style="padding-top:6px;">';
$v='';
$r=mysql_query("SELECT * FROM quotations WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$v=for_textarea($m['quotations']);
}
$echo.='
<textarea autocomplete="off" class="uni_description" style="width:367px;max-width:367px;" rows="5" name="quotations" id="quotations">'.$v.'</textarea>
<script type="text/javascript">';
if($v==""){
$echo.='
$("#quotations").val("'.$v.'");
';
}
$echo.='
</script>
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="quotations";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<th></th>
<td style="padding-top:4px;">
<script type="text/javascript">
function saveci(){
$("#warns").css("display","none");

var tagsinspirations=$("#tagsinspirationsv").val();

var religion=$("#tagsreligionm").val();
if(religion=="What are your religious beliefs?"){religion="";}
var religion_d=$("#tagreligiontextarea").val();
var political=$("#tagspoliticalm").val();
if(political=="What are your political beliefs?"){political="";}
var political_d=$("#tagpoliticaltextarea").val();
var quotations=$("#quotations").val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/philosophy_post.php",
  data: { religion:religion, religion_d:religion_d, political:political, political_d:political_d, quotations:quotations,tagsinspirations:tagsinspirations },
  success: function(response) {
	  //alert(response);
	$(\'#warns\').html(\'<i class="warnsv"></i>Your changes have been saved.\');
	$("#warns").css("display","inline-block");
	}
});

}
</script>
<label class="savecedit" onclick="saveci();"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label>
<div style="overflow:visible;margin:0;padding:0;display:none;position:absolute;padding-left:17px;margin-left:10px;margin-top:2px;" id="warns">
</div></td>
</tr>
</table>
</div>
';
?>