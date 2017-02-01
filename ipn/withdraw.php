<?php
ignore_user_abort(true);
include("start.php");

$r=mysql_query("SELECT * FROM bank WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
    $amount=$m['amount'];    
}

if($_GET['funds']>$amount){
    exit();   
}

require_once("functions.php");

$nvps = array();

$nvps["VERSION"] = "69.0"; //65.1 works well everywhere

$nvps["METHOD"]="MASSPAY";

$nvps["CURRENCYCODE"] = "USD";
$nvps["RECEIVERTYPE"]="EmailAddress";
$nvps["L_EMAIL0"]=$_GET['withdrawal_account'];
$nvps["L_AMT0"]=number_format($_GET['funds'],2);
				
$response = RunAPICall($nvps);

if($response["ACK"]=="Success"){
    $amount=$amount-number_format($_GET['funds'],2);
    mysql_query("UPDATE bank SET amount='$amount' WHERE id='$uid'");
    
    $fee=0;
    $funds="-".number_format($_GET['funds'],2);
    $withdrawal_account='PayPal '.$_GET['withdrawal_account'];
    
    mysql_query("INSERT INTO transactions (id,id2,amount,fee,datetimep) VALUES('$uid','$withdrawal_account','$funds','$fee',UNIX_TIMESTAMP())");
    
    header("Location: http://www.subsbook.com/bank/withdrawals.php?success");
}else{
    header("Location: http://www.subsbook.com/bank/withdrawals.php");
}
?>