<?php
include("start.php");

$secho="";

$secho.='<div class="_cue" id="u_1t_0"><a class="_cuh limit_privacy" href="#">Close</a><div class="pvm _cug"><div class="mbm fwb">Limit The Audience for Old Posts on Your Wall</div><div class="clearfix"><img class="_8o _8s lfloat img" src="/images/LT5vUbY3siF.gif" alt="" height="23" width="25"><div class="_8m "><div class="mbm fcg">If you use this tool, content on your wall you\'ve shared with friends of friends or Public will change to Friends. Remember: people who are tagged and their friends may see those posts as well.</div><div class="mbl fcg">You also have the option to individually change the audience of your posts. Just go to the post you want to change and choose a different audience.</div><a class="uiButton displaydialog" href="#" role="button" rel="dialog-post" data-d_width="562" data-d_isajax="t" data-d_cancel="Cancel" data-d_cancel_function="close_dialog_f" data-d_fjax="/ajax/settings/privacy/masher_confirm.php"><span class="uiButtonText">Limit Old Posts</span></a></div></div></div></div>';

$dclass="limit_privacy";
include("privacy_close_config.php");

$secho.='
<script type="text/javascript">
$("#u_1t_0").parents(".sbSettingsListItem").eq(0).addClass("openPanel");
</script>
';

if(!isset($_GET['section'])){
echo $secho;	
include("end.php");
}
?>