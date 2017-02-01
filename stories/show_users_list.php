<?php
include("start.php");
foreach($_POST as $k=>$v){
${$k}=$v;	
}
?>
<?php
$dfullname=array();
$dprofilepic=array();
$duid=array();


$shown=0;
$anx=0;
$r=mysql_query("SELECT * FROM $table WHERE id='$id' AND photoid='$photoid'");
$c=mysql_num_rows($or);


while($m=mysql_fetch_array($r)){
if($table=="tags"){
$check=$m['id3'];
}
else{
$check=$m['id'];	
}
if($check!=""){
	
}
}

include("end.php");
?>