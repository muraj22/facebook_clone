<?php
if(!function_exists("lp")){
function lp(){
$r=mysql_query("SELECT LAST_INSERT_ID()");
while($m=mysql_fetch_array($r)){
$id=$m['LAST_INSERT_ID()'];
}
return $id;	
}
}
?>