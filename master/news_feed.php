<?php
include("start.php");
include("populate_page.php");

if(isset($dget)){
if($dget=='sk=app_2305272732_2392950137'){
$justphotos='';
}
else if($dget=="sk=app_2309869772"){
$justlinks='';
}
}
else{$dget='';}

$isitalist=$_SERVER['REQUEST_URI'];

$isitalist=str_replace("/lists/","",$isitalist,$count);

include("functions/get_list_class.php");

$uti=sb_user($uid);
if(isset($_GET['email_confirmed'])){
$echo.='<div id="email_confirmed" data-d_title="Account Confirmed" data-d_nofooter="t" class="displaydialog"></div><div class="dialog_msgs">You have successfully confirmed your account with the email <span class="fwb">'.$uti['email'].'</span></div>
<script type="text/javascript">
$(document).ready(function(){
$.doTimeout(1500,function(){
$("#email_confirmed").click();
$.doTimeout(1800,function(){
var dialogid=$("#email_confirmed").attr("data-dialogid");
$("#d_container_"+dialogid+"'.$uid.'").fadeOut("slow",function(){
remove_dialog(did);
});
});
});	
});
</script>';	
}

if($count>0){
$clist=$isitalist;
if(strpos($clist,"?")!==false){
$clistv=explode("?",$clist);
$clist=$clistv[0];
}
$params['clist']=$clist;

$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND sbid='$clist'");
$c=mysql_num_rows($r);
while($m=mysql_fetch_array($r)){
$clistn=$m['listn'];
$clistc=get_list_class($m['type']);
$institution=$m['institution'];

$clistvis=$m['visibility'];
$clistt=$m['type'];
$clisttd=get_list_desc($m['type'],$institution);
$clistph=get_list_ph($m['type']);
}

$dget='list='.$clist;
}
else{
//used to update cookie information in here, at news feed
}

if(isset($wall)){
$dget='wall=t&uidv='.$uidv.'';
}

include("modules.php");



$params['title']="Upfrev";

$rhelper='../';
if(!isset($clist)){$rhelper_js='';}
else{$rhelper_js='../';}
?>
<?php
include("maincore.php");
?>
<?php


$params['left_link_n']="news_feed";
if(isset($justphotos)){
$params['left_link_n']="photos";
}
else if(isset($justlinks)){
$params['left_link_n']="links";
}
else if(isset($clist)){
$params['left_link_n']=$clist;
}


if(!isset($clist)){
$params['right_col_modules'][]='birthday_reminder';
$params['right_col_modules'][]='poke_reminder';
$params['right_col_modules'][]='pymk';
}
else{
$params['right_col_modules'][]="0"; //no right_col_modules at all
}

//$params['right_col_modules'][]='poke_suggestions';

/*
if($uid==$uidv){
	*/
$echo.='
<input type="hidden" id="nloaded">
<script type="text/javascript">
$("#nloaded").val("");
function check_f2(response){
////alert(response);
var res=response.split("{}");
restore_mind();

var nloaded=$("#nloaded").val();
nloaded=nloaded+","+res[1];

$("#nloaded").val(nloaded);


$("#stories_wrapper").prepend(res[0]);
var lbd2v=$("#lbd2v").val();
lbd2v=","+res[2]+lbd2v;
$("#lbd2v").val(lbd2v);

$("#mtablew"+res[1]).css("display","none");
$.doTimeout( 400, function(){
$("#mtablew"+res[1]).fadeIn("medium");

$("b[data-t_id=reqnew]").mouseenter();
});

}
</script>';
/*
}
*/

/*
else{
$echo.='
<script type="text/javascript">
function check_f2(){
var tocheck=document.getElementById("text").value;
if((tocheck=="") || (tocheck=="Write something...")){
return false;}
else{document.forms["onyourmind"].submit();}
}
</script>';
}
*/

$echo.='';


if(isset($wall)){
$text='Photo';
$textv='Pin';
}
else{
$text='Add Photo / Video';
$textv='Add Pin / Board';
}
//if($uid==$uidv){
//account owner
$addphoto='<a href="#" id="add_photo_nf" style="position:relative;"><div class="addphotoimg"></div><span>'.$text.'</span><i id="pincho_add_photo" class="pincho_add_photo" style="display:none;"></i></a>';
$addpin='<a href="#" id="add_pin_nf" style="position:relative;"><div class="addpinimg"></div><span>'.$textv.'</span><i id="pincho_add_photo" class="pincho_add_pin" style="display:none;"></i></a>';
//}


//if($uid==$uidv){

if(isset($wall) AND $uid!=$uidv){
$iswall="t";	
}
else{
$iswall="f";	
}
$addpin.='
<script type="text/javascript">
var iswall="'.$iswall.'";
var remove_s_class_pu=function(){
$("#attach_photo_w").removeClass("lb_nflv");
}

var remove_s_class_puv=function(){
$("#attach_pin_w").removeClass("lb_nflv");
}

$("#add_pin_nf").bind("click",function(e){
$("._2yg").find("input[name=pin]").val("2");
$("#attach_pin_w").addClass("lb_nflv");
e.preventDefault();
$("#pincho_add_pinv").css("display","none");

$("#add_photo_links").css("display","none");

var dplaceholder="Say something about this"
$("._2yg").find("textarea").attr("placeholder",dplaceholder);

$("#update_status_nfw").removeClass("addphotolinkv");
$("#update_status_nfw").addClass("addphotolink");
$("#add_photo_nfw").removeClass("addphotolinkv");
$("#add_photo_nfw").addClass("addphotolink");
$("#add_pino_nfw").removeClass("addphotolink");
$("#add_pin_nfw").addClass("addphotolinkv");

$("._2yg").css("display","none");

if(iswall=="t"){
$("#attach_pin").click();	
}
else{
$("#add_pin_links").css("display","inline-block");
}

$("#pincho_add_pin").css("display","inline-block");
$(document).unbind("click",remove_s_class_puv);
$.doTimeout(100,function(){
$(document).bind("click",remove_s_class_puv);
});

});';

if(isset($clist)){
$addpin.='
$("#update_status_nf").bind("click",function(){
$("._2yg").find("._4p").addClass("hidden_sb");
});
';
}

$addpin.='

$("#add_photo_nf").bind("click",function(e){
$("._2yg").find("input[name=pin]").val("1");
$("#attach_photo_w").addClass("lb_nflv");
e.preventDefault();
$("#pincho_add_photov").css("display","none");
$("#add_pin_links").css("display","none");

var dplaceholder="Say something about this"
$("._2yg").find("textarea").attr("placeholder",dplaceholder);

$("#update_status_nfw").removeClass("addphotolinkv");
$("#update_status_nfw").addClass("addphotolink");
$("#add_pin_nfw").removeClass("addphotolinkv");
$("#add_pin_nfw").addClass("addphotolink");
$("#add_photo_nfw").removeClass("addphotolink");
$("#add_photo_nfw").addClass("addphotolinkv");


$("._2yg").css("display","none");

if(iswall=="t"){
$("#attach_photo").click();	
}
else{
$("#add_photo_links").css("display","inline-block");
}
$("#pincho_add_photo").css("display","inline-block");
$(document).unbind("click",remove_s_class_pu);
$.doTimeout(100,function(){
$(document).bind("click",remove_s_class_pu);
});

});';

if(isset($clist)){
$addpin.='
$("#update_status_nf").bind("click",function(){
$("._2yg").find("._4p").addClass("hidden_sb");
});
';
}



if(isset($wall) AND $uid!=$uidv){
$on_your_mind_text='Write something...';	
}
else{
$on_your_mind_text='What\'s on your mind?';	
}


$addpin.='
$("#update_status_nf").bind("click",function(e){
e.preventDefault();
$("#pincho_add_photo").css("display","none");
$("#add_pin_links").css("display","none");

$("._2yg").find(".filters_edit,.filter,.marco,.drop,.colorpickers,.brightness,.contrast").addClass("hidden_sb");
$("._2yg").find(".filters_edit").slideUp(0);

$("#add_photo_nfw").removeClass("addphotolinkv");
$("#add_photo_nfw").addClass("addphotolink");
$("#add_pin_nfw").removeClass("addphotolinkv");
$("#add_pin_nfw").addClass("addphotolink");
$("#update_status_nfw").removeClass("addphotolink");
$("#update_status_nfw").addClass("addphotolinkv");

$("#pincho_add_photov").css("display","inline-block");

var dplaceholder="'.$on_your_mind_text.'";
$("._2yg").find("textarea").attr("placeholder",dplaceholder);

$("._2yg").find("input[type=submit]").parent().removeAttr("data-u_receiver");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-u_function");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-u_starts");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-u_check");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-u_trigger");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-u_pfunc");


$("._2yg").find("input[type=submit]").parent().attr("fjax","/wall/status_post.php");
$("._2yg").find("input[type=submit]").parent().attr("data-a_form","._2yg");
$("._2yg").find("input[type=submit]").parent().attr("data-a_ismultiplev","t");
$("._2yg").find("input[type=submit]").parent().attr("data-a_starts","attach_photo_starts");
$("._2yg").find("input[type=submit]").parent().attr("data-a_custom_f","check_f2");
$("._2yg").find("input[type=submit]").parent().attr("data-a_pfunc","change_description");

$("#add_photo_links").css("display","none");
$("._93").css("display","none");

$("._2yg").find("input[type=submit]").parent().removeClass("uiButtonDisabled");
$("._2yg").css("display","inline-block");

$("._2yg").find("textarea").focus();

});
</script>
';


if(isset($wall)){
if($uid==$uidv){
$text='Status';	
}
else{
$text='Post';	
}
}
else{
$text='Update Status';
}

$updatestatus='<a href="#" id="update_status_nf"><div class="updatestatusimg"></div><span style="padding:0;margin:0;padding-left:0px;">'.$text.'</span><i id="pincho_add_photov" class="pincho_add_photo"></i></a>';

if(isset($clist)){
$harea='

<div id="headerArea" class="normal"><div class="uiHeader uiHeaderWithImage friendListHeader" id="uqr3rpk1"><div class="clearfix uiHeaderTop"><ul style="margin-right:10px;" class="uiList uiHeaderActions rfloat _4ki clearfix _6-h _704 _6-i"><li class="uiListItem"></li><li class="uiListItem"></li><li class="uiListItem"></li><li class="uiListItem"><div class="_6a  uiPopover" id="uqr3rpk5" data-custom_f="show_layer();" data-custom_fr="hide_layer();"><a class="uiPopoverButton _p uiPopoverButtonWithChevron uiButton" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="uqr3rpk6"><span class="uiButtonText">Manage List</span></a></div></li></ul><div><h2 class="uiHeaderTitle"><i class="uiHeaderImage img '.$clistc.'"></i><div class="friendListName"><div class="staticName"><span class="name">'.$clistn.'</span></div><form rel="async" class="editForm clearfix" id="change_list_name"><div class="lfloat"><input data-sbid="'.$clist.'" class="inputtext nameInput" maxlength="80" data-maxlen="140" name="rename" value="" type="text"></div><div class="hidden_sb displaydialog" data-d_title="Friend list name already exists." data-d_okay="Okay" data-d_okay_function="close_dialog" data-d_overlay="white_create"></div><div class="dialog_msgs">There is an existing friend list with the same name.</div><label fjax="/ajax/friends/lists/rename.php?sbid='.$clist.'" data-a_formo="$(this).parents(\'form\').eq(0);" data-a_custom_f="apply_list_rename" data-a_starts="list_rename_mask" class="mls saveButton lfloat uiButton uiButtonConfirm uiButtonLarge" for="uqr3rpk2"><input value="Save" id="uqr3rpk2" type="submit"></label><label class="mls cancel lfloat uiButton uiButtonLarge" for="uqr3rpk3"><input value="Cancel" id="uqr3rpk3" type="button"></label><img class="mlm uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></form></div></h2></div></div><div class="clearfix"><div class="mbs friendListSubHeader uiHeaderSubTitle lfloat fsm fwn fcg"><div class="fsm fwn fcg">'.$clisttd.'</div></div></div>


<div class="uiContextualLayerPositioner uiLayer hidden_sb" style="position:fixed;width: 1244px;left:168px;z-index:9999;" id="manage_list">
<div style="right: 0px;" class="uiContextualLayer uiContextualLayerBelowRight"><div style="min-width: 99px;" id="u73rdzu4" class="uiMenuXWrapper friendListManage uiMenuXWithShortBorder"><div class="uiMenuXBorder"><ul role="menu" class="uiMenuX">

<script type="text/javascript">
var dtop=$("#uqr3rpk5").offset().top;
dtop=$("#uqr3rpk5").innerHeight()+dtop;
$("#manage_list").css("top",dtop);
</script>
';

$noname=array();
$noname[]="acquaintances";
$noname[]="restricted";
$noname[]="close_friends";
if(!in_array($clistt,$noname)){
$harea.='<li aria-selected="false" class="uiMenuXItem editName __MenuXItem"><a title="" role="menuitem" rel="ignore" href="#" class="itemAnchor"><span class="itemLabel">Rename List</span></a></li>';
}

$harea.='<li aria-selected="false" class="uiMenuXItem __MenuXItem"><a data-d_isajax="t" data-d_fjax="/ajax/friends/lists/members/?sbid='.$clist.'" data-d_width="562" data-d_okay="Finish" data-d_okay_function="close_dialog_nofade" title="" role="menuitem" class="itemAnchor displaydialog"><span class="itemLabel">Edit List</span></a></li>';



$visibility=$clistvis;
$listtype=$clistt;
$list=$clist;

if($visibility=="h"){
$harea.='<li role="separator" class="uiMenuXSeparator __MenuXItem"></li><li aria-selected="false" class="uiMenuXItem __MenuXItem"><a title="" role="menuitem" rel="dialog" data-d_isajax="t" data-d_cancel_function="close_dialog" data-d_fjax="/ajax/friends/lists/restore/?sbid='.$list.'" class="itemAnchor displaydialog"><span class="itemLabel">Restore List</span></a></li>';
}
else{
if($listtype=="close_friends" || $listtype=="acquaintances" || $listtype=="restricted"){}
else if($listtype!="custom"){
$harea.='<li role="separator" class="uiMenuXSeparator __MenuXItem"></li><li aria-selected="false" class="uiMenuXItem __MenuXItem"><a title="" role="menuitem" rel="dialog" data-d_isajax="t" data-d_cancel_function="close_dialog" data-d_fjax="/ajax/friends/lists/archive/?sbid='.$list.'" class="itemAnchor displaydialog"><span class="itemLabel">Archive List</span></a></li>';
}
else if($listtype=="custom"){
$harea.='<li role="separator" class="uiMenuXSeparator __MenuXItem"></li><li aria-selected="false" class="uiMenuXItem __MenuXItem"><a title="" role="menuitem" rel="dialog" data-d_isajax="t" data-d_cancel_function="close_dialog" data-d_fjax="/ajax/friends/lists/delete/?sbid='.$list.'" class="itemAnchor displaydialog"><span class="itemLabel">Delete List</span></a></li>';
}
}

$harea.='</ul></div><div style="width: 67px;" class="uiMenuXShortBorder"></div></div></div>
</div>



<script type="text/javascript">
function list_rename_mask(org_elem){
$(org_elem).parents("form").eq(0).find("input").attr("disabled",true);
$(org_elem).parents("form").eq(0).find(".uiButton").addClass("uiButtonDisabled");
$(org_elem).parents("form").eq(0).addClass("async_saving");
}

function apply_list_rename(response,org_elem){
$(org_elem).parents("form").eq(0).removeClass("async_saving");
$(org_elem).parents("form").eq(0).find("input").attr("disabled",false);
$(org_elem).parents("form").eq(0).find(".uiButton").removeClass("uiButtonDisabled");
if(response=="e"){
$(org_elem).prevAll(".displaydialog:first").click();
return false;
}
$(".friendListName").find(".name").html($(org_elem).parents("form").eq(0).find("input[name=rename]").val());
var sbid=$(org_elem).parents("form").eq(0).find("input[name=rename]").attr("data-sbid");
$("#llm"+sbid).find(".linkwrap2").html($(org_elem).parents("form").eq(0).find("input[name=rename]").val());

$(".friendListHeader").removeClass("friendListHeaderEditMode");
}

function show_layer(){
$(".contentarea_global").find(".uiContextualLayerPositioner").removeClass("hidden_sb");
}


function hide_layer(){
$(".contentarea_global").find(".uiContextualLayerPositioner").addClass("hidden_sb");
}


$(document).ready(function(){
$(".contentarea_global").append($("#headerArea").find(".uiContextualLayerPositioner"));
});


$(document).off("click",".editName").on("click",".editName",function(){
$(".friendListHeader").addClass("friendListHeaderEditMode");
$(".friendListHeader").find("input[name=rename]").focus();
});

$(document).on("click",".friendListHeader label.cancel",function(){
$(".friendListHeader").removeClass("friendListHeaderEditMode");
});
</script>


</div>

</div>


';
$dclass="islist";
}
else if(isset($wall)){
include("header_area/wall.php");
$dclass="";
}
else{
$dclass="";
}

$echo.='
<div style="width:530px;margin-bottom:8px;margin-top:7px;" class="'.$dclass.'">
<div style="display:inline-block;margin:0;margin-left:18px;position:relative;padding:0;font-weight:bold;color:#333333;" id="update_status_nfw" class="addphotolinkv">'.$updatestatus.'</div><div style="display:inline-block;margin:0;position:relative;padding:0;margin-left:10px;" id="add_photo_nfw" class="addphotolink">'.$addphoto.'</div><div style="display:inline-block;margin:0;position:relative;padding:0;margin-left:5px;" id="add_pin_nfw" class="addphotolink">'.$addpin.'</div>
</div>
';

$echo.='<script type="text/javascript">
function check_ta(f){

var tocheck=f.value;
if(tocheck=="'.$on_your_mind_text.'"){}
if(f.style.height=="18px"){f.style.height="48px"; document.getElementById("clearfix").style.display="block";}
if(f.style.minHeight=="18px"){f.style.minHeight="48px"}
}
function check_ta2(f){
var tocheck=f.value;

}
function restore_mind(){
	swapc(1,300004);
    $(".highlighter").find(".highlighterContent").html("");
    
	$("._2yg").find("textarea").val("");

	$("._2yg").find(":file").val("");

	$("._2yg").css("display","none");

	var active=document.activeElement;

    $("#update_status_nf").click();
    
	reset_mt("","wall_uploader");

	$("#text").val("");
	$("#text").blur();
	$(active).focus();

	drop_location_wall_uploader(\'f\');
  
';

if(isset($clist)){
	
}
else{
	$echo.='
	$("#text").css("height","18px");
	$("#text").css("min-height","18px");
	$("#clearfix").css("display","none");
';
}
$echo.='reset_filter_uploader();';

	if(isset($clist)){
	$echo.='$("._2yg").find("._4p").addClass("hidden_sb");';
	}

	$echo.='

}
</script>';

if($uid==$uidv){$albumn='Wall Photos';}
else{
$albumn='Photos';	
}
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='$albumn'");
while($m=mysql_fetch_array($r)){
$albumid=$m['sbid'];
}

if($uid==$uidv){$albumn='Wall Pins';}
else{
    $albumn='Pins';	
}
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='$albumn'");
while($m=mysql_fetch_array($r)){
    $albumidv=$m['sbid'];
}

$echo.='

<div style="position:relative;">

<div style="border:1px solid rgb(180, 187, 205);width:509px;margin-left:18px;display:inline-block;margin-top:1px;" class="_2yg filters_edit 2ygv" data-from_uploader="._2yg">


<input type="hidden" name="pin" id="pin" autocomplete="off" value="1">
<input type="hidden" name="nfp" id="nfp">

<div style="float:right;position:relative;right:8px;top:-15px;display:none;">
<img width="16" height="11" alt="" class="caller_loading" src="/images/jKEcVPZFk-2.gif" style="display:inline-block;border:none;position:absolute;top:50%;left:50%;margin-left:-8px;margin-top:-5px;">
</div>

<div style="position:relative;">

<div class="uiMentionsInput _11a highlighter_wrapper"><div class="highlighter" style="padding: 4px 5px;"><div style="width:497px;"><div class="highlighterContent" style="max-width:100%;vertical-align:top;display:inline-block;position:relative;color:transparent;"></div><div class="highlighterAuxContent" style="vertical-align:top;display:inline-block;position:relative;"><div class="metadataFragment"></div></div></div></div><div style="background: none repeat scroll 0% 0% transparent;height:auto;border:0px none;" class="uiTypeahead composerTypeahead mentionsTypeahead">

<div style="padding:5px;border:0px none;">

<div style="overflow:hidden;cursor:default;">

<textarea style="height:18px;min-height:18px;" data-au_grow="" data-au_more="$(\'._2yg\').find(\'.highlighter\')" data-au_morev="$(\'._2yg\').find(\'.highlighterAuxContent\')" data-au_noprefix="t" class="uiTextareaAutogrow input mentionsTextarea textInput dcphc to_highlighter" title="'.$on_your_mind_text.'" placeholder="'.$on_your_mind_text.'" name="description"></textarea>

</div>

</div>

<div>
<div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;" class="inputtext dcphlgc displaynoneimportant hidden_sb" data-ac_enable="wall_uploaderdv" data-ac_liwidth="507" data-ac_inputw="507" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_custom_f="add_to_highlighter" data-ac_placeholder="Who where you with?"></div>

<input type="hidden" name="descriptionv" autocomplete="off">
</div>

</div>

</div>

<script type="text/javascript">
$("._2yg").find("textarea").bind("keyup",to_highlighter_keyup);
</script>

<div style="display:none;" class="phs pts _93">
<div class="_yn">
<div class="mbs">
<div class="mbs fwb">Select an image or video file on your computer.</div>
<input type="file" name="uploadedfile[]" class="_95 uploadedfile">

<input type="hidden" name="notify" value="1" autocomplete="off">
<input type="hidden" name="uidv" value="'.$uidv.'" autocomplete="off">
<input type="hidden" name="albumid" value="'.$albumid.'" autocomplete="off">
<input type="hidden" name="albumid2" value="'.$albumidv.'" autocomplete="off">
</div>
</div>
</div>';


$echo.='
<div style="height:auto;">
<div id="filters_edit_uploader" class="filters_edit filters_edit_wrap hidden_sb" style="position:relative;margin-bottom:0px;padding-top:5px;margin-top:10px;border-top:1px dashed rgb(189, 199, 216);width:100%;overflow-y:auto;max-height: 155px;" data-from_uploader="._2yg">

</div>
</div>';



$echo.='
<div class="uploader_location" style="display:none;">

<div class="uiTypeahead uiClearableTypeahead _14n">

<div class="wrap">

<label class="clear uiCloseButton"><input title="Remove" type="button"></label>

<div class="innerWrap">
<div class="clearfix">
<div id="editpiw300004" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;top:-15px;margin-top:0px;margin-right:0px;float:right;width:509px;height:20px;"><div id="editpiwv300004" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;height:22px;top:13px;width:100%;"><label id="removeedit300004" class="removeedit" style="display:none;z-index:10;" title="Remove" onclick="swapc(1,300004);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label><input type="text" name="locationv" id="city300004" class="inputtext textInput dcphmgc" placeholder="Where was this taken?" data-au_source="tobogan" autocomplete="off" style="position:relative;top:2px;"></div></div></div><input autocomplete="off" type="hidden" name="statec" id="statec300004"><input autocomplete="off" type="hidden" name="countryc" id="countryc300004"><input autocomplete="off" type="hidden" name="cityc" mid="cityc300004"><input autocomplete="off" type="hidden" id="stateedit300004"><input autocomplete="off" type="hidden" id="cityv300004">
<input type="hidden" name="location" autocomplete="off">
</div>

</div>

</div>
</div>







<div class="uploader_with" style="display:none;">

<div class="uiTypeahead uiClearableTypeahead _14n">

<div class="wrap">


<div class="innerWrap" style="overflow:visible;">

<div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;" class="inputtext dcphlgc displaynoneimportant" data-ac_enable="wall_uploader" data-ac_liwidth="198" data-ac_inputw="497" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_placeholder="Who where you with?" data-ac_custom_f="copy_highlighter" data-ac_custom_f_r="copy_highlighterv"></div>



</div>

</div>

</div>
</div>




<div class="_4y" style="display:none;">
<div class="clearfix">
<div class="lfloat" style="width:240px;">
<div class="lfloat ctot_nf">
<a class="_4p _4q" href="#"></a>
</div>
<div class="lfloat loc_nf">
<div class="_6a  _zg _4p"><a class="_y9" href="#"><span class="_ya"></span><div class="_6a _zh"><div class="_6a _6b" style="height:30px;"></div><div class="_6a _6b"><span class="_y8"></span></div></div></a></div>
</div>';

$echo.='<div class="bottom_menu_photo filter filter_nf hidden_sb" style="cursor:pointer;"></div>';

$echo.='
<div class="hidden_sbr filter_options"><input type="hidden" name="new_filter" value="normal"><input type="hidden" value="1" name="frame"><input type="hidden" value="1" name="frame_original"><input type="hidden" name="tilt_shift" value="2"><input type="hidden" name="tilt_shift_original" value="2"><input type="hidden" name="custom_color" value=""><input type="hidden" name="custom_hsb" value=""><input type="hidden" name="brightness" value="0"><input type="hidden" name="contrast" value="0"></div><div class="bottom_menu_photo marco marco_active hidden_sb" style="float:left;cursor:pointer;" data-t_text="Toggle frame on/off" data-t_position="bottom" data-t_align="center"><div class="marco_mask div_mask hidden_sb"></div></div><div class="bottom_menu_photo brightness hidden_sb" style="float:left;cursor:pointer;" data-t_text="Adjust brightness" data-t_position="bottom" data-t_align="center"><div class="brightness_mask div_mask hidden_sb"></div></div><div class="hidden_sb brightness_slider"></div><div class="bottom_menu_photo contrast hidden_sb" style="float:left;cursor:pointer;" data-t_text="Adjust contrast" data-t_align="center"><div class="contrast_mask div_mask hidden_sb"></div></div><div class="hidden_sb contrast_slider"></div><div class="bottom_menu_photo drop hidden_sb" style="cursor:pointer;float:left;" data-t_text="Toggle tilt shift on/off"><div class="drop_mask div_mask hidden_sb"></div></div><div class="bottom_menu_photo colorpickers hidden_sb" style="cursor:pointer;float:left;" data-t_text="Open Color Picker"><div class="colorpickers_mask div_mask hidden_sb"></div></div>';


$echo.='
</div>';


$echo.='
<script type="text/javascript">';
include("js/filters_create.php");
$echo.=$sechov.'

function filter_uploader(){

var filters="";
var ax=1;
$(filters_create).each(function(k,v){
var dclass="";
if(ax==1 || ax==8 || ax==15 || ax==22 || ax==29 || ax==36 || ax==43){
dclass+=" start_row ";
}
if(ax>7){
dclass+=" secondaryColumn ";
}
if(ax==7 || ax==14 || ax==21 || ax==28 || ax==35 || ax==42 || ax==49){
dclass+=" last_cell ";
}
var filter_type=v;
if(filter_type=="wrinkle_reducer" || filter_type=="eight_bits" || filter_type=="custom" || filter_type=="lensflare" || filter_type=="boost" || filter_type=="flashy" || filter_type=="drawing" || filter_type=="sketch" || filter_type=="superman" || filter_type=="church" || filter_type=="cartoon_iii" || filter_type=="black_white_sketch"){
dclass+=" sketch_filter ";
}
else if(filter_type=="black_white_sketch"){
dclass+=" black_white_sketch_filter ";
}
var filter_type_text=filters_create_text[k];
filters+=\'<input type="button" class="hidden_sb filter_trigger"><div style="display:inline-block;float:left;" class="\'+dclass+\' filter_selection_wrapper filter_unselected" data-f_apply="f" data-f_type="\'+filter_type+\'"><div class="filter_mask hidden_sb"></div><img style="float:left;" class="filter_selection" src="/images/filter_\'+filter_type+\'.png"><div class="filter_selected_wrapper hidden_sb" data-t_text="Filter applied" data-t_position="bottom"><i class="filter_selected"></i></div><div class="filter_selection_text_wrapper"><div class="fwb filter_selection_text">\'+filter_type_text+\'</div></div></div>\';
ax++;
});

$("#filters_edit_uploader").html(filters);

$("._2yg").find(".brightness_active").removeClass("brightness_active");
$("._2yg").find(".contrast_active").removeClass("contrast_active");

$("#filter_used").html(filters);

this_slider($("._2yg").find(".brightness_slider"));
this_slider($("._2yg").find(".contrast_slider"));

var filter="normal";
var frame=2;
var brightness=1;
var total_brightness=0;
var contrast=1;
var total_contrast=0;
var tilt_shift=2;
var delem="._2yg";
var from_nf=true;
';

include("js/filters_load.php");

$echo.=$sechov;

$echo.='


$(document).off("click",".filter").on("click",".filter",function(){
$(this).parents(".filters_edit").eq(0).find(".uploader_location,.uploader_with").css("display","none");
$(this).parents(".filters_edit").eq(0).find("._4m").removeClass("_4m");
$(this).parents(".filters_edit").eq(0).find(".filters_edit,.marco,.drop,.colorpickers,.brightness,.contrast").removeClass("hidden_sb");

});

//$("._2yg").find(".filters_edit").slideUp(0);
}
filter_uploader();
$(document).on("click",".ctot_nf,.loc_nf",function(){
$(this).parents(".filters_edit").eq(0).find(".filters_edit,.marco,.drop,.colorpickers,.brightness,.contrast").addClass("hidden_sb");
//$("._2yg").find(".filters_edit").slideUp(0);
});

function reset_filter_uploader(){
filter_uploader();
$("._2yg").find(".filters_edit,.filter,.marco,.drop,.colorpickers,.brightness,.contrast").addClass("hidden_sb");
//$("._2yg").find(".filters_edit").slideUp(0);
}
$(document).on("click",".filter_nf",function(){
if($(this).parents(".filters_edit").eq(0).find(".filters_edit").css("display")=="none"){
//$(this).parents(".filters_edit").eq(0).find(".filters_edit").slideDown(0);
}
});


</script>';

$echo.='
<input type="hidden" id="video_upload_name" autocomplete="off">';

if(isset($clist)){
$echo.='<input type="hidden" name="privacy" value="l'.$clist.'"><input type="hidden" name="privacyh" value="">'; //mimic privacy functionality	
}
$echo.='<ul id="walluploader_privacy" class="uiList _4z rfloat _4ki clearfix _6-h _6-j _6-i">';
if(!isset($clist)){

if(!isset($uidv)){
$uidv=$uid;
}
$sbid="";
$ltypev="options";

if(isset($wall) AND $uid!=$uidv){
$peditable="f";
$nfjax="";
$data_t='data-t_position="bottom"';
}
else{
$peditable="t";
$nfjax="";
$data_t='data-t_topleft="t"';
}

$dclass="";

$use_edit_album="";

$privacy_configuration="big";


$privacy_source="wu"; //wall uploader

include("buttons/privacy_button.php");
$echo.=$button;
}
$uidv=$ruidv;


if(isset($_GET['audience_usered'])){

$echo.='
<script type="text/javascript">

var dplaceholder=$("._2yg").find(".uiTextareaAutogrow").attr("placeholder");
$("._2yg").find(".uiTextareaAutogrow").attr("original-placeholder",dplaceholder);

$("._2yg").find(".uiTextareaAutogrow").removeAttr("placeholder");
$("._2yg").find(".uiTextareaAutogrow").val("");
var active=document.activeElement;
$("._2yg").find(".uiTextareaAutogrow").focus();
$("._2yg").find(".uiTextareaAutogrow").blur();
$(active).focus();


$(document).ready(function(){
var dplaceholder=$("._2yg").find(".uiTextareaAutogrow").attr("original-placeholder");
$("._2yg").find(".uiTextareaAutogrow").attr("placeholder",dplaceholder);
$("._2yg").find(".uiTextareaAutogrow").val(dplaceholder);
$("._2yg").find(".uiTextareaAutogrow").blur();
$("._2yg").find(".uiTextareaAutogrow").focus();



var path=$("._2yg").find(".composerAudienceWrapper").find(".wrap");

$(path).attr("data-t_text","");
$(path).attr("data-t_keepalive","t");
$(path).attr("data-t_white","t");
$(path).attr("data-t_align","center");
$(path).attr("data-t_position","bottom");
$(path).attr("data-t_unique","t");
$(path).after(\'<div class="tooltip_text"><div style="color:#333333;width:280px;"><span class="fwb">Tip</span>: To change who you share your posts with, just click the audience selector. It remembers your selection so future posts will be shared with the same audience unless you change it.</div></div>\');

$.doTimeout(0,function(){
$(path).mouseenter();

var did=$(path).attr("data-js-id");

$.doTimeout(9500,function(){
$(path).attr("data-t_stopit","t");
$("#tiptip_holder"+did).fadeOut(800);
});


});


});

</script>
';

}


if(isset($clist)){
$r=mysql_query("SELECT * FROM lists WHERE sbid='$clist' AND id='$uid'");
$ms=mysql_fetch_array($r);
$dclass=get_list_class($ms['type']);
$echo.='<li class="uiListItem"><div id="ut9dquj15"><div id="ut9dquj17"><input name="audience[0][value]" value="230703387058924" type="hidden"><input name="disable_sticky" value="1" type="hidden"><a class="_jl uiButtonDisabled uiButton" role="button" data-href="#"><i class="mrs customimg img '.$dclass.'"></i><span class="uiButtonText">'.$ms['listn'].'</span></a></div></div></li>';
}

$echo.='<li class="uiListItem"><label class="_11b _yo uiButton uiButtonConfirm" data-u_form="._2yg" data-a_form="._2yg" data-a_starts="attach_photo_starts" data-a_custom_f="check_f2" data-a_ismultiplev="t" data-a_pfunc="change_description" fjax="/wall/status_post.php"><input value="Post" type="submit"></label></li></ul>


<div data-d_okay="Okay" data-d_title="Make Uploads Easier" data-d_okay_function="close_dialog_custom" data-d_okay_function_custom="upload_window_is_opened" class="displaydialog displaynoneimportant" data-d_video_upload="t" id="video_modal"></div><div class="dialog_msgs">It appears you have a pop-up blocker installed. To make uploading videos easier in the future (and avoid seeing this message) add Upfrev as an exception in your pop-up blocker preferences.</div>

</div>
</div>

</div>

</div>

</div>


<div style="background-color:#ffffff;display:none;position:relative;top:1px;" id="add_pin_links">
<div class="pas" style="border: 1px solid rgb(180, 187, 205);width:509px;margin:0;padding:0;margin-left:18px;">
<table class="uiGrid sbTabGrid _eb uiGridFixed">
<tr><td class="pas borderItem lb_nfl" id="attach_pin_w">
<a class="sbTabGridItem" href="#" id="attach_pin">
<div class="title fsl fwb ">Attach Pin / Video</div>
</a>
</td>';
/*
<td class="pas borderItem lb_nfl">
<a class="sbTabGridItem" href="#">
<div class="title fsl fwb ">Use Webcam</div>
</a></td>';
 */
$echo.='
<td class="pas lb_nfl" id="create_pin_board_nf_w">
<div style="position:relative;">
<a class="sbTabGridItem" href="#" id="create_pin_board_nf">
<div class="title fsl fwb ">Create Pin Board</div>
</a>
<img width="18" height="13" alt="" id="create_pin_board_nf_loading" src="/images/jKEcVPZFk-2.gif" style="display:none;border:none;position:absolute;top:50%;left:50%;margin-left:-9px;margin-top:-6px;">
</div>
</td></tr>
</table>
</div>
</div>

<div style="background-color:#ffffff;display:none;position:relative;top:1px;" id="add_photo_links">
<div class="pas" style="border: 1px solid rgb(180, 187, 205);width:509px;margin:0;padding:0;margin-left:18px;">
<table class="uiGrid sbTabGrid _eb uiGridFixed">
<tr><td class="pas borderItem lb_nfl" id="attach_photo_w">
<a class="sbTabGridItem" href="#" id="attach_photo">
<div class="title fsl fwb ">Attach Photo / Video</div>
</a>
</td>';
/*
<td class="pas borderItem lb_nfl">
<a class="sbTabGridItem" href="#">
<div class="title fsl fwb ">Use Webcam</div>
</a></td>';
*/
$echo.='
<td class="pas lb_nfl" id="create_photo_album_nf_w">
<div style="position:relative;">
<a class="sbTabGridItem" href="#" id="create_photo_album_nf">
<div class="title fsl fwb ">Create Photo Album</div>
</a>
<img width="18" height="13" alt="" id="create_photo_album_nf_loading" src="/images/jKEcVPZFk-2.gif" style="display:none;border:none;position:absolute;top:50%;left:50%;margin-left:-9px;margin-top:-6px;">
</div>
</td></tr>
</table>
</div>
</div>

<div style="display:none;" id="detect_faces_nf" fjax="/stories/detect_faces.php" data-a_form="pic_info_nf" data-a_custom_f="retf" data-a_noabort="t"></div>
<div style="display:none;" id="pic_info_nf">
<input type="hidden" name="sbid">
<input type="hidden" name="xpu">
<input type="hidden" name="fr">
</div>

<input name="uploadedfile[]" class="uploadedfile" id="uploadedfile_nf" style="display:none;" type="file" multiple="" style="margin-top:15px;cursor:pointer;"/>

<div id="firsttagen"></div>

<script type="text/javascript">';
if(!isset($clist)){
$echo.='
var post_display=function(){
var tocheck=$(this).val();
var vis=$("._2yg").find("._4y").css("display");
if($(this).css("height")=="18px" || vis=="none"){$(this).css("height","48px"); $("._2yg").find("._4y").css("display","");}
if($(this).css("min-height")=="18px"){$(this).css("min-height","48px");}
}
$("._2yg").find("textarea").bind("focus",post_display);
$("._2yg").find("textarea").bind("keydown",post_display);
';
}
else{
$echo.='
var post_display=function(){
$("._2yg").find("._4p").removeClass("hidden_sb");	
$("._2yg").find("._4y").css("display","");
$(this).css("height","48px");
$(this).css("min-height","48px");
}
$("._2yg").find("textarea").bind("focus",post_display);
$("._2yg").find("textarea").bind("keydown",post_display);
$("._2yg").find("._4p").addClass("hidden_sb");
$("._2yg").find("textarea").css("height","48px");
$("._2yg").find("._4y").css("display","");
';
}

$echo.='
function copy_highlighter(s){
if($("#tagswall_uploader").val()==""){
$("._2yg").find("._4q").removeClass("_4k");
}
else{
$("._2yg").find("._4q").addClass("_4k");
}

var ax=0;
var with_uploader=new Array();

$("#currentpwall_uploader").find(".carita").each(function(){

with_uploader[ax]=$(this).children(":first").attr("title");
ax++;

});

var dwith=" &#151;";

if($(with_uploader).length=="0"){}
else{
dwith+=" with ";

if($(with_uploader).length=="1"){
dwith+=\'<span class="withToken">\'+$(with_uploader)[0]+\'</span>\';
}
else if($(with_uploader).length=="2"){
dwith+=\'<span class="withToken">\'+$(with_uploader)[0]+\'</span>\';
dwith+=" and ";
dwith+=\'<span class="withToken">\'+$(with_uploader)[1]+\'</span>\';
}
else{
var dx=$(with_uploader).length-1;
dwith+=\'<span class="withToken">\'+$(with_uploader)[0]+\'</span>\';
dwith+=" and ";
dwith+=\'<span class="withToken">\'+dx+\' others</span>\';
}
}

var dloc="";

var dlocv=$(".uploader_location").find("[name=location]").val();

if(dlocv!=""){
dloc+=\' at <a class="placeToken" href="#">\'+$(".uploader_location").find("[name=location]").val()+\'</a>\';
}

var dmix=dwith+dloc;

if(dmix!=" &#151;"){
$("._2yg").find("textarea").removeAttr("placeholder");
$("._2yg").find(".metadataFragment").html(dmix+\'.\');
}
else{
$("._2yg").find(".metadataFragment").html("");
if($("#pincho_add_photov").css("display")!="none"){var dplaceholder="'.$on_your_mind_text.'";}
else{var dplaceholder="Say something about this"}
$("._2yg").find("textarea").attr("placeholder",dplaceholder);
}

autogrow_itv("",$("._2yg").find("textarea"));
}
function copy_highlighterv(){
copy_highlighter();
}

$("._2yg").find("._4q").bind("click",function(){
$("._2yg").find("._6a").removeClass("_4m");
$("._2yg").find(".uploader_location").css("display","none");

if($(this).hasClass("_4m")===true){
$(this).removeClass("_4m");
$(".uploader_with").css("display","none");
}
else{
$(this).addClass("_4m");
$(".uploader_with").css("display","block");
$("#tagwall_uploader").focus();
}
});
function drop_location_wall_uploader(f){

$("._2yg").find("._y9").removeClass("_y6");
$("._2yg").find("._y9").parent().removeClass("_4m");

$("._2yg").find(".uploader_with").css("display","none");
$("._2yg").find(".uploader_location").css("display","none");

$("._2yg").find(".metadataFragment").html("");

$("._2yg").find("._4q").removeClass("_4m");
$("._2yg").find("._4q").removeClass("_4k");

$("#toconcat_location_uploader").css("display","none");
$("._2yg").find(".uploader_location").find(".wrap").removeClass("selectedv");
$("._2yg").find(".uploader_location").find(".uiTypeahead").removeClass("uiClearableTypeahead");
$("._2yg").find(".uploader_location").find(".uiCloseButton").css("display","none");

if(f){
$("._2yg").find("textarea").attr("placeholder","What\'s on your mind?");

';


$echo.='
$("._2yg").find("textarea").css("height","18px");
$("._2yg").find("textarea").css("min-height","18px");
$("._2yg").find("._4y").css("display","none");
';

$echo.='
$(".uploader_location").find("[type=text]").val("");
$(".uploader_location").find("[name=location]").val("");
}

}

$(".uploader_location").wrap(\'<div style="position:relative;"></div>\').append(\'<div style="position:absolute;width:100%;text-align:center;display:none;" class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" id="toconcat_location_uploader"></div>\');

var chosenli="";

$(".uploader_location").find("[type=text]").bind("keydown","tab return shift ctrl alt pause capslock esc pageup pagedown end home up down f1 f2 f3 f4 f5 f6 f7 f8 f9 f10 f11 f12 numlock scroll meta",function(e){
e.stopPropagation();
e.preventDefault();
});';


$secho='
var xpu=300004;

$("#city"+xpu).keyup(function(){
var dval=$(this).val();
dov(dval,xpu);	
});

var v="";
var cityc="";
var countryc="";
var statec="";

if(v!="" && v!="undefined"){
				$("#editpiw"+xpu).addClass("editpiv");
				$("#editpiwv"+xpu).addClass("editpivv");
				$("#city"+xpu).removeClass("editpi");
				$("#city"+xpu).addClass("editpi2");
				$("#removeedit"+xpu).css("display","block");
				$("#stateedit"+xpu).val("1");
}

$("#city"+xpu).val(v);

$("#cityv"+xpu).val(v);
$("#statec"+xpu).val(statec);
$("#countryc"+xpu).val(countryc);
$("#cityc"+xpu).val(cityc);

			$(function() {
		$("#city"+xpu).autocomplete({
			minLength: 1,
			autoFocus: true,
			appendTo:"#editpiwv"+xpu,
			search:function(){$(this).addClass("working");},
			open:function(){
			var where=$("#editpiwv"+xpu).find(".ui-autocomplete");
			$(this).parents(".photo_container").eq(0).css("z-index","9999");
			$(this).removeClass("working"); var where=$("#editpiwv").find(".ui-autocomplete"); var width=$(this).innerWidth()-1; $(where).css("width",width);},
			close:function(){$(this).parents(".photo_container").eq(0).css("z-index","2");},
			source: "/autocomplete/cities.php",
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				var as=ui.item.value;
	
				$("#editpiw"+xpu).addClass("editpiv");
	
				$("#editpiwv"+xpu).addClass("editpivv");
				$("#city"+xpu).removeClass("editpi");
				$("#city"+xpu).addClass("editpi2");
				$("#removeedit"+xpu).css("display","block");
				$("#stateedit"+xpu).val("1");
				$("#city"+xpu).val(as);
				$("#cityv"+xpu).val(as);
				$("#statec"+xpu).val(ui.item.statec);
				$("#countryc"+xpu).val(ui.item.countryc);
				$("#cityc"+xpu).val(ui.item.city);
				$(this).removeClass("working");
				$("#city"+xpu).blur();
				save_city_vals(xpu);
				
				$("._2yg").find("._y9").addClass("_y6");

$(".uploader_location").find("[name=locationv]").next("input[name=location]").val($(".uploader_location").find("[name=locationv]").val());
copy_highlighter();


$("#toconcat_location_uploader").css("display","none");
$("._2yg").find("._y9").click();

				return false;
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;text-align:left!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a style="font-weight:normal!important;">\'+item.value + \'</a>\' )
				.appendTo( ul );
		};
	});
	';

$echo.=$secho;

/*/
$echo.='
$(".uploader_location").find("[type=text]").bind("keyup",function(e){
var dede=e.which;

if(in_array(dede,ignored_keys)){
		e.stopPropagation();
e.preventDefault();

if(dede==13){

$("#toconcat_location_uploader").find(".adl").each(function(){
if($(this).css("color")=="rgb(255, 255, 255)"){
$(this).click();
}
});

}
if(dede==38 || dede==40){}
else{return false;}
}


var tot_asi=$("#toconcat_location_uploader").find(".adl");

    if(e.which === 38){
		e.stopPropagation();
e.preventDefault();

  if(chosenli=="") {
            chosenli=0;
        } else if((chosenli+1) < $(tot_asi).length) {
            chosenli++;
        }
        $(tot_asi).removeClass("autocomplete_mouseover");
		$("#toconcat_location_uploader").find("li").eq(chosenli).children("a:first").addClass("autocomplete_mouseover");
		return false;


	}

	else if(e.which === 40){

	e.stopPropagation();
e.preventDefault();

        if(chosenli=="") {
            chosenli=0;
        } else if(chosenli>0) {
            chosenli--;
        }
       	$(tot_asi).removeClass("autocomplete_mouseover");
        $("#toconcat_location_uploader").find("li").eq(chosenli).children("a:first").addClass("autocomplete_mouseover");
        return false;
	}



 var toconcat=$(".uploader_location").find("[type=text]").val();

toconcat=$.trim(toconcat);

if(toconcat!="")
{


$("#ac_li_autocomplete_location_uploader").parent().remove();
$("#toconcat_location_uploader").append(\'<li class="ui-menu-item autocompletedark" style="width:100%;"><a class="clearfix put adl" id="ac_li_autocomplete_location_uploader">Just use "\'+toconcat+\'"</a></li>\');

var thisv="li_autocomplete_location_uploader";

var where=$("#toconcat_location_uploader");
var asi=$(where).find(".adl");


			$("#toconcat_location_uploader").find(".adl").bind("mouseenter",function(){
	  $(asi).removeClass("autocomplete_mouseover");
$(asi).css("border-color","#ffffff");
$(asi).css("border-width","1px 0px;");
$(asi).css("color","#333333"); $(asi).css("background","#ffffff"); $("#ac_"+thisv).css("color","#ffffff"); $("#ac_"+thisv).css("background","#6d84b4"); $("#ac_"+thisv).css("border-width","1px 0px"); $("#ac_"+thisv).css("border-style","solid"); $("#ac_"+thisv).css("border-color","#3b5998 #ffffff");
});

$("#toconcat_location_uploader").find(".adl").bind("mouseleave",function(){

$(asi).css("border-color","#ffffff");
$(asi).css("border-width","1px 0px;");
$(asi).css("color","#333333"); $(asi).css("background","#ffffff");
	  $(asi).removeClass("autocomplete_mouseover");
});




$("#toconcat_location_uploader").find(".adl").click(function(){
$("._2yg").find("._y9").addClass("_y6");

$(".uploader_location").find("[name=locationv]").next("input[name=location]").val($(".uploader_location").find("[name=locationv]").val());
copy_highlighter();


$("#toconcat_location_uploader").css("display","none");
$("._2yg").find("._y9").click();

});

$("#toconcat_location_uploader").css("display","block");

}

else{
copy_highlighter();
drop_location_wall_uploader();
}

var location_uploader_close=function(){
$("#toconcat_location_uploader").css("display","none");
}

$(document).unbind("click",location_uploader_close);
$(document).bind("click",location_uploader_close);

$(document).unbind("keydown","esc",location_uploader_close);
$(document).bind("keydown","esc",location_uploader_close);
});


$(".uploader_location").find("[type=text]").bind("keydown","backspace",function(){
if($("._2yg").find(".uploader_location").find(".uiCloseButton").css("display")=="block"){
$(this).next("input[name=location]").val("");

$("#toconcat_location_uploader").css("display","none");
$("._2yg").find("._y9").removeClass("_y6");

copy_highlighter();

$("._2yg").find(".uploader_location").find(".wrap").removeClass("selectedv");
$("._2yg").find(".uploader_location").find(".uiTypeahead").removeClass("uiClearableTypeahead");
$("._2yg").find(".uploader_location").find(".uiCloseButton").css("display","none");


}
});
*/
$echo.='
$(".uploader_location").find(".uiCloseButton").bind("click",function(){
$("#toconcat_location_uploader").css("display","none");
$("._2yg").find("._y9").removeClass("_y6");

$("._2yg").find(".uploader_location").find(".wrap").removeClass("selectedv");
$("._2yg").find(".uploader_location").find(".uiTypeahead").removeClass("uiClearableTypeahead");
$("._2yg").find(".uploader_location").find(".uiCloseButton").css("display","none");


$(".uploader_location").find("[type=text]").val("");
$(".uploader_location").find("[name=location]").val("");

copy_highlighter();

$(".uploader_location").find("[type=text]").focus();

});



$("._2yg").find("._y9").click(function(){
$("._2yg").find("._4q").removeClass("_4m");
$("._2yg").find(".uploader_with").css("display","none");
if($(this).parent().hasClass("_4m")===true){
$(this).parent().removeClass("_4m");
$("._2yg").find(".uploader_location").find(".wrap").removeClass("selectedv");
$("._2yg").find(".uploader_location").find(".uiTypeahead").removeClass("uiClearableTypeahead");
$("._2yg").find(".uploader_location").css("display","none");
$("._2yg").find(".uploader_location").find(".uiCloseButton").css("display","none");


}
else{
$(this).parent().addClass("_4m");
if($("._2yg").find(".uploader_location").find("input[name=location]").val()!=""){
$("._2yg").find(".uploader_location").find(".wrap").addClass("selectedv");
$("._2yg").find(".uploader_location").find(".uiTypeahead").addClass("uiClearableTypeahead");
$("._2yg").find(".uploader_location").find(".uiCloseButton").css("display","block");

}
$("._2yg").find(".uploader_location").css("display","block");
$("._2yg").find(".uploader_location").find("input[type=text]").focus();
}
});



var actual_input_file="uploadedfile_nf";

var traspass_filesv_nf=function(){traspass_files_nf();}

var create_photo_album_nf_handler_nf=function(){
$("#uploadedfile_nf").click();
}

function traspass_files_nf(){
$("#create_photo_album_nf,#create_pin_board_nf").unbind("click",create_photo_album_nf_handler_nf);
$("#create_photo_album_nf_w").removeClass("lb_nfl");
$("#create_photo_album_nf_w").addClass("lb_nflvv");
$("#create_photo_album_nf_loading").css("display","inline-block");

$("#create_pin_board_nf_w").removeClass("lb_nfl");
$("#create_pin_board_nf_w").addClass("lb_nflvv");
$("#create_pin_board_nf_loading").css("display","inline-block");

//	$("head").append(\'<link media="screen" rel="stylesheet" href="/master/view_photos_css.php" type="text/css" />\');

var pin=$("._2yg").find("input[name=pin]").val();

		$.ajax({

  type: "POST",
  url: "/photo_uploader.php",
  data: { uidv:\''.$uidv.'\',fnf:\'t\',switch:0,pin:pin},
  success: function(response) {//alert(response);

if(response.length>0){
	$("#create_photo_album_nf").unbind("click",create_photo_album_nf_handler_nf);
	$("#create_photo_album_nf").bind("click",create_photo_album_nf_handler_nf);
$("#secondtagen").html("");
$(".secondtag").remove();
$("#firsttagen").html(response);
photos();
$("#create_photo_album_nf_w").removeClass("lb_nflvv");
$("#create_photo_album_nf_w").addClass("lb_nfl");
$("#create_photo_album_nf_loading").css("display","none");

$("#create_pin_board_nf_w").removeClass("lb_nflvv");
$("#create_pin_board_nf_w").addClass("lb_nfl");
$("#create_pin_board_nf_loading").css("display","none");

}
  }
});

}

$("#uploadedfile_nf").bind("change",traspass_filesv_nf);

$("#create_photo_album_nf,#create_pin_board_nf").bind("click",create_photo_album_nf_handler_nf);


var no_more_disabled=false;

$("#attach_pin").bind("click",function(){
$("._2yg").find("input[name=pin]").val("2");
});

$("#attach_photo").bind("click",function(){
$("._2yg").find("input[name=pin]").val("1");
});

$("#attach_photo,#attach_pin").bind("click",function(){
$("#add_photo_links").css("display","none");
$("#add_pin_links").css("display","none");
$("._2yg").find(".filter").removeClass("hidden_sb");
$("._93").css("display","");

if($("._95").data("no_more_disabled")!="t"){
$("._2yg").find("input[type=submit]").parent().addClass("uiButtonDisabled");
}
else{
$("._2yg").find("input[type=submit]").parent().attr("data-u_trigger","t");
}

$("._2yg").find("input[type=submit]").parent().attr("data-u_receiver","wall/getit.php");
$("._2yg").find("input[type=submit]").parent().attr("data-u_function","video_upload_trigger");
$("._2yg").find("input[type=submit]").parent().attr("data-u_starts","attach_photo_starts");
$("._2yg").find("input[type=submit]").parent().attr("data-u_check","attach_photo_check");
$("._2yg").find("input[type=submit]").parent().attr("data-u_pfunc","change_description");



$("._2yg").find("input[type=submit]").parent().unbind("click");

$("._2yg").find("input[type=submit]").parent().removeAttr("fjax");
$("._2yg").find("input[type=submit]").parent().removeAttr("ajaxified");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-a_form");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-a_starts");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-a_custom_f");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-a_ismultiplev");
$("._2yg").find("input[type=submit]").parent().removeAttr("data-a_pfunc");

$("._2yg").css("display","inline-block");
$("._2yg").find("textarea").focus();
});

var dchange_wupload=function(){
$(this).data("has_changed","t");
$(this).data("no_more_disabled","t");
$("._2yg").find("input[type=submit]").parent().removeClass("uiButtonDisabled");

$("._2yg").find("input[type=submit]").parent().attr("data-u_trigger","t");
}

$("._95").bind("change",dchange_wupload);


function video_upload_trigger(response){
	if(response!="video"){
	var res=$.parseJSON(response);
	
var sbid=res.sbid;

$("#pic_info_nf").find("[name=sbid]").val(sbid);
$("#detect_faces_nf").click();

	restore_mind();

	var nloaded=$("#nloaded").val();

nloaded=nloaded+","+res.nloaded;

$("#nloaded").val(nloaded);

$("#stories_wrapper").prepend(res.response);
var lbd2v=$("#lbd2v").val();
lbd2v=","+res.lbd2v+lbd2v;
$("#lbd2v").val(lbd2v);

$("#mtablew"+res.nloaded).css("display","none");
$.doTimeout( 400, function(){
$("#mtablew"+res.nloaded).fadeIn("medium");

});

	$("b[data-t_id=reqnew]").mouseenter();
	}
	else{attach_photo_check();
			$("b[data-t_id=reqnew]").mouseenter();
	}
}
var retrieve_newer=false;
function attach_photo_starts(){
if(retrieve_newer){retrieve_newer.abort();}
$("b[data-t_id=reqnew]").mouseleave();
if(retrieve_newer){retrieve_newer.abort();}
}


function attach_photo_check(){';

include("video/valid_extensions_js_array.php"); // var validext=new Array(); validext[0]="3g2";
$echo.=$secho;

$echo.='

var name="";
var size="";

$("._2yg").find(":file").each(function(){
name=this.files[0].name;
size=this.files[0].size;
});


var invalidext=false;



var ext=name.split(".");
var extl=ext.length;
if(ext.length<=1){invalidext=true;}
else{
var x=0;
$(ext).each(function(){
x++;
if(x==extl){
	if(!in_array(this,validext)){
	invalidext=true;
	}
}
});
}

if(invalidext){
return true;
}
else{
change_description();
var video_upload_name="video_upload"+retcount();
$("#video_upload_name").val(video_upload_name);
var popUp = window.open("/video/?video_form_upload", video_upload_name, "width=550, height=225, left=0, top=0, scrollbars,resizable");
if (popUp == null || typeof(popUp)=="undefined") {$("#video_modal").click();}
else {
popUp.focus();
upload_window_is_opened();

}

return false;
}
}

var making_upload=false;

function upload_window_is_opened(){
making_upload=true;
$.doTimeout(7000,function(){
var isit=$("._2yg").find(":file").attr("disabled");
if(isit=="disabled" && making_upload){
$("._2yg").find(":file").attr("disabled",false);
$("._2yg").find("input[type=submit]").parent().data("u_trigger","t");
$("._2yg").find(".caller_loading").parent().css("display","none");
}
});
}

function upload_window_is_openedv(){
making_upload=false;
$("._2yg").find(":file").attr("disabled",false);
$("._2yg").find("input[type=submit]").parent().data("u_trigger","t");
$("._2yg").find(".caller_loading").parent().css("display","none");

$("._95").bind("change",dchange_wupload);

restore_mind();
}
</script>
';


//}

/*
writepostimg

Write Post
*/




$echo.='
<input type="hidden" id="cmw" value="0">
<script type="text/javascript">
$("#cmw").val("0");
</script>
';

if(!isset($wall) AND !isset($clist)){ //means it is news feed
if(isset($_GET['sk']) AND $_GET['sk']=="h_nor"){
mysql_query("UPDATE optionsv SET sort_option='0' WHERE id='$uid'");
}
else if(isset($_GET['sk']) AND $_GET['sk']=="h_chr"){
mysql_query("UPDATE optionsv SET sort_option='1' WHERE id='$uid'");
}

$r=mysql_query("SELECT * FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$sortoption=$m['sort_option'];	
}

if($sortoption=="0"){
$dtitle="SORT";	
$dclass="checked";
$dclassv="";
}
else{
$dtitle="SORT: MOST RECENT";		
$dclass="";
$dclassv="checked";
}

$echo.='
<div class="hasExpandedComposer"><ul id="boulder_fixed_header" class="uiStream"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span><div class="_6a _6b uiPopover uiStreamHeaderChronologicalForm" id="u_ps_0_0_1"><a aria-controls="js_0" aria-owns="u_ps_0_0_0" role="button" class="sortLink _p prevdefault npjax" href="#" aria-haspopup="true" aria-expanded="true" rel="toggle" id="u_ps_0_0_2">'.$dtitle.'</a>

<div style="right: 0px;" class="uiContextualLayer uiContextualLayerBelowRight"><div id="u_ps_0_0_0" class="uiMenuXWrapper"><div class="uiMenuXBorder"><ul role="menu" class="uiMenuX"><li aria-selected="false" class="uiMenuXItem '.$dclass.' __MenuXItem"><a title="" role="menuitem" href="/?sk=h_nor" class="itemAnchor"><span class="itemLabel">Top Stories</span></a></li><li aria-selected="false" class="uiMenuXItem '.$dclassv.' __MenuXItem"><a title="" role="menuitem" href="/?sk=h_chr" class="itemAnchor"><span class="itemLabel">Most Recent</span></a></li></ul></div></div></div>

</div></li></ul></div>';
}


foreach($bydate as $k=>$v){
if(!isset($topa[$k])){
$topa[$k]='0'; // are now friends detectado solamente por ahora
}
}


if(!isset($wall) AND !isset($clist)){
$r=mysql_query("SELECT * FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$sortoption=$m['sort_option'];
}
}

if(!isset($sortoption)){
$sortoption=1; //always by date for list and wall :)
}

if($sortoption=="0"){
//take into consideration date value
arsort($topa);
}
else if($sortoption=="1"){
//do nothing, without sorting it would come date wise in theory
}

$tax=array();
foreach($topa as $k=>$v){

$aval=tod($bydate[$k]);


	$ax=0;
while($ax<=$diecinueve){

	if(strpos($aval,$tdays[$ax])!==false){
	if(!isset($tax[$ax])){$tax[$ax]=1;}
	else{$tax[$ax]++;}
	}

	$ax++;
	}
}

	$ax=0;
while($ax<=$diecinueve){
if(!isset($tax[$ax])){$tax[$ax]=0;}
$ax++;
}

ksort($tax);



$ajoker=100; //number of limited stories for today - onwards it grabs the remainder of possibilities merged for each day

$joker=$ajoker+1;

$corresponde=array();

$corresponde[0]=$joker;

foreach($tax as $k=>$v){

	if($v==0){
	$corresponde[$k]=$joker;
	}
	$pjoker=$ajoker;
	$kv=$k+1;

	if($v>$pjoker){
	$corresponde[$kv]=$joker;
	}
	else{
	$corresponde[$kv]=$joker-$v+$pjoker;
	$joker=$corresponde[$kv];
	}

}


$montana=array();

$dax=array();

$daxvu=array();
$daxvu['23']=0;
$daxvu['22']=0;
$daxvu['21']=0;
$daxvu['20']=0;
$daxvu['19']=0;
$daxvu['18']=0;
$daxvu['17']=1;
$daxvu['16']=1;
$daxvu['15']=1;
$daxvu['14']=1;
$daxvu['13']=1;
$daxvu['12']=1;
$daxvu['11']=2;
$daxvu['10']=2;
$daxvu['09']=2;
$daxvu['08']=2;
$daxvu['07']=2;
$daxvu['06']=2;
$daxvu['05']=3;
$daxvu['04']=3;
$daxvu['03']=3;
$daxvu['02']=3;
$daxvu['01']=3;
$daxvu['00']=3;

foreach($topa as $key=>$value){
$aval=$bydate[$key];
$bs=$topa[$key];


$bn=tod($aval);
$hv=date('H', strtotime($bn));
$dv=date('Y-m-d', strtotime($bn));

if($sortoption==0){
$value=$bs.$aval; // previously: [60 2012-08-14 18:40:23] => 17
}
else{
$value=$aval;
}

$k=$daxvu[$hv];
$ax=0;
while($ax<=$diecinueve){
if($dv==$tdays[$ax]){
if(!isset($dax[$ax])){$dax[$ax]=1;}
else{$dax[$ax]++;}
if($dax[$ax]<$corresponde[$ax]){
$montana[$ax][$k][$value]=$key;
//ax dia, k orden por horas, key el identificador, aval la fecha, value el topa.
}
}
$ax++;
}


}


$ax=0;
foreach($bydate as $key=>$value){
if($value<$tagou){

$aval=$bydate[$key];
$bs=$topa[$key];

if($sortoption==0){
$value=$bs.$aval;
}
else{
$value=$aval;	
}

$montana[$veinte][3][$value]=$key;
//$montana[$veinte][3][$key]='';
$ax++;
if($ax==51){break;}
}
}

ksort($montana);


foreach($montana as &$ina)
{
ksort($ina);


foreach($ina as &$ina2){
krsort($ina2);
}

}



/*
foreach($montana as $k=>$v){

foreach($v as $k2=>$v2){

foreach($v2 as $k3=>$v3){

$echo.=$k.':'.$k2.':'.$k3.':'.$v3.'<br>';

}

}

}
*/


/*
$bydateg=array();
$ax=0;
while($ax<=$diecinueve){
$bydateg[$ax]="";
$ax++;
}


foreach($bydate as $k=>$v){

$ax=0;
while($ax<=$diecinueve){

if(strpos($v,$tdays[$ax])!==false){
$bydateg[$ax].=','.$k;
}

$ax++;
}

}

foreach($bydateg as $k=>$v){

//$v=substr($v, 1);

$bydateg[$k]=$v;

}


$sampled='';

$rx=0;
$rxv=0;
$bydategv=array();
$sampled=array();
foreach($bydateg as $k=>$v){
$sampled[$k]='';

$je=explode(",",$v);


$ms=101;


$ax=0;
$rx=0;
foreach($je as $k2=>$v2){

if(!empty($v2)){

if($ax<$ms){

$sampled[$k].=','.$v2;

$rx++;
}

$ax++;
}


}
$rxv=$ms-$rx+$rxv;
$ms=$rxv;



}

$topak=array();
$topakd=array();
foreach($sampled as $k=>$v){


$je=explode(",",$v);


foreach($je as $k2=>$v2){

if(!empty($v2)){

$topakd[$v2]=$k;
$topak[$v2]=$topa[$v2];

}
}

}

arsort($topak);

$equivalen=array();
foreach($topak as $k=>$v){

$v2=$topakd[$k];
$equivalen[$v2][$k]=$v;

}


ksort($equivalen);

*/

/*
foreach($equivalen as $k=>$v){
foreach($v as $k2=>$v2){
$echo.=$k.':'.$k2.':'.$v2.'<br>';
}
}
*/


/*
arsort($topa);

$topa=array_pick($topa, 100);

$topa=shuffle_assoc($topa);
*/

$echo.='<div style="margin:0;padding:0;margin-top:-6px;" id="stories_wrapper">';

$yx=0;
$yxv=0;

$lbda=array();
$papa=array();
foreach($montana as $key2=> $value2){

foreach($value2 as $keyo=>$valueod){

foreach($valueod as $saco=>$key){




if(isset($topa[$key])){

}
else{
$topa[$key]='0'; // are now friends detectado solamente por ahora
}


$echo.=$dr[$key];

$aval=$bydate[$key];
$lbda[]=$aval;
$papa[]=$key;
$yx++;


if($yx=='26'){break;}
}
if($yx=='26'){break;}
}
if($yx=='26'){break;}
}

if($yx==0 && isset($clist)){
$echo.='<div style="margin-top:18px;border-top:1px solid rgb(233, 233, 233);padding-left:18px;"><div data-referrer="pagelet_stream_pager" id="pagelet_stream_pager"><div class="clearfix mts uiMorePager stat_elem fbStreamPager"><div><div class="pam uiBoxLightblue  uiMorePagerPrimary">There are no more posts to show right now.</div></div></div></div></div>';
}
else if($yx==0){
//here show add friends with the sdk as there are no recent stories because there are not enough friends

}

$echo.='</div>';

if(isset($aval)){
rsort($papa);
$lak=$papa[0];

sort($lbda);
$lbd2 = key( array_slice( $lbda, -1, 1, TRUE ) );
$lbd2=$lbda[$lbd2];
$lbd=$lbda[0];
}

if(!isset($lbd)){$lbd='';}
if(!isset($lbd2)){$lbd2='';}
rsort($papa);
$papac=count($papa);
if($papac==0){$lak='';}
$echo.='
<input type="hidden" id="lbd">
<input type="hidden" id="lbd2">
<input type="hidden" id="lbd2v">
<input type="hidden" id="lak">
<input type="hidden" id="viald">
<input type="hidden" id="vialdv">

<script type="text/javascript">
$("#viald").val("0");
$("#vialdv").val("0");
$("#lbd").val("'.$lbd.'");
$("#lbd2").val("'.$lbd2.'");
$("#lak").val("'.$lak.'");

$("#lbd2v").val("");
</script>

';


$echo.='
<div class="hidden_sb" id="s_load_older" data-s_pagination="t" data-s_elem="html" data-s_percentage="70" data-s_function="news_feed_older"></div>
<script type="text/javascript">
if(stories_request===undefined){
dget="'.$dget.'";
function news_feed_older(s){
';
if(isset($wall)){
$echo.='if(s && strpos(s,"s_id")!==false){
$(\'#lbd\').before(\'<a href="#" data-cf="news_feed_older" class="lb isloading" style="padding:10px;width:489px;margin-left:18px;margin-top:17px;margin-bottom:10px;padding-top:11px;padding-bottom:12px;cursor:pointer;">Show Older Stories</a>\');	
return false;
}
else{
$(".isloading").eq(0).addClass("hidden_sb");
$(".isloading").eq(1).removeClass("hidden_sb");
}'; //s_id is sent with pagination
}
$echo.='
$(\'#lbd\').before(\'<div class="isloading" style="padding:10px;width:489px;margin-left:18px;margin-top:17px;margin-bottom:10px;padding-top:11px;padding-bottom:12px;"><img width="16" height="11" alt="" src="/images/jKEcVPZFk-2.gif" style="border:none;"></div>\');

	var viald=$("#vialdv").val();
	if(viald>15){return;}
else{
	var lak=$("#lak").val();
var lbd=$("#lbd").val();


if(retrieve_older){retrieve_older.abort();}

retrieve_older=$.ajax({
  async: "false",
  type: "POST",
  url: "/master/maincore.php?"+dget,
  data: { lbd:lbd,lak:lak}
  }).done(function(response){
$(".isloading").remove();
if(response.length>0){

var res=response.split("{}");

var lbd=res[1];
$("#lbd").val(lbd);

var lak=res[2];


$("#lak").val(lak);

$(\'#stories_wrapper\').append(res[0]);

var viald=$("#vialdv").val();
viald=parseInt(viald);
viald=viald+1;
$("#vialdv").val(viald);
}

});
	return;


}

}

var retrieve_older=false;






var retrieve_newer=false;

function reqnew(){
	$("b[data-t_id=reqnew]").mouseleave();
	var viald=$("#viald").val();
	if(viald>50){return;}
	var lak=$("#lak").val();
var lbd2=$("#lbd2").val();
	var lbd2v=$("#lbd2v").val();

if(retrieve_newer){retrieve_newer.abort();}

retrieve_newer=$.ajax({
  async: "false",
  type: "POST",
  url: "/master/maincore.php?"+dget,
  data: { lbd2:lbd2,lbd2v:lbd2v,lak:lak}}).done(function(response) {////alert(response);

if(response.length>0){
var res=response.split("{}");

if(res[0]==""){
$("b[data-t_id=reqnew]").mouseenter();
return;
}


var lbd2=res[1];
$("#lbd2").val(lbd2);

var lak=res[2];
$("#lak").val(lak);

////alert(lbd2);

////alert(lak);

var delem=$("#main_divg");
var ac=$(delem).find(".mtable");

var c=retcount();
$(\'#stories_wrapper\').prepend(\'<div id="nqa\'+c+\'" style="margin:0;padding:0;display:none;">\'+res[0]+\'</div>\');

var delem=$("#nqa"+c);
var bc=$(delem).find(".mtable");

var noviald=false;

var uidv=$(delem).find(".mtabled").attr("data-uidv");
var sbid=$(delem).find(".mtabled").attr("data-sbid");
var type=$(delem).find(".mtabled").attr("data-type");

var match=$("#main_divg").find(".mtabled[data-uidv="+uidv+"][data-sbid="+sbid+"][data-type="+type+"]").length;
if(match>1){
$("#nqa"+c).remove();
noviald=true;
}

var match=$("#main_divg").find(".mtabled[data-uidv="+uidv+"][data-type="+type+"]").length;
if(match>1 && in_array(type,single_update_per_user)){
$("#nqa"+c).remove();
noviald=true;
}

if(!noviald){
$("#nqa"+c).fadeIn("slow");
var viald=$("#viald").val();
viald=parseInt(viald);
viald=viald+1;
$("#viald").val(viald);
}
}

$("b[data-t_id=reqnew]").mouseenter();

});
}

var stories_request="t";
}

$("#main_divg").append(\'<b data-t_f="reqnew()" data-t_h="retrieve_newer" data-t_t="10000" data-t_id="reqnew"></b>\');
$("b[data-t_id=reqnew]").click();
</script>
';


$yxv--;
$echo.='<input type="hidden" value="'.$yxv.'" id="alltimes">';

$echo.='<input type="hidden" value="'.$xrt.'" id="piclikeval">
<script type="text/javascript">
document.getElementById("piclikeval").value='.$xrt.';
</script>

';



include("gallery_viewer.php");
$echo.=$secho;


$echo.='<div id="right_colg" style="margin:0;margin-left:736px;position:absolute;top:63px;left:0px;width:244px;">';


$echo.='</div>'; //se termina right_colg


$echo.='
<script type="text/javascript">
if(refreshtimest===undefined){
var refreshtimest;
function refreshtimes()
{

var allt=\'\';

var okis=$("abbr[class=livetimestamp]");

$(okis).each(function(){
		allt+=":--"+$(this).data("utime");
});




var ajax_refresh_times=$.ajax({
  async: "false",
  type: "POST",
  url: "/refreshtimes.php",
  data: { alltimes : allt }}).
  done(function(response) {
if(response.length>0){

var res=response.split("<>");
var x=1;
var id;

$(okis).each(function(){
if(res[x]!="past"){
	var dek=$(this).data("live");
if(dek){
if(dek=="s"){
if(strpos(res[x]," at ")!==false){
res[x]=res[x].split(" at ");
res[x]=res[x][0];
}
}
}
		$(this).html(res[x]);
}
x++;
});

}
});

refreshtimest=setTimeout("refreshtimes()",10000);
}

refreshtimest=setTimeout("refreshtimes()",2000);
}
</script>
';


$echo.='
<script type="text/javascript">
$(".writeacomment").val("");
$(".writeacomment").css("height","14px");
$(".writeacomment").css("overflow-y","hidden");
</script>
</div>';
?>
<?php
$params['rhelper']="../";
if(!isset($clist)){
$params['rhelper_js']="";
}
else if(isset($clist)){
$params['rhelper_js']="../";
$params['body_class']='rightcolr';
$params['title']=$clistn;
}

if(isset($wall)){
$params['layout']="normal_w";
}
else{
$params['layout']="normal_n";
}

$params['body_class']="scroll";

if(isset($harea)){$params['header_area']=$harea;}
include("end.php");
?>