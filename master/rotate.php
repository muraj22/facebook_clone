<?php  

include("start.php");
?>
<?php
if(isset($_COOKIE["login_cookie"])){
$uid=$_COOKIE["login_cookie"];
}else{$uid='none'; header('Location: /');}
if(isset($_COOKIE["login_cookie2"])){
$un=$_COOKIE["login_cookie2"];
}
else{$un=$uid;}
?>
<?php

function rotateImage($sourceFile,$destImageName,$degreeOfRotation)
{

  //get the detail of the image
  $imageinfo=getimagesize($sourceFile);
  switch($imageinfo['mime'])
  {
   //create the image according to the content type
   case "image/jpg":
   case "image/jpeg":
   case "image/pjpeg": //for IE
        $src_img=imagecreatefromjpeg("$sourceFile");
                break;
    case "image/gif":
        $src_img = imagecreatefromgif("$sourceFile");
                break;
    case "image/png":
        case "image/x-png": //for IE
        $src_img = imagecreatefrompng("$sourceFile");
                break;
  }
  //rotate the image according to the spcified degree
  $src_img = imagerotate($src_img, $degreeOfRotation, 0);
  //output the image to a file
    switch($imageinfo['mime'])
  {
   case "image/jpg":
   case "image/jpeg":
   case "image/pjpeg": //for IE
   imagejpeg ($src_img,$destImageName);
  break;
   case "image/gif":
   imagegif ($src_img,$destImageName);
  break;
   case "image/png":
   case "image/x-png": //for IE
   imagepng ($src_img,$destImageName);
  break;
  }
}

$photoid=$_POST['photoid'];
$album=$_POST['albumid'];
$w=$_POST['w'];

$result=mysql_query("SELECT * FROM $album WHERE photoid='$photoid'");
while($ms=mysql_fetch_array($result)){
$theimg=$ms['pics'];
}

$theimg=$uid.'/pics'.$theimg;

if($w=="r"){$degrees="90";}
else if($w=="l"){$degrees="-90";}

rotateImage("$theimg","$theimg",$degrees);
?> 