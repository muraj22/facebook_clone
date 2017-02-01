<?php
ignore_user_abort(true);
include("start.php");
$ddomain=explode("@",$uid_a['email']);
$ddomain=$ddomain[1];
echo'
<script type="text/javascript">
$("#d_label_confirm_'.$mid.$uid.'").before(\'<div style="float:left;" class="mts dialog_foot_note lb"><a class="togglereal" target="_blank" data-url="http://'.$ddomain.'" href="#">Go to Your Email</a></div>\');
$("#d_body_'.$mid.$uid.'").html(\'<ul class="uiList _4kg _6-h _6-j _6-i"><li>Another email was sent to: <strong>'.$uid_a['email'].'</strong>.</li><li>Please click on the link in that email to confirm your email address. Be sure to check your spam folder.</li></ul>\');
$("#d_body_'.$mid.$uid.'").find("input:text,textarea").blur();

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");
</script>
';
include("settingsd/general/initial_confirmation_email.php");
include("end.php");
?>