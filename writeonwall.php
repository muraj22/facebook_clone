<?php  
include("start.php");
?>
<?php
function turndate($date){$date=tod($date);
  return date('d m y', strtotime($date));
}

$message=$_POST['message'];
$uidv=$_POST['duser'];

$privacy=0;
$privacyh="";

mysql_query("INSERT INTO status (id,id2,text,location,visibility,cityc,countryc,statec,privacy,privacyh,datetimep)
VALUES ('$uid','$uidv','$text','$location','v','','','','$privacy','$privacyh',UNIX_TIMESTAMP())");

$likeidgen=mysql_insert_id();
$likeid=$likeidgen;
$ltype="status_update";
include("stories/like_insert.php");


$result=mysql_query("SELECT * FROM birthday_wrote WHERE id='$uid' AND id2='$uidv'");
$counti=mysql_num_rows($result);
if($counti>0){
while($ms=mysql_fetch_array($result)){
$datetime=$ms['datetimep'];
$datetime2=turndate($datetime);
$datetime2v=date("d m y");
if($datetime2==$datetime2v){$nj='';}
}
}
if(!isset($nj)){
mysql_query("INSERT INTO birthday_wrote (id,id2,statusid,datetimep)
VALUES ('$uid','$uidv','$likeid',UNIX_TIMESTAMP())");
}

echo'1';
?>