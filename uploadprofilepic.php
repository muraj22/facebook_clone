<?php
include("start.php");
?>
<?php
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . $uid.'/pics/';
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'add_photos2.php';
$fieldname = 'uploadpic';

// possible PHP upload errors
$errors = array(1 => 'php.ini max file size exceeded', 
                2 => 'html form max file size exceeded', 
                3 => 'file upload was only partial', 
                4 => 'no file was attached');

$var1="n";

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
	or error('No files were uploaded', $uploadForm);
	
	foreach($active_keys as $key)
{
	($_FILES[$fieldname]['error'][$key] == 0)
		or error($_FILES[$fieldname]['tmp_name'][$key].': '.$errors[$_FILES[$fieldname]['error'][$key]], $uploadForm);
}

foreach($active_keys as $key)
{
	@is_uploaded_file($_FILES[$fieldname]['tmp_name'][$key])
		or error($_FILES[$fieldname]['tmp_name'][$key].' not an HTTP upload', $uploadForm);
}


foreach($active_keys as $key)
{
	@getimagesize($_FILES[$fieldname]['tmp_name'][$key])
		or error($_FILES[$fieldname]['tmp_name'][$key].' not an image', $uploadForm);
}



foreach($active_keys as $key)
{
$target_path=$root."/$uid/pics";

$ufile=$_FILES['uploadpic']['name'][$key];
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
$actual_pic3=$ran.'mm.'.$ext;
$actual_pic4=$ran.'v.'.$ext;
$actual_pic7=$ran.'a.'.$ext;

 if(move_uploaded_file($_FILES['uploadpic']['tmp_name'][$key], $target_path)) {


$uidp=$uid.'p';

$rhelper_jsv="";
include("add_photos/include.php");


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$result = mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='Profile Pictures'");
while($ms = mysql_fetch_array($result))
  {
$selected_album=$ms['sbid'];
$albumn=$ms['albumn'];
}





$thumbnail=$ran.'th.'.$ext;


$uidp=$uid.'p';
$uida=$uid.'a';




$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$r=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$selected_album' ORDER BY norder DESC");
while($m=mysql_fetch_array($r)){
$pid=$m['sbid'];
$mnorder=$m['norder']+1;
mysql_query("UPDATE media SET norder='$mnorder',oldorder='$mnorder' WHERE sbid='$pid' AND id='$uid'");
}

$norder=1;




$location='';

$img3=$root."/users/$uid/pics/".$actual_pic7;
$img4=$root."/users/$uid/pics/".$actual_pic3;
$thumbnailv=$root."/users/$uid/pics/".$thumbnail;
copy($img3,$img4);
$copiedvv=$img4;

$size=getimagesize($img4);
$width=$size[0];
$height=$size[1];

include("add_photos/default_profile_picture_crop.php");

$height=$aheight;
$width=$awidth;


$thumbnail=$thumbnail;

include("make50pixelsthumbnail.php");
}

$imgcr='users/'.$uid.'/pics/'.$actual_pic3;
$pp=pathinfo($imgcr);
$extv=$pp['extension'];
$ext='a.'.$extv;
$ext2='th.'.$extv;
$basename=$pp['basename'];
$basename=str_replace($ext,"",$basename);
$basename=str_replace($ext2,"",$basename);
$basename=$basename.'th'.'.'.$extv;
$imgcr2n=$basename;
$basename='users/'.$uid.'/pics/'.$basename;
$imgcr2=$basename;
$size=getimagesize($imgcr);
$imgcrwidth=$size[0];
$imgcrheight=$size[1];
$imgcrwidthv=round($imgcrwidth/2);
$imgcrheightv=round($imgcrheight/2);
$actual_profilept='users/'.$uid.'/pics/'.$actual_pic;
$size=getimagesize($actual_profilept);
$imgcrwidth2=$size[0];
$imgcrheight2=$size[1];
$imgcrpwidth=$imgcrwidth*100/$imgcrwidth2;
$imgcrpwidth2=$imgcrwidth*100/$imgcrpwidth;
$imgcrpheight=$imgcrheight*100/$imgcrheight2;
$imgcrpheight2=$imgcrheight*100/$imgcrpheight;





if($albumn=='Profile Pictures'){
mysql_query("UPDATE registered SET profilepic='$actual_pic7',profilepict='$thumbnail' WHERE id='$uid'");
mysql_query("UPDATE options SET lcords='', tcords='' WHERE id='$uid'");
	}
	
	$descr='';
include("stories/media_insert.php");

$photoid=mysql_insert_id();
$likeid=$photoid;
$ltype='photo';
include("stories/like_insert.php");

mysql_query("UPDATE albums SET datetimep=UNIX_TIMESTAMP(),album_cover='' WHERE sbid='$selected_album' AND id='$uid'");



mysql_close($con);




echo'
<script type="text/javascript">';

$suc=$actual_pic4.'{}'.$height.'{}'.$photoid.'{}'.$actual_pic4.'{}'.$actual_pic.'{}'.$selected_album.'{}'.$albumn.'{}'.$actual_pic.'{}'.$actual_pic2.'{}'.$actual_pic7.'{}'.$actual_pic4.'{}'.$photoid.'{}'.$location.'{}'.$height.'{}'.$width.'{}'.$heightv.'{}'.$widthv.'{}'.$imgcrwidthv.'{}'.$imgcrheightv.'{}'.$imgcrwidth.'{}'.$imgcrheight.'{}'.$imgcr.'{}'.$actual_profilept.'{}'.$imgcr2.'{}'.$imgcr2n.'{}'.$imgcrpwidth.'{}'.$imgcrpheight.'{}'.$actual_pic3;

echo'
updateu("'.$suc.'");
</script>
';







}



exit();
$var1="y";
?>
<?php include("end.php"); ?>