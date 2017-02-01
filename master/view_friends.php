<?php
include("start.php");

include("populate_page.php");

$echo.='
<script type="text/javascript">
function submitf(w){
document.forms[w].submit();
}
function autoGrowField(f, max) {
   var max = (typeof max == \'undefined\')?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != \'scroll\') { f.style.overflowY = \'scroll\' }
      return;
   }
   if (f.style.overflowY != \'hidden\') { f.style.overflowY = \'hidden\' }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,\'\') ){
      f.style.height = scrollH+5+\'px\';
   }
}



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
var maincontainer=$("#pop_container").css("height");
maincontainer=maincontainer.replace(/[^0-9]/g,\'\');
var container1=$("#div_dialog_body").css("height");
container1=container1.replace(/[^0-9]/g,\'\'); 
maincontainer=parseInt(maincontainer)+17+\'px\';
container1=parseInt(container1)+17+\'px\';
$("#pop_container").css("height",maincontainer);
$("#div_dialog_body").css("height",container1);
  }

}
</script>';
$params['style']='
<style type="text/css">
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
.isfriend{
cursor:default;
margin-left:0;
background-image:url("/images/XsF-hka4MeB.png");
background-repeat:no-repeat;
background-position:0px -98px;
background-color:rgb(238,238,238);
border:1px solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:2px 6px;
padding-right:5px;
padding-bottom:3px;
text-align:center;
vertical-align:top;
white-space:nowrap;
color:rgb(51,51,51);
word-wrap:break-word;
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
body table td{font-size:11px;vertical-align:top;}
.senderlink a:link{text-decoration:none;}
.senderlink a:visited{text-decoration:none;}
.senderlink a:active{text-decoration:underline;color:#3b5998;}
.senderlink a:hover{text-decoration:underline;color:#3b5998;}
.searchwrapper{
padding:6px;7px;6px;5px;border:1px solid rgb(204,204,204);background-color:rgb(242,242,242);border-bottom:medium none;border-left:medium none;border-right:medium none;word-wrap:break-word;width:494px;height:25px;
}
.searchbyfilter{
background-image:url("/images/XsF-hka4MeB.png");
background-repeat:no-repeat;
background-position:right 0pt;
max-width:169px;
padding-right:23px;
vertical-align:top;
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
white-space:nowrap;
color:rgb(51,51,51);
word-wrap:break-word;
height:16px;
}
.actualsearch{background-color:#ffffff;border:1px solid rgb(189,199,216);-moz-box-sizing:border-box;outline:0 none;width:350px;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size:11px;
margin:0;
padding:3px;
padding-bottom:4px;
text-align:left;
word-wrap:break-word;
color:rgb(119,119,119);
height:23px;
padding-top:0;
padding-bottom:0;
}
.showmutual{
text-align:left;
padding-left:20px;
line-height:18px;
position:relative;
top:-2px;
border-top:1px solid #ffffff;
border-bottom:1px solid #ffffff;
}
.showmutual:hover{
text-align:left;
padding-left:20px;
line-height:18px;
position:relative;
top:-2px;
background-color:#6d84b4;
color:#ffffff;
border-top:1px solid #3b5998;
border-bottom:1px solid #3b5998;
}
.searchbyname{
text-align:left;
padding-left:20px;
line-height:18px;
position:relative;
top:-2px;
left:-3px;
background:url("/images/6NHt8H5uyPf.png") no-repeat scroll left 5px transparent;
font-weight:bold;
border-top:1px solid #ffffff;
border-bottom:1px solid #ffffff;
width:118px;
}
.searchbyname:hover{
text-align:left;
padding-left:20px;
line-height:18px;
position:relative;
top:-2px;
left:-3px;
background:url("/images/6NHt8H5uyPf.png") no-repeat scroll left 5px transparent;
font-weight:bold;
background-color:#6d84b4;
color:#ffffff;
border-top:1px solid #3b5998;
border-bottom:1px solid #3b5998;
width:118px;
}
.filterwrapper{
border-width:1px 1px 2px;
border-style:solid;
border-color:rgb(119,119,119) rgb(119,119,119,) rgb(41,62,106);
-moz-border-colors:none;
background-color:#ffffff;
padding:3px 0pt 4px;
overflow-y:auto;
font-size:11px;
text-align:left;
border-collapse:collapse;
word-wrap:break-word;
width:135px;
position:absolute;
z-index:1;
}
.wrapperwrap{
position:relative;
top:-9px;
right:-6px;
}
</style>';;
$echo.='
<script type="text/javascript">
function if_empty(){
var tocheck=$("#dquery").val();
if((tocheck=="Search") || (tocheck=="")){$("#dquery").css("color","#666666");}
if(tocheck==""){$("#dquery").css("color","#666666"); $("#dquery").val("Search");}
}
function if_empty2(value){
theval=document.getElementById(value).val();
if(theval==""){document.getElementById(value).val("Search");}
else if(theval=="Search"){document.getElementById(value).val("");}
}

function close_menu(){
$("#searchbyfilter").css("background-color","none");
$("#searchbyfilter").css("background-position","right 0px");
$("#searchbyfilter").css("border-color","rgb(153,153,153) rgb(153,153,153) rgb(136,136,136)");
$("#searchbyfilter").css("color","");
$("#filterwrapper").css("display","none");
$("#menustate").val("closed");
}
function toggle_menu(){
var menustate=$("#menustate").val();
if(menustate=="closed"){
$("#searchbyfilter").css("background-color","#6d84b4");
$("#searchbyfilter").css("background-position","right -196px");
$("#searchbyfilter").css("border-color","#3b5998 #3b5998 #6d84b4");
$("#searchbyfilter").css("color","#ffffff");
$("#filterwrapper").css("display","block");
$("#menustate").val("open");
}
else{
$("#searchbyfilter").css("background-color","none");
$("#searchbyfilter").css("background-position","right 0px");
$("#searchbyfilter").css("border-color","rgb(153,153,153) rgb(153,153,153) rgb(136,136,136)");
$("#searchbyfilter").css("color","");
$("#filterwrapper").css("display","none");
$("#menustate").val("closed");
}
}
</script>';

$bydate=array();
$theresults=array();
$x=0;


$uti=sb_user($uidv);

$echo.='<div style="margin-left:20px;">';

$echo.='<div class="profileheader" style="margin-bottom:5px;">
<div style="float:right;">
</div>
<div class="profileheadermain" style="width:513px;">
<h1>
<span class="h1h">'.$uti['fullname'].'</span><i class="profileheader_i"></i><span class="h1h">Friends</span>
</h1>
</div>

</div>';

$b_qf=return_bq("friendsv");

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id2='$uidv' AND FIND_IN_SET(id,'$which_friends_comma')>0 $b_qf LIMIT 1"));
$c=$c['c'];

if($c==0){
	$echo.='<div class="fbTimelineSection mtm _e2"><div class="pbm" id="pagelet_friends" data-referrer="pagelet_friends"><table class="uiGrid fbFriendsNullstate" cellpadding="0" cellspacing="0"><tbody><tr><td class="vTop prs imageCell"><img class="img" src="/images/uo6orchdnU1.png" alt="" height="32" width="32"></td><td class="vMid textCell"><span class="fsl">There are no friends to show. ';
	if($uid==$uidv){$echo.='<div class="lb"><a href="/find_friends.php">Find Friends</a></div>';}	
	$echo.='</span></td></tr></tbody></table></div></div>';
	}else{
$echo.='<div class="searchwrapper" id="searchwrapper">
<input id="menustate" type="hidden" value="closed">
<div class="searchbyfilter" style="padding-right:20px;" id="searchbyfilter"  onclick="toggle_menu();"><span style="position:relative;bottom:-1px;" id="textfilter">Search by Name</span></div>
<input type="text" id="thesearch" name="thesearch" onKeyUp="checksearch_friends(this.value);" class="actualsearch" onClick="close_menu();">
</div>
<div class="wrapperwrap"><div class="filterwrapper" id="filterwrapper" style="display:none;"><div id="showmutual" class="showmutual" onClick="showmutual();" style="cursor:pointer;">Mutual Friends</div>
<div id="searchbyname" class="searchbyname" onClick="showbyname();" style="cursor:pointer;">Search by name</div><input type="hidden" id="whichone" value="showbyname">
</div></div>
<div id="main2" name="main2" onClick="close_menu();" style="padding:0;margin:0;display:inline;">
<script type="text/javascript">
if(thesearch_friends===undefined){
var thesearch_friends="t";
$(document).on("click",function(e){
	if(e.pageX!==undefined && $("#menustate").val()=="open"){
	var se=e.target;
	if($(se).parents(".searchbyfilter").eq(0).length==0 && $(se).parents(".wrapperwrap").eq(0).length==0 && $(se).hasClass("searchbyfilter")===false){
	$(".searchbyfilter").click();
	}
	}
});
}
$("#menustate").val("closed");
$("#whichone").val("showbyname");

function addfriendajax(w,yk){
var thesend=\'uidv=\'+w;
var xmlhttp;
if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
var response=xmlhttp.responseText;
if(response.length>0){
	$("#addfbv"+yk).css("display","none");
	$("#addfb"+yk).css("padding-left","3px");
	$("#addfb"+yk).val("Friend Request Sent");
}
}
  }
xmlhttp.open("POST","../addfriend.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(thesend);
}
</script>';
	}
	
$currentdir=getcwd(); 
$uidv=basename($currentdir); 

$uidv=$_SERVER['REQUEST_URI'];

$uidvv=explode("/",$uidv);
$uidv=$uidvv[1];

$r=mysql_query("SELECT * FROM registered where id='$uidv'");
while($ms=mysql_fetch_array($r)){
$flagtu='t';	
$unv=$uidv;
}

if(!isset($flagtu)){
$r=mysql_query("SELECT * FROM registered where username='$uidv'");
while($ms=mysql_fetch_array($r)){
$uidv=$ms['id'];
$unv=$ms['username'];	
}
}




$flag='n';

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$sortalpha=array();
$yk=0;
$gs=0;


$b_qf=return_bq("friendsv"); //special friends privacy query filter to apply to table in the query to regis

$r=mysql_query("SELECT * FROM registered WHERE FIND_IN_SET(id,'$which_friends_comma')>0 $b_qf ORDER BY f_name LIMIT $gs,50");
$c=mysql_num_rows($r);

if($c==0){
$r=mysql_query("SELECT * FROM friends WHERE id='$uidv' AND confirmed='y' AND FIND_IN_SET(id2,'$uid_friends_comma')>0");
$mutual_only="t";
}

while($m=mysql_fetch_array($r))
  {
$uti=sb_user($m['id']);

$echo.='<table style="width:506px;border-top:1px solid #eeeeee;border-collapse:collapse;border-spacing:0;" class="fullname" id="fullnamev'.$yk.'"><tr><td style="vertical-align:top;width:50px;padding-top:10px;padding-bottom:5px;"><a href="/'.$uti['username'].'"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="width:50px;height:50px;"></a></td><td style="vertical-align:top;text-align:left;padding-left:3px;width:350px;padding-top:10px;" class="senderlink"><div style="margin-left:4px;"><div class="fwb fsl lb"><a hc="" href="/'.$uti['username'].'" id="fullname'.$yk.'">'.$uti['fullname'].'</a></div></div></td><td style="vertical-align:top;color:rgb(170,170,170);text-align:right;width:110px;padding-top:10px;">';
$duidv=$m['id'];
include("buttons/friends_button.php");
$echo.=$sechov.'</td></tr></table>';
$yk++;

}
$yk--;


mysql_close($con);

$echo.='
<script type="text/javascript">
function strpos (haystack, needle, offset) {
   var i = (haystack + \'\').indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
function strtolower (str) {
    return (str + \'\').toLowerCase();
}
function checksearch_friends(query){
var initial=0;

var stop='.$yk.';
query=$.trim(query);
query=strtolower(query);
while(initial<=stop){
var check=$("#fullname"+initial).html();

check=$.trim(check);
check=strtolower(check);
if(strpos(check,query)===false){$("#fullnamev"+initial).css("display","none");}
else{if(strpos(check,query)>=0){

$("#fullnamev"+initial).css("display","block");

} }
initial++;
}
}
function showmutual(){
$("#thesearch").css("display","none");
var whichone=$("#whichone").val();
if(whichone=="showmutual"){}
else{
$("#showmutual").removeClass("showmutual");
$("#showmutual").addClass("searchbyname");
$("#searchbyname").removeClass("searchbyname");
$("#searchbyname").addClass("showmutual");
$("#whichone").val("showmutual");
}
$("#textfilter").html("Mutual Friends");
toggle_menu();

var c=$("#main_divg .isfriend_wrapper").filter(function() {
return ( $(this).css("display") == "none" );
});		


$(c).each(function(){
$(this).parents(".fullname").addClass("hidden_sb");
});

}

function showbyname(){
$("#thesearch").css("display","inline-block");
var whichone=$("#whichone").val();
if(whichone=="searchbyname"){}
else{
$("#showmutual").removeClass("searchbyname");
$("#showmutual").addClass("showmutual");
$("#searchbyname").removeClass("showmutual");
$("#searchbyname").addClass("searchbyname");
$("#whichone").val("searchbyname");
}
$("#textfilter").html("Search by Name");
toggle_menu();

$(".fullname").removeClass("hidden_sb");

}
</script>


';


if(isset($mutual_only)){
$echo.='
<script type="text/javascript">
$("#searchbyfilter").addClass("hidden_sb");
$("#showmutual").click();
$("#searchbyfilter").click();
$("#searchbyfilter").removeClass("hidden_sb");
</script>
';	
}



$params['rhelper']='../';
$params['rhelper_js']='../';
$params['title']='Upfrev';


$params['layout']='left_column_w';	
$params['left_link_w']='friends';


include("end.php");
?>

