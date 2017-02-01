<?php
include("start.php");
ignore_user_abort(true);
?>
<?php
function rtd($date){$date=tod($date);
  return date('l, F j, Y \a\t g:ia', strtotime($date));
}


$ltype=$_POST['variation'];

$comments_table_belong=array();
$comments_table_belong[]="photo";
$comments_table_belong[]="album";
$comments_table_belong[]="shared_album";	
$comments_table_belong[]="shared_photo";	
$comments_table_belong[]="shared_video";

if(in_array($ltype,$comments_table_belong)){
$table="comments";	
$ltypev="comment";
}
else{
$table="commentsv";	
$ltypev="commentv";
}
//definir cual de las dos tables en base a $ltype

$uidv=$_POST['uidv'];
$thecomment=$_POST['comment'];
$elemid=$_POST['sbid'];


$whos=$uidv;

mysql_query("INSERT INTO $table(id, id2, comment, elemid, visibility, type, datetimep)
VALUES ('$uid','$uidv','$thecomment','$elemid','v','$ltype',UNIX_TIMESTAMP())");


$likeidgen=mysql_insert_id();
$likeid=$likeidgen;

$ltype=$ltypev;
include("stories/like_insert.php");



$result=mysql_query("SELECT * FROM $table WHERE sbid='$likeidgen'");
while($ms=mysql_fetch_array($result)){
$actual_time=$ms['datetimep'];	
}

mysql_close($con);

//if($f=="f"){$dw=355; $dwv=117;}
//else if($f=="fv"){$dw=355; $dwv=77;}
//else{$dw=400; $dwv=78;}

$thecomment=checkforsmileys($thecomment);


/*
echo $secho;

echo'</div></td></tr></table></td></tr></table>';
*/

$commentid=$likeidgen;

$response=array();

$response['sbid']=$commentid;
$response['utime']=$actual_time;
$response['rtd']=rtd($actual_time);

echo json_encode($response);
?>
<?php include("end.php"); ?>