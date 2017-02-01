<?php
include("start.php");
include("populate_page.php");
?>
<?php
$params['style']='
<style type="text/css">
.cancelmsg{
margin-left:4px;
font-size:13px;
line-height:16px;
background-image:url("/XsF-hka4MeB.png");
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
font-weight:bold;
padding:1px 4px;
text-align:center;
vertical-align:top;
white-space:nowrap;
color:rgb(102,102,102);
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
}
.cancelmsg:active{
margin-left:4px;
font-size:13px;
line-height:16px;
background:#dddddd;
border:1px solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-weight:bold;
padding:1px 4px;
text-align:center;
vertical-align:top;
white-space:nowrap;
color:rgb(102,102,102);
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
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
.friendslink a:link{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:none;
}
.friendslink a:visited{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:none;
}
.friendslink a:active{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:underline;
}
.friendslink a:hover{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:underline;
}
.cancelmsg3{
font-size:13px;
color:#333333;
background:none repeat scroll 0% 0%;
border:0pt none;
cursor:pointer;
display:inline-block;
font-family:\'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
font-weight:bold;
margin:0pt;
padding:1px 0pt 2px;
white-space:nowrap;
line-height:16px;
text-align:center;
}
.sendmsg{
font-size:13px;
background-image:url("/images/XsF-hka4MeB.png");
background-repeat:no-repeat;
background-position:0pt -49px;
background-color:rgb(91,116,168);
border:1px solid;
border-color:rgb(41,68,126) rgb(41,68,126) rgb(26,53,110);
line-height:16px;
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-weight:bold;
padding:1px 4px;
text-align:center;
vertical-align:top;
white-space:nowrap;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
color:#ffffff;
}
.sendmsg:active{
font-size:13px;
background:#4f6aa3;
border:1px solid;
border-color:rgb(41,68,126) rgb(41,68,126) rgb(26,53,110);
line-height:16px;
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-weight:bold;
padding:1px 4px;
text-align:center;
vertical-align:top;
white-space:nowrap;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
color:#ffffff;
}
.sendmsg3{
font-size:13px;
color:#ffffff;
background:none repeat scroll 0% 0%;
border:0pt none;
cursor:pointer;
display:inline-block;
font-family:\'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
font-weight:bold;
margin:0pt;
padding:1px 0pt 2px;
white-space:nowrap;
line-height:16px;
text-align:center;
}
.pop_container{
background:none repeat scroll 0% 0% rgba(82,82,82,0.7);
border-radius:8px;
padding:10px;
padding-right:9px;
position:absolute;
top:200px;
height:213px;
width:400px;
z-index:302;
margin-top:-80px;
}
.div_dialog_body{
padding:10px;border-bottom:1px solid rgb(204,204,204);border-right:1px solid rgb(85,85,85);border-left:1px solid rgb(85,85,85);
height:115px;
width:377px;
background:#ffffff;
position:relative;
top:0px;
}
.div_dialog_header{
padding:5px 10px;color:#ffffff;font-size:14px;font-weight:bold;border-right:1px solid #3b5998;border-left:1px solid #3b5998;border-top:1px solid #3b5998;
height:20px;
width:377px;
background:#6d84b4;
}
.div_dialog_footer{
background:rgb(242,242,242);
height:35px;
width:377px;
padding:8px 10px;
border-right:1px solid rgb(85,85,85);border-left:1px solid rgb(85,85,85);border-bottom:1px solid rgb(85,85,85);
}
.masuno_pymkv{
    margin-top: 2px;
    vertical-align: top;

    width: 11px;
    height: 14px;
    background-position: -720px -35px;

    background-image: url("/images/4lZBiQrBAYp.png");
    background-repeat: no-repeat;
    display: inline-block;

    margin-right: 5px;

    color: rgb(51, 51, 51);
    font-weight: normal;

    cursor: pointer;
    font-size: 11px;

    line-height: 13px;
    text-align: center;
    white-space: nowrap;
	position:absolute;	
	left:6px;
}


.pymk_d a:link{
	color:#3b5998;
	text-decoration:none;
	font-weight:bold;
	font-size:13px;
}
.pymk_d a:visited{
	color:#3b5998;
	text-decoration:none;
	font-weight:bold;
		font-size:13px;
}
.pymk_d a:active{
	color:#3b5998;
	text-decoration:underline;
	font-weight:bold;
		font-size:13px;
}
.pymk_d a:hover{
	color:#3b5998;
	text-decoration:underline;
	font-weight:bold;
	font-size:13px;
	}
.addfriend_pymk{

    margin-left: 0px;

    text-decoration: none;

    color: rgb(51, 51, 51);
    font-weight: normal;

    background-image: url("/images/4lZBiQrBAYp.png");
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
	padding-left:0;
	position:relative;
	padding-right:2px;
}
.addfriend_pymk2{
    background: none repeat scroll 0% 0% transparent;
    border: 0px none;
    color: rgb(51, 51, 51);
    cursor: pointer;
    display: inline-block;
    font-family: \'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    margin: 0px;
    padding:0;
	padding-left:19px;
	padding-bottom:1px;
    white-space: nowrap;	
}
.pymk_d{
	margin:0;
	padding:0;
    padding-top: 8px;
    border-top: 1px solid rgb(233, 233, 233);
    margin-bottom: 8px;
    padding-right: 4px;	

}
</style>';
$echo.='
<div style="margin-left:20px;display:inline-block;">
<div style="font-weight:bold;font-size:16px;margin:0;padding:0;margin-top:0px;">
Find friends from different parts of your life
</div>
<div style="margin-top:0px;border-top:1px solid #cccccc;">';
$u_friends=array();

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$result3 = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($ms3 = mysql_fetch_array($result3))
  {
$u_friends[]=$ms3['id2'];
}

$u_friendsm=$u_friends;

$result3 = mysql_query("SELECT id2 FROM friends WHERE id='$uid' AND confirmed!='y'");
while($ms3 = mysql_fetch_array($result3))
  {
$u_friendsm[]=$ms3['id2'];
}

$mutual=array();
$mutualc=array();
$mutualn=array();
$mutualu=array();
$mutualp=array();


foreach($u_friends as $k=>$v){

$r=mysql_query("SELECT * FROM friends WHERE id='$v' AND confirmed='y'");

while($m=mysql_fetch_array($r)){
$amigo=$m['id2'];
if($amigo!=$uid AND !in_array($amigo,$u_friendsm)){
$r2=mysql_query("SELECT * FROM registered WHERE id='$amigo'");
while($m2=mysql_fetch_array($r2)){

$v2n=$m2['fullname'];
if(!isset($mutualn[$amigo])){
$mutualn[$amigo]=$v2n;	
}
if(isset($mutualc[$amigo])){
$mutualc[$amigo]++;	
}
else{
$mutualc[$amigo]=1;
}
if(!isset($mutualp[$amigo])){
$mutualp[$amigo]=$m2['profilepic'];
$mutualu[$amigo]=$m2['username'];	
}
if(isset($mutual[$amigo])){
$mutual[$amigo].=','.$v;	
}
else{
$mutual[$amigo]=','.$v;
}
}
}
	


}


}

function genRandomStringnmf($length) {
    $characters = '123456789';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}

function array_pick($hash, $num) { 
  $count = count($hash); 
  if ($num <= 0) return array(); 
  if ($num >= $count) return $hash; 
  $required = $count - $num; 
  if ($required == 1) {   //array rand returns the KEY if there is only one item requested so... 
      $keys = array(array_rand($hash, $required)); 
  } else 
      $keys = array_rand($hash, $required); 
  foreach ($keys as $k) unset($hash[$k]);                    
  return $hash; 
} 




arsort($mutualc);

$mutualc2=array();

$dc=1;
foreach($mutualc as $k=>$v){
$mutualc2[$k]=$v;
$dc++;
if($dc==37){break;}
}

$s=24;

$mutualc3=array_pick($mutualc2,$s);

$mutualc3=shuffle_assoc($mutualc3);

$mutualcc2=array();

$dc=1;
foreach($mutualc as $k=>$v){
$mutualcc2[$k]=$v;
$dc++;
if($dc==37){break;}
}

$mutualcc=shuffle_assoc($mutualcc2);

$checkonit=array();

	$dkeys=array_keys($mutualc3);
	
	foreach($dkeys as $k2=>$v2){
		$checkonit[]=$v2;
	}
	
foreach($mutualcc as $k=>$v){

if(!in_array($k,$checkonit)){
	$mutualc3[$k]=$v;
}
}

$jc=0;
$dc=0;
$dcv='block';
foreach($mutualc3 as $k=>$v){
	$kd=$mutual[$k];
$vv=explode(",",$kd);
if($mutualu[$k]==''){$mutualu[$k]=$k;}
$rx=genRandomStringnmf(8);
$echo.='
<div class="pymk_d" style="vertical-align:top;margin-top:-3px;display:'.$dcv.';width:493px;" id="pymk'.$rx.'" rel="'.$k.'">
<div style="display:inline-block;margin:0;padding:0;">
<a href="/'.$mutualu[$k].'" style="text-decoration:none!important;display:block;">
<img src="/'.$k.'/pics/'.$mutualp[$k].'" style="height:75px;width:75px;">
</a>
</div>
';
$echo.= '<div style="display:inline-block;margin:0;padding:0;text-align:left;vertical-align:top;padding-left:5px;margin-top:-1px;">
<div style="display:block;vertical-align:top;margin:0;padding:0;">
<a href="/'.$mutualu[$k].'">'.$mutualn[$k].'</a>
</div>';
if($mutualc[$k]>1){$as='s';}
else{$as='';}


$nxv=0;
$txq=0;
foreach($vv as $k2=>$v2){
	if($v2!=''){
$txq++;
	}
}


$txqvv=$txq-2;
if($txqvv>6){$mposr='margin-right:12px;'; $mposrv='88';}
	else{$mposr=''; $mposrv='76';}
	
${'otherpeoplev'.$rx}='';
foreach($vv as $k2=>$v2){
	if(!empty($v2)){
$nxvv=$nxv+1;
if($nxvv==$txq){$border='0';}else{$border='1';}

$result=mysql_query("SELECT * FROM registered WHERE id='$v2'");
while($ms=mysql_fetch_array($result)){
$ffullname=$ms['fullname'];	
$fusername=$ms['username'];
$fprofilepic=$ms['profilepict'];
if($fusername==''){
$fusername=$v2;
}
}

${'otherpeoplev'.$rx}.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$fusername.'"><img src="/'.$v2.'/pics/'.$fprofilepic.'" style="height:50px;width:50px;position:relative;left:4px;"></a><a href="/'.$fusername.'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$ffullname.'</a><input id="addfriendbt_pymk'.$nxv.'" type="button" value="Friends" class="addfriend" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:3px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'"></div>';

$nxv++;
	}
	}

$echo.='
<div style="display:block;margin:0;padding:0;width:405px;color:gray;" class="pymk_dv">';

if($mutualc[$k]==2){
$cm=0;
foreach($vv as $k2=>$v2){
	if(!empty($v2)){
$result=mysql_query("SELECT * FROM registered WHERE id='$v2'");
while($ms=mysql_fetch_array($result)){
	$usern=$ms['username'];
	if($usern==''){$usern=$v2;}
if($cm==0){
$echo.= '<a href="/'.$usern.'" style="font-size:11px!important;font-weight:normal!important;">'.$ms['fullname'].'</a> and ';	
}
else{
$echo.= '<a href="/'.$usern.'" style="font-size:11px!important;font-weight:normal!important;">'.$ms['fullname'].'</a> are mutual friends.';
}
$cm++;
}
}	



}

}
else if($mutualc[$k]>2){
	$cmv=0;
	
	$forranda=array();
	foreach($vv as $k2=>$v2){
		if(!empty($v2)){
	$forranda[]=$v2;	
		}
	}
	$cok=count($forranda)-1;

			$dk=rand(0,$cok);
			$v2=$forranda[$dk];

		
		$result=mysql_query("SELECT * FROM registered WHERE id='$v2'");
while($ms=mysql_fetch_array($result)){
	$usern=$ms['username'];
	if($usern==''){$usern=$v2;}
	$echo.= '<a href="/'.$usern.'" style="font-size:11px!important;font-weight:normal!important;">'.$ms['fullname'].'</a> and ';	
}
		
	

	$acv=$mutualc[$k]-1;
$echo.='
<a href="#" onclick="showotherp('.$rx.','.$rx.',\'o\'); return false;" style="font-weight:normal!important;font-size:11px!important;">
'.$acv.' other mutual friend'.$as.'
</a>';
}
else{
	
foreach($vv as $k2=>$v2){
	if(!empty($v2)){
$result=mysql_query("SELECT * FROM registered WHERE id='$v2'");
while($ms=mysql_fetch_array($result)){
	$usern=$ms['username'];
	if($usern==''){$usern=$v2;}
$echo.= '<a href="/'.$usern.'" style="font-size:11px!important;font-weight:normal!important;">'.$ms['fullname'].'</a> is a mutual friend.';	
}
}	

}

	}

$echo.='
<div id="otherpeoplevvv'.$rx.'" style="display:none;">'.${'otherpeoplev'.$rx}.'</div>
</div>
<div style="display:block;width:100%;" class="pymk_dvv" id="pymk_dvv'.$rx.'">
<label class="addfriend_pymk" onclick="addfriendajaxl(\''.$k.'\','.$rx.',\'o\');" style="float:right;position:relative;right:-9px;">
<i class="masuno_pymkv"></i>
<input type="button" class="addfriend_pymk2" value="Add Friend">
</label>
</div>
</div>';

	$echo.='</div>';
	$dc++;
	if($dc==$s){
	$jc++;
	$dcv='none';	
	}
	if($dc>=$s){
	$dcv='none';	
	}
	else{
	$jc++;	
	}
}



$echo.='
<div style="display:none;" id="paca"></div>
</div>

</div>

';


$echo.='
<script type="text/javascript">
$(".pymk_d:first").css("margin-top","10px");
$(".pymk_d:first").css("padding-top","0");
$(".pymk_d:first").css("border-top","0");
function showotherp(w,wv,o){
if(wv==undefined){wv="v"+w; var mor="";}
else{var mor="vv";}
var concrete=document.getElementById("otherpeoplev"+mor+w).innerHTML;
if(o){
var as="Mutual ";	
}
else{var as="";}
concrete=\'<div class="pop_container" id="fpop_containerv\'+mor+w+\'" style="height:440px;display:none;position:fixed;"><div class="div_dialog_header" id="fdiv_dialog_header\'+mor+w+\'">\'+as+\'Friends</div><div class="div_dialog_body" id="fdiv_dialog_bodyv\'+mor+w+\'" style="height:350px;padding-top:3px;overflow-y:auto;overflow-x:hidden;">\'+concrete+\'</div><div class="div_dialog_footer" style="height:28px;" id="div_dialog_footerv\'+mor+w+\'"><label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:17px;margin-top:-2px;" id="close_msgvv\'+mor+w+\'" onclick="close_msgvv(\\\'\'+mor+w+\'\\\');"><input type="button" value="Close" class="uiButtonText"></label></div></div>\';

var spoph=$("#fpop_containerv"+mor+w).css("height");
if(spoph===undefined){
	$("#width_msgvv").append(concrete);
}

if(mor==""){$("#fdiv_dialog_header"+w).html("People who like this");}
else{$("#fdiv_dialog_header"+w).html("Friends");}

var checkjs=document.getElementById("checkjs"+wv);
if(checkjs){}
else{document.getElementById("close_msgvv"+mor+w).style.top="415px"; document.getElementById("close_msgvv"+mor+w).style.right="28px";}

document.getElementById("fpop_containerv"+mor+w).style.display="block";
}
</script>
<script type="text/javascript" src="/jquery.ba-dotimeout.min.js"></script>
<script type="text/javascript">
function close_msgvv(w){
$("#fpop_containerv"+w).fadeOut("slow");
$.doTimeout( 1600, function(){
$("#fpop_containerv"+w).remove();	
});	
}

function addfriendajaxl(w,nx,o){
	if(o){
			$(\'#pymk_dvv\'+nx).html(\'<div style="margin:0;padding:0;color:gray;">Friend Request Sent</div>\');
	}
$.ajax({
  async: "false",
  type: "POST",
  url: "../../addfriend.php",
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
			
			$(".pymk_d:first").css("margin-top","10px");
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
</script>


<div style="position:relative;">
<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;top:0;">
<div style="width:560px;height:100%;z-index:302;margin:0 auto;" id="width_msgvv">

</div></div>
</div>
<input type="hidden" id="xpu">
<div style="display:none;" id="totalp">1000</div>
<script type="text/javascript">
$("#xpu").val("'.$jc.'");

var tscrollt2;

function scrollt2(){
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
y=y-260;

if(scrollt>y){

}
';
if($browser=="mozilla"){
$echo.='
var scrollt=document.getElementById("upfrev").scrollTop;
var scrollb=document.getElementById("upfrev").scrollHeight;
';
}
else{
$echo.='
var scrollt=document.getElementById("body").scrollTop;
var scrollb=document.getElementById("body").scrollHeight;
';	
}

$echo.='
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
var bn=scrollb-scrollt;
var i3=bn-y;

if(i3==0){

	clearTimeout(tscrollt2);

var starting=$("#xpu").val();
starting=parseInt(starting);
starting=starting;
var ending=starting+63;
var totalp=$("#totalp").html();
if(starting>=totalp){return;}
else{
	
	var j=0;
				$("div[class=pymk_d]").each(function() {
                var nena=$(this).css("display");
				if(nena=="none"){
				$(this).fadeIn("fast");
				
				j++;
				}
				
        }); 
		
		var php_start=63-j;

	var bana="";
			$("div[class=pymk_d]").each(function() {
                var nena=$(this).css("display");
				if(nena=="block"){
			bana+=","+$(this).attr("rel");
			
				}
				
        }); 
		
			  $.ajax({
  type: "POST",
  url: "retrieve.php",
  data: {bana:bana,php_start:php_start},
  success: function(response) {
if(response==""){clearTimeout(tscrollt2); return false;}
$("#paca").before(response);
$("#xpu").val(ending);
tscrollt2=setTimeout("scrollt2()",0);

  }
});	
	return;		


}

}


tscrollt2=setTimeout("scrollt2()",0);
}
tscrollt2=setTimeout("scrollt2()",0);
</script>
';

$params['rhelper']='../../';
$params['title']='Upfrev';

$params['rhelper_js']='../../';	
$params['layout']='no_columns';


include("end.php"); ?>