<?php  
include("start.php");
?>
<?php
foreach($_GET as $k=>$v){
${$k}=$v;	
}

$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid'");
while($m=mysql_fetch_array($r)){
$albumid=$m['albumid'];	
$actual_pic7=$m['picsa'];
$actual_pic3=$m['picsm'];
}
mysql_query("UPDATE media SET datetimep_pp=UNIX_TIMESTAMP() WHERE id='$uid' AND albumid='$albumid' AND sbid='$sbid'");
mysql_query("UPDATE albums SET datetimep=UNIX_TIMESTAMP(),album_cover='$sbid' WHERE sbid='$albumid' AND id='$uid'");
mysql_query("UPDATE registered SET profilepic='$actual_pic7',profilepict='$actual_pic3' WHERE id='$uid'");

mysql_query("UPDATE options SET lcords='', tcords='' WHERE id='$uid'");

echo'
<script type="text/javascript">
window.location="/'.$un.'?success=1";
</script>
';
?>
<?php
include("end.php");
?>