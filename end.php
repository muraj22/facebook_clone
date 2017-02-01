<?php
if(isset($death_notice)){ //typical for privacy read out of album view
$echo=''; //here include the div which specifies the page no longer exists or has expired	
$params['title']="Upfrev"; //override any possible privacy spoof such as document title
}

if(isset($_SERVER["HTTP_X_PJAX"]) && function_exists("populate_page")){

$rhelper=$params['rhelper'];
$rhelper_js=$params['rhelper_js'];

if($uidv==''){$uidv=$uid;}

$rs="{.__}{__}reserved{__}{__.}";
$nf_w_exp=explode("_",$params['layout']);
foreach($nf_w_exp as $k=>$v){
if($v=="n"){
$nf_w="nf";	
}
else if($v=="w"){
$nf_w="w";
}
else{
$nf_w="nf";	
}
}
if(!isset($params['layout'])){
$params['layout']='';	
}
if(!isset($params['style'])){
$params['style']='';	
}
echo $echo.$rs;

if(!isset($params['right_col_modules'])){
//$params['right_col_modules'][]='poke_suggestions';
//$params['right_col_modules'][]='birthdays';
$params['right_col_modules'][]='pokes';
$params['right_col_modules'][]='pymk';
}

if($params['layout']=='right_column_w_no_borders'){
$params['layout']='right_column_w';	
$apply_no_columns="";
}
else if($params['layout']=='right_column_n_no_borders'){
$params['layout']='right_column_n';	
$apply_no_columns="";
}
else if($params['layout']=='no_columns_no_borders'){
$params['layout']='no_columns';	
$apply_no_columns="";
}


if($params['layout']=='normal_n' || $params['layout']=='left_column_n'){
if(isset($params['left_column'])){
//echo $params['left_column'];
}

else{
include("master/left_column_n.php");
if(isset($params['left_menu_added'])){
echo $params['left_menu_added'];	
}
if(!isset($params['nochat'])){
	echo'<div class="sepalo"></div>';
include("friends_on_chat.php");
}
}

}

if($params['layout']=='normal_w' || $params['layout']=='left_column_w'){
if(isset($params['left_column'])){
//echo $params['left_column'];
}
else{
include("master/left_column_w.php");
if(isset($params['left_menu_added'])){
echo $params['left_menu_added'];	
}
}

}

echo $rs;

if($params['layout']=='normal_n' || $params['layout']=='right_column_n'){
include("master/right_column_n.php");	
}

echo $rs.$nf_w;

if(isset($params['left_link_n']) || isset($params['left_link_w'])){
include("wlinks.php");
}
else{
$wlink="";
}

echo $rs.$wlink;


if(!isset($dget)){
$dget="";
}

echo $rs.$dget;


if(isset($_SERVER['HTTP_rmenu_norefresh'])){
$rmenu_norefresh="t";	
}
else{
$rmenu_norefresh="";	
}

echo $rs.$rmenu_norefresh;

echo $rs.$uidv.$rs;

if(!isset($params['body_class'])){
$params['body_class']="";	
}

if(isset($apply_no_columns)){
$params['body_class'].=" nocolumns";
}

if(isset($params['left_column'])){
$params['left_column_added']=$params['left_column'];	
}

$toset=array();
$toset['left_column_added']="";
$toset['left_column_id']="";
$toset['header_area']="";

foreach($toset as $k=>$v){
if(!isset($params[$k])){
$params[$k]=$v;	
}
}


echo json_encode($params);

}
else if(function_exists("populate_page")){
if(!isset($page_small_populate)){ //runs out of same functions file and it is when it's a frame
populate_page($echo,$params);
}
}

if(isset($uidv) && $uidv!=$uid){
if(is_resource($con) && get_resource_type($con) === 'mysql link'){ mysql_select_db("registered");}
else{$con=mysql_connect("localhost","root","xd22xd22"); 
 mysql_select_db("registered");}
//here flush, send content over, caput, this is for the server
    $size = ob_get_length();    
	/*
    header("Content-Length: $size"); 
    header('Connection: close');  
	*/ 
    // ob_end_flush(); 
    flush();    
include("ajax/friends/update_visit.php");
}
if(isset($con) && is_resource($con) && get_resource_type($con) === 'mysql link'){mysql_close($con);}
?>