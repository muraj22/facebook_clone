<?php
ignore_user_abort(true);
require_once("functions.php");

include("../../wp-load.php");
include("../../wp-includes/functions.php");

if(is_user_logged_in()){
	$u=wp_get_current_user();
	$uid=$u->ID;
	
mysql_select_db("thedrive_users");
$r=mysql_query("SELECT * FROM users WHERE wp_profile='$uid'");
while($m=mysql_fetch_array($r)){
$ppProfile=$m['pp_profile'];
}

}
else{
exit();
}

$r=check_outstanding_balance($ppProfile,"manual");
if($r=="t"){
$p=array(); //params

$p["METHOD"]="GetRecurringPaymentsProfileDetails";
$p["VERSION"]="69.0";
$p["PROFILEID"]=$ppProfile;

$r=RunAPICall($p);

$date=$r["NEXTBILLINGDATE"];

$d=strtotime($date);
$expiry_time=rtd($d);

$dparams["expiry_time"]=$expiry_time;
echo json_encode($dparams);
}
else{
$dparams["error"]="We couldn't bill your outstanding balance. Please try again later";
echo json_encode($dparams);
}
?>

