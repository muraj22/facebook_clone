<?php
$Config["geolocationdb"] = mysql_connect("localhost","root","xd22xd22");
mysql_select_db("geoip", $Config["geolocationdb"]);

function getALLfromIP($addr) {
global $Config;
// this sprintf() wrapper is needed, because the PHP long is signed by default
$ipnum = sprintf("%u", ip2long($addr));
$query = "SELECT cc, cn FROM ip NATURAL JOIN cc WHERE ${ipnum} BETWEEN start AND end";
$result = mysql_query($query);

if((! $result) or mysql_num_rows($result) < 1) {
//exit("mysql_query returned nothing: ".(mysql_error()?mysql_error():$query));
return false;
}
return mysql_fetch_array($result);
}

function getCCfromIP($addr) {
$data = getALLfromIP($addr);
if($data) return $data['cc'];
return false;
}

function getCOUNTRYfromIP($addr) {
$data = getALLfromIP($addr);
if($data) return $data['cn'];
return false;
}

function getCCfromNAME($name) {
$addr = gethostbyname($name);
return getCCfromIP($addr);
}

function getCOUNTRYfromNAME($name) {
$addr = gethostbyname($name);
return getCOUNTRYfromIP($addr);
}
?>