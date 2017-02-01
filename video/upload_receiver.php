<?php
session_start();
include("start.php");
if(!isset($privacy)){ //does not come in when uploading via the upload video page, only comes in through wall uploader

$albumn="Videos";
$ltypev="media";

$uidv=$uid;
$sbid="";

include("buttons/privacy_retrieve.php");

}
?>
<?php
$uidv=$uid;
function genRandomString($length) {
    $characters='0123456789abcdefghijklmnopqrstuvwxyz';
    $string='';    

    for ($p=0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}

$uida=$uid.'a';
$uidp=$uid.'p';

$fieldname='uploadedfile';

$var1="n";

if(isset($_POST['submit2'])){
	
	
	$active_keys=array();
foreach($_FILES[$fieldname]['name'] as $key => $filename)
{
	if(!empty($filename))
	{
		$active_keys[]=$key;
	}
}


/*
function error($p1,$p2){
echo'{}e';
return true;	
}

$old_error_handler = set_error_handler("error");
*/


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
	
	
	$tp="../users/$uid/vids";
	
	$ufile=$_FILES['uploadedfile']['name'][$key];
$path_parts=pathinfo("$ufile");

$filesize=$_FILES['uploadedfile']['size'][$key];

if($filesize>1073741824){
exit();	
}



	$ext=$path_parts['extension']; 

$ran=genRandomString(25);
$ran2=$ran.".";
$top="../users/$uid/vids/";
$tp=$top.$ran2.$ext; 

$vidso=$ran2.$ext;

$dk=$_POST[ini_get("session.upload_progress.name")];



$cl_dk="upload_cl_".$dk;
$dk2v=$_POST['dk2'].'v';

	 if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'][$key], $tp)) {	

$insert_dk='insert'.$dk;
if(!isset($_SESSION[$insert_dk])){

    $pinboard=1;
    
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='Videos'");
$c=mysql_num_rows($r);
if($c==0){
$privacy=0;
$privacyh="";
mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp) VALUES('$uid','Videos','','','v','','1000000000','1000000000','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),'')");


$albumid=mysql_insert_id();

$likeid=$albumid;
$ltype='album';
include("stories/like_insert.php");
}
$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='Videos'");
while($m=mysql_fetch_array($r)){
$albumid=$m['sbid'];	
}



$sbidv=$dk;
$r=mysql_query("SELECT * FROM media WHERE sbidv='$sbidv' AND id='$uid'");
$c=mysql_num_rows($r);




if($c==0){
$r=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$albumid' and visibility!='d' ORDER BY norder DESC LIMIT 1");
$c2=mysql_num_rows($r);
if($c2==0){$norder=0;}
else{
while($m=mysql_fetch_array($r)){
$norder=$m['norder'];	
}
}
$norder=$norder+1;

if(isset($_POST['location'])){
$location=$_POST['location'];
}
else{$location='';}
if(isset($_POST['description'])){
$descr=$_POST['description'];}
else{$descr='';}

if(isset($_POST['notify'])){
$notify=$_POST['notify'];	
}
else{$notify='';}

$title='';
$nye='2';

include("stories/media_insert.php");

$photoid=mysql_insert_id();

$likeid=$photoid;
$ltype='photo';
include("stories/like_insert.php");
}
else{
mysql_query("UPDATE media SET vids='',vidshd='',vidso='$vidso',nye='2' WHERE sbidv='$sbidv' AND id='$uid'");	
$r=mysql_query("SELECT * FROM media WHERE sbidv='$sbidv' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$photoid=$m['sbid'];	
}
}
}
 
$_SESSION[$cl_dk]=$filesize;
$_SESSION[$dk2v]=100;



}


$dk2=$_POST['dk2'];

if(isset($_POST['form_location']) && $_POST['form_location']=="window.opener"){

$owner=$uid;

$posted=array();

$posted['tags']=$_POST['tags'];

$key_name=array();
$key_name['tags']='activities';

$sbid=$photoid;

$sflag="wv";
include("tags/insert_tags_with.php");	
}

echo $vidso.':'.$photoid.':'.$dk.':'.$dk2;

}

exit();
$var1="y";
}

else{$var1="n";}


if($var1=="n"){

}
?>
<?php include("end.php"); ?>


