<?php
include("start.php");
?>
<?php
$desc=$_POST['desc'];
$photoid=$_POST['photoid'];
$selected_album=$_POST['selected_album'];

mysql_query("UPDATE media SET descr='$desc' WHERE id='$uid' AND sbid='$photoid'");

include("endo.php");  
?>