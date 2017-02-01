<?php
if (!function_exists('php_safety')) {
function isJson($string) {
if(strpos($string,"{")!==false){
$d=strpos($string,"{");
if($d==0){
return true;
}
else{
return false;
}
}
return false;
}

$con_php_safety=mysql_connect("127.0.0.1","root","xd22xd22");
function quick_return($k){
    global $con_php_safety;
$k=str_replace(".ampersand.reserved.","&",$k);
$k=str_replace("&nbsp;"," ",$k);
$k=str_replace("&amp;","&",$k);
//$k=htmlspecialchars($k, ENT_QUOTES,'UTF-8'); - no sirve como precaucion por que hace encode tambien de caracter & y lo jode en los input o textarea
$k=strip_tags($k);
$k=mysql_real_escape_string($k);	
$k=trim($k);
$k=preg_replace('!\s+!', ' ', $k);
$k=str_replace("\\n","<br>",$k);
return $k;	
}

function php_safety($a)
{
if(is_array($a)){ 
foreach($a as $k=>$v){
if(!is_array($k)){
$k=quick_return($k);
}
if(!is_array($v)){
$v=quick_return($v);
$a[$k]=$v;
}
}
}
else{
if(!isJson($a)){ 
$a=quick_return($a);
}
else{
$av=json_decode($a,true); //loooks like good extra security!!
unset($a);

foreach($av as $k=>$v){
$k=quick_return($k);
$v=quick_return($v);
$a[$k]=$v;
}

//$a=json_encode($a);


}


}
return $a;
}
$_GET=array_map('php_safety',$_GET);
$_POST=array_map('php_safety',$_POST);
}
?>