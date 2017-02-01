<?php
include("start.php");

include("start.php");
include("populate_page.php");
$params['style']='';
?>
<?php
$echo.='


  <video class="video-js video-js-gallery vjs-default-skin" controls preload="none" width="900" height="564"
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup="{}" data-source="gallery">
    <source src="/ffmpeg/prueba.mp4" type="video/mp4" />
  </video>
  

  <video class="video-js video-js-hd video-js-hd-gallery vjs-default-skin" controls preload="none" width="900" height="564"
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup="{}" data-source="gallery">
    <source src="/ffmpeg/hanging.flv" type="video/mp4" />
  </video>

  
  <div style="display:none;">
  <div id="vid_source" data-source-name="prueba">
  </div>

<script type="text/javascript">
var isembed=false;
var uhd=false;

$(document).ready(function(){
var vid_normal=$(".video-js-gallery").attr("id");
var vid_hd=$(".video-js-hd-gallery").attr("id");

if(uhd==1){
togglehd("t",vid_normal,vid_hd);	
}
else{
togglehd("f",vid_normal,vid_hd);		
}




});
</script>

'; ?>
<?php
$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='no_columns_no_borders';


include("end.php");
?>