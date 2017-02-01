<?php
include("start.php");
include("populate_page.php");
include("functions/td.php");

$unv=$uidv;

$r=mysql_query("SELECT * FROM registered WHERE id='$uidv' OR username='$uidv'");
while($m=mysql_fetch_array($r)){
$unv=$m['username'];	
$uidv=$m['id'];
}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$result=mysql_query("SELECT * FROM registered where id='$uidv'");
while($ms=mysql_fetch_array($result)){
$flagtu='t';
if($ms['username']!=''){$unv=$ms['username'];}
$uprofilepic=$ms['profilepic'];	
}


if(!isset($flagtu)){
$result=mysql_query("SELECT * FROM registered where username='$uidv'");
while($ms=mysql_fetch_array($result)){
$uidv=$ms['id'];	
}
}

$uidva='albums';

$r=mysql_query("SELECT * FROM albums WHERE id='$uidv' AND albumn='Profile Pictures'");
while($m=mysql_fetch_array($r)){
$uprofilepica=$m['sbid'];	
}


include("chatupd.php");

$uti=sb_user($uidv);

$params['title']=$uidv;
?>
<?php



include("uidvvariables.php");


$u_friends=array();


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$result3 = mysql_query("SELECT * FROM friends WHERE id='$uidv' AND confirmed='y'");
while($ms3 = mysql_fetch_array($result3))
  {
$result4 = mysql_query("SELECT * FROM registered");
while($ms4 = mysql_fetch_array($result4))
  {
if($ms4['id']==$ms3['id2']){
$u_friends[]=$ms4['id'];
}
}
}




if($uid==$uidv){
$echo.='
<script type="text/javascript">
function check_f2(){
var tocheck=document.getElementById("text").value;
if((tocheck=="") || (tocheck=="What\'s on your mind?")){
return false;}
else{document.forms["onyourmind"].submit();}
}
</script>';
}

else{
$echo.='
<script type="text/javascript" src="jquery.ba-dotimeout.min.js"></script>
<script type="text/javascript">
function check_f2(){	
var tocheck=document.getElementById("text").value;
if((tocheck=="") || (tocheck=="Write something...")){
return false;}
else{

var text=$("#text").val();
var uidv="'.$uidv.'";
$.ajax({
  async: "false",
  type: "POST",
  url: "status_post.php",
  data: { text:text,uidv:uidv },
  success: function(response) {
	  var res=response.split("{}");
restore_mind();
$("#piclikeval").after(res[0]);

$("#mtablew"+res[1]).css("display","none");
$.doTimeout( 400, function(){
$("#mtablew"+res[1]).fadeIn("medium");

});	



  }
});	

	}
}
</script>';
}






$echo.='';

$currentdir='';

include("functions/sb_user.php");

$uidvia=sb_user($uidv);


$echo.='
<div style="position:absolute;right:-270px;width:240px;">
<div style="float:right;width:100%;">';

if($uid==$uidv){
$echo.='
<label class="uiButton mrl" style="float:right;" onclick="window.location=\'/editprofile.php\'"><i class="editpv mrs" style="display:inline-block;"></i><input type="button" value="Edit Profile"></label>
';	
}

if($uid!=$uidv){

$uti=sb_user($uidv);

if(in_array($uid,$uidv_friends)){
$echo.='<div class="uiSelector inlineBlock uiSelectorRight mls uiSelectorNormal  mrl" style="text-align:left;float:right;">
<div class="wrap openToggler"><button type="button" class="hideToggler"></button><a aria-expanded="true" class="uiButton unselected_button" href="#" role="button" aria-label="Other actions" aria-haspopup="1" rel="toggle"><i class="img tuerca_w tuerca_wv"></i><span class="uiButtonText"></span></a><div class="uiSelectorMenuWrapper uiToggleFlyout" style="display:none;"><div class="uiMenuContainer uiSelectorMenu"><div role="menu" class="uiMenu"><ul class="uiMenuInner"><li class="uiMenuItem" data-label="Poke" id="profile_action_poke"><a class="itemAnchor displaydialog" role="menuitem" tabindex="-1" href="#" data-d_okay="Okay" data-d_okay_function="close_dialog" data-d_isajax="t" data-d_fjax="/pokesd/poke_dialog.php?uidv='.$uti['id'].'&amp;pokeback=0&amp;ask_for_confirm=0" rel="dialog-post" id="poke_user"><span class="itemLabel fsm">Poke</span></a></li><li class="uiMenuSeparator"></li><li class="uiMenuItem" data-label="Unfriend..." id="profile_action_remove_friend"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#" fjax="/ajax/profile/removefriendconfirm.php?uid=100004266369260" rel="dialog-post"><span class="itemLabel fsm">Unfriend...</span></a></li></ul></div></div></div><button type="button" class="hideToggler"></button></div>
</div>';
}
else{
$echo.='<div class="uiSelector inlineBlock uiSelectorRight mls uiSelectorNormal  mrl" style="text-align:left;float:right;">
<div class="wrap openToggler"><button type="button" class="hideToggler"></button><a aria-expanded="true" class="uiButton unselected_button" href="#" role="button" aria-label="Other actions" aria-haspopup="1" rel="toggle"><i class="img tuerca_w tuerca_wv"></i><span class="uiButtonText"></span></a><div class="uiSelectorMenuWrapper uiToggleFlyout" style="display:none;"><div class="uiMenuContainer uiSelectorMenu"><div role="menu" class="uiMenu"><ul class="uiMenuInner"><li class="uiMenuItem" data-label="Poke" id="profile_action_poke"><a class="itemAnchor displaydialog" role="menuitem" tabindex="-1" href="#" data-d_okay="Okay" data-d_okay_function="close_dialog" data-d_isajax="t" data-d_fjax="/pokesd/poke_dialog.php?uidv='.$uti['id'].'&amp;pokeback=0&amp;ask_for_confirm=0" rel="dialog-post" id="poke_user"><span class="itemLabel fsm">Poke</span></a></li></ul></div></div></div><button type="button" class="hideToggler"></button></div>
</div>';
}

$echo.='<a class="uiButton displaydialog npjax" style="padding:1px 3px;margin-left:5px;float:right;" '; include("anchors_data/send_message_anchor.php"); $echo.=$sechov.'><input id="wmsg" type="button" value="Message" style="text-align:right;padding:0;"></a>';	

$duidv=$uidv;
include("buttons/friends_button.php");
$echo.=$sechov;

$echo.='<script type="text/javascript">
$(".unselected_button").click(function(){
$(".itemAnchora").removeClass("itemAnchora");
if($(this).hasClass("selected_button")===true){
$(this).removeClass("selected_button");
$(this).nextUntil(".uiMenuContainer").css("display","none");
$(this).children(".tuerca_w").css("background-position","-315px -5px");
}
else{
$(this).addClass("selected_button");
$(this).nextUntil(".uiMenuContainer").css("display","block");
$(this).children(".tuerca_w").css("background-position","-305px -5px");
}
$(this).blur();
});
</script>';

}

$echo.='
</div>
</div>';

$echo.='<div id="wall_content" style="margin:0;padding:0;margin-left:20px;display:inline-block;">';
$echo.='<div style="font-size:20px;color:rgb(28, 42, 71);font-weight:bold;position:relative;margin:0;padding:0;display:block;">'.$uidvia['fullname'].'</div>';

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$stt='2';
include("info_short.php");


$bydate=array();
$theresults=array();
$x=0;

$uidvav='albums';

$result= mysql_query("SELECT * FROM $uidvav WHERE id='$uidv' AND albumn='Wall Photos'");

while($ms=mysql_fetch_array($result)){
$albumid=$ms['sbid'];	
}


$addphoto='<div class="addphotoimg"></div><a href="/add_photos.php?album=">Add Photo</a>';


if($uid==$uidv){

$updatestatus='<div class="updatestatusimg"></div><span style="padding:0;margin:0;padding-left:22px;">Update Status</span>';

$echo.='
<div style="display:block;margin:0;padding:0;width:493px;margin-bottom:7px;border-top:1px solid rgb(204, 204, 204);padding-top:7px;">
<div style="margin:0;position:relative;top:0px;padding:0;font-weight:bold;color:#333333;display:inline-block;" class="addphotolink">'.$updatestatus.'</div>
<div style="margin:0;position:relative;top:0px;margin-left:7px;padding:0;display:inline-block;" class="addphotolink">'.$addphoto.'</div>
</div>
';

$echo.='<script type="text/javascript">
function check_ta(f){
var tocheck=f.value;
if(tocheck=="What\'s on your mind?"){f.value=""; f.style.color="#333333";}
if(f.style.height=="18px"){f.style.height="48px"; document.getElementById("clearfix").style.display="block";}
if(f.style.minHeight=="18px"){f.style.minHeight="48px"}
}
function check_ta2(f){
var tocheck=f.value;
if(tocheck==""){f.value="What\'s on your mind?"; f.style.color="#666666";}
}
</script>';

$echo.='<form name="onyourmind" id="onyourmind" method="POST" action="index.php" style="display:inline-block;margin:0;padding:0;">
<div class="divwrapper" style="width:491px;position:relative;top:0;margin-bottom:30px;"><div class="pinchito"></div><div style="width:400px;border:0;" class="textareawrapper"><textarea name="text" id="text" class="text" onkeyup="autoGrowField(this);" style="height:18px;min-height:18px;width:481px;border:0;color:#666666;cursor:text;" onfocus="check_ta(this);" onblur="check_ta2(this);" title="What\'s on your mind?">What\'s on your mind?</textarea></div><div class="clearfix" style="background:#F2F2F2;display:none;height:32px;border-top:1px solid rgb(230, 230, 230);" id="clearfix"><label class="textsubmit" style="position:absolute;right:4px;bottom:3px;" onclick="check_f2();"><input type="button" value="Post" class="textsubmit2" style="color:#ffffff;"></label></div></div></form>';


}

else{



$updatestatus='<div class="writepostimg"></div><span style="padding:0;margin:0;padding-left:22px;">Write Post</span>';

$echo.='
<div style="display:block;margin:0;padding:0;width:493px;margin-bottom:7px;border-top:1px solid rgb(204, 204, 204);padding-top:7px;">
<div style="margin:0;position:relative;top:0px;padding:0;font-weight:bold;color:#333333;display:inline-block;" class="addphotolink">'.$updatestatus.'</div>
<div style="margin:0;position:relative;top:0px;margin-left:7px;padding:0;display:inline-block;" class="addphotolink">'.$addphoto.'</div>
</div>
';



$echo.='<script type="text/javascript">
function check_ta(f){
var tocheck=f.value;
if(tocheck=="Write something..."){f.value=""; f.style.color="#333333";}
if(f.style.height=="18px"){f.style.height="48px"; document.getElementById("clearfix").style.display="block";}
if(f.style.minHeight=="18px"){f.style.minHeight="48px"}
}
function check_ta2(f){
var tocheck=f.value;
if(tocheck==""){f.value="Write something..."; f.style.color="#666666";}
}
function restore_mind(){';
if($uid==$uidv){$tval='What\'s on your mind?';}
else{$tval='Write something...';}
$echo.='
	$("#text").val("'.$tval.'");
	$("#text").css("color","#666666");
	$("#text").css("height","18px");
	$("#text").css("min-height","18px");
	$("#clearfix").css("display","none");
}
</script>';

$echo.='<form name="onyourmind" id="onyourmind" method="POST" action="index.php" style="display:inline-block;margin:0;padding:0;">
<div class="divwrapper" style="width:410px;position:relative;top:0px;margin-bottom:30px;"><div class="pinchito"></div><div style="width:400px;border:0;" class="textareawrapper"><textarea name="text" id="text" class="text" onkeyup="autoGrowField(this);" style="height:18px;min-height:18px;width:400px;border:0;color:#666666;cursor:text;" onfocus="check_ta(this);" onblur="check_ta2(this);" title="Write something...">Write something...</textarea></div><div class="clearfix" style="background:#F2F2F2;display:none;border-top: 1px solid rgb(230, 230, 230);padding-top:3px;height:29px;" id="clearfix"><label class="textsubmit" style="position:absolute;right:4px;bottom:3px;"><input type="button" value="Share" onclick="check_f2();" class="textsubmit2" style="color:#ffffff;"></label></div></div></form>';


}



arsort($bydate);
$yx=0;
foreach($bydate as $key=> $value){
	if(isset($theresults[$key])){
$echo.= $theresults[$key];
	}
$yx++;
if($yx=='26'){break;}
}

$echo.='

<script type="text/javascript">
function addfriendajax(w){
var thesend=\'uidv=\'+w;
var xmlhttp;
if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
var response=xmlhttp.responseText;

	document.getElementById("addfriendbtv").style.display="none";
	document.getElementById("addfriendbt").style.paddingLeft="3px";

	document.getElementById("addfriendbt").value="Friend Request Sent";

}
  }
xmlhttp.open("POST","addfriend.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(thesend);
}
</script>';



$echo.='
<iframe style="visibility:hidden;position:absolute;left:-250px;" name="likeframe" id="likeframe"></iframe>';

$params['rhelper']='../';
$params['rhelper_js']='';

$params['style']='<style type="text/css">#wall_content table td{padding-left:0;}</style>';
$params['layout']='normal_w';	
$params['left_link_w']='wall';


include("end.php");
?>