<?php
if(!function_exists("grsn")){
function grsn($length) {
    $characters = '123456789';
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}
}
?>