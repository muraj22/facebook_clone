<?php
include("start.php");
$read_id=1;
$read_idv=0;

foreach($duidv as $k=>$v){
$uidv=$v;
//por aca ver si la privacidad permite que uid le escriba a uidv, si no es asi no dejarlo escribirle y hacer exit. puede ser un attempt de hack
mysql_query("INSERT INTO commentsvv (id,id2,comment,dread_id,dread_id2,source,status_id,status_id2,visibility_id,visibility_id2,datetimep,datetimepr) VALUES('$uid','$uidv','$comment','$read_id','$read_idv','0','0','0','v','v',UNIX_TIMESTAMP(),NULL)");
}
$sbid=mysql_insert_id();
$dparams["sbid"]=$sbid;
echo json_encode($dparams);
?>