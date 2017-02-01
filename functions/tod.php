<?php
if(!function_exists("tod")){

function tod($i){
//if(strpos($i,"-")===false){
if(is_numeric($i)){
return date('Y-m-d H:i:s', $i);  
}
else{
return $i;	
}
//}
//else{return $i;}
}
function todv($time = ''){
 $time = str_replace('-', '', $time);
 $time = str_replace(':', '', $time);
 $time = str_replace(' ', '', $time);
 
 return mktime(
 substr($time, 8, 2),
 substr($time, 10, 2),
 substr($time, 12, 2),
 substr($time, 4, 2),
 substr($time, 6, 2),
 substr($time, 0, 4)
 );	
}
}
?>