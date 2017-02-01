<?php
include("start.php");

include("populate_page.php");
$params['style']='
<style type="text/css">
.note_publish{
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
.note_publish input{
    margin-left: 0px;

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
.note_publish:active,.note_publish:focus{
background-image:none;	
}
.note_preview{
    margin-left: 4px;

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
    padding: 1px 3px;
    text-align: center;
    text-decoration: none;
    vertical-align: top;
    white-space: nowrap;
}
.note_preview input,.note_preview span{
    margin-left: 0px;

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
.note_preview:active,.note_preview:focus{
background:#dddddd;	
}
body{color:#333333;}
body{font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;text-align:left;direction:ltr;}
.hnotesu{
    line-height: 20px;
    min-height: 20px;
    padding-bottom: 2px;
    vertical-align: bottom;


    outline: medium none;

    color: rgb(28, 42, 71);
    font-size: 16px;


    margin: 0px;
    padding: 0px;
    word-wrap: break-word;	
	font-weight:bold;
}
.hwrap{
    padding: 6px 0px 16px;

    margin-left: 20px;
    margin-right: 20px;	
}
.mcwrap{
    padding: 0px;
    width: 799px;
word-wrap:break-word;
    float: left;
    margin-right: 0px;
}
.mcwrapv{
    min-height: 253px;
    border-top: 1px solid rgb(179, 179, 179);

    padding: 20px;

    border: medium none;

    background-color: rgb(242, 242, 242);	
}
.mcwrap_th{

    color: rgb(102, 102, 102);
    font-weight: bold;

    text-align: right;
    width: 130px;


    padding: 3px 0px 1px;
	
    padding-top: 8px;
	    padding-right: 10px;
		

    vertical-align: top;	
	font-size:11px;
}
.mcwrap_td{


    padding: 3px 0px 1px;
		    padding-top: 5px;
    text-align: left;
    vertical-align: top;
}
.mcwrap_div{
background-color: rgb(255, 255, 255);
border: 1px solid rgb(189, 199, 216);
padding: 3px;	
}
.inputtext{
font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size: 11px;
margin: 0px;	
}
.mcwrap_in{
border: medium none;
padding: 0px;
width: 100%;	
}
.spacer{
padding: 5px 0px;	
}
hr{
background: none repeat scroll 0% 0% rgb(217, 217, 217);
border-width: 0px;
color: rgb(217, 217, 217);
height: 1px;
}
.cke_skin_kama, .cke_skin_kama *{
border:0!important;	
border-radius:0!important;
margin:0!important;
padding:0!important;
background:transparent!important;
}
#cke_contents_edit_note{background:white!important;}
.editor{
    border-color: rgb(174, 174, 174) rgb(187, 187, 187) rgb(187, 187, 187);
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(204, 204, 204);	
}
.toolbar{
    background-color: rgb(242, 242, 242);
    padding-top: 3px;
    padding-bottom: 3px;

    padding-left: 5px;
    padding-right: 5px;	
}
.buttons_toolbar{
background-clip: padding-box;
background-color: rgb(255, 255, 255);
border: 1px solid rgba(0, 0, 0, 0.35);
border-radius: 3px 3px 3px 3px;
box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.1);
display: inline-block;
padding: 0px;
white-space: nowrap;
}
.buttons_toolbarv{
border-color: rgba(0, 0, 0, 0.15);
display: inline-block;
vertical-align: top;
border-left: 0px none;	
}


.buttons_toolbarv2{
border-left: 1px solid rgba(0, 0, 0, 0.15);
border-color: rgba(0, 0, 0, 0.15);
display: inline-block;
vertical-align: top;	
}
.buttons_toolbarv3{
border-left: 1px solid rgba(0, 0, 0, 0.15);
border-color: rgba(0, 0, 0, 0.15);
display: inline-block;
vertical-align: top;	
}


.cke_iconv{
    margin: 0px!important;
	vertical-align:top!important;
    width: 20px!important;
    height: 16px!important;
    background-image: url("/images/FbCyXQSrD4-.png")!important;
}

img{
border: 0px none;	
}

.cke_label,.cke_voice_label{display:none!important;}

.cke_6_isoff,.cke_7_isoff,.cke_8_isoff,.cke_9_isoff,.cke_10_isoff,.cke_11_isoff{
   margin: -1px!important;

    padding: 2px 0px!important;
padding-bottom:0!important;
padding-top:2px!important;

    box-shadow: none!important;
    vertical-align: top!important;

    text-decoration: none!important;

    background-image: url("/images/RsSrNNnmSGQ.png")!important;
    background-repeat: no-repeat!important;
    background-position: -1px -98px!important;
    background-color: rgb(238, 238, 238)!important;
    border-width: 1px!important;
    border-style: solid!important;
    border-color: rgb(153, 153, 153) rgb(153, 153, 153) rgb(136, 136, 136)!important;
    -moz-border-top-colors: none!important;
    -moz-border-right-colors: none!important;
    -moz-border-bottom-colors: none!important;
    -moz-border-left-colors: none!important;
    -moz-border-image: none!important;

    cursor: pointer!important;
    display: inline-block!important;
    font-size: 11px!important;
    font-weight: bold!important;
    line-height: 13px!important;

    text-align: center!important;

    white-space: nowrap!important;	
}
.underline_img{
    background-position: 0px -42px!important;	
}
.bold_img{
    background-position: 0px -2px!important;	
}
.italic_img{
    background-position: 0px -22px!important;
}
.nl_img{
background-position: 0px -82px!important;
}

.ul_img{
background-position: 0px -62px!important;
}

.quote_img{
background-position: 0px -102px!important;
}

#cke_6,#cke_6 *, #cke_7,#cke_7 *,#cke_8,#cke_8 *,#cke_9,#cke_9 *,#cke_10,#cke_10 *,#cke_11,#cke_11 *{cursor:pointer!important;opacity:1!important;}

.cke_6_ison,.cke_7_ison,.cke_8_ison,.cke_9_ison,.cke_10_ison,.cke_11_ison{
background:#7D7D7D!important;
border:1px solid!important;
    border-color: rgb(82, 82, 82)!important;
    cursor: pointer;

    box-shadow: none;
}

.bold_img_ison{background-position:-20px -2px!important;}	
.italic_img_ison{background-position: -20px -22px!important;}
.underline_img_ison{background-position: -20px -42px!important;}
.nl_img_ison{background-position: -20px -82px!important;}
.ul_img_ison{background-position: -20px -62px!important;}
.quote_img_ison{background-position: -20px -102px!important;}


.editpi{
    -moz-box-sizing: border-box;
    background-color: white;
    border: 0px none;
    -moz-box-sizing: border-box;
    outline: 0px none;
    width: 100%;
    border: 1px solid rgb(189, 199, 216);
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0px;
    padding: 3px;
	    padding-bottom: 4px;
   cursor: text;
	text-align: left;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.editpii{
    border: none;
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;	
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
</style>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>';
$echo.='
<div style="width:180px;height:190px;position:absolute;top:0px;margin:0;padding:0;padding-top:34px;left:-180px;display:none;" class="ld">

<a href="/notes/">Friend\'s Notes</a><br>
<a href="/'.$un.'?sk=notes">My Notes</a><br>
<a href="/'.$un.'?sk=notes_drafts">My Drafts</a><br>
<a href="/'.$un.'?sk=notes_tagged">Notes About Me</a>

</div>

<script type="text/javascript">
function cancel_note(){
$("#custom_leave_warningv").val("t");
$("#custom_leave_warning").val("t");
$("#ppc_note").fadeOut("slow",function(){

});

}

</script>
<div id="ppc_note" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owm_note">

<div class="pop_container3" id="ppci_note" style="height:auto;display:block;position:fixed;"><div class="div_dialog_header3" id="ddh_note">Are you sure you want to leave this page?</div>
<div class="div_dialog_body3" id="ddb_note" style="height:auto;">
You have unsaved changes that will be lost if you decide to continue.


</div><div class="div_dialog_footer3" style="height:28px;text-align:right;" id="ddf_note"><label class="editasv" onclick="" id="notesv"><input value="Leave this Page" name="submit" type="button" class="editasv2"></label><label class="editacn" onclick="cancel_note();"><input value="Stay on this Page" name="cancel" type="button"></label></div></div></div></div>

</div>
<script type="text/javascript">
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
<div class="mcwrap">
<div class="hwrap">
<div class="hnotesu">Write a Note</div>
</div>
<div class="mcwrapv" style="border-top:1px solid rgb(179, 179, 179);">
<div id="p_note_failed" style="display:none;" class="uiBoxRed pam mbm">
<div class="fsl fwb fcb">Publish Note Failed</div>Please provide a title and body. Title and body are required to publish a note.
</div>
<table style="border: 0px none;border-collapse: collapse;border-spacing: 0px;width: 100%;">
<tr>
<th class="mcwrap_th">Title:</th>
<td class="mcwrap_td"><div class="mcwrap_div"><input class="inputtext mcwrap_in" type="text" id="note_title"></div></td>
</tr>
<tr>
<td colspan="2" class="spacer">
<hr>
</td>
</tr>
<tr>
<th class="mcwrap_th">Body:</th>
<td class="mcwrap_td"><div class="editor"><div class="toolbar" id="toolbar" style="padding-left: 6px;padding-top: 4px;padding-bottom: 0px;">

<div style="display:none;">

<span class="buttons_toolbar">

<span class="buttons_toolbarv">
<label class="toolbar_bold"><img class="bold_img" src="/images/-PAXP-deijE.gif" alt="Bold" height="1" width="1"><input value="Bold" type="button" style="display:none;"></label>
</span><span class="buttons_toolbarv2">
<label class="toolbar_italic"><img class="italic_img" src="/images/-PAXP-deijE.gif" alt="Italic" height="1" width="1"><input value="Italic" type="button" style="display:none;"></label>
</span><span class="buttons_toolbarv3">
<label class="toolbar_underline"><img class="underline_img" src="/images/-PAXP-deijE.gif" alt="Underline" height="1" width="1"><input value="Underline" type="button" style="display:none;"></label>
</span>


</span>

</div>

</div>

</div>

<table style="height: 250px;width: 100% !important;">
<tr><td style="width:100%;">
<input type="hidden" id="new_note">
<div style="position:relative;margin:0;padding:0;display:inline-block;height:250px;">
<div style="border-bottom: medium none;border-left: medium none;border-right: medium none;background-color: rgb(255, 255, 255);border: 1px solid rgb(204, 204, 204);width:617px;margin:0;padding:0;padding-right:0px;position:absolute;display:inline-block;top:-2px;left:-1px;"><textarea id="edit_note"></textarea></div></div>';


$title='';
$body='';
$sbid='';
if(isset($_GET['note_id'])){
$sbid=$_GET['note_id'];
$r=mysql_query("SELECT * FROM nt WHERE sbid='$sbid' AND id='$uid' AND visibility!='d'");
while($m=mysql_fetch_array($r)){
$title=$m['title'];
if($title=="No Title"){$title='';}
$body=$m['body'];


$r2=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND id='$uid' ORDER BY datetimep ASC");
while($m2=mysql_fetch_array($r2)){
$aid=$m2['aid'];
$needle='<photo id="'.$aid.'" />';

$pos=strpos($body,$needle);
if($pos===false){$body=$body.$needle;}
}


$body=str_replace('<photo id="',"&lt;photo id=&quot;",$body);
$body=str_replace('" />',"\&quot; /&gt;",$body);

$vis=$m['visibility'];	
}
$ds=strlen($body)-4;
$last=substr($body,$ds,4);

if($last=="<br>"){

$body=substr($body,0,$ds);

}
}
else{
$vis='i';
$ft='';
$title='No Title';

$uidv=$uid;
$sbid="";
$ltypev="nt";
$shared_privacy="t";

include("buttons/privacy_retrieve.php");

mysql_query("INSERT INTO nt (id,title,body,visibility,privacy,privacyh,datetimep) VALUES('$uid','$title','$ft','$vis','$privacy','$privacyh',UNIX_TIMESTAMP())");
$sbid=mysql_insert_id();
$title='';	
}

$likeidgen=mysql_insert_id();

$likeid=$likeidgen;
$ltype='notes';
include("stories/like_insert.php");

$echo.='
<script type="text/javascript">
$("#new_note").val("'.$sbid.'");
$("#edit_note").val("'.$body.'");
$("#note_title").val("'.$title.'");	
</script>

<script type="text/javascript">
function loadEditor(id)
{
    var instance = CKEDITOR.instances[id];
    if(instance)
    {
        CKEDITOR.remove(instance);
    }

CKEDITOR.config.toolbar_MA=[ ["Bold","Italic","Underline","NumberedList","BulletedList","Blockquote"] ];

CKEDITOR.config.width = "100%";
CKEDITOR.config.height = "250px";
CKEDITOR.config.removePlugins = "resize,elementspath,scayt,menubutton,contextmenu";
CKEDITOR.config.toolbarCanCollapse = false;
CKEDITOR.config.enterMode = CKEDITOR.ENTER_P;
CKEDITOR.config.sharedSpaces =
{
	top : "toolbar"
};
CKEDITOR.replace( id,
            {   toolbar:"MA"  }
         );

}

loadEditor("edit_note");


function jr(){

var exists=$(".cke_icon").length;
if(exists>0){

if($("#cke_6").length==0){
$("#toolbar").css("padding-bottom","4px");	
}

$(".cke_icon").remove();

$(".cke_toolgroup").find("a").eq(0).prepend(\'<img class="bold_img cke_iconv" src="/images/-PAXP-deijE.gif" alt="Bold" height="1" width="1"><input value="Bold" type="button" style="display:none;">\');
$(".cke_toolgroup").find("a").eq(0).addClass("cke_6_isoff");

$(".cke_toolgroup").find("a").eq(1).prepend(\'<img class="italic_img cke_iconv" src="/images/-PAXP-deijE.gif" alt="Italic" height="1" width="1"><input value="Italic" type="button" style="display:none;">\');
$(".cke_toolgroup").find("a").eq(1).addClass("cke_7_isoff");

$(".cke_toolgroup").find("a").eq(2).prepend(\'<img class="underline_img cke_iconv" src="/images/-PAXP-deijE.gif" alt="Underline" height="1" width="1"><input value="Underline" type="button" style="display:none;">\');
$(".cke_toolgroup").find("a").eq(2).addClass("cke_8_isoff");

$(".cke_toolgroup").find("a").eq(3).prepend(\'<img class="nl_img cke_iconv" src="/images/-PAXP-deijE.gif" alt="Numbered Lists" height="1" width="1"><input value="Numbered Lists" type="button" style="display:none;">\');
$(".cke_toolgroup").find("a").eq(3).addClass("cke_9_isoff");

$(".cke_toolgroup").find("a").eq(4).prepend(\'<img class="ul_img cke_iconv" src="/images/-PAXP-deijE.gif" alt="Unordered Lists" height="1" width="1"><input value="Unordered Lists" type="button" style="display:none;">\');
$(".cke_toolgroup").find("a").eq(4).addClass("cke_10_isoff");

$(".cke_toolgroup").find("a").eq(5).prepend(\'<img class="quote_img cke_iconv" src="/images/-PAXP-deijE.gif" alt="Block Quotes" height="1" width="1"><input value="Block Quotes" type="button" style="display:none;">\');
$(".cke_toolgroup").find("a").eq(5).addClass("cke_11_isoff");

$(".cke_toolgroup").find("a").eq(3).attr("style", "margin-left:5px!important");


}


var ison=$(".cke_toolgroup").find("a").eq(0).hasClass("cke_on");

if(ison===true){
$(".bold_img").addClass("bold_img_ison");
$(".cke_toolgroup").find("a").eq(0).addClass("cke_6_ison");	
}
else{
$(".cke_toolgroup").find("a").eq(0).removeClass("cke_6_ison");
$(".bold_img").removeClass("bold_img_ison");
}



var ison=$(".cke_toolgroup").find("a").eq(1).hasClass("cke_on");

if(ison===true){
$(".italic_img").addClass("italic_img_ison");
$(".cke_toolgroup").find("a").eq(1).addClass("cke_7_ison");	
}
else{
$(".cke_toolgroup").find("a").eq(1).removeClass("cke_7_ison");
$(".italic_img").removeClass("italic_img_ison");
}

var ison=$(".cke_toolgroup").find("a").eq(2).hasClass("cke_on");

if(ison===true){
$(".underline_img").addClass("underline_img_ison");
$(".cke_toolgroup").find("a").eq(2).addClass("cke_8_ison");	
}
else{
$(".cke_toolgroup").find("a").eq(2).removeClass("cke_8_ison");
$(".underline_img").removeClass("underline_img_ison");
}


var ison=$(".cke_toolgroup").find("a").eq(3).hasClass("cke_on");

if(ison===true){
$(".nl_img").addClass("nl_img_ison");
$(".cke_toolgroup").find("a").eq(3).addClass("cke_9_ison");	
}
else{
$(".cke_toolgroup").find("a").eq(3).removeClass("cke_9_ison");
$(".nl_img").removeClass("nl_img_ison");
}


var ison=$(".cke_toolgroup").find("a").eq(4).hasClass("cke_on");

if(ison===true){
$(".ul_img").addClass("ul_img_ison");
$(".cke_toolgroup").find("a").eq(4).addClass("cke_10_ison");	
}
else{
$(".cke_toolgroup").find("a").eq(4).removeClass("cke_10_ison");
$(".ul_img").removeClass("ul_img_ison");
}


var ison=$(".cke_toolgroup").find("a").eq(5).hasClass("cke_on");

if(ison===true){

$(".quote_img").addClass("quote_img_ison");
$(".cke_toolgroup").find("a").eq(5).addClass("cke_11_ison");	
}
else{
$(".cke_toolgroup").find("a").eq(5).removeClass("cke_11_ison");
$(".quote_img").removeClass("quote_img_ison");
}

setTimeout("jr()",20);
}
jr();
</script>

<textarea style="display:none;" id="tpost"></textarea>
</td></tr>
</table>
</td></tr>
<tr>
<td colspan="2" class="spacer">
<hr>
</td>
</tr>
<tr>
<th class="mcwrap_th">Tags:</th>
<td class="mcwrap_td"><div class="mcwrap_div" style="background:transparent;border:0;padding:0;"><div style="margin:0;padding:0;width:100%;height:auto;display:inline-block;position:relative;">
<div style="width:611px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="note_tags" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_placeholder=""></div></div>


<script type="text/javascript">
var psuf="note_tags";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="note_tags";
e.preventDefault();
e.stopPropagation();';

$tagsids="";
$tagsnames="";

$r=mysql_query("SELECT * FROM nta WHERE noteid='$sbid' AND id='$uid' AND type='tags' ORDER BY datetimep ASC");
$c=mysql_num_rows($r);
while($m=mysql_fetch_array($r)){

	$valuev=strtolower($m['tagged']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;

	
	$uti=sb_user($m['tagged']);
	
	$mm=stripslashes($uti['fullname']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	
}

$echo.='
$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});
</script>

</div></div>
</td>
</tr>
<tr>
<td colspan="2" class="spacer">
<hr>
</td>
</tr>
<tr>
<th class="mcwrap_th">Photos:</th>
<td class="mcwrap_td lb"><div class="mcwrap_div" style="background:transparent;border:0;padding-top:0px;">
<script type="text/javascript">
function photoalign(aid,w){

$("#alignment_"+aid+"_icon0").removeClass("icon_onv");	
$("#alignment_"+aid+"_icon1").removeClass("icon_onv");	
$("#alignment_"+aid+"_icon2").removeClass("icon_onv");	
$("#alignment_"+aid+"_icon3").removeClass("icon_onv");



$("#alignment_"+aid+"_icon0").addClass("icon_off");
$("#alignment_"+aid+"_icon1").addClass("icon_off");
$("#alignment_"+aid+"_icon2").addClass("icon_off");
$("#alignment_"+aid+"_icon3").addClass("icon_off");

$("#photo_aligned"+aid).val(w);

$("#alignment_"+aid+"_icon"+w).addClass("icon_onv");		
}
</script>

<div style="padding-top:5px;">
<a href="#" onclick="$(this).parent().css(\'display\',\'none\'); $(\'#notes_photos\').css(\'display\',\'block\'); return false;" id="add_a_photo">Add a photo.</a>
</div>

<div style="display:none;" class="fcg" id="notes_photos">
<div id="notes_photosv">

<div id="note_photow" style="display:none;"></div>




<div>
<div id="no_photos" style="padding-top:5px;">No photos.</div>
<div class="uiHeaderNav uiHeaderTopBorder">
<h4>Upload a Photo</h4>
</div>
<iframe name="note_upload_iframe" id="note_upload_iframe" style="height: 38px;overflow: hidden;padding: 0px;" class="iframe" src="notes/notes_upload.php?note_id='.$sbid.'" frameborder="0" scrolling="no"></iframe>
<input type="hidden" id="aid">';

$ske=array();
$r=mysql_query("SELECT aid FROM notes_pics WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND id='$uid'");
$c=mysql_num_rows($r);
if($c>0){
$echo.='<script type="text/javascript">$("#no_photos").css("display","none"); $("#add_a_photo").click();</script>';	
}
while($m=mysql_fetch_array($r)){
$ske[]=$m['aid'];	
}
rsort($ske);
if(isset($ske[0])){
$aid=$ske[0];
}
else{$aid=0;}
$aid=$aid+1;
$echo.='
<script type="text/javascript">
$("#aid").val("'.$aid.'");
var note_aid;
function noteaid(){
var se=$("#note_upload_iframe").contents().find("#aid").length;

if(se>0){
					var aid=$("#aid").val();
					$("#note_upload_iframe").contents().find("#aid").val(aid);
clearTimeout(note_aid); return false;
}
note_aid=setTimeout("noteaid()",210);
		
}
		note_aid=setTimeout("noteaid()",210);


function removeLastInstance(bt, str) {
    var charpos = str.lastIndexOf(bt);
    if (charpos<0) return str;
    ptone = str.substring(0,charpos);
    pttwo = str.substring(charpos+(bt.length));
    return (ptone+pttwo);
}

function photo_remove(aid){
var sbid="'.$sbid.'";
		$.ajax({
  type: "POST",
  url: "notes/photo_remove.php",
  data: {aid:aid,sbid:sbid},
  success: function(response) {
$("#note_photov"+aid).remove();
$("#note_photo"+aid).css("display","none");
$("iframe").each(function() {
                var nena=$(this).innerWidth();
				if(nena=="617"){
					var tpost=$(this).contents().find("body").html();
					
tpost=tpost.replace(\'&lt;photo id="\'+aid+\'" /&gt;\',\'\');

$(this).contents().find("body").html(tpost);


}
        }); 
		
	}
});
}

		function updateu(suc,aid,h,caption,layout,nearest){
			if(!caption){caption="";}
			if(!layout){layout="0";}
			
			$("#no_photos").css("display","none");

			if(h>100){h=h-2;}
			else{h=98;}
			aid=parseInt(aid);
var aidv=aid-1;
if(aidv=="0"){aidv="w";}

if(nearest){
aidv=nearest;
}


var h=0;
$(\'#note_photo\'+aidv).after(\'<div id="note_photov\'+aid+\'" style="display:block;" class="clearfix"><div class="uiHeaderTopBorder uiHeaderNav" style="margin-left:0px;"><div><div><h4 tabindex="0" style="outline: medium none;color:gray;">&lt;Photo \'+aid+\'&gt;</h4></div></div></div><div class="editnotephotobox"><img class="img" src="/'.$uid.'/pics/\'+suc+\'" alt=""><label class="uiCloseButton uiCloseButtonDark" style="position:absolute;right:1px;top:1px;"><input title="Remove" onclick="photo_remove(\'+aid+\'); return false;" type="button" style="font-weight:normal;"></label></div><div class="pll editNoteCaptionBox" style="float:left;"><div class="fsm fwn fcg">Caption:</div><textarea class="editNoteCaption" id="photo_caption\'+aid+\'" name="photo_caption" style="height: 28px;">\'+caption+\'</textarea></div><div class="pll editNoteLayoutBox" style="float:left;"><div class="fsm fwn fcg">Layout:</div><a class="align0 icon_off" id="alignment_\'+aid+\'_icon0" onclick="photoalign(\'+aid+\',0); return false;" href="#" onmouseover="$(this).removeClass(\\\'icon_off\\\'); $(this).addClass(\\\'icon_on\\\');" onmouseout="$(this).removeClass(\\\'icon_on\\\'); $(this).addClass(\\\'icon_off\\\');"> </a><a class="align1 icon_off" id="alignment_\'+aid+\'_icon1" onclick="photoalign(\'+aid+\',1); return false;" href="#" onmouseover="$(this).removeClass(\\\'icon_off\\\'); $(this).addClass(\\\'icon_on\\\');" onmouseout="$(this).removeClass(\\\'icon_on\\\'); $(this).addClass(\\\'icon_off\\\');"> </a><a class="align2 icon_off" id="alignment_\'+aid+\'_icon2" onclick="photoalign(\'+aid+\',2); return false;" href="#" onmouseover="$(this).removeClass(\\\'icon_off\\\'); $(this).addClass(\\\'icon_on\\\');" onmouseout="$(this).removeClass(\\\'icon_on\\\'); $(this).addClass(\\\'icon_off\\\');"> </a><a class="align3 icon_off" id="alignment_\'+aid+\'_icon3" onclick="photoalign(\'+aid+\',3); return false;" href="#" onmouseover="$(this).removeClass(\\\'icon_off\\\'); $(this).addClass(\\\'icon_on\\\');" onmouseout="$(this).removeClass(\\\'icon_on\\\'); $(this).addClass(\\\'icon_off\\\');"> </a><input type="hidden" id="photo_aligned\'+aid+\'" class="photo_aligned" value="\'+layout+\'"></div></div></div><div id="note_photo\'+aid+\'" style="height:\'+h+\'px;"></div>\');

$("#alignment_"+aid+"_icon"+layout).addClass("icon_onv");

$("iframe").each(function() {
                var nena=$(this).innerWidth();
				if(nena=="617"){
					var tpost=$(this).contents().find("body").html();
					
if(strpos(tpost,\'&lt;photo id="\'+aid+\'" /&gt;\')===false){
tpost=removeLastInstance("<p><br></p>",tpost);
$(this).contents().find("body").html(tpost+\'&lt;photo id="\'+aid+\'" /&gt;\');
}

}
        }); 

		


		}';
		
$r=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND id='$uid' ORDER BY datetimep ASC");


while($m=mysql_fetch_array($r)){	

$aid=$m['aid'];

$nearest='w';
$r2=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND aid < $aid ORDER BY primary2 DESC LIMIT 1");
while($m2=mysql_fetch_array($r2)){
$nearest=$m2['aid'];	
}

$suc=$m['pf2'];

$sh=$m['sh'];

$h=$sh;
$caption=$m['caption'];
$layout=$m['css_class'];

$echo.='updateu(\''.$suc.'\',\''.$aid.'\',\''.$h.'\',\''.$caption.'\',\''.$layout.'\',\''.$nearest.'\');';
		
}

$echo.='		
		
function saveci(w){
	if(w==4){var vis="v";}
	else if(w==3){var vis="i";}
	else if(w==2){var vis="i";}
	else if(w==1){var vis="v";}
$("iframe").each(function() {
                var nena=$(this).innerWidth();
				if(nena=="617"){
					var tpost=$(this).contents().find("body").html();
$("#tpost").val(tpost);

				}
        }); 
		var tpost=$("#tpost").val();
var title=$("#note_title").val();
var new_note=$("#new_note").val();
var tags=$("#tagsnote_tags").val();

var captions=new Array();
var x=0;
		
var vara=\'[name=photo_caption]\';
$(vara).each(function(){
var did=$(this).attr("id");
did=did.replace("photo_caption","");
captions[x]=did+"{}"+$(this).val();
x++;
});


var alignment=new Array();
var x=0;
		
$(".photo_aligned").each(function(){
var did=$(this).attr("id");
did=did.replace("photo_aligned","");
alignment[x]=did+"{}"+$(this).val();
x++;
});


		$.ajax({
  type: "POST",
  url: "notes/notes_post.php",
  data: {tpost:tpost,title:title,vis:vis,new_note:new_note,tags:tags,captions:captions,alignment:alignment},
  success: function(response) {
//alert(response);
	  if(response=="e"){
		$("#p_note_failed").css("display","block");  
	  }
	  else{
if(w==4){
window.location="/note.php?saved&note_id="+response;	

}
else if(w==3){
window.location="/'.$un.'?sk=notes_drafts";	
}
else if(w==2){
window.location="/note.php?saved&preview&note_id="+response;	
}
else{
window.location="/'.$un.'?sk=notes";		
}
	  }
	}
});
		

}
		</script>
</div>
</div>
</div>
</td>
</tr>
<tr>
<td colspan="2" class="spacer">
<hr>
</td>
</tr>
<tr>
<th class="mcwrap_th">Privacy:</th>
<td class="mcwrap_td"><div class="mcwrap_div" style="background:transparent;border:0;padding-top:0px;">';
$uidv=$uid;

$ltypev="nt";

$sbid=$sbid;

$nfjax="";
$data_t='data-t_topleft="t"'; 

$echo.='<ul class="uiList inlineBlock" style="position:relative;top:0px;">';


$privacy_configuration="big";
$privacy_source="ea"; //gallery viewer

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

$echo.='
</div>
</td>
</tr>
<tr>
<td colspan="2" class="spacer">
<hr>
</td>
<tr><th></th>
<td class="mcwrap_td" style="text-align:left;padding-top:3px;">
<div style="float:left;margin:0;padding:0;">';
if($vis=='v'){
$echo.='<label class="note_publish" onclick="saveci(4);"><input type="button" value="Save"></label><a class="note_preview" style="padding: 2px 6px;" onclick="confirm_dialog(\''.$sbid.'\');"><span>Delete</span></a><a href="/'.$un.'?sk=notes" class="note_preview" style="padding: 2px 6px;"><span>Cancel</span></a>
';
}
else{
$echo.='<label class="note_publish" onclick="saveci(1);"><input type="button" value="Publish"></label><label class="note_preview" onclick="saveci(2);"><input type="button" value="Preview"></label><label class="note_preview" onclick="saveci(3);"><input type="button" value="Save Draft"></label><a class="note_preview" style="padding: 2px 6px;" onclick="confirm_dialog(\''.$sbid.'\');"><span>Discard</span></a>';
}
$echo.='
<script type="text/javascript">
function delete_note(w){
cancel_note2();
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
$("#notesv2").unbind("click");
$("#notesv2").click(function(){delete_note(w);});
$("#ppc_note2").css("display","block");
}
</script>
</div>
</td></tr>
</table>

</td>
</tr>

</table>
</div>
<div class="contentcurve" style="background-color:rgb(242, 242, 242);"></div>
</div>
';
$warn_us='f';
if($warn_us=='t'){
$echo.='
<script type="text/javascript">


window.onbeforeunload = function() { 
var warning=$("#custom_leave_warning").val();
if(warning=="t") {
    return "This page is asking you to confirm that you want to leave - data you have entered may not be saved.";
  }
}
function custom_leave(w){
var h=$(w).attr("href");
var c=$(w).attr("onclick");

$("#notesv").unbind("click");
$("#notesv").click(function(){$("#ppc_note").fadeOut("slow",function(){

}); $(w).click();});
$("#ppc_note").css("display","block");
}
$("a","div","span").click(function() {
	if($(this).hasClass("note_preview")===true){}
	else{
var custom_leave_warningv=$("#custom_leave_warningv").val();
   if(custom_leave_warningv=="t"){
	var c=$(this).attr("onclick");
	if(c){bananas=null; window.onbeforeunload = null; $(this).click();}
else{
	 custom_leave($(this));
	 $("#custom_leave_warningv").val("f");
	 $("#custom_leave_warning").val("f");
   return false;
	}
   }
   else{
var h=$(this).attr("href");
if(h){window.location=h;}
}
	}
});

$("label").click(function() {$("#custom_leave_warning").val("f");});

</script>
';
}
$echo.='
<input type="hidden" id="custom_leave_warning">
<input type="hidden" id="custom_leave_warningv">
<script type="text/javascript">
$("#custom_leave_warningv").val("t");
$("#custom_leave_warning").val("t");
</script>';

$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';


$uti=sb_user($uid);

$params['left_column_id']="browse_notes_a";
$params['left_column']='<div class="mbm clearfix">
<a style="margin-right:5px;float:left;">
<img style="display:block;height:50px;width:50px;" src="/'.$uid.'/pics/'.$uti['profilepict'].'">
</a>
<div class="pls" style="padding-top:1px;display:table-cell;vertical-align:top;">
<div class="lb fwb">
<a href="/'.$un.'">'.$uti['fullname'].'</a>
</div>
</div>
</div>
<div class="mvm">
<div role="navigation" class="uiFutureSideNav">
<div>
<div class="uiHeader uiHeaderTopBorder uiHeaderNav">
<div class="clearfix uiHeaderTop">
<div>
<h4 tabindex="0" class="uiHeaderTitle">
Browse Notes</h4>
</div>
</div>
</div>
<ul class="uiSideNav" style="list-style-type: none;margin: 0px;padding: 0px;">
<li class="sideNavItem stat_elem">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/notes/">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
Friends\' Notes
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_21">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/notes/pages/">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
Pages\' Notes
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_22">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/'.$un.'?sk=notes">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
My Notes
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_23">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/'.$un.'?sk=notes_drafts">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap noCount">
My Drafts
</div>
</div>
</a>
</li>
<li class="sideNavItem stat_elem" id="u6r7um_24">
<div class="buttonWrap">
</div>
<a class="item clearfix" href="/'.$un.'?sk=notes_tagged">
<div>
<span class="imgWrap">
<i class="notes_notebook">
</i>
</span>
<div class="linkWrap">
Notes About Me
</div>
</div>
</a>
</li>
</ul>
</div>
</div>
<div class="uiTypeahead mas">
<div class="wrap">
<div class="oinnerWrap" style="height:auto;margin-left:0;border:none;margin-top:0;">
<input class="inputtext textInput dcphc" placeholder="Jump to Friend or Page" aria-autocomplete="list" aria-expanded="false" aria-invalid="false" role="combobox" spellcheck="false" value="Jump to Friend or Page" aria-label="Jump to Friend or Page" type="text" id="jump_note">
</div>
</div>
</div>

</div>

<script type="text/javascript">
			$(function() {
		$( "#jump_note" ).autocomplete({
			minLength: 1,
			autoFocus: true,
			source: function(request, response) {
                $.ajax({
                  url: \'autocomplete/jump_note.php\',
                  dataType: "json",
                  data: {term:request.term},
                  success: function(data) {
                    response(data);
                  }
                });
            },
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
			var ilusert=ui.item.url;
			window.location="/"+ilusert+"?sk=notes";
						return false;					
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {			
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a><img src="\'+item.imgurl+\'" style="width:50px;height:50px;">\' + \'<span style="position:relative;top:-34px;right:-5px;font-weight:bold;">\'+item.value + \'</span></a>\' )
				.appendTo( ul );
		};
	});
</script>
';
$params['layout']='left_column_n';


include("end.php");
?>