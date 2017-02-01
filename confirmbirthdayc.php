<?php
include("start.php");
function td($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%Y'); $suf=" year";
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0' AND $td!="00"){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
if($td=="00"){$td=0;}
	return $td;
}
$day=$_POST['dday'];
$month=$_POST['dmonth'];
$year=$_POST['dyear'];
$turndate=$day.'-'.$month.'-'.$year;
$td=td($turndate);
echo $td;
?>