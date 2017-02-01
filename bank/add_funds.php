<?php
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
$uid=$_GET['uid'];
$r=mysql_query("SELECT * FROM bank WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$amount=$m['amount'];	
}
if(!isset($amount)){
mysql_query("INSERT INTO bank (id,amount) VALUES('$uid','0')");
$amount=0;	
}
if(!is_numeric($funds)){
exit();
}

$fee=0;

mysql_query("INSERT INTO transactions (id,id2,amount,fee,datetimep) VALUES('$uid','$uid','$funds','$fee',UNIX_TIMESTAMP())");
$funds=$amount+$funds;
$dv=mysql_query("UPDATE bank SET amount='$funds' WHERE id='$uid'");
?>