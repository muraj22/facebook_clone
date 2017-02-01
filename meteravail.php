<?php  

?>
<?php
include("start.php");
?>
<?php
function tdod($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf="month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($suf=='minute' OR $suf=='second'){return 'ok';}
else if($suf=='hour' && $td<16){
return 'ok';
}
else{
return 'notok';	
}
	
}

$uidccc=$uid.'ccc';
$result=mysql_query("SELECT * FROM $uidccc");
while($ms=mysql_fetch_array($result)){
$values=$ms['id2'];
$datetimep=$ms['datetimep'];	
}
if($datetimep!="NULL"){
$td=tdod($datetimep);	
}
else{$td='';}

if($td=="ok"){
echo $values;	
}

else{
$ids=$_POST['ids'];
$tot=$_POST['t'];
$tyk=$_POST['tyk'];


$nar=array();
$ne=explode(",",$ids);
$ti=0;
$s=0;
foreach($ne as $key => $value){

$car[]=$value;
$ti++;
}

$carv=shuffle($car);



$y=0;
foreach($car as $key=> $value){

$nar[$s]=$value;
$s++;




if($y>$tot){break;}
$y++;	
}

$ti=$ti-1;
$y=$y-1;

$asi=$tot-$y;

if($asi!="0"){
$asiv=$asi;

$asivr=0;

while($asivr<=$asiv){

$b=rand(0, $tyk);
while(in_array($b,$car)){
$b=rand(0, $tyk);
}
$car[]=$b;

$nar[$s]=$value;
$s++;


$asivr++;
}

	
}




$values='';
$stop=0;
foreach($nar as $key=> $value){
echo $value.',';
$values.=$value.',';
	$stop++;
	if($stop>50){break;}
}
	mysql_query("UPDATE $uidccc SET friends='$values' WHERE primary2='1'");
	mysql_query("UPDATE $uidccc SET datetimep=UNIX_TIMESTAMP() WHERE primary2='1'");
}
?>
<?php
include("end.php");
?>