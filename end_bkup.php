<?php
$dheaders=getallheaders();
if(isset($dheaders["X-PJAX"]) && function_exists("populate_page")){

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
}
if(!isset($params['layout'])){
$params['layout']='';	
}
if(!isset($params['style'])){
$params['style']='';	
}
echo $echo.$rs.$params['layout'].$rs.$params['style'].$rs;

if(!isset($params['right_col_modules'])){
//$params['right_col_modules'][]='poke_suggestions';
//$params['right_col_modules'][]='birthdays';
$params['right_col_modules'][]='pokes';
$params['right_col_modules'][]='pymk';
}

if($params['layout']=='right_column_w_no_borders'){
$params['layout']='right_column_w';	
$border_set='#ffffff';
}
else if($params['layout']=='right_column_n_no_borders'){
$params['layout']='right_column_n';	
$border_set='#ffffff';	
}
else if($params['layout']=='no_columns_no_borders'){
$params['layout']='no_columns';	
$border_set='#ffffff';	
}


if($params['layout']=='normal_n' || $params['layout']=='left_column_n'){
if(isset($params['left_column'])){
echo $params['left_column'];
}

else{
include("master/left_column_n.php");
if(isset($params['left_menu_added'])){
echo $params['left_menu_added'];	
}
if(!isset($params['nochat'])){
include("friends_on_chat.php");
}
}

}

if($params['layout']=='normal_w' || $params['layout']=='left_column_w'){
if(isset($params['left_column'])){
echo $params['left_column'];
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
echo'<div style="width:0;height:35px;display:block;margin:0;padding:0;background:transparent;">
</div>';
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

if(!isset($params['left_menu_added'])){
$params['left_menu_added']="";	
}
echo $rs.$params['left_menu_added'];

if(!isset($params['left_column'])){
$params['left_column']="";	
}

echo $rs.$params['left_column'];

if(!isset($dget)){
$dget="";
}

echo $rs.$dget;

if(!isset($params['left_column_id'])){
$params['left_column_id']="";	
}

echo $rs.$params['left_column_id'];

if(isset($dheaders['rmenu_norefresh'])){
$rmenu_norefresh="t";	
}
else{
$rmenu_norefresh="";	
}

echo $rs.$rmenu_norefresh;


}
else if(function_exists("populate_page")){
populate_page($echo,$params);
}

if(isset($uidv) && $uidv!=$uid){
if(is_resource($con) && get_resource_type($con) === 'mysql link'){ mysql_select_db("registered");}
else{$con=mysql_connect("localhost","root","xd22xd22");  mysql_select_db("registered");}
//here flush, send content over, caput, this is for the server
    $size = ob_get_length();    
    header("Content-Length: $size"); 
    header('Connection: close');    
    // ob_end_flush(); 
    ob_flush(); 
    flush();    
include("ajax/friends/update_visit.php");
}
if(is_resource($con) && get_resource_type($con) === 'mysql link'){mysql_close($con);}
while (@ob_end_flush());
?>