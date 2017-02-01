<?php
include("start.php");
include("populate_page.php");

$params['style']='';

$rhelper="../";
$rhelper_js="../";

include("functions/video_title_in_date.php");
include("functions/simplify_video_duration.php");

$sbid=$_GET['v'];
$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND vidso!='' $media_qf");
while($m=mysql_fetch_array($r)){
$albumn=$m['albumn'];	
$albumid=$m['albumid'];
$uti=sb_user($m['id']);
$uidv=$uti['id'];
$unv=$uti['username'];
$fullname=$uti['fullname'];
$profilephoto=$uti['profilepict'];


$vt=$m['title'];
if($vt==""){
$vt=video_title_in_date($m['datetimep']);
}

}
$echo.='
<div clas="sbxPhoto croppingMode" id="sbPhotoPageContainer">
<div id="sbPhotoPageHeader" class="pvm">
<div class="uiHeader pbs"><div class="clearfix uiHeaderTop"><div><h2 tabindex="0" class="uiHeaderTitle">'.$vt.'</h2></div></div></div><div class="clearfix"><div class="lfloat fsm fwn fcg lb"><a href="/'.$unv.'/photos?album='.$albumid.'">Back to Album</a></div></div>
</div>
';




$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND vidso!='' $media_qf");
while($m=mysql_fetch_array($r)){
$aorder=$m['norder'];

$wk='r';

$albumid=$m['albumid'];

$r2=mysql_query("SELECT * FROM media WHERE albumid='$albumid' AND visibility!='d' AND nye='3' $media_qf ORDER BY norder DESC");
$d=mysql_num_rows($r2);

$whicha=$albumid;

$swidth=$m['videow'];
$sheight=$m['videoh'];

$duration=simplify_video_duration($m['duration']);

if($m['vids']=="" && $m['nye']==2){
$anye='<div><div style="max-width:720px;max-height:720px;visibility:visible;position:relative;display:inline-block;vertical-align:middle;"><span class="fcg">This video is still encoding. Please try again later.</span><script type="text/javascript">function video_reloadv(){location.reload(true);} var video_reload=setTimeout("video_reloadv()",7000);</script></div></div>';
}
else{
$anye='<div style="cursor:pointer;" onclick="getnext(\''.$m['pics'].'\',\''.$uidv.'\',\''.$whicha.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\''.$wk.'\',\'f\',\'\',\'\',\'\',\'vid\',\''.$m['vids'].'\',\''.$m['vidshd'].'\',\''.$m['sbid'].'\');"><div class="vjs-big-play-button"><span></span></div><img id="profile_pic_s" src="/'.$uid.'/pics/'.$m['pics'].'" style="max-width:720px;max-height:720px;visibility:visible;position:relative;display:inline-block;vertical-align:middle;"></div>';	
}

$echo.='
<div style="width:100%;background:rgb(246, 246, 246);text-align:center;display:inline-block;position:relative;height:auto;min-height:453px;" id="pic_container" class="sbPhotoImageStage"><div style="display:inline-block;position:relative;z-index:1;" class="vjs-default-skin" id="pic_containerv">'.$anye.'</div><div id="sbPhotoPageButtons" class="sbPhotosPhotoButtons"><div class="cropMessage lb" style="display:none;">Drag the corners of the transparent box above to crop this photo into your profile picture. <a class="doneCroppingLink" href="#">Done Cropping</a> &#124; <a class="cancelCroppingLink" href="#">Cancel</a></div></div></div>

<script type="text/javascript">
var ah=$("#pic_container").height();
$("#pic_container").css("line-height",ah+"px");
</script>
';	

}

$echo.='
<div style="float:right;" class="llb">
<a href="/video/editvideo.php?v='.$sbid.'">Edit This Video</a>
</div>
';

$echo.='
<script type="text/javascript">
window.onbeforeunload = function() { 
clearTimeout(video_reload);
}
</script>
';


include("gallery_viewer.php");
$echo.=$secho;


$params['rhelper_js']='../';
$params['rhelper']='../';
$params['title']='Upfrev';

$params['layout']='right_column_n_no_borders';


include("end.php");
?>