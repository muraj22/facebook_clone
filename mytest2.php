<?php
include("start.php");
mysql_query("UPDATE options SET filter_operations='0' WHERE id='275'");
$im=imagecreatetruecolor(1, 1);
$color=imagecolorallocate($im, 129,126,194);
imagefill($im, 0, 0, $color);
imagepng($im,"pija.png");

$d="122,122,122";
$exp=explode(",",$d);
$l=count($exp);
echo $l;
?>