<?php
ignore_user_abort(true);
require_once("functions.php");

if(!strlen($_REQUEST["token"])){
PaymentError();
}

$nvps2 = array();
$nvps2["VERSION"] = "69.0";
$nvps2["METHOD"] = "GetExpressCheckoutDetails";
$nvps2["TOKEN"] = $_REQUEST["token"];


$r2 = RunAPICall($nvps2);

$nvps = array();

$nvps["METHOD"] = "DoExpressCheckoutPayment";
$nvps["VERSION"] = "69.0";
$nvps["TOKEN"] = $_REQUEST["token"];
$nvps["PAYERID"] = $r2["PAYERID"];
$nvps["PAYMENTREQUEST_0_PAYMENTACTION"]="SALE";
$nvps["PAYMENTREQUEST_0_AMT"]=number_format($_GET['funds'],2);
$nvps["PAYMENTREQUEST_0_CURRENCYCODE"]="USD";

$r = RunAPICall($nvps);

if($r["ACK"] != "Success" && $r["ACK"] != "SuccessWithWarning") {
PaymentError();
}

$funds=$_GET['funds'];

include("../bank/add_funds.php");

/*
echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>The Drive Buy</title>
<script type="text/javascript" src="https://www.paypalobjects.com/js/external/dg.js"></script>
</head>
<body>
<script type="text/javascript">
var t=window.parent.document;
parent.funds_success();
top.dg.closeFlow(); //call this at end to parse above code
</script>
</body>
</html>';
*/
header("Location: http://www.subsbook.com/bank/?funds_added");
?>