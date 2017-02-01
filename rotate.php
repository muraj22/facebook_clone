<?php  
include("start.php");
ignore_user_abort(true); 

?>

<?php
include("functions/grs.php");

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

$sbid=$_POST['photoid'];
$album=$_POST['albumid'];
$w=$_POST['w'];




$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$uidp="media";

$result=mysql_query("SELECT * FROM $uidp WHERE id='$uid' AND sbid='$sbid'");
if(!$result){
	  die();
  }
$result=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$album' AND sbid='$sbid'");
while($ms=mysql_fetch_array($result)){
$theimg=$ms['pics'];
$theimgv=$ms['picsr'];
$theimgvv=$ms['picss'];
$theimgvvv=$ms['picsa'];
$theimgvvvv=$ms['picsa'];
$fname=$ms['fname'];
$degrees=$ms['degrees'];
$filter_degrees=$ms['filter_degrees'];
$serverdegrees=$ms['degrees'];
$filter=$ms['filter'];
$tilt_shift=$ms['tilt_shift'];
}



if($w=="r"){
$degreesv="-90";
$degrees=$degrees-90;
$filter_degreesv="-90";
$filter_degrees=$filter_degrees-90;
}
else if($w=="l"){
$degreesv="90";
$degrees=$degrees+90;
$filter_degreesv="90";
$filter_degrees=$filter_degrees+90;
}

if($degrees<=-360 || $degrees>=360){
$degrees=0;
}
if($filter_degrees<=-360 || $filter_degrees>=360){
$filter_degrees=0;	
}



$r=mysql_query("SELECT * FROM tags WHERE photoid='$sbid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$l=$m['left2'];
$t=$m['top2'];	
$i=$m['sbid'];
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



mysql_query("UPDATE tags SET top2='$t2', left2='$l2',width2='$w2',height2='$h2' WHERE sbid='$i'");
//aca va segundo update a todas las coordendas en fct y fcl - face coordinates top, y face coordinates left - dos nuevas celdas a las fotos
}

$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$faces=$m['faces'];
//aca pasarlo tipo parsejson de js pero de php y agarrarlo bien como array para hacer lo mismo que se hace arriba con las caras
}


if($degrees==90){

$positive_degrees="t";	
}
if($filter_degrees==90){
	
$filter_positive_degrees="t";
}

include("add_photos/degrees.php");
$degrees_a["0"]="_t";


$current_suf=$degrees_a["$serverdegrees"]; //current server suffix for rotation - if any
$new_suf=$degrees_a["$degrees"]; // new suffix for rotation

$theimg_ext=explode(".",$theimg);

$theimg_ext=$theimg_ext[1];

$degrees_a["blank"]="";

$clean_name=$fname;

$original_name=$clean_name; // there is an original file name, there is a current file name and there is a new file name to be created or checked against

$path="users/".$uid."/pics/";
$original_name_path=$path.$original_name;

$degrees_rotate=$degrees;

$filter_degrees_rotate=$filter_degrees;

$new_name_original_exp=explode(".",$fname);
$new_name_original=$new_name_original_exp[0].$new_suf.'.'.$new_name_original_exp[1];
$new_name_path_original=$path.$new_name_original;

$original_name_path_original=$original_name_path;

if(!file_exists($new_name_path_original)){
rotateImage("$original_name_path_original","$new_name_path_original",$degrees_rotate);
$recreate_thumbs="t";
}

if($filter!="normal" || $tilt_shift==1){
$new_name_exp=explode(".",$fname);	
$new_name=$new_name_exp[0]."_filtered".$new_suf.'.'.$new_name_exp[1];

$filter_name=$theimg;
$filter_name_path=$path.$theimg;
}
else{
$new_name_exp=explode(".",$fname);
$new_name=$new_name_exp[0].$new_suf.'.'.$new_name_exp[1];	
}
$new_name_path=$path.$new_name;


if($filter!="normal" || $tilt_shift==1){
rotateImage("$filter_name_path","$new_name_path",$filter_degrees_rotate);	
}

$new_name_exp=explode(".",$new_name);	
$actual_pic2=$new_name_exp[0].'s.'.$theimg_ext;
$actual_pic3=$new_name_exp[0].'mm.'.$theimg_ext;
$actual_pic4=$new_name_exp[0].'v.'.$theimg_ext;
$actual_pic7=$new_name_exp[0].'a.'.$theimg_ext;

$new_namev=$new_name_exp[0].'v.'.$theimg_ext;

$atheimg='users/'.$uid.'/pics/'.$new_name;

$atheimgv='users/'.$uid.'/pics/'.$new_namev;
$target_path=$root."/users/$uid/pics";


$target_path1=$root."/users/$uid/pics/";

$target_path = $target_path1.$new_name; 
$target_paths = $target_path1.$new_namev; 
$target_pathv=$target_path1.$new_name;
$target_pathvv=$target_path1.$new_namev;

$actual_pic=$new_name;

$dfile=explode(".",$new_name);

$ran=$dfile[0];
$ext=$dfile[1];

include("classes/photo.php");

$rhelper_jsv="";
include("add_photos/include.php");



mysql_query("UPDATE media SET pics='$actual_pic',picsa='$actual_pic2',picsr='$actual_pic3',picss='$actual_pic4',picsm='$actual_pic7',degrees='$degrees',filter_degrees='$degrees_rotate' WHERE sbid='$sbid' AND id='$uid'");

echo $new_name.'{}'.$widthv.'{}'.$heightv.'{}'.$degrees.'{}'.$degrees_rotate.'{}'.$original_name.'{}'.$actual_pic2.'{}'.$new_name_original;

if(strpos($new_name,"_filtered")!==false && isset($recreate_thumbs)){

$target_path=$root."/users/$uid/pics";

$target_path1=$root."/users/$uid/pics/";

$new_name_originalv=explode(".",$new_name_original);
$new_name_originalv=$new_name_originalv[0].'v.'.$new_name_originalv[1];

$target_path = $target_path1.$new_name_original; 
$target_paths = $target_path1.$new_name_originalv; 
$target_pathv=$target_path1.$new_name_original;
$target_pathvv=$target_path1.$new_name_originalv;

$dfile=explode(".",$new_name_original);

$ran=$dfile[0];
$ext=$dfile[1];

include("add_photos/include.php");
}

include("end.php");
?> 