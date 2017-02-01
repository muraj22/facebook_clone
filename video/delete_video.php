<?php
include("start.php");

session_start();

foreach($_POST as $k=>$v){
${$k}=$v;
}
	
$r=mysql_query("SELECT * FROM media WHERE sbid='$videoid'");
while($m=mysql_fetch_array($r)){
$albumid=$m['albumid'];
}

mysql_query("UPDATE media SET visibility='d' WHERE sbid='$videoid' AND id='$uid'");		


$result2=mysql_query("SELECT * FROM media WHERE albumid='$albumid' AND sbid='$videoid' AND id='$uid'");
while($ms2=mysql_fetch_array($result2)){	
$antorder=$ms2['norder'];
}

$result=mysql_query("SELECT * FROM media WHERE albumid='$albumid' AND id='$uid' AND visibility!='d' ORDER BY norder ASC");
while($ms=mysql_fetch_array($result)){
$pid=$ms['sbid'];
if($ms['norder']>$antorder){$mnorder=$ms['norder']-1;
mysql_query("UPDATE media SET norder='$mnorder',oldorder='$mnorder' WHERE albumid='$albumid' AND sbid='$pid'");
if($mnorder=='1'){$actual_pic3=$ms['picsa'];}	
}
}

mysql_query("UPDATE media SET norder='-1', oldorder='-1' WHERE albumid='$albumid' AND sbid='$videoid' AND id='$uid'");




echo '<script type="text/javascript">';
if(isset($delete_video_dialog)){
echo'
$("#d_overlay_'.$delete_video_dialog.$uid.'").remove();
';
}
echo'
window.location="/'.$un.'/photos?album='.$albumid.'";
</script>';


include("end.php");
?>