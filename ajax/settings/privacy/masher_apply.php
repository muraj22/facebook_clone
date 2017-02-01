<?php
include("start.php");


$all_tables=array();

$all_tables[]="media";
$all_tables[]="albums";

$all_tables[]="status";
$all_tables[]="shares";

$all_tables[]="options";

$all_tables[]="privacy_last";

$all_tables[]="nt";

$all_tables[]="contact_emails";
$all_tables[]="contact_phones";
$all_tables[]="contact_im";

foreach($all_tables as $k=>$v){
mysql_query("UPDATE $v SET privacy='1' WHERE id='$uid' AND (privacy='0' OR privacy='4')");
}

$body='The audience for the selected content has been changed.';

echo'
<script type="text/javascript">
$("#d_title_'.$mid.$uid.'").html("Audience Change Complete");
$("#d_body_'.$mid.$uid.'").html(\''.$body.'\');

$("#d_button_confirm_'.$mid.$uid.'").val("Close");


$("#d_label_confirm_'.$mid.$uid.'").bind("click",function(){

var did=$(this).parents(".pop_container3").eq(0).attr("data-opener");
var dialogid=$("#"+did).attr("data-dialogid");

$(this).parents(".white_overlay").fadeOut("slow",function(){

remove_dialog(dialogid);	

});

});


$("#d_label_confirm_'.$mid.$uid.'").css("display","inline-block");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");

$("#d_container_'.$mid.$uid.'").parent().eq(0).wrap(\'<div id="d_overlay_'.$mid.$uid.'" class="white_overlay"></div>\');

</script>
';

include("end.php");
?>