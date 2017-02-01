<?php  
include("start.php");
?>
<?php
$email=$_GET['e'];
$k=$_GET['k'];

if(isset($_GET['e'])){ //comes from invites, users might not be registered yet but would want to opt out of receiving upfrev invites to that mail
$result=mysql_query("SELECT * FROM invited WHERE inviteid='$k'");
$counti=mysql_num_rows($result);
if($counti>0){
while($ms=mysql_fetch_array($result)){
$emailv=$ms['cemail'];	
}
if($emailv==$email){
mysql_query("DELETE FROM invited WHERE cemail='$email'");

$result=mysql_query("SELECT * FROM unsubscribed WHERE cemail='$email'");
$counti=mysql_num_rows($result);
if($counti>0){

}
else{
mysql_query("INSERT INTO unsubscribed (id,unsubscribed,cemail,datetimep)
VALUES ('','1','$email',UNIX_TIMESTAMP())");
}
}
}
}
else{ //a registered user whom does not want to receive email anymore
$k=$_GET['k'];

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM registration_keys WHERE dk='$k' AND id='$uid'"));
$c=$c['c'];
if($c>0){
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM unsubscribed WHERE id='$uid'"));
$c=$c['c'];
if($c>0){
mysql_query("UPDATE unsubscribed SET unsubscribed='1' WHERE id='$uid'");	
}
else{
mysql_query("INSERT INTO unsubscribed (id,unsubscribed,cemail,datetimep) VALUES('$uid','1',UNIX_TIMESTAMP())");	
}

}
header("Location: http://www.subsbook.com");
}
?>
<?php include("end.php"); ?>