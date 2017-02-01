<?php
include("start.php");

$r=mysql_query("SELECT * FROM albums WHERE id='$uid'");

while($m=mysql_fetch_array($r)){
foreach($m as $k=>$v){
echo $k.':'.$v.'<br>';	
}
}

include("end.php");
?>