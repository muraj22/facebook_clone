<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php
if(isset($_COOKIE["login_cookie"])){
$uid=$_COOKIE["login_cookie"];
}

if(isset($_GET['a'])){

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$amigotes=$_POST['amigos'];
$amigosv=explode("{}",$amigotes);

foreach($amigosv as $key=> $amigo){
mysql_query("UPDATE friends SET confirmed='nk' WHERE id='$uid' AND id2='$amigo'"); //stands for not known - defaults to this when not confirmed

mysql_query("UPDATE friends SET confirmed='n' WHERE id='$amigo' AND id2='$uid'");
}

mysql_close($con);
echo'1';
exit();	
}

else if(isset($_POST['d'])){

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$amigo=$_POST['amigo'];

mysql_query("UPDATE friends SET confirmed='nk' WHERE id='$uid' AND id2='$amigo'");

mysql_query("UPDATE friends SET confirmed='nc' WHERE id='$amigo' AND id2='$uid'");

mysql_close($con);
echo'12';
exit();		
}

else if(isset($_GET['da'])){
$amigotes=$_POST['amigos'];
$amigosv=explode("{}",$amigotes);

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

foreach($amigosv as $key => $amigo){
mysql_query("UPDATE friends SET confirmed='nk' WHERE id='$uid' AND id2='$amigo'"); //not known as default


mysql_query("UPDATE friends SET confirmed='nc' WHERE id='$amigo' AND id2='$uid'"); //nc stands for not yet confirmed
}
mysql_close($con);
echo'1';
exit();	
}
else if(isset($_POST['uknowledge'])){
$amigo=$_POST['amigo'];

if($_POST['uknowledge']=="y"){
mysql_query("UPDATE friends SET confirmed='k' WHERE id='$uid' AND id2='$amigo'"); //k stands for known
}
else{
mysql_query("UPDATE friends SET confirmed='nk' WHERE id='$uid' AND id2='$amigo'"); //nk stands for not known
}
echo'1';
exit();
}
$amigo=$_POST['amigo'];


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


mysql_query("UPDATE friends SET confirmed='nkv' WHERE id='$uid' AND id2='$amigo'"); //stands for not known - defaults to this when not confirmed

mysql_query("UPDATE friends SET confirmed='n' WHERE id='$amigo' AND id2='$uid'"); //n - stands for not confirmed

mysql_close($con);

echo'1';
?>