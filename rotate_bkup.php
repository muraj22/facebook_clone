<?php  
include("start.php");
ignore_user_abort(true); 

include("start.php");
?>
<?php

function genRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}

function rotateImage($sourceFile,$destImageName,$degreeOfRotation)
{
  //function to rotate an image in PHP
  //developed by Roshan Bhattara (http://roshanbh.com.np)

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




$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$uidp="media";

$result=mysql_query("SELECT * FROM $uidp WHERE id='$uid' AND sbid='$photoid'");
if(!$result){
	  die();
  }
$result=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$album' AND sbid='$photoid'");
while($ms=mysql_fetch_array($result)){
$theimg=$ms['pics'];
$theimgv=$ms['picsr'];
$theimgvv=$ms['picss'];
$theimgvvv=$ms['picsa'];
$theimgvvvv=$ms['picsa'];
$degrees=$ms['degrees'];
}

if($w=="r"){
$degrees=-90;
}
else{
$degrees=90;
}


if($w=="r"){$degreesv="-90";}
else if($w=="l"){$degreesv="90";}

$r=mysql_query("SELECT * FROM tags WHERE photoid='$photoid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$l=$m['left2'];
$t=$m['top2'];	
$i=$m['primary2'];
if($degreesv=="90"){
$l2=$t;
$t2=100-$l;
}
else if($degreesv=="-90"){
$t2=$l;
$l2=100-$t;	
}


$h2=$m['width2'];
$w2=$m['height2'];



mysql_query("UPDATE tags SET top2='$t2', left2='$l2',width2='$w2',height2='$h2' WHERE primary2='$i'");
//aca va segundo update a todas las coordendas en fct y fcl - face coordinates top, y face coordinates left - dos nuevas celdas a las fotos
}

$atheimg='users/'.$uid.'/pics/'.$theimg;

rotateImage("$atheimg","$atheimg",$degrees);


$atheimgv='users/'.$uid.'/pics/'.$theimgv;
$target_path = "users/$uid/pics";



$target_path1 = "users/$uid/pics/";
$target_path = $target_path1.$theimg; 
$target_paths = $target_path1.$theimgv; 
$target_pathv=$atheimg;
$target_pathvv=$atheimgv;

$actual_pic=$theimg;

$dfile=explode(".",$theimg);

$ran=$dfile[0];
$ext=$dfile[1];

include("classes/photo.php");

$rhelper_jsv="";
include("add_photos/include.php");


mysql_query("UPDATE $uidp SET degrees='$degrees' WHERE id='$uid' AND sbid='$photoid'");

echo $widthv.'{}'.$heightv.'{}'.$degrees;

 
include("end.php");
?> 