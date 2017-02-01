<?php
include("start.php");

$body='<div class="pam">You are about to limit old posts on your timeline without reviewing them. Note: This global change can\\\'t be undone in one click. If you change your mind later, you\\\'ll need to change the audience for each of these posts one at a time.</div>';

echo'
<script type="text/javascript">
$("#d_title_'.$mid.$uid.'").html("Are You Sure You Want to Proceed?");
$("#d_body_'.$mid.$uid.'").html(\''.$body.'\');

$("#d_button_confirm_'.$mid.$uid.'").val("Confirm");

var path=$("#d_label_confirm_'.$mid.$uid.'");

$(path).attr("data-d_isajax","t");
$(path).attr("data-d_width","562");

$(path).attr("data-d_fjax","/ajax/settings/privacy/masher_apply.php");



$("#d_label_confirm_'.$mid.$uid.'").addClass("displaydialog");


$("#d_label_confirm_'.$mid.$uid.'").bind("click",function(){
var did=$(this).parents(".pop_container3").eq(0).attr("data-opener");
var dialogid=$("#"+did).attr("data-dialogid");

remove_dialog(dialogid);	
});


$("#d_label_confirm_'.$mid.$uid.'").css("display","inline-block");
$("#d_label_cancel_'.$mid.$uid.'").css("display","inline-block");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");

$("#d_container_'.$mid.$uid.'").parent().eq(0).wrap(\'<div id="d_overlay_'.$mid.$uid.'" class="white_overlay"></div>\');

</script>
';

include("end.php");
?>