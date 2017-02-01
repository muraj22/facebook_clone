<?php include("start.php"); ?>
<?php
function genRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}
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
$target_path = "$uid/pics";


$ufile=$_FILES['uploadpic']['name'][$key];
$path_parts = pathinfo("$ufile");

$ext = $path_parts['extension']; 

$ran = genRandomString(25);
$ran2 = $ran.".";
$target_path1 = "users/$uid/pics/";
$target_path = $target_path1.$ran2.$ext; 
$target_paths = $target_path1.$ran.'v.'.$ext; 




 if(move_uploaded_file($_FILES['uploadpic']['tmp_name'][$key], $target_path)) {

$actual_pic=$ran2.$ext;
$uidp=$uid.'p';

$target_pathv=$target_path;
$target_pathvv=$target_paths;
$target_pathvvv='';

$size = getimagesize($target_pathv);
$width=$size[0];
$height=$size[1];
if(!isset($addphotosvar)){
include("classes/resizer.php");
}
if($width>1400){
$target_path2=$target_path1.$ran2.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->ToWidth(1400);
   $image->save("$target_path2");
}

$size = getimagesize($target_pathv);
$width=$size[0];
$height=$size[1];
$widthv=$size[0];
$heightv=$size[1];

if($height>960){
$target_path2=$target_path1.$ran2.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->ToHeight(960);
   $image->save("$target_path2");
}




$widthv=$size[0];
$heightv=$size[1];



if($width>290){
$target_path2=$target_path1.$ran.'v.'.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->ToWidth(290);
   $image->save("$target_path2");
}
else{
$target_path2=$target_path1.$ran.'v.'.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->save("$target_path2");	
}

$size = getimagesize($target_pathvv);
$width=$size[0];
$height=$size[1];

if($height>290){
$target_path2=$target_path1.$ran.'v.'.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->ToHeight(290);
   $image->save("$target_path2");	
}

$size = getimagesize($target_pathvv);
$width=$size[0];
$height=$size[1];

if($width>290){
$target_path2=$target_path1.$ran.'v.'.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->resize(290,290);
   $image->save("$target_path2");	
}

$size = getimagesize($target_pathvv);
$width=$size[0];
$height=$size[1];





$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$r=mysql_query("SELECT * FROM $uida WHERE albumn='Profile Pictures'");
while($m=mysql_fetch_array($r)){
$selected_album=$m['albumid'];	
}
$result = mysql_query("SELECT * FROM $uida");
while($ms = mysql_fetch_array($result))
  {
if($ms['albumid']==$selected_album){$albumn=$ms['albumn'];}
}

if($albumn=='Profile Pictures'){
$target_path2=$target_path1.$ran.'m.'.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->ToWidth(180);
   $image->save("$target_path2");
}

$size = getimagesize($target_pathv);
$widthvv=$size[0];
$heightvv=$size[1];
if($heightvv>180){
$target_path2=$target_path1.$ran.'mm.'.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->ToHeight(180);
   $image->save("$target_path2");
}
else{
$target_path2=$target_path1.$ran.'mm.'.$ext;
   $image = new resizer();
   $image->prepare("$target_path");
   $image->ToHeight(160);
   $image->save("$target_path2");	
}

$uidl=$uid.'l';
$uidwl=$uid.'wl';
$photoid=genRandomString(25);
$actual_pic2=$ran.'s.'.$ext;
$actual_pic3=$ran.'mm.'.$ext;
$actual_pic4=$ran.'v.'.$ext;





$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$result = mysql_query("SELECT * FROM $uida");
while($ms = mysql_fetch_array($result))
  {
if($ms['albumid']==$selected_album){$albumn=$ms['albumn'];}
}

if($albumn=='Profile Pictures'){
mysql_query("UPDATE registered SET profilepic='$actual_pic3',profilepict='$actual_pic3' WHERE id='$uid'");
	}
	
	
mysql_close($con);

$location='';

$imgcr='users/'.$uid.'/pics/'.$actual_pic3;
$pp=pathinfo($imgcr);
$extv=$pp['extension'];
$ext='mm.'.$extv;
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


echo'
<script type="text/javascript">';

$suc=$actual_pic4.'{}'.$height.'{}'.$photoid.'{}'.$actual_pic4.'{}'.$actual_pic.'{}'.$selected_album.'{}'.$albumn.'{}'.$actual_pic.'{}'.$actual_pic2.'{}'.$actual_pic3.'{}'.$actual_pic4.'{}'.$photoid.'{}'.$location.'{}'.$height.'{}'.$width.'{}'.$heightv.'{}'.$widthv.'{}'.$imgcrwidthv.'{}'.$imgcrheightv.'{}'.$imgcrwidth.'{}'.$imgcrheight.'{}'.$imgcr.'{}'.$actual_profilept.'{}'.$imgcr2.'{}'.$imgcr2n.'{}'.$imgcrpwidth.'{}'.$imgcrpheight;

echo'
updateu("'.$suc.'");
</script>
';

$uidl=$uid.'l';
$uidp=$uid.'p';
$uida=$uid.'a';




$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$r=mysql_query("SELECT * FROM $selected_album ORDER BY norder DESC");
while($m=mysql_fetch_array($r)){
$pid=$m['photoid'];
$mnorder=$m['norder']+1;
mysql_query("UPDATE $selected_album SET norder='$mnorder' WHERE photoid='$pid'");
mysql_query("UPDATE $selected_album SET oldorder='$mnorder' WHERE photoid='$pid'");	
}

$norder=1;

mysql_query("INSERT INTO $selected_album (albumid,albumn,pics,picss,picsm,picsr,descr,location,whos,photoid,norder,oldorder,visibility,datetimep)
VALUES ('$selected_album','$albumn','$actual_pic','$actual_pic2','$actual_pic3','$actual_pic4','','$location','$uid','$photoid','$norder','$norder','t',UNIX_TIMESTAMP())");

mysql_query("INSERT INTO $uidp (pics,picss,picsm,picsr,descr,location,whos,photoid,albumid,albumn,visibility,datetimep)
VALUES ('$actual_pic','$actual_pic2','$actual_pic3','$actual_pic4','','$location','$uid','$photoid','$selected_album','$albumn','t',UNIX_TIMESTAMP())");

mysql_query("INSERT INTO $uidl (likeid,count,what,datetimep)
VALUES ('$photoid','0','photo',UNIX_TIMESTAMP())");

mysql_query("UPDATE $uida SET datetimep=UNIX_TIMESTAMP() WHERE albumid='$selected_album'");

$target_path = "$uid/pics";


$ufile=$target_path.'/'.$actual_pic;
$path_parts = pathinfo("$ufile");

$ext = $path_parts['extension']; 
$rep='.'.$ext;

$ran = str_replace($rep,"",$path_parts['basename']);
$ran2 = $ran.".";
$target_path1 = "users/$uid/pics/";
$target_path = $target_path1.$ran2.$ext; 
$target_paths = $target_path1.$ran.'v.'.$ext; 

$target_pathv=$target_path;
$target_pathvv=$target_paths;
$target_pathvvv='';


$size = getimagesize($target_pathv);
$width=$size[0];
$height=$size[1];

$copiedv=$target_pathv;

$sizev=getimagesize($copiedv);

$widthvvv=$sizev[0];
$heightvvv=$sizev[1];

if($widthvvv<180 && $heightvvv<135){
	$resized='t';
   $copied2=$target_path1.$ran.'s.'.$ext;
      $image = new resizer();
   $image->prepare("$target_path");
   $image->resize(180,135);
   $image->save("$copied2");
   $donotcrop='';	
}
else if($widthvvv<180){
	$resized='t';
   $copied2=$target_path1.$ran.'s.'.$ext;
      $image = new resizer();
   $image->prepare("$target_path");
   $image->ToWidth(180);
   $image->save("$copied2");		
}
else if($heightvvv<135){
	$resized='t';
   $copied2=$target_path1.$ran.'s.'.$ext;
      $image = new resizer();
   $image->prepare("$target_path");
   $image->ToHeight(135);
   $image->save("$copied2");
}

if(!isset($resized)){
   $copied2=$target_path1.$ran.'s.'.$ext;
copy($target_path,$copied2);	
}
if(!isset($donotcrop)){
$asize=getimagesize($copiedv);
$awidthv=$asize[0];
$aheightv=$asize[1];
   $copiedvv=$target_path1.$ran.'s.'.$ext;
   $photo2 = new Photo(array("name"=>"$copiedvv","tmp_name"=>"$copiedvv"));  
   $awidth=floor($awidthv/100*90);
   $aheight=floor($aheightv/100*90);
   $left=floor($awidthv/100*5);
   $top=floor($aheightv/100*10);
   $photo2->doFullCrop($left,$top,$awidth,$aheight);
   
      $photo2 = new Photo(array("name"=>"$copiedvv","tmp_name"=>"$copiedvv"));  
   $awidth=floor($awidthv/100*90);
   $aheight=floor($aheightv/100*70);
   $left=0;
   $top=0;
   $photo2->doFullCrop($left,$top,$awidth,$aheight);

   $copied2=$target_path1.$ran.'s.'.$ext;
      $image = new resizer();
   $image->prepare("$copied2");
   $image->resize(180,135);
   $image->save("$copied2");
}
mysql_close($con);


}

}

exit();
$var1="y";
?>
<?php include("end.php"); ?>