<?php
include("start.php");

include("start.php");
foreach($_POST as $k=>$v){
${$k}=$v;	
}
$r=mysql_query("SELECT * FROM hidden_suggestions WHERE id='$uid' AND id2='$declined_id' AND what='poke'");
$c=mysql_num_rows($r);
if($c>0){
mysql_query("UPDATE hidden_suggestions SET datetimep=UNIX_TIMESTAMP() WHERE id='$uid' AND id2='$declined_id'");
}
else{
mysql_query("INSERT INTO hidden_suggestions (what,id,id2,datetimep) VALUES('poke','$uid','$declined_id',UNIX_TIMESTAMP())");
}
echo'
<script type="text/javascript">
$("#suggestion_'.$declined_id.'").remove();
var tpokes=$("#poke_suggestions_rwv").find("a[fjax]").length;
if(tpokes==0){
$("#poke_suggestions_rw").remove();	
}
</script>';	
include("end.php");
?>