<?php
session_start();
include("start.php"); ?>
<?php
$uidv=$uid;

$uida=$uid.'a';
$uidp=$uid.'p';

if(isset($_POST['albumid'])){

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

include("chatupd.php");

$albumn=$_POST['albumid'];

$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND visibility!='d' AND pinboard!='2' ORDER BY norder DESC LIMIT 1");
while($m=mysql_fetch_array($r)){
$norder=$m['norder']+1;
}

$privacy=0;
$privacyh='';
$pinboard=1;
mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp)
VALUES ('$uid','$albumn','','','v','','$norder','$norder','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),'')");

$albumid=lp();

$likeid=$albumid;
$ltype='album';
include("stories/like_insert.php");
include("stories/repin_insert.php");


echo $albumid;

mysql_close($con);

}

if(isset($_POST['albumid2'])){
$albumid=$_POST['albumid2'];
$selected_album=$_POST['selected_album'];



if($albumid==""){$albumid="Untitled Album";}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

mysql_query("UPDATE albums SET albumn='$albumid' WHERE sbid='$selected_album' AND id='$uid'");

mysql_query("UPDATE media SET albumn='$albumid' WHERE albumid='$selected_album' AND id='$uid'");

mysql_close($con);
}


$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . $uid.'/pics/';
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'add_photos2.php';
$fieldname = 'uploadedfile';

// possible PHP upload errors
$errors = array(1 => 'php.ini max file size exceeded', 
                2 => 'html form max file size exceeded', 
                3 => 'file upload was only partial', 
                4 => 'no file was attached');

$var1="n";

if(isset($_POST['submit2'])){
	$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
	$selected_album=$_POST['selected_album'];

	$r=mysql_query("SELECT * FROM albums WHERE sbid='$selected_album' AND id='$uid'");
	$r=mysql_query("SELECT * FROM albums WHERE sbid='$selected_album' AND albumn!='Profile Pictures' AND albumn!='Wall Photos' AND albumn!='Photos' AND id='$uid'");
$c=mysql_num_rows($r); 
if($c==0){mysql_close($con); exit();}

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE albumid='$selected_album' AND (visibility='v' OR visibility='h')"));
$c=$c['c'];
if($c>=1000){ //max album size.
echo 'e10{}';
exit();
}
	/*
	$dname=$_FILES['uploadedfile']['tmp_name'];
$asize=filesize($dname);

$rsize=$_FILES['uploadedfile']['size'];
$rsize=$rsize;




mysql_select_db("registeredv", $con);
$dea='test';
mysql_query("INSERT INTO $dea (asize,rsize)
VALUES ('$asize','$rsize')");

mysql_close($con);
*/

$xr=$_POST['xr'];
	include("classes/photo.php");
$active_keys = array();
foreach($_FILES[$fieldname]['name'] as $key => $filename)
{
	if(!empty($filename))
	{
		$active_keys[] = $key;
	}
}



count($active_keys)
	or die('{}e9');
	//create its own warning at the uploaders - upload failed - no file was uploaded
		
	foreach($active_keys as $key)
{
	($_FILES[$fieldname]['error'][$key] == 0)
		or die('{}e9');
}

foreach($active_keys as $key)
{
	@is_uploaded_file($_FILES[$fieldname]['tmp_name'][$key])
		or die('{}e9'.$_FILES[$fieldname]['name'][$key].' not an HTTP upload');
			//create its own warning at the uploaders - upload failed
}


foreach($active_keys as $key)
{
	@getimagesize($_FILES[$fieldname]['tmp_name'][$key])
		or die('{}e9'.$_FILES[$fieldname]['name'][$key]);
		//create its own warning at the uploaders - not an image
}


//e9 file size error

foreach($active_keys as $key)
{
$filesize=$_FILES[$fieldname]['size'][$key];
if($filesize>83886080){

die('{}e9');	
}


}

foreach($active_keys as $key)
{
$target_path=$root."/users/$uid/pics";


$ufile=$_FILES[$fieldname]['name'][$key];
$path_parts = pathinfo("$ufile");

$ext = 'png'; 

$ran = grs(25);
$ran2 = $ran.".";
$target_path1=$root."/users/$uid/pics/";

$target_path = $target_path1.$ran2.$ext; 
$target_paths = $target_path1.$ran.'v.'.$ext; 

$target_pathv=$target_path;
$target_pathvv=$target_paths;
$target_pathvvv='';


$actual_pic=$ran2.$ext;
$actual_pic2=$ran.'s.'.$ext;
$actual_pic3='';
$actual_pic4=$ran.'v.'.$ext;
$actual_pic7=$ran.'a.'.$ext;

 if(move_uploaded_file($_FILES[$fieldname]['tmp_name'][$key], $target_path)) {
$including="add_photos2.php";

$cnt=$_POST['cnt'];

$pv=rand(45,55);
$_SESSION['progress_'.$cnt]=$pv;
session_write_close();

$rhelper_jsv="";
include("add_photos/include.php");



$uidp=$uid.'p';







$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$result = mysql_query("SELECT * FROM albums WHERE sbid='$selected_album' AND id='$uid'");
while($ms = mysql_fetch_array($result))
  {
$albumn=$ms['albumn'];
}




$location=$_POST['location'];
   

$width=$output_width;
$height=$output_height;

$widthv=$output_widthv;
$heightv=$output_heightv;


$uidp=$uid.'p';
$uida=$uid.'a';


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$norder=$xr;


if($albumn=='Profile Pictures'){
mysql_query("UPDATE registered SET profilepic='$actual_pic7',profilepict='$actual_pic7' WHERE id='$uid'");
	}
	


$descr='';

include("stories/media_insert.php");

$photoid=lp();
$likeid=$photoid;
$ltype='photo';
include("stories/like_insert.php");
include("stories/repin_insert.php");
//es necesario cargar estos dos por separado


mysql_query("UPDATE albums SET datetimep=UNIX_TIMESTAMP() WHERE sbid='$selected_album' AND id='$uid'");


$v="";

$cityc=addslashes($cityc);
$cityc=addslashes($cityc);

if($cityc!="" && $cityc!="undefined"){	
$f='';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$r=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$staten=$m['staten'];	
}
$r=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$countryn=$m['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}

$suc=array();

$suc["actual_pic4"]=$actual_pic4;
$suc["height"]=$height;
$suc["photoid"]=$photoid;
$suc["actual_pic4"]=$actual_pic4;
$suc["actual_pic"]=$actual_pic;
$suc["selected_album"]=$selected_album;
$suc["albumn"]=$albumn;
$suc["actual_pic"]=$actual_pic;
$suc["actual_pic2"]=$actual_pic2;
$suc["actual_pic3"]=$actual_pic3;
$suc["actual_pic4"]=$actual_pic4;
$suc["photoid"]=$photoid;
$suc["location"]=$location;
$suc["height"]=$height;
$suc["width"]=$width;
$suc["heightv"]=$heightv;
$suc["widthv"]=$widthv;
$suc["xr"]=$xr;
$suc["descr"]=$descr;
$suc["filter"]=$filter;
$suc["frame"]=$frame;
$suc["tilt_shift"]=$tilt_shift;
$suc["statec"]=$statec;
$suc["countryc"]=$countryc;
$suc["cityc"]=$cityc;
$suc["v"]=$v;
$suc["brightness"]=1;
$suc["total_brightness"]=$brightness;
$suc["contrast"]=1;
$suc["total_contrast"]=$contrast;

echo json_encode($suc).'{}'.$faces;



$xr++;
session_start();
$_SESSION['progress_'.$cnt]="100";
session_write_close();
if(!isset($_SESSION)){
session_start();
}

}



}




exit();
$var1="y";
}

else{$var1="n";}


if($var1=="n"){

}
?>
<?php include("end.php"); ?>