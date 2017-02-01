<?php  
include("start.php");
?>
<?php

$uida=$uid.'a';
$uidp=$uid.'p';
$uidl=$uid.'l';
$selected_album=$_POST['selected_album'];
$photoid=$_POST['photoid'];

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

mysql_query("UPDATE albums SET album_cover='$photoid' WHERE id='$uid' AND sbid='$selected_album'");


include("end.php");
?>