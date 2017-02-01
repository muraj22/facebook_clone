<?php
include("start.php");

$uidv=$uid;
$ltypev="shares";
$sbid="";

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$res["privacy_button"]='<ul class="uiList inlineBlock" style="position:relative;top:0px;float:right;margin-right:5px;">';

$privacy_configuration="big";
$privacy_source="shares"; //edit profile

include("buttons/privacy_button.php");
$res["privacy_button"].=$button;
$res["privacy_button"].='</ul>';

echo json_encode($res);

include("end.php");
?>