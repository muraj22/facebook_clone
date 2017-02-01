<?php
include("start.php");

$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND type='acquaintances");
while($m=mysql_fetch_array($r)){
$listid=$m['sbid'];
}

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM lists_members WHERE id='$uid' AND id2='$uidv' AND type='acquaintances'"));
$c=$c['c'];
if($c>0){
mysql_query("UPDATE lists_members SET visibility='v' WHERE id='$uid' AND id2='$uidv' AND type='acquaintances'");
}else{
$location="";
$type="acquaintances";

$relation="";
$relation_confirmed="";	

$privacy="";
$privacyh="";

mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uid','$uidv','$listid','$type','v','$location','h','$privacy','$privacyh','$relation','$relation_confirmed',UNIX_TIMESTAMP())");

}
?>