<?php
include("start.php");
$r=mysql_query("SELECT * FROM registration_keys WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
if($m['email']==$_GET['e'] AND $m['dk']==$_GET['c']){
	$email=$m['email'];
mysql_query("UPDATE registration_keys SET confirmed='1',datetimep=UNIX_TIMESTAMP() WHERE email='$email'");
mysql_select_db("modules");
mysql_query("UPDATE sb_emails SET email_c='c',datetimep=UNIX_TIMESTAMP() WHERE email='$email'");
mysql_query("UPDATE contact_emails SET confirmed='c',datetimep=UNIX_TIMESTAMP() WHERE email='$email'");
header("Location: http://www.subsbook.com?email_confirmed=1");
}else{
header("Location: http://www.subsbook.com");	
}
}
?>