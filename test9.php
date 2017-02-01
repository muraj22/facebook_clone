<?php
include("start.php");
echo'<!DOCTYPE html>
<html id="html">
<head>
<title>Upfrev</title>';
$rhelper='';
include("master/head.php");
echo'
</head>
<body style="position:relative;" id="body">';
?>
<?php
include("master/head_design.php");
?>
<?php
echo'<div style="width:180px;height:100%;position:absolute;top:0px;margin:0;padding:0;padding-top:56px;" id="left_col" onclick="hidelogout();close_dialog2();close_dialog3();close_dialog4();closeallbt();">'; //left column
include("friends_on_chat.php");
echo'</div>';
echo'
<div style="width:529px;margin:0;margin-left:180px;height:auto;position:absolute;top:0px;padding:0;padding-left:0px;padding-right:0px;padding-top:65px;min-height:1080px;border-left:1px solid #cccccc;border-right:0px solid #cccccc;" id="main_divg" onclick="hidelogout();close_dialog2();close_dialog3();close_dialog4();closeallbt();">'; //main div
echo'<div style="margin:0;padding:0;position:absolute;left:555px;top:0;height:100%;width:244px;background:transparent;border-right:1px solid #cccccc;" id="right_cl">
<div style="width:0;height:35px;display:block;margin:0;padding:0;background:transparent;">
</div>'; // right column
echo'</div>';
echo'</div>'; //se termina main div
include("chat.php");
echo'</body>
</html>';
?>