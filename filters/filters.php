<?php
ignore_user_abort(true);
if(!isset($sbid)){
session_start();
include("start.php");
}
else{
$noclose="t";	
}

if(!isset($noclose)){ //otherwise mixes with privacy sbid input as if it were the real photo sbid
foreach($_POST as $k=>$v){
${$k}=$v;	
}
}

$rhelper_jsv="../";



if(isset($custom_color)){


if(strpos($custom_color,",")===false){
$a="59";	
$b="89";
$c="152";
}
else{
$exp=explode(",",$custom_color);
$l=count($exp);
if($l!=3){
$a="59";	
$b="89";
$c="152";
}
else{
$a=$exp[0];	
$b=$exp[1];
$c=$exp[2];
if(is_numeric($a) AND is_numeric($b) AND is_numeric($c)){}
else{
$a="59";	
$b="89";
$c="152";
}
}
}

$custom_color=$a.','.$b.','.$c;


if(strpos($custom_hsb,",")===false){
$custom_hsb="221,60,60";	
}
else{
$exp=explode(",",$custom_hsb);
$l=count($exp);
if($l!=3){
$custom_hsb="221,60,60";	
}
else{
$a=$exp[0];
$b=$exp[1];
$c=$exp[2];
if(is_numeric($a) AND is_numeric($b) AND is_numeric($c)){
if($a>=0 AND $a<=360){
$agood="t";	
}else{$agood="f";}
if($b>=0 AND $b<=100){
$bgood="t";	
}else{$bgood="f";}
if($c>=0 AND $c<=100){
$cgood="t";	
}else{$cgood="f";}
if($agood=="t" AND $bgood=="t" AND $cgood=="t"){} //all ok, nothing to do
else{
$custom_hsb="221,60,60";	
}

}
}

}
	
} //finish if isset $custom_color

$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){
mysql_close($con);
exit();	
}

include("add_photos/degrees.php");

while($m=mysql_fetch_array($r)){
$albumn=$m['albumn'];
$dpic=$m['picsa'];
if($albumn=="Profile Pictures"){
$c2=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c2 FROM registered WHERE id='$uid' AND profilepic='$dpic'"));
$c2=$c2['c2'];
if($c2>0){
$currentpp="t";	
}
}
$filter=$m['filter'];
$base_tilt_shift=$m['tilt_shift'];
$base_frame=$m['frame'];
$dfilter="filtered";
$degrees=$m['degrees'];
$new_suf=$degrees_a["$degrees"];

$fname=$m['fname'];


$exp=explode(".",$fname);

$emulated_upload=$exp[0].$new_suf.'.'.$exp[1];
$emulated_upload_v=$exp[0].$new_suf.'v.'.$exp[1];
$emulated_upload_s=$exp[0].$new_suf.'s.'.$exp[1];
$emulated_upload_a=$exp[0].$new_suf.'a.'.$exp[1];
$emulated_upload_m=$exp[0].$new_suf.'mm.'.$exp[1];
$actual_thumbnail=$exp[0].$new_suf.'th.'.$exp[1];
}

if($new_filter=="normal" && $tilt_shift!=1 && $brightness==0 && $contrast==0){
$actual_pic=$emulated_upload;
$actual_pic2=$emulated_upload_s;
$actual_pic4=$emulated_upload_v;
$actual_pic3=$emulated_upload_m;
$actual_pic7=$emulated_upload_a;

if(isset($currentpp)){
$thumbnail=$actual_thumbnail;
$img3="../users/$uid/pics/".$actual_pic7;
$img4="../users/$uid/pics/".$actual_pic3;
$thumbnailv="../users/$uid/pics/".$thumbnail;
copy($img3,$img4);
$copiedvv=$img4;

$size=getimagesize($img4);
$width=$size[0];
$height=$size[1];

include("classes/resizer.php");
include("classes/photo.php");
include("add_photos/default_profile_picture_crop.php");

mysql_query("UPDATE registered SET profilepic='$actual_pic7',profilepict='$actual_thumbnail' WHERE id='$uid'");
mysql_query("UPDATE options SET lcords='', tcords='' WHERE id='$uid'");
}

mysql_query("UPDATE media SET pics='$actual_pic',picss='$actual_pic2',picsm='$actual_pic3',picsr='$actual_pic4',picsa='$actual_pic7',filter='normal',frame='2',tilt_shift='2',filter_degrees='0',total_brightness='$brightness',total_contrast='$contrast' WHERE sbid='$sbid'");

if(!isset($noclose)){
if(isset($from_gallery)){	
$dparams["photo"]=$actual_pic;	
}
else{
$dparams["photo"]=$actual_pic4;	
}
$arr=getimagesize($root."/users/".$uid."/pics/".$actual_pic);
$width=$arr[0];
$height=$arr[1];
$dparams["width"]=$width;	
$dparams["height"]=$height;
if($brightness>0){
$brightnessv=2;
}else{
$brightnessv=1;
}
if($contrast>0){
$contrastv=2;
}else{
$contrastv=1;
}
$dparams["brightness"]=$brightness;
$dparams["brightnessv"]=$brightnessv;
$dparams["contrast"]=$contrast;
$dparams["contrastv"]=$contrastv;
echo json_encode($dparams);
if($filter=="polaroid"){
$_POST['fr']="filters";	
include("stories/detect_faces.php");
}

mysql_close($con);
exit();	
}
else{
$partial_close="t";
}

}

if(!isset($partial_close)){
$r=mysql_query("SELECT * FROM options WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$filter_operations=$m['filter_operations'];	
}
if($filter_operations>=5 && !isset($noclose)){
echo'e';
mysql_close($con);
exit();	
}
else if(isset($noclose)){
$max_filter_operations="t"; //use this to toggle the dialog when upload is complete - coming from wall uploader	
}

$filter_operations=$filter_operations+1;
mysql_query("UPDATE options SET filter_operations='$filter_operations' WHERE id='$uid'");

$filters_frame=array();
$filters_frame[]="kelvin";
$filters_frame[]="nashville";
$filters_frame[]="gotham";

if(in_array($new_filter,$filters_frame)){
$new_filter_suf=$new_filter;
$frame=$frame;	
}
else{
$frame=2;
$new_filter_suf=$new_filter;	
}

$new_filter_suf="_filtered";

$exp=explode(".",$fname);
$emulated_upload=$exp[0].$new_filter_suf.$new_suf.'.'.$exp[1];
$emulated_upload_v=$exp[0].$new_filter_suf.$new_suf.'v.'.$exp[1];
$emulated_upload_s=$exp[0].$new_filter_suf.$new_suf.'s.'.$exp[1];
$emulated_upload_a=$exp[0].$new_filter_suf.$new_suf.'a.'.$exp[1];
$emulated_upload_m=$exp[0].$new_filter_suf.$new_suf.'mm.'.$exp[1];
$actual_thumbnail=$exp[0].$new_filter_suf.$new_suf.'th.'.$exp[1];

$ran=$exp[0].$new_filter_suf.$new_suf;

$target_path1=$root."/users/$uid/pics/";

$target_path=$root."/users/$uid/pics/".$emulated_upload;
$target_paths=$root."/users/$uid/pics/".$emulated_upload_v;

$normal_img=$exp[0].$new_suf.'.'.$exp[1]; //even rotated but always the original.
$normal_img=$target_path1.$normal_img;

$tobefiltered=$target_path;

if($new_filter==$filter && $base_frame==$frame && $base_tilt_shift==2 && $tilt_shift==1 && $new_filter!="normal"){}
else{
copy($normal_img,$tobefiltered);
}

$ufile=$target_path;
$path_parts = pathinfo("$ufile");

$ext = 'png'; 


$target_pathv=$target_path;
$target_pathvv=$target_paths;
$target_pathvvv='';


$actual_pic=$emulated_upload;
$actual_pic2=$emulated_upload_s;
$actual_pic3=$emulated_upload_m;
$actual_pic4=$emulated_upload_v;
$actual_pic7=$emulated_upload_a;

unset($uploader_holdit);
include("add_photos/include.php");

//aca meter el th
if(isset($currentpp) && $albumn=="Profile Pictures"){ //current profile picture

$thumbnail=$actual_thumbnail;
$img3=$root."/users/$uid/pics/".$actual_pic7;
$img4=$root."/users/$uid/pics/".$actual_pic3;
$thumbnailv=$root."/users/$uid/pics/".$thumbnail;
copy($img3,$img4);
$copiedvv=$img4;

$size=getimagesize($img4);
$width=$size[0];
$height=$size[1];

include("classes/photo.php");
include("add_photos/default_profile_picture_crop.php");


$thumbnail_l=$actual_pic;
$thumbnail_s=$actual_thumbnail;

include("make50pixelsthumbnail.php");


mysql_query("UPDATE registered SET profilepic='$actual_pic7',profilepict='$actual_thumbnail' WHERE id='$uid'");
mysql_query("UPDATE options SET lcords='', tcords='' WHERE id='$uid'");

}


mysql_query("UPDATE media SET pics='$actual_pic',picss='$actual_pic2',picsm='$actual_pic3',picsr='$actual_pic4',picsa='$actual_pic7',filter='$new_filter',frame='$frame',tilt_shift='$tilt_shift',filter_degrees='$degrees',total_brightness='$brightness',total_contrast='$contrast' WHERE sbid='$sbid'");

$r=mysql_query("SELECT * FROM options WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$filter_operations=$m['filter_operations'];	
}
$filter_operations=$filter_operations-1;
mysql_query("UPDATE options SET filter_operations='$filter_operations' WHERE id='$uid'");

if(!isset($noclose)){
if(isset($from_gallery)){
$dparams["photo"]=$actual_pic;	
}
else{
$dparams["photo"]=$actual_pic4;	
}
$arr=getimagesize($root."/users/".$uid."/pics/".$actual_pic);
$width=$arr[0];
$height=$arr[1];
$dparams["width"]=$width;	
$dparams["height"]=$height;	
if($brightness>0){
$brightnessv=2;
}else{
$brightnessv=1;
}
if($contrast>0){
$contrastv=2;
}else{
$contrastv=1;
}
$dparams["brightness"]=$brightness;
$dparams["brightnessv"]=$brightnessv;
$dparams["contrast"]=$contrast;
$dparams["contrastv"]=$contrastv;
echo json_encode($dparams);
}

}

if(!isset($noclose)){

if($new_filter=="polaroid" OR $filter=="polaroid" OR $new_filter=="twenty_one" OR $filter=="twenty_one"){
$_POST['fr']="filters";	
include("stories/detect_faces.php");
}

include("end.php");
}
?>