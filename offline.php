<?php  

include("start.php");
include("start.php");
?>
<?php


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

function td2($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%i');
if($td=='+0' || $td=='-0'){$td='1';}

$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
	return $td;
}

$result=mysql_query("SELECT * FROM registered WHERE status='1'");
while($ms=mysql_fetch_array($result)){
$datetimepn=$ms['datetimepn'];
$datetimepn=td2($datetimepn);
$unv=$ms['id'];
if($datetimepn>10){mysql_query("UPDATE status='2' WHERE id='$unv'");}
}

?>