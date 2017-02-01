<?php
include("start.php");

if($new_withdrawal_account!=""){

if(strlen($new_withdrawal_account)>74){exit();}
if(!filter_var($new_withdrawal_account, FILTER_VALIDATE_EMAIL)){exit();}

mysql_query("INSERT INTO withdrawals (id,visibility,email,datetimep_se,datetimep) VALUES('$uid','v','$new_withdrawal_account',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");

}
?>