<?php
include("start.php");
include("populate_page.php");
?>
<?php
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

.senderlink a:link{text-decoration:none;}
.senderlink a:visited{text-decoration:none;}
.senderlink a:active{text-decoration:underline;color:#3b5998;}
.senderlink a:hover{text-decoration:underline;color:#3b5998;}


.lupasp{background-position:-17px -18px;background-image:url("/images/gFzwbhzopKq.png");background-repeat:no-repeat;display:inline-block;height:16px;width:16px;line-height:13px;cursor:pointer;text-align:left;}
</style>';

$echo.='
<script type="text/javascript">

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


$currentdir=getcwd(); 
$uidv=$uid; 

$params['left_column_id']="search";
$params['left_column']='
<div style="border-top:1px solid #eeeeee;margin-top:8px;padding-top:8px;padding-bottom:4px;color:grey;font-weight:bold;">

<span style="position:relative;top:-2px;">
SEARCH FILTERS</span>

<a href="#"><div id="llm1" class="wrapper_fotos2" style="padding-left:6px;padding-top:2px;">
<div class="lupasp" style="position:relative;display:inline-block;top:0;"></div><div id="llm1v" class="linkwrap2" style="position:relative;left:0;display:inline-block;">All Results</div></div></a>

</div>';




$echo.='<div style="margin-left:20px;">';

if(isset($_POST['q'])){
$searchf=$_POST['q'];
}
else{$searchf=$_GET['q'];}

$termgotten=str_replace(" ","",$searchf);
$termgotten=strtolower($termgotten);

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$yk=0;

$gs=0;

$r=mysql_query("SELECT * FROM registered WHERE LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%' ORDER BY length(f_name) ASC LIMIT $gs,10");

$c=mysql_num_rows($r);
if($c==0){
	$echo.='
<div id="pagelet_search_results_objects"><div id="pagelet_search_no_results" data-referrer="pagelet_search_no_results"><div class="mts pam uiBoxYellow"><div class="fsl fwb fcb">No results found for your query.</div><div class="fsm fwn fcg">Check your spelling or try another term.</div></div></div></div>
';
}

while($m=mysql_fetch_array($r))
  {

$duidv=$m['id'];

$uti=sb_user($m['id']);

$echo.= '<table style="width:493px;border-top:1px solid #eeeeee;border-collapse:collapse;border-spacing:0;" id="fullnamev'.$yk.'"><tr><td style="vertical-align:top;width:50px;padding-top:10px;padding-bottom:5px;"><a href="/'.$uti['username'].'"><img src="/'.$duidv.'/pics/'.$uti['profilepict'].'" style="width:50px;height:50px;"></a></td><td style="vertical-align:top;text-align:left;padding-left:3px;width:350px;padding-top:10px;" class="senderlink"><div style="margin-left:4px;"><div class="fwb fsl lb"><a hc="" href="/'.$uti['username'].'" id="fullname'.$yk.'">'.$uti['fullname'].'</a></div></div></td><td style="vertical-align:top;color:rgb(170,170,170);text-align:right;width:110px;padding-top:10px;">';
$duidv=$m['id'];
include("buttons/friends_button.php");
$echo.=$sechov.'</td></tr></table>';
$yk++;

}



$echo.='</div>';

$params['rhelper_js']='../';
$params['rhelper']='../';
$params['title']='Upfrev';


$params['layout']='left_column_n';


include("end.php");
?>