<?php
$echo.='
<script type="text/javascript">
$("#linksedit2").removeClass("linkseditv");
$("#linksedit2").addClass("linksedit");
function remove_profile_pic(){
var acav=$("#owidth_msgvrp");
if($(acav).length>0){}
else{
var aca=\'<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;" id="owidth_msgvrp"><div style="width:480px;height:100%;z-index:502;margin:0 auto;display:block;"><div class="pop_container3" id="pop_containervvorp" style="height:111px;display:block;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervorp">Remove Picture?</div><div class="div_dialog_body3" id="div_dialog_bodyvorp" style="height:14px;">Are you sure you want to remove this picture?</div><div class="div_dialog_footer3" style="height:28px;" id="div_dialog_footervrp"><label class="fsl uiButton rfloat" onclick="cancelrp();"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label><label class="fsl uiButton uiButtonConfirm mrs rfloat" onclick="rremove_profile_pic();"><input autocomplete="off" type="button" value="Okay" class="uiButtonText"></label></div></div></div></div></div>\';
$(\'body\').prepend(aca);
}
}
function rremove_profile_pic(){	
$("#owidth_msgvrp").fadeOut("slow", function() {
var ppid=$("#profile_pic_id").val();
	$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/remove_profile_pic.php",
  data: {photoid:ppid},
  success: function(response) {
	window.location="/editprofile.php?sk=picture";
	}
}); 
 });	
}
function cancelrp(){
$("#owidth_msgvrp").fadeOut("slow");	
}
</script>
<input autocomplete="off" type="hidden"  id="imgcri">
<input autocomplete="off" type="hidden"  id="actual_profilept">
<input autocomplete="off" type="hidden"  id="imgcr2">
<input autocomplete="off" type="hidden"  id="imgcr2n">
<input autocomplete="off" type="hidden"  id="profile_pic_id">
<input autocomplete="off" type="hidden"  id="cprofilepicd">
<input autocomplete="off" type="hidden"  id="imgcrheightv">
<input autocomplete="off" type="hidden"  id="imgcrheight">
<input autocomplete="off" type="hidden"  id="imgcrwidthv">
<input autocomplete="off" type="hidden"  id="imgcrwidth">
<input autocomplete="off" type="hidden"  id="imgcrpwidth">
<input autocomplete="off" type="hidden"  id="imgcrpheight">
<input autocomplete="off" type="hidden"  id="img5">
<input autocomplete="off" type="hidden"  id="scalei">
<input autocomplete="off" type="hidden"  id="notset">';
$cprofilepic=$uid_a['profilepic'];
$actual_profilep='';
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='Profile Pictures'");
while($m=mysql_fetch_array($r)){
$v=$m['sbid'];
$r2=mysql_query("SELECT * FROM media WHERE id='$uid' AND picsa='$cprofilepic'");
while($m2=mysql_fetch_array($r2)){
$actual_profilep=$m2['pics'];	
$cprofilepicdv=$m2['picsm']; 
}
}
$echo.='
<script type="text/javascript">
$("#profile_pic_id").val("'.$actual_profilep.'");
function cancelet(){
$("#owidth_msgvet").fadeTo(400,0);
}';
if($actual_profilep!=""){
$imgcr='users/'.$uid.'/pics/'.$cprofilepicdv;
$pp=pathinfo($imgcr);
$extv=$pp['extension'];
$ext='a.'.$extv;
$ext2='th.'.$extv;
$basename=$pp['basename'];
$basename=str_replace($ext,"",$basename);
$basename=str_replace($ext2,"",$basename);
$basename=$basename.'th'.'.'.$extv;
$imgcr2n=$basename;
$basename='users/'.$uid.'/pics/'.$basename;
$imgcr2=$basename;
$size=getimagesize($imgcr);
$imgcrwidth=$size[0];
$imgcrheight=$size[1];
$imgcrwidthv='';
$imgcrheightv='';

$actual_profilept='users/'.$uid.'/pics/'.$actual_profilep;
$size=getimagesize($actual_profilept);
$imgcrwidth2=$size[0];
$imgcrheight2=$size[1];
$imgcrpwidth=$imgcrwidth*100/$imgcrwidth2;
$imgcrpwidth2=$imgcrwidth*100/$imgcrpwidth;
$imgcrpheight=$imgcrheight*100/$imgcrheight2;
$imgcrpheight2=$imgcrheight*100/$imgcrpheight;
$dis='.'.$extv;
$img5=str_replace($dis,"",$actual_profilept);
$img5=$img5.'a.'.$extv;
}
$notset="f";
$scale=1;
$r=mysql_query("SELECT * FROM options WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$tcords=$m['tcords'];
$lcords=$m['lcords'];
if($tcords!="" AND $lcords!=""){
$imgcrheightv=$tcords;
$imgcrwidthv=$lcords;
$notset="t";	
}
else if($lcords=="2"){
$scale=2;
}
}
if($actual_profilep!=""){
$echo.='
$("#cprofilepicd").val("'.$cprofilepicdv.'");

 $("#notset").val("'.$notset.'");
$("#imgcrwidthv").val("'.$imgcrwidthv.'");
$("#imgcrheightv").val("'.$imgcrheightv.'");
$("#imgcri").val("'.$imgcr.'");
$("#imgcr2").val("'.$imgcr2.'");
$("#imgcr2n").val("'.$imgcr2n.'");
$("#actual_profilept").val("'.$actual_profilept.'");
$("#img5").val("'.$img5.'");
$("#scalei").val("'.$scale.'");
';
}
$echo.='
function scale(w){
var cnb=$("#scale:checked").val(); 
if((cnb===undefined) && (w!="1")){
$("#imgcr").css("max-width","180px");
$("#imgcr").css("max-height","180px");
$("#imgcr").css("min-height","50px");
$("#imgcr").css("min-width","50px");

var imgcrwidth=document.getElementById("imgcr").clientWidth;
var imgcrheight=document.getElementById("imgcr").clientHeight;

$("#notset").val("f");

var imgcrheightv=Math.round((imgcrheight-50)/2);
var imgcrwidthv=Math.round((imgcrwidth-50)/2);
$("#imgcrheightv").val(imgcrheightv);
$("#imgcrwidthv").val(imgcrwidthv);	

$("#imgcr").css("left","-"+imgcrwidthv+"px");
$("#imgcr").css("top","-"+imgcrheightv+"px");

$("#imgcrwidth").val(imgcrwidth);
$("#imgcrheight").val(imgcrheight);

$("#imgcr").draggable("enable");	
$("#scalei").val("1");
}
else{

$("#imgcr").draggable("disable");

$("#imgcr").css("min-height","");
$("#imgcr").css("min-width","");

$("#imgcr").css("left","0px");
$("#imgcr").css("top","0px");



$("#imgcr").css("max-width","50px");
$("#imgcr").css("max-height","50px");



var awidth=document.getElementById("imgcr").clientWidth;
if(awidth<50){
var el=50-awidth;
el=el/2;
$("#imgcr").css("left",el+"px");
}
var aheight=document.getElementById("imgcr").clientHeight;
if(aheight<50){
var el=50-aheight;
el=el/2;	
$("#imgcr").css("top",el+"px");
}

$("#scalei").val("2");
}
}
function edit_thumbnail_pic(){

	var acav=$("#owidth_msgvet");
if($(acav).length>0){$("#owidth_msgvet").removeClass("hidden_sbs"); $("#owidth_msgvet").fadeTo(0,1);}
else{
	
var aca=\'<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;" id="owidth_msgvet"><div style="width:480px;height:100%;z-index:502;margin:0 auto;display:block;"><div class="pop_container4" id="pop_containervvoet" style="height:202px;display:block;position:fixed;"><div class="div_dialog_header4" id="div_dialog_headervoet">Edit Thumbnail</div><div class="div_dialog_body4" id="div_dialog_bodyvoet" style="height:105px;"><div id="edit_thumbnail_1" style="text-align: center;padding: 10px 0px;position:relative;top:-1px;display:none;"><img width="32" height="32" alt="" src="/images/jKEcVPZFk-2.gif" style="border:none;"><div style="margin:0;padding:0;font-size:13px;font-weight:bold;">Saving Thumbnail</div></div><div style="margin:0;padding:0;display:block;" id="edit_thumbnail_2"><span style="font-weight:bold;display:block;position:relative;top:-1px;">Thumbnail Version</span><div id="squarebox" class="squarebox" style="display:inline-block;cursor:move;position:relative;float:none;top:-1px;"><img src="/images/transparent.png" id="imgcr" style="border:none;margin:0;padding:0;opacity:1!important;max-width:180px;max-height:180px;min-height:50px;min-width:50px;position:absolute;" class="profile_picturev"></div><div style="margin:0;padding:0;position:relative;top:-44px;display:inline-block;">Drag the image to adjust.</div><div style="display:inline-block;position:relative;left:-130px;top:-13px;margin:0;padding:0;"><input autocomplete="off" type="checkbox" style="display:inline-block;margin:0;padding:0;" name="scale" id="scale" onclick="scale();"><label style="display:inline-block;margin:0;margin-left:3px;padding:0;position:relative;bottom:0px;cursor:pointer;"  for="scale">Scale to fit.</label></div><small style="display:block;margin:0;padding:0;position:relative;top:-1px;">This version of your public profile picture will appear around the site.</small></div></div><div class="div_dialog_footer4" style="height:28px;" id="div_dialog_footervet"><label id="cancelpp" class="fsl uiButton rfloat"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label><label class="fsl uiButton uiButtonConfirm mrs rfloat" id="savepp"><input autocomplete="off" type="button" value="Save" class="uiButtonText"></label></div></div></div></div></div>\';
$(\'body\').prepend(aca);
$("#savepp").unbind("click");
$("#cancelpp").unbind("click");

$("#savepp").bind("click",function(){
$(this).unbind("click");
$("#cancelpp").unbind("click");
redit_thumbnail_pic();	
});

$("#cancelpp").bind("click",function(){
cancelet();
});

}

var scalev=$("#scalei").val(); 

var cprofilepicd=$("#cprofilepicd").val();
$("#imgcr").css("max-width","180px");
$("#imgcr").css("max-height","180px");

function imgcr_loaded(){
$("#imgcr").css("left","0");
$("#imgcr").css("top","0");

if($("#imgcr").data("uiDraggable")){
$("#imgcr").draggable("destroy");
}

var maskWidth  = $("#squarebox").width();
var maskHeight = $("#squarebox").height();
var imgPos     = $("#imgcr").offset();


var imgWidth   = $("#imgcr").width(); 
var imgHeight  = $("#imgcr").height();

$("#squarebox").scrollLeft(0);
$("#squarebox").scrollTop(0);

var x1 = (imgPos.left + maskWidth) - imgWidth; 
var y1 = (imgPos.top + maskHeight) - imgHeight;

var x2 = imgPos.left;
var y2 = imgPos.top;



$("#imgcr").draggable({ containment: [x1,y1,x2,y2] });
$("#imgcr").css({cursor: "move"});

var imgcrwidth=document.getElementById("imgcr").clientWidth;
var imgcrheight=document.getElementById("imgcr").clientHeight;

var ns=$("#notset").val();

if(ns=="t"){
var imgcrheightv=$("#imgcrheightv").val();  
var imgcrwidthv=$("#imgcrwidthv").val(); 
}
else{
var imgcrheightv=Math.round((imgcrheight-50)/2); 
var imgcrwidthv=Math.round((imgcrwidth-50)/2);
$("#imgcrheightv").val(imgcrheightv);
$("#imgcrwidthv").val(imgcrwidthv);	
}

$("#imgcr").css("left","-"+imgcrwidthv+"px");
$("#imgcr").css("top","-"+imgcrheightv+"px");

$("#imgcrwidth").val(imgcrwidth);
$("#imgcrheight").val(imgcrheight);

}
$("#imgcr").unbind("load",imgcr_loaded);
$("#imgcr").bind("load",imgcr_loaded);

$("#imgcr").attr("src","/'.$uid.'/pics/"+cprofilepicd);

if(scalev=="2"){
scale(1);
$("#scale").attr("checked", "checked");
}

}

var savingpp=false;
function redit_thumbnail_pic(){
	$("#edit_thumbnail_2").css("opacity","0");
	$("#pop_containervvoet").css("height","169px");
	$("#div_dialog_bodyvoet").css("height","72px");
	$("#edit_thumbnail_1").css("display","block");
	
var awidth=$("#squarebox").innerWidth();
var aheight=$("#squarebox").innerHeight();			

var xpos = $("#imgcr").css("left");
xpos=xpos.replace("-","");
xpos=xpos.replace("px","");
var left=xpos;

var ypos = $("#imgcr").css("top");
ypos=ypos.replace("-","");
ypos=ypos.replace("px","");
var top=ypos;

var img2=$("#imgcri").val();
var img3=$("#actual_profilept").val();
var img4=$("#imgcr2").val();
var img4n=$("#imgcr2n").val();
var img5=$("#img5").val();
var cnb=$("#scale:checked").val(); 
if(cnb===undefined){var cnb=1;}
else{var cnb=2;}
var owidth=document.getElementById("imgcr").clientWidth;  
var oheight=document.getElementById("imgcr").clientHeight;

if(savingpp){savingpp.abort();}

savingpp=$.ajax({
  async: false,
  type: "POST",
  url: "cropprofilepic.php",
  data: {top:top,left:left,awidth:awidth,aheight:aheight,img2:img2,img3:img3,img4:img4,img4n:img4n,img5:img5,cnb:cnb,owidth:owidth,oheight:oheight}
  }).done(function(response) {
$("#savepp").unbind("click");
$("#cancelpp").unbind("click");

$("#savepp").bind("click",function(){
$(this).unbind("click");
$("#cancelpp").unbind("click");
redit_thumbnail_pic();	
});

$("#cancelpp").bind("click",function(){
cancelet();
});

//alert(response);
  $("#notset").val("t"); 
  $("#imgcrheightv").val(ypos);
  $("#imgcrwidthv").val(xpos);
  
	  $("#owidth_msgvet").addClass("hidden_sbs");
		$("#edit_thumbnail_1").css("display","none");
	$("#pop_containervvoet").css("height","202px");
	$("#div_dialog_bodyvoet").css("height","105px");
	$("#edit_thumbnail_2").css("display","block");
	$("#edit_thumbnail_2").css("opacity","1");
	}); 	
}
</script>
<div class="mainwpicture">
<table class="pictureft" cellspacing="0" cellpadding="0">
<tr><td>
<div class="profile-picture">
<img src="/'.$uid.'/pics/'.$cprofilepicd.'" class="profile_picture">
</div>
<div id="remove_profile_picture_link" class="editppl" style="text-align: center;padding-top: 5px;display:'.$wdisplay.';">
<a href="#" onclick="remove_profile_pic(); return false;">Remove Your Picture</a>
</div>
<div id="edit_thumbnail_link" class="editppl" style="text-align: center;padding-top: 5px;display:'.$wdisplay.';">
<a href="#" onclick="edit_thumbnail_pic(); return false;">Edit Thumbnail</a>
</div>
</td>
<td>
<div style="padding: 30px;width: 400px;text-align: center;">
<div style="padding: 10px 0px;text-align: center;font-size: 11px;" id="profile_pic_form">
Select an image file on your computer (4MB max):
<script type="text/javascript">
function submiti(){
	$("#profile_pic_form").css("display","none");
	$("#uploading_pic").css("display","");
var xhrq = new XMLHttpRequest();
	var form = new FormData(); 
	var file = $("#MAX_FILE_SIZE").val();
	form.append("MAX_FILE_SIZE", file);
	
	var file = document.getElementById("uploadpic").files[0];
	form.append("uploadpic[]", file);
		
	     xhrq.onreadystatechange = function(){            
            if (xhrq.readyState == 4){//alert(xhrq.responseText);
	$("#updateu").html(xhrq.responseText);
			}
        };
		
	xhrq.open("POST", "uploadprofilepic.php");
	xhrq.send(form);
}
function updateu(response){
	$("#scalei").val("1");
	$("#scale").attr("checked", false);
		$("#uploading_pic").css("display","none");
	$("#profile_pic_form").css("display","");
	var res=response.split("{}");
	var photo=res[9];
	$(".profile_picture").attr("src","/'.$uid.'/pics/"+photo);
	var photoid=res[4];
	$("#profile_pic_id").val(photoid);
	$("#remove_profile_picture_link").css("display","block");
	$("#edit_thumbnail_link").css("display","block");

 $("#notset").val("f");

var imgcri=res[21];
var actual_profilept=res[22];
var actual_pic3=res[27];
$("#cprofilepicd").val(actual_pic3);

var imgcr2=res[23];
var imgcr2n=res[24];
var imgcrpwidth=res[25];
var imgcrpheight=res[26];

$("#imgcri").val(imgcri);
$("#actual_profilept").val(actual_profilept);
$("#imgcr2").val(imgcr2);
$("#imgcr2n").val(imgcr2n);

$("#img5").val(imgcri);
$("#scalei").val("1");

$(".profile_picturev").attr("src","/"+imgcri);
	}
</script>
<div style="padding: 8px 0px 10px;text-align: center;font-size: 11px;">
<div style="display:none;" id="updateu"></div>
<iframe style="visibility:hidden;position:absolute;left:-4000px;height:0;width:0;" name="submitframe" id="submitframe"></iframe>
<input autocomplete="off" type="file" name="uploadpic" id="uploadpic" onchange="submiti(); return false;">
<input autocomplete="off" type="hidden"  name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="4000000" />
</div>
</div>
<div style="text-align: center;padding: 10px 0px;display:none;" id="uploading_pic">
<img src="/images/jKEcVPZFk-2.gif" style="border: 0px none;" width="32" height="32" alt="">
<div style="font-size:13px;font-weight:bold;">Uploading Picture</div>
</div>
</div>
</td>
</tr>
</table>
</div>
';	
?>