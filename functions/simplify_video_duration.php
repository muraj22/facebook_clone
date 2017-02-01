<?php
if(!function_exists("simplify_video_duration")){
function simplify_video_duration($duration){
$simplify=explode(":",$duration);
if($simplify[0]=="00"){
$duration=$simplify[1].':'.$simplify[2];	
}
$simplify=explode(":",$duration);
if($simplify[0]=="00"){
$duration='0:'.$simplify[1];	
}
$simplify=explode(":",$duration);
if(isset($simplify[2])){
if(strpos($simplify[0],"0")=="0"){
$duration=substr($simplify[0],1,1).':'.$simplify[1].':'.$simplify[2];	
}
}
else if(isset($simplify[1])){
if(strpos($simplify[0],"0")=="0" && strlen($simplify[0])>1){
$duration=substr($simplify[0],1,1).':'.$simplify[1];	
}
return $duration;
}
}
}
?>