<?php
include("php_safety.php");
$req_uri=$_SERVER['REQUEST_URI'];
$tocount=str_replace("/","",$req_uri,$count);
if($count>3){include("single_note_viewer.php");}
else{
include("start.php");
include("populate_page.php");

$params['style']='
<style type="text/css">
.headerarea{
    float: left;
    margin: 0px 20px;
    width: 759px;

    margin-bottom: 5px;
    padding: 2px 0px 12px;	
}
.profileheader{
margin-top: 4px;	
}
.write_a_note{

    margin-left: 5px;

    background-image: url("/images/RsSrNNnmSGQ.png");
    background-repeat: no-repeat;
    background-position: -1px -98px;
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
}
.write_a_note span{
    background: none repeat scroll 0% 0% transparent;
    border: 0px none;
    color: rgb(51, 51, 51);
    cursor: pointer;
    display: inline-block;
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    margin: 0px;
    padding: 1px 0px 2px;
    white-space: nowrap;
	text-align:center;
}
.write_a_note_i{
    margin-top: 2px;
    vertical-align: top;

    margin-right: 5px;

    width: 8px;
    height: 14px;
    background-position: -272px -22px;

    background-image: url("/images/ek0a-06z84h.png");
    background-repeat: no-repeat;
    display: inline-block;

    cursor: pointer;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    text-align: center;
    white-space: nowrap;	
}
.profileheadermain h1{
    font-size: 14px;
    display: inline;
    margin-right: 5px;
	    color: rgb(51, 51, 51);
    margin: 0px;
    padding: 0px;	
}
.h1h{
    color: rgb(28, 42, 71);
    font-size: 20px;

    font-weight: bold;	
}
.profileheader_i{
    margin: 0px 5px 2px 6px;

    width: 11px;
    height: 9px;
    background-position: 0px -49px;

    background-image: url("/images/WyhgWi6GeZ8.png");
    background-repeat: no-repeat;
    display: inline-block;	
}
.contentarea{
padding-right: 0px;
width: 493px;
padding: 0px 20px;
float: left;
margin-right: 0px;
word-wrap: break-word;	
}
.note_top_border{
    border-bottom: medium none;
    border-left: medium none;
    border-right: medium none;

    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(204, 204, 204);	
}
.note_li{

    margin-bottom: 5px;
    border-color: rgb(233, 233, 233);
	    border-style: solid;
	padding-top: 10px;
    border-width: 1px 0px 0px;
    display: block;	
	
}



	
	
.note_title{
    color: rgb(51, 51, 51);
    font-weight: bold;
    font-size: 13px;
    margin-top: 5px;
    margin-bottom: 5px;	
}
.note_header{
    color: gray;

    font-weight: normal;

    font-size: 11px;

    padding-bottom: 10px;	
}
.note_header a:link{
cursor: pointer;
color: #3b5998;
text-decoration: none;
}
.note_header a:visited{
cursor: pointer;
color: #3b5998;
text-decoration: none;
}
.note_header a:active{
cursor: pointer;
color: #3b5998;
text-decoration: underline;
}
.note_header a:hover{
cursor: pointer;
color: #3b5998;
text-decoration: underline;
}
.note_title a:link{
cursor: pointer;
color: #3b5998;
text-decoration: none;
}
.note_title a:visited{
cursor: pointer;
color: #3b5998;
text-decoration: none;
}
.note_title a:active{
cursor: pointer;
color: #3b5998;
text-decoration: underline;
}
.note_title a:hover{
cursor: pointer;
color: #3b5998;
text-decoration: underline;
}
.note_content{

    margin: 0px 0px 10px;
    width: 460px;
padding: 10px 0px 0px;
    padding-top: 0px;
word-wrap: break-word;
    font-size: 11px;

    clear: both;	
}

.notes_links_l a:link{
color:#6d84b4;
text-decoration:none;
}
.notes_links_l a:visited{
color:#6d84b4;
text-decoration:none;
}
.notes_links_l a:active{
color:#6d84b4;
text-decoration:underline;
}
.notes_links_l a:hover{
color:#6d84b4;
text-decoration:underline;
}
.notes_bottom{
    border-top: 1px solid rgb(238, 238, 238);
    padding: 15px 0px 0px;

    margin-top: 10px;	
}
.notes_bottom_l{
    line-height: 23px;

    color: gray;

    font-size: 11px;

    float: left;	
}
.note_left_nav_arrow{

 
}
.note_i_left_nav{
    margin-left: -1px;
    margin-right: -1px;

    opacity: 0.5;

    margin-top: 0px;	
    vertical-align: top;

    background-position: 0px -17px;

    background-image: url("/images/g8sb9IUI0p4.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    width: 31px;
	
	}
.note_right_nav_arrow{
    margin-left: -1px;
}
.note_i_right_nav{
    margin-left: -1px;
    margin-right: -1px;
    vertical-align: top;

    background-position: 0px 0px;

    background-image: url("/images/g8sb9IUI0p4.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    width: 31px;
    margin-top: 0px;	
}
.nav_arrow_disabled_i{
opacity:0.5;
}
.nav_arrow_disabled{
background: none repeat scroll 0% 0% rgb(242, 242, 242);
border-color: rgb(200, 200, 200);
box-shadow: none;
}
.note_content *{
line-height:1.5em;	
}
.note_content p{
margin:0;
}
.note_content ol{
padding: 0px 10px 0px 20px;	
}
.note_content ul{
list-style-type: square;
margin: 10px 0px;
padding: 0px 10px 0px 20px;
}
.note_content blockquote{
border-left: 5px solid rgb(221, 221, 221);
margin: 0px;
padding: 0px 15px;	
}
.note_content img{
    margin: 0px 10px 10px 0px;
border: 1px solid rgb(204, 204, 204);
padding: 3px;
display: block;
    width: 100px;
}
.photo_center{
clear: both;
padding: 0px 0px 10px;
text-align: center;
}
.photo_left{
clear: left;
float: left;
padding: 2px 10px 5px 0px;
max-width: 180px;
}
.photo_right{
clear: right;
float: right;
padding: 2px 0px 5px 10px;
max-width: 180px;	
}

.photo_center img{
margin: 0px auto;
text-align: center;
width: 180px;	
}
.notessp_notes{
    top: 2px;

    left: 0px;
    position: absolute;

    width: 13px;
    background-position: -33px -169px;

    background-image: url("/images/CoiMBWx8lL7.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;	
}
</style>';


$uti=sb_user($uid);



$echo.='
<div class="contentarea">
<div class="uiHeaderPage uiHeaderWithImage uiHeaderBottomBorder">
<div class="clearfix uiHeaderTop">
<div style="float:right;">
<a href="/editnote.php" class="write_a_note uiButton"><i class="write_a_note_i"></i><span>Write a Note</span></a>
</div>
<div>
<h2 class="uiHeaderTitle"><i class="uiHeaderImage notessp_notes"></i>Notes</h2>
</div>
</div>
</div>
<ul style="list-style-type: none;margin: 0px;padding: 0px;">';

function space_to_dash($w){
$w=str_replace(" ","-",$w);
return $w;
}
function rtd_note($date){$date=tod($date);
  return date('l, F j, Y \a\t g:ia', strtotime($date));
}
function turndatev_fn($date){$date=tod($date);
  return date('l, F j, Y', strtotime($date));
}
function turndatevv_fn($date){$date=tod($date);
  return date('l', strtotime($date));
}
function td_fn($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);

$td=$tdd->format('%R%Y'); $suf=" year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf=' month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}

if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf=' hour';}

if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf=' minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf=' second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($td>1){$suf.='s';}

if($suf==" day" && $topv>=strtotime("yesterday")){}
else if($suf==" day"){$suf=' days'; $td=2;}

if($suf==' hour'){
return 'about an hour ago';
}

if($suf==' day'){
return 'Yesterday';	
}

if($suf==' days' && $td<7){
$td=turndatevv_fn($topv); return $td;	
}

	if($suf!=' hours' AND $suf!=' hour' AND $suf!=' seconds' AND $suf!=' second' AND $suf!=' minutes' AND $suf!=' minute'){$td=turndatev_fn($topv); return $td;}


if($suf==' second' || $suf==' seconds'){
return 'a few seconds ago';	
}

$td=$td.$suf.' ago';	


	return $td;
}

$allowed_sbeditor=array();

$allowed_sbeditor[]='<strong>';
$allowed_sbeditor[]='</strong>';
$allowed_sbeditor[]='<em>';
$allowed_sbeditor[]='</em>';
$allowed_sbeditor[]='<u>';
$allowed_sbeditor[]='</u>';

$allowed_sbeditor[]='<ul>';
$allowed_sbeditor[]='</ul>';
$allowed_sbeditor[]='<li>';
$allowed_sbeditor[]='</li>';
$allowed_sbeditor[]='<ol>';
$allowed_sbeditor[]='</ol>';

$allowed_sbeditor[]='<blockquote>';
$allowed_sbeditor[]='</blockquote>';

$allowed_sbeditor[]='<p>';
$allowed_sbeditor[]='</p>';

$allowed_sbeditor[]='<br>';

function check_body_length($w,$allowed_sbeditor){
$w=substr($w,0,354);

foreach($allowed_sbeditor as $k=>$v){

$w=str_replace($v,"",$w,${'count'.$v});


}



$gcount='';

foreach($allowed_sbeditor as $k=>$v){
$dcount=${'count'.$v};	

$dcount=strlen($v)*$dcount;

$gcount=$gcount+$dcount;
}

$w=strlen($w);
return $gcount;


}



$u_friends=r_friends($uid,'me');

if(isset($_GET['s'])){
$gsn=$_GET['s'];
$gsn=$gsn;
	}
else{$gsn=0;}
$gsnv=$gsn+1;
$ogs=$gsnv;




$hidden=array();
$r=mysql_query("SELECT * FROM hidden_stories WHERE id='$uid' AND hidden='1'");
while($m=mysql_fetch_array($r)){
$hidden[$m['whatisit']]=$m['likeid'];
}

$xrt=0;
$lco=1;
$trn=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM nt as dt WHERE FIND_IN_SET(id,'$uid_friends_comma_me')>0 AND (visibility='v' OR visibility='n') $a_qf"));
$trn=$trn['c'];

if($trn==0){
$echo.='
<script type="text/javascript">
$(".uiHeaderBottomBorder").css("border-bottom","0");
</script>';
}

$r=mysql_query("SELECT * FROM nt as dt WHERE FIND_IN_SET(id,'$uid_friends_comma_me')>0 AND (visibility='v' OR visibility='n') $a_qf ORDER BY datetimep DESC LIMIT $gsn,10");
while($m=mysql_fetch_array($r)){
$xrtl=0;
$id=$m['id'];
$uti=sb_user($id);

$note_title=$m['title'];
$flm=strtolower($uti['fullname']);
$flm=space_to_dash($flm);
$note_titlem=space_to_dash($note_title);
$note_titlem=preg_replace('/[^\p{L}-]/', '', $note_titlem);
$sbid=$m['sbid'];
$body=$m['body'];

$parts=preg_split('~(</?[\w][^>]*>)~', $body, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

$ft='';
$tl=0;
foreach($parts as $k=>$v){
if(strpos($v,'<')===false){
$tl=strlen($v)+$tl;	
}
if($tl>354){
$ft.='...';
break;
}
else{
$ft.=$v;	
}

}

$uo=$m['id'];

$body=$ft;
$likeid=$m['sbid'];
$x=$m['sbid'];

if(isset($m['body'])){
	
$ltype="notes";
$pause='';
$whatisit_h="notes";
		$cag=$likeid;

$value=$uo;

if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$m['sbid'].'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo notes_table" data-uidv="'.$value.'" id="mtablew'.$x.'"> ';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'">';
$saddo='';	
}

//$echo.=$faddo; because it's a note it starts below as opposed to maincore
}

$r2=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND id='$id' ORDER BY datetimep ASC");
while($m2=mysql_fetch_array($r2)){
$rep=$m2['aid'];

$aid=$m2['aid'];
$dclass=$m2['css_class'];
if($dclass==0){
$dpic=$m2['s0'];
}
else{
$dpic=$m2['s1'];	
}

if($dclass==0){$dpf='<span>';}
else if($dclass==1){$dpf='<span class="photo_left">';}
else if($dclass==2){$dpf='<span class="photo_center">';}
else if($dclass==3){$dpf='<span class="photo_right">';}

$caption=$m2['caption'];

$replace='<p>'.$dpf.'<img src="/'.$id.'/pics/'.$dpic.'"></span></p><div class="caption">'.$caption.'</div>';

$needle='&lt;photo id="'.$aid.'" /&gt;';

$pos = strpos($body,$needle);
if ($pos !== false) {
    $body = substr_replace($body,$replace,$pos,strlen($needle));
}
else{
	$body=$body.$replace;
}



}



if($note_titlem=='No-Title'){
$note_titlem='d41d8cd9';	
}



$body=str_replace("<photo id=\"","&lt;photo id=&quot;",$body);
$body=str_replace('" />','&quot; /&gt;',$body);

$echo.='
<li class="note_li">';
$echo.=$faddo;
$echo.='<div class="note_title"><a href="/notes/'.$flm.'/'.$note_titlem.'/'.$sbid.'">'.$note_title.'</a></div>
<div class="note_header">By <a hc="" href="/'.$uti['username'].'">'.$uti['fullname'].'</a> &#183; <span title="'.rtd_note($m['datetimep']).'">'.td_fn($m['datetimep']).'</span></div>
<div class="note_content clearfix">
<div>
'.$body.'
</div>
</div>';


$x=$gsnv;

$ltype='notes';

$likeid=$m['sbid'];
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}
}	  
$c=mysql_num_rows($r10);
if($c==0){
unset($count);	
}
$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}



$echo.='<tr><td class="story_foot_td" style="padding-left:2px;"><a href="/notes/'.$flm.'/'.$note_titlem.'/'.$sbid.'">View Full Note</a> &#183; <div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;';

$echo.='<div class="foot_box lb">';
include("stories/story_pincho.php");
$echo.=$sechov;

$thefabtext=$m['sbid'];

$value=$uti['id'];
$vrt=0;

$ltype='notes';

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$r2 = mysql_query("SELECT * FROM commentsv WHERE elemid='$thefabtext' AND type='$ltype'");
$vrt=mysql_num_rows($r2);

  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}
	

if(isset($count)){
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$value;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

$dr=array();
$dr[$x]="";
include("stories/likes_this.php");
$echo.=$dr[$x];

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>0){
	$tmv='none';
}
else{
	$tmv='block';
}

$uo=$uti['id'];

$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$thefabtext' AND whatisit='shared_notes' AND visibility='v'"));
$counter=$counter['counter'];

if($counter>0){
if($counter>1){$isp='s';}
else{$isp='';}

$dshare='shared_notes';
$share_id=$thefabtext;
$ltype='';
$wp_table='shares';
$owner_c=$value;

include("stories/with_plugin.php");

$echo.='<div style="background:#edeff4;width:394px;padding:3px;border-top:1px solid #ffffff;position:relative;margin-left:0px;padding-top:6px;display:'.$tmv.';" id="share_c'.$x.'">

<div style="width:100%;display:inline-block;background:#edeff4;height:0px;margin-bottom:0px;position:absolute;">
<div class="pinchito5" style="position:absolute;top:-10px;left:22px;display:'.$tm.';" id="pinchoms'.$x.'"></div>
</div>

<div class="share_bt" style="position:absolute;left:5px;bottom:3px;"></div>

<div class="friendslinkvl" style="display:inline-block;position:relative;left:23px;bottom:1px;">'.$with.'</div>

</div>';
$hasshares='';
}



if($vrt>0){
if($vrt>1){
$view_all='View all '.$vrt.' comments';
}
else if($vrt==1){
$view_all='View '.$vrt.' comment';	
}

if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$echo.='<div style="background:#edeff4;width:394px;padding:3px;border-top:1px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:0px;" id="moremsgv'.$x.'">


<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$thefabtext.'\',1,\'nml\');'.$cont.' $(\'#share_cv'.$x.'\').remove(); $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\'); document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">'.$view_all.'</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$thefabtext.'\',2,\'nml\')" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'"></span> of <span id="howmanymv'.$x.'">'.$vrt.'</span><span style="display:none;" id="howmanymo'.$x.'"></span></div></div>';	

$echo.='</div>';
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}

$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$dr=array();
$dr[$x]='';

$uidv=$uti['id'];

$for_photo='';

$nml=0;
$nmlf='nml';

$two_c=0;

include("master/load_2_comments.php");

include("master/comment_box.php");

$echo.=$dr[$x];

if($vrt>0){
$echo.='<script type="text/javascript">$("#pinchowc'.$x.'").css("display","none"); $("#wcommentwv'.$x.'").css("display","block"); $("#wcommentw'.$x.'").css("display","inline-block");</script>';
}

$echo.='</div>';

$echo.='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$echo.='
</li>';
$gsnv++;
}



$echo.='<input type="hidden" value="'.$xrt.'" id="piclikeval">
<script type="text/javascript">
document.getElementById("piclikeval").value='.$xrt.';
</script>
';



$gsnv--;
$en=$gsnv;
$st=$ogs;
$echo.='
</ul>';

if($trn==0){
$echo.='<div class="clearfix sbxNullState"><img style="display: block;margin-right: 8px;float:left;" height="32" width="32" src="/images/e4B6gExrCqw.png"><div style="display: table-cell;vertical-align: top;"><p style="font-size: 13px;padding:0;margin:0;padding-top: 7px;" class="lb">No one has written any notes.<a style="font-size:13px!important;" class="pls" onclick="window.location=\'/editnote.php\'" return false;" href="#">Write a Note</a></p></div></div>';	
}

if($trn!=0){
$echo.='
<div class="notes_bottom">
<div class="notes_bottom_l">
<div style="padding-right: 10px;">';
if($trn>10){
$echo.= $st.'-'.$en.' of '.$trn.' Results';

}
else{
if($trn>1){$ps='s';}else{$ps='';}
$echo.= $trn.' Result'.$ps.'';	
}

$enm=$gsn-10;
$echo.='</div>
</div>
<div style="float: right;">
<a href="/notes/?s='.$enm.'" class="note_left_nav_arrow uiButton nav_arrow_disabled"><i class="note_i_left_nav nav_arrow_disabled_i"></i></a><a href="/notes/?s='.$en.'" class="note_right_nav_arrow uiButton nav_arrow_disabled"><i class="note_i_right_nav nav_arrow_disabled_i"></i></a>
</div>
</div>
<script type="text/javascript">';
if($gsn==0 AND $trn>10){
$echo.='
$(".note_right_nav_arrow").removeClass("nav_arrow_disabled");
$(".note_i_right_nav").removeClass("nav_arrow_disabled_i");
$(".note_left_nav_arrow").removeAttr("href");
$(".note_left_nav_arrow").css("cursor","default");
';	
}
else if($gsnv==$trn){
if($trn>10){
$echo.='
$(".note_left_nav_arrow").removeClass("nav_arrow_disabled");
$(".note_i_left_nav").removeClass("nav_arrow_disabled_i");
$(".note_right_nav_arrow").removeAttr("href");
$(".note_right_nav_arrow").css("cursor","default");
';		
}
else{
$echo.='
$(".note_left_nav_arrow").removeAttr("href");
$(".note_left_nav_arrow").css("cursor","default");
$(".note_right_nav_arrow").removeAttr("href");
$(".note_right_nav_arrow").css("cursor","default");
';	
}
}
else{
$echo.='
$(".note_right_nav_arrow").removeClass("nav_arrow_disabled");
$(".note_i_right_nav").removeClass("nav_arrow_disabled_i");
$(".note_left_nav_arrow").removeClass("nav_arrow_disabled");
$(".note_i_left_nav").removeClass("nav_arrow_disabled_i");
';	
}
$echo.='
$(".note_li:first").css("border-width","0");
$(".note_li:first").css("padding-top","0");
</script>
</div>';
}

$params['rhelper_js']='../';
$params['rhelper']='../';
$params['title']='Upfrev';
$params['layout']='normal_n';
$params['left_link_n']='notes';
$params['left_menu_added']='
<script type="text/javascript" data-lma="">
$("#llm10").parent().eq(0).after(\'<div data-lma=""><a href="/notes/drafts/"><div id="llmnd" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmndv" class="linkwrap" style="position:relative;left:25px;display:inline-block;bottom:0;">My Drafts</div></div></a><a href="/notes/tagged/"><div id="llmnt" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmntv" class="linkwrap" style="position:relative;left:25px;display:inline-block;bottom:0;">Notes About Me</div></div></a><a href="/notes/me/"><div id="llmn" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmnv" class="linkwrap" style="position:relative;left:25px;display:inline-block;bottom:0;">My Notes</div></div></a></div>\');
</script>
';


include("end.php");
?>
<?php
}
?>