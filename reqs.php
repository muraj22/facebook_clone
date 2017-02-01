<?php

include("start.php");
include("populate_page.php");

$params['style']='
<style type="text/css">
.showmr{
display:block;
padding:10px 15px;
background-color:rgb(237,239,244);
border:1px solid rgb(216,223,234);
cursor:pointer;
color:#3b5998;
text-decoration:none;
word-wrap:break-word;
margin-top:10px;
}
.showmr:hover{
background-color:#d9edf7;
border:1px solid #d9edf7;
text-decoration:underline;
}
.check{
margin:2px 5px 0pt 0pt;
vertical-align:top;
width:9px;
height:14px;
background-position:-9px -329px;
background-image:url("/images/pl-ax5r_6tk.png");
background-repeat:no-repeat;
display:inline-block;
font-weight:bold;
line-height:13px;
text-align:center;
white-space:nowrap;
word-wrap:break-word;
}
body table td{font-size:11px;vertical-align:top;}
.friendslinkb a:link{
font-size:13px;font-weight:bold;color:#3b5998;text-decoration:none;
}
.friendslinkb a:visited{
font-size:13px;font-weight:bold;color:#3b5998;text-decoration:none;
}
.friendslinkb a:active{
font-size:13px;font-weight:bold;color:#3b5998;text-decoration:underline;
}
.friendslinkb a:hover{
font-size:13px;font-weight:bold;color:#3b5998;text-decoration:underline;
}
.notnow{
margin-left:4px;
background-image:url("/UVjH_L9sL7g.png");
background-repeat:no-repeat;
background-position:0pt 0pt;	
background-color:rgb(238,238,238);
border:1px solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:2px 6px;
text-align:center;
vertical-align:top;
white-space:nowrap;
color:rgb(81,81,81);
}
.confirmrequest{
background-image:url("/images/Ce0Xa8hRU2A.png");
background-repeat:no-repeat;
background-position:-352px -54px;
background-color:rgb(91,116,168);
border-color:rgb(41,68,126) rgb(41,68,126) rgb(26,53,110);
border-width:1px;
border-style:solid;
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:2px 3px;
text-align:center;
vertical-align:top;
white-space:nowrap;
word-wrap:break-word;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
}
.confirmrequest2{
color:#ffffff;
background:none repeat scroll 0% 0% transparent;
border:0pt none;
cursor:pointer;
display:inline-block;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size:11px;
font-weight:bold;
margin:0pt;
padding:1px 0pt 2px;
padding-top:0;
padding-bottom:1px;
padding-left:0;
white-space:nowrap;	
}
.masuno{
margin-top:2px;
vertical-align:top;
margin-right:5px;
width:11px;
height:14px;
background-position:-36px -392px;
background-image:url("/images/XsF-hka4MeB.png");
background-repeat:no-repeat;
display:inline-block;
cursor:pointer;
font-size:11px;
font-weight:bold;
line-height:13px;
text-align:center;
white-space:nowrap;
word-wrap:break-word;
}
.addfriend{
margin-left:0;
background-image:url("/images/XsF-hka4MeB.png");
background-repeat:no-repeat;
background-position:0pt -98px;
background-color:rgb(238,238,238);
border:1px solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:2px 6px;
text-align:center;
vertical-align:top;
white-space:nowrap;
color:rgb(51,51,51);
word-wrap:break-word;
}
.friendslink2s{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;cursor:pointer;
}
.friendslink2s:hover{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;cursor:pointer;
}
.notnowo{
margin-left:4px;
background-image:url("/images/Ce0Xa8hRU2A.png");
background-repeat:no-repeat;
background-position:-352px -348px;
background-color:rgb(238,238,238);
border-width:1px;
border-style:solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:2px 3px;
text-align:center;
vertical-align:top;
white-space:nowrap;
}
.notnowo2{
background:none repeat scroll 0% 0% transparent;
border:0pt none;
color:#333333;
cursor:pointer;
display:inline-block;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size:11px;
font-weight:bold;
margin:0pt;
padding:1px 0pt 2px;
padding-top:0;
padding-bottom:1px;
padding-left:0;
white-space:nowrap;
word-wrap:break-word;
}
.ocontainer{
margin-top:10px;
width:652px;
padding:6px 5px 10px;
border-top:1px solid rgb(229,234,241);
display:block;
border-bottom:medium none;
border-left:medium none;
border-right:medium none;
background-color:#ffffff;
cursor:pointer;
color:#3b5998;
text-decoration:none;
word-wrap:break-word;
}
.ocontainer:hover{
margin-top:10px;
width:652px;
padding:6px 5px 10px;
border-top:1px solid rgb(229,234,241);
display:block;
border-bottom:medium none;
border-left:medium none;
border-right:medium none;
background-color:#edeff4;
cursor:pointer;
color:#3b5998;
text-decoration:underline;
word-wrap:break-word;	
}
.opincho{
background-image:url(\'/images/Ce0Xa8hRU2A.png\');	
background-repeat:no-repeat;
background-position:-168px -5px;
width:5px;
height:3px;
display:inline-block;
vertical-align:top;
margin-left:5px;
margin-top:5px;
cursor:pointer;
word-wrap:break-word;
}
</style>';

$echo.='
<script type="text/javascript">
function hideallf(){

var w=\'\';
$("input[class=notnow]").each(function() {
                w+=\'{}\';
				w+=$(this).attr("rel");
        }); 
	
$.ajax({
  type: "POST",
  url: "unconfirmfriend.php?a=a",
  data: { amigos : w },
  success: function(data) {
	  if(data.length>0){
	$("input[class=notnow]").each(function() {
				var id=$(this).attr("id");
				id=id.replace("notnow","");
				$("#confirm"+id).remove();
				$(this).remove();
				$("#confirmv"+id).css("background","none repeat scroll 0% 0% #FFF9D7");
				$("#notnowv"+id).css("display","inline-block");
	var totfh2=$("#totfh2").html();
	totfh2=parseInt(totfh2);
	totfh2=totfh2-1;
	$("#totfh2").html(totfh2);
	var totfhv2=$("#totfhv2").html();
	totfhv2=parseInt(totfhv2);
	totfhv2=totfhv2-1;
	$("#totfhv2").html(totfhv2);
        }); 
		
}
  }
});

}
function unconfirmfriend(w,yk,f){
if(f===undefined){f="";}
$.ajax({
  type: "POST",
  url: "unconfirmfriend.php",
  data: { amigo : w },
  success: function(data) {
	  if(data.length>0){
	if(f=="m"){
	var totfh2=$("#totfh2").html();
	totfh2=parseInt(totfh2);
	totfh2=totfh2-1;
	$("#totfh2").html(totfh2);
	var totfhv2=$("#totfhv2").html();
	totfhv2=parseInt(totfhv2);
	totfhv2=totfhv2-1;
	$("#totfhv2").html(totfhv2);
	}
	
	$("#confirm"+f+yk).remove();
	$("#notnow"+f+yk).remove();
	$("#confirmv"+f+yk).css("background","none repeat scroll 0% 0% #FFF9D7");
	$("#notnowv"+f+yk).css("display","inline-block");
}
  }
});

}

function unconfirmfriendd(w,yk){
$.ajax({
  type: "POST",
  url: "unconfirmfriend.php",
  data: { amigo : w, d:\'d\' },
  success: function(data) {
	  if(data.length>0){	
	var totfh=$("#totfh").html();
	totfh=parseInt(totfh);
	totfh=totfh-1;
	$("#totfh").html(totfh);
		  
	var totfhv=$("#totfhv").html();
	totfhv=parseInt(totfhv);
	totfhv=totfhv-1;
	$("#totfhv").html(totfhv);
	
	$("#confirm"+yk).remove();
	$("#notnow"+yk).remove();
	$("#increasemw"+yk).css("width","395px");
	$("#notnowv"+yk).css("display","block");
}
  }
});

}

function deleteallf(){
	var w=\'\';
$("input[class=notnowo2]").each(function() {
                w+=\'{}\';
				w+=$(this).attr("rel");
        }); 
	
$.ajax({
  type: "POST",
  url: "unconfirmfriend.php?da=a",
  data: {amigos:w},
  success: function(data) {
	  if(data.length>0){
	$("input[class=notnowo2]").each(function() {
				var id=$(this).attr("id");
				id=id.replace("notnowo","");
	
				$("#confirm"+id).remove();
				$("#notnow"+id).remove();
				$("#increasemw"+id).css("width","395px");
				$("#notnowv"+id).css("display","block");
				
	var totfh=$("#totfh").html();
	totfh=parseInt(totfh);
	totfh=totfh-1;
	$("#totfh").html(totfh);
		  
	var totfhv=$("#totfhv").html();
	totfhv=parseInt(totfhv);
	totfhv=totfhv-1;
	$("#totfhv").html(totfhv);
        }); 
	//alert(totfh);	
}
  }
});

}

function confirmfriend(w,yk,f){
if(f===undefined){f="";}
$.ajax({
  type: "POST",
  url: "confirmfriend.php",
  data: { amigo : w },
  success: function(data) {
if(data.length>0){
	if(f=="m"){
	var totfh2=$("#totfh2").html();
	totfh2=parseInt(totfh2);
	totfh2=totfh2-1;
	$("#totfh2").html(totfh2);
	var totfhv2=$("#totfhv2").html();
	totfhv2=parseInt(totfhv2);
	totfhv2=totfhv2-1;
	$("#totfhv2").html(totfhv2);
	}
	else{
	var totfh=$("#totfh").html();
	totfh=parseInt(totfh);
	totfh=totfh-1;
	$("#totfh").html(totfh);
	var totfhv=$("#totfhv").html();
	totfhv=parseInt(totfhv);
	totfhv=totfhv-1;
	$("#totfhv").html(totfhv);		
	}
	$("#notnow"+f+yk).remove();
	$("#confirm"+f+yk).remove();
	$("#confirmvv"+f+yk).css("display","inline-block");
	$("#confirmvvv"+f+yk).css("display","inline-block");
	$("#confirmv"+f+yk).css("background","none repeat scroll 0% 0% #FFF9D7");
}
  }
});

}

function thanks_fr_feedback(org_elem){
$(org_elem).parents(".fr_give_feedback").html("Thank you for your feedback.");
}
function showhiddenr(){
$(".ocontainer").remove();	
$("#hiddenreq").css("display","inline-block");
$("#showmfh").css("display","block");
}
</script>
<div style="margin:0;padding:0;display:block;" id="unhiddenreq">
<div style="background-color:rgb(242,242,242);border-bottom:medium none;border-top:1px solid rgb(226,226,226);padding:4px 6px 5px;margin-bottom:10px;word-wrap:break-word;font-weight:bold;width:650px;position:relative;">Friend Requests<div style="float:right;margin:0;padding:0;" class="friendslink2s" onclick="hideallf();">Hide All</div></div>';


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$echo.='
<script type="text/javascript">
function loading_showmfh(org_elem){
$(org_elem).addClass("hidden_sb");
$(org_elem).next(".loading_wrapper").removeClass("hidden_sb");
}

function showmfh(response,org_elem){//alert(response);
		  var res=response.split("{}");
		  res[1]=parseInt(res[1]);
		  res[2]=parseInt(res[2]);
		  var cfjax=$(org_elem).attr("fjax");
		  cfjax=cfjax.replace("gs="+res[2],"gs="+res[1]);
		  $(org_elem).attr("fjax",cfjax);
	$(org_elem).next(".loading_wrapper").addClass("hidden_sb");
	if(res[1]!=res[3]){
	$(org_elem).removeClass("hidden_sb");
	}

	$(org_elem).prev(".p_wrapper").append(res[0]);
}
</script>
';

$unconfirmed=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$uid' AND confirmed='nc'"));
$unconfirmed=$unconfirmed['c'];

if($unconfirmed==0){
$echo.='
<div style="padding:10px;background-color:rgb(237,239,244);border:1px solid rgb(216,223,234);word-wrap:break-word;width:640px;">
No new requests
</div>
</div>
';
}
else{
$gs=0;
$gsv=1;

$_POST['a']="t";
include("pagination/show_more_friend_requests.php");

$echo.=$secho;

$echo.='</div>';
	
}

$echo.='<div class="ocontainer" onclick="showhiddenr();">See hidden requests<div class="opincho"></div></div>';

$echo.='<div style="margin:0;padding:0;display:none;" id="hiddenreq">';
$echo.='<div style="background-color:rgb(242,242,242);border-bottom:medium none;border-top:1px solid rgb(226,226,226);padding:4px 6px 5px;margin-bottom:10px;margin-top:10px;word-wrap:break-word;font-weight:bold;width:650px;position:relative;">Hidden Requests<div style="float:right;margin:0;padding:0;" class="friendslink2s" onclick="deleteallf();">Delete All</div></div>';


unset($_POST['a']);

$gs=0;
$gsv=1;

include("pagination/show_more_friend_requests.php");

$echo.=$secho;

$echo.='
</div>
</div>';

function return_relationship($uti,$k){
	if($uti['gender']==2){
	$boyfriend='boyfriend';
	$fiance='fiance';
	$spouse='spouse';
	}
	else{
	$boyfriend='girlfriend';
	$fiance='fiancee';
	$spouse='spouse';
	}
$relationship_array=array();
$relationship_array[2]=$uti['prefix'].' as your '.$boyfriend;
$relationship_array[3]=$uti['prefix'].' as your '.$fiance;
$relationship_array[4]=$uti['prefix'].' as your '.$spouse;
$relationship_array[5]='a complicated relationship with '.$uti['prefix'];
$relationship_array[6]=$uti['prefix'].' as your '.$boyfriend;

return $relationship_array[$k];

}


$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND type='love' AND relation_confirmed='1'");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id2']);
$dpic=$uti['profilepic'];
$dpic=str_replace("a.","_s.",$dpic);

$echo.='
<script type="text/javascript">
function relationship_show_loading(){
$("#relationship_confirm_holder").addClass("hidden_sb");
$(".confirm_boxes .async_saving").removeClass("hidden_sb");
}
function relationship_confirmed(response,org_elem){//alert(response);
var res=$.parseJSON(response);
$(".confirm_boxes .async_saving").addClass("hidden_sb");	
$("#relationship_confirm_holder").before(\'<div>\'+res.text+\'</div>\');
}
function relationship_ignored(response,org_elem){
$(".confirm_boxes .async_saving").addClass("hidden_sb");	
$("#relationship_confirm_holder").before(\'<div>\'+res.text+\'</div>\');
}
</script>
<div id="relationship" class="confirm_boxes">
<div class="async_saving hidden_sb"></div>
<div id="relationship_confirm_holder">
<input type="hidden" name="sbid" value="'.$m['sbid'].'">
<div class="clearfix" id="relationship_main" style="border-top:1px solid #e9e9e9;"><i class="_29h _29i img corazon_grande"></i><div class="pbs _29j _29k fsl fwb fcb"><span id="relationship_label">You have <span id="rel_text">a request from <span class="lb"><a hc="" href="/'.$uti['username'].'">'.$uti['fullname'].'</a></span> to add '.return_relationship($uti,$m['relation']).'.</span></span></div></div><div class="confirm" id="relationship_100003577943493"><table border="0" cellspacing="0"><tbody><tr><td class="image"><a href="/'.$uti['username'].'"><img style="max-width:100px;max-height:100px;" src="/users/'.$uti['sbid'].'/pics/'.$dpic.'"></a></td>
<td class="info"><a class="profile_link" href="/'.$uti['username'].'">'.$uti['fullname'].'</a><br><br>Would you like to confirm your relationship with '.$uti['f_name'].'?<br><br>
<div class="buttons"><br><label class="uiButton uiButtonConfirm" for="u_jsonp_2_3"><input data-a_starts="relationship_show_loading" data-a_custom_f="relationship_confirmed" value="Confirm" fjax="/ajax/relationships/love/confirm.php" data-a_formo=\'$(this).parents("#relationship").eq(0);\'  id="u_jsonp_2_3" type="button"></label><label class="uiButton" for="u_jsonp_2_4"><input value="Ignore" data-a_starts="relationship_show_loading" data-a_custom_f="relationship_ignored" fjax="/ajax/relationships/love/hide.php" data-a_formo=\'$(this).parents("#relationship").eq(0);\' id="u_jsonp_2_4" type="button"></label></div></td></tr></tbody></table></div></form>
</div>

</div>
';
}



$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='right_column_n_no_borders';


include("end.php");
?>