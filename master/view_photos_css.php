<?php header("Content-type:text/css; charset:UTF-8");
include("browser_detect.php");
$browser=browser_detection("browser");
?>
<?php
echo'
.bottom_menu_photo{
position:relative;
}
#sortable1_clone li {
position:absolute!important;
z-index:1;
float:left!important;
}
#sortable1 li {
position:relative;
z-index:5;
}
.editablePhotoPlaceholder .photoWrap {
		background: none repeat scroll 0% 0% rgb(242, 242, 242);
		height: 22px;
}
.editablePhotoErrorPlaceholder .photoWrap {
		height: 292px;
}
.editablePhoto .photoWrap {
		position: relative;
}
.editablePhotoErrorPlaceholder .error {
		text-align: center;
		margin: 105px 30px 0px;
		display: inline-block;
		width: 230px;
}
.editablePhotoErrorPlaceholder .error .title {
		font-weight: bold;
}
.uiIconText {
		display: inline-block;
		padding-left: 21px;
		position: relative;
}
.uiIconText .img {
		left: 0px;
		position: absolute;
		top: -1px;
		vertical-align: middle;
}
.uiP {
		line-height: 16px;
}
.alertita {
		background-position: -153px -118px;
		background-image: url("/images/mEHn_euMa7N.png");
		background-size: auto auto;
		background-repeat: no-repeat;
		display: inline-block;
		height: 16px;
		width: 16px;
}
.recog_hidden{
border:transparent!important;
}
.recog_hidden *{border:transparent!important;}
.green{}
.clear{clear:both;}
.face{
border:2px solid #ffffff;
}

.albde{
border:1px solid rgb(189,199,216);
border-color:#ffffff;
outline:medium none;
-moz-transition:border-color 0.2s ease 0s;
width:330px;

font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;
font-size:11px;
margin:0pt;
padding:3px;
padding-bottom:4px;
}
.albde:hover{
border:1px solid rgb(189,199,216);
}
.manito{
background:url("/images/manito.png");
background-position:0px 0px;
background-repeat:no-repeat;
background-color:#edeff4;
width:10px;
height:9px;
}
.likeiconito{
background:url("/images/BmIxP1-tXDZ.png");
background-position:-12px -144px;
background-repeat:no-repeat;
background-color:#edeff4;
width:15px;
height:15px;
}
			#scrollTest {
				width: 400px;
				position: absolute;
				top: 20px;
				left: 60px;
				height: 300px;
				overflow: auto;

				/*background-color: white;
				color: #666;*/

				background-color: #222222;
				color: #AAA;
			}'."
.addphotosvv{
background-image:url(\"/images/Ha6uupbKcxk.png\");
background-repeat:no-repeat;
background-position:0pt 0pt;
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
color:#333333;
}
.closeimg{
	background-image:url(\"/images/hKuIStIod3i.png\");
	background-repeat:no-repeat;
	background-position:-156px -98px;
	display:inline-block;
	height:12px;
	margin-left:5px;
	vertical-align:top;
	width:11px;
	cursor:pointer;
	text-align:right;
position:absolute;
top:-20px;
right:5px;
z-index:399;
	}
.pensp{
top:2px;
left:0pt;
position:absolute;
vertical-align:middle;
width:10px;
height:10px;
background-image:url(\"/images/ywrRWKHfQJp.png\");
background-position:-26px -343px;
background-repeat:no-repeat;
display:inline-block;
cursor:pointer;
}
.spen{
background:url(\"/images/ffUJLIqlYCk.gif\") no-repeat scroll -18px 0pt transparent;
height:18px;
width:18px;
margin-left:5px;
margin-bottom:5px;
float:right;
cursor:pointer;
word-wrap:break-word;
}
.spen:hover{
	background:url(\"/images/ffUJLIqlYCk.gif\") no-repeat scroll 0px 0pt transparent;
height:18px;
width:18px;
margin-left:5px;
margin-bottom:5px;
float:right;
cursor:pointer;
word-wrap:break-word;
}
.cruz{
	margin-top:2px;
	vertical-align:top;
	margin-right:5px;
	width:8px;
	height:14px;
	background-position:-8px -390px;
	background-image:url(\"/images/9vuAQCVid3f.png\");
	background-repeat:no-repeat;
	cursor:pointer;
	}
.ihover:hover{
outline:1px solid #3b5998;
}
.ihoverc{
outline:1px solid rgb(204,204,204);border:4px solid #ffffff;border-top:6px solid #ffffff;border-left:6px solid #ffffff;margin:0;padding:0;width:158px;height:117px;position:absolute;
left:0;
top:0;
}
.ihoverc2{
outline:1px solid rgb(204,204,204);border:4px solid #ffffff;border-top:6px solid #ffffff;border-left:6px solid #ffffff;margin:0;padding:0;width:144px;height:111px;position:absolute;
left:0;
top:0;
}
.ihoverc3{
outline:1px solid rgb(204,204,204);border:4px solid #ffffff;border-top:6px solid #ffffff;border-left:6px solid #ffffff;margin:0;padding:0;width:144px;height:111px;position:absolute;
}
.ihoverc4{
outline:1px solid rgb(204,204,204);border:4px solid #ffffff;border-top:6px solid #ffffff;border-left:6px solid #ffffff;margin:0;padding:0;width:144px;height:111px;position:absolute;
}
.picsdisplay{width:160px;height:120px;}
.picsdisplay2{width:160px;height:120px;}
.picsdisplay3{width:144px;height:111px;background-position:center 25%;}
.picsdisplay4{width:162px;height:120px;}
.addmorep{
	margin-left:5px;
	background-image:url(\"/images/Ha6uupbKcxk.png\");
	background-repeat:no-repeat;
	background-position:0pt 0pt;
	background-color:rgb(238,238,238);
	border-width:1px;
	border-style:solid;
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
	}
.albumlink a:link{
font-weight:bold;color:#ffffff;text-decoration:none;font-size:13px;
}
.albumlink a:visited{
font-weight:bold;color:#ffffff;text-decoration:none;font-size:13px;
}
.albumlink a:active{
font-weight:bold;color:#ffffff;text-decoration:underline;font-size:13px;
}
.albumlink a:hover{
font-weight:bold;color:#ffffff;text-decoration:underline;font-size:13px;
}

.albumlinkv{font-weight:bold;color:#ffffff;text-decoration:none;cursor:pointer;}
.albumlinkv:hover{font-weight:bold;color:#ffffff;text-decoration:underline;cursor:pointer;}

.hphotoswrapper{margin-left:1px;}
.hphotos{width:11px;height:9px;background-position:-187px -136px;background-image:url(\"/images/E75W0JjLn8o.png\");
background-repeat:no-repeat;display:inline-block;margin:0pt 5px 2px 6px;}
.likebutton{
background-clip:padding-box;
background-color:rgba(0,0,0,0.4);
border:1px solid rgba(2555,255,255,0.6);
border-radius:4px;
margin-right:6px;
padding-top:4px;
padding-bottom:4px;
padding-right:7px;
padding-left:25px;
display:inline-block;
vertical-align:bottom;
color:#ffffff;
font-weight:bold;
cursor:pointer;
font-size:13px;
text-align:right;
font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
}
.likebutton:hover{
background-clip:padding-box;
background-color:rgba(0,0,0,0.4);
border:1px solid rgba(2555,255,255,255);
border-radius:4px;
margin-right:6px;
padding-top:4px;
padding-bottom:4px;
padding-right:7px;
padding-left:25px;
display:inline-block;
vertical-align:bottom;
color:#ffffff;
font-weight:bold;
cursor:pointer;
font-size:13px;
text-align:center;
font-family:'lucida grande',tahoma,verdana,arial,sans-serif;
}

body table td{font-size:11px;vertical-align:top;}


.ui-autocomplete{z-index:9999!important;}


.friendslinkvl2{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslinkvl2:hover{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}

.linkbywho a:link{
font-size:11px;font-weight:bold;color:#333333;text-decoration:none;
}
.linkbywho a:visited{
font-size:11px;font-weight:bold;color:#333333;text-decoration:none;
}
.linkbywho a:active{
font-size:11px;font-weight:bold;color:#333333;text-decoration:underline;
}
.linkbywho a:hover{
font-size:11px;font-weight:bold;color:#333333;text-decoration:underline;
}
.friendslink4ov{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;cursor:pointer;
}".'
.saveec{
background-color:rgb(91,116,168);
background-image:url(\'/images/5WfwmZM-cVR.png\');
background-repeat:no-repeat;
background-position:-352px -54px;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px;
border-style:solid;
border-color:rgb(41, 68, 126) rgb(41, 68, 126) rgb(26, 53, 110);
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:0px 3px;
text-align:center;
vertical-align:top;
white-space:nowrap;
color:rgb(102,102,102);
word-wrap:break-word;
}
.saveec2{
color:#ffffff;
background:none repeat scroll 0% 0% transparent;
border:0pt none;
cursor:pointer;
display:inline-block;
font-family:\'Lucida Grande\',Tahoma,Verdana,Arial,sans-serif;
font-size:11px;
font-weight:bold;
margin:0pt;
padding-left:0;
padding-top:2px;
padding-bottom:3px;
padding-right:0;
white-space:nowrap;
line-height:13px;
text-align:center;
word-wrap:break-word;
}
.cancelec{
background-color:rgb(238,238,238);
margin-left:4px;
background-image:url(\'/images/5WfwmZM-cVR.png\');
background-repeat:no-repeat;
background-position:-352px -348px;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px;
border-style:solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
display:inline-block;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:0px 3px;
text-align:center;
vertical-align:top;
white-space:nowrap;
word-wrap:break-word;
}
.cancelec2{
background:none repeat scroll 0% 0% transparent;
border:0pt none;
color:#333333;
cursor:pointer;
display:inline-block;
font-family:\'Lucida Grande\',Tahoma,Verdna,Arial,sans-serif;
font-size:11px;
font-weight:bold;
margin:0pt;
padding-left:0;
padding-top:2px;
padding-bottom:3px;
padding-right:0;
white-space:nowrap;
line-height:13px;
text-align:center;
word-wrap:break-word;
}
.friendslink4ov:hover{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;cursor:pointer;
}
.friendslink4{color:#666666;}
.friendslink4 a:link{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslink4 a:visited{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslink4 a:active{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}
.friendslink4 a:hover{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}

.friendslink2 a:link{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslink2 a:visited{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslink2 a:active{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}
.friendslink2 a:hover{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}
.friendslink2{color:#666666;}
.friendslink3 a:link{
font-size:11px;font-weight:normal;color:#6d84b4;text-decoration:none;
}
.friendslink3 a:visited{
font-size:11px;font-weight:normal;color:#6d84b4;text-decoration:none;
}
.friendslink3 a:active{
font-size:11px;font-weight:normal;color:#6d84b4;;text-decoration:underline;
}
.friendslink3 a:hover{
font-size:11px;font-weight:normal;color:#6d84b4;text-decoration:underline;cursor:pointer;
}
.friendslink3s{
font-size:11px;font-weight:normal;color:#6d84b4;text-decoration:none;cursor:pointer;
}
.friendslink3s:hover{
font-size:11px;font-weight:normal;color:#6d84b4;;text-decoration:underline;
}'."
.cmnc{
float:right;background-image:url('/images/4WSewcWboV8.png');background-repeat:no-repeat;background-position:0 0;height:15px;width:15px;cursor:pointer;margin:0;padding:0;position:relative;top:5px;right:5px;display:none;
}
.cmnc:hover{
float:right;background-image:url('/images/4WSewcWboV8.png');background-repeat:no-repeat;background-position:0 -32px;height:15px;width:15px;cursor:pointer;margin:0;padding:0;position:relative;top:5px;right:5px;display:inline-block;
}
.cmnc:active{
float:right;background-image:url('/images/4WSewcWboV8.png');background-repeat:no-repeat;background-position:0 -48px;height:15px;width:15px;cursor:pointer;margin:0;padding:0;position:relative;top:5px;right:5px;display:inline-block;
}
.cmncv{
display:none;float:right;background:#282828;position:relative;top:-27px;right:-42px;padding:4px;padding-right:8px;padding-left:8px;color:#ffffff;
}
.opincho2{
background-image:url('/images/opincho2.png');
background-repeat:no-repeat;
background-position:0 0;
background-color:transparent;
width:8px;
height:4px;
padding:0;
margin:0;
position:absolute;
left:5px;
bottom:-4px;
}
.friendslink3{padding-top:3px;}
.previous{background-image:url(\"/images/hKuIStIod3i.png\");
background-repeat:no-repeat;
background-position:0pt -123px;
display:block;
height:45px;
width:27px;
line-height:1.28;
cursor:pointer;
text-align:center;
z-index:3;
opacity:0.45;
}
.previous2{background-image:url(\"/images/hKuIStIod3i.png\");
background-repeat:no-repeat;
background-position:0pt -123px;
display:block;
height:45px;
width:27px;
line-height:1.28;
cursor:pointer;
text-align:center;
z-index:3;
}
.next{background-image:url(\"/images/hKuIStIod3i.png\");
background-repeat:no-repeat;
background-position:-56px -123px;
display:block;
height:45px;
width:27px;
line-height:1.28;
cursor:pointer;
text-align:center;
z-index:3;
opacity:0.45;
}
.next2{background-image:url(\"/images/hKuIStIod3i.png\");
background-repeat:no-repeat;
background-position:-56px -123px;
display:block;
height:45px;
width:27px;
line-height:1.28;
cursor:pointer;
text-align:center;
z-index:3;
}
.imgoverlayl{background:transparent;visibility:visible;
}
.imgoverlayr{background:transparent;visibility:visible;
}
.starttag{visibility:hidden!important;z-index:-1!important;}
.endtag{z-index:5;}

.pinchin,.pinchin2,.pinchin3{
background-image:url(\"/images/UvyvLtJTQzO.png\");
background-repeat:no-repeat;
background-position:0pt 0pt;
display:block;
height:5px;
margin-left:17px;
width:9px;
text-align:left;
}
.pinchito2{
background-image:url(\"/images/UvyvLtJTQzO.png\");
background-repeat:no-repeat;
background-position:0pt 0pt;
height:5px;
width:9px;
}
.pinchito3{
background-image:url(\"/images/pinchoa.png\");
background-repeat:no-repeat;
background-position:0pt 0pt;
height:4px;
width:8px;
}
.friendslinkv{color:#6d84b4;text-decoration:none;}
.friendslinkv:hover{color:#6d84b4;text-decoration:underline;cursor:pointer;}
.friendslinkv2{color:#3b5998;text-decoration:none;}
.friendslinkv2:hover{color:#3b5998;text-decoration:underline;cursor:pointer;}
.addmore{
background-image:url(\"/images/jOCwygg6yfM.png\");
background-repeat:no-repeat;
background-position:0pt -245px;
background-color:rgb(238,238,238);
border:1px solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);
cursor:pointer;
font-size:11px;
font-weight:bold;
line-height:13px;
padding:2px 6px;
text-align:center;
vertical-align:top;
white-space:nowrap;
color:#3b5998;
border-spacing:0pt;
border-collapse:collapse;
}
".'
.loc2{
background-color:transparent;
border:0pt none;
-moz-box-sizing:border-box;
outline:0pt none;
width:100%;
position:relative;
padding-bottom:4px;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:11px;
margin:0;
padding:3px;
word-wrap:break-word;
text-align:left;
}
.loc2v{
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:11px;
color:gray;
}
.says2{
height:50px;
-moz-box-sizing;border-box;
min-height:50px;
background-color:transparent;
border:0pt none;
outline:0pt none;
width:100%;
line-height:1.28;
background:none repeat scroll 0% 0% transparent;
overflow:hidden;
resize:none;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:11px;
margin:0;
padding:3px;
word-wrap:break-word;
text-align:left;
}
.addlicon{
background-image:url("/images/hX0sph5M5er.png");
display:inline-block;
vertical-align:middle;
width:11px;
height:12px;
background-position:-214px -14px;
background-repeat:no-repeat;
margin-right:5px;
}
.addliconv{
background-image:url("/images/hX0sph5M5er.png");
display:inline-block;
vertical-align:middle;
width:11px;
height:12px;
background-position:-203px -14px;
background-repeat:no-repeat;
margin-right:5px;
}
.uimenuinner{
list-style-type:none;
margin:0;
padding:0;
text-align:left;
line-height:1.28;
}
.put{
font-size:11px;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
}
.iteman{
padding:1px 16px;
border-style:solid;
border-color:#ffffff;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
color:rgb(17,17,17);
display:block;
font-weight:normal;
line-height:16px;
cursor:pointer;
white-space:nowrap;
font-size:11px;
}
.iteman:hover{
color:#ffffff;
background:#6d84b4;
}
.itemanv a:link,a:visited{
color:rgb(17,17,17);
text-decoration:none;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:11px;
}
.itemanv a:hover,a:active{
text-decoration:underline;
color:#ffffff;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:11px;
}

.uimenu{
border-bottom:medium none;
box-shadow:0pt 0pt 0pt 1px rgba(0,0,0,0.25);
border-width:1px 1px 2px;
border-style:solid;
border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);
-moz-border-colors:none;
-moz-border-image:none;
background-color:#ffffff;
padding:3px 0pt 4px;
overflow-y:auto;
text-align:left;
}
.uimenuinner{
list-style-type:none;
margin:0;
padding:0;
text-align:left;
line-height:1.28;
}
.uimenuseparator{
border-bottom:1px solid rgb(221,221,221);
margin:5px 7px 6px;
padding-top:1px;
}
body table td{font-size:11px;vertical-align:top;}

.photo_wrap{color:rgb(128,128,128);}
.photo_wrap i{outline:1px solid rgb(204,204,204);border:4px solid #ffffff;}
.photo_wrap i:hover{outline:1px solid #3b5998;border:4px solid #ffffff;}
.photo_wrap{padding-right:10px;padding-bottom:10px;padding-top:2px;}

.lbs a:link{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:none;
}
.lbs a:visited{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:none;
}
.lbs a:active{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:underline;
}
.lbs a:hover{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:underline;
}

.headerphotos{
background-color:rgb(242,242,242);
border-bottom:medium none;
border-top:1px solid rgb(226,226,226);
padding:4px 6px 5px;
margin:0pt 0pt 8px;
word-wrap:break-word;
height:15px;
width:489px;
margin-left:20px;
}
.h3{
display:inline-block;
font-size:11px;
position:relative;
';

include("browser_detect.php");
$user_browser = browser_detection('browser');
if($user_browser=="mozilla"){
$paupload='';
$tofupload='10';
$tofuploadvv='10';
$tofuploadv='120';
$leupload='121';
$diupload='none';
echo'
top:0px;';
}
else{
$paupload='padding-right:2px;';
echo'
	top:-10px;';
$tofuploadv='136';
$tofupload='10';
$tofuploadvv='14';
$leupload='114';
$diupload='block';
}
echo'
}
.friendslink2 a:link{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslink2 a:visited{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:none;
}
.friendslink2 a:active{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}
.friendslink2 a:hover{
font-size:11px;font-weight:normal;color:#3b5998;text-decoration:underline;
}
.friendslink2{color:#666666;}
.albti{
border:1px solid rgb(189,199,216);
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:16px;
font-weight:bold;
padding:1px 3px 0pt;

margin:0;
text-align:left;
border-color:#ffffff;
outline:medium none;
-moz-transition:border-color 0.2s ease 0s;
}
.albti:hover{
	border:1px solid rgb(189,199,216);
}
.fupload{
position:relative;top:172px;left:26px;z-index:7;opacity:0;margin-left:0px;width:300px;
}
.fuploadv{
padding:0;margin:0;margin-bottom:8px;margin-left:-38px;position:fixed;bottom:0;z-index:-1;opacity:0;
}
.fuploadvv{
padding:0;margin:0;margin-bottom:8px;margin-left:-123px;position:fixed;bottom:0;z-index:7;opacity:0;width:100px;
}
.pinchito4{
background-image:url("/images/pinchito4.png");
background-repeat:no-repeat;
background-position:0pt 0pt;
height:5px;
width:9px;
}
.location{
background:url("/images/lYE6gSgmDvr.png") no-repeat scroll -3px -5px transparent;
padding-left:20px;
border-width:1px;
padding-right:10px;
padding-top:3px;
width:290px;
border-style:solid;
border-color:rgb(189,199,216);
-moz-border-colors:none;
-moz-border-image:none;
font-size:11px;
text-align:left;
border-collapse:collapse;
border-spacing:0pt;
padding-bottom:4px;
font-size:11px;

font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
}
.fuploaderv{';

if($browser=="chrome" || $browser=="safari"){
echo'left:455px;
top:13px;';

}
else{

echo'
left:458px;
top;14px;
';
}
echo'
}
.fuploaderv{
color:#3b5998;
text-decoration:none;
}
.fuploaderv:hover{
color:#3b5998;
text-decoration:underline;
}
.fuploader a:link{
color:#3b5998;
text-decoration:none;
}
.fuploader a:visited{
color:#3b5998;
text-decoration:none;
}
.fuploader a:active{
color:#3b5998;
text-decoration:underline;
}
.fuploader a:hover{
color:#3b5998;
text-decoration:underline;
}
.ctotv{
background:url("/images/OSVLLjb_ppJ.png") no-repeat scroll left center transparent;
width:auto;
border-right:1px solid rgb(221,221,221);
cursor:pointer;
float:left;
height:30px;
outline:medium none;
text-decoration:none;
line-height:0;
}
.locv,.locr{
background-image:url("/images/RULGUvToqmC.png");
background-repeat:no-repeat;
background-position:-150px -62px;
border-right:1px solid rgb(221,221,221);
cursor:pointer;
float:left;
height:30px;
outline:medium none;
width:29px;
line-height:0;
}
.loc{
background-image:url("/images/RULGUvToqmC.png");
background-repeat:no-repeat;
background-position:-120px -62px;
border-right:1px solid rgb(221,221,221);
cursor:pointer;
float:left;
height:30px;
outline:medium none;
width:29px;
line-height:0;
}
.brightness_slider,.contrast_slider{
width:100px;
height:18px;
background: white;
top: -22px;
border: 1px solid #a9a9a9;
position: relative;
}
.brightness_slider .ui-slider-range,.contrast_slider .ui-slider-range{
background-color: rgb(88, 99, 179) !important;
border: 0px!important;
height: 20px!important;
top: -1px!important;
}
.brightness_slider a,.contrast_slider a{
cursor:pointer!important;
top: -3px!important;
height: 25px!important;
width: 15px!important;
border-radius:0!important;
background:#a9a9a9!important;
margin-left:-15px!important;
}
.filter{
background-image:url("/images/filterb.png");
background-repeat:no-repeat;
background-position:0;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.filter_active{
background-repeat:no-repeat;
background-position:-29px;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.marco{
background-image:url("/images/cortadob.png");
background-repeat:no-repeat;
background-position:0;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.marco_active{
background-position:-29px;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.brightness{
background-image:url("/images/brightnessb.png");
background-repeat:no-repeat;
background-position:0;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.brightness_active{
background-position:-29px;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.contrast{
background-image:url("/images/contrastb.png");
background-repeat:no-repeat;
background-position:0;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.contrast_active{
background-position:-29px;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.colorpickers{
background-image:url("/images/colorpickerb.png");
background-repeat:no-repeat;
background-position:0;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.colorpickers_active{
background-image:url("/images/colorpickerb.png");
background-repeat:no-repeat;
background-position:-29px;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.drop{
background-image:url("/images/water_dropb.png");
background-repeat:no-repeat;
background-position:0;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
}
.drop_active{
background-position:-29px;
float:left;
border-right:1px solid rgb(221,221,221);
width:29px;
line-height:0;
height:30px;
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
}
.ccarita{
margin:2px 0pt -2px 1px;
outline:medium none;
background-image:url("/images/ogYrclupeJVv.png");
height:11px;
width:11px;
background-repeat:no-repeat;
cursor:pointer;
display:inline-block;
padding:0;
white-space:nowrap;
}
.ccarita:hover{
margin:2px 0pt -2px 1px;
outline:medium none;
background-image:url("/images/ogYrclupeJVv.png");
background-position:0px -11px;
height:11px;
width:11px;
background-repeat:no-repeat;
cursor:pointer;
display:inline-block;
padding:0;
white-space:nowrap;
}
.wherew{
background-color:transparent;
border:0pt none;
-moz-box-sizing:border-box;
outline:0pt none;
width:290px;
position:absolute;
padding:3px;
padding-left:5px;
padding-bottom:4px;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:11px;
margin:0;
}
.itema{
border-style:solid;
border-color:#ffffff;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
color:rgb(17,17,17);
display:block;
font-weight:normal;
line-height:16px;
padding:1px 16px 1px 22px;
text-decoration:none;
cursor:pointer;
white-space:nowrap;
list-style-type:none;
}
.itema:hover{
border-style:solid;
border-color:#ffffff;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
color:#ffffff;
display:block;
font-weight:normal;
line-height:16px;
padding:1px 16px 1px 22px;
text-decoration:none;
cursor:pointer;
white-space:nowrap;
list-style-type:none;
background-color:#6d84b4;
}
.itema2{
background:url("/images/6NHt8H5uyPf.png") no-repeat scroll left 4px transparent;
border-style:solid;
border-color:#ffffff;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
color:#ffffff;
display:block;
font-weight:bold;
line-height:16px;
padding:1px 16px 1px 22px;
text-decoration:none;
cursor:pointer;
white-space:nowrap;
list-style-type:none;
background-color:#6d84b4;
}
.itema2:hover{
background:url("/images/6NHt8H5uyPf.png") no-repeat scroll left 4px transparent;
border-style:solid;
border-color:#ffffff;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
color:#ffffff;
display:block;
font-weight:bold;
line-height:16px;
padding:1px 16px 1px 22px;
text-decoration:none;
cursor:pointer;
white-space:nowrap;
list-style-type:none;
background-color:#6d84b4;
}
.selectopu{
border-width:1px 1px 2px;
border-style:solid;
border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);
-moz-border-colors:none;
-moz-border-image:none;
background-color:#ffffff;
padding:3px 0pt 4px;
overflow-y:auto;
}
.selectop{
border:1px solid rgb(204,204,204);
background-image:url("/images/RULGUvToqmC.png");
background-repeat:no-repeat;
background-position:-2px -42px;
height:17px;
padding:0;
width:17px;
vertical-align:top;
background-color:rgb(238,238,238);
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1)
cursor:pointer;
position:absolute;
right:10px;
top:10px;
line-height:13px;
white-space:nowrap;
text-align:center;
cursor:pointer;
}
.selectopv{
border:1px solid #333333;
background-image:url("/images/RULGUvToqmC.png");
background-repeat:no-repeat;
background-position:-43px -42px;
height:17px;
padding:0;
width:17px;
vertical-align:top;
background-color:rgb(238,238,238);
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1)
cursor:pointer;
position:absolute;
right:10px;
top:10px;
line-height:13px;
white-space:nowrap;
text-align:center;
cursor:pointer;
}
#sortable { list-style-type: none; margin: 0; padding: 0; }
#sortable li {}
.ui-state-default, .ui-widget-content .ui-state-default{border:none; background:none;}
.ui-state-highlight{float:left;width:308px!important;margin:0;padding:0;border:0;margin-bottom:15px;background:transparent;position:relative;left:0;top:0;}
.ui-state-highlightv{float:left;width:171px;margin:0;padding:0;border:0;margin-bottom:21px;margin-right:10px;background:transparent;position:relative;left:0;top:0;}
.ui-state-highlightvv{float:left;width:171px;margin:0;padding:0;border:0;margin-bottom:7px;margin-right:9px;background:transparent;position:relative;left:0;top:0;}

.uioverlay{
background-color:rgba(255, 255, 255, 0.8);
position:fixed;
bottom:0pt;
left:0pt;
right:0pt;
top:0pt;
z-index:450;
overflow-x:hidden;
overflow-y:auto;
opacity:0;
}
.addpl{
color:#3b5998;
text-decoration:none;
cursor:pointer;
}
.addpl:hover{
color:#3b5998;
text-decoration:underline;
cursor:pointer;
}

.ctot{
background-image:url("/images/0VDksn8o5BR.png");
background-repeat:no-repeat;
background-position:-364px -471px;
border-right:1px solid rgb(221,221,221);
cursor:pointer;
float:left;
height:30px;
outline:medium none;
width:29px;
line-height:0;
}
.says{
height:55px;
line-heigh:14px;
padding:0;
width:100%;
background-color:transparent;
border:0pt none;
outline:0pt none;
background:none repeat scroll 0% 0% transparent;
overflow-x:hidden;
overflow-y:auto;
resize:none;
cursor:default;
font-size:11px;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
margin:0;
}
.pupload{
width:185px;
height:26px;
text-align:center;
background-image:url("/images/photoupload.png");
background-repeat:no-repeat;
background-position:0 0;
border:0px solid #999999;
border-bottom:0px solid #888888;
padding:0;
margin:0;
cursor:pointer;
}
.nphotosb{
border-bottom:0;
border:1px solid rgb(204,204,204);
background-color:#ffffff;
padding-top:10px;
padding-bottom:10px;
padding-left:20px;
padding-right:20px;
border-color:rgba(0,0,0,0.1) rgb(196,205,224) rgb(196,205,224);
width:813px;
border-top-color:rgb(196,205,224);
margin-top;50px;
position:fixed;
bottom:0;
}
.morephotosu{
background-image:url("/images/0VDksn8o5BR.png");
background-repeat:no-repeat;
background-position:0pt -147px;
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
text-align:center;
vertical-align:top;
white-space:nowra;
border-collapse:collpase;
border-spacing:0;
color:rbg(59,89,152);';

if($browser=='chrome'){
echo'
padding-top:4px;
padding-bottom:4px;
';
}
else{
echo '
padding-top:1px;
padding-bottom:2px;
';
}

echo'
padding-right:2px;
padding-left:17px;
}
.massign{
margin-top:2px;
vertical-align:top;
width:8px;
height:14px;
background-image:url("/images/bQzBviBMCsj.png");
background-repeat:no-repeat;
background-position:-8px -423px;
margin-right:5px;
display:inline-block;
cursor:poiinter;
line-height:13px;
white-space:nowrap;
';

if($browser=="chrome" || $browser=="safari"){
echo '
left:8px;
top:8px;
';
}
else{
echo '
left:6px;
top:6px;';
}

echo'
}
';
?>
			<?php // ob_end_flush(); ?>