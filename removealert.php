<?php  
include("start.php");
?>
<?php
if(isset($_COOKIE["login_cookie"])){
$uid=$_COOKIE["login_cookie"];
}

$amigo=$_POST['amigo'];


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

mysql_query("UPDATE friends SET removealert'y' WHERE id='$uid' AND id2='$amigo'");

mysql_close($con);

echo'1';
?>