<?php
$pp_functions="";
define("API_USERNAME", "pabloc.elance-facilitator_api1.gmail.com");
define("API_PASSWORD", "1363516469");
define("API_SIGNATURE", "AYG17Wi1tUDOXEqjJXGMxWIcQyRbAunCVtd9aETt32ULt5Cwa0l6bRDn");

// A few utility functions to help us work with the PayPal NVP APIs.

function NVPEncode($nvps) {
	$out = array();
	foreach($nvps as $index => $value) {
		$out[] = $index . "=" . urlencode($value);
	}
	
	return implode("&", $out);
}

function NVPDecode($nvp) {
	$split = explode("&", $nvp);
	$out = array();
	foreach($split as $value) {
		$sub = explode("=", $value);
		$out[$sub[0]] = urldecode($sub[1]);
	}
	
	return $out;
}

function RunAPICall($nvps,$extra_param=false) {
    if($extra_param){
        $ch = curl_init("https://svcs.sandbox.paypal.com/AdaptivePayments/Pay");    
    }else{
        $ch = curl_init("https://api-3t.sandbox.paypal.com/nvp");
    }
    curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	
	// On some servers, these two options are necessary to
	// avoid getting "invalid SSL certificate" errors
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
	// Insert the credentials
	$nvps["USER"] = API_USERNAME;
	$nvps["PWD"] = API_PASSWORD;
	$nvps["SIGNATURE"] = API_SIGNATURE;
	
	// Build the NVP string
	$nvpstr = NVPEncode($nvps);
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpstr);
	
	$result = curl_exec($ch);
	
	// If the request failed, return an empty array.
	if($result === FALSE) return array();
	
	// Return the decoded response
	else return NVPDecode($result);
}

// I found myself using this bit of code multiple times,
// so I figured it would be good to put it in its own
// function.

function PaymentError() {
	die("Uh oh, an error occurred...sorry, I can't process your purchase " .
		"right now.  Please try again later.<br /><br />" .
		"<a href=\"http://subsbook.com/ipn/cancel.php\">Click here</a> to close this window.");
}

?>