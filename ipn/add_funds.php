<?php
require_once("functions.php");

$nvps = array();

$nvps["VERSION"] = "69.0"; //65.1 works well everywhere

$nvps["METHOD"] = "SetExpressCheckout";

$nvps["CURRENCYCODE"]="USD";
$nvps["PAYMENTACTION"]="Sale";
//$nvps["ALLOWNOTE"]=1;
$nvps["PAYMENTREQUEST_0_CURRENCYCODE"]="USD";
$nvps["PAYMENTREQUEST_0_AMT"]=number_format($_GET['funds'],2);;
$nvps["PAYMENTREQUEST_0_ITEMAMT"]=number_format($_GET['funds'],2);
//$nvps["L_PAYMENTREQUEST_0_QTY0"]=1;
$nvps["L_PAYMENTREQUEST_0_AMT0"]=number_format($_GET['funds'],2);
//$nvps["L_PAYMENTREQUEST_0_NAME0"]="Adding funds";
//$nvps["L_PAYMENTREQUEST_0_NUMBER0"]=171424;
$nvps["AMT"]=number_format($_GET['funds'],2);
$nvps["RETURNURL"]="http://www.subsbook.com/ipn/success.php?funds=".$_GET['funds'].'&uid='.$_GET['uid'];
$nvps["CANCELURL"]="http://www.subsbook.com/ipn/cancel.php";
				
$response = RunAPICall($nvps);
	
if(($response["ACK"] != "Success" && $response["ACK"] != "SuccessWithWarning") || !strlen($response["TOKEN"])){
	PaymentError();
}

header("Location: https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=" . $response["TOKEN"]);
?>