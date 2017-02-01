<?php include("start.php"); ?>
<?php
foreach($_POST as $k=>$v){
${$k}=$v;	
}
mysql_query("UPDATE notes_pics SET visibility='d' WHERE noteid='$sbid' AND aid='$aid' AND id='$uid'");
?>
<?php include("end.php"); ?>