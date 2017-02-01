<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php
$chatopen=$_POST['chunkv'];
mysql_query("UPDATE chatopen SET chatopen='$chatopen',datetimep=UNIX_TIMESTAMP() WHERE id='$uid'");

$r=mysql_query("SELECT * FROM chatopen WHERE id='$uid'");
$c=mysql_num_rows($r);
echo $c.':';
echo $chatopen.':';
echo '2';
?>
<?php
include("end.php");
?>