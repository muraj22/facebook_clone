<link data-h="" rel="icon" type="image/png" href="/images/favicon.png">
		<script data-h="" type='text/javascript' src='/jquery.min.js'></script>
		<script data-h="" type='text/javascript' src='/jquery-ui.min.js'></script>
		<script data-h="" type='text/javascript' src='/additional_jquery.php'></script>
		<script data-h="" type='text/javascript' src='/js/tl.php'></script>
		<script data-h="" type="text/javascript" src="https://www.paypalobjects.com/js/external/dg.js"></script>

		<link data-h="" media="screen" rel="stylesheet" href="/tag/css/jquery-ui.custom.css" type="text/css" />
        <link data-h="" media="screen" rel="stylesheet" href="/tag/css/jquery.tag.css" type="text/css" />
        <link data-h="" media="screen" rel="stylesheet" href="/videojs/video-js.css" type="text/css">
        <link data-h="" media="screen" rel="stylesheet" href="/tipTip.css" type="text/css">
		<link data-h="" media="screen" rel="stylesheet" href="/accordion.css" type="text/css">    
		<link data-h="" media="screen" rel="stylesheet" href="/colorpicker.css" type="text/css">    


    <script data-h="" type="text/javascript" src="/js/colorpicker.js"></script>
    <script data-h="" type="text/javascript" src="/js/eye.js"></script>
    <script data-h="" type="text/javascript" src="/js/utils.js"></script>
<?php

echo'   <script data-h="" src="//js.live.net/v5.0/wl.js" type="text/javascript"></script>';
 
 ?>

    <script data-h="" type="text/javascript" src="/jquery.accordion.js"> </script>    
	<script data-h="" type="text/javascript" src="/jquery.ba-dotimeout.min.js"></script>
    <script data-h="" type="text/javascript" src="/jquery.fjax.js"></script>
    <script data-h="" type="text/javascript" src="/jquery.history.fixed.js"></script>
    <script data-h="" type="text/javascript" src="/jquery.livequery.pack.js"></script>
    <script data-h="" type="text/javascript" src="/jquery.metadata.min.js"></script>
    <script data-h="" type="text/javascript" src="/jquery.mousestop.js"></script>
    <script data-h="" type="text/javascript" src="/jquery.pjax.js"></script>
    <script data-h="" type="text/javascript" src="/js/jquery/jquery.delayed.js"></script>
    
        <script data-h="" type="text/javascript" src="/jquery.transitions.js"></script>
    
    <script data-h="" type="text/javascript" src="/videojs/video.js"></script>
        
    <script data-h="" type="text/javascript" src="/jquery.mousewheel.js"></script>
<script data-h="" type="text/javascript" src="/scroller.js"></script>


    
     <script data-h="" src="/jquery.hotkeys.js"></script>
     
  <script data-h="" src="/jquery.waitforimages.js"></script>
  
  <script data-h="" src="/jquery.tipTip.js"></script>
  
    <script data-h="" src="/js/php_js.php"></script>
 
<script data-h="" type="text/javascript" src="/js/c.php"></script>
<?php
echo'<script data-h="" type="text/javascript">';
include("pdchph.php");
echo $sechov;
include("dcph.php");
echo $sechov;
include("vfsc.php");
echo'</script>';

echo'
<script data-h="" type="text/javascript">
var friends_on_chatv=false;
var chat_autocomplete=false;

var fr_flyout=false;

var dmg=function(){
$(this).next(".unfriend_wrapper").css("display","block");
$(this).addClass("uiButtonHover");
$(this).children("i:first").removeClass("ckm");
$(this).children("i:first").addClass("check2");

}
$(document).on("mouseover",".friendButton",dmg);


function dmgv(){
$(this).children(".unfriend_wrapper").css("display","none");
$(this).children(".friendButton").removeClass("uiButtonHover");
$(this).children(".friendButton").children("i:first").removeClass("check2");
$(this).children(".friendButton").children("i:first").addClass("ckm");

}
$(document).on("mouseleave",".isfriend_wrapper",dmgv);
$(document).on("mouseleave",".friendButton",dmgv);

function approve_keep(){
$("#pop_containervvor").fadeOut("slow");	
}

function unfriend_completed(){
$("#pop_containervvor").fadeOut("slow",function(){
location.reload(true);
});
}

function punfriend(w,n,p){
$("#pop_containervvor").css("display","block");
$(".wremove").html(n);
$(\'#wremovei\').html(\'<img src="/\'+w+\'/pics/\'+p+\'" style="max-width:100px;">\');
$(\'#div_dialog_footervor\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:88px;" data-a_custom_f="unfriend_completed" fjax="/unfriend.php?w=\'+w+\'"><input type="button" value="Remove from Friends" class="uiButtonText"></label><label class="fsl uiButton" onclick="approve_keep();" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText">\');
}

$(document).on("mouseenter","#wall_picture",function(){
$("#editppli").removeClass("hidden_sb");
});

$(document).on("mouseenter","#wall_picture",function(){
$("#editppli").addClass("hidden_sb");
});

$(document).on("mouseleave",".cmjr",function(){
var yk=$(this).attr("data-yk");
checkstv(yk);
});
</script>
';
?>

<script data-h="" type="text/javascript">
<?php


echo '
function jreturn(){
return false;	
}

var pageX=false;
var pageY=false;
$(document).bind("mousemove",function(e){ 
             pageX=e.pageX;
			 pageY=e.pageY;
});

var lastID = null;
var lastt=null;
//last tooltip

var handleMouseover = function (e) {
    var target = e.target || e.srcElement;
    lastID = target.id;
	lastt=$(target).attr("data-t_tipped");
};

if (document.addEventListener) {
    document.addEventListener("mouseover", handleMouseover, false);
}
else {
    document.attachEvent("onmouseover", handleMouseover);
}


function bordercito(w){
var c=$("#bordercito"+w);
if(c.length>0){
$("#bordercito"+w).css("border-bottom","0");
}

}


function toggle_add_friend(w){
	$(w).removeAttr("fjax");
	$(w).removeAttr("data-ajaxified");
	$(w).find(".masuno").css("display","none");
	
	$(w).find("input").val("Friend Request Sent");	
}

';
?>

function strpos (haystack, needle, offset) {
   var i = (haystack + '').indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}

function submitf(w){
document.forms[w].submit();
}
function autoGrowField(f, max) {
   var max = (typeof max == 'undefined')?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != 'scroll') { f.style.overflowY = 'scroll' }
      return;
   }
   if (f.style.overflowY != 'hidden') { f.style.overflowY = 'hidden' }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,'') ){
      f.style.height = scrollH+5+'px';
   }
}

function autogr2(a,b,c,id,max) {
   if (a > max) {
      if (b!= "scroll") { $("#"+id).css("overflow-y","scroll"); }
      return;
   }
   if (b != "hidden") { $("#"+id).css("overflow-y","hidden"); }
   var scrollH = a;
   if( scrollH > c ){
      $("#"+id).css("height",scrollH+5+"px");
   }

}

function autoGrowField2(f, max) {
   var max = (typeof max == 'undefined')?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != 'scroll') { f.style.overflowY = 'scroll' }
      return;
   }
   if (f.style.overflowY != 'hidden') { f.style.overflowY = 'hidden' }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,'') ){
      f.style.height = scrollH+5+'px';
var maincontainer=$("#pop_container").css("height");
maincontainer=maincontainer.replace(/[^0-9]/g,'');
var container1=$("#div_dialog_body").css("height");
container1=container1.replace(/[^0-9]/g,''); 
maincontainer=parseInt(maincontainer)+17+'px';
container1=parseInt(container1)+17+'px';
  }

}


function autoGrowField2v(f, max) {
   var max = (typeof max == 'undefined')?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != 'scroll') { f.style.overflowY = 'scroll' }
      return;
   }
   if (f.style.overflowY != 'hidden') { f.style.overflowY = 'hidden' }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,'') ){
      f.style.height = scrollH+5+'px';
var maincontainer=$("#pop_containervv").css("height");
maincontainer=maincontainer.replace(/[^0-9]/g,'');
var container1=$("#div_dialog_bodyv").css("height");
container1=container1.replace(/[^0-9]/g,''); 
maincontainer=parseInt(maincontainer)+14+'px';
container1=parseInt(container1)+14+'px';
$("#pop_containervv").css("height",maincontainer);
$("#div_dialog_bodyv").css("height",container1);
  }

}

function autogrowtextaread(f, max, yk,value){
	value=$.trim(value);
	if(value!=""){
   var max = (typeof max == 'undefined')?72:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != 'scroll') { f.style.overflowY = 'scroll' }
      return;
   }
   if (f.style.overflowY != 'hidden') { f.style.overflowY = 'hidden' }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,'') ){
var container2=$("#chatjvv"+yk).css("height");
container2=container2.replace(/[^0-9]/g,''); 
container2=parseInt(container2)-13+'px';
$("#chatjvv"+yk).css("height",container2);
      f.style.height = scrollH+5+'px';
  }
	}
	
	else{
		$("#chatjvv"+yk).css("height","255px");
		f.style.height='25px';
		}

}
</script>
<script data-h="" type="text/javascript" src="/js/like.php"></script>
<script data-h="" type="text/javascript" src="/js/repin.php"></script>
<link data-h="" media="screen" rel="stylesheet" href="/master/view_photos_css.php" type="text/css" />
	<link data-h="" media="screen" rel="stylesheet" href="/master/stylesheet.php" type="text/css" />

<?php
include("browser_detect.php");
$browser = browser_detection('browser');
echo'
<script data-h="" type="text/javascript">
function repos_slider(phvv){
  		var difference = $(".scroll-content").height()-$("#cheight").height(); 
	

		var a=phvv; 
		var b=$("#cheight").offset().top;
		var ce=a-b; 
		ce=ce;
		
		
		var topValue="-"+ce;
		topValue=parseInt(topValue);

		
		if (topValue>0) topValue = 0;//stop the content scrolling down too much
		if (Math.abs(topValue)>difference) topValue = (-1)*difference;//stop the content scrolling up too much
		
		sliderVal = (100+(topValue*100/difference));//calculate the slider position from the content position
		$(".slider-vertical").slider("value", sliderVal);//set the slider position	
}
function removecv(id,w,org_elem){
	var i=$(org_elem).parents(".comment_wrapper").eq(0).attr("data-ltypev");
	var wv=w;

var name=$(org_elem).attr("data-f_name");
var username=$(org_elem).attr("data-un");

var c=id; //takes a sbid

if($("[data-a_id=comment_hide"+c+"]").length==0){
$(org_elem).append(\'<div data-a_id="comment_hide\'+c+\'" class="hidden_sb" fjax="/report.php?id=\'+id+\'&w=\'+w+\'&i=\'+i+\'"></div>\');
}
$("[data-a_id=comment_hide"+c+"]").click();


var aca=\'<div style="margin:0;padding:0;background:#edeff4;padding-bottom:1px;" class="mtablev foot_box_child hidden_sb"><div class="friendslink2" style="margin:0;padding:0;text-align:left;">This comment has been hidden as spam. You can <a href="#" data-a_id="comment_hide\'+c+\'" class="comment_undo" fjax="/report.php?u=t&id=\'+id+\'&w=\'+w+\'&i=\'+i+\'">Undo</a> this action, <a href="#" onclick="return false;">Report</a> it as abusive, or <a href="#" onclick="return false;">Block</a> \'+name+\'. You may also <a href="#" onclick="return false;">give \'+name+\' feedback</a>.</div></div>\';


//abusive report most likely an extra +1


$(org_elem).parents(".mtablev").eq(0).after(aca);

$("[data-a_id=comment_hide"+c+"]").eq(1).data("org_elem",org_elem);

$(org_elem).parents(".mtablev").eq(0).addClass("hidden_sb");

$("[data-a_id=comment_hide"+c+"]").eq(1).parents(".mtablev").eq(0).removeClass("hidden_sb");


if($(org_elem).parents(".picturetheater").eq(0).length>0){
var phvv=$("[data-a_id=comment_hide"+c+"]").eq(1).parents(".mtablev").eq(0).offset().top;

setSlider($("#cheight"));
setTimeout("setmt()",200);

repos_slider(phvv);
}



}

function cancel_remove(a){
	if(a=="1"){$("#pre_pop_container2dpg").fadeOut("slow");}
else{
	$("#pre_pop_container2").css("display","none");	
}
}



function rremovec_f(id,w,variation){

  $.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_comment.php",
  data: { id:id,w:w,variation:variation }}).
done(function(response) {//alert(response);
//alert("borrado");
});	

}


function rremovec(id,w,org_elem){
$("#pre_pop_container2").css("display","none")	

var variation=$(org_elem).parents(".foot_box_inner").eq(0).attr("data-type");

if($(org_elem).parents(".picturetheater").eq(0).length>0){
var ph=$(org_elem).parents(".mtablev").eq(0).next().height();
var phv=$(org_elem).parents(".mtablev").eq(0).offset().top;
var phvv=ph-phv;		

$(org_elem).parents(".mtablev").eq(0).remove();
	
decrease($("#howmanym"));
decrease($("#howmanymv"));
decrease($("#ltot"));

var corder=$("#ao_gn").val();
cp_gn[corder]=$("#howmanym").html();
ac_gn[corder]=$("#picscommentscontainerx26").html();
tc_gn[corder]=decrease(tc_gn[corder]);

setSlider($("#cheight"));
setTimeout("setmt()",200);

repos_slider(phvv);
}
else{
$(org_elem).parents(".mtablev").eq(0).remove();	
}


rremovec_f(id,w,variation);
}



function undovv(id,w,i,t,c){
		$.ajax({
  async: "false",
  type: "POST",
  url: "/report.php?u4=t",
  data: { id:id,w:w,i:i },
  success: function(response) {
	$("#"+c).remove();
	$("#mtablew"+t).css("display","table");
  }
});	
}
function hidefs(id,w,i,t){
$.ajax({
  async: "false",
  type: "POST",
  url: "/report.php?o=t",
  data: { id:id,w:w,i:i },
  success: function(response) {
	  				var count=Math.random();
count=count.toString();
count=count.replace(".","");
	  var aca=\'<table style="color:#808080;font-size:11px;" id="\'+count+\'" class="mtable"><tr><td style="width:300px;padding-left:16px;font-weight:bold;color:#333333;" class="llb fwn">This story is now hidden from your News Feed. <a href="#" onclick="undovv(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+i+\'\\\',\\\'\'+t+\'\\\',\\\'\'+count+\'\\\'); return false;">Undo</a></td></tr></table>\';
	  $("#mtablew"+t).after(aca);
	  $("#mtablew"+t).css("display","none");
  }
});			
}
function hidefsp(id,w,i,t){
$.ajax({
  async: "false",
  type: "POST",
  url: "/report.php?m=t",
  data: { id:id,w:w,i:i },
  success: function(response) {
	  				var count=Math.random();
count=count.toString();
count=count.replace(".","");
	  var aca=\'<table style="color:#808080;font-size:11px;" id="\'+count+\'" class="mtable"><tr><td style="width:300px;padding-left:16px;font-weight:bold;color:#333333;" class="llb fwn">This story is now hidden from your News Feed. <a href="#" onclick="undop(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+i+\'\\\',\\\'\'+t+\'\\\',\\\'\'+count+\'\\\'); return false;">Undo</a></td></tr></table>\';
	  $("#mtablew"+t).after(aca);
	  $("#mtablew"+t).css("display","none");
  }
});			
}
function undop(id,w,i,t,c){
		$.ajax({
  async: "false",
  type: "POST",
  url: "/report.php?u2=t",
  data: { id:id,w:w,i:i },
  success: function(response) {
	$("#"+c).remove();
	$("#mtablew"+t).css("display","table");
  }
});	
}
function undopv(id,w,i,t,c){
		$.ajax({
  async: "false",
  type: "POST",
  url: "/report.php?u2=t",
  data: { id:id,w:w,i:i,dc:\'t\' },
  success: function(response) {
	$("#"+c).remove();
	$("#mtablew"+t).css("display","table");
  }
});	
}
function undov(id,w,i,t,c){
		$.ajax({
  async: "false",
  type: "POST",
  url: "/report.php?u3=t",
  data: { id:id,w:w,i:i },
  success: function(response) {
	$("#"+c).remove();
	$("#mtablew"+t).css("display","table");
  }
});	
}
function report(id,w,i,t){
$.ajax({
  async: "false",
  type: "POST",
  url: "/report.php",
  data: { id:id,w:w,i:i },
  success: function(response) {
	  				var count=Math.random();
count=count.toString();
count=count.replace(".","");
	  var aca=\'<table style="color:#808080;font-size:11px;" id="\'+count+\'" class="mtable"><tr><td style="width:300px;padding-left:16px;font-weight:bold;color:#333333;" class="llb fwn">This story has been marked as spam. <a href="#" onclick="undov(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+i+\'\\\',\\\'\'+t+\'\\\',\\\'\'+count+\'\\\'); return false;">Undo</a></td></tr></table>\';
	  $("#mtablew"+t).after(aca);
	  $("#mtablew"+t).css("display","none");
  }
});		
}
function reportp(id,w,i,t){
$.ajax({
  async: "false",
  type: "POST",
  url: "/report.php?p=t",
  data: { id:id,w:w,i:i },
  success: function(response) {
	
	  				var count=Math.random();
count=count.toString();
count=count.replace(".","");
	  var aca=\'<table style="color:#808080;font-size:11px;" id="\'+count+\'" class="mtable"><tr><td style="width:300px;padding-left:16px;font-weight:bold;color:#333333;" class="llb fwn">This story has been marked as spam. <a href="#" onclick="undopv(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+i+\'\\\',\\\'\'+t+\'\\\',\\\'\'+count+\'\\\'); return false;">Undo</a></td></tr></table>\';
	  $("#mtablew"+t).after(aca);
	  $("#mtablew"+t).css("display","none");
  }
});		
}



function removep2(id,w,t){
var posi=Math.floor(Math.random()*101);
if(posi<=79){
$("#delwhat").html("Post");
$("#delwhat2").html("post");
$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton" onclick="cancel_remove();" style="float:right;"><input type="button" value="Cancel" class="uiButtonText"></label><label class="fsl uiButton uiButtonConfirm mrs" style="float:right;" onclick="rremovep2(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+t+\'\\\');"><input type="button" value="Delete Post" class="uiButtonText"></label>\');
$("#pre_pop_container2").css("display","block");
}
else{
rremovep2(id,w,t);	
}
}

function removep2_n(id,w,t){
var posi=Math.floor(Math.random()*101);
if(posi<=79){
$("#delwhat").html("Post");
$("#delwhat2").html("post");
$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="rremovep2_n(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+t+\'\\\');"><input type="button" value="Delete Post" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText"></label>\');
$("#pre_pop_container2").css("display","block");
}
else{
rremovep2_n(id,w,t);	
}
}

function removep2_o(id,t,taste){
var posi=Math.floor(Math.random()*101);
if(posi<=79){
$("#delwhat").html("Post");
$("#delwhat2").html("post");
$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="rremovep2_o(\\\'\'+id+\'\\\',\\\'\'+t+\'\\\',\\\'\'+taste+\'\\\');"><input type="button" value="Delete Post" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText"></label>\');
$("#pre_pop_container2").css("display","block");
}
else{
rremovep2_o(id,t,taste);	
}
}

function rremovep2_o(id,t,taste){
$("#pre_pop_container2").css("display","none");
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_profile_post.php",
  data: { id:id,taste:taste },
  success: function(response) {

$("#mtablew"+t).css("display","none");
  }
});	
}

function removep2v(id,w,t){
var posi=Math.floor(Math.random()*101);
if(posi<=79){
$("#delwhat").html("Post");
$("#delwhat2").html("post");
$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="rremovep2v(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+t+\'\\\');"><input type="button" value="Delete Post" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText"></label>\');
$("#pre_pop_container2").css("display","block");
}
else{
rremovep2v(id,w,t);	
}
}


function removep2v_n(id,w,t){
var posi=Math.floor(Math.random()*101);
if(posi<=79){
$("#delwhat").html("Post");
$("#delwhat2").html("post");
$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="rremovep2v_n(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+t+\'\\\');"><input type="button" value="Delete Post" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText"></label>\');
$("#pre_pop_container2").css("display","block");
}
else{
rremovep2v_n(id,w,t);	
}
}

function rremovep2(id,w,t){
$("#pre_pop_container2").css("display","none");
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_post.php",
  data: { id:id,w:w },
  success: function(response) {
$("#mtablew"+t).css("display","none");
  }
});	
}

function rremovep2_n(id,w,t){
$("#pre_pop_container2").css("display","none");
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_postn.php",
  data: { id:id,w:w },
  success: function(response) {
$("#mtablew"+t).css("display","none");
  }
});	
}

function rremovep2v(id,w,t){
$("#pre_pop_container2").css("display","none");
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_shared_status.php",
  data: { id:id,w:w },
  success: function(response) {
	  //alert(response);
$("#mtablew"+t).css("display","none");
  }
});	
}

function rremovep2v_n(id,w,t){
$("#pre_pop_container2").css("display","none");
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_shared_note.php",
  data: { id:id,w:w },
  success: function(response) {
	  //alert(response);
$("#mtablew"+t).css("display","none");
  }
});	
}

function removept(ids,w,t,alb){
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_postt.php",
  data: { ids:ids,w:w,a:alb },
  success: function(response) {
$("#mtablew"+t).css("display","none");
  }
});	
}

function removeps(id,w,t,i){
$(".cmncdc,.cmncd2cv").css("display","none");
var posi=Math.floor(Math.random()*101);
if(posi<=94){
$("#delwhat").html("Post");
$("#delwhat2").html("post");
$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="rremoveps(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+t+\'\\\',\\\'\'+i+\'\\\');"><input type="button" value="Delete Post" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText"></label>\');
$("#pre_pop_container2").css("display","block");
}
else{
rremoveps(id,w,t,i);	
}
}

function rremoveps(id,w,t,i){
$("#pre_pop_container2").css("display","none");
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_posts.php",
  data: { id:id,w:w,i:i },
  success: function(response) {//alert(response);
$("#mtablew"+t).css("display","none");
  }
});	
}


function removep(ids,a,t){
$(".cmncdc,.cmncd2cv").css("display","none");
var posi=Math.floor(Math.random()*101);
if(posi<=74){
$("#delwhat").html("Post");
$("#delwhat2").html("post");
$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="rremovep(\\\'\'+ids+\'\\\',\\\'\'+a+\'\\\',\\\'\'+t+\'\\\');"><input type="button" value="Delete Post" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText"></label>\');
$("#pre_pop_container2").css("display","block");
}
else{
rremovep(ids,a,t);	
}
}

function rremovep(ids,a,t){
$("#pre_pop_container2").css("display","none");
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_postp.php",
  data: { ids:ids,a:a },
  success: function(response) {
$("#mtablew"+t).css("display","none");
  }
});	
}



function removec2(id,w,t,f){
var posi=Math.floor(Math.random()*101);
if(posi<=39){
$("#delwhat").html("Comment");
$("#delwhat2").html("comment");
$(\'#div_dialog_footervo\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="rremovec2(\\\'\'+id+\'\\\',\\\'\'+w+\'\\\',\\\'\'+t+\'\\\',\\\'\'+f+\'\\\');"><input autocomplete="off" type="button" value="Delete" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label>\');
$("#pre_pop_container2").css("display","block");
}
else{
rremovec2(id,w,t,f);	
}
}

function rremovec2(id,w,t,f){
$("#pre_pop_container2").css("display","none");
$.ajax({
  async: "false",
  type: "POST",
  url: "/delete/del_comment.php?t=t",
  data: { id:id,w:w },
  success: function(response) {
$("#cmphoto"+t).css("display","none");
  }
});	
}

</script>';

echo'
<script data-h="" type="text/javascript">

function show_users_list(response,tri){
$(tri).parent().children(".div_dialog_body3").html(response);
$(tri).parent().children(".div_dialog_body3").css("min-height","353px");
$(tri).parent().children(".div_dialog_body3").css("padding-left","0");
$(tri).parent().children(".div_dialog_body3").css("padding-right","0");
$(tri).parent().children(".div_dialog_body3").css("padding-top","1px");

$(tri).parent().parent().prev(".clone_loading_wrapper").css("display","none");
$(tri).parent().css("display","block");
}

function show_users_listv(response,tri){
var res=response.split("{}");
$(tri).parents(".div_dialog_body3").find(".users_list_wrapper").append(res[0]);
if(res[2]=="-1"){
$(tri).next(".uiBoxLightblue").css("display","none");
$(tri).remove();	
}
else{
var cfjax=$(tri).attr("fjax");
cfjax=cfjax.replace("start="+res[1],"start="+res[2]);
$(tri).attr("fjax",cfjax);
$(tri).next(".uiBoxLightblue").css("display","none");
$(tri).css("display","block");
}

}


function showotherp(w,wv,o){
if(wv==undefined){wv="v"+w; var mor="";}
else{var mor="vv";}
var concrete=$("#otherpeoplev"+mor+w).html();
if(o){
var as="Mutual ";	
}
else{var as="";}
concrete=\'<div class="pop_container" id="fpop_containerv\'+mor+w+\'" style="height:440px;display:none;position:fixed;"><div class="div_dialog_header" id="fdiv_dialog_header\'+mor+w+\'">\'+as+\'Friends</div><div class="div_dialog_body" id="fdiv_dialog_bodyv\'+mor+w+\'" style="height:350px;padding-top:3px;overflow-y:auto;overflow-x:hidden;">\'+concrete+\'</div><div class="div_dialog_footer" style="height:28px;" id="div_dialog_footerv\'+mor+w+\'"><label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:17px;margin-top:-2px;" id="close_msgvv\'+mor+w+\'" onclick="close_msgvv(\\\'\'+mor+w+\'\\\');"><input autocomplete="off" type="button" value="Close" class="uiButtonText"></label></div></div>\';

var spoph=$("#fpop_containerv"+mor+w).css("height");
if(spoph===undefined){
	$("#width_msgvv").append(concrete);
}

if(mor==""){$("#fdiv_dialog_header"+w).html("People who like this");}
else{$("#fdiv_dialog_header"+w).html("Friends");}

var checkjs=$("#checkjs"+wv);
if(checkjs){}
else{$("#close_msgvv"+mor+w).css("top","415px"); $("#close_msgvv"+mor+w).css("right","28px");}

$("#fpop_containerv"+mor+w).css("display","block");
}

function addfriendajaxv(w,nx){
$.ajax({
  async: "false",
  type: "POST",
  url: "/addfriend.php",
  data: { uidv : w },
  success: function(response) {
if(response.length>0){
	$(".addfriendbtv"+nx).css("display","none");
	$(".addfriendbt"+nx).css("padding-left","3px");
	$(".addfriendbt"+nx).val("Friend Request Sent");
}
  }
});

}

function addfriendajaxvv(w,nx){
$.ajax({
  async: "false",
  type: "POST",
  url: "/addfriend.php",
  data: { uidv : w },
  success: function(response) {
if(response.length>0){
	$(".addfriendbtvvv"+nx).css("display","none");
	$(".addfriendbtvv"+nx).css("padding-left","3px");
	$(".addfriendbtvv"+nx).val("Friend Request Sent");
}
  }
});

}

function addfriendajaxl(w,nx,o){
	if(o){
			$(\'#pymk_dvv\'+nx).html(\'<div style="margin:0;padding:0;color:gray;">Friend Request Sent</div>\');
	}
$.ajax({
  async: "false",
  type: "POST",
  url: "/addfriend.php",
  data: { uidv : w },
  success: function(response) {
if(response.length>0){
	if(o){

		$("#pymk"+nx).fadeOut("slow", function() {
			
			var h=0;
			var j=0;
						$("div[class=pymk_d]").each(function() {
                var nena=$(this).css("display");
				var did=$(this).attr("id");
				if((nena=="none") && (did!="pymk"+nx)){
					if(j==0){
					$("#pymk"+nx).before($("#"+did));
					$(this).fadeIn("fast");
					}
					j++;
				}
				h++;
        }); 
		
	
		
			$("#pymk"+nx).remove();
			
	if(h==1){$("#pymkw").fadeOut("fast");}
			
 		$(".pymk_d").css("padding-top","8px");
		$(".pymk_d").css("border-top","1px solid rgb(233, 233, 233)");
		$(".pymk_d:first").css("padding-top","0");
		$(".pymk_d:first").css("border-top","0");
});	
	}
	else{
	$(".addfriendbtlvv"+nx).css("display","none");
	$(".addfriendbtlv"+nx).css("padding-left","3px");
	$(".addfriendbtlv"+nx).val("Friend Request Sent");
	}
	
	}
  }
});

}


function viewpre(yk,id,thepic,w,f)
{
if(f===undefined){f="";}
var aquery=$("#howmanym"+yk).html(); 
var totalm=$("#howmanymv"+yk).html();
aquery=parseInt(aquery);
totalm=parseInt(totalm);

var na=$("#picscommentscontainer"+yk).find(".new_comment").length;

var gtg=totalm-aquery;

if(gtg==0){}
else{
var aquery=$("#howmanym"+yk).html();
var piclikeval=$("#piclikeval").val();
if(w=="1"){var aqueryv="48";}
else{var aqueryv="50";}

var ltypev=$("#picscommentscontainer"+yk).attr("data-ltypev");
var variation=$("#picscommentscontainer"+yk).attr("data-type");

$.ajax({
  async: "false",
  type: "POST",
  url: "/loadpcomment2.php",
  data: { uidv : id, aquery : aquery, sbid : thepic, piclikeval : piclikeval, aqueryv : aqueryv, yk:yk,f : f,na:na,ltypev:ltypev,variation:variation},
  success: function(response) {//alert(response);
if(response.length>0){
var res=response.split("{{}}");
var achat=\'#picscommentscontainer\'+yk;

piclikeval=parseInt(piclikeval);
var parsed=parseInt(res[0]);

piclikeval=piclikeval+parsed;
$("#piclikeval").val(piclikeval);

aquery=parseInt(aquery);
var atotal=aquery+parsed;

$("#howmanym"+yk).html(atotal);

$(achat).prepend(res[1]);
$("#picscommentscontainer"+yk).css("display","block");
  }
  }
});

}

}
</script>
';







echo'
<script data-h="" type="text/javascript">
var newcommenta=false;
function loadcomment(uidv,sbid,org_elem)
{
if($(org_elem).parents(".picturetheater").length>0){
var piclikeval=$("#ltot").val();	
var achat=$(org_elem).parents(".picturetheater").find(".comment_wrapper").eq(0);
}
else{
var piclikeval=$("#piclikeval").val();
var achat=$(org_elem).parents(".foot_box").find(".comment_wrapper").eq(0);
}
var piclikeval_current=piclikeval;
var w=$(org_elem).val();

var js_id="sim"+retcount();

var d=$("body").find(".div_comment_clone").clone();
$(d).removeClass("div_comment_clone").removeClass("hidden_sb").attr("js_id",js_id);

var wv=w.replace(/\n/g, \'<br>\');
$(d).find(".actual_comment").html(wv);

piclikeval=parseInt(piclikeval);
piclikeval=piclikeval+1;
$("#piclikeval").val(piclikeval);

if($(org_elem).parents(".picturetheater").length>0){
$("#ltot").val(piclikeval);	
}

$(achat).append($(d));

$(org_elem).parents(".foot_box_inner").eq(1).css("display","block");

$(org_elem).parents(".mtabled").eq(0).find(".pincho_calibre").click();

if($(org_elem).parents(".picturetheater").length>0){
var variation=$(org_elem).parents(".picturetheater").find(".comment_wrapper").eq(0).attr("data-type");
var ltypev=$(org_elem).parents(".picturetheater").find(".comment_wrapper").eq(0).attr("data-ltypev");
}
else{
var variation=$(org_elem).parents(".foot_box").find(".comment_wrapper").eq(0).attr("data-type");
var ltypev=$(org_elem).parents(".foot_box").find(".comment_wrapper").eq(0).attr("data-ltypev");
}


if($(org_elem).parents(".picturetheater").length>0){
var corder=$("#ao_gn").val();

$("#howmanym").html(piclikeval);
var onemore=$("#howmanymv").html();
onemore=parseInt(onemore);
onemore=onemore+1;
	cp_gn[corder]=piclikeval;
	$("#howmanymv").html(onemore);
	ac_gn[corder]=$(achat).html();

}

newcommenta=$.ajax({ //new comment ajax
  async: "false",
  type: "POST",
  url: "/loadpiccomment.php",
  data: {uidv:uidv, sbid:sbid, comment:w, variation:variation}}).
  done(function(data){////alert(data);
data=$.parseJSON(data);

var hasremoved="f";

if($(org_elem).parents(".picturetheater").length>0){
//user might have swapped photo
var wrapped=ac_gn[corder]; 
var c=retcount();
var dinsert=\'<div class="hidden_sbs" id="commentPhotoSwap\'+c+\'"></div>\';
$("#picturetheater").append(dinsert);
$("#commentPhotoSwap"+c).html(ac_gn[corder]);
var hasremoved="t";
d=$("[js_id="+js_id+"]");
}

var sbid=data.sbid;
var utime=data.utime;
var rtd=data.rtd;
$(d).find("abbr").attr("data-utime",utime);
$(d).find("abbr").attr("title",rtd);
$(d).find("abrr").addClass("livetimestamp");


$(d).find(".cmnc").attr("data-sbid",sbid);

var lparams={"lpid":sbid,"uidv":"'.$uid.'","whatisit":ltypev};

lparams=JSON.stringify(lparams);
////alert(lparams);

$(d).attr("data-lparams",lparams);

$("[js_id="+js_id+"]").removeAttr("js_id");	


$(d).find(".like_comment_wrapper").find(".displaydialog").eq(0)
.attr("data-t_fjax","/stories/with_plugin_tooltip.php?likeid="+sbid+"&owner_c='.$uid.'&ltypev="+ltypev+"&table=like")
.attr("data-d_fjax","/stories/show_users_listv.php?table=like&uo='.$uid.'&sbid="+sbid+"&ltype="+ltypev);

$(d).find(".animateme").css("opacity","0").removeClass("hidden_sb").stop().fadeTo(100,1);
$(d).find(".cmnc_edit").removeClass("hidden_sb");

//between going back and forth set opacity to 1 to all.. when inserting

if(hasremoved=="t"){
ac_gn[corder]=$("#commentPhotoSwap"+c).html();
$("#commentPhotoSwap"+c).remove();
}


	 });

}




function sharew(uidv,elemid,valu,w,privacy,privacyh){
//alert(elemid);
$.ajax({
  async: "false",
  type: "POST",
  url: "/sharet.php",
  data: { uidv : uidv, elemid:elemid, valu : valu, w : w ,privacy:privacy,privacyh:privacyh},
  success: function(response) {
//	  //alert(response);
if(response.length>0){
}
  }
});	

}




function share(albumid,w,uidv,photoid,valu,privacy,privacyh){

if(w=="shared_album"){
var elemid=albumid;
}
else{
var elemid=photoid;
}
//alert(photoid);

$.ajax({
  async: "false",
  type: "POST",
  url: "/sharet.php",
  data: { elemid:elemid, w:w, uidv:uidv, photoid:photoid, valu:valu,privacy:privacy,privacyh:privacyh},
  success: function(response) {alert(response);
if(response.length>0){
}
  }
});	


}


function sbktw(w,yk,maxh){

var exists=$("#"+yk).length;
var smw=$("#"+w).css("width");
if(exists=="0"){
$(\'#\'+w).after(\'<div id="\'+yk+\'" class="writeacommentm"></div>\');
}
$("#"+yk).css("width",smw);
var wval=$("#"+w).val();
wval=wval.replace(/\n/g, \'<br>&nbsp;&nbsp;&nbsp;&nbsp;\');
$("#"+yk).html("AaA"+wval);
var hh=$("#"+yk).css("height");
var hhv=hh.replace("px","");
hhv=parseInt(hhv);
if(hhv>=maxh){
$("#"+w).css("overflow-y","visible");
}
else{
$("#"+w).css("overflow-y","hidden");	
}
$("#"+w).css("height",hh);

if($("#pinchin").css("display")=="none"){
var pe=0;	
}else{var pe=5;}

var ih=$("#writeac").innerHeight();
ih=ih-36-pe;

			var ltot=$("#picscommentscontainerx26").offset().top + $("#picscommentscontainerx26").height();

				var oftop=$("#commentsofp").offset().top;
				var ltotv=ltot-oftop;

				var laheight=$("#divstage").css("height");
				laheight=laheight.replace("px","");
				ltotv=laheight-ltotv;
				ltotv=ltotv+1;
				ltotv=ltotv-36-pe;
				

				
var seter=$("#writeac").parent().hasClass("scroll-content"); 
if(seter===true){
$("#writeac").css("margin-top","");
var iswriting=$("#commentx26").val();
iswriting=$.trim(iswriting);
if((iswriting=="Write a comment...") || (iswriting=="")){
$("#writeac").css("margin-bottom","0");
}
else{
	if(ih>ltotv){
			
$("#writeac").addClass("writeace");

	$(".scroll-content").after($("#writeac"));
	$("#writeac").css("margin-bottom",""); 
	$("#comment").focus();
				
				}
				else{	
$("#writeac").css("margin-bottom","-"+ih+"px");

				}
				
}
}
else{


if(ih<ltotv){
$(".scroll-content").append($("#writeac"));
$("#writeac").removeClass("writeace");

sbktw(w,yk,maxh);

$("#commentx26").focus();				
}
else{$("#writeac").css("margin-bottom","");}	

}
}


function if_empty(){
var tocheck=$("#dquery").val();
if((tocheck=="Search for people, places and things") || (tocheck=="")){$("#dquery").val(""); $("#dquery").css("color","#333333");}
}
function if_empty2(value){
theval=$("#"+value).val();
if(theval==""){$("#"+value).val("Search for people, places and things"); $("#"+value).css("color","#666666");}
}
function showlogout(){
	close_dialog2();
	close_dialog3();
	close_dialog4();
	
	
	$("#accountwrapper").removeClass("aprofilepic");
$("#accountwrapper").addClass("aprofilepicv");
$("#accountwrapper").removeClass("lw");
$("#accountwrapper").addClass("ld");
$("#pinchoacc").removeClass("pinchoacc");
$("#pinchoacc").addClass("pinchoaccv");
$("#pulldown").removeClass("hidden_sb");
}
function hidelogout(){
$("#accountwrapper").removeClass("aprofilepicv");
$("#accountwrapper").addClass("aprofilepic");
$("#accountwrapper").removeClass("ld");
$("#accountwrapper").addClass("lw");
$("#pinchoacc").removeClass("pinchoaccv");
$("#pinchoacc").addClass("pinchoacc");
$("#pulldown").addClass("hidden_sb");

}
</script>
<script data-h="" type="text/javascript">

function show_msg_dialogm(){
$("#messagevm").val("");
$("#mpop_containerv").css("display","block");
}

function autoGrowField2vm(f, max) {
   var max = (typeof max == "undefined")?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != "scroll") { f.style.overflowY = "scroll" }
      return;
   }
   if (f.style.overflowY != "hidden") { f.style.overflowY = "hidden" }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,"") ){
      f.style.height = scrollH+5+"px";
var maincontainer=$("#mpop_containerv").css("height");
maincontainer=maincontainer.replace(/[^0-9]/g,"");
var container1=$("#mdiv_dialog_bodyv").css("height");
container1=container1.replace(/[^0-9]/g,""); 
maincontainer=parseInt(maincontainer)+14+"px";
container1=parseInt(container1)+14+"px";
$("#mpop_containerv").css("height",maincontainer);
$("#mdiv_dialog_bodyv").css("height",container1);
  }

}

function fadeoutm(){
  $("#mpop_container").fadeOut("slow");
}


function close_msgvvm(){
$("#mpop_container").css("display","none");
$("#mpop_containerv").fadeOut("slow");	
}
function send_msgvvm(){
var message=$("#messagevm").val();
message=$.trim(message);
if(message!=""){

var to2="";';

if($uidv=="\\"){
$uidv='';
}


echo'
var to="'.$uidv.'";

$.ajax({
  async: "false",
  type: "POST",
  url: "/write_message.php",
  data: { to : to, message : message, to2 : to2 },
  success: function(data) {
	  //alert(data);
$("#mpop_containerv").css("display","none");
$("#mpop_container").css("display","block");
setTimeout("fadeoutm()",1500);
  }
});
	
}
}
</script>
<script data-h="" type="text/javascript">
function topxv(ir,sr,hr){
	ir=ir.toString();
ir=ir.replace("px","");
ir=parseInt(ir);
if(sr=="s"){
ir=ir-hr;
}
else{
ir=ir+hr;	
}
ir=ir+"px";
return ir;
}
function banas(){
//alert(4);	
}
</script>





<script type="text/javascript">
function cancel_edita(){
$("#ppc_edita").fadeOut("slow",function(){
$(".editain").val();
$(".eidtate").val();
$(".editain").css("color","#333333");
$(".editate").css("color","#333333");	
});

}

function cto(o,v)
{
    if($("#"+o).val()==v){
        $("#"+o).val("");
		$("#"+o).css("color","#333333");
}
}
function ctov(o,v,c)
{
    if($("#"+o).val()==""){
    $("#"+o).val(v);
	$("#"+o).css("color",c);
	}
}';

$secho='';
include("ajax/common/set_photo_location.php");
echo $secho;

echo'
function editalbum(a,pin){
if(editalbum_ajax){editalbum_ajax.abort();}
var editalbum_ajax=$.ajax({
  type: "POST",
  url: "/editalbum.php",
  data: { a : a,pin:pin }})
  .done(function(response) {//alert(response);
	var res=$.parseJSON(response);
    var can_edit=res.can_edit;
    if(can_edit=="f"){
    $("#owm_edita").find("tr").eq(0).addClass("hidden_sb");
    }else{
    $("#owm_edita").find("tr").eq(0).removeClass("hidden_sb");
    }
	$("#editasv").unbind("click");
	$("#editasv").click(function(){save_edita(a);});
	var resv=res.albumn;
	if(res.albumn=="Untitled Album" || res.albumn=="Untitled Board"){res.albumn="";}
	if(res.location==""){res.location="Where were these photos taken?"; $("#city300003").css("color","#999999");}
	if(res.descr==""){
    if(pin=="1"){
    res.descr="Add details about this album...";
    }else{
    res.descr="Add details about this board...";
    }
    $("#descr_edita").css("color","rgb(119, 119, 119)");
	}
	$("#descr_edita").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html(res.descrv);
	
	$("#albname_edita").val(res.albumn);
	$("#city300003").val(res.location);
	res.descr=str_replace("<p>","",res.descr);
	res.descr=str_replace("</p>","",res.descr);
	res.descr=str_replace(\'<b data-uidv="">\',"",res.descr);
	res.descr=str_replace("</b>","",res.descr);
	res.descr=str_replace("<br>","\n",res.descr);
	$("#descr_edita").val(res.descr);
	$("#edita_albumid").val(a);
	
    if(pin=="1"){
    $("#edita_l2").html("Delete Album");
    $("#edita_l").html("Edit Photos");
    $("#ddh_edita2").html("Edit Album");
    $("#ddh_edita").html("Edit Album");
    $("#dalbum_name").html("Album Name");
    $("#del_album_input").val("Delete Album");
    }else{
    $("#edita_l2").html("Delete Board");    
    $("#edita_l").html("Edit Pins");
    $("#ddh_edita2").html("Edit Board");
    $("#ddh_edita").html("Edit Board");
    $("#dalbum_name").html("Board Name");
    $("#del_album_input").val("Delete Board");
    }
	var xpu=300003;

	var v=res.v;
	var cityc=res.cityc;
	var statec=res.statec;
	var countryc=res.countryc;

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
			open:function(){$(this).parents(".photo_container").eq(0).css("z-index","9999");
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
	
	$("#ppc_edita").find(".editatd:last").html(res.privacy);
	
    $("#edita_l").attr("href","/media_set_edit.php?a="+a);
	$("#edita_l2").unbind("click");
	$("#edita_l2").click(function(){delalbum_edita(a,resv); return false;});
$("#ppc_edita").css("display","block");
$("#albname_edita").click();
$("#albname_edita").focus();
});
	
}
function save_edita(a){
var albname=$("#albname_edita").val();
var where=$("#city300003").val();
var descr=$("#descr_edita").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html();
var cityc=$("#cityc300003").val();
var statec=$("#statec300003").val();
var countryc=$("#countryc300003").val();

$.ajax({
  type: "POST",
  url: "/editalbum.php?c=t",
  data: { a : a,albumn:albname,location:where,descr:descr,cityc:cityc,statec:statec,countryc:countryc},
  success: function(response) {//alert(response);
$("#ppc_edita").fadeOut("slow");
location.reload(true);

  }
});	
}

function delalbum_edita(a,an){
$("#ppc_edita").css("display","none");	
$("#editasv2").unbind("click");
$("#editasv2").click(function(){rdelalbum_edita(a);});
$("#delw_edita").html(an);
$("#ppc_edita2").css("display","block");	
}
function rdelalbum_edita(a){
$("#ppci_edita2").css("display","none");
$("#ppci_edita2v").css("display","block");

		  $.ajax({
  type: "POST",
  url: "/delete/del_album.php?t=t",
  data: { alb : a },
  success: function(response) {
window.location=\'/'.$un.'/photos?rt=m\';
  }
});		
}
function cancel_edita2(){
$("#ppc_edita2").fadeOut("slow",function(){
cancel_edita();	
});	
}
</script>';
?>