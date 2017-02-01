<?php
include("start.php");

include("start.php");
include("populate_page.php");

$uidv=$_SERVER['REQUEST_URI'];
if(strpos($uidv,"?")!==false){
$uidvv=explode("?",$uidv);
$uidv=$uidvv[0];
$dget=$uidvv[1];	
}

$uidvv=explode("/",$uidv);
if(isset($uidvv[2])){
$uidv=$uidvv[2];
}
else{
$uidv=$uidvv[1];
}

$result=mysql_query("SELECT * FROM registered where username='$uidv'");

$result=mysql_query("SELECT * FROM registered where id='$uidv'");
while($ms=mysql_fetch_array($result)){
$flagtu='t';	
$unv=$uidv;
}

if(!isset($flagtu)){
$result=mysql_query("SELECT * FROM registered where username='$uidv'");
while($ms=mysql_fetch_array($result)){
$uidv=$ms['id'];
$unv=$ms['username'];	
}
}

if($uidv=="drafts"){$from_news_feed=''; $uidv=$uid;}

$params['style']='
<style type="text/css">
.headerarea{
    float: left;
    margin: 0px 20px;
    width: 759px;

    margin-bottom: 0px;
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
	padding-bottom:10px;
	
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





$uti=sb_user($uidv);

if(isset($from_news_feed) AND $uidv==$uid){
$echo.='<div class="contentarea">
<div class="uiHeaderPage uiHeaderWithImage uiHeaderBottomBorder">
<div class="clearfix uiHeaderTop">
<div style="float:right;">
<a href="/editnote.php" class="write_a_note uiButton"><i class="write_a_note_i"></i><span>Write a Note</span></a>
</div>
<div>
<h2 class="uiHeaderTitle"><i class="uiHeaderImage notessp_notes"></i>My Drafts</h2>
</div>
</div>
</div>';
}
else{
$echo.='
<div class="headerarea">
<div class="profileheader">';
if($uidv==$uid){
	$echo.='
<div style="float:right;">
<a href="/editnote.php" class="write_a_note uiButton"><i class="write_a_note_i"></i><span>Write a Note</span></a>
</div>';
}
$echo.='
<div class="profileheadermain" style="width:513px;">
<h1>';

$echo.='
<span class="h1h">'.$uti['fullname'].'</span><i class="profileheader_i"></i><span class="h1h">Notes Drafts</span>
</h1>
</div>

</div>
</div>

<div class="contentarea">
<div class="note_top_border" style="border-bottom:0;"></div>';
}

$echo.='


<script type="text/javascript">
function cancel_note(){
$("#ppc_note").fadeOut("slow",function(){

});

}

</script>
<div id="ppc_note" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owm_note">

<div class="pop_container3" id="ppci_note" style="height:auto;display:block;position:fixed;"><div class="div_dialog_header3" id="ddh_note">Confirmation Required</div>
<div class="div_dialog_body3" id="ddb_note" style="height:auto;">
Are you sure you want to delete this note? This can not be undone.


</div><div class="div_dialog_footer3" style="height:28px;text-align:right;" id="ddf_note"><label class="editasv" onclick="" id="notesv"><input value="Confirm" name="submit" type="button" class="editasv2"></label><label class="editacn" onclick="cancel_note();"><input value="Cancel" name="cancel" type="button"></label></div></div></div></div>

</div>

<script type="text/javascript">
function delete_note(w){
cancel_note();
		$.ajax({
  type: "POST",
  url: "notes/notes_post.php?d=t",
  data: {sbid:w},
  success: function(response) {


window.location="/'.$un.'?sk=notes_drafts";	

	}
});	
}
function confirm_dialog(w){
$("#notesv").unbind("click");
$("#notesv").click(function(){delete_note(w);});
$("#ppc_note").css("display","block");
}
</script>';



$echo.='
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

$r=mysql_query("SELECT * FROM nt WHERE id='$uidv' AND visibility='i'");
$trn=mysql_num_rows($r);
if(isset($vrget['s'])){
$gsn=$vrget['s'];
$gsn=$gsn;
	}
else{$gsn=0;}
$gsnv=$gsn+1;
$ogs=$gsnv;


$r=mysql_query("SELECT * FROM nt WHERE id='$uidv' AND visibility='i' ORDER BY datetimep DESC LIMIT $gsn,10");

if($trn==0){
$echo.='
<script type="text/javascript">
$(".uiHeaderBottomBorder").css("border-bottom","0");
</script>';
}

while($m=mysql_fetch_array($r)){
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

$body=$ft;

$r2=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND id='$uid' ORDER BY datetimep ASC");
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
<li class="note_li">
<div class="note_title"><a href="/notes/'.$flm.'/'.$note_titlem.'/'.$sbid.'">'.$note_title.'</a></div>
<div class="note_header"><span title="'.rtd_note($m['datetimep']).'">'.td_fn($m['datetimep']).'</span> &#183; <a href="/notes/'.$flm.'/'.$note_titlem.'/'.$sbid.'">Edit</a> &#183; <a href="#" onclick="confirm_dialog(\''.$sbid.'\');">Discard</a></div>
<div class="note_content clearfix">
<div>
'.$body.'
</div>
</div>

</li>';
$gsnv++;
}
$gsnv--;
$en=$gsnv;
$st=$ogs;
$echo.='
</ul>';

if($trn==0){

$echo.='<div class="clearfix sbxNullState"><img style="display: block;margin-right: 8px;float:left;" height="32" width="32" src="/images/e4B6gExrCqw.png"><div style="display: table-cell;vertical-align: top;"><p style="font-size: 13px;padding:0;margin:0;padding-top: 7px;" class="lb">You do not have any drafts.<a style="font-size:13px!important;" class="pls" onclick="window.location=\'/editnote.php\'" return false;" href="#">Write a Note</a></p></div></div>';	
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
<a href="/'.$uti['username'].'?sk=notes&s='.$enm.'" class="note_left_nav_arrow uiButton nav_arrow_disabled"><i class="note_i_left_nav nav_arrow_disabled_i"></i></a><a href="/'.$uti['username'].'?sk=notes&s='.$en.'" class="note_right_nav_arrow uiButton nav_arrow_disabled"><i class="note_i_right_nav nav_arrow_disabled_i"></i></a>
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

$params['rhelper']='../';
$params['title']='Upfrev';
if(isset($from_news_feed)){
$params['layout']='normal_n';
$params['rhelper_js']='../../';
$params['left_link_n']='nd';
$params['left_menu_added']='
<script type="text/javascript" data-lma="">
$("#llm10").parent().eq(0).after(\'<div data-lma=""><a href="/notes/drafts/"><div id="llmnd" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmndv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">My Drafts</div></div></a><a href="/notes/tagged/"><div id="llmnt" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmntv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Notes About Me</div></div></a><a href="/notes/me/"><div id="llmn" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmnv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">My Notes</div></div></a></div>\');

$("#llm10").removeClass("wrapper_fotos2");
$("#llm10").addClass("wrapper_fotos");
$("#llm10v").removeClass("linkwrap2");
$("#llm10v").addClass("linkwrap");

$("#llmnd").removeClass("wrapper_fotos");
$("#llmnd").addClass("wrapper_fotos2");
$("#llmndv").removeClass("linkwrap");
$("#llmndv").addClass("linkwrap2");
</script>
';
}
else{
$params['layout']='left_column_w';	
$params['rhelper_js']='';

$params['left_link_w']='nd';
$params['left_menu_added']='
<script type="text/javascript" data-lma="">
$("#llm9").parent().eq(0).after(\'<div data-lma=""><a href="/'.$un.'?sk=notes_drafts"><div id="llmnd" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmndv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Drafts</div></div></a><a href="/'.$un.'?sk=notes_tagged"><div id="llmnt" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmntv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Notes About</div></div></a></div>\');

$("#llm9").removeClass("wrapper_fotos2");
$("#llm9").addClass("wrapper_fotos");
$("#llm9v").removeClass("linkwrap2");
$("#llm9v").addClass("linkwrap");

$("#llmnd").removeClass("wrapper_fotos");
$("#llmnd").addClass("wrapper_fotos2");
$("#llmndv").removeClass("linkwrap");
$("#llmndv").addClass("linkwrap2");
</script>
';
}

$echo.='</div></div>';


include("end.php");
?>