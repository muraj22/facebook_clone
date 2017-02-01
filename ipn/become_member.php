<?php
require_once("functions.php");

$nvps = array();

$nvps["VERSION"] = "69.0"; //65.1 works well everywhere

$nvps["METHOD"] = "SetExpressCheckout";
$nvps["RETURNURL"] = "http://108.165.22.98/~thedrive/the.drive.buy/ipn/return.php";
$nvps["CANCELURL"] = "http://108.165.22.98/~thedrive/the.drive.buy/ipn/cancel.php";
$nvps["L_BILLINGTYPE0"] = "RecurringPayments";
$nvps["L_BILLINGAGREEMENTDESCRIPTION0"] = "Drive Buy Membership";
$nvps["PAYMENTACTION"] = "Authorization";

// This is what makes the whole magic happen --
// don't forget this one!



/*
$nvps["VERSION"] = "65.1";


$nvps["METHOD"] = "SetExpressCheckout";
$nvps["RETURNURL"] = "http://108.165.22.98/~thedrive/the.drive.buy/ipn/return.php";
$nvps["CANCELURL"] = "http://108.165.22.98/~thedrive/the.drive.buy/ipn/cancel.php";
$nvps["PAYMENTREQUEST_0_AMT"] = "14.95";
$nvps["PAYMENTREQUEST_0_CURRENCYCODE"] = "USD";
$nvps["PAYMENTREQUEST_0_ITEMAMT"] = "14.95";
$nvps["L_PAYMENTREQUEST_0_NAME0"] =
	"WAV FILE AND PDF BOOKLET - Download";
$nvps["L_PAYMENTREQUEST_0_DESC0"] = "";
$nvps["L_PAYMENTREQUEST_0_AMT0"] = "14.95";
$nvps["L_PAYMENTREQUEST_0_QTY0"] = "1";
*/


$response = RunAPICall($nvps);
	
if(($response["ACK"] != "Success" && $response["ACK"] != "SuccessWithWarning") || !strlen($response["TOKEN"]))
	PaymentError();
	

header("Location: https://www.sandbox.paypal.com/incontext?token=" . $response["TOKEN"]);
?>