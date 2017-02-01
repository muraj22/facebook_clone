<?php  
include("start.php");
?>
<?php
$elemid=$_POST['elemid'];
$uidv=$_POST['uidv'];
$whatisit=$_POST['w'];
$valu=$_POST['valu'];

if(isset($_POST['photoid'])){ //when $_POST photoid is set it means that type is album and photoid is the sbid of the photo that user choose to make the share
//of the album with
$photoid=$_POST['photoid'];	
}
else{
$photoid="";	
}


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$privacyh="";

$r=mysql_query("SELECT * FROM shares WHERE id='$uid' AND whatisit='$whatisit' AND elemid='$elemid'");
$c=mysql_num_rows($r);
if($c>1){ //allows for up to 2 shares for the same story
while($m=mysql_fetch_array($r)){
mysql_query("UPDATE shares SET visibility='v' WHERE id='$uid' AND whatisit='$whatisit' AND elemid='$elemid'");	
}
}
else{
mysql_query("INSERT INTO shares (id,id2,elemid,photoid,whatisit,valu,visibility,privacy,privacyh,datetimep) 
VALUES('$uid','$uidv','$elemid','$photoid','$whatisit','$valu','v','$privacy','$privacyh',UNIX_TIMESTAMP())"); //photoid has to do with whether the share is a share of an album
if($whatisit=="shared_photo"){

$uti=sb_user($uid);

$r=mysql_query("SELECT * FROM lists_members WHERE id2='$uid' AND visibility='v'");
while($m=mysql_fetch_array($r)){
//mail cuando tenga la photo view completita sin ser via gallery viewer
}

}
}

$likeid=mysql_insert_id();

$ltype=$whatisit;
include("stories/like_insert.php");


include("end.php");
?>