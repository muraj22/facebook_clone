<?php
$echo.='
<script type="text/javascript">
$("#linksedit8").removeClass("linkseditv");
$("#linksedit8").addClass("linksedit");
</script>
<div class="mainweduwork" style="height:auto;">
<table class="eduworkft" cellspacing="0" cellpadding="0" style="margin-left:20px;">
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Activites:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="activities" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="What do you like to do?"></div>
';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="activities";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="activities";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND type='activities' AND (visibility='v' OR visibility='h') ORDER BY datetimep ASC");
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

$extra_param="activities";

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
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">Interests:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="interests" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="self" data-ac_placeholder="What are your interests?"></div>
';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="interests";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="interests";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM tastes WHERE id='$uid' AND type='interests' AND (visibility='v' OR visibility='h') ORDER BY datetimep ASC");
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

$extra_param="interests";

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
function checkle(evt,v,vv,vvv){
var charCode = (evt.which) ? evt.which : event.keyCode
var tocheck=$("#"+vvv).val();
tocheck=$.trim(tocheck);
if((charCode == "8") && (tocheck=="")){
	var ftry=$("#ftryl"+vv).val();
	$("#ftryl"+vv).val("y");
	if(ftry=="y"){
	var dame=$("#tagsids"+vv).val();
	var pallt=$("#tagsids"+vv).val();
if(pallt!==undefined){
var allt=pallt.split(",");
var alltv=allt.length-1;

var damev=allt[alltv];
}

if(damev!=""){
	$("#ccarital"+vvv+damev).click();
}

	$("#ftryl"+vv).val("n");
	}
	}
else{}
}

	function delovl(w,c,v,vv){
var ctoteti=$("#tagsids"+v).val();
ctoteti=ctoteti.replace(","+w,"");
$("#tagsids"+v).val(ctoteti);
renewvvl(v,vv);	
$("#"+vv).blur();
$("#"+vv).focus();
}
function renewvvl(v,vv){
	
	var pallt=$("#tagsids"+v).val();

if(pallt==""){$("#"+vv).css("left","3px"); $("#"+vv).css("width","290px"); $("#tagsnames"+v).val("");}
	var rompecocos="";
	var rompecocos2="";
if(pallt!==undefined){
var allt=pallt.split(",");
var alltv=allt.length-1;

x=1;
while(x<=alltv){

rompecocos+=\'<div class="carita" id="carital\'+vv+x+\'"><div title="\'+$("#emptyl"+vv+allt[x]).html()+\'" style="max-width:100px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:inline-block;">\'+$("#emptyl"+vv+allt[x]).html()+\'</div><div id="ccarital\'+vv+allt[x]+\'" onclick="delovl(\\\'\'+allt[x]+\'\\\',1,\\\'\'+v+\'\\\',\\\'\'+vv+\'\\\')" class="ccarita" title="Remove \'+$("#emptyl"+vv+allt[x]).html()+\'" style=""></div></div>\';

rompecocos2+=","+$("#emptyl2"+vv+allt[x]).html();

x++;
}

}

$("#currentpl"+v).html(rompecocos);
$("#tagsnames"+v).val(rompecocos2);

$("#"+vv).css("bottom","3px");

var xv=x-1;
var iwidth=$("#carital"+vv+xv).innerWidth();
if(iwidth){
var oftop=$("#carital"+vv+xv).offset().top;
var ofleft=$("#carital"+vv+xv).offset().left;

iwidth=parseInt(iwidth);
ofleft=parseInt(ofleft);

var ofleft2=$("#currentpl"+v).offset().left;
ofleft2=parseInt(ofleft2);

var ofleft3=ofleft-ofleft2;

var twidth=iwidth+ofleft3+10;

var tent=iwidth+ofleft3;
var tentw=367-280;

if(tent>280){
$(\'#currentpl\'+v).append(\'<div style="display:inline-block;width:\'+tentw+\'px;max-width:\'+tentw+\'px;background:none;border:none;" class="carita"></div>\');
$("#"+vv).css("left","4px");
$("#"+vv).css("bottom","3px");
var okv=245;	
}
else{
$("#"+vv).css("left",twidth+"px");
var okv=360-twidth;
}
}
if(pallt==""){
$("#"+vv).css("width","360px");	
}
else{
$("#"+vv).css("width","100px");
}

var cwidthv=0;
var x=1;
while(x<=alltv){
var cwidth=$("#carital"+vv+x).innerWidth();
cwidth=parseInt(cwidth);
cwidthv=parseInt(cwidthv);
cwidthv=cwidth+cwidthv;
if(cwidthv>300){
var cwidthvvv=cwidthv;
cwidthv=0;	
}
if(cwidthv=="0"){
var cwidthvv=300-cwidthvvv;
}
else{
var cwidthvv=300-cwidthv;	
}
x++;
}
if(pallt!=""){

$("#"+vv).css("width",okv+"px");

}
}
renewvvl(1,"activities");
renewvvl(2,"interests");

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
<input type="hidden" autocomplete="off" id="from" value="activities">
<label class="savecedit" fjax="/editprofile/entertainment_post.php" data-a_form=".mainweduwork" data-a_custom_f="send_post_done" data-a_starts="send_post_start" data-a_ismultiple="t"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label>
<div style="overflow:visible;margin:0;padding:0;display:none;position:absolute;padding-left:17px;margin-left:10px;margin-top:2px;" id="warns">
</div></td>
</tr>
</table>
</div>
';
?>