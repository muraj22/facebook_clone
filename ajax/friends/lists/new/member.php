<?php
include("start.php");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND id2='$uidv' AND listid='$sbid'");
$c=mysql_num_rows($r);

if($c==0){
$r=mysql_query("SELECT * FROM lists WHERE sbid='$sbid' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){exit();}
else{
while($m=mysql_fetch_array($r)){
$visibility=$m['visibility'];
$location=$m['location'];	
$type=$m['type'];
}
}
$listid=$sbid;

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$uid' AND id2='$uidv'")) OR die();
if($type=="family"){
$relation="0a";
$relation_confirmed=1;	

$r2=mysql_query("SELECT * FROM lists WHERE id='$uidv' AND type='family'");
while($m2=mysql_fetch_array($r2)){
$listidv=$m2['sbid'];	
}

$privacy=0;
$privacyh="";

mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uidv','$uid','$listidv','$type','v','$location','h','$privacy','$privacyh','$relation','$relation_confirmed',UNIX_TIMESTAMP())");

$relation_confirmed="1a";
}
else{
$relation="";
$relation_confirmed="";	

$privacy="";
$privacyh="";
}


mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uid','$uidv','$listid','$type','v','$location','h','$privacy','$privacyh','$relation','$relation_confirmed',UNIX_TIMESTAMP())");

}
else{
while($m=mysql_fetch_array($r)){
$visibility=$m['visibility'];	
}
if($visibility!="v"){
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
mysql_query("UPDATE lists_members SET visibility='v' WHERE id='$uid' AND id2='$uidv' AND listid='$sbid'");	
}
else{exit();} //was visible, trying to double add
}


include("end.php");
?>