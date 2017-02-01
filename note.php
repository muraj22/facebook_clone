<?php if(!isset($rew_helper)){include("start.php");} ?>
<?php
$_SERVER=array_map('php_safety',$_SERVER);

$req_uri=$_SERVER['REQUEST_URI'];

if(strpos($req_uri,"?")!==false){
$req_uriv=explode("?",$req_uri);
$req_uri=$req_uriv[0];
$dget=$req_uriv[1];	
}
if(isset($dget)){
$vrget=array();
$rget=explode("&",$dget);
$dcase=$rget[1];
}

if(isset($dcase)){
if($dcase!='preview'){
$rew_helper='';
include("notes/single_note_viewer.php");	
$jd='';
exit();
}
}
if(!isset($jd)){
include("populate_page.php");
$sbid=$_GET['note_id'];
$params['style']='
<style type="text/css">
.editpii{
    border: none;
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;	
}
body{color:#333333;}
body{font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;text-align:left;direction:ltr;}
.preview_note_wrapper{
	    padding: 0px 20px;
    padding-right: 0px;
    width: 493px;
    float: left;
    margin-right: 0px;

    word-wrap: break-word;	
}
.note_header{
    border-bottom: 1px solid rgb(170, 170, 170);
    padding-bottom: 1.3em;
    margin-bottom: 10px;
}
.label_publish{
background-image: url("/images/RsSrNNnmSGQ.png");
background-repeat: no-repeat;
background-position: -1px -490px;
background-color: rgb(91, 116, 168);
border-color: rgb(41, 68, 126) rgb(41, 68, 126) rgb(26, 53, 110);
    border-width: 1px;
    border-style: solid;

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
    padding: 1px 3px;
    text-align: center;
    text-decoration: none;
    vertical-align: top;
    white-space: nowrap;	
}
.label_publish:active,.label_publish:focus{
background-image:none;	
}
.label_publish input{
    color: rgb(255, 255, 255);

    background: none repeat scroll 0% 0% transparent;
    border: 0px none;

    cursor: pointer;
    display: inline-block;
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    margin: 0px;
    padding: 1px 0px 2px;
    white-space: nowrap;	
}
.note_edit{
    margin-left: 5px;
}

.note_edit span{
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
}
.note_edit_pencil{
    margin-top: 2px;
    vertical-align: top;

    margin-right: 5px;

    width: 10px;
    height: 14px;
    background-position: -194px -22px;

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
h2{ outline: medium none;
    color: rgb(28, 42, 71);
    font-size: 16px;
}
.edit_note_l a:link{
text-decoration:none;
color:#3b5998;	
}
.edit_note_l a:visited{
text-decoration:none;
color:#3b5998;	
}
.edit_note_l a:active{
text-decoration:underline;
color:#3b5998;	
}
.edit_note_l a:hover{
text-decoration:underline;
color:#3b5998;	
}
.notes_preview blockquote{
border-left: 5px solid rgb(221, 221, 221);
margin: 0px;
padding: 0px 15px;
	
}
.notes_preview ol{
padding: 0px 10px 0px 25px;	
}
.notes_preview ul{
list-style-type: square;
margin: 10px 0px;
padding: 0px 10px 0px 25px;	
}
.notes_preview *{
line-height:1.5em;	
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

.notes_preview img{
    margin: 0px;
    padding: 0px;
    max-width: 493px;
}
.notes_preview p{
margin:0;	
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


$echo.='
<div class="preview_note_wrapper">
<div class="note_header mbm">
<div class="clearfix">
<div style="float:right;">';
if (!function_exists('rtd_edit_note')) {
function rtd_edit_note($date){$date=tod($date);
	
  return date('l, F j, Y \a\t g:ia', strtotime($date));
}
}
$r=mysql_query("SELECT * FROM nt WHERE sbid='$sbid'");
while($m=mysql_fetch_array($r)){
$t=$m['title'];
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

$replace='<p>'.$dpf.'<img src="/'.$uid.'/pics/'.$dpic.'"></span></p><div class="caption">'.$caption.'</div>';

$needle='&lt;photo id="'.$aid.'" /&gt;';

$pos = strpos($body,$needle);
if ($pos !== false) {
    $body = substr_replace($body,$replace,$pos,strlen($needle));
}
else{
	$body=$body.$replace;
}



}


$datetimep=$m['datetimep'];
}
if(!isset($rew_helper)){$rew_helper='';}

$body=str_replace('<photo id="',"&lt;photo id=&quot;",$body);
$body=str_replace('" />','&quot; /&gt;',$body);
$echo.='
<script type="text/javascript">
function publish_note(){

var sbid="'.$sbid.'";
		$.ajax({
  type: "POST",
  url: "'.$rew_helper.'notes/notes_post.php?j=t",
  data: {sbid:sbid},
  success: function(response) {
//alert(response);

window.location="/'.$un.'?sk=notes";	

	}
});
}
</script>
<label class="label_publish" onclick="publish_note();"><input type="button" value="Publish"></label><a class="note_edit uiButton" href="/editnote.php?draft&note_id='.$sbid.'"><i class="note_edit_pencil"></i><span>Edit</span></a>
</div>
<div>
<h2>
'.$t.'
</h2>
</div>
</div>';

$uti=sb_user($uid);

$echo.='
<div style="color: gray;font-weight: normal;font-size: 11px;margin-bottom:0px;text-align:left;position:relative;top:0px;" class="edit_note_l clearfix">
by <a href="/'.$uti['username'].'">'.$uti['fullname'].'</a> on '.rtd_edit_note($datetimep).' &#183;
</div>
</div>
<div style="margin-top: 10px;margin-bottom: 10px;padding: 10px;background-color: rgb(255, 249, 215);border: 1px solid rgb(226, 200, 34);">
<div style="font-weight: bold;font-size: 13px;">This is a preview of your note.</div>
Click the "Publish" button to save or "Edit" to make more changes.
</div>
<div style="font-size: 11px;line-height: 1.5em;word-wrap: break-word;margin-bottom: 20px;" class="notes_preview">
<span>
<div>
'.$body.'
</div>
</span>
</div>

</div>';
if($rew_helper=='../../../'){ //js rew_helper
$params['rhelper_js']='../../../';	
$params['rhelper']='../'; //actual server pos from where it's been loaded
}
else{
$params['rhelper_js']='';	
$params['rhelper']='';	
}
$params['title']='Upfrev';









$uti=sb_user($uid);
$uidv=$uid;
include("notes/browse_notes.php");

$params['layout']='normal_n';



}
?>
<?php include("end.php"); ?>