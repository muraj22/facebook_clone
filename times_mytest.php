<?php
include("start.php");

$tim=time() - (0 * 24 * 60 * 60);
$timv=$tim+(1 * 24 * 60 * 60);

$tim=date("m d  g i a",$tim);
$timv=date("m d g i a",$timv);

echo $tim.'<br>'.$timv;
?>