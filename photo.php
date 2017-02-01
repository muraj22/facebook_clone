<?php

include("start.php");
include("populate_page.php");

$params['style']='


<script type="text/javascript" src="/jquery.Jcrop.js"></script>
<script type="text/javascript" src="/jquery.Jcrop.min.js"></script>
<link media="screen" rel="stylesheet" href="/jquery.Jcrop.css" type="text/css" />
';

$photoid=$_GET['sbid'];

$r=mysql_query("SELECT * FROM $uidp WHERE id='$uid' AND sbid='$photoid'");
while($m=mysql_fetch_array($r)){
$albumn=$m['albumn'];	
$albumid=$m['albumid'];
}

$r=mysql_query("SELECT * FROM media WHERE albumn='Profile Pictures' AND id='$uid' AND sbid='$photoid' ORDER BY datetimep_pp DESC LIMIT 1");
while($m=mysql_fetch_array($r)){
$dsbid=$m['sbid'];	
}
if(!isset($dsbid)){
$dsbid='';	
}

if($photoid==$dsbid){
$echo.='
<div style="display:none;" id="make_profile_picture_link" class="displaydialog" data-d_okay="Confirm" data-d_cancel="Cancel" data-d_title="Make Profile Picture" data-d_cancel_function="close_dialog_f" data-d_okay_function="custom" data-d_overlay="white_create" data-d_okay_function_custom="fjax" data-d_okay_a_fade="t"  data-d_fjax="/make_profile_picture.php?sbid='.$photoid.'"></div><div class="dialog_msgs">You\'ve used this photo as your profile picture before. Do you want to use it again?</div>
<script type="text/javascript">
$(document).ready(function(){
$("#make_profile_picture_link").click();
$("body").on("click",".makeprofilepicl",function(){
$("#make_profile_picture_link").click();	
});
});
</script>
';	
}

$echo.='
<div clas="sbxPhoto croppingMode" id="sbPhotoPageContainer" style="display:inline-block;min-width:100%;">
<div id="sbPhotoPageHeader" class="pvm">
<div class="uiHeader pbs"><div class="clearfix uiHeaderTop"><div><h2 tabindex="0" class="uiHeaderTitle">'.$albumn.'</h2></div></div></div><div class="clearfix"><div class="lfloat fsm fwn lb"><a href="/'.$un.'/photos?album='.$albumid.'">Back to Album</a> &#183; <a href="/'.$un.'/photos">My Photos</a></div></div>
</div>
';

$r=mysql_query("SELECT * FROM $uidp WHERE id='$uid' AND sbid='$photoid'");
while($m=mysql_fetch_array($r)){
$albumid=$m['albumid'];
$echo.='
<div style="width:100%;background:rgb(246, 246, 246);text-align:center;display:inline-block;position:relative;height:auto;min-height:453px;" id="pic_container" class="sbPhotoImageStage"><div style="display:inline-block;position:relative;z-index:1;" id="pic_containerv"><img id="profile_pic_s" src="/'.$uid.'/pics/'.$m['pics'].'" style="max-width:720px;max-height:720px;visibility:visible;display:inline-block;position:relative;vertical-align:middle;line-height:none;"></div><div id="sbPhotoPageButtons" class="sbPhotosPhotoButtons" style="line-height:1.28;"><div class="cropMessage lb" style="display:none;width:100%;">Drag the corners of the transparent box above to crop this photo into your profile picture. <a class="doneCroppingLink" href="#">Done Cropping</a> &#124; <a class="cancelCroppingLink" href="#">Cancel</a></div></div></div>

<script type="text/javascript">
var ah=$("#pic_container").height();
$("#pic_containerv").css("line-height",ah+"px");
$("#profile_pic_s").css("line-height","1.28");
</script>

';	
}

$echo.='
<div class="llb" id="makeprofilepicl">
<a href="#" class="makeprofilepicl">Make Profile Picture</a>
<a href="#" class="doneCroppingLink doneCroppingLinkv" style="display:none;">Done Cropping</a>
</div>

<div style="display:none;" id="crop_vals">
     <label>X1 <input type="text" size="4" id="c_x1" name="c_x1" /></label>
      <label>Y1 <input type="text" size="4" id="c_y1" name="c_y1" /></label>
      <label>X2 <input type="text" size="4" id="c_x2" name="c_x2" /></label>
      <label>Y2 <input type="text" size="4" id="c_y2" name="c_y2" /></label>
      <label>W <input type="text" size="4" id="c_w" name="c_w" /></label>
      <label>H <input type="text" size="4" id="c_h" name="c_h" /></label>
	  
	  <input type="hidden" id="p_w">
	  <input type="hidden" id="p_h">
	  
	  <input type="hidden" id="c_iw">
	  <input type="hidden" id="c_ih">
	  <input type="hidden" id="c_iwv">
	  <input type="hidden" id="c_ihv">
	  <input type="hidden" id="photoid">
	  <input type="hidden" id="albumid">
</div>

</div>
';

$echo.='
<script type="text/javascript">

$("#c_iw").val("");
$("#albumid").val("'.$albumid.'");
$("#photoid").val("'.$_GET['sbid'].'");

$(".doneCroppingLink").click(function(){
$(".cropMessage").html("Saving your new profile picture");
var sarr=$("#crop_vals").find("input");
var sarrv=fjax_url(sarr);
$(\'#crop_vals\').append(\'<a href="#" data-fjax="post" fjax="setprofilep.php\'+sarrv+\'" id="done_croppingv"></a>\');
$("#done_croppingv").click();
});

    function showCoords(c)
    {
      $("#c_x1").val(c.x);
      $("#c_y1").val(c.y);
      $("#c_x2").val(c.x2);
      $("#c_y2").val(c.y2);
      $("#c_w").val(c.w);
      $("#c_h").val(c.h);
	$("#crop_c").removeClass("cursor_move");	

    };

    function clearCoords()
    {
      $("#coords input").val("");

    };
	
	function cursor_move(){
$("#crop_c").addClass("cursor_move");
	}';


	

if($dsbid==$photoid){}
else{
$echo.='
$(".makeprofilepicl").click(function(){
$(".cropMessage").css("display","block");

function activate_crop(){

jQuery(function($){

var iw=document.getElementById("profile_pic_s").clientWidth;
var ih=document.getElementById("profile_pic_s").clientHeight;

var dmeasurement="";

if(iw<200 || ih<200){
if(ih>iw){
dmeasurement=iw;
}
else{
dmeasurement=ih;
}
}
else{
dmeasurement=200;
}

var vl=$("#c_iw").val();
if(vl==""){

$("#p_w").val(iw);
$("#p_h").val(ih);

ih=parseInt(ih);

var oih=$("#pic_container").height();

var ihvv=(oih-3-ih)/2;

//$("#pic_containerv").css("top",ihvv+"px");

iw=parseInt(iw);
iw=iw-dmeasurement;
iw=iw/2;


ih=ih-dmeasurement;
ih=ih/2;

var iwv=iw+dmeasurement;
var ihv=ih+dmeasurement;

$("#c_iw").val(iw);
$("#c_ih").val(ih);
$("#c_iwv").val(iwv);
$("#c_ihv").val(ihv);
}
else{
var iw=$("#c_iw").val();	
var ih=$("#c_ih").val();	
var iwv=$("#c_iwv").val();	
var ihv=$("#c_ihv").val();	
}

        $("#profile_pic_s").Jcrop({
         
            bgColor:     \'black\',
            bgOpacity:   0.42,
			aspectRatio: 1,
			        onChange:   cursor_move,
        onSelect:   showCoords,
        onRelease:  clearCoords,
            minSize: [ dmeasurement, dmeasurement ],
            setSelect:   [ iw,ih, iwv,ihv ]
  });


$(".ord-n").css("display","none");
$(".ord-s").css("display","none");
$(".ord-e").css("display","none");
$(".ord-w").css("display","none");

		var c=$("div#pic_container .jcrop-tracker").filter(function() {
    return ( $(this).css("cursor") == "crosshair" );
});
$(c).attr("id","crop_c");
$("#crop_c").addClass("cursor_default");

$("#crop_c,.cancelCroppingLink").click(function(){
$("#profile_pic_s").css("visibility","visible");
$("#profile_pic_s").css("display","inline-block");
$(".cropMessage").css("display","none");
    JcropAPI = $("#profile_pic_s").data("Jcrop");
    JcropAPI.destroy();
$(".doneCroppingLinkv").css("display","none");
$(".makeprofilepicl").css("display","block");
});

		var c=$("div#pic_container .jcrop-tracker").filter(function() {
    return ( $(this).css("cursor") == "move" );
});
$(c).attr("id","crop_cv");

});

}

$("#profile_pic_s").bind("load",function(){
activate_crop();
});

var isloaded=document.getElementById("profile_pic_s").clientWidth;
if(isloaded!=0){
activate_crop();
}

$(this).css("display","none");
$(this).next().css("display","block");

});';

$echo.='
$(".makeprofilepicl").click();';
}




$echo.='


</script>
';


$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='right_column_n_no_borders';


include("end.php");
?>