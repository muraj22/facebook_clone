<?php
function populate_page($echo,$params){
global $ctimezone;

global $uid_friends;
global $uid_friends_comma;

global $which_friends_comma;
global $which_friends;

global $uid_friends_rs;
global $uid_friends_rsv;

global $browser;

include("functions/sb_user.php");

global $uidv;
global $uid;
global $uid_a;
if($uidv==''){$uidv=$uid;}
$guidv=$uidv;
global $con;
global $uid;
global $un;

global $flocalhost;

if(!isset($params['style'])){
$params['style']="";
}

if(isset($params['clist'])){
$clist=$params['clist'];
}

if(!isset($params['right_col_modules'])){
//$params['right_col_modules'][]='poke_suggestions';
//$params['right_col_modules'][]='birthdays';
$params['right_col_modules'][]='pokes';
$params['right_col_modules'][]='pymk';
}

if(isset($params['left_column_id'])){
$data_left_column_id=' data-lcid="'.$params['left_column_id'].'" ';
}
else{
$data_left_column_id="";
}

if(isset($params['left_link_n']) || isset($params['left_link_w'])){
include("wlinks.php");
}
if($params['layout']=='right_column_w_no_borders'){
$params['layout']='right_column_w';
$border_set='sixf';
$border_setv='sixfv';
$apply_no_columns="";
}
else if($params['layout']=='right_column_n_no_borders'){
$params['layout']='right_column_n';
$border_set='sixf';
$border_setv='sixfv';
$apply_no_columns="";
}
else if($params['layout']=='no_columns_no_borders'){
$params['layout']='no_columns';
$border_set='sixf';
$border_setv='sixfv';
$apply_no_columns="";
}
else{
$border_set="";
$border_setv="";
}

if(!isset($params['header_area'])){
$params['header_area']="";
}

echo'<!DOCTYPE html>
<html id="upfrev">
<head>
<meta charset="utf-8" />
<title>'.$params['title'].'</title>';
$rhelper=$params['rhelper'];

$rhelper_js=$params['rhelper_js'];

if($params['layout']=='normal_w' OR $params['layout']=='left_column_w' OR $params['layout']=='right_column_w'){
echo'<link media="screen" rel="stylesheet" href="/master/wall_css.php" type="text/css" />';
}
include("master/head.php");
echo $params['style'];
if(!isset($params['body_class'])){
$params['body_class']="";
}

if(isset($apply_no_columns)){
$params['body_class'].=" nocolumns";
}

$dclass=$params['body_class'];

echo'
</head>
<body style="position:relative;" class="'.$dclass.'" id="body">
<div class="body" id="bodyv">';
?>
<?php
include("master/head_design.php");
?>
<?php
echo'<div class="main_wrapper">';
?>
<?php
$uidv=$guidv;
if($params['layout']=='normal_n'){
$data_lcolumn="nf";

echo'<div class="normal_nf_left" data-lcolumn="'.$data_lcolumn.'" '.$data_left_column_id.' id="left_col" data-uidv="'.$uidv.'">'; //left column
if(isset($params['left_column'])){
echo $params['left_column'];
}
else{
include("master/left_column_n.php");
echo'<script type="text/javascript">
$("#llm'.$wlink.'").removeClass("wrapper_fotos");
$("#llm'.$wlink.'").addClass("wrapper_fotos2");
$("#llm'.$wlink.'v").removeClass("linkwrap");
$("#llm'.$wlink.'v").addClass("linkwrap2");
</script>';
if(isset($params['left_menu_added'])){
echo $params['left_menu_added'];
}
if(!isset($params['nochat'])){
include("friends_on_chat.php");
}
}
echo'</div>';

echo'<div class="contentarea_global">';
echo $params['header_area'];
echo'<div class="normal_nf_right" data-rcolumn="nf" id="right_cl">';
include("master/right_column_n.php");
echo'</div>'; // right column

echo'
<div class="normal_nf_main" id="main_divg">'; //main div
}
else if($params['layout']=='left_column_n'){
$data_lcolumn="nf";
echo'<div class="left_nf_left" data-lcolumn="'.$data_lcolumn.'" '.$data_left_column_id.' id="left_col">'; //left column
if(isset($params['left_column'])){
echo $params['left_column'];
}
else{
include("master/left_column_n.php");
echo'<script type="text/javascript">
$("#llm'.$wlink.'").removeClass("wrapper_fotos");
$("#llm'.$wlink.'").addClass("wrapper_fotos2");
$("#llm'.$wlink.'v").removeClass("linkwrap");
$("#llm'.$wlink.'v").addClass("linkwrap2");
</script>';
if(isset($params['left_menu_added'])){
echo $params['left_menu_added'];
}
if(!isset($params['nochat'])){
include("friends_on_chat.php");
}
}
echo'</div>';

echo'<div class="contentarea_global">';
echo $params['header_area'];
echo'<div class="left_nf_right" data-rcolumn="nf" id="right_cl">';
echo'</div>'; // right column

echo'
<div class="left_nf_main" id="main_divg">'; //main div
}
else if($params['layout']=='right_column_n'){

echo'<div class="contentarea_global">';
echo $params['header_area'];
echo'<div class="right_nf_right" data-rcolumn="nf" id="right_cl">';
include("master/right_column_n.php");
echo'</div>'; // right column


echo'
<div class="right_nf_main '.$border_set.'" id="main_divg">'; //main div


}
else if($params['layout']=='normal_w'){
$data_lcolumn="w";
echo'<div class="normal_w_left" data-lcolumn="'.$data_lcolumn.'" '.$data_left_column_id.' id="left_col">'; //left column
if(isset($params['left_column'])){
echo $params['left_column'];
}
else{
include("master/left_column_w.php");
echo'<script type="text/javascript">
$("#llm'.$wlink.'").removeClass("wrapper_fotos");
$("#llm'.$wlink.'").addClass("wrapper_fotos2");
$("#llm'.$wlink.'v").removeClass("linkwrap");
$("#llm'.$wlink.'v").addClass("linkwrap2");
</script>';
if(isset($params['left_menu_added'])){
echo $params['left_menu_added'];
}
}
echo'</div>';

echo'<div class="contentarea_global">';
echo $params['header_area'];
echo'<div class="normal_w_right"  data-rcolumn="w" id="right_cl">';
echo'</div>'; // right column

echo'
<div class="normal_w_main" id="main_divg">'; //main div
}
else if($params['layout']=='left_column_w'){
$data_lcolumn="w";
echo'<div class="left_w_left" data-lcolumn="'.$data_lcolumn.'" '.$data_left_column_id.' id="left_col">'; //left column
if(isset($params['left_column'])){
echo $params['left_column'];
}
else{
include("master/left_column_w.php");
echo'<script type="text/javascript">
$("#llm'.$wlink.'").removeClass("wrapper_fotos");
$("#llm'.$wlink.'").addClass("wrapper_fotos2");
$("#llm'.$wlink.'v").removeClass("linkwrap");
$("#llm'.$wlink.'v").addClass("linkwrap2");
</script>';
if(isset($params['left_menu_added'])){
echo $params['left_menu_added'];
}
}
echo'</div>';

echo'<div class="contentarea_global">';
echo $params['header_area'];
echo'<div class="left_w_right" data-rcolumn="w" id="right_cl">';
echo'</div>'; // right column

echo'
<div class="left_w_main" id="main_divg">'; //main div
}
else if($params['layout']=='right_column_w'){
echo'<div class="contentarea_global">';
echo $params['header_area'];
echo'<div class="right_w_right '.$border_setv.'" data-rcolumn="w" id="right_cl">';
echo'</div>'; // right column

echo'<div class="right_w_main '.$border_set.'" id="main_divg">'; //main div
}
else if($params['layout']=='no_columns'){


echo'<div class="contentarea_global">';
echo $params['header_area'];
echo'<div class="nocolumns_right '.$border_setv.'" id="right_cl">';
echo'</div>'; // right column

echo'<div class="nocolumns_main '.$border_set.'" id="main_divg">'; //main div
}

echo'<div id="main_divgv">';
echo $echo;
echo'</div>'; //se termina main div gv
echo'</div>'; //se termina main div


echo'</div>'; //se termina rapper de right col + main col (content_area)..


echo'</div>'; //se termina wrapper de los tres divs

echo'
<div id="pageFooter">
<div id="contentCurve"></div><div class="clearfix" id="footerContainer"><div class="mrl lfloat"><div class="fsm fwn lb"><span> Upfrev © 2013</span> · <a rel="dialog" href="/ajax/intl/language_dialog.php?" title="Use Upfrev in another language." role="button">English (US)</a></div></div><div class="navigation fsm fwn lb" role="contentinfo" aria-label="Upfrev site links"><a href="#" title="Advertise on Upfrev.">Create an Ad</a> · <a href="/pages/create.php?ref_type=sitefooter" onclick="return false;" title="Create a Page">Create a Page</a> · <a onclick="return false;" href="/careers/?ref=pf" title="Make your next career move to our awesome company.">Careers</a> · <a href="/privacy/explanation" onclick="return false;" title="Learn about your privacy and Subsook.">Privacy</a> · <a href="/help/cookies" onclick="return false;" title="Learn about cookies and Upfrev.">Cookies</a> · <a href="/policies/?ref=pf" accesskey="9" onclick="return false;" title="Review our terms and policies.">Terms</a> · <a href="/help/?ref=pf" onclick="return false;" accesskey="0" title="Visit our Help Center.">Help</a></div></div>
</div>';


if(!isset($params['nochat'])){
include("chat.php");
}
include("js/footer_scripts.php");

/*echo '<script type="text/javascript">';
include("dcph.php");
echo $sechov;
echo'</script>';
*/

echo'</div>
</body>
</html>';
}

function populate_page_small($echo,$params){
$rhelper=$params['rhelper'];


if(isset($params["body_class"])){
$dclass=$params["body_class"];	
}
else{
$dclass="";
}

$rhelper_js=$params['rhelper_js'];

echo'<!DOCTYPE html>
<html id="html">
<head>
<meta charset="utf-8" />
<title>'.$params['title'].'</title>';
echo $params['style'];
echo'
</head>
<body style="position:relative;" class="'.$dclass.'" id="body">
';
echo $echo;
echo'
</body>
</html>';
}
$echo='';
?>