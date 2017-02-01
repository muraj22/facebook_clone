<?php

$size=getimagesize($target_path);

$width=$size[0];
$height=$size[1];

$copied2=$target_path1.$actual_pic2;

if($width>206){
   $image = new resizer(); $image->prepare($target_path,$copied2); $image->ToWidth(206); 	
$suc="t";
}
if(!isset($suc)){
copy($target_path,$copied2);
}
else{unset($suc);}



$copied2=$target_path1.$actual_pic7;
if($height>$width){
if($height>=480){
   $image = new resizer(); $image->prepare($target_path,$copied2); $image->ToHeight(480);	
$suc="t";
}
}
else{
if($width>=480){
   $image = new resizer(); $image->prepare($target_path,$copied2); $image->ToWidth(480); 	
$suc="t";
}
}

if(!isset($suc)){
copy($target_path,$copied2);
}
else{unset($suc);}
?>