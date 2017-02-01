<?php
include("start.php");

include("populate_page.php");
$params['style']='
<style type="text/css">
.invitet{
	    margin: 0px;
    padding: 0px;
    line-height: 20px;
    min-height: 20px;
    padding-bottom: 2px;
    vertical-align: bottom;
    padding-left: 22px;
    outline: medium none;
    color: rgb(28, 42, 71);
    font-size: 16px;
    font-size: 13px;
    color: rgb(51, 51, 51);
}
.friendslinkv a:link{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslinkv a:visited{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslinkv a:active{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}
.friendslinkv a:hover{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}
.invitetv{
    top: 2px;
    background-position: 0px 0px;
    background-image: url("/images/CIyLiUBzt7x.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    width: 16px;
    left: 0px;
    position: absolute;
    line-height: 20px;
    color: rgb(28, 42, 71);
    font-size: 16px;	
}
body{color:#333333;}
body{font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;text-align:left;direction:ltr;line-height: 1.28;}
.invitew{
	margin-top:16px;
    margin-bottom: 20px;
    padding-top: 20px;
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(204, 204, 204);
}
.invitec{
    color: rgb(102, 102, 102);
    font-weight: bold;
	    padding: 3px 0px 1px;
    padding-right: 10px;
    text-align: right;
    width: 130px;

    vertical-align: top;
    border-collapse: collapse;
    border-spacing: 0px;
    font-size: 11px;	
}
.sendinv{
    text-decoration: none;
    background-image: url("/images/YzqB-cbQrzX.png");
    background-repeat: no-repeat;
    background-position: -352px -54px;
    background-color: rgb(91, 116, 168);
	   border-width: 1px;
    border-style: solid;
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
    color: #ffffff;
    font-weight: bold;
    vertical-align: middle;
   text-align: left;
   font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;	
}
.sendinv:active{
background:#4f6aa3;
border:1px solid #29447e;
}
.sendinv2{
    color: rgb(255, 255, 255);
    background: none repeat scroll 0% 0% transparent;
    border: 0px none;
    cursor: pointer;
    display: inline-block;
    font-family: \'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
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
  text-align: left;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;	
}
.cancelinv{
    margin-left: 4px;
   background-image: url("/images/YzqB-cbQrzX.png");
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
    color: #3b5998;
    text-decoration: none;
    text-align: left;	
}
.cancelinv:active{
background-image: url("/images/YzqB-cbQrzX.png");
background-repeat: no-repeat;
background-position: -352px -348px;
background-color: rgb(238, 238, 238);
border-width: 1px;
border-style: solid;
border-color: rgb(153, 153, 153) rgb(153, 153, 153) rgb(136, 136, 136);		
}
.cancelinv2{
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
    padding: 1px 0px 2px;
    white-space: nowrap;
    cursor: pointer;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    text-align: center;
    white-space: nowrap;
    cursor: pointer;
    color: #3b5998;
}
.invitemf a:link{
text-decoration:none;
font-size:11px;
font-weight:bold;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
color:#3b5998;
}
.invitemf a:visited{
text-decoration:none;
font-size:11px;
font-weight:bold;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
color:#3b5998;
}
.invitemf a:active{
text-decoration:underline;
font-size:11px;
font-weight:bold;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
color:#3b5998;
}
.invitemf a:hover{
text-decoration:underline;
font-size:11px;
font-weight:bold;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
color:#3b5998;
}
body table td{font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;color:#333333;}
</style>';
$echo.='
<script type="text/javascript">
function autoGrowFieldinv(f, max) {
   var max = (typeof max == "undefined")?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != "scroll") { f.style.overflowY = "scroll" }
      return;
   }
   if (f.style.overflowY != "hidden") { f.style.overflowY = "hidden" }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,"") ){
      f.style.height = scrollH+5+"px";
   }
}
</script>';

$result=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($ms=mysql_fetch_array($result)){
$fullname=$ms['fullname'];
$cuseremail=$ms['email'];	
}
$echo.='
<script type="text/javascript">
function invitef(){
var to=$("#to_invites").val();
to=$.trim(to);
if(to==""){return false;}
var opm=$("#messageinv").val();

	$.ajax({
  async: "false",
  type: "POST",
  url: "send_invites.php",
  data: {emails:to,opm:opm},
  success: function(response) {

$("#invitet").css("border-bottom","1px solid rgb(170, 170, 170)");
$("#invitet").css("padding","6px 0px 16px");
$("#invitet").css("padding-left","22px");

$("#invitew").html("");
$("#invitew").removeClass("invitew");
$("#invitew").html(response);
}
});
	
}
</script>

<div class="invitet" id="invitet" style="font-weight:bold;font-size:16px;position:relative;width:600px;">
<i class="invitetv"></i>
Invite Your Friends
</div>
<div id="invitew" class="invitew" style="width:600px;">
<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<tr><td class="invitec">From:</td><td>'.$fullname.' &#60;'.$cuseremail.'&#62;</td></tr>
<tr><td class="invitec"><label for="to_invites" style="cursor:pointer;">To:<div style="font-size: 9px;cursor: pointer;color: rgb(153, 153, 153);font-weight: bold;text-align: right;">(use commas to separate emails)</div></label></td>
<td>
<textarea rows="4" style="width: 252px;overflow: hidden;max-width: 100%;border: 1px solid rgb(189, 199, 216);font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;font-size: 11px;margin: 0px;padding: 3px;text-align: left;" id="to_invites" name="to_invites" onkeyup="autoGrowFieldinv(this,800);"></textarea>
</td></tr>
<tr><td class="invitec"><label for="messageinv">Message:<div style="font-size: 9px;cursor: pointer;color: rgb(153, 153, 153);font-weight: bold;text-align: right;">(optional)</div></label></td><td style="padding-top:5px;"><textarea rows="6" style="width: 252px;overflow: hidden;max-width: 100%;border: 1px solid rgb(189, 199, 216);font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;font-size: 11px;margin: 0px;padding: 3px;text-align: left;" id="messageinv" name="messageinv" onkeyup="autoGrowFieldinv(this,800);"></textarea></td></tr>
<tr><td style="height:30px;" colspan="2">&nbsp;</td></tr>
<tr><td></td><td><label class="sendinv" onclick="invitef();"><input class="sendinv2" type="button" value="Invite Your Friends"></label><label class="cancelinv" onclick="window.location=\'/\'"><input type="button" style="color:#333333;" class="cancelinv2" value="Cancel"></label></td></tr>
</table>

<div style="position:relative;left:155px;margin:0;padding:0;width:310px;color:gray;margin-top:30px;padding-bottom:20px;text-decoration:none!important;cursor:default!important;" class="friendslinkv">
Please send invites only to people you know personally who will be glad to get them. We\'ll automatically send up to 3 reminders after the first invite. <a href="#" onclick="return false;">Learn more</a> or <a href="#" onclick="return false;">see sample</a>.
</div>

</div>
';

$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='right_column_w_no_borders';


include("end.php");
?>