<?php
if(!function_exists("set_local_timezone")){
function set_local_timezone(){
global $uid;
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$r=mysql_query("SELECT * FROM options WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$octimezone=$m['original_user_timezone'];	
$cdaylight=$m['user_timezone_daylight'];
}

$tzn=timezone_name_from_abbr("",$octimezone * 3600, $cdaylight);
if($tzn===false){$tzn="UTC";}
date_default_timezone_set($tzn);

return $cdaylight;
}

$cdaylight=set_local_timezone();

}
?>