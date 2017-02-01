<?php
include("start.php");
$r=mysql_query("SELECT * FROM commentsvv WHERE sbid='$sbid' AND (id='$uid' OR id2='$uid')");
$c=mysql_num_rows($r);
if($c==0){
exit();	
}
while($m=mysql_fetch_array($r)){
if($m['id']==$uid){
$dw="dread_id='0'";	
}
else{
$dw="dread_id2='0'";
}
}
mysql_query("UPDATE commentsvv SET $dw WHERE sbid='$sbid'");
?>