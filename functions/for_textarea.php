<?php
if(!function_exists("for_textarea")){
function for_textarea($w){
$w=str_replace("<br>","
",$w);
return $w;
}
}
?>