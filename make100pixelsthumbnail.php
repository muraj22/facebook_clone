<?php
$fifty=$thumbnail;

$hundred=explode(".",$thumbnail);
$hundred=$hundred[0].'_s.'.$hundred[1];

$fifty_p=$root."/users/".$uid."/pics/".$fifty;
$hundred_p=$root."/users/".$uid."/pics/".$hundred;

$image = new resizer(); $image->prepare($fifty,$hundred); $image->ToWidth(100);
?>