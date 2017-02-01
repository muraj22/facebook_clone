<?php
	ignore_user_abort(true);
if(isset($_POST['fr']) && $_POST['fr']=="nf"){
header('HTTP/1.0 204 No Content');
header('Content-Length: 0',true);
header('Content-Type: text/html',true);
flush();
}
else if(isset($_POST['fr']) && $_POST['fr']=="filters"){
		$size = ob_get_length();
		header("Content-Length: $size");
		header('Connection: close');
		// ob_end_flush();
		flush();
}
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;
}


//}


$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$filter=$m['filter'];
if($filter=="polaroid" || $filter=="twenty_one"){
$actual_pic=$m['pics'];	 //this guarantees that if uploaded through wall uploader with a filter already applied the face detefct will run through unfiltered image
}
else{
$actual_pic=$m['fname'];
}
}

$file=$actual_pic;


$actual_picp=$root."/users/".$uid."/pics/".$actual_pic;


function png2jpg($originalFile, $outputFile, $quality) {
    $image = imagecreatefrompng($originalFile);
    imagejpeg($image, $outputFile, $quality);
    imagedestroy($image);
}

$actual_pice=explode(".",$actual_pic);

$enjpg=$root."/users/".$uid."/pics/".$actual_pice[0].'pf'.'.jpg';
png2jpg($actual_picp,$enjpg,70); //pf para face detect

$actual_picd=$actual_pice[0].'pf'.'.jpg';
$actual_picdp=$root."/users/".$uid."/pics/".$actual_picd;

function shrink_to($width,$height,$load,$save,$ext){

/*
if($ext=="png"){
$st=IMAGETYPE_PNG;
}
else{
$st=IMAGETYPE_JPEG;
}
*/

$osize=getimagesize($load);
$owidth=$osize[0];
$oheight=$osize[1];


if($owidth>$width){
include("classes/resizer.php");
$png_quality="70";
$image=new resizer(); $image->prepare($load,$save); $image->ToWidth($width);
}
else if($oheight>$height){
include("classes/resizer.php");
$png_quality="70";
$image=new resizer(); $image->prepare($load,$save); $image->ToHeight($height);
}
else{
return false;
}

return;
}

$ok=shrink_to(2200,2200,$actual_picp,$actual_picdp,$actual_pice);


if($ok===false){
//$actual_picd=$actual_pic;
//$actual_picdp=$actual_picp;
}


$osize=getimagesize($actual_picp);
$owidth=$osize[0];
$oheight=$osize[1];

$osizev=getimagesize($actual_picdp);
$owidthv=$osizev[0];
$oheightv=$osizev[1];

$pw=$owidthv*100/$owidth;
$ph=$oheightv*100/$oheight;


$file='/var/www/html/users/'.$uid.'/pics/'.$actual_picd;

$esto="/var/www/html/facedetect/facedetect ".$file; //just remove .exe for linux

$d=shell_exec($esto);
$expd=explode("='';",$d);

$face_width=array();
$facep_width=array();

$facep_x=array();
$face_x=array();

foreach($expd as $k=>$v){
	if($v!=''){

if(strpos($v,"face->")!==false){
$vv=explode("face->:",$v);
$facek='face';
}
else{
$vv=explode("facep->:",$v);
$facek='facep';
}

$vvv=explode(",",$vv[1]);



${$facek.'_width'}[$k]=($vvv[0]*100)/$pw;
${$facek.'_height'}[$k]=($vvv[1]*100)/$ph;
${$facek.'_x'}[$k]=($vvv[2]*100)/$pw;
${$facek.'_y'}[$k]=($vvv[3]*100)/$ph;

	}
}



$totalsum=0;
$totalsump=0;
foreach($expd as $k=>$v){
	if($v!=''){
		if(isset($face_width[$k])){
$totalsum=$totalsum+$face_width[$k];
		}
else{
$totalsump=$totalsump+$facep_width[$k];
	}

		}
	}


$approximate_face_width_acceptable=0;

if($filter!="twenty_one"){
$big_false_detects=1.4;
$small_false_detects=.4;
}
else{
$big_false_detects=4.4;
$small_false_detects=1.2;
}

$x=count($face_width);
if($x>0){
$approximate_face_width_acceptable=$totalsum/$x;
$approximate_face_width_acceptable=$approximate_face_width_acceptable*$small_false_detects; //for small false detects
}

$approximate_face_width_acceptablep=0;

$x=count($facep_width);
if($x>0){
$approximate_face_width_acceptablep=$totalsump/$x;
$approximate_face_width_acceptablep=$approximate_face_width_acceptablep*.4;
}

if($approximate_face_width_acceptable>0 && $approximate_face_width_acceptablep>0){
$common_face_width_acceptable=$approximate_face_width_acceptable+$approximate_face_width_acceptablep/2;
}
else if($approximate_face_width_acceptable>0){
$common_face_width_acceptable=$approximate_face_width_acceptable;
}
else{
$common_face_width_acceptable=$approximate_face_width_acceptablep;
}

foreach($face_width as $k=>$v){
if($v<$common_face_width_acceptable){
unset($face_width[$k]);
}
}

foreach($facep_width as $k=>$v){
if($v<$common_face_width_acceptable){
unset($facep_width[$k]);
}
}


$totalsum=0;
$totalsump=0;
foreach($expd as $k=>$v){
	if($v!=''){
		if(isset($face_width[$k])){
$totalsum=$totalsum+$face_width[$k];
		}
else if(isset($face_widthp[$k])){
$totalsump=$totalsump+$facep_width[$k];
	}

		}
	}


$approximate_face_width_acceptablep=0;

$approximate_face_width_acceptable=0;
$approximate_face_width_acceptableo=0;

$x=count($face_width);
if($x>0){
$approximate_face_width_acceptable=$totalsum/$x;
$approximate_face_width_acceptableo=$approximate_face_width_acceptable*1.4; //for large false detects
}

$approximate_face_width_acceptablepo=0;

$x=count($facep_width);
if($x>0){
$approximate_face_width_acceptablep=$totalsump/$x;
$approximate_face_width_acceptablepo=$approximate_face_width_acceptablep*1.4;
}


if($approximate_face_width_acceptableo>0 && $approximate_face_width_acceptablepo>0){
$common_face_width_acceptableo=$approximate_face_width_acceptableo+$approximate_face_width_acceptablepo/2;
}
else if($approximate_face_width_acceptable>0){
$common_face_width_acceptableo=$approximate_face_width_acceptableo;
}
else{
$common_face_width_acceptableo=$approximate_face_width_acceptablepo;
}



foreach($face_width as $k=>$v){
if($v>$common_face_width_acceptableo){
unset($face_width[$k]);
}
}

foreach($facep_width as $k=>$v){
if($v>$common_face_width_acceptableo){
unset($facep_width[$k]);
}
}


foreach($facep_width as $k=>$v){

foreach($face_width as $k2=>$v2){

if(isset($facep_width[$k])){
$right=$facep_x[$k]+$facep_width[$k];
$rightv=$face_x[$k2]+$face_width[$k2];

$diff=$rightv-$right;
if(strpos($diff,"-")!==false){
$diff=$diff*-1;
}
if($diff>0){
$diff=$diff*100/$approximate_face_width_acceptable;
if($diff<=45){
unset($facep_width[$k]);
}
}
}

$diff=$facep_x[$k]-$face_x[$k2];
if(strpos($diff,"-")!==false){
$diff=$diff*-1;
}
if($diff>0){
$diff=$diff*100/$approximate_face_width_acceptable;
if($diff<=45){
unset($facep_width[$k]);
}
}

}

}


foreach($face_x as $k=>$v){
if(!isset($face_width[$k])){
unset($face_x[$k]);
}
}


foreach($facep_x as $k=>$v){
if(!isset($facep_width[$k])){
unset($facep_x[$k]);
}
}




asort($face_x);
asort($facep_x);




$faces='{"faces":[';
foreach($face_x as $k=>$v){
$faces.='{"width":"'.$face_width[$k].'","height":"'.$face_height[$k].'","positionX":"'.$face_x[$k].'","positionY":"'.$face_y[$k].'"},';
}

foreach($facep_x as $k=>$v){
$faces.='{"width":"'.$facep_width[$k].'","height":"'.$facep_height[$k].'","positionX":"'.$facep_x[$k].'","positionY":"'.$facep_y[$k].'"},';
}

if(strpos($faces,",")!==false){
$faces=substr($faces,0,-1);
}

$faces.=']}';

mysql_query("UPDATE media SET faces='$faces' WHERE sbid='$sbid' AND id='$uid'");

echo $xpu.'{}'.$faces;

include("end.php");
?>