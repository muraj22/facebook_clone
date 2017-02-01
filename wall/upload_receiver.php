<?php
session_start();
include("start.php");
$uploader_holdit="t";
?>
<?php
include("functions/grs.php");

$fieldname='uploadedfile';

$var1="n";
print_r($_POST);
if(isset($_POST['submit2'])){
	
	
	$active_keys=array();
foreach($_FILES[$fieldname]['name'] as $key => $filename)
{
	if(!empty($filename))
	{
		$active_keys[]=$key;
	}
}

count($active_keys)
	or die('{}e');
	//create its own warning at the uploaders - upload failed - no file was uploaded
		
	foreach($active_keys as $key)
{
	($_FILES[$fieldname]['error'][$key] == 0)
		or die('{}e');
	//create its own warning at the uploaders - upload failed
}

foreach($active_keys as $key)
{
	@is_uploaded_file($_FILES[$fieldname]['tmp_name'][$key])
		or die('{}e'.$_FILES[$fieldname]['name'][$key].' not an HTTP upload');
			//create its own warning at the uploaders - upload failed
}



foreach($active_keys as $key)
{
	@getimagesize($_FILES[$fieldname]['tmp_name'][$key])
		or die('video');
		//create its own warning at the uploaders - not an image
}
	
	$con=mysql_connect("localhost","root","xd22xd22");
	 mysql_select_db("registered");

	$selected_album=$_POST['albumid'];
		
	$r=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uid' AND visibility='v'");
	$xr=mysql_num_rows($r)+1;

	include("classes/photo.php");

	$r=mysql_query("SELECT * FROM albums WHERE sbid='$selected_album' AND id='$uid'");
	while($m=mysql_fetch_array($r)){
	$albumn=$m['albumn'];	
	if($albumn!="Wall Photos" && $albumn!="Photos"){
	exit();	
	}
	}
	$r=mysql_query("SELECT * FROM albums WHERE sbid='$selected_album' AND albumn='$albumn' AND id='$uid'");
$c=mysql_num_rows($r); 
if($c==0){mysql_close($con); exit();}


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

$rhelper_jsv="../";
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


$descr=$_POST['descriptionv'];


//media insert

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM albums WHERE albumn='$albumn' AND id='$uid' AND visibility='v'"));
$c=$c['c'];

if($c==0){
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM albums WHERE id='$uid' AND visibility='v'"));	
$c=$c['c']+1;
mysql_query("UPDATE albums SET visibility='v',norder='$c',oldorder='$c' WHERE albumn='$albumn' AND id='$uid'");
}

if($new_filter=="normal" && $tilt_shift!=1){
$_POST['uploader_vis']="v";
}
else{
$_POST['uploader_vis']="h";
}
if($albumn=="Photos"){
$privacy=1; //friends of the person where the post is being made
$privacyh="";	
}
include("stories/media_insert.php");

$photoid=mysql_insert_id();
$sbid=$photoid;


$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid' AND id='$uid'");
$c=mysql_num_rows($r);


$likeid=$photoid;
$ltype='photo';
include("stories/like_insert.php");

mysql_query("UPDATE albums SET datetimep=UNIX_TIMESTAMP() WHERE sbid='$selected_album' AND id='$uid'");


}

}

$sbid=$photoid;
$albumid=$selected_album;


$r=mysql_query("SELECT * FROM media WHERE sbid='$sbid'");
while($m=mysql_fetch_array($r)){
$owner=$m['id'];
}

$posted=array();

$posted['tags']=$_POST['tagswall_uploader'];

$key_name=array();
$key_name['tags']='activities';

$sflag='w';


include("tags/insert_tags_with.php");

include("filters/filters.php");

if($new_filter=="normal" && $tilt_shift!=1){}
else{
mysql_query("UPDATE media SET visibility='v' WHERE id='$uid' AND sbid='$photoid'");
}

include("news_feed/photo_post.php");


exit();
$var1="y";

}
else{
$var1="n";	
}

if($var1=="n"){
	
}

include("end.php");
?>