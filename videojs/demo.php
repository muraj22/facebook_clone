<!DOCTYPE html>
<html>
<head>
  <title>Video.js | HTML5 Video Player</title>
  <link href="video-js.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/jquery.min.js"></script>
	<script type="text/javascript" src="/jquery.ba-dotimeout.min.js"></script>
      <script src="video.js"></script>
</head>
<body>

<?php
echo'


<div id="vid_wrapper" style="display:block;width:900px;height:564px;">
<div id="play_again" style="position:relative;width:250px;margin:0 auto;">
<div id="video_share_end">Share</div>
<div id="play_again_end">Play Again</div>
</div>
  <video id="vid1" class="video-js vjs-default-skin" controls preload="none" width="900" height="564"
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup="{}">
    <source src="/ffmpeg/prueba.mp4" type="video/mp4" />
  </video>
  </div>
  
  <div id="vid_wrapperv" style="display:none;">
  <video id="vidv" class="video-js vjs-default-skin" controls preload="none" width="900" height="564"
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup="{}">
    <source src="/ffmpeg/hanging.flv" type="video/mp4" />
  </video>
  </div>
  
  <div style="display:none;">
  <div id="vid_source" data-source-name="prueba">
  </div>

<script type="text/javascript">

var vid_hd=false;
var vid_normal=false;

var ishd=false;

function togglehd(w){

if(w=="t"){
ishd=true;
bananad("vidv");
vid_normal.pause();
vid_normal.currentTime(0);
vid_hd= _V_("vidv");
$("#vid_wrapper").css("display","none");
vid_hd.load(); 
vid_hd.play(); 
$("#vid_wrapperv").css("display","block");	
}
else{
ishd=false;
bananad("vid1");
vid_hd.pause();
vid_hd.currentTime(0);
vid_normal= _V_("vid1");
$("#vid_wrapperv").css("display","none");
vid_normal.load(); 
vid_normal.play(); 
$("#vid_wrapper").css("display","block");
}

}

bananad("vid1");
var vid_normal= _V_("vid1");
_V_.options.flash.swf = "video-js.swf";

function onComplete(){  


}  
vid_normal.addEvent("ended", onComplete);
</script>

</body>
</html>
'; ?>