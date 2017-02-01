<?php
$echo.='
<script type="text/javascript">
$("#linksedit3").removeClass("linkseditv");
$("#linksedit3").addClass("linksedit");
</script>
<div class="mainwrelationships">
<table class="relationshipsft" cellspacing="0" cellpadding="0">
<tr>
<th class="relationshipsth">Relationship Status:</th>
<td class="relationshipstd nfamilyv hidden_sbvi" style="width:605px;" id="love_selector">
<div style="padding:0;margin:0;width:377px;display:inline-block;float:left;">
<select class="relationSelector" id="relationselector" data-onchange="remove_confirm_relation_b">
<option value="0"></option>
<option value="1">Single</option>
<option value="2">In a relationship</option>
<option value="3">Engaged</option>
<option value="4">Married</option>
<option value="5">It\'s complicated</option>
<option value="6">In an open relationship</option>
<option value="7">Widowed</option>
<option value="8">Separated</option>
<option value="9">Divorced</option>
</select>
<div style="display:inline-block;" class="hidden_sb" id="to_relation"><span>to</span></div>
<div style="display:block;margin-top:5px;" class="hidden_sb" id="relation_holder">

</div>
';

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND type='love' AND relation_confirmed='2' ORDER BY datetimep DESC LIMIT 1");
$c=mysql_num_rows($r);
while($m=mysql_fetch_array($r)){
$relationship_s=$m['relation'];
}
if($c==0){
$relationship_s=0;
}

$echo.='
<script type="text/javascript">
var myval2="'.$relationship_s.'";
$("#relationselector option[value=\'"+myval2+"\']").attr("selected", "selected");
</script>';

$echo.='
<script type="text/javascript">
if(relation_possibilities===undefined){
	
var relation_possibilities=new Array();
relation_possibilities[0]=1;
relation_possibilities[1]=7;
relation_possibilities[2]=8;
relation_possibilities[3]=9;
relation_possibilities[4]=0;

function remove_confirm_relation_b(w){
$(w).parents(".nfamilyv").eq(0).find(".relation_confirm_options").remove();

if(in_array($(w).val(),relation_possibilities)){
$(w).parents(".nfamilyv").eq(0).find("#to_relation,#relation_holder").addClass("hidden_sb");
}
else{
$(w).parents(".nfamilyv").eq(0).find("#to_relation,#relation_holder").removeClass("hidden_sb");	
}
}

var nfamily_bc=retcount();

function nfamily_b(){
var nfamily="";
nfamily+=\'<div style="display:inline-block;float:left;">\';
nfamily+=\'<div style="width:225px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="family\'+nfamily_bc+\'" data-ac_liwidth="193" data-ac_inputw="205" data-ac_url="/autocomplete/jump_note.php?friends=t&gender=t" data-ac_custom_f="gender_select" data-ac_custom_f_r="gender_select_reset" data-ac_placeholder="" data-ac_justone="t"></div>\';
nfamily+=\'</div>\';
var actual=$(".nfamilyv:first").find(".relationSelector").val();
if(in_array(actual,relation_possibilities)){
$("#to_relation,#relation_holder").addClass("hidden_sb");	
}
else{
$("#to_relation,#relation_holder").removeClass("hidden_sb");		
}
$("#relation_holder").prepend(nfamily);
}
nfamily_b();

} //end relationships undefined
</script>
';


$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND type='love'");
while($m=mysql_fetch_array($r)){
$listid=$m['sbid'];	
}


$echo.='<script type="text/javascript">
var psuf="family"+nfamily_bc;
$("body").on("click","#tag_l"+psuf,function(e){
var suf="family"+nfamily_bc;
e.preventDefault();
e.stopPropagation();
';

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND visibility='v' AND id2!='' AND relation_confirmed='2'");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id2']);
$gender=$uti['gender'];

$echo.='
$(".nfamilyv:first").addClass("hidden_sbvi");
$("#love_selector").find("input[name=tags]:last").val("'.$m['id2'].'");
$("#love_selector").find("input[name=tagsv]:last").val("'.$uti['fullname'].'");
var dusern="'.$uti['fullname'].'";
var itv="";
var suf=$("#love_selector").find("[data-ac_penable]:last").attr("data-ac_penable");
ac_load_one_mt(suf,dusern,itv);
';
	
}


$echo.='
$(".nfamilyv:first").removeClass("hidden_sbvi");

});

</script>';


$uidv=$uid;

$ltypev="relationship";

if(!isset($sbid)){
$sbid="";	
}
$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='</div>';

$echo.='<div style="display:inline-block;float:left;">';

$echo.='<ul class="uiList inlineBlock rfloat" style="position:relative;top:-3px;margin-right:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</div></td></tr>';


$echo.='<tr>
<td colspan="2" style="padding:5px 0px;">
<hr class="hrs">
</td>
</tr>
<tr id="nfamily_members">
<th class="relationshipsth">Family:</th>
<td class="relationshipstd" style="width:605px;"><div style="width:419px;margin:0;padding:0;">';

$uidv=$uid;

$ltypev="lists_members";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock hidden_sb rfloat" style="position:relative;top:-3px;margin-right:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="family";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='
<div style="padding-top:3px;" class="nfamily familyMember"></div>
<script type="text/javascript">
if(family_loaded===undefined){

function gender_select(ui,org_elem){

var cselected=$(org_elem).parents(".nfamilyv").eq(0).find(".relationSelector").val();

if(ui.gender=="1"){
var dgender=$("#family_female").find(".relationSelector").clone();
}
else{
var dgender=$("#family_male").find(".relationSelector").clone();
}

$(dgender).val(cselected);

$(dgender).find("option[value=0a]").remove();
$(org_elem).parents(".nfamilyv").eq(0).find(".relationSelectorw").html($(dgender));
}


function gender_select_reset(org_elem){
var dgender=$("#family_complete").find(".relationSelector").clone();
$(dgender).find("option[value=0a]").remove();
$(org_elem).parents(".nfamilyv").eq(0).find(".relationSelectorw").html($(dgender));
}


function remove_confirm_relation(w){
$(w).parents(".nfamilyv").eq(0).find(".relation_confirm_options").remove();
}

function nfamily(){
var c=retcount();
var nfamily=\'<div style="display:block;width:419px;" class="clearfix hidden_sbs nfamilyv">\';
nfamily+=\'<div style="display:inline-block;">\';
nfamily+=\'<div style="display:inline-block;float:left;">\';
nfamily+=\'<div style="width:225px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="family\'+c+\'" data-ac_liwidth="193" data-ac_inputw="205" data-ac_url="/autocomplete/jump_note.php?friends=t&gender=t" data-ac_custom_f="gender_select" data-ac_custom_f_r="gender_select_reset" data-ac_placeholder="" data-ac_justone="t"></div>\';
nfamily+=\'</div>\';
nfamily+=\'<div style="display:inline-block;float:left;margin-left:10px;" class="relationSelectorw">\';

var dgender=$("#family_complete").find(".relationSelector").clone();
$(dgender).find("option[value=0a]").remove();

nfamily+=\'</div>\';
nfamily+=\'</div>\';

$(".nfamily").append(nfamily);
$(".nfamilyv:last").find(".relationSelectorw").html($(dgender));

$(".nfamily [data-ac_enable]:last").click();

var dprivacy=$(".relationshipstd").find(".uiList:first").eq(0).clone();
$(dprivacy).removeClass("hidden_sb");
$(".nfamilyv:last").append($(dprivacy));

$(".nfamily .hidden_sbs:last").removeClass("hidden_sbs");
}
	
	
	
var family_loaded="t";


$(document).on("focus",".nfamily .ui-autocomplete-input",function(){
$(this).attr("placeholder","Name");	
});


$(document).on("click",".mainwrelationships .member",function(){
nfamily();
});
}


$(document).on("click",".hide_relationship",function(){
var thisv=$(this);

$.doTimeout(0,function(){
$(thisv).parents(".nfamilyv").eq(0).fadeOut("400",function(){
$(this).addClass("hidden_sb").remove();	
});

});

	
});

$(document).on("click",".confirm_relationship",function(){
var thisv=$(this);

$.doTimeout(0,function(){
$(thisv).parents(".relation_confirm_options").eq(0).fadeOut("400",function(){
$(this).addClass("hidden_sb").remove();
});	

});	


});
</script>';


$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND type='family'");
while($m=mysql_fetch_array($r)){
$listid=$m['sbid'];	
}


$echo.='<script type="text/javascript">
$(document).ready(function(){
$(".member").addClass("hidden_sbvi");
';
$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND visibility='v' AND relation_confirmed!='3'");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id2']);
$gender=$uti['gender'];

$echo.='
nfamily();
$(".nfamilyv:last").addClass("hidden_sbvi");
$("#nfamily_members").find("input[name=tags]:last").val("'.$m['id2'].'");
$("#nfamily_members").find("input[name=tagsv]:last").val("'.$uti['fullname'].'");
var dusern="'.$uti['fullname'].'";
var itv="";
var suf=$("#nfamily_members").find("[data-ac_penable]:last").attr("data-ac_penable");
ac_load_one_mt(suf,dusern,itv);';

if($gender==1){
$echo.='var dhtml=$("#family_female").html();';	
}
else{
$echo.='var dhtml=$("#family_male").html();';
}
$echo.='
$("#nfamily_members").find(".relationSelector:last").html(dhtml);
$("#nfamily_members").find(".relationSelector:last").find("option[value=0]").remove();
var relation="'.$m['relation'].'";
if(relation!="0a"){
$("#nfamily_members").find(".relationSelector:last").find("option[value=0a]").remove();	
}
$("#nfamily_members").find(".relationSelector:last").val("'.$m['relation'].'");
';


$uidv=$uid;

$ltypev="lists_members";

$sbid=$m['sbid'];

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="family";

include("buttons/privacy_button.php");
$button=str_replace("'","\\'",$button);
$button=str_replace("
","",$button);

$echo.='
var dbutton=\'<ul class="uiList inlineBlock rfloat" style="position:relative;top:-3px;margin-right:0px;">\';
dbutton+=\''.$button.'\';
dbutton+=\'</ul>\';

$(".nfamilyv:last").append(dbutton);
$(".nfamilyv:last").find(".uiList").eq(0).remove();
';



$echo.='
$(".nfamilyv:last").removeClass("hidden_sbvi");
';


if($m['relation_confirmed']=="1"){
$echo.='
var c=retcount();
$(".nfamilyv:last").append(\'<div class="clearfix relation_confirm_options" style="margin-right:63px;float:right;margin-top:0px;margin-bottom:0px;"><label class="confirm_relationship uiButton uiButtonConfirm" data-a_id="relation_confirm\'+c+\'" fjax="/ajax/relationships/confirm.php?sbid='.$m['sbid'].'"><input class="uiButtonText"  type="button" value="Add to Wall"></label><label class="hide_relationship uiButton" data-a_id="relation_confirm\'+c+\'" fjax="/ajax/relationships/hide.php?sbid='.$m['sbid'].'"><input class="uiButtonText" type="button" value="Hide"></label></div>\');
';	
}

}


$echo.='
$(".member").removeClass("hidden_sbvi");
});
</script>';

$echo.='
<script type="text/javascript">
$(document).ready(function(){
nfamily();
});
</script>
<div style="display:block;margin-top:20px;">
<span class="lb"><a href="#" class="member">Add another family member</a></span>
</div>


</div>
</td>

</tr>

';

$echo.='
<tr>
<td colspan="2" style="padding:5px 0px;">
<hr class="hrs">
</td>
</tr>
<tr>
<th class="relationshipsth">Friends:</th>
<td class="relationshipstd" style="width:605px;">
<div style="width:419px;margin:0;padding:0;">

<div class="friendsrela" style="padding-top:3px;display:inline-block;width:330px;">
<div style="float:left;margin:0;padding:0;">
<div style="font-weight:bold;margin;0;padding;0;">
Friends
</div>';
$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
$c=mysql_num_rows($r);

$u_friends=array();
while($m = mysql_fetch_array($r))
  {
	  $dfriend=$m['id2'];
$r2 = mysql_query("SELECT * FROM registered WHERE id='$dfriend'");
while($m2 = mysql_fetch_array($r2))
  {
$u_friends[]=$m2['id'];
}
}

if($c>1){$p='s';}else{$p='';}
$echo.='
<div style="color:gray">
'.$c.' friend'.$p.'
</div>
</div>
<table style="float: right;border: 0px none;border-collapse: collapse;border-spacing: 0px;" cellspacing="0" cellpadding="0">
<tr>
<td>
';
$u_friendspe=$u_friends;
shuffle($u_friendspe);
$c=0;
foreach($u_friendspe as $key=> $value){
if($c=='3'){break;}
$r=mysql_query("SELECT * FROM registered WHERE id='$value'");
while($m=mysql_fetch_array($r)){
$friendpp=$m['profilepict'];
$friendfn=$m['fullname'];	
$friendun=$m['username'];
if($friendun==''){$friendun=$value;}
$friendfn=str_replace(" ","&nbsp;",$friendfn);
$echo.='
<div style="display:inline-block;padding:0;margin: 2px 2px 0px 0px;position:relative;">
<a href="#" style="display:block;" onclick="return false;" data-t_topleft="t" data-t_text="'.$friendfn.'">
<img src="/'.$value.'/pics/'.$friendpp.'" style="width:24px;height:24px;border:none;">
</a>
</div>
';
}
$c++;	
}
$echo.='
<div style="width:25px;display:inline-block;margin:0;padding:0;"></div>

</div>
</td>
</tr>
</table>
</div>';

$uidv=$uid;

$ltypev="friends";
$sbid="";

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock rfloat" style="position:relative;top:-3px;margin-right:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<td colspan="2" style="padding:5px 0px;">
<hr class="hrs">
</td>
</tr>
<tr>
<th></th>
<td style="padding-top:4px;">
<script type="text/javascript">
function saveci_relationships(){

var oarr={}; //love arrays
var oarrv={};
var oarrvv={};

var darr={};
var darrv={};
var darrvv={};
$("#nfamily_members").find("input[name=tags]").each(function(){


var k=$(this).parents(".nfamilyv").eq(0).find(".relationSelector").val();
var dval=$(this).val();
dval=dval.replace(",","");

if(dval!=""){
darr[k]=dval; //so as the k d person and as d val d relation type

var privacy=$(this).parents(".nfamilyv").eq(0).find("input[name=privacy]").val();
var privacyh=$(this).parents(".nfamilyv").eq(0).find("input[name=privacyh]").val();

darrv[dval]=privacy;
darrvv[dval]=privacyh;

}

});


var nfamily=JSON.stringify(darr);
var dprivacy=JSON.stringify(darrv);
var dprivacyh=JSON.stringify(darrvv);

$("#love_selector").find("input[name=tags]").each(function(){
	
var k=$(this).parents(".nfamilyv").eq(0).find(".relationSelector").val();
var dval=$(this).val();
dval=dval.replace(",","");

oarr[k]=dval;

var privacy=$(this).parents(".nfamilyv").eq(0).find("input[name=privacy]").val();
var privacyh=$(this).parents(".nfamilyv").eq(0).find("input[name=privacyh]").val();

oarrv[dval]=privacy;
oarrvv[dval]=privacyh;

	
});


var nfamily_b=JSON.stringify(oarr);
var dprivacy_b=JSON.stringify(oarrv);
var dprivacyh_b=JSON.stringify(oarrvv);

$("#warns").addClass("hidden_sb");

nfamily=is_empty(nfamily);
dprivacy=is_empty(dprivacy);
dprivacyh=is_empty(dprivacyh);


$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/relationships_post.php",
  data: { nfamily:nfamily,dprivacy:dprivacy,dprivacyh:dprivacyh,nfamily_b:nfamily_b,dprivacy_b:dprivacy_b,dprivacyh_b:dprivacyh_b}}).
  done(function(response) {
	  //alert(response);
	  var res=$.parseJSON(response);
	  if(res.error!==undefined){
	  $("#warns").html(\'<i class="warns"></i>\'+res.error);	  
	  $("#warns").removeClass("hidden_sb");	
	}
else{
	$(\'#warns\').html(\'<i class="warnsv"></i>Your changes have been saved.\');
	$("#warns").removeClass("hidden_sb");	
}

});

}
</script>
<label class="savecedit" onclick="saveci_relationships();"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label>
<div style="overflow:visible;margin:0;padding:0;position:absolute;padding-left:17px;margin-left:10px;margin-top:2px;display:inline-block;" class="hidden_sb" id="warns">
</div>
</td>
<td></td>
</tr>
</table>
</div>
';
?>