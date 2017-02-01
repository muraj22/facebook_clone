<?php include("start.php"); ?>
<?php
foreach($_GET as $k=>$v){
$v=trim($v);
${$k}=$v;	
}
if($c=='' OR $x=='' OR $gfid==''){exit();}
else{

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

$r=mysql_query("SELECT * FROM nemailk WHERE nemailk='$gfid' AND nemailkh='$c'");
while($m=mysql_fetch_array($r)){
$uidv=$m['id'];
$aemail=$m['email'];	
}
$cv=mysql_num_rows($r);
if($cv==0){
header("Location: /settings.php?section=email");
}

if($uid!=$uidv){header("Location: /settings.php?section=email"); exit();}
else{
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
mysql_query("DELETE FROM nemailk WHERE nemailk='$gfid' AND nemailkh='$c'");
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

mysql_query("UPDATE contact_emails SET confirmed='c' WHERE id='$uid' AND email='$aemail' AND visibility='v'");

header("Location: /settings.php?section=email&e=s");

}


}
//http://www.facebook.com/confirmcontact.php?c=692716&x=1&gfid=AQDznkLe2FHtI0Gn
?>
<?php include("end.php"); ?>