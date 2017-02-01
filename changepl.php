<?php  
include("start.php");
?>
<?php
$uida=$uid.'a';

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$selected_album=$_POST['selected_album'];
$location=$_POST['location'];

mysql_query("UPDATE albums SET location='$location',locationsetby='$uid' WHERE id='$uid' AND sbid='$selected_album'");

echo $location;

mysql_close($con);
?>