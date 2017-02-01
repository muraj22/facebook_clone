<?php

if(!isset($extra_param)){
$extra_param="";	
}
if(!isset($shared_privacy)){
$shared_privacy="";	
}

$dprivacy=get_privacy_button_params($uidv,$sbid,$ltypev,$extra_param,$shared_privacy);
unset($shared_privacy);
unset($extra_param);

$privacy=$dprivacy["privacy"];
$privacyh=$dprivacy["privacyh"];

?>