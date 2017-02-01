<?php
require_once 'anet_php_sdk/AuthorizeNet.php'; // The SDK
$url = "http://subsbook.com/direct_post.php";
$api_login_id = '3eB6GsYKXx88';
$transaction_key = '877DjL6vxeY8Y4Q6';
$md5_setting = 'asdaf2123'; // Your MD5 Setting
$amount = "5.99";
AuthorizeNetDPM::directPostDemo($url, $api_login_id, $transaction_key, $amount, $md5_setting);
?>