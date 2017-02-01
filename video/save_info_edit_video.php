<?php
include("start.php");

session_start();

foreach($_POST as $k=>$v){
$posted[$k]=$v;
${$k}=$v;
}

if(isset($notify)){
mysql_query("UPDATE media set notify='$notify' WHERE sbid='$videoid' AND id='$uid'");	
}

$descr=$desc_text;

$r=mysql_query("SELECT * FROM media WHERE sbid='$videoid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$shott=$m['shott'];
$albumid=$m['albumid'];
$owner=$m['id'];
}

if($shott==""){
mysql_query("UPDATE media SET descr='$descr',location='$location',title='$title' WHERE sbid='$videoid' AND id='$uid'");		
}

if(($csnap>0 && $csnap<=$shott)){
$r=mysql_query("SELECT * FROM video_shots WHERE id='$uid' AND videoid='$videoid' AND albumid='$albumid' AND shot='$csnap'");	
while($m=mysql_fetch_array($r)){
$pics=$m['pics'];
$picss=$m['picss'];
$picsm=$m['picsm'];
$picsr=$m['picsr'];
$picsa=$m['picsa'];
$shotid=$m['sbid'];	
}
mysql_query("UPDATE media SET descr='$descr',location='$location',title='$title',shot='$csnap',pics='$pics',picss='$picss',picsm='$picsm',picsr='$picsr',picsa='$picsa' WHERE sbid='$videoid' AND id='$uid'");	
}


$key_name=array();
$key_name['tagsvt']='activities';

$sbid=$videoid;
$sflag='wv';

include("tags/insert_tags_with.php");

echo '<script type="text/javascript">
window.location="/video/video.php?v='.$videoid.'&saved";
</script>';

include("end.php");
?>