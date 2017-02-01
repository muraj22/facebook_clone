<?php
include("headerjs.php");
?>
<?php
include("start.php");
foreach($_GET as $k=>$v){
${$k}=$v;
}
$sbid=str_replace("/","",$sbid);
$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid'");
while($m=mysql_fetch_array($r)){
$videow=$m['videow'];
$videoh=$m['videoh'];
$p=$m['pics'];
$uidv=$m['id'];	
$size=getimagesize("../users/$uidv"."/pics/"."$p");
$swidth=$size[0];
$sheight=$size[1];
$vids=$m['vids'];
$vidshd=$m['vidshd'];
}
$c=mysql_num_rows($r);
if($c==0){
mysql_close($con); exit();	
}
$mleft=round($swidth/2,2);
$mtop=round($sheight/2,2);
?>
<?php
echo'var isembed=true;';
include("jquery.min.js");
echo'$("#embed_'.$sbid.'").append(\'<video class="video-js vjs-default-skin video-js-none" controls preload="none" width="'.$videow.'" height="'.$videoh.'" poster="/'.$uidv.'/pics/'.$p.'" data-setup="{}" data-source="embed" data-autoplay="" data-width="'.$swidth.'" data-height="'.$sheight.'" data-marginl="'.$mleft.'" data-margint="'.$mtop.'"><source src="/users/'.$uidv.'/vids/'.$vids.'" type="video/mp4"></source></video>\');';
if($vidshd!=""){
echo'$("#embed_'.$sbid.'").append(\'<video class="video-js video-js-hd vjs-default-skin video-js-none" controls preload="none" width="'.$videow.'" height="'.$videoh.'" poster="/'.$uidv.'/pics/'.$p.'" data-setup="{}" data-source="embed" data-autoplay="" data-width="'.$swidth.'" data-height="'.$sheight.'" data-marginl="'.$mleft.'" data-margint="'.$mtop.'"><source src="/users/'.$uidv.'/vids/'.$vidshd.'" type="video/mp4"></source></video>\');';	
}
echo'
var appendto=false;
var prependto=false;

if($("head").length>0){var appendto="head"; prependto=false;}
else if($("body").length>0){var prependto="body"; appendto=false;}
else {var prependto="document"; appendto=false;}

var linkm_vjs=\'<link media="screen" rel="stylesheet" href="/videojs/video-js.css" type="text/css">\';

if(appendto){$(appendto).append(linkm_vjs);}
else{$(prependto).prepend(linkm_vjs);}

';
include("jquery.ba-dotimeout.min.js");
echo'
var uhd=0;
';
include("videojs/video.js");
?>
<?php include("endf.php"); ?>