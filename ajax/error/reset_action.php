<?php
ignore_user_abort(true);
//include("close_connection.php");
include("php_safety.php");
include("functions/grs.php");
include("functions/sb_user.php");
include("functions/sbmail.php");
foreach($_POST as $k=>$v){
${$k}=$v;
}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
$r=mysql_query("SELECT * FROM reset_password WHERE id='$uidv' AND dk='$n' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$uid=$m['id'];	
}
$c=mysql_num_rows($r);

if($c==0){
$dparams["error"]="t";
echo json_encode($dparams);
}
else{
$dparams["chunk"]='u='.$uid.'&n='.$n;
echo json_encode($dparams); 
}

?>