<?php
if(!function_exists("ua")){
function ua(){
require("uaparser/uaparser.php");
$r=UA::parse();
return $r->browser;
}
$browser_conv=array();
$browser_conv["IE"]="msie";
$browser_conv["Chrome"]="chrome";
$browser_conv["Firefox"]="firefox";
$browser_conv["Safari"]="safari";
$browser=$browser_conv[ua()];
//turns IE, Firefox, Chrome, Safari
}
?>