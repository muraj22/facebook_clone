<?php  
include("start.php");
?>
<?php
$x=$_POST['appendmsg'];

$towhoiamchatting=$_POST["duser"];
$tocheck=$_POST['texttyped'];

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM typying WHERE id='$uid' AND id2='$towhoiamchatting'"));
$c=$c['c'];

if($c==0){
mysql_query("INSERT INTO typying (id,id2,typying,datetimep) VALUES('$uid','$towhoiamchatting','0',NULL)");
}

if(strlen($tocheck)>0){
mysql_query("UPDATE typying SET typying='1' WHERE id='$uid' AND id2='$towhoiamchatting'");
mysql_query("UPDATE typying SET datetimep=UNIX_TIMESTAMP() WHERE id='$uid' AND id2='$towhoiamchatting'"); //double update necessary
}
else{
mysql_query("UPDATE typying SET typying='0' WHERE id='$uid' AND id2='$towhoiamchatting'");
}

$dtime=time()-20; //find match is typying in the last 20 seconds
//echo $dtime;

$r=mysql_query("SELECT * FROM typying WHERE id2='$uid' AND id='$towhoiamchatting' AND typying='1'");
while($m=mysql_fetch_array($r)){
//echo 'aca'.$m['datetimep'];	
}

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM typying WHERE id2='$uid' AND id='$towhoiamchatting' AND typying='1' AND datetimep>=$dtime")); // did not need dtc, weird
$c=$c['c'];
if($c>0){
echo $c;	
}
mysql_close($con);
?>