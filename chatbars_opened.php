<?php include("start.php"); ?>
<?php
$id=$_POST['id'];
if(isset($_POST['d'])){
mysql_query("UPDATE $uidcb SET what='off' WHERE id2='$id'");	
}
else{
$result=mysql_query("SELECT * FROM $uidcb WHERE id2='$id'");
$count=mysql_num_rows($result);
if($count=="0"){
mysql_query("INSERT INTO $uidcb (friends,what, datetimep)
VALUES ('$id','chatb',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE $uidcb SET what='chatb',datetimep=UNIX_TIMESTAMP() WHERE id2='$id'");
}
}
?>
<?php
include("end.php");
?>