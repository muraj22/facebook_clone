<?php
include("start.php");
echo'
<script type="text/javascript">
$("#d_body_'.$mid.$uid.'").html(\'<div class="dialog_body"><div class="_change_email"><input type="hidden" name="fb_dtsg" value="AQDpHevi" autocomplete="off"><table class="uiInfoTable noBorder" role="presentation"><tbody><tr><th class="label">Current Email:</th><td class="data">'.$uid_a['email'].'</td></tr><tr class="dataRow"><th class="label">New Email:</th><td class="data"><input type="text" class="inputtext DOMControl_placeholder" size="40" name="new_email" placeholder="Enter a new email address" value="Enter a new email address" aria-label="Enter a new email address" style=""></td></tr></tbody></table></div></div>\');
$("#d_body_'.$mid.$uid.'").find("input:text,textarea").blur();

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");
</script>
';
include("end.php");
?>