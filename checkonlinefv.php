<?php include("start.php"); ?>
<?php

$result=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($ms=mysql_fetch_array($result)){
$dfriend=$ms['id2'];

$result2=mysql_query("SELECT * FROM registered WHERE id='$dfriend' AND status='1'");
while($ms2=mysql_fetch_array($result2)){
echo $dfriend.'#:#:';
}

}

echo'<>';

$uidvcr=$uid.'cr';
$result=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($ms=mysql_fetch_array($result)){
$dfriend=$ms['id2'];
$result2=mysql_query("SELECT * FROM registered WHERE id='$dfriend' AND status='2'");
while($ms2=mysql_fetch_array($result2)){
echo $dfriend.'#:#:';
}

}
?>
<?php include("end.php"); ?>