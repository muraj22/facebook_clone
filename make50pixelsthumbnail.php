<?php

if(isset($implicitheight)){
$fifty=$thumbnail_s;
$thumbnail_l_p=$root."/users/".$uid."/pics/".$thumbnail_l; //thumbnail load path

$fiftyv=str_replace("th.",".",$fifty);
$hundred=explode(".",$fiftyv);
$hundred=$hundred[0].'_s.'.$hundred[1];
}
else{
$fifty=$thumbnail;

$fiftyv=str_replace("th.",".",$fifty);
$hundred=explode(".",$fiftyv);
$hundred=$hundred[0].'_s.'.$hundred[1];
}

$fifty_p=$root."/users/".$uid."/pics/".$fifty;
$hundred_p=$root."/users/".$uid."/pics/".$hundred;
if(class_exists("resizer")===false){
include("classes/resizer.php");	
} 

if(isset($implicitheight)){
$image = new resizer(); $image->prepare($thumbnail_l_p,$hundred_p); $image->ToHeight(116);
$image = new resizer(); $image->prepare($hundred_p,$fifty_p); $image->ToHeight(58);
}
else{


if($height>$width){
   $image = new resizer(); $image->prepare($fifty_p,$hundred_p); $image->ToHeight(100); 
   $image = new resizer(); $image->prepare($hundred_p,$fifty_p); $image->ToHeight(50); 
}
else{
    $image = new resizer(); $image->prepare($fifty_p,$hundred_p); $image->ToWidth(100); 
	$image = new resizer(); $image->prepare($hundred_p,$fifty_p); $image->ToWidth(50); 
}
}
?>