<?php
include("start.php");
foreach($_GET as $k=>$v){
${$k}=$v;	
}


mysql_query("UPDATE media SET nye='2' WHERE sbid='$sbidv'");

mysql_query("INSERT INTO videos (vids,vidshd,vidso,descr,location,id,sbidv,albumid,albumn,title,nye,visibility,datetimep) VALUES('','','$ap','$descr','$location','$uid','$sbidv','$albumid','Videos','$title','1','v',NOW())");
mysql_query("DELETE FROM media WHERE sbid='$sbidvv'");

include("end.php");
?>