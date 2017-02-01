<?php
include("start.php"); 
?>
<?php
function rtd($date){$date=tod($date);
  return date('l, F j, Y \a\t g:ia', strtotime($date));
}
include("functions/td.php");	

include("master/stories/status_update.php");

$sbid=$likeidgen;

$albumid=$uid;

$owner=$uid;

$posted=array();

$posted['tags']=$_POST['tagswall_uploader'];

$key_name=array();
$key_name['tags']='activities';

$sflag='tw';

include("tags/insert_tags_with.php");

echo $dr[$ix].'{}'.$ix.'{}'.'t:'.$likeidgen;
?>
<?php include("end.php"); ?>