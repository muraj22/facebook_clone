<?php
//ini_set('display_errors', '0'); 
include("start.php");

if(isset($_POST['wildcard']) && $_POST['wildcard']=="t"){

if($_POST['provider']=="google"){
include("oauth/index_google.php");	
}
else if($_POST['provider']=="yahoo"){
$timetosend="t";
include("oauth/index_yahoo.php");	
}
else if($_POST['provider']=="microsoft"){
include("oauth/index_microsoft.php");	
}

if(!isset($_POST['email'])){
$_POST['email']="";	
}
include("new_friends_request.php");

exit();
}

function turndatefdd($date){$date=tod($date);
  return date('d', strtotime($date));
}
function turndatefdm($date){$date=tod($date);
  return date('m', strtotime($date));
}

function tdfd($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
if(strlen($td)>1){
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
}
	if($td<=2){return 'ok';}
return 'w';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
$result=mysql_query("SELECT * FROM userff WHERE who='$uid'");
$counti=mysql_num_rows($result);
if($counti>9654664897890){
while($ms=mysql_fetch_array($result)){
$datetimep=$ms['datetimep'];
$countiv=$ms['count2'];

$fdate=tdfd($datetimep);

if($countiv=="20" AND $fdate=="ok"){
echo 'n5'; exit();	
}

else{
$iday=turndatefdd($datetimep);
$imonth=turndatefdm($datetimep);

$idate=$iday.$imonth;

$cday=date("d");
$cmonth=date("m");

$cdate=$cday.$cmonth;

if($idate==$cdate){

$countiv++;

mysql_query("UPDATE userff SET count2='$countiv' WHERE who='$uid'");

}

else{
mysql_query("UPDATE userff SET count2='1' WHERE who='$uid'");	
mysql_query("UPDATE userff SET datetimep=UNIX_TIMESTAMP() WHERE who='$uid'");
}

}

}
	
}
else{
mysql_query("INSERT INTO userff (who, count2, datetimep)
VALUES ('$uid','1',UNIX_TIMESTAMP())");	
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

echo'<script type="text/javascript"></script>';

//include("end.php");
?>