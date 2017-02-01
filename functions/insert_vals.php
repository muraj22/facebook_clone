<?php
if(!function_exists("insert_vals")){
function insert_vals($sbid,$table,$owner,$tradurre){

$j=0;
$tfrom=array();
$tto=array();
foreach($tradurre as $k=>$v){
if(strpos($v,",")!==false){
$v=explode(",",$v);
$tfrom[$j]=$v[0];	
$tto[$j]=$v[1];
}
else{
$tfrom[$j]=$v;
$tto[$k]=$v;
}
$j++;
}


$con_f=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$secho_f='';

$secho_f.='<script type="text/javascript">';
$r=mysql_query("SELECT * FROM $table WHERE id='$owner' AND sbid='$sbid'");
$m=mysql_fetch_array($r);
foreach($m as $k=>$v){
if(!is_numeric($k)){

if(in_array($k,$tfrom)){

foreach($tfrom as $k2=>$v2){

if($v2==$k){
$k=str_replace($v2,$tto[$k2],$k);	
$secho_f.='$("#'.$k.'").val("'.$v.'");';	
}

}

	
}

}

}
$secho_f.='</script>';

return $secho_f;

mysql_close($con_f);
}

}
?>