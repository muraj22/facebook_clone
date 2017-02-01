<?php
include("start.php");

include("populate_page.php");
$params['style']='
<style type="text/css">
.invssent{
   margin-bottom: 20px;
   padding: 10px;
    background-color: rgb(255, 249, 215);
    border: 1px solid rgb(226, 200, 34);	
}
.yesinv{
    padding: 2px 15px;
    text-decoration: none;
    font-size: 13px;
    line-height: 16px;
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
    color: rgb(102, 102, 102);
    font-weight: bold;
    vertical-align: middle;
   text-align: right;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
}
.yesinv:active{
 background:#4f6aa3;
 border-color:#29447e;
}
.yesinv2{
   font-size: 13px;
    line-height: 16px;
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
    text-align: right;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
}
.skipa{
   text-decoration: none;
    margin-left: 4px;
   font-size: 13px;
    line-height: 16px;
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
    color: rgb(102, 102, 102);
    font-weight: bold;
    vertical-align: middle;
    word-wrap: break-word;
}
.noinv{
    text-decoration: none;
    margin-left: 4px;
    font-size: 13px;
    line-height: 16px;
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
    color: rgb(102, 102, 102);
    font-weight: bold;
    vertical-align: middle;
    text-align: right;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
}
.noinv2{
    font-size: 13px;
    line-height: 16px;
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
    text-align: right;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
}
.skipa2{
    font-size: 13px;
    line-height: 16px;
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
.addfriendsb{
    text-decoration: none;
    font-size: 13px;
    line-height: 16px;
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
    color: rgb(102, 102, 102);
    font-weight: bold;
    vertical-align: middle;
    word-wrap: break-word;
}
.addfriendsb2{
    font-size: 13px;
    line-height: 16px;
  color: rgb(255, 255, 255);
   background: none repeat scroll 0% 0% transparent;
    border: 0px none;
    color: #ffffff;
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
   word-wrap: break-word;
}
.selectallf a:link{
font-size:11px;text-decoration:none;color:#808080;
}
.selectallf a:visited{
font-size:11px;text-decoration:none;color:#808080;
}
.selectallf a:active{
font-size:11px;text-decoration:underline;color:#808080;
}
.selectallf a:hover{
font-size:11px;text-decoration:underline;color:#808080;
}
.tableself{
    border-width: 1px 1px medium;
    border-style: solid solid none;
    border-color: rgb(153, 153, 153) rgb(153, 153, 153) -moz-use-text-color;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-image: none;
    background: url("/images/kydW4TGqmI9.png") repeat scroll 0px 0px rgb(238, 238, 238);
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.tableselfv{
    background: url("/images/epnsA9GpSGe.png") repeat scroll 0px 0px rgb(238, 238, 238);
    border-width: 1px 1px medium;
    border-style: solid solid none;
    border-color: rgb(153, 153, 153) rgb(153, 153, 153) -moz-use-text-color;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-image: none;
    line-height: normal !important;
    vertical-align: middle;
    white-space: nowrap;
    margin-top: 5px;
    border-collapse: collapse;
    border-spacing: 0px;	
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
body{
font-size:11px;
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
text-align:left;
line-height:1.28;
direction:ltr;	
}
.friendstitlewrapper{
padding:6px 0pt 16px;
word-wrap:break-word;	
}
.friendstitle{
line-height:20px;
min-height:20px;
padding:0;
padding-bottom:2px;
vertical-align:bottom;
padding-left:22px;
outline:medium none;
color:rgb(28,42,71);
font-size:16px;
margin:0;
word-wrap:break-word;
font-weight:bold;
}
.friendstitleicon{
position:absolute;
left:0pt;
top:2px;
height:16px;
background-image:url("/images/wnW-cz2rWzB.png");
background-position:-68px -531px;
background-repeat:no-repeat;
display:inline-block;
width:16px;
line-height:20px;
}
.partback{
background:url("/images/SiholkfAnQs.png");
width:3px;
height:51px;
float:left;
background-position:-21px 0pt;
}
.partback2{
width:3px;
background:transparent;
float:left;
height:51px;
}
.partback3{
background-image:url("/images/bCkzCoFKSYE.png");
    background-repeat: no-repeat;
    background-position: -1px -52px;
    width: 21px;
   float: left;
    height: 51px;
    list-style-type: none;
   list-style: none outside none;
   word-wrap: break-word;

}
.partmiddle, .partmiddle2{
background:url("/images/MZW8R4cXlo9.png") repeat scroll 0% 0% transparent;
float:left;
height:51px;
color:#ffffff;
font-weight:bold;
font-size:13px;
text-align:center;
width:80px;
}
.partmiddle2{
background:url("/images/e8iPvmYALrW.png") repeat scroll 0% 0% transparent;
color:#333333;
}
.partfront, .partfront2{
background:url("/images/SiholkfAnQs.png") repeat scroll 0% 0% transparent;
float:left;
height:51px;
width:21px;
}
.partfront2{
background-position:-30px 0pt;
}
.stepswrapper{
background:url("/images/e8iPvmYALrW.png") repeat scroll 0% 0% transparent;
height:51px;
margin:0;
padding:0;
margin-top:5px;
margin-bottom:5px;
}
.ffwrapper{
padding-left:10px;
padding-right:10px;
padding-top:5px;
padding-bottom:5px;
border-width:1px 0pt 0pt;
border-style:solid;
display:block;
border-color:rgb(216,223,234);	
width:473px;
height:35px;
cursor:pointer;
z-index:4;
}
.ffwrapper:hover{background-color:#edeff4;}
.ffwrapper2{padding-left:10px;
padding-right:10px;
padding-top:5px;
padding-bottom:5px;
border-width:1px 0pt 0pt;
border-style:solid;
display:block;
border-color:rgb(216,223,234);	
width:473px;
height:auto;
min-height:35px;
background-color:#edeff4;
cursor:default;
}
.ffwrapper2:hover{background-color:#edeff4;}
.ffbutton{
background-image:url("/images/wnW-cz2rWzB.png");
background-repeat:no-repeat;
background-position:0pt -98px;
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
font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
padding-top:2px;
padding-bottom:2px;
padding-left:6px;
padding-right:6px;
}
.candado{
width:9px;
background-image:url("/images/E75W0JjLn8o.png");
background-position:-190px -118px;	
background-repeat:no-repeat;
height:16px;
text-align:left;
}
#ffwrapper2v,#ffwrapper3v,#ffwrapper4v,#ffwrapper5v{display:none;}
.face{
border:2px solid #ffffff;
}
</style>';

$echo.='
<div id="pre_pop_container" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owidth_msgv">

<div class="pop_container3" id="pop_containervvo" style="height:78px;display:block;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervo">Importing Contacts</div>
<div class="div_dialog_body3" id="div_dialog_bodyvo" style="height:26px;">
<div id="innerinvm" style="margin:0;padding:0;display:inline-block;"></div>
<div id="pprogi" style="margin:0;padding:0;width:400px;height:20px;border-top:1px solid #a4a4a4;border-bottom:1px solid #d5d5d5;border-left:1px solid #a4a4a4;border-right:1px solid #bbbbbb;display:block;position:relative;">
<div id="progi" style="margin:0;padding:0;font-size:11px;color:#333333;background:#6d84b4;border:1px solid #3b5998;width:0;height:100%;position:absolute;left:-1px;top:-1px;"><span style="display:inline-block;padding-left:6px;position:absolute;top:2px;">Processing...</span></div>
</div>

</div><div class="div_dialog_footer3" style="height:28px;display:none;" id="div_dialog_footerv"><label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:23px;" onclick="close_dia();"><input type="button" value="Okay" class="uiButtonText"></label></div></div></div></div>

</div>

<div style="width:493px;margin-left:20px;" id="renewsteps">
<div class="friendstitlewrapper">
<div class="friendstitle" style="position:relative;"><div class="friendstitleicon"></div>Friends</div>
</div>';

if(isset($_GET['invites_sent_now'])){
$tin=$_GET['invites_sent_now'];
if($tin>1){$suffa='s';}
else{$suffa='';}
$echo.='
<div class="invssent">You sent '.$tin.' invite'.$suffa.'.</div>
';
}
$echo.='
<div style="background-color: rgb(242, 242, 242);border-bottom: medium none;border-top: 1px solid rgb(226, 226, 226);padding: 4px 6px 5px;font-weight:bold;color:#333333;">
Add Personal Contacts as Friends
</div>

<div class="stepswrapper">
 
<div class="partback"></div>
<div class="partmiddle" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 1</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Find Friends</div></div>
<div class="partfront"></div>

<div class="partmiddle2" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 2</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Add Friends</div></div>
<div class="partfront2"></div>

<div class="partmiddle2" style="position:relative;"><div style="position:absolute;top:8px;left:8px;margin:0;padding:0;">Step 3</div><div style="position:absolute;margin:0;padding:0;left:8px;top:25px;font-size:11px;font-weight:normal;">Invite Friends</div></div>
<div class="partfront2"></div>

</div>
<input type="hidden" id="activeincrease" value="1">
<input type="hidden" id="activeincrease2" value="">

<input type="hidden" id="bigheight" value="160">
<input type="hidden" id="bigheightv" value="160">
<input type="hidden" id="lessheight" value="35">

<input type="hidden" id="bigheight2" value="160">
<input type="hidden" id="lessheight2" value="35">

<script type="text/javascript">
$("#activeincrease").val("");
$("#activeincrease2").val("");
$("#bigheight").val("");
$("#bigheightv").val("");
$("#lessheight").val("35");
$("#bigheight2").val("");
$("#lessheight2").val("35");
</script>

<div id="mstoggler" style="display:none;"></div>
';

include("browser_detect.php");

$browser=browser_detection('browser');
if($browser=="mozilla"){
$bigheight='3';
$bigheight1v='35';
$bigheight2v='37';
$bigheight3v='37';
$bigheight4v='35';
$bigheight5v='37';
$lessheight='3';
$lessheight1v='125';
$lessheight2v='98';
$lessheight3v='93';
$lessheight4v='68';	
$lessheight5v='59';	
}
else{
$bigheight='2';
$bigheight1v='35';
$bigheight2v='36';
$bigheight3v='36';
$bigheight4v='36';
$bigheight5v='36';
$lessheight='2';
$lessheight1v='125';
$lessheight2v='99';	
$lessheight3v='93';	
$lessheight4v='67';	
$lessheight5v='59';	
}

$echo.=
'
<script type="text/javascript">

if(dcontacts_api===undefined){
var dcontacts_api="t";

var dede_email=new Array();
var dede_name=new Array();

var rnt;

function close_dia2(){
	$("#pop_containervvo").css("height","78px");
$("#div_dialog_headervo").html("Importing Contacts");
$("#div_dialog_headervo").css("display","inline-block");
$("#div_dialog_footerv").css("display","none");
$("#innerinvm").css("display","none");
$("#pprogi").css("display","block");	
$(\'#progi\').html(\'<span style="display:inline-block;padding-left:6px;position:absolute;top:2px;">Processing...</span>\');
$("#progi").css("width","0");	
}
function close_dia(){
clearTimeout(rnt);
$("#pre_pop_container").fadeOut("slow");
setTimeout("close_dia2()",400);
}

function resetfr(){
	
}

function iuploading(){

var twidth=$("#progi").css("width");
twidth=twidth.replace("px","");
twidth=parseInt(twidth);

twidth=twidth+2;
$("#progi").css("width",twidth+"px");

if(twidth=="360"){clearTimeout(rnt);}	
else if(twidth>200){rnt=setTimeout("iuploading()",400);}
else{rnt=setTimeout("iuploading()",200);}

}



var clientId = "00000000480CEC69",  
redirectUri = "http://www.subsbook.com/oauth/microsoft_callback.php";

$(document).ready(function(){
wlInitTimeout=false;

function initWL(){
if(typeof WL !== "undefined" ){
clearTimeout(wlInitTimeout);
WL.init({ client_id: clientId, redirect_uri: redirectUri });

$("#mstoggler").bind("click",function(){
WL.login({ scope: "wl.basic" }).then(
    function(response) {
        getContacts();
    },
    function(response) {
        construct_ms("Could not connect, status = " + response.status);
    }
);
});

function getContacts() {
    WL.api({ path: "/me/contacts", method: "GET" }).then(
        onGetContacts,
        function(response) {
            construct_ms("Cannot get contacts: " + JSON.stringify(response.error).replace(/,/g, ",\n"));
        }
    );
}

var ilength=0;
function onGetContacts(response) {
	$("#pre_pop_container").css("display","block");
iuploading(); 
    var items = response.data;
	ilength=items.length;
    for (var i = 0; i < 1000; i++) {
        if (i > items.length) {
	
            break;
        }


        getContactProperties(items[i].id);
    }
 }

function getContactProperties(contactId) {
    WL.api({ path: contactId, method: "GET" }).then(onGetContactProperties);
}


function onGetContactProperties(response) {
    construct_ms(JSON.stringify(response).replace(/,/g, ",\n"));
} 



var iv=0;
var dede="";         

var ax=0;

function construct_ms(message) {

var dedev=$.parseJSON(message);

dede_email[ax]=dedev.email_hashes;
dede_name[ax]=dedev.name;

ax++;
iv++;

if(iv==1000 || iv==ilength){//alert("sefue"); 
retrieve_contacts_b("microsoft");}

}


function retrieve_contacts_a(w){
if(w=="gmail"){
var dleft=Math.ceil(Math.floor((screen.width-550)/2));
if(window.open("http://subsbook.com/oauth/index_google.php", "Gmail Find Friends", "width=550, height=550, left="+dleft+", top=100, scrollbars,resizable")){}
else{
$("#gmail_friendsm").click();
}


}
else if(w=="yahoo"){
var dleft=Math.ceil(Math.floor((screen.width-500)/2));
if(window.open("http://subsbook.com/oauth/index_yahoo.php", "Yahoo Find Friends", "width=500, height=500, left="+dleft+", top=100, scrollbars,resizable")){}
else{
$("#yahoo_friendsm").click();
}

}
else if(w=="msn"){$("#mstoggler").click();}
else if(w=="hotmail"){$("#mstoggler").click();}
}


function submitst(w){
//alert(2+w);
 var state="";
if(w=="gmail"){var email=$("#gmailinputv").val(); var provider="google";}
else if(w=="yahoo"){var email=$("#yahooinputv").val(); var provider="yahoo";}
else if(w=="msn"){var email=$("#msninputv").val(); var provider="microsoft";}
else if(w=="hotmail"){var email=$("#hotmailinputv").val(); var provider="microsoft";}

	$.ajax({
  async: "false",
  type: "POST",
  url: "find_friendsp.php",
  data: {email:email,provider:provider,state:state},
  success: function(response) {//alert(response);
if(response=="n5"){
$("#pop_containervvo").css("height","123px");
$("#div_dialog_headervo").html("Contact Importer Error");
$("#div_dialog_headervo").css("display","inline-block");
$("#div_dialog_footerv").css("display","inline-block");
$("#innerinvm").html("The import has been blocked for being spammy or unsafe.");
$("#innerinvm").css("display","inline-block");
$("#pprogi").css("display","none");
resetfr();
}
else if(response=="n4"){
$("#pop_containervvo").css("height","123px");
$("#div_dialog_headervo").html("Invalid Login");
$("#div_dialog_headervo").css("display","inline-block");
$("#div_dialog_footerv").css("display","inline-block");
$("#innerinvm").html("Invalid username or password");
$("#innerinvm").css("display","inline-block");
$("#pprogi").css("display","none");
resetfr();
}
else if(response=="n2"){
$("#pop_containervvo").css("height","123px");
$("#div_dialog_headervo").html("No New Contacts");
$("#div_dialog_headervo").css("display","inline-block");
$("#div_dialog_footerv").css("display","inline-block");
$("#innerinvm").html("We could not find any new contacts to invite");
$("#innerinvm").css("display","inline-block");
$("#pprogi").css("display","none");
resetfr();
}
else if(response=="n3"){
$("#pop_containervvo").css("height","123px");
$("#div_dialog_headervo").html("No Contacts");
$("#div_dialog_headervo").css("display","inline-block");
$("#div_dialog_footerv").css("display","inline-block");
$("#innerinvm").html("We couldn\'t find any contacts. Please try another account.");
$("#innerinvm").css("display","inline-block");
$("#pprogi").css("display","none");	
resetfr();
}
else{
retrieve_contacts_a(w);
}
}
});
	
}
function sps(w){
var wv=w+"vv";
$("#"+w).css("display","none"); $("#"+wv).css("display","block"); $("#"+wv).focus();
}

function spsv(w,v,wv){
if(wv=="1"){wv="msn";}
else if(wv=="2"){wv="gmail";}
else if(wv=="3"){wv="live";}
else if(wv=="4"){wv="yahoo";}
wv=wv+"pass";
if(v==""){$("#"+w).css("display","none"); $("#"+wv).css("display","block");}	
}

function cutlast(w){

var l=w.length-1;
w=w.substr(0,l);

return w;	
}

if(psubmit===undefined){
var psubmit="t";
$(document).on("click",".psubmit",function(){
submitst($(this).attr("data-provider"));	
});
}

function submitfr(w){//alert(2);
if(w=="msnf"){submitst(\'msn\');}
if(w=="gmailf"){submitst(\'gmail\');}
if(w=="hotmailf"){submitst(\'hotmail\');}
if(w=="yahoof"){submitst(\'yahoo\');}
return false;
}


} else{
$.doTimeout(100,function(){
initWL();
});
//wlInitTimeout=setTimeout("initWL()",100);	
}
} //finish function wlinit

initWL();

}); //finish document.ready

//alert(5);
}
</script>


<div data-d_okay="Okay" data-d_title="Make Uploads Easier" data-d_okay_function="close_dialog_custom" data-d_okay_function="close_dialog" class="displaydialog displaynoneimportant" data-d_yahoo_blocked="t" id="yahoo_friendsm"></div><div class="dialog_msgs">It appears you have a pop-up blocker installed. To make finding your friends easier in the future (and avoid seeing this message) add Upfrev as an exception in your pop-up blocker preferences.</div>

<div data-d_okay="Okay" data-d_title="Make Uploads Easier" data-d_okay_function="close_dialog_custom" data-d_okay_function="close_dialog" class="displaydialog displaynoneimportant" data_d_gmail_blocked="t" id="gmail_friendsm"></div><div class="dialog_msgs">It appears you have a pop-up blocker installed. To make finding your friends easier in the future (and avoid seeing this message) add Upfrev as an exception in your pop-up blocker preferences.</div>

<div id="ffwrapper1" data-unslided="" data-slideid="1" class="ffwrapper2 ff_accordion" style="z-index:4;position:relative;" onmouseover="document.getElementById(\'fflink1\').style.textDecoration=\'underline\';" onmouseout="document.getElementById(\'fflink1\').style.textDecoration=\'none\';">
<div class="msn" style="float:left;"></div>
<div style="height:35px;line-height:35px;">
<div style="vertical-align:middle;font-weight:bold;color:#333333;display:inline-block;">Windows Live Messenger</div></div>
<span style="color:#3b5998;text-decoration:none;cursor:pointer;display:none;position:absolute;right:10px;top:15px;" class="ff_link" data-unslided="" data-slideid="1" id="fflink1">Find Friends</span>


<div id="ffwrapper1v" data-unslided="" data-slideid="1" class="ff_accordionv" style="position:relative;margin:0;padding:0;">

<div style="position:relative;margin:0;padding:0;">

<form style="display:inline-block;margin:0;padding:0;width:100%;" method="POST" action="" id="msnf" onSubmit="javascript:return false;">
<table class="uiInfoTable noBorder">
<tr class="dataRow">
<th class="label" style="width:95px;">
<label for="msninput">Windows Live ID:</label>
</th>
<td class="data" style="padding-top:5px;">
<input type="text" id="msninput" name="msninput" onkeyup="$(\'#msninputv\').val($(this).val())" style="display:inline-block;margin-left:0;border:1px solid rgb(189,199,216);font-family:\'lucida grande\',tahoma,verdana,arial,sans-seriif;font-size:11px;margin:0;padding:3px;padding-bottom:4px;text-align:left;border-collapse:collapse;border-spacing:0pt;position:relative;left:0px;max-width:100%;">

<span style="margin-top:1px;">(your_email@example.com)</span>
</td></tr>
<tr class="dataRow">
<th class="label noLabel"></th>
<td class="data">
<input type="hidden" name="email" id="msninputv">

<input type="hidden" name="state" value="">
<input type="hidden" name="provider" value="Hotmail">

<label class="uiButton uiButtonConfirm psubmit" data-provider="msn"><input type="button" value="Find Friends"></label>
</td>
</tr>
<tr class="dataRow">
<th class="label noLabel"></th>
<td class="data">
<i class="candado" style="display:inline-block;float:left;margin-right:5px;"></i>
<div style="color:gray;text-align:left;display:inline-block;margin-top:1px;">Upfrev won\'t store your password.</div>
</td></tr></table>

</div>

</div>

</div>

<div id="ffwrapper4" data-unslided="" data-slideid="4" class="ffwrapper ff_accordion" style="position:relative;" onmouseover="document.getElementById(\'fflink4\').style.textDecoration=\'underline\';" onmouseout="document.getElementById(\'fflink4\').style.textDecoration=\'none\';"><div class="gmail" style="float:left;"></div>
<div style="height:35px;line-height:35px;">
<div style="vertical-align:middle;font-weight:bold;color:#333333;display:inline-block;">Gmail</div></div>

<span style="color:#3b5998;text-decoration:none;cursor:pointer;display:inline-block;position:absolute;right:10px;top:15px;" class="ff_link" data-unslided="" data-slideid="4" id="fflink4">Find Friends</span>

<div id="ffwrapper4v" data-unslided="" data-slideid="4" class="ff_accordionv" style="position:relative;margin:0;padding:0;"><div style="position:relative;margin:0;padding:0;">
<form style="display:inline-block;margin:0;padding:0;" action="" id="gmailf" onsubmit="javascript:return false;">

<table class="uiInfoTable noBorder">
<tr class="dataRow">
<th class="label" style="width:95px;"><label for="gmailinput">Your Email:</label></th>
<td class="data">
<input type="text" id="gmailinput" name="gmailinput" onkeyup="$(\'#gmailinputv\').val($(this).val())" style="margin-left:0;border:1px solid rgb(189,199,216);font-family:\'lucida grande\',tahoma,verdana,arial,sans-seriif;font-size:11px;margin:0;padding:3px;padding-bottom:4px;text-align:left;border-collapse:collapse;border-spacing:0pt;position:relative;left:0px;max-width:100%;">
</td></tr>

<tr class="dataRow"><th class="label notlabel"></th>
<td class="data">

<input type="hidden" name="email" id="gmailinputv"><input type="hidden" name="state" value=""><input type="hidden" name="provider" value="Gmail">
<label class="uiButton uiButtonConfirm psubmit" data-provider="gmail"><input type="submit" value="Find Friends"></label></td></tr></table></form></div></div></div>



<div id="ffwrapper2" data-unslided="" data-slideid="2" class="ffwrapper ff_accordion" style="position:relative;" onmouseover="document.getElementById(\'fflink2\').style.textDecoration=\'underline\';" onmouseout="document.getElementById(\'fflink2\').style.textDecoration=\'none\';">

<div class="hotmail" style="float:left;"></div>
<div style="height:35px;line-height:35px;">
<div style="vertical-align:middle;font-weight:bold;color:#333333;display:inline-block;">Windows Live Hotmail</div></div>

<span style="color:#3b5998;text-decoration:none;cursor:pointer;display:inline-block;position:absolute;right:10px;top:15px;" class="ff_link" data-unslided="" data-slideid="2" id="fflink2">Find Friends</span>


<div id="ffwrapper2v" data-unslided="" data-slideid="2" class="ff_accordionv" style="position:relative;margin:0;padding:0;">

<div style="position:relative;margin:0;padding:0;">

<form style="display:inline-block;margin:0;padding:0;width:100%;" action="" id="hotmailf" onSubmit="javascript:return false;">

<table class="uiInfoTable noBorder">
<tr class="dataRow">
<th class="label" style="width:95px;"><label for="hotmailinput">Your Email:</label></th>
<td class="data">
<input type="text" id="hotmailinput" name="hotmailinput" onkeyup="$(\'#hotmailinputv\').val($(this).val())" style="margin-left:0;border:1px solid rgb(189,199,216);font-family:\'lucida grande\',tahoma,verdana,arial,sans-seriif;font-size:11px;margin:0;padding:3px;padding-bottom:4px;text-align:left;border-collapse:collapse;border-spacing:0pt;position:relative;left:0px;max-width:100%;display:inline-block;">
</td></tr>

<tr class="dataRow"><th class="label notlabel"></th>
<td class="data">

<input type="hidden" name="email" id="hotmailinputv"><input type="hidden" name="state" value=""><input type="hidden" name="provider" value="Hotmail">
<label class="uiButton uiButtonConfirm psubmit" data-provider="hotmail"><input type="button" value="Find Friends"></label></td></tr></table>

</form></div></div></div>

<div id="ffwrapper3" data-unslided="" data-slideid="3" class="ffwrapper ff_accordion" style="position:relative;" onmouseover="document.getElementById(\'fflink3\').style.textDecoration=\'underline\';" onmouseout="document.getElementById(\'fflink3\').style.textDecoration=\'none\';">
<div class="yahoo" style="float:left;"></div>
<div style="height:35px;line-height:35px;">
<div style="vertical-align:middle;font-weight:bold;color:#333333;display:inline-block;">Yahoo</div></div>

<span style="color:#3b5998;text-decoration:none;cursor:pointer;display:inline-block;position:absolute;right:10px;top:15px;" class="ff_link" data-unslided="" data-slideid="3" id="fflink3">Find Friends</span>

<div id="ffwrapper3v" data-unslided="" data-slideid="3" class="ff_accordionv" style="position:relative;margin:0;padding:0;">

<div style="position:relative;margin:0;padding:0;">

<form style="display:inline-block;margin:0;padding:0;width:100%;" action="" id="yahoof" onSubmit="javascript: return false;">


<table class="uiInfoTable noBorder">
<tr class="dataRow">
<th class="label" style="width:95px;"><label for="yahooinput">Your Email:</label></th>
<td class="data">
<input type="text" id="yahooinput" name="yahooinput" onkeyup="$(\'#yahooinputv\').val($(this).val())" style="margin-left:0;border:1px solid rgb(189,199,216);font-family:\'lucida grande\',tahoma,verdana,arial,sans-seriif;font-size:11px;margin:0;padding:3px;padding-bottom:4px;text-align:left;border-collapse:collapse;border-spacing:0pt;position:relative;left:0px;max-width:100%;">
</td></tr>

<tr class="dataRow"><th class="label notlabel"></th>
<td class="data">

<input type="hidden" name="email" id="yahooinputv"><input type="hidden" name="state" value=""><input type="hidden" name="provider" value="Yahoo">
<label class="uiButton uiButtonConfirm psubmit" data-provider="yahoo"><input type="button" value="Find Friends"></label></td></tr></table>

</form></div></div></div>



<div id="ffwrapper5" data-unslided="" data-slideid="5" class="ffwrapper ff_accordion" style="position:relative;" onmouseover="document.getElementById(\'fflink5\').style.textDecoration=\'underline\';" onmouseout="document.getElementById(\'fflink5\').style.textDecoration=\'none\';">
<div class="othertools" style="float:left;"></div>
<div style="height:35px;line-height:35px;">
<div style="vertical-align:middle;font-weight:bold;color:#333333;display:inline-block;">Other Tools</div></div>

<span style="color:#3b5998;text-decoration:none;cursor:pointer;display:inline-block;position:absolute;right:10px;top:15px;" class="ff_link" data-unslided="" data-slideid="5" id="fflink5">Find Friends</span>

<div id="ffwrapper5v" data-unslided="" data-slideid="5" class="ff_accordionv" style="position:relative;margin:0;padding:0;">

<div style="position:relative;margin:0;padding:0;" class="friendslinkv">

<table class="uiInfoTable noBorder">
<tr class="dataRow">
<td style="width:40px;"></td>
<td class="data" style="text-align:left;width:100%;padding-top:0;padding-left:0;">
<a href="/invite.php">Invite A Friend By Email</a>
</td><td></td>
</tr>
</table>

</div>

</div>

</div>

</div>
<div id="thirdst" style="display:margin:0;padding:0;display:none;"></div>
<script type="text/javascript">

function retrieve_contacts_b(w){

if(w!="microsoft"){
dede_email=new Array();
dede_name=new Array();
$("#pre_pop_container").css("display","block");
iuploading(); //it is being triggered for microsoft on the bind of the click
}



	$.ajax({
  async: "false",
  type: "POST",
  url: "/find_friendsp.php",
  data: {provider:w,wildcard:\'t\',email : dede_email,name:dede_name},
  success: function(response) {//alert("aqui"+response);
if(strpos(response,\'var res=response.split("{}");\')!==false){

}
else{
var res=response.split("{}");
$("#pop_containervvo").css("height","78px");
$("#div_dialog_headervo").html("Importing Contacts");
$("#div_dialog_headervo").css("display","inline-block");
$("#div_dialog_footerv").css("display","none");
$("#innerinvm").css("display","none");
$("#pprogi").css("display","block");	
$(\'#progi\').html(\'<span style="display:inline-block;padding-left:6px;position:absolute;top:2px;">Finished</span>\');
$("#progi").css("width","400px");
close_dia();
  $("#renewsteps").html(res[0]);
  $("#thirdst").html(res[1]);
}
  }
	});

}';


if(isset($_GET['a'])){
if($_GET['a']=="g"){
	$echo.='$("#ffwrapper4").click();
	$("#ffwrapper4").find("input[type=text]").focus();
	$(document).ready(function(){
	$.doTimeout(0,function(){
	$("#ffwrapper4").find("input[type=text]").focus();
	});
	});';
}else if($_GET['a']=="y"){
	$echo.='$("#ffwrapper3").click();
	$(document).ready(function(){
	$.doTimeout(0,function(){
	$("#ffwrapper3").find("input[type=text]").focus();
	});
	});';
}else if($_GET['a']=="h"){
	$echo.='$("#ffwrapper2").click();
	$("#ffwrapper2").find("input[type=text]").focus();
	$(document).ready(function(){
	$.doTimeout(0,function(){
	$("#ffwrapper2").find("input[type=text]").focus();
	});
	});';

}
}

$echo.='
</script>';

$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='normal_n';
$params['left_link_n']='find_friends';


include("end.php");
?>