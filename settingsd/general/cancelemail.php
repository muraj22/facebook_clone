<?php include("start.php"); ?>
<?php  

include("start.php");
?>
<?php
foreach($_POST as $k=>$v){
$v=trim($v);
${$k}=$v;	
}
if($nemail==""){mysql_close($con); exit();}

mysql_query("UPDATE contact_emails SET visibility='d' WHERE id='$uid' AND confirmed='u' AND visibility='v'");
mysql_select_db("modules");
mysql_query("DELETE FROM sb_emails WHERE id='$uid' AND email_c='u'");

?>
<?php include("end.php"); ?>