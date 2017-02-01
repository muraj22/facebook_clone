<?php
ignore_user_abort(true);
include("start.php");
?>
<?php
$r=mysql_query("SELECT * FROM contact_emails WHERE id='$uid' AND confirmed='u' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$nemail=$m['email'];	
}

$c=mysql_num_rows($r);
if($c==0){mysql_close($con); exit();}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
$r=mysql_query("SELECT * FROM nemailk WHERE email='$nemail' AND id='$uid' ORDER BY datetimep DESC LIMIT 1");
while($m=mysql_fetch_array($r)){
$c=$m['nemailkh'];
$gfid=$m['nemailk'];
}
$c2=mysql_num_rows($r);
if($c2==0){mysql_close($con); exit();}
else{
mysql_select_db("registered");	
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM registration_keys WHERE id='$uid' AND confirmed='0'"));
$c=$c['c'];
if($c>0){ //he is resending a confirmation through settings for an email that wasn't yet confirmed as he has just registered
include("initial_confirmation_email.php");
}
else{
include("confirmation_email.php");
}
}
?>
<?php include("end.php"); ?>