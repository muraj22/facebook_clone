<?php
include("start.php");
?>
<?php
foreach($_POST as $k=>$v){
$v=trim($v);
$v=addcslashes($v, "'\\/");
${$k}=$v;	
}
function GetMonthString($n)
{
    $timestamp = mktime(0, 0, 0, $n, 1, 2005);
    
    return date("M", $timestamp);
}
$position='';
$r=mysql_query("SELECT * FROM workedu WHERE sbid='$sbid' AND id='$uid' AND visibility='v'");
$c=mysql_num_rows($r);
if($c>0){
mysql_query("UPDATE workedu SET cityc='$cityc',statec='$statec',countryc='$countryc',description='$description',yeare='$yeare',monthe='$monthe',daye='$daye',yearl='$yearl',monthl='$monthl',dayl='$dayl',currently='$currently',datetimep=UNIX_TIMESTAMP() WHERE sbid='$sbid'");
if($monthe!="-1"){
$month_s=GetMonthString($monthe);
}
else{
$month_s='nada';	
}
if($monthl!="-1"){
$month_e=GetMonthString($monthl);
}
else{
$month_e='nada';	
}
echo'1'.'{}nada'.'{}'.$month_s.'{}'.$month_e;
}
else{
mysql_query("INSERT INTO workedu (id,place,position,cityc,statec,countryc,description,yeare,monthe,daye,yearl,monthl,dayl,currently,type,visibility,datetimep,datetimepe) VALUES('$uid','$place','$position','$cityc','$statec','$countryc','$description','$yeare','$monthe','$daye','$yearl','$monthl','$dayl','$currently','$type','v',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");
$sbid=mysql_insert_id();
$r=mysql_query("SELECT * FROM lists WHERE place='$place' AND id='$uid' AND type='education'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO lists (id,listn,descr,visibility,type,location,institution,favorites,datetimep) VALUES('$uid','$place','','v','education','','$place','2',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE lists SET visibility='v' WHERE institution='$place' AND id='$uid' AND type='education'");	
}
if($monthe!="-1"){
$month_s=GetMonthString($monthe);
}
else{
$month_s='nada';	
}
if($monthl!="-1"){
$month_e=GetMonthString($monthl);
}
else{
$month_e='nada';	
}
echo'2'.'{}'.$sbid.'{}'.$month_s.'{}'.$month_e;
}
?>
<?php include("end.php"); ?>