<?php
ignore_user_abort(true);
include("start.php"); ?>
<?php
$uidv=$_POST['uidv'];
$likeid=$_POST['sbid'];
if($uidv!=$uid){mysql_close($con); exit();}
$editprofile='';

include("small_del/p.php");

?>
<?php include("end.php"); ?>