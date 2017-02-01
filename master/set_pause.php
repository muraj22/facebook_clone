<?php
if(!isset($requested_pause)){
$requested_pause='';	
}

if(isset($hidden[$whatisit_h])){
if(in_array($cag,$hidden[$whatisit_h])){
${'pause'.$requested_pause}='t';
}
}


if(isset($lbdpvvv[$whatisit_h])){
if(in_array($cag,$lbdpvvv[$whatisit_h])){
${'pause'.$requested_pause}='t';
}
}
?>