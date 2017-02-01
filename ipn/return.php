<?php
ignore_user_abort(true);
require_once("functions.php");

include("../../wp-load.php");
include("../../wp-includes/functions.php");

if(!strlen($_REQUEST["token"])) PaymentError();

$nvps2 = array();
$nvps2["VERSION"] = "69.0";
$nvps2["METHOD"] = "GetExpressCheckoutDetails";
$nvps2["TOKEN"] = $_REQUEST["token"];

$r2 = RunAPICall($nvps2);

if(is_user_logged_in()){
$nvps = array();

$nvps["METHOD"] = "DoExpressCheckoutPayment";
$nvps["VERSION"] = "69.0";
$nvps["TOKEN"] = $_REQUEST["token"];
$nvps["PAYMENTACTION"] = "Sale";
$nvps["PAYERID"] = $r2["PAYERID"];
$nvps["AMT"] = "1.00";

$nvps["L_BILLINGTYPE0"] = "RecurringPayments ";
$nvps["L_BILLINGAGREEMENTDESCRIPTION0"] = "Drive Buy Membership";


$r = RunAPICall($nvps);
}
else{
echo'error';
exit();	
}
$payeridv=$nvps["PAYERID"];


if($r["ACK"] != "Success" && $r["ACK"] != "SuccessWithWarning") PaymentError();

$p=array(); //params

$p["METHOD"]="CreateRecurringPaymentsProfile";
$p["VERSION"]="69.0";
$p["TOKEN"]=$r["TOKEN"];
$p["SUBSCRIBERNAME"]=$r2["FIRSTNAME"].' '.$r2["LASTNAME"];
$date=date("Y-m-d");
$time=date("H:i:s");
$string=$date.'T'.$time.'Z';
$p["PROFILESTARTDATE"]=$string;


//"2011-03-11T00:00:00Z";
$p["DESC"]="Drive Buy Membership";
$p["MAXFAILEDPAYMENTS"]="3";
$p["AUTOBILLAMT"]="AddToNextBilling";
$p["BILLINGPERIOD"]="Month";
$p["BILLINGFREQUENCY"]="1";
$p["TOTALBILLINGCYCLES"]="6";
$p["AMT"]="1";
$p["FIRSTNAME"]=$r2["FIRSTNAME"];
$p["LASTNAME"]=$r2["LASTNAME"];
$p["STREET"]=$r2["SHIPTOSTREET"];
$p["CITY"]=$r2["SHIPTOCITY"];
$p["STATE"]=$r2["SHIPTOSTATE"];
$p["COUNTRYCODE"]=$r2["SHIPTOCOUNTRYCODE"];
$p["ZIP"]=$r2["SHIPTOZIP"];
$p["CURRENCYCODE"]=$r2["CURRENCYCODE"];
$p["L_PAYMENTREQUEST_0_ITEMCATEGORY0"]="Digital";
$p["&L_PAYMENTREQUEST_0_NAME0"]="Monthly Subscription";
$p["&L_PAYMENTREQUEST_0_AMT0"]="1.00";
$p["&&L_PAYMENTREQUEST_0_QTY0"]="1";

$r=RunAPICall($p);

$ppProfile=$r["PROFILEID"];


$p=array();
$p["METHOD"]="GetRecurringPaymentsProfileDetails";
$p["VERSION"]="69.0";
$p["PROFILEID"]=$ppProfile;
$r=RunAPICall($p);


$date=$r["NEXTBILLINGDATE"];

$d=strtotime($date);
$expiry_time=rtd($d);

$u=wp_get_current_user();
$uid=$u->ID;
mysql_select_db("thedrive_users");
mysql_query("UPDATE users SET pp_profile='$ppProfile',membership_state='1',membership_time='$d' WHERE wp_profile='$uid'");

$email=$u->user_email;

$t=$email;
$s="You are now an official member of The Drive Buy";
$b="You are now an official member of The Drive Buy";
mail_sb($t,$s,$b);


echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>The Drive Buy</title>
<script type="text/javascript" src="https://www.paypalobjects.com/js/external/dg.js"></script>
</head>
<body>
<script type="text/javascript">
//actually change on trial or outstanding balance to member and change membership expires, the rest put it up in the membership status page.

//Membership Status: Member.<br>Member since: member_since<br>Your membership expires: expiry_time and is set to automatically renew. You will be notified when your membership period is over to renew your membership.

var t=window.parent.document;

var expiry_time="'.$expiry_time.'";

parent.newmember(expiry_time);

top.dg.closeFlow(); //call this at end to parse above code
</script>
</body>
</html>';
?>