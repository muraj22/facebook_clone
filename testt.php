<?php
include("start.php");


$r=mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,datetimep,datetimep_pp)
VALUES ('$uid','dea','','','v','','','',UNIX_TIMESTAMP(),'')");

$dea=lp();

echo $dea;

include("end.php");
?>