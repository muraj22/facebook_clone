<?php
ignore_user_abort(true);
//uncomment after setting up chrono to video_parser.php
//if(!isset($_SERVER['HOME'])){
//exit();	
//}
$root="/var/www/html/"; //no sirve document_root por que esta como crono, para eso el clasico root no sirve
date_default_timezone_set("UTC");
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
?>