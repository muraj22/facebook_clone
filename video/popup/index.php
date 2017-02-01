<?php
session_start();
include("start.php");
include("populate_page.php");
$rhelper_js='../../';
$params['style']='';
?>
<?php
include("functions/grs.php");
$dk_upload=grs(25);
$dk_upload2=grs(25);
$echo.='
<script type="text/javascript">
$("._2yg",window.opener.document).find(":file",window.opener.document).each(function(){

});
function track_progress(){

}
function video_upload_trigger(response){
	//alert(response);
}
</script>

<div data-u_trigger="t" data-u_form_location="window.opener" data-u_form="._2yg" data-u_receiver="video/upload_receiver.php" data-u_progress="t" data-u_function="video_upload_trigger" data-u_starts="track_progress" class="displaynoneimportant" id="video_upload"></div>

<script type="text/javascript">
$("#video_upload").click();	
window.opener.restore_mind();
</script>

';
?>
<?php
$params['rhelper_js']='../../';
$params['rhelper']='../../';
$params['title']='Upfrev';

$params['layout']='no_columns_no_borders';


include("end.php");
?>