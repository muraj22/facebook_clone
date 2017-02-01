<?php
if(!isset($rew_helper)){
$rew_helper='../';
?>
<?php
include("php_safety.php");
$_SERVER=array_map('php_safety',$_SERVER);
include("start.php");
?>
<?php
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$uri=$_SERVER['REQUEST_URI'];
$uri=explode("/",$uri);
$c=count($uri)-1;
$sbid=$uri[$c];
$r=mysql_query("SELECT * FROM nt WHERE sbid='$sbid'");
while($m=mysql_fetch_array($r)){
$uidv=$m['id'];	
$vis=$m['visibility'];
}
if($uid==$uidv AND $vis=='i'){
$_GET['note_id']=$sbid;
$rew_helper='../../../';
include("note.php");
exit();
}
else if($vis=='v'){

include("start.php");
}
}
else{
$sbid=$_GET['note_id'];
$r=mysql_query("SELECT * FROM nt as dt WHERE sbid='$sbid' $a_qf");
$c=mysql_num_rows($r);
if($c==0){
$death_notice="t";	
}
while($m=mysql_fetch_array($r)){
$uidv=$m['id'];	
$vis=$m['visibility'];
}	
}
include("populate_page.php");

if($rew_helper=='../'){
$params['rhelper_js']='../../../';
}
else{
$params['rhelper_js']='';
}

if(isset($_GET['saved'])){$saved='';}
$params['style']='
<style type="text/css">
.editpii{
    border: none;
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;	
}
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
.notesblogtext ol{
padding: 0px 10px 0px 20px;	
}
.notesblogtext ul{
list-style-type: square;
margin: 10px 0px;
padding: 0px 10px 0px 20px;
}
.notesblogtext blockquote{
border-left: 5px solid rgb(221, 221, 221);
margin: 0px;
padding: 0px 15px;	
}
.pencil_note{
    margin-top: 2px;
    vertical-align: top;

    margin-right: 5px;

    width: 10px;
    height: 14px;
    background-position: -10px -463px;


    background-image: url("/images/px6Be52Ig4w.png");
    background-repeat: no-repeat;
    display: inline-block;

    cursor: pointer;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    text-align: center;
    white-space: nowrap;	
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

.notesblogtext img{
    margin: 0px;
    padding: 0px;
    max-width: 493px;
}

.notes_notebook{
    width: 13px;
    background-position: -33px -169px;

    background-image: url("/images/-guJFwSod9n.png");
    background-size: auto auto;
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;	
}
</style>';


$uti=sb_user($uidv);


$echo.='
<div class="contentarea">
<div style="border-bottom: 1px solid rgb(170, 170, 170);padding-bottom: 0.5em;margin-bottom: 10px;">';
if($uidv==$uid){
	$echo.='
<div style="float:right;">
<a class="uiButton" href="/editnote.php?draft&note_id='.$sbid.'"><i class="pencil_note"></i><span class="uiButtonText">Edit</span></a>
</div>
';
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



$u_friends=r_friends($uid,'me');

$u_friends_uidv=r_friends($uidv,'me');

$hidden=array();
$r=mysql_query("SELECT * FROM hidden_stories WHERE id='$uid' AND hidden='1'");
while($m=mysql_fetch_array($r)){
$hidden[$m['whatisit']]=$m['likeid'];
}

$xrt=0;
$lco=1;

function rtd_edit_note($date){$date=tod($date);
	
  return date('l, F j, Y \a\t g:ia', strtotime($date));
}
$r=mysql_query("SELECT * FROM nt as dt WHERE sbid='$sbid' $a_qf");
while($m=mysql_fetch_array($r)){
$xrtl=0;
$title=$m['title'];

$body=$m['body'];

$likeid=$m['sbid'];
$x=$m['sbid'];

if(isset($m['body'])){
	
$ltype="notes";
$pause='';
$whatisit_h="notes";
		$cag=$likeid;
$uo=$m['id'];
$value=$uo;

if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$m['sbid'].'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo notes_table" data-uidv="'.$value.'" id="mtablew'.$x.'">';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'">

';
$saddo='';	
}

//$echo.=$faddo; because it's a note it starts below as opposed to maincore
}

$r2=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') OR visibility='n' AND id='$uid' ORDER BY datetimep ASC");
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

$replace='<p>'.$dpf.'<img src="/'.$uidv.'/pics/'.$dpic.'"></span></p><div class="caption">'.$caption.'</div>';

$needle='&lt;photo id="'.$aid.'" /&gt;';

$pos=strpos($body,$needle);
if($pos!==false) {
$body=substr_replace($body,$replace,$pos,strlen($needle));
}
else{
$body=$body.$replace;
}



}



$datetimep=$m['datetimep'];
if($title=="No Title"){$title='&nbsp;';}


$body=str_replace("<photo id=\"","&lt;photo id=&quot;",$body);
$body=str_replace('" />','&quot; /&gt;',$body);
$echo.='
<div>
<h2 class="uiHeaderTitle">
<div>'.$title.'</div>
</h2>
</div>

<div style="display:block;margin-bottom:4px;">
<div class="fwn fsm fcg lb inlineBlock">
by <a hc="" href="/'.$uti['username'].'">'.$uti['fullname'].'</a> on '.rtd_edit_note($datetimep).' &#183;
</div>';


$uidv=$m['id'];

$ltypev="nt";

$sbid=$sbid;

$nfjax="";
$data_t='data-t_align="center"'; 

$echo.='<ul class="uiList inlineBlock audienceSelectorv" style="position:relative;top:-3px;margin-left:1px;">';


$privacy_configuration="small";
$privacy_source="snv";  //album view


include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

$echo.='
</div>
</div>';

if(isset($saved)){
$echo.='<div class="mvm pam uiBoxYellow"><div class="fcb fwb fsl">Your changes have been saved.</div></div>';	
}

$echo.=$faddo;
$echo.='
<div class="mbl notesblogtext clearfix">
'.$body.'
</div>';

$descm=$m['body'];

$w=$descm;

foreach($allowed_sbeditor as $k=>$v){
$w=str_replace($v,"",$w);
}

$w=strip_tags($w);
$w=str_replace(' <','',$w);
$w=str_replace('<','',$w);
$w=str_replace('>','',$w);
$wl=strlen($w);
if($wl>500){
$w=substr($w,0,500);
$w.='...';
}


$descm=$w;

$x=1;

$ltype='notes';
$likeid=$sbid;

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



$sharef='show_msg_dialogs_note(\''.$uti['id'].'\',\''.$m['sbid'].'\',\''.$uti['fullname'].'\',\''.$descm.'\',\''.$m['title'].'\',\''.$x.'\');';
$sharef='&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>';

$echo.='
<div style="color: rgb(153, 153, 153);margin-bottom:2px;" class="notes_links_l">';


if(in_array($uid,$u_friends_uidv)){
$echo.='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;</div>'.$sharef; 
}

if($uid==$uidv){
$echo.='&nbsp;&#183;&nbsp;<a href="#" onclick="confirm_dialog(\''.$sbid.'\');">Delete</a>';	
}
$echo.='
</div>';

$echo.='<div class="foot_box lb">';
include("stories/story_pincho.php");
$echo.=$sechov;

$thefabtext=$m['sbid'];
$ltype='notes';

$value=$uti['id'];
$vrt=0;

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
$echo.='<div style="background:#edeff4;width:394px;padding:3px;padding-top:5px;padding-bottom:5px;position:relative;margin-left:0px;" id="moremsgv'.$x.'">

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
$echo.='</div>';

$echo.='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$echo.='<input type="hidden" value="'.$xrt.'" id="piclikeval">
<script type="text/javascript">
document.getElementById("piclikeval").value='.$xrt.';
</script>
';

}

$echo.='<script type="text/javascript">
function cancel_note2(){
$("#ppc_note2").fadeOut("slow",function(){

});

}

</script>
<div id="ppc_note2" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owm_note2">

<div class="pop_container3" id="ppci_note2" style="height:auto;display:block;position:fixed;"><div class="div_dialog_header3" id="ddh_note2">Confirmation Required</div>
<div class="div_dialog_body3" id="ddb_note2" style="height:auto;">
Are you sure you want to delete this note? This can not be undone.


</div><div class="div_dialog_footer3" style="height:28px;text-align:right;" id="ddf_note2"><label class="editasv" onclick="" id="notesv2"><input value="Confirm" name="submit" type="button" class="editasv2"></label><label class="editacn" onclick="cancel_note2();"><input value="Cancel" name="cancel" type="button"></label></div></div></div></div>

</div>

<script type="text/javascript">
function delete_note(w){
cancel_note2();
		$.ajax({
  type: "POST",
  url: "'.$params['rhelper_js'].'notes/notes_post.php?d=t",
  data: {sbid:w},
  success: function(response) {


window.location="/'.$un.'?sk=notes";	

	}
});	
}
function confirm_dialog(w){
$("#notesv2").unbind("click");
$("#notesv2").click(function(){delete_note(w);});
$("#ppc_note2").css("display","block");
}
</script>';


$params['rhelper']=$rew_helper;
$params['title']=$title; //noten


include("browse_notes.php");

$params['layout']='normal_n';

include("end.php");
?>