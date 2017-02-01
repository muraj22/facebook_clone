<?php  
include("start.php");
?>
<?php
$album_desc=$_POST['album_desc'];
$selected_album=$_POST['selected_album'];

$uida=$uid.'a';

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM albums WHERE sbid='$selected_album' AND (albumn='Photos' OR albumn='Profile Pictures' OR albumn='Videos' OR albumn='Wall Photos')"));
if($c['c']>0){
exit();	
}
//no description changes for above albums
mysql_query("UPDATE albums SET descr='$album_desc',datetimep=UNIX_TIMESTAMP() WHERE id='$uid' AND sbid='$selected_album'");

mysql_close($con);
?>