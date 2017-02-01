<?php
include("start.php");

include("populate_page.php");
$params['style']='
<style type="text/css">
.pr_website{
    width: 100%;
    -moz-box-sizing: border-box;

    max-width: 100%;

    border: 1px solid rgb(189, 199, 216);
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0px;
    padding: 3px;

    text-align: left;	
}
.addressf{
    -moz-box-sizing: border-box;
    margin-left: 0px;
    padding-bottom: 4px;
    border: 1px solid rgb(189, 199, 216);
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0px;
    padding: 3px;
    width: 100%;
    text-align: left;	
}

.impr{

    -moz-box-sizing: border-box;

    padding-bottom: 4px;

    border: 1px solid rgb(189, 199, 216);
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0px;
    padding: 3px;

    text-align: left;	
}
.phonecv{
    border: 1px solid rgb(189, 199, 216);
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    padding: 2px;
   text-align: left;	
}
.phonec{

    -moz-box-sizing: border-box;

    padding-bottom: 4px;

    border: 1px solid rgb(189, 199, 216);
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0px;
    padding: 3px;
 text-align: left;	
}
.phoneext{
    width: 160px;
    white-space: nowrap;
    border: 1px solid rgb(189, 199, 216);
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    padding: 2px;

    text-align: left;	
}
.imprv{
    border: 1px solid rgb(189, 199, 216);
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    padding: 2px;
    text-align: left;	
}
a{font-family:\'lucida grande\',tahoma,verdana,arail,sans-serif;}
.onel a:link{
color:#3b5998;
text-decoration:none;	
}
.onel a:visited{
color:#3b5998;
text-decoration:none;	
}
.onel a:active{
color:#3b5998;
text-decoration:underline;	
}
.onel a:hover{
color:#3b5998;
text-decoration:underline;	
}
.disabled_textarea{

    -moz-box-sizing: border-box;

    width: 367px;

    max-width: 100%;

    border: 1px solid rgb(189, 199, 216);
    font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0px;
    padding: 3px;

    text-align: left;
background:#F2F2F2;
}
.removeemployer,.removecollege,.removehighschool{
    background-image: url("/images/ogYrclupeJV.png");
    height: 11px;
    margin: 0px;
    margin-top: 1px;
    width: 11px;
    background-repeat: no-repeat;
    cursor: pointer;
    display: inline-block;
    padding: 0px;	
}
.removeemployer:hover,.removecollege:hover,.removehighschool:hover{
    background-image: url("/images/ogYrclupeJV.png");
	background-position:0 -24px;
    height: 11px;
    margin: 0px;
    margin-top: 1px;
    width: 11px;
    background-repeat: no-repeat;
    cursor: pointer;
    display: inline-block;
    padding: 0px;	
}
.editjoba,.editunia,.edithsa{
    line-height: 16px;
    background: transparent;
    text-decoration: none;
    padding-left: 18px;
    color: #3b5998;

    cursor: pointer;

    vertical-align: middle;	
}
.editjobav,.edituniav,.edithsav{
    line-height: 16px;
    background: url("/images/4DVNAxs9NoZ.gif") no-repeat scroll left -38px transparent;
    text-decoration: none;
    padding-left: 18px;
    color: #3b5998;

    cursor: pointer;

    vertical-align: middle;	
}
.editjobav:hover,.edituniav:hover,.edithsav:hover{
    line-height: 16px;
    background: url("/images/4DVNAxs9NoZ.gif") no-repeat scroll left -38px transparent;
    text-decoration: underline;
    padding-left: 18px;
    color: #3b5998;

    cursor: pointer;

    vertical-align: middle;	
}
.joba,.unia,.hsa{
border-top:1px solid rgb(233,233,233);	
}
.joba:hover,.unia:hover,.hsa:hover{
background:#ececec;
}
#editpiw{
width:359px;
}
#editpiwv{
width:100%;
}
#editpiwv input{
background:#fff!important;
}
.cancelcedit{
    margin-left: 2px;
 background-image: url("/images/tpJs14CtQiX.png");
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
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.cancelcedit2{
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
}
.addyear{
    cursor: pointer;
    left: 0px;
    top: -4px;
    border: 1px solid rgb(189, 199, 216);
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    padding: 2px;
line-height: 24px;
    white-space: nowrap;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    list-style-type: none;
    word-wrap: break-word;	
}
.addsignpv a:link{
    padding-left: 11px;
   margin-left: 8px;
    padding-left: 21px;
    position: relative;
    cursor: pointer;
    color: #3b5998;
    text-decoration: none;
  line-height: 24px;
    white-space: nowrap;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    list-style-type: none;
    word-wrap: break-word;	
}
.addsignpv a:visited{
    padding-left: 11px;
   margin-left: 8px;
    padding-left: 21px;
    position: relative;
    cursor: pointer;
    color: #3b5998;
    text-decoration: none;
  line-height: 24px;
    white-space: nowrap;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    list-style-type: none;
    word-wrap: break-word;	
}
.addsignpv a:active{
    padding-left: 11px;
   margin-left: 8px;
    padding-left: 21px;
    position: relative;
    cursor: pointer;
    color: #3b5998;
    text-decoration: underline;
  line-height: 24px;
    white-space: nowrap;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    list-style-type: none;
    word-wrap: break-word;	
}
.addsignpv a:hover{
    padding-left: 11px;
   margin-left: 8px;
    padding-left: 21px;
    position: relative;
    cursor: pointer;
    color: #3b5998;
    text-decoration: underline;
  line-height: 24px;
    white-space: nowrap;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    list-style-type: none;
    word-wrap: break-word;	
}
.addsignp{
    left: 0px;
    position: absolute;
    vertical-align: middle;
    width: 6px;
    height: 6px;
    background-position: 0px -13px;
    background-image: url("/images/Sn8URR2YafD.png");
    background-repeat: no-repeat;
    display: inline-block;
    top: 4px;
    cursor: pointer;
    color: #3b5998;
  line-height: 24px;
    white-space: nowrap;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    list-style-type: none;
    word-wrap: break-word;	
}
.job_description,.uni_description,.hs_description{
    -moz-box-sizing: border-box;
    width: 366px;
    overflow: hidden;
    max-width: 100%;
 border: 1px solid rgb(189, 199, 216);
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0px;
    padding: 3px;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    list-style-type: none;
    width: 366px;
    word-wrap: break-word;	
}
.friendsrela{
    padding-top: 10px;
    padding-bottom: 10px;
    border-color: rgb(204, 204, 204);
    border-width: 1px 0px 0px;
    border-style: solid;
    display: block;
    width: 374px;
    border-width: 0px;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.relationselector{
    height: 22px;
    margin-top: 0px;
    border: 1px solid rgb(189, 199, 216);
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    padding: 2px;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.relationshipstd,.eduworktd{
 padding: 3px 0px 1px;
    padding-top: 5px;
    text-align: left;
    vertical-align: top;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.relationshipsth,eduworkth{
    color: rgb(102, 102, 102);
    font-weight: bold;
    padding-right: 10px;
    text-align: right;
    width: 130px;
 padding: 3px 0px 1px;
    padding-top: 8px;
    vertical-align: top;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;
	padding-right:11px;	
}
#imgcr{
cursor:move!important;	
}
.aboutme{
    -moz-box-sizing: border-box;
    max-width: 367px;
  border: 1px solid rgb(189, 199, 216);
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    margin: 0px;
    padding: 3px;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.carita{
background:none repeat scroll 0% 0% rgb(226,230,240);
border:1px solid rgb(157,172,204);
border-radius:2px;
color:rgb(28,42,71);
display:block;
float:left;
height:14px;
margin:0pt 4px 4px 0pt;
padding:0pt 3px;
position:relative;
white-space:nowrap;
cursor:default;
font-size:11px;
max-width:120px;top:2px;left:2px;float:none;display:inline-block;
} 
.warnsv{
   left: 0px;
    position: absolute;
    top: -1px;
    vertical-align: middle;
    width: 13px;
    height: 13px;
    background-image: url("/images/AXO0XADKn1C.png");
    background-repeat: no-repeat;
	    background-position: 0px -104px;
    display: inline-block;
    font-size: 11px;
    border-collapse: collapse;
    border-spacing: 0px;
  text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;
}
.warns{
    left: 0px;
    position: absolute;
    top: 1px;
    vertical-align: middle;
    width: 11px;
    height: 11px;
    background-position: 0px 0px;
    background-image: url("/images/cjNkTBgPndc.png");
    background-repeat: no-repeat;
    display: inline-block;	
}
.savecedit2{
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
    color: rgb(255, 255, 255);
    font-weight: bold;
    font-size: 11px;
    border-collapse: collapse;
    border-spacing: 0px;
 text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.savecedit{
    text-decoration: none;
    background-image: url("/images/iT8cxGfeB6F.png");
    background-repeat: no-repeat;
    background-position: -352px -54px;
    background-color: rgb(91, 116, 168);
	border:1px solid;
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
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;	
}
.savecedit:active{
 background:#4f6aa3;
 border-color:#29447e;
}
.viewmp{
    background-image: url("/images/iT8cxGfeB6F.png");
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
    padding: 1px 4px;
    text-align: center;
    text-decoration: none;
    vertical-align: top;
    white-space: nowrap;
    cursor: pointer;
    color: #3b5998;
    text-decoration: none;
    word-wrap: break-word;	
}
.pasev{
    margin-top: 2px;
    vertical-align: top;
    width: 5px;
    height: 14px;
    background-position: -5px -60px;
    background-image: url("/images/NTEL3b6dmIN.png");
    background-repeat: no-repeat;
    display: inline-block;
    margin-right: 5px;
    cursor: pointer;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    text-align: center;
    white-space: nowrap;
    cursor: pointer;
    color: #3b5998;
    word-wrap: break-word;	
}
.pase{
    width: 11px;
    height: 9px;
    background-position: 0px -49px;
    background-image: url("/images/GNqFr65sHe0.png");
    background-repeat: no-repeat;
    display: inline-block;
    margin-left: 5px;
    margin-right: 5px;
   line-height: 20px;
    color: rgb(28, 42, 71);
    font-size: 16px;
    font-size: 13px;
    color: rgb(51, 51, 51);
    word-wrap: break-word;	
}
.contenth{
    margin: 0px;
    padding: 0px;
    line-height: 20px;
    min-height: 20px;
    padding-bottom: 2px;
    vertical-align: bottom;
    outline: medium none;
    color: rgb(28, 42, 71);
    font-size: 16px;
    word-wrap: break-word;	
	font-weight:bold;
	font-size:16px;
}
.maincone{
    border-right: 1px solid rgb(204, 204, 204);
    min-height: 600px;
    margin-left: -1px;
    display: block;
    width: 800px;	
}
.leftcone{
    padding-top: 59px;
    display: block;
    float: left;
    padding: 20px 0px 0px 2px;
    width: 179px;
    word-wrap: break-word;
}
.mainconev{
    border-left: 1px solid rgb(204, 204, 204);
    margin-left: 0px;
    min-height: 600px;
    background-color: rgb(255, 255, 255);
    padding-top: 15px;	
}
#contentCurve{
    background-color: rgb(242, 242, 242)!important;
}
.contentm{
    min-height: 253px;
    border-top: 1px solid rgb(179, 179, 179);
    padding: 20px;
    border: medium none;
    background-color: rgb(242, 242, 242);
    border: 1px solid rgb(204, 204, 204);
	border-bottom:none;
    word-wrap: break-word;	
	margin-top:20px;
	border-right:none;
	border-left:none;
	
}
.contentmt{
    table-layout: fixed;
    border: 0px none;
    border-collapse: collapse;
    border-spacing: 0px;
    width: 100%;
    word-wrap: break-word;	
}
.contentmtv{
	  padding: 3px 0px 1px;
    padding-top: 8px;
    color: rgb(102, 102, 102);
    font-weight: bold;
    padding-right: 10px;
    text-align: right;
    width: 130px;
 
    text-align: left;
    vertical-align: top;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;
	font-size:11px;	
}
.editpiv{
    background: none repeat scroll 0% 0% rgb(255, 255, 255);
    border-style: solid;
    border-color: rgb(189, 199, 216);
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-image: none;
    border-width: 1px 0px;
    cursor: text;
    position: relative;
  text-align: left;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
	border:none;
}

.editpivo{
    background: none repeat scroll 0% 0% rgb(255, 255, 255);
    border-style: solid;
    border-color: #bdc7d8;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-image: none;
    border-width: 1px 0px;
    cursor: text;
    position: relative;
  text-align: left;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
	border:none;
}
.editpivvo{
    background-color: #E2E8F6;
    border-style: solid;
    border-color: #bdc7d8;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-image: none;
    border-width: 0px 1px;
    padding-right: 16px;
cursor: text;
	  text-align: left;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
	border:none;
}
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
.editpi2{
    -moz-box-sizing: border-box;
 padding-left: 3px;
    background-color: transparent;
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
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;
}
.edittd{
    padding-top: 5px;
    padding: 0px 0px 0px 20px;
    width: 225px;
    padding: 3px 0px 1px;
    text-align: left;
    vertical-align: top;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
	padding-left:10px;
}
.removeedit{
    display: block;
    position: absolute;
    margin-top: -7px;
    right: 3px;
	top:4px;
    overflow: hidden;
    background-image: url("/images/4WSewcWboV8.png");
    background-repeat: no-repeat;
    height: 15px;
    width: 15px;
    cursor: pointer;
    display: inline-block;
    margin: 0px;
    padding: 0px;
    cursor: pointer;
    color: rgb(102, 102, 102);
    font-weight: bold;
    vertical-align: middle;
    cursor: default;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
	cursor:pointer;
	z-index:4;
}
.removeedit:hover{
background-position:0 -32px;	
}
.editpr{
    max-width: none !important;
    text-align: left;
    max-width: 200px;
    vertical-align: top;
    display: inline-block;
text-align: left;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
	margin-left:8px;
}
.editprv{
    position: relative;
text-align: left;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.editpra{
    background-image: url("/images/iT8cxGfeB6F.png");
    background-repeat: no-repeat;
    background-position: right -202px;
    max-width: 169px;
    padding-right: 23px;
   vertical-align: top;
       border-color: transparent;
    box-shadow: none;

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
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;
	position:relative;
	top:-1px;
	padding-left:12px;
	margin-left:5px;
	    border-width: 1px;
    border-style: solid;
    border-color: transparent;
}
.editpra:hover{
    background-image: url("/images/iT8cxGfeB6F.png");
    background-repeat: no-repeat;
    background-position: right -5px;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(153, 153, 153) rgb(153, 153, 153) rgb(136, 136, 136);
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-image: none;
    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.1);	
}
.mundito{
    margin-right: -5px;
    margin-left: -2px;
    margin-right: 2px;
    margin-left: -1px;
    margin-right: -1px;
    margin-top: 0px;
    margin-top: 0px;
    vertical-align: top;
    width: 17px;
	height:16px;
    background-position: -17px -17px;
    background-image: url("/images/Ukl8PZkLsgo.png");
    background-repeat: no-repeat;
    display: inline-block;
    margin-right: 5px;
    cursor: pointer;
    font-size: 11px;
    font-weight: bold;
    line-height: 13px;
    text-align: center;
    white-space: nowrap;
    cursor: pointer;
    color: #3b5998;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.removeedit2{
    cursor: pointer;
    opacity: 0;
    outline: medium none;
    padding: 18px;
    font-weight: normal;
    cursor: pointer;
    color: rgb(102, 102, 102);
    font-weight: bold;
    cursor: default;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    border-spacing: 0px;
    word-wrap: break-word;	
}
.hrs{
    background: none repeat scroll 0% 0% #d9d9d9;
    border-width: 0px;
    color: #d9d9d9;
    height: 1px;	
}
.selectedit{
    border: 1px solid rgb(189, 199, 216);
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    font-size: 11px;
    padding: 2px;	
}


.linksedit{
    background-color: rgb(216, 223, 234);
    font-weight: bold;
    margin-left: 20px;
    margin-right: -20px;
 color: rgb(51, 51, 51);
    display: block;
    border-bottom: 1px solid rgb(255, 255, 255);
    min-height: 17px;
    line-height: 13px;
    padding: 3px 8px 0px 28px;
	padding-top:3px;
	padding-bottom:0px;
    text-decoration: none;
    cursor: pointer;
    text-decoration: none;
    list-style-type: none;
    word-wrap: break-word;	
}
.linkseditv{
    background-color: #ffffff;
    font-weight: normal;
    margin-left: 20px;
    margin-right: -20px;
 color: rgb(51, 51, 51);
    display: block;
    border-bottom: 1px solid rgb(255, 255, 255);
    min-height: 17px;
    line-height: 13px;
    padding: 3px 8px 0px 28px;
	padding-top:3px;
	padding-bottom:0px;
    text-decoration: none;
    cursor: pointer;
    text-decoration: none;
    list-style-type: none;
    word-wrap: break-word;	
}
.linksedit1{
    height: 14px;
    background-position: -68px -136px;
    background-image: url("/images/hqPYFjMiGCV.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    width: 16px;
    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
}
.linksedit2{
    background-image: url("/images/hqPYFjMiGCV.png");
    background-position: -104px -118px;
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    width: 16px;
    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
}
.linksedit3{
    background-position: 0px -36px;
    background-image: url("/images/pQdtrqlQoOx.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    width: 16px;	
    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
}
.linksedit4{
    background-position: 0px -87px;
    background-image: url("/images/pQdtrqlQoOx.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 16px;
    width: 16px;
	    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
}
.linksedit5{
    background-image: url("/images/R6H5f69JNxa.png");
    background-repeat: no-repeat;
	    background-position: 0px -459px;

    display: inline-block;
    height: 16px;
    width: 16px;
	    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
	    background-position: ;

}
.linksedit6{

    background-position: -86px -135px;

    background-image: url("/images/uQeR2YzV9FG.png");
    background-repeat: no-repeat;

    display: inline-block;
    height: 15px;
    width: 16px;
	    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
	    background-position: ;

}

	.linksedit7{

    background-position: 0px -221px;

    background-image: url("/images/R6H5f69JNxa.png");
    background-repeat: no-repeat;

    display: inline-block;
    height: 16px;
    width: 16px;
	    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
	    background-position: ;

}

.linksedit8{

    background-position: 0px -121px;

    background-image: url("/images/9QoIVZzYY6R.png");
	    background-repeat:no-repeat;

    display: inline-block;
    height: 16px;
    width: 16px;
	    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
	    background-position: ;

}
.linksedit9{



    background-position: -33px -51px;

    background-image: url("/images/9QoIVZzYY6R.png");
	    background-repeat:no-repeat;

    display: inline-block;
    height: 18px;
    width: 16px;
	    font-weight: bold;
  color: rgb(51, 51, 51);
    line-height: 13px;
    cursor: pointer;
    color: #3b5998;
    list-style-type: none;
    word-wrap: break-word;	
	    background-position: ;

}
.linkseditv:hover{
background:#e6e6fa;
}
.mainwpicture,.mainwrelationships,.mainweduwork{
    min-height: 253px;
    border-top: 1px solid rgb(179, 179, 179);
    padding: 20px;
    border: medium none;
    background-color: rgb(242, 242, 242);
    border: 1px solid rgb(204, 204, 204);
    word-wrap: break-word;	
	border-right:none;
	border-left:none;
	margin-top:20px;
}
.pictureft,.relationshipsft, .eduworkft{
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    word-wrap: break-word;	
}
.profile-picture{
    background-color: rgb(255, 255, 255);
    display: block;
    overflow: hidden;
    position: relative;
    width: 180px;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    word-wrap: break-word	
}
.profile_picture{
    display: block;
    margin: auto;
    max-width: 180px;
    border: 0px none;
    font-size: 11px;
    text-align: left;
    border-collapse: collapse;
    word-wrap: break-word;	
}
.editppl a:link{
    cursor: pointer;
    color: #3b5998;
    text-decoration: none;	
}
.editppl a:visited{
    cursor: pointer;
    color: #3b5998;
    text-decoration: none;	
}
.editppl a:active{
    cursor: pointer;
    color: #3b5998;
    text-decoration: underline;	
}
.editppl a:hover{
    cursor: pointer;
    color: #3b5998;
    text-decoration: underline;	
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
background:#4f6aa3;
border:1px solid;
border-color:rgb(41,68,126) rgb(41,68,126) rgb(26,53,110);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
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
.cancelmsg{
margin-left:4px;
font-size:13px;
line-height:16px;
background-image: url("/images/tpJs14CtQiX.png");
background-repeat: no-repeat;
background-position: -352px -348px;
background-color: rgb(238, 238, 238);
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
.pop_container3{
background:none repeat scroll 0% 0% rgba(82,82,82,0.7);
border-radius:8px;
padding:10px;
padding-right:9px;
position:absolute;
top:200px;
height:213px;
width:447px;
z-index:302;
margin-top:-80px;
}
.div_dialog_body3{
padding:10px;border-bottom:1px solid rgb(204,204,204);border-right:1px solid rgb(85,85,85);border-left:1px solid rgb(85,85,85);
height:115px;
width:424px;
background:#ffffff;
position:relative;
top:0px;
}
.div_dialog_header3{
padding:5px 10px;color:#ffffff;font-size:14px;font-weight:bold;border-right:1px solid #3b5998;border-left:1px solid #3b5998;border-top:1px solid #3b5998;
height:20px;
width:424px;
background:#6d84b4;
}
.div_dialog_footer3{
background:rgb(242,242,242);
height:35px;
width:424px;
padding:8px 10px;
border-right:1px solid rgb(85,85,85);border-left:1px solid rgb(85,85,85);border-bottom:1px solid rgb(85,85,85);
}
.pop_container4{
background:none repeat scroll 0% 0% rgba(82,82,82,0.7);
border-radius:8px;
padding:10px;
padding-right:9px;
position:absolute;
top:200px;
height:213px;
width:527px;
z-index:302;
margin-top:-80px;
}
.div_dialog_body4{
padding:10px;border-bottom:1px solid rgb(204,204,204);border-right:1px solid rgb(85,85,85);border-left:1px solid rgb(85,85,85);
height:115px;
width:504px;
background:#ffffff;
position:relative;
top:0px;
}
.div_dialog_header4{
padding:5px 10px;color:#ffffff;font-size:14px;font-weight:bold;border-right:1px solid #3b5998;border-left:1px solid #3b5998;border-top:1px solid #3b5998;
height:20px;
width:504px;
background:#6d84b4;
}
.div_dialog_footer4{
background:rgb(242,242,242);
height:35px;
width:504px;
padding:8px 10px;
border-right:1px solid rgb(85,85,85);border-left:1px solid rgb(85,85,85);border-bottom:1px solid rgb(85,85,85);
}

.squarebox{
    float: left;
    width: 50px;
    height: 50px;
    padding: 0px;
    margin: 8px 8px 4px 0px;
    cursor: move;
    border: 1px solid rgb(102, 102, 102);
    overflow: hidden;
    position: relative;	
}
.working{background-color:#ffffff;
background-image:url("/images/loading.gif");
background-repeat:no-repeat;
background-position:right 98% 5px;}
</style>';
$echo.='
<div id="pre_pop_container2ore" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owidth_msgv2re">

<div class="pop_container3" id="pop_containervvo2re" style="height:109px;display:block;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervo2re">Remove <span id="delwhatre"></span></div>
<div class="div_dialog_body3" id="div_dialog_bodyvo2re" style="height:14px;">Are you sure you want to remove this <span id="delwhat2re"></span>?


</div><div class="div_dialog_footer3" style="height:28px;" id="div_dialog_footervo2re"></div></div></div></div>

</div>


<div class="maincone">';
$params['left_column_id']="editprofile";
$params['left_column']='
<div class="leftcone" style="margin-top:0px;" data-lca="">
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit1" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=basic" id="linksedit1">
Basic Information
</a>
</div>
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit2" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=picture" id="linksedit2">
Profile Picture
</a>
</div>
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit3" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=relationships" id="linksedit3">
Friends and Family
</a>
</div>
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit4" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=eduwork" id="linksedit4">
Education and Work
</a>
</div>
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit5" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=philosophy" id="linksedit5">
Philosophy
</a>
</div>
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit6" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=entertainment" id="linksedit6">
Arts and Entertainment
</a>
</div>
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit7" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=sports" id="linksedit7">
Sports
</a>
</div>
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit8" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=activities" id="linksedit8">
Activites and Interests
</a>
</div>
<div style="padding-right: 20px;margin-left: -20px;width: 100%;position:relative;">
<i class="linksedit9" style="position:absolute;left:26px;bottom:2px;"></i>
<a class="linkseditv" style="display:block;text-decoration:none!important;color:#333333!important;" href="editprofile.php?sk=contact" id="linksedit9">
Contact Information
</a>
</div>
</div>';
$echo.='
<script type="text/javascript">
$(".linksedit").addClass("linkseditv");
$(".linkseditv").removeClass("linksedit");
</script>
<div class="mainconev">';
$result=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($ms=mysql_fetch_array($result)){
$fullname=$ms['fullname'];	
$cprofilepic=$ms['profilepic'];
$cprofilepicd=$cprofilepic;
$cprofilepicth=$ms['profilepict'];
if($cprofilepicth!=""){$cprofilepicd=$cprofilepicd;}
if(strpos($cprofilepic,'incognito')!==false){
$wdisplay='none';
}
else{
$wdisplay='block';	
}
}
$echo.='
<div class="contenth" style="margin-left:20px;">'.$fullname.'<i class="pase"></i>Edit Profile<a class="viewmp" style="float:right;margin-right:20px;" href="/'.$un.'?v=info"><div class="pasev" style="margin-right:2px;margin-top:3px;"></div><input autocomplete="off" type="button" class="viewmp2" value="View My Profile"></a></div>';
if(!isset($_GET['sk']) OR $_GET['sk']=='basic'){
$echo.='<script type="text/javascript">
$("#linksedit1").removeClass("linkseditv");
$("#linksedit1").addClass("linksedit");
</script>';
include("editprofile/basic.php");
}
else if($_GET['sk']=='picture'){
include("editprofile/picture.php");
}
else if($_GET['sk']=='relationships'){
include("editprofile/relationships.php");
}
else if($_GET['sk']=='eduwork'){
$echo.='
<script type="text/javascript">
$("#linksedit4").removeClass("linkseditv");
$("#linksedit4").addClass("linksedit");
</script>';



$echo.='
<div class="mainweduwork" style="height:auto;">
<table class="eduworkft" cellspacing="0" cellpadding="0" style="margin-left:20px;">';
include_once("editprofile/employer_module.php");
include_once("editprofile/college_module.php");
include_once("editprofile/highschool_module.php");
$echo.='
</table>
</div>
';
}
else if($_GET['sk']=='philosophy'){
include_once("editprofile/philosophy.php");
}
else if($_GET['sk']=='entertainment'){
include_once("editprofile/entertainment.php");
}
else if($_GET['sk']=='sports'){
include_once("editprofile/sports.php");
}
else if($_GET['sk']=='activities'){
include_once("editprofile/activities.php");
}
else if($_GET['sk']=='contact'){
include_once("editprofile/contact.php");
}
$echo.='
</div>


</div>';

$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='left_column_n';

$params["body_class"]="scroll";

include("end.php");
?>