<?php
include("start.php");

include("start.php");
include("populate_page.php");
$rhelper_js='../';
$params['style']='';

$echo.='<div style="width:760px;margin-top:6px;">
<div class="clearfix UIDashboardHeader_BottomMargin">
<div style="float:left;margin-right:6px;">
<i class="videocamera"></i>
</div>
<h2 class="uiHeaderTitle" style="font-size:14px;">Edit Video</h2>
</div>

<div class="upload_video_pane video_pane upload_video clearfix" style="border:1px solid rgb(204, 204, 204);">
<div class="panel clearfix" style="border:0;background:transparent;padding-top:10px;">';

$sbid=$_GET['v'];


$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var suf="vt";
$("body").on("click","#tag_l"+suf,function(e){
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM tags WHERE photoid='$sbid' AND id='$uid' AND flag='wv' ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){
	
	$tagsids.=','.$m['id3'];

$uti=sb_user($m['id3']);
$fn=$uti['fullname'];
						

	$tagsnames.=','.$fn;
	
}
$c=mysql_num_rows($r);
$echo.='//alert('.$c.');

$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});
</script>
';


$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND id='$uid' AND visibility!='d' AND nye='3'");
$c=mysql_num_rows($r);
while($m=mysql_fetch_array($r)){
$shotn=$m['shot'];
$shott=$m['shott'];

$r2=mysql_query("SELECT * FROM video_shots WHERE videoid='$sbid' AND id='$uid' AND shot='$shotn'");
while($m2=mysql_fetch_array($r2)){
$shot=$m2['picss'];
$sr=$shotn."s.png";
$shotb=str_replace($sr,"",$shot);
}
}
if($c==0){
$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND id='$uid' AND visibility!='d' AND nye='2'");
$c=mysql_num_rows($r);
if($c>0){
$currently_processing='t';	

}
else{
// here display content is no longer available div	- basically set $echo2, call early populate_page, make an include of the file that echoes
// content is no longer available
}
}

if(isset($currently_processing)){
$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND id='$uid' AND visibility!='d'");
while($m=mysql_fetch_array($r)){
$notify=$m['notify'];

if($notify=='1'){
$checked=' checked';	
}
else{
$checked='';
}
}
$echo.='
<div class="mal pam uiBoxYellow" style="margin-top:0;" id="notify_video">
<div class="fsl fwb fcb">This video is currently processing.</div><div class="mvm uiP fsm">You can edit its details here, but you won\'t be able to choose a thumbnail until processing is complete.</div><div class="uiInputLabel clearfix" id="notify_option"><input id="notify" name="notify" value="1" class="uiInputLabelCheckbox" type="checkbox"'.$checked.'><label for="notify">Notify me when my video is done processing</label></div>
</div>
';
}

$echo.='
<div id="video_infow">
<div id="video_info" style="display:block;">
<div id="video_editor" class="clearfix" style="position:relative;">
<div id="metadata" style="float:left;width:395px;margin-left:5px;">
<div>
<div class="metadata_wrapper">
<label class="metadata_label" for="video_tag">In&nbsp;this&nbsp;video:</label><div class="metadata_input"><div style="width:280px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext displaynoneimportant" data-ac_enable="vt" data-ac_liwidth="198" data-ac_inputw="274" data-ac_url="/autocomplete/jump_note.php"></div></div>
<div class="mts" style="text-align:left;padding-left:88px;">
<span class="fss">Tag people who appear in this video.</span>
</div>
</div>

</div>
<div class="dividerv" style="width:390px;"></div>
<div>
<div class="metadata_wrapper">
<label class="metadata_label" for="title">Title:</label><div class="metadata_input"><input class="inputtext" autocomplete="off" maxlength="65" id="title" name="title" value="" type="text" style="width:274px;"></div>
</div>
<div class="metadata_wrapper">
<label class="metadata_label" for="location">Where:</label><div class="metadata_input"><input class="inputtext dcphlgc" autocomplete="off" placeholder="Where was this video taken?" id="location" name="location" value="" type="text" style="width:274px;"></div>
</div>
<div class="metadata_wrapper">
<label class="metadata_label" for="desc_text">Description:</label><div class="metadata_input"><div style="height: auto;" class="uiTypeahead"><div class="wrap"><textarea placeholder="" class="textInput uiautogrow" name="desc_text" id="desc_text" style="max-height:480px;width:280px;" data-au_grow=""></textarea></div></div></div>
</div>
<div class="metadata_wrapper">
<label class="metadata_label">Privacy:</label><div class="metadata_input">';


$uidv=$uid;

$albumn="Videos";
$ltypev="media";

$sbid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';


$echo.='
</div>

</div>

</div>
</div>';


if(!isset($currently_processing)){


$echo.='
<div class="side_column" style="position:absolute;top:0;right:91px;"><div id="thumbnail_selector" style="padding-left:5px;"><label class="metadata_label" style="text-align:left;padding-bottom:6px;">Choose a Thumbnail:</label><input autocomplete="off" id="thumb" name="thumb" value="1" type="hidden"><img id="thumb_img" src="/'.$uid.'/pics/'.$shot.'"><div id="selector_controls" class="clearfix"><div id="selector_arrows"><img id="left_a" style="cursor:pointer;" src="/images/r8sKj7e5w_U.gif" alt="Previous Image"><img id="right_a" style="cursor:pointer;" src="/images/Uk59iJIXgSJ.gif" alt="Next Image"></div><div id="selector_status">Thumb <span id="tn_summary">'.$shotn.' of '.$shott.'</span></div></div></div></div>

<script type="text/javascript">
var csnap=$("#tn_summary").html();
csnap=csnap.split("of");
csnap=parseInt(csnap[0]);
if(csnap==1){$("#left_a").attr("src","/images/r8sKj7e5w_U.gif");}
else{$("#left_a").attr("src","/images/8JjryC6LnZF.gif");}
if(csnap=='.$shott.'){$("#right_a").attr("src","/images/Z9qOkpXWrvH.gif");}
else{$("#right_a").attr("src","/images/Uk59iJIXgSJ.gif");}

$("#left_a").bind("click",function(){
var csnap=$("#tn_summary").html();
csnap=csnap.split("of");
csnap=parseInt(csnap[0]);
if(csnap>1){
csnap=csnap-1;
if(csnap==1){$("#left_a").attr("src","/images/r8sKj7e5w_U.gif");}
else{$("#left_a").attr("src","/images/8JjryC6LnZF.gif");}
if(csnap=='.$shott.'){$("#right_a").attr("src","/images/Z9qOkpXWrvH.gif");}
else{$("#right_a").attr("src","/images/Uk59iJIXgSJ.gif");}

$("#tn_summary").html(csnap+" of '.$shott.'");
$("#thumb_img").attr("src","/'.$uid.'/pics/'.$shotb.'"+csnap+".png");
$("#csnap").val(csnap);
}
else{return false;}
});

$("#right_a").bind("click",function(){
var csnap=$("#tn_summary").html();
csnap=csnap.split("of");
csnap=parseInt(csnap[0]); 
if(csnap<'.$shott.'){
csnap=csnap+1;
if(csnap=='.$shott.'){$("#right_a").attr("src","/images/Z9qOkpXWrvH.gif");}
else{$("#right_a").attr("src","/images/Uk59iJIXgSJ.gif");}
if(csnap==1){$("#left_a").attr("src","/images/r8sKj7e5w_U.gif");}
else{$("#left_a").attr("src","/images/8JjryC6LnZF.gif");}

$("#tn_summary").html(csnap+" of '.$shott.'");
$("#thumb_img").attr("src","/'.$uid.'/pics/'.$shotb.'"+csnap+".png");
$("#csnap").val(csnap);
}
else{return false;}
});
</script>

';
}

$echo.='

</div>
</div>

<div style="display:none;" id="video_save_additional">
<input type="hidden" id="csnap" name="csnap" autocomplete="off">
<input type="hidden" id="videoid" name="videoid" autocomplete="off">
</div>';

include("functions/insert_vals.php");

$tradurre=array();
$tradurre[]="sbid,videoid";
$tradurre[]="shot,csnap";
$tradurre[]="descr,desc_text";
$tradurre[]="title";
$tradurre[]="location";


$echo.=insert_vals($sbid,"media",$uid,$tradurre);

if(isset($currently_processing)){
$shot='/images/AAqMW82PqGg.gif';
}
else{
$shot='/'.$uid.'/pics/'.$shot;	
}

$echo.='
<div id="editvideo_buttons">
<input class="inputbutton" id="save_info_button" name="save_info_button" data-a_form="metadata,video_save_additional,notify_video" fjax="/video/save_info_edit_video.php" value="Save" type="button"><input class="inputbutton displaydialog" data-d_okay="Delete" data-d_cancel="Cancel" data-d_title="Delete Video?" data-d_cancel_function="close_dialog_f" data-d_okay_function="close_dialog_custom" data-d_okay_function_custom="fjax" data-d_okay_a_fade="t" data-d_fjax="/video/delete_video.php" data-a_form="video_save_additional" id="delete_info_button" name="delete_info_button" value="Delete" type="button"><div class="dialog_msgs"><div class="video_dialog clearfix"><img class="img" style="max-width:160px;max-height:160px;" src="'.$shot.'" alt=""><div class="video_dialog_text"><h3>Deleting a video is permanent.</h3><p>Once you delete a video, you will not be able to get it back.</p><p>Are you sure you want to delete this video?</p></div></div></div><input class="inputbutton inputaux" id="cancel_info_button" name="cancel_info_button" value="Cancel" type="button" onclick="window.location=\'/video/video.php?v='.$sbid.'\';">
</div>


</div>
</div>

</div>
</div>
</div>';


$params['rhelper_js']='../';
$params['rhelper']='../';
$params['title']='Upfrev';

$params['layout']='no_columns_no_borders';


include("end.php");
?>