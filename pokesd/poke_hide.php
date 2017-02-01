<?php
include("start.php");

include("start.php");
foreach($_POST as $k=>$v){
${$k}=$v;
}

include("functions/sb_user.php");

mysql_query("UPDATE pokes SET pokedback='2' WHERE pokeid='$p'");

echo'
<script type="text/javascript">
$("#poke_'.$p.'").remove();';
if(isset($right_col)){
echo'
var tpokes=$("#pokes_rwv").find("a[fjax]").length;
if(tpokes==0){
$("#pokes_rw").remove();	
}
';
}
echo'
</script>
';

include("end.php");
?>