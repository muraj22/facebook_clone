<?php
if(!function_exists("grs_h")){
function grs_h($length) {
    $characters = '_0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}
}
?>