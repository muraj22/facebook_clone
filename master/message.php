<?php
if(!isset($from_messages_php)){

include("start.php");
include("populate_page.php");
}

$params['style']='
<style type="text/css">
body ul li{
font-size:11px;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;	
}
.chatimg{background-image:url(\'/images/WlL6q4xDPOA.png\');background-repeat:no-repeat; height:16px;width:16px;vertical-align:top;white-space:pre-wrap;overflow:hidden;word-wrap:break-word; display:inline-block;}
.itemali{
border-style:solid;
border-color:#ffffff;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
color:rgb(17,17,17);
display:block;
font-weight:normal;
line-height:16px;
padding:1px 16px 1px 22px;
text-decoration:none;
cursor:pointer;
white-space:nowrap;
list-style-type:none;
}
.itemali:hover{
border-style:solid;
border-color:#3b5998;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
color:#ffffff;
display:block;
font-weight:normal;
line-height:16px;
padding:1px 16px 1px 22px;
text-decoration:none;
cursor:pointer;
white-space:nowrap;
list-style-type:none;
background-color:#6d84b4;	
}
.omenu{
border-width:1px 1px 2px;
border-style:solid;
border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);
-moz-border-colors:none;
-moz-border-image:none;
background-color:#ffffff;
padding:3px 0px 4px;
overflow-y:auto;	
}
.rueda{
margin-top:2px;
vertical-align:top;
width:10px;
height:14px;
background-image:url("/images/zQaJhaTSUXg.png");
background-position:-33px -30px;
background-repeat:no-repeat;
display:inline-block;
position:relative;
right:-2px;
bottom:-1px;
cursor:pointer;
line-height:13px;
text-align:center;
white-space:nowrap;	
}
.lwr a:link{
color:rgb(28,42,71);
cursor:pointer;	
text-decoration:none;
white-space:nowrap;
line-height:20px;
font-size:16px;
word-wrap:break-word;
font-weight:bold;
}
.lwr a:visited{
color:rgb(28,42,71);
cursor:pointer;	
text-decoration:none;
white-space:nowrap;
line-height:20px;
font-size:16px;
word-wrap:break-word;
font-weight:bold;
}
.lwr a:active{
color:rgb(28,42,71);
cursor:pointer;	
text-decoration:underline;
white-space:nowrap;
line-height:20px;
font-size:16px;
word-wrap:break-word;
font-weight:bold;
}
.lwr a:hover{
color:rgb(28,42,71);
cursor:pointer;	
text-decoration:underline;
white-space:nowrap;
line-height:20px;
font-size:16px;
word-wrap:break-word;
font-weight:bold;
}
.flecha{
margin-top:2px;
vertical-align:top;
width:5px;
height:14px;
background-image:url("/images/r7pMetEzSsR.png");
background-position:-19px -58px;
background-repeat:no-repeat;
display:inline-block;
margin-right:5px;
curosr:pointer;
font-size:11px;
font-weight:bold;
line-height:13px;
text-align:center;
white-space:nowrap;
word-wrap:break-word;
}
.actions{
background-image:url("/images/zQaJhaTSUXg.png");
background-repeat:no-repeat;
background-position:right -5px;
max-width:169px;
vertical-align:top;
background-color:rgb(238,238,238);
border-width:1px;
border-style:solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0px 1px 0px rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:1px 4px;
padding-right:23px;
text-align:center;
white-space:nowrap;
word-wrap:break-word;
}
.actions2{
max-width:169px;
overflow:hidden;
text-overflow:ellipsis;
vertical-align:top;
background:none repeat scroll 0% 0% transparent;
border:0px none;
color:#333333;
display:inline-block;
font-famyli:\'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
font-size:11px;
font-weight:bold;
margin:0px;
padding:1px 0px 2px;
padding-right:0;
white-space:nowrap;
line-height:13px;
text-align:center;
position:relative;
right:-1px;
word-wrap:break-word;
}
.msbtn{
margin-left:0px;
vertical-align:top;
background-image:url("/images/zQaJhaTSUXg.png");
background-repeat:no-repeat;
background-position:-352px -348px;
background-color:rgb(238,238,238);
border-width:1px;
border-style:solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0px 1px 0px rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:2px 6px;
padding-bottom:3px;
text-align:center;
white-space:nowrap;
word-wrap:break-word;
text-decoration:none;
}
.msbtn2{
background:none repeat scroll 0% 0% transparent;
border:0px none;
color:#333333;
cursor:pointer;
display:inline-block;
font-family:\'Lucicda Grande\',Tahoma,Verdana,Arial,sans-serif;
font-size:11px;
font-weight:bold;
margin:0px;
padding:1px 0px 2px;
white-space:nowrap;
line-height:13px;
text-align:center;
word-wrap:break-word;	
}
.lucida{
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
}
.submitreply{
background-image:url("/images/XsF-hka4MeB.png");
background-repeat:no-repeat;
background-position:0pt -49px;
background-color:rgb(91,116,168);
border:1px solid;
border-color:rgb(41,68,126) rgb(41,68,126) rgb(26,53,110);
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
color:#ffffff;
border-collapse:collapse;
border-spacing:0pt;
word-wrap:break-word;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
margin-left:10px;
}
.textwrite{
height:24px;min-height:24px;
background-color:transparent;border:0pt none;-moz-box-sizing:border-box;outline:0pt none;
width:100%;background:none repeat scroll 0% 0% transparent;
font-size:11px;overflow:hidden;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;resize:none;vertical-align:bottom;padding:0;cursor:default;text-align:left;border-spacing:0pt;word-wrap:break-word;line-height:1.28;margin:0;border:1px solid #6d84b4;
padding:2px;background:#ffffff;
}
.messagingshelf{
padding:8px 10px 23px;
border:1px solid rgb(204,204,204);
border-bottom:medium none;
border-left:medium none;
border-right:medium none;
background-color:rgb(242,242,242);
word-wrap:break-word;
width:450px;
height:40px;
margin-top:20px;
}
body table td{font-size:11px;vertical-align:top;}
body{font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;text-align:left;direction:ltr;}
.senderlink a:link{text-decoration:none;}
.senderlink a:visited{text-decoration:none;}
.senderlink a:active{text-decoration:underline;color:#3b5998;}
.senderlink a:hover{text-decoration:underline;color:#3b5998;}
.delall{
background-image:url("/images/zQaJhaTSUXg.png");
background-repeat:no-repeat;
background-position:-352px -54px;
background-color:rgb(91,116,168);
border-color:rgb(41,68,126) rgb(41,68,126) rgb(26,53,110);
border-width:1px;
border-style:solid;
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0px 1px 0px rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:1px 4px;
text-align:center;
vertical-align:top;
white-space:nowrap;
word-wrap:break-word;
}
.delall2{
color:#ffffff;
background:none repeat scroll 0% 0% transparent;
border:0px none;
cursor:pointer;
display:inline-block;
font-family:\'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
font-size:11px;
font-weight:bold;
margin:0px;
padding:1px 0px 2px;
white-space:nowrap;
line-height:13px;
text-align:center;
word-wrap:break-word;
}
.delsel{
    margin-left: 4px;
    background-image: url("/images/zQaJhaTSUXg.png");
    background-repeat: no-repeat;
    background-position: -352px -54px;
    background-color: rgb(91, 116, 168);
    border-color: rgb(41, 68, 126) rgb(41, 68, 126) rgb(26, 53, 110);
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-image: none;
    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    padding: 2px 6px;
    text-align: center;
    text-decoration: none;
    vertical-align: top;
    white-space: nowrap;
    cursor: pointer;
    font-weight: bold;
    vertical-align: middle;
  word-wrap: break-word;
}
.delsel:active{
 background-color: #4f6aa3;
}
.delsel2{
    color: rgb(255, 255, 255);
   background: none repeat scroll 0% 0% transparent;
    border: 0px none;
    cursor: pointer;
    display: inline-block;
    font-family: \'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
    font-size: 11px;
    font-weight: bold;
    margin: 0px;
    padding: 1px 0px 2px;
    white-space: nowrap;
    font-weight: normal;
    cursor: pointer;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    text-align: center;
    white-space: nowrap;
    cursor: pointer;
    font-weight: bold;
    word-wrap: break-word;
}

.candel{
	    margin-left: 4px;
    background-image: url("/images/zQaJhaTSUXg.png");
    background-repeat: no-repeat;
    background-position: -352px -348px;
    background-color: rgb(238, 238, 238);
    border-width: 1px;
    border-style: solid;
    border-color: rgb(153, 153, 153) rgb(153, 153, 153) rgb(136, 136, 136);
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-image: none;
    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    padding: 2px 6px;
    text-align: center;
    text-decoration: none;
    vertical-align: top;
    white-space: nowrap;
    cursor: pointer;
    color: rgb(102, 102, 102);
    font-weight: bold;
    vertical-align: middle;
    word-wrap: break-word;
}
.candel2{
	    background: none repeat scroll 0% 0% transparent;
    border: 0px none;
    color: rgb(51, 51, 51);
    cursor: pointer;
    display: inline-block;
    font-family: \'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
    font-size: 11px;
    font-weight: bold;
    margin: 0px;
    padding: 1px 0px 2px;
    white-space: nowrap;

    font-weight: normal;

    cursor: pointer;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    text-align: center;
    white-space: nowrap;

    cursor: pointer;
    color: rgb(102, 102, 102);
    font-weight: bold;

    word-wrap: break-word;
}

</style>';
$echo.='
<script type="text/javascript">
function autoGrowField2(f, max) {
   var max = (typeof max == \'undefined\')?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != \'scroll\') { f.style.overflowY = \'scroll\' }
      return;
   }
   if (f.style.overflowY != \'hidden\') { f.style.overflowY = \'hidden\' }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,\'\') ){
      f.style.height = scrollH+5+\'px\';
var maincontainer=$("#messagingshelf").css("height");
maincontainer=maincontainer.replace(/[^0-9]/g,\'\');
maincontainer=parseInt(maincontainer)+14+\'px\';
$("#messagingshelf").css("height",maincontainer);
  }

}
</script>';

include("functions/turndate_formessages.php");
function turndate2($date){$date=tod($date);
	
  return date('F j \, Y', strtotime($date));
}

include("checkforsmilies.php");

if(isset($_GET['msgid'])){
	

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$x=0;
$yk=0;
$theresultsm=array();
$bydatem=array();
$value=$_GET['sid'];

$r=mysql_query("SELECT * FROM commentsvv WHERE ((id='$value' AND id2='$uid') OR (id2='$value' AND id='$uid')) ORDER BY datetimep DESC LIMIT 50");

while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
$utiv=sb_user($m['id2']);

$message2=$m['comment'];
$message3=substr("$message2", 0, 54);
$msgid=$m['sbid'];

$bydatem[$yk]=$m['datetimep'];

$writtenbyme="";
if($m['id']==$uid){}

$sendreplyto=$_GET['sid'];

mysql_query("UPDATE commentsvv SET dread_id2=1 WHERE sbid='$msgid'");

$message2=checkforsmileys($message2);
$theresultsm[$yk]='<table id="mensaje'.$yk.'" style="width:500px;border-top:1px solid #eeeeee;border-collapse:collapse;border-spacing:0;" class="mensaje"><tr>
<td style="padding-right:3px;display:none;" class="pcheckbox"><input id="checkbox'.$yk.'" type="checkbox" style="margin-top:20px;" onclick="men('.$yk.');" class="checkb" rel="'.$msgid.'"></td><td style="vertical-align:top;width:50px;padding-top:5px;padding-bottom:5px;"><a href="/'.$uti['username'].'"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="width:50px;height:50px;"></a></td><td style="vertical-align:top;text-align:left;padding-left:3px;"><table style="text-align:left;width:325px;"><tr><td style="text-align:left;" class="senderlink"><a href="/'.$uti['username'].'"><span style="font-size:11px;white-space:nowrap;line-height:16px;color:#3b5998;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;font-weight:bold;position:relative;bottom:0px;">'.$uti['fullname'].'</span></a></td></tr><tr><td style="color:#333333;max-width:330px;word-wrap:break-word;"><span style="position:relative;bottom:0px;">'.$message2.'</span></td></tr></table></td><td style="vertical-align:top;color:rgb(170,170,170);text-align:right;width:110px;white-space:nowrap;"><span style="position:relative;top:6px;">'.turndate2($m['datetimep']).'</span></td></tr></table>';
$x++;
$yk++;
}

$echo.='

<script type="text/javascript">
function men(x){
var ischecked=$("#checkbox"+x).checked;
if(ischecked===true){
$("#mensaje"+x).css("background-color","#e6e6fa");	
}
else{
$("#mensaje"+x).css("background-color","#ffffff");		
}
}
function togglerueda(c){
if(c=="c"){
$(".actions").css("background-position","right -5px");
$(".rueda").css("background-position","-33px -30px");
$(".rueda").css("background-color","rgb(238,238,238)");
$(".actions").css("background-color","rgb(238,238,238)");
$(".actions2").css("background-color","rgb(238,238,238)");
$(".actions2").css("color","#333333");	
$(".actions").css("border","1px solid");
$(".actions").css("border-color","rgb(153,153,153) rgb(153,153,153) rgb(136,136,136)");
$("#omenu").css("display","none");	
}
else{
$(".actions").css("background-position","right -250px");
$(".rueda").css("background-position","-23px -30px");
$(".rueda").css("background-color","#6d84b4");
$(".actions").css("background-color","#6d84b4");
$(".actions2").css("background-color","#6d84b4");
$(".actions2").css("color","#ffffff");	
$(".actions").css("border","1px solid #3b5998");
$(".actions").css("border-bottom","1px solid #6d84b4");
$("#omenu").css("display","block");
}
}
function showdelmenu(){
togglerueda("c");
$("#deloptions").css("display","block");
$(".pcheckbox").css("display","table-cell");
}
function strpos (haystack, needle, offset) {
   var i = (haystack + \'\').indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
function delselected(){
	//alert(2);
var nenas="";
var killers="";
$(\'.checkb:checked\').each(function() {
                var nena=$(this).attr("rel");
				var killer=$(this).attr("id");
				killers+=killer+",";
				nenas+=nena+",";
				
        }); 

while(strpos(killers,"checkbox")!==false){
killers=killers.replace("checkbox","");
}
$.ajax({
  async: "false",
  type: "POST",
  url: "delete/del_messages.php",
  data: {msgs:nenas,sid:\''.$_GET['sid'].'\'},
  success: function(response) {
var killersv=killers.split(",");
var killersvv=killersv.length;
killersvv=killersvv-2;
var x=0;
while(x<=killersvv){
$("#mensaje"+killersv[x]).remove();
x++;
}
  }
});

}
function delall(){
$.ajax({
  async: "false",
  type: "POST",
  url: "delete/del_messages.php",
  data: {sid:\''.$_GET['sid'].'\',dellall:\' \'},
  success: function(response) {
window.location="/messages";
  }
});	
}
</script>';

$uti=sb_user($value); //get sid

$echo.='
<div class="lwr" style="padding:0;margin:0;width:500px;position:relative;"><a href="/'.$uti['username'].'/">'.$uti['fullname'].'</a>

<a class="msbtn" style="float:right;position:absolute;right:103px;line-height:0;" href="/messages"><i class="flecha"></i><span class="msbtn2" style="display:inline-block;">Messages</span></a>

<label class="actions" style="float:right;position:absolute;right:0px;cursor:pointer;z-index:4;" onclick="togglerueda();">
<i class="rueda"></i>
<input class="actions2" type="button" value="Actions" style="cursor:pointer;">
</label>

<ul style="list-style-type:none;width:150px;float:right;position:absolute;right:-61px;top:11px;display:none;z-index:2;" class="omenu" id="omenu">

<li class="itemali" onclick="showdelmenu();">Delete Messages...</li>

</ul>

</div>

<div style="background-color:rgb(254,248,203);border:1px solid rgb(222,190,0);padding:15px 15px 14px 20px;width:465px;word-wrap:break-word;margin:0;margin-top:10px;display:none;" id="deloptions">
<div style="display:inline-block;margin:0;padding:0;">
Select messages to delete.
</div>
<div style="float:right;word-wrap:break-word;position:relative;top:-5px;right:-1px;">
<label class="delall" style="position:relative;bottom:-1px;" onclick="delall();"><span class="delall2">Delete All</span></label>
<label class="delsel" style="width:100px;" onclick="delselected();"><input type="button" class="delsel2" value="Delete Selected" style="position:relative;left:0px;"></label>
<label class="candel"  style="width:45px;" onclick="canceldelmenu();"><input type="button" class="candel2" value="Cancel" style="position:relative;left:0px;"></label>
</div>

</div>

';


$echo.='<div id="headermsgs" style="padding:0;margin:0;width:500px;margin-top:20px;">';

asort($bydatem);
$yxm=0;
foreach($bydatem as $key=> $value){
$echo.= $theresultsm[$key];
$yxm++;
if($yxm=='250'){break;}
}

$echo.='</div>';

$echo.='

<script type="text/javascript">
$(".checkb").removeAttr("checked");
function canceldelmenu(){
$(".checkb").removeAttr("checked");
$(".mensaje").css("background-color","");
$(".pcheckbox").css("display","none");
$("#deloptions").css("display","none");	
}
</script>


';

$currentdir=getcwd(); 

$currentdir=str_replace('C:\\xampp\\htdocs\\','/',$currentdir);
$currentdir=str_replace('\\','/',$currentdir);
$pagename = basename($_SERVER['PHP_SELF']);
$currentdir.='/'.$pagename.'?msgid='.$_GET['msgid'].'&sid='.$_GET['sid'];

$uti=sb_user($uid);

$echo.='';

mysql_close($con);


}

else{






$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS c FROM commentsvv WHERE ((id='$uid' AND dread_id='0') OR (id2='$uid' AND dread_id2='0'))"));
$c=$c['c'];
if($c==0){
$c="";	
}

$c2=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS c FROM commentsvv WHERE ((id='$uid' AND dread_id='0' AND status_id='4') OR (id2='$uid' AND dread_id2='0' AND status_id2='4'))"));
$c2=$c2['c'];
if($c2==0){
$c2="";	
}
$echo.='
<div class="_ksg" style="margin-top:-15px;display:inline-block;">
<div class="wmMasterView">

<div class="_6jw"><ul class="uiList _281 _4ki"><li class="selectedFolder"><h3 class="_50q0"><a class="_1n inbox_select" href="#"><span class="_6xt _6qy" style=""><span>Inbox</span></span><span class="pls _1r fwn">'.$c.'</span></a></h3></li><li><h3 class="_50q0"><a class="_1n" href="#"><span class="_6xt _6qy other_select"><span>Other</span></span><span class="pls _1r fwn">'.$c2.'</span></a></h3></li><li class="_282"><h3 class="_50q0"><a class="_1n" href="#" rel="toggle" role="button"><span class="_1tyl _6qy" style="">More</span><span class="_283"></span></a></h3></li></ul></div>

<script type="text/javascript">
$(".other_select").click(function(){
$(".inbox_view").addClass("hidden_sb");
$(".other_view").removeClass("hidden_sb");
$("#move_to_other_actions").addClass("hidden_sb");
$("#move_to_inbox_actions").removeClass("hidden_sb");
$("#apply_move_to_inbox").addClass("hidden_sb");
$("#apply_move_to_other").removeClass("hidden_sb");

});
$(".inbox_select").click(function(){
$(".other_view").addClass("hidden_sb");
$(".inbox_view").removeClass("hidden_sb");
$("#move_to_inbox_actions").addClass("hidden_sb");
$("#move_to_other_actions").removeClass("hidden_sb");
$("#apply_move_to_inbox").addClass("hidden_sb");
$("#apply_move_to_other").removeClass("hidden_sb");
});
</script>
<div class="messages_resizevvv" style="width:308px;height:820px;border-right:1px solid #e8e8e8;">

<div class="_3j5"><div><div class="clearfix _4yj hidden_sb"><div class="rfloat hidden_sb"><label class="_4yk uiCloseButton uiCloseButtonSmall uiCloseButtonSmallDark" for="u_jsonp_2_2"><input title="View all messages" type="button" id="u_jsonp_2_2"></label></div>


<div></div></div></div>



<div class="_3b" data-jsid="searchInputContainer"><span class="uiSearchInputv _3c"><span><input type="text" class="inputtext dcphogc" maxlength="100" aria-label="Search" placeholder="Search" value="" style="" id="conversations_search"><button type="submit" title="Search"></button></span></span><label class="_48 uiCloseButton uiCloseButtonSmall" for="u_jsonp_2_3"><input title="Clear search" type="button" id="u_jsonp_2_3"></label></div></div>

<input autocomplete="off" type="hidden" id="conversations_search_loaded">

<script type="text/javascript">
var local_conversations_search_loaded=new Array();
var conversations_search_loaded_ax=0;
var conversations_search_drun=0;

$(document).ready(function(){

$("#conversations_search").keyup(function(e){
var dval=$(this).val();
dval=$.trim(dval);
if(e.keyCode==13 && dval!="" && dval!="Search"){
//here implement conversation load through enter precisely, a click in the node	
}
if(dval=="" || dval=="Search"){
		$("#conversations_childv").addClass("hidden_sb");
		$("#conversations_noresult").addClass("hidden_sb");
		$("#conversations_child").removeClass("hidden_sb");
		setSlider($("#conversations_keeper"));
}

if(dval!="" && dval!="Search"){
$(this).parents("._3b").addClass("_47");	
}
else{
$(this).parents("._3b").removeClass("_47");	
}

});

$("._48").bind("click",function(){
$("#conversations_search").val("");
$(this).parents("._3b").removeClass("_47");

$("#conversations_childv").addClass("hidden_sb");
$("#conversations_noresult").addClass("hidden_sb");
$("#conversations_child").removeClass("hidden_sb");

setSlider($("#conversations_keeper"));

});

$("#conversations_search").keydown(function(e){

if(dval!="" && dval!="Search"){
$(this).parents("._3b").addClass("_47");	
}
else{
$(this).parents("._3b").removeClass("_47");	
}
	
});

$("#conversations_search").autocomplete({
					appendTo: "#conversations_childv",
					autoFocus:true,
					minLength:1,
			source: function(request, response) {
				if($.trim(request.term)=="Search"){
				return false;
				}
				var localResults = $.ui.autocomplete.filter(local_conversations_search_loaded, request.term);
				var loaded=$("#conversations_search_loaded").val();
                $.ajax({
                  url: "/autocomplete/jump_note.php",
                  dataType: "json",
				  method:"post",
                  data: {
                    term : request.term,loaded:loaded,conversations:"t"
                  },
                  success: function(data) {	
				  if(localResults.length>0){ conversations_search_drun=1;
				  var output = {};
				  output=jsonConcat(output, data);
				  output=jsonConcat(output, localResults);

				  response(output);
				  }
				  else{ conversations_search_drun=0;
					response(data);  
				  }
				  }
                });
            },
	   open: function(event, ui){
				var where=$("#conversations_childv").children(".ui-autocomplete");
				$(where).addClass("zindex0important");
				
				$(where).addClass("uiList");
				$(where).addClass("_2tm ");
				$(where).addClass("_4kg");
				$(where).attr("id","wmMasterViewThreadlist");
				
				
				$(where).find("li").each(function(){
				$(this).find("li").eq(0).css("width","284px");	
				$(this).find("li").eq(0).unwrap();	
				});
				
				$("#conversations_child").addClass("hidden_sb");
				$("#conversations_childv").find(".ui-autocomplete").removeClass("hidden_sb");
				
				$(where).attr("style","display:inline-block;position:relative;border:0;");
				$(where).addClass("displayblockimportant");
				$(where).removeClass("hidden_sb");
				$("#conversations_childv").removeClass("hidden_sb");
				
				$("#conversations_noresult").addClass("hidden_sb");
				
				setSlider($("#conversations_keeper"));
			},
			close: function(event,ui){
			
			},
			select: function( event, ui ) {
				return false;
			}
				})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		
			
			if(item.yk=="-1" && conversations_search_drun==0){
				$("#conversations_childv").addClass("hidden_sb");
				$("#conversations_child").addClass("hidden_sb");
				$("#conversations_childv").find(".ui-autocomplete").addClass("hidden_sb");
				$("#conversations_childv").addClass("hidden_sb");
				$("#conversation_term").html(item.term);
$("#conversations_noresult").removeClass("hidden_sb");
setSlider($("#conversations_keeper"));
	return false;
			}
			else if(item.yk=="-1"){
			return false;	
			}
			
			var loaded=$("#conversations_search_loaded").val();
			if(strpos(loaded,item.uidv)===false){
			localArray[conversations_search_loaded_ax]=item;
			conversations_search_loaded_ax++;
			loaded=loaded+","+item.uidv;
			$("#conversations_search_loaded").val(loaded);
			}
		
			return $(\'<li></li>\').data("ui-autocomplete-item",item).append(item.response).appendTo(ul);
				
		};
});


function set_unread(org_elem){
$(org_elem).parents("li").eq(0).addClass("_kx");
$(org_elem).parents("li").eq(0).find("._18").addClass("_ky");
}
function archive_message(org_elem){
$(org_elem).parents("li").eq(0).removev();
}
</script>

<div><div id="conversations_keeper" style="max-height:779px;overflow-y:auto;display:inline-block;width:100%;" class="fader_holder">

<div id="conversations_childv" class="hidden_sb" style="display:inline-block;width:100%;">
</div>

<div id="conversations_child" style="display:inline-block;width:100%;">
<ul class="uiList _2tm _4kg" id="wmMasterViewThreadlist" role="list">';



$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$dset="";
$dsetv="";
$r=mysql_query("(SELECT * FROM commentsvv as dt WHERE id2='$uid' GROUP BY id) UNION(SELECT * FROM commentsvv as dtv WHERE id='$uid' GROUP by id2)");
while($m=mysql_fetch_array($r)){
$dset.=",".$m['id'];
$dsetv.=",".$m['id2'];
}

include("messages/conversations.php");

arsort($bydatem);
foreach($bydatem as $key=> $value){
$echo.=$theresultsm[$key];
}

$other="t";
include("messages/conversations.php");

arsort($bydatem);
foreach($bydatem as $key=> $value){
$echo.=$theresultsm[$key];
}

$echo.='</ul><img class="_4c img hidden_sb" src="/images/jKEcVPZFk-2.gif" alt="" width="32" height="32"><div class="clearfix pts uiMorePager stat_elem _2to _g6 hidden_sb"><div><a class="pam uiBoxLightblue uiMorePagerPrimary" onclick="true" href="https://www.facebook.com/messages/#">Load Older Threads<i class="mts mls arrow img sp_qdutey sx_042e95"></i></a><span class="uiMorePagerLoader pam uiBoxLightblue"><img class="img" src="/images/GsNJNwuI-UM.gif" alt="" width="16" height="11"></span></div></div></div></div><div class="hidden_sb"><div><ul class="uiList _2tm _4kg" id="wmMasterViewSearchThreadList" role="list"></ul><img class="_33y hidden_sb img" src="/images/GsNJNwuI-UM.gif" alt="" width="16" height="11"><div class="clearfix pts uiMorePager stat_elem _2to _g6 hidden_sb"><div><a class="pam uiBoxLightblue uiMorePagerPrimary" onclick="true" href="https://www.facebook.com/messages/#">Load Older Threads<i class="mts mls arrow img sp_qdutey sx_042e95"></i></a><span class="uiMorePagerLoader pam uiBoxLightblue"><img class="img" src="/images/GsNJNwuI-UM.gif" alt="" width="16" height="11"></span></div></div></div></div></div></div>


<div id="conversations_noresult" class="_2tn hidden_sb"><div>No people or conversations named <span id="conversation_term"></span></div></div>

</div>

<script type="text/javascript">
setSlider($("#conversations_keeper"));
function conversation_loading(org_elem){
$("#blank_state").addClass("hidden_sb");
$("#people_search_results").addClass("hidden_sb");

$("._2nj").removeClass("hidden_sb");
$("._1rv").val("");

$(".more_messages").attr("data-fjax_working","f"); //stopped a possible fjax query for more messages

$(".loading_messages").addClass("hidden_sb");

$("#webMessengerRecentMessages").html("");

var uidv=$(org_elem).attr("data-uidv");
var username=$(org_elem).attr("data-username");
var fullname=$(org_elem).attr("data-fullname");

$("#wmMasterViewThreadlist").find("li").removeClass("_kv");

$(org_elem).parents("li").eq(0).addClass("_kv");

$("._4rj").addClass("hidden_sb");
$("#messages_holder").addClass("hidden_sb");

$("#webMessengerHeaderName").html(\'<div><span><a id="insert_message_uidv" href="/\'+username+\'" hc="" data-uidv="\'+uidv+\'">\'+fullname+\'</a><span class="presenceListener_\'+uidv+\'"></span></span></div>\'); //uidv data referenced to load more conversations from scollbar

$("._2nj").find(".loading_big").removeClass("hidden_sb");
$("#js_7").removeClass("hidden_sb");
}

function load_more_from_conversation(event,org_elem,v){
var inprocess=$(".more_messages").attr("data-fjax_working");
if(v>70 && inprocess!="t"){
$(".more_messages").attr("data-fjax_working","t");
$(".more_messages").click();
}
}
function conversation_loaded(response,org_elem){//alert(response);
$("._2nj").find(".loading_big").addClass("hidden_sb");
$("#messages_holder").removeClass("hidden_sb");


$(".loading_messages").addClass("hidden_sb");

var res=$.parseJSON(response);
var uidv=res.uidv;
var gs=res.gs;
var gsv=res.gsv;
var remaining=res.remaining;
var finished=res.finished;
var loaded=res.loaded;

$(".be_opened_in_chat").attr("data-sbid",uidv);
$("#mark_as_unread_actions").attr("data-sbid",uidv);
$("#delete_conversation_actions").attr("fjax",\'/ajax/messages/conversation/delete.php?uidv=\'+uidv);
 
if(finished=="t"){
$(".more_messages").removeAttr("fjax");	
}
else{
$(".more_messages").attr("fjax",\'/ajax/messages/conversation.php?uidv=\'+uidv+\'&gs=\'+gs+\'&gsv=\'+gsv);
}
$(".messages_remaining").html(remaining);

$("#webMessengerRecentMessages").prepend(res.response);

$(".more_messages").attr("data-fjax_working","t");
if(res.started=="t"){
setSlider($("#messages_holder"),"50px","bottom","load_more_from_conversation");
}
else{
setSlider($("#messages_holder"),"50px","same","load_more_from_conversation");
}
$(".more_messages").attr("data-fjax_working","f"); //stopped a possible fjax query for more messages
}

function moremessages_loading(org_elem){
$(".loading_messages").removeClass("hidden_sb");
$(".more_messages").attr("data-fjax_working","t");
}
</script>

<div class="_2nj" style="display:inline-block;width:540px;position: static;">

<div class="_3db">
<div class="clearfix"><div class="lfloat delete_messages_text hidden_sb" style="margin-top:20px;position:relative;left:10px;color:#333333;">Select messages to delete.</div><div class="lfloat move_to_others_text hidden_sb" style="margin-top:20px;position:relative;left:10px;color:#333333;">Select messages to move to other.</div><div class="_2nd rfloat" style="margin-top:20px;"><div><span class="uiButtonGroup uiButtonGroupOverlay" id="u_jsonp_2_p"><span class="firstItem uiButtonGroupItem buttonItem"><label class="_3mv uiButton uiButtonOverlay new_message_toggler" for="u_jsonp_2_q"><i class="mrs img sp_33vokw sx_21d2c9"></i><input value="New Message" type="submit" id="u_jsonp_2_q"></label></span><span class="uiButtonGroupItem selectorItem"><div class="uiSelector inlineBlock uiSelectorRight uiSelectorNormal uiSelectorUseLayer"><div class="wrap"><a class="uiSelectorButton uiButton" href="#" role="button" aria-haspopup="1" data-label="Actions" data-length="30" rel="toggle"><i class="mrs img sp_33vokw sx_81f381"></i><span class="uiButtonText">Actions</span></a><div class="uiSelectorMenuWrapper uiToggleFlyout"><div role="menu" class="uiMenu uiSelectorMenu"><ul class="uiMenuInner"><li class="uiMenuItem hidden_sb"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Mark as Read</span></span></a></li><li class="uiMenuItem"><a id="mark_as_unread_actions" class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Mark as Unread</span></span></a></li><li class="uiMenuItem"><a class="itemAnchor be_opened_in_chat" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Open in Chat</span></span></a></li><li class="uiMenuItem hidden_sb"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Create Group...</span></span></a></li><li class="uiMenuSeparator"></li><li class="uiMenuItem"><a class="itemAnchor doc_click" role="menuitem" tabindex="-1" href="#" id="delete_messages_actions"><span class="itemLabel fsm"><span>Delete Messages...</span></span></a></li><li class="uiMenuSeparator"></li><li class="uiMenuItem hidden_sb"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Add People...</span></span></a></li><li class="uiMenuItem hidden_sb"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Leave Conversation...</span></span></a></li><li class="uiMenuItem"><a class="itemAnchor doc_click" role="menuitem" tabindex="-1" href="#" id="delete_conversation_actions"><span class="itemLabel fsm"><span>Delete Conversation...</span></span></a></li><li class="uiMenuItem hidden_sb"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Unmute Conversation...</span></span></a></li><li class="uiMenuItem hidden_sb"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Move to Inbox</span></span></a></li><li class="uiMenuItem"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#" id="move_to_other_actions"><span class="itemLabel fsm"><span>Move to Other</span></span></a><a class="itemAnchor hidden_sb" role="menuitem" tabindex="-1" href="#" id="move_to_inbox_actions"><span class="itemLabel fsm"><span>Move to Inbox</span></span></a></li><li class="uiMenuItem"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Archive</span></span></a></li><li class="uiMenuItem hidden_sb"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Unarchive</span></span></a></li><li class="uiMenuItem hidden_sb"><a class="itemAnchor" role="menuitem" tabindex="-1" href="#"><span class="itemLabel fsm"><span>Not Spam</span></span></a></li></ul></div></div></div></div></span><span class="lastItem uiButtonGroupItem buttonItem"><label class="_4a_j hidden_sb lastItem uiButton uiButtonOverlay uiButtonNoText" for="u_jsonp_2_r"><i class="mrs img sp_33vokw sx_58a2e3"></i><input value="" type="submit" id="u_jsonp_2_r"></label></span></span><input type="text" class="inputtext _4a_i hidden_sb DOMControl_placeholder" placeholder="Search in this conversation" maxlength="170" value="Search in this conversation" aria-label="Search in this conversation" style=""></div></div><div class="_3db"><div class="clearfix _r6"><a data-hover="tooltip" aria-label="Back to message" data-tooltip-position="left" class="_1ue rfloat uiCloseButton uiCloseButtonDark hidden_sb" href="#" role="button" title="Back to message"></a><div><h2 class="_r7" id="webMessengerHeaderName" style="max-width: 266px; font-size: 16px;"></h2><div class="_2u_"><label class="_2wa uiCloseButton" for="u_jsonp_2_e"><input title="Add People" type="button" id="u_jsonp_2_e"></label><label class="_1vq uiCloseButton" for="u_jsonp_2_f"><input title="Edit Conversation Name" type="button" id="u_jsonp_2_f"></label></div><div class="_50k7 fsm fwn fcg hidden_sb"></div></div></div></div></div>


<div class=""><div class="_4wo"><table class="uiGrid _4wq" cellspacing="0" cellpadding="0" style="margin-left:1px;"><tbody><tr><td class="vMid _4wr">To:</td><td class="vMid _4wp"><div class="clearfix uiTokenizer uiInlineTokenizer"><div class="tokenarea hidden_elem"></div><div class="uiTypeahead" id="js_18"><div class="wrap"><input type="hidden" autocomplete="off" class="hiddenInput" value=""><div class="innerWrap">

<div style="width:420px;display:inline-block;margin-bottom:5px;position:relative;top:4px;">
<div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;" class="inputtext dcphogc" data-ac_enable="people_search" data-ac_liwidth="198" data-ac_custom_f="focus_again" data-ac_custom_f_r="check_if_empty" data-ac_inputw="112" data-ac_url="/autocomplete/jump_note.php" data-ac_inputa="font-size:13px;" data-ac_style="with_pic" data-ac_placeholder="Name or email" data-ac_search_people_messages="t"></div>
</div>

</div></div></div></div></td></tr></tbody></table></div></div>

<input type="hidden" id="new_uidv" autocomplete="off">
<input type="hidden" id="people_search_loaded">

<script type="text/javascript">
$("#move_to_other_actions,#move_to_inbox_actions").bind("click",function(){
 $("#cancel_delete_messages").click();
if($(".move_to_other").length>0){
$(".move_to_other").removeClass("hidden_sb");
$(".move_to_others").removeClass("hidden_sb");
$(".move_to_others_text").removeClass("hidden_sb")
$("#js_7").addClass("hidden_sb");
$("#move_to_others_wrapper").removeClass("hidden_sb");
}
else{
return true;
}
});

$("#delete_messages_actions").bind("click",function(){
if($(".delete_message").length>0){
 $("#cancel_move_to_others").click();
$(".delete_message").removeClass("hidden_sb");
$(".delete_messages").removeClass("hidden_sb");
$(".delete_messages_text").removeClass("hidden_sb")
$("#js_7").addClass("hidden_sb");
$("#delete_messages_wrapper").removeClass("hidden_sb");
}
else{
return true;
}
});

var tosend=false;

function check_if_empty(){
var dtags=$("#tagspeople_search").val();
if(dtags==""){
tosend=false;	
$("#js_7").addClass("hidden_sb");
}
}

var tosend_ax=0;

$(document).on("click","#mark_as_unread_actions",function(){
var uidv=$(this).attr("data-sbid");
$(".unread_conversations_left[data-sbid="+uidv+"]").click();	
});

$(document).on("click",".be_opened_in_chat",function(){
var uidv=$(this).attr("data-sbid");
populate_window("",uidv);
$("#macc"+uidv).click();
});

function focus_again(ui){
	$.doTimeout(0,function(){
$("#tagpeople_search").focus();
$("#people_search_results").addClass("hidden_sb");
$("#blank_state").removeClass("hidden_sb");
$("._kv").removeClass("_kv");

$(".be_opened_in_chat").attr("data-sbid",ui.uidv);

var uidv=ui.uidv;

if(tosend){
tosend[tosend_ax]=uidv;
tosend_ax++;
}
else{
tosend=new Array();
tosend_ax=0;
tosend[tosend_ax]=uidv;
tosend_ax++;	
}

$("#js_7").removeClass("hidden_sb");
	});
	
}

$(".conversaciones").on("click",function(){
tosend=new Array();
tosend_ax=0;
alert($(this).attr("data-uidv"));
tosend[tosend_ax]=$(this).attr("data-uidv");
});

var people_search_drun=0;
var people_search_loaded_ax=0;
</script>

<div class="_2nb">

<div class="clearfix">
<div class="_4rj"><div class="_4rh"><div class="_4rk">No Conversation Selected</div><div class="lb"><a id="new_message_toggler" class="new_message_toggler">New Message</a><span class="_4rl">&#183;</span><a>Show Unread</a></div></div></div>
</div>


</div>

<script type="text/javascript">
$(".new_message_toggler").bind("click",function(){
$("._2nj").addClass("blankComposeState");	
$("._4rj").addClass("hidden_sb");
$("#tagpeople_search").focus();
});
</script>

<div class="uiScrollableArea _2nc nofade uiScrollableAreaWithShadow hidden_sb" id="blank_state" style="width: 540px; height: 680px;background:#f2f2f2;"></div>
<div style="width:540px;" class="hidden_sb" id="people_search_results"></div>

<div style="width:540px;height: 723px;" id="messages_resize" class="messages_resize">

<div class="loading_big hidden_sb" style="position:relative;top:250px;margin:0 auto;"></div>
<div class="loading_messages hidden_sb" style="text-align:center;width:100%;color:#3b5998;position:relative;top:15px;">Loading older messages (<span class="messages_remaining"></span>)<i class="loading"></i></div>

<div id="messages_holder" class="fader_holder hidden_sb messages_resizev" style="min-height:723px;max-height:723px;overflow-y:auto;display:inline-block;width:100%;">


<div class="more_messages hidden_sb" data-a_id="conversaciones" fjax="" data-a_starts="moremessages_loading" data-a_custom_f="conversation_loaded"></div>

<div class="clearfix">
<div class="_2nb messages_resizevv" style="position:relative;line-height: 723px;">

<div style="width:530px;display: inline-block;line-height: 1.28;vertical-align: bottom;" id="messages_inner">

<ul class="uiList _2ne _4kg" id="webMessengerRecentMessages">

</ul>

</div>

</div>

</div>

</div>

</div>

</div>';
include("components/emotes.php");

$echo.='
<div class="_2ak"><div class="clearfix _2al hidden_sb"><span class="_42 lfloat fsl fwb"><span class="_45">Select messages to forward</span><span class="_46">Select messages to delete</span><span class="_6zs">Select messages to mark as spam</span></span><div class="rfloat"><a class="mrs uiButton" href="#" role="button"><span class="uiButtonText">Cancel</span></a><a class="_44 uiButton uiButtonConfirm" href="#" role="button"><span class="uiButtonText">Delete</span></a><a class="_43 uiButton uiButtonConfirm" href="#" role="button"><span class="uiButtonText">Forward</span></a><a class="_6zt uiButton uiButtonConfirm" href="#" role="button"><span class="uiButtonText">Mark Spam</span></a></div></div>

<div id="delete_messages_wrapper" class="rfloat hidden_sb">
<a class="_44 uiButton uiButtonConfirm" href="#" role="button" id="apply_delete_messages"><span class="uiButtonText fcw">Delete</span></a>
<a class="_44 uiButton" href="#" role="button" id="cancel_delete_messages"><span class="uiButtonText">Cancel</span></a>
</div>

<div id="move_to_others_wrapper" class="rfloat hidden_sb">
<a class="_44 uiButton uiButtonConfirm" href="#" role="button" id="apply_move_to_others"><span class="uiButtonText fcw">Move to Other</span></a>
<a class="_44 uiButton uiButtonConfirm" href="#" role="button" id="apply_move_to_inbox"><span class="uiButtonText fcw">Move to Inbox</span></a>
<a class="_44 uiButton" href="#" role="button" id="cancel_move_to_others"><span class="uiButtonText">Cancel</span></a>
</div>

<script type="text/javascript">
$("#apply_delete_messages").bind("click",function(){

var todelete_ax=0;
var sbid=new Array;

$(".delete_message_input").each(function(){
if($(this).is(":checked")){
sbid[todelete_ax]=$(this).attr("data-sbid");
todelete_ax++;	
$(this).parents(".webMessengerMessageGroup").prev("li").eq(0).remove();
$(this).parents(".webMessengerMessageGroup").eq(0).remove();
}
});

$(sbid).each(function(k,v){
	//alert(k+":"+v);
});

$.ajax({
  async: "false",
  type: "POST",
  url: "/ajax/messages/delete.php",
  data: {sbid:sbid}}).done(function(response){ //tosend is a global variable ketp from what is chosen from name or email
  
  });
  $("#cancel_delete_messages").click();
});
$("#cancel_delete_messages").bind("click",function(){
$(".delete_message").addClass("hidden_sb");
$(".delete_messages").addClass("hidden_sb");
$(".delete_messages_text").addClass("hidden_sb");
$("#delete_messages_wrapper").addClass("hidden_sb");
$("#js_7").removeClass("hidden_sb");
$(".delete_message_input").attr("checked",false);
});

$("#apply_move_to_others,#apply_move_to_inbox").bind("click",function(){

var todelete_ax=0;
var sbid=new Array;

$(".move_to_other_input").each(function(){
if($(this).is(":checked")){
sbid[todelete_ax]=$(this).attr("data-sbid");
todelete_ax++;	
$(this).parents(".webMessengerMessageGroup").prev("li").eq(0).remove();
$(this).parents(".webMessengerMessageGroup").eq(0).remove();
}
});

$(sbid).each(function(k,v){
	//alert(k+":"+v);
});

if($(this).attr("id")=="apply_move_to_others"){
var durl="/ajax/messages/move_to_other.php";	
}
else{
var durl="/ajax/messages/move_to_inbox.php";	
}
$.ajax({
  async: "false",
  type: "POST",
  url: durl,
  data: {sbid:sbid}}).done(function(response){ //tosend is a global variable ketp from what is chosen from name or email
  
  });
  $("#cancel_move_to_others").click();
});

$("#cancel_delete_messages").bind("click",function(){
$(".delete_message").addClass("hidden_sb");
$(".delete_messages").addClass("hidden_sb");
$(".delete_messages_text").addClass("hidden_sb");
$("#delete_messages_wrapper").addClass("hidden_sb");
$("#js_7").removeClass("hidden_sb");
$(".delete_message_input").attr("checked",false);
});

$("#cancel_move_to_others").bind("click",function(){
$(".move_to_other").addClass("hidden_sb");
$(".move_to_others").addClass("hidden_sb");
$(".move_to_others_text").addClass("hidden_sb");
$("#move_to_others_wrapper").addClass("hidden_sb");
$("#js_7").removeClass("hidden_sb");
$(".move_to_other_input").attr("checked",false);
});
</script>

<div class="_1rs _52mw _1rh hidden_sb" id="js_7"><div class="_2pt"><div class="_1s5" style="left: 495px;"><div class="emoticonsPanel messagesemoticon"><div class="emote" id="emote1" style="display: block;float: none;position: relative;"></div><div class="emotesw" style="display:none;" id="emotesw1" data-yk="1"><table class="emoteswv"><tr><td>'.$emotes.'</td></tr></table><div class="panelFlyoutArrow"></div></div><div class="panelFlyout uiToggleFlyout"><table class="emoticonsTable"><tbody><tr><td class="panelCell"><a class="emoticon emoticon_smile" aria-label="smile" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_frown" aria-label="frown" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_tongue" aria-label="tongue" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_grin" aria-label="grin" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_gasp" aria-label="gasp" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_wink" aria-label="wink" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_pacman" aria-label="pacman" href="#"></a></td></tr><tr><td class="panelCell"><a class="emoticon emoticon_grumpy" aria-label="grumpy" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_unsure" aria-label="unsure" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_cry" aria-label="cry" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_kiki" aria-label="kiki" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_glasses" aria-label="glasses" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_sunglasses" aria-label="sunglasses" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_heart" aria-label="heart" href="#"></a></td></tr><tr><td class="panelCell"><a class="emoticon emoticon_devil" aria-label="devil" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_angel" aria-label="angel" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_squint" aria-label="squint" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_confused" aria-label="confused" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_upset" aria-label="upset" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_colonthree" aria-label="colonthree" href="#"></a></td><td class="panelCell"><a class="emoticon emoticon_like" aria-label="like" href="#"></a></td></tr></tbody></table><div class="panelFlyoutArrow"></div></div></div></div><div class="_1rt"><textarea class="uiTextareaNoResize uiTextareaAutogrow _1rv dcphogc" aria-controls="webMessengerRecentMessages" aria-describedby="webMessengerHeaderName" aria-owns="wmMasterViewThreadlist" name="message_body" role="combobox" rows="3" aria-label="Write a reply..." placeholder="Write a reply..." aria-activedescendant="recent:user:733469152"></textarea><div class="pam hidden_sb _1ru uiBoxYellow topborder">Uploading attachments...</div></div><div class="_2pu"><div><div class="_2v0 _2qh hidden_sb"><label class="_2v3 uiCloseButton uiCloseButtonSmall uiCloseButtonSmallDark" for="u_0_k"><input title="Remove" type="button" id="u_0_k"></label><div class="_2v1"></div></div><div class="_2v2 _2qh"><img class="uiLoadingIndicatorAsync img" src="https://fbstatic-a.akamaihd.net/rsrc.php/v2/yb/r/GsNJNwuI-UM.gif" alt="" width="16" height="11"></div></div><div></div><div class="_2qh hidden_sb"><span class="_2pw"></span><label class="uiCloseButton uiCloseButtonSmall uiCloseButtonSmallDark" for="u_0_l"><input title="Remove" type="button" id="u_0_l"></label><div class="_26q"></div></div></div><div class="fbScrollableArea fbVaultEditableGrid fade hidden_sb" style="height:105px;" id="u_0_j"><div class="fbScrollableAreaWrap"><div class="fbScrollableAreaBody" style="height:105px;"><div class="fbScrollableAreaContent"><div class="_577"></div><input type="hidden" name="vault_share_source" value="messenger"></div></div></div><div class="fbScrollableAreaTrack invisible_elem"><div class="fbScrollableAreaGripper hidden_sb"></div></div></div></div><div class="_1rw"><div class="_1r-" style=""><a class="_1r_" tabindex="1" href="#"><span class="_3da _6qy" style="">Press Enter to send</span><span class="_1s0"></span></a><label class="_1ri uiButton uiButtonConfirm" for="u_0_m" id="js_2"><input value="Reply" type="submit" id="u_0_m" class="_1qp5" tabindex=""></label><img class="_1s1 hidden_sb img" src="https://fbstatic-a.akamaihd.net/rsrc.php/v2/yb/r/GsNJNwuI-UM.gif" alt="" width="16" height="11"></div></div></div></div></div></div>

<div class="overflow_measurement"></div>

</div>

<script type="text/javascript">
$(window).resize(function() {
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
if(y>=1058){
var availhv=723; //default
var availhvv=779;
var availhvvv=820;
}
else{
var availhv=y-340; //trying to fit on screen 971 - 723 = 248

if(availhv<300){ //minimum
availhv=300;
}

var availhvv=availhv+56; // difference in between 779 and 723
var availhvvv=availhv+93; //difference in between 820 and 723

}

$(".messages_resize").css("height",availhv+"px"); //default
$(".messages_resizev").css("min-height",availhv+"px"); //default
$(".messages_resizev").css("max-height",availhv+"px"); //default
$(".messages_resizevv").css("line-height",availhv+"px"); //default
$(".messages_resizevvv").css("height",availhvvv+"px");

$("#conversations_keeper").css("max-height",availhvv+"px");

setSlider($("#messages_holder"),"50px","same","load_more_from_conversation");
setSlider($("#conversations_keeper"));

var doffset=$(".overflow_measurement").offset().top;
if(doffset>availhv && y<doffset){
$("body").removeClass("noscroll");
}
else{
$("body").addClass("noscroll");
}

});

$(document).ready(function(){
$(window).trigger("resize");
});

$("._1ri").bind("click",function(){
var comment=$(this).parents("._1rs").find("textarea").val();
var js_id=retcount();

var uidv=$("#insert_message_uidv").attr("data-uidv");
alert(tosend);
$.ajax({
  async: "false",
  type: "POST",
  url: "/ajax/messages/insert.php",
  data: {comment:comment,duidv:tosend}}).done(function(response){ alert(response);
  //tosend is a global variable ketp from what is chosen from name or email
	  var res=$.parseJSON(response);
	  var sbid=res.sbid;
	  $("#msg"+js_id).attr("id","msg"+sbid);
	  $("#msg"+sbid).parents(".webMessengerMessageGroup").find(".delete_messages_input").attr("data-sbid",sbid);
	  $("#msg"+sbid).parents(".webMessengerMessageGroup").find(".delete_messagev").addClass("delete_message");
	  $("#msg"+sbid).parents(".webMessengerMessageGroup").find(".delete_messagev").removeClass("delete_messagev");
	  $("#msg"+sbid).parents(".webMessengerMessageGroup").find(".move_to_others_input").attr("data-sbid",sbid);
	  $("#msg"+sbid).parents(".webMessengerMessageGroup").find(".move_to_otherv").addClass("move_to_other");
	  $("#msg"+sbid).parents(".webMessengerMessageGroup").find(".move_to_otherv").removeClass("move_to_otherv");
	 });


$(this).parents("._1rs").find("textarea").val("");
var hour_min=hour_min_function();

var lastdate=$("#webMessengerRecentMessages").find(".current_message_timestamp:last").attr("data-current_date");
var currentdate=daymonthyear_function();

if(lastdate!=currentdate){
var dclassv="";	
}
else{
var dclassv="hidden_sb";	
}';

$uti=sb_user($uid);

$echo.='
var unix_timestamp=Math.round(new Date().getTime() / 1000);
var ncomment=\'<li class="_2n3"><abbr data-current_date="\'+currentdate+\'" data-utime="\'+unix_timestamp+\'" class="timestamp \'+dclassv+\' current_message_timestamp" data-jsid="timestamp">Today</abbr></li><li class="webMessengerMessageGroup clearfix" data-uidv="'.$uid.'"><div class="delete_messagev hidden_sb"><input class="delete_message_input" type="checkbox" data-sbid=""></div><div class="move_to_otherv hidden_sb"><input class="move_to_other_input" type="checkbox" data-sbid=""></div><div class="_yh lfloat"><input type="checkbox"></div><div class="clearfix"><div class="_2w7 _8o _8t lfloat"><a href="/'.$uid_a['username'].'" class="_50dv"><img class="_s0 _rx img" src="/users/'.$uid.'/pics/'.$uti['profilepict'].'" alt=""></a></div><div class="clearfix _8m _42ef"><div class="rfloat"><span></span><a class="hidden_sb mrs _9k" aria-label="Sent from chat" data-hover="tooltip"><img class="img _9h" data-t_text="Sent from chat" data-t_topleft="t" src="/images/-PAXP-deijE.gif" alt="" width="1" height="1"></a><a class="_b9" data-hovercard-instant="1"><i class="_ba hidden_sb img sp_4tnflm sx_eeb853"></i><abbr title="Today" data-utime="\'+unix_timestamp+\'" class="_35 timestamp">\'+hour_min+\'</abbr></a><div class="_39"><a class="hidden_sb" href="#" rel="dialog" role="button">Expand</a></div><div class="_3a"><a class="hidden_sb" href="#">Show Images</a></div></div><div><strong class="_36 lb"><a href="/'.$uti['username'].'" hc="">'.$uti['fullname'].'</a></strong><div class="_37"><strong></strong><div class="_53" id="msg\'+js_id+\'"><div class="_3hi"><div class="_1yr"><span class="_2oy"></span><span></span></div><div class="_38 direction_ltr"><p>\'+comment+\'</p></div></div></div><div class="_sq"></div><ul class="uiList _2s4 _4kg _6-h _6-j _4kt hidden_sb"></ul></div></div></div></div></li>\';

$("#webMessengerRecentMessages").append(ncomment);
setSlider($("#messages_holder"),"50px","bottom","load_more_from_conversation");
});

$("._1rv").bind("keydown",function(e){
if(e.keyCode==13){
var display=$("._1ri").css("display");
if(display=="none"){
$("._1ri").click();	
e.preventDefault();
}
}
});

$("._1rv").bind("keyup",function(e){
if(e.keyCode==13){
var display=$("._1ri").css("display");
if(display=="none"){
e.preventDefault();
}
}
});


$("._1r_").bind("click",function(){
if($(this).parents("#js_7").eq(0).hasClass("_1rh")){
$("._1ri").animate({width: "hide"},175);
$(this).parents("#js_7").eq(0).removeClass("_1rh");	
}
else{
$("._1ri").animate({width: "show"},175);	
$(this).parents("#js_7").eq(0).addClass("_1rh");	
}
});
</script>
';

mysql_close($con);
}
$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params["body_class"]="nominheight noscroll";
$params['layout']='no_columns_no_borders';
$params['left_link_n']='message';


include("end.php");
?>