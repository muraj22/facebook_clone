<?php
foreach($_POST as $k=>$v){
${$k}=$v;
}

$contact=array();

foreach($name as $k=>$dname){
$demail=$email[$k][0];
$contact[$demail]=$dname;
}

//print_r($contact);
?>