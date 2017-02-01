<?php
/*
ignore_user_abort(true);
//if(isset($_POST['fr']) && $_POST['fr']=="nf"){

header('HTTP/1.0 204 No Content');
header('Content-Length: 0',true);
header('Content-Type: text/html',true);
flush();		
*/
include("start.php");
?>
<?php
echo'22';
$whatisit=$_POST['whatisit'];
$uidv=$_POST['uidv'];

if(isset($_POST['albumid'])){
$albumid=$_POST['albumid'];	
}else{$albumid='';}

if(isset($_POST['lpid'])){
$lpid=$_POST['lpid'];
echo'22';
$r=mysql_query("SELECT * FROM repinw WHERE likeid='$lpid' AND what='$whatisit' AND id2='$uid' AND repins='1'");
$c=mysql_num_rows($r);

if($c>0){
mysql_query("UPDATE repinw SET repins='0' WHERE likeid='$lpid' AND what='$whatisit' AND id2='$uid'");

$r=mysql_query("SELECT * FROM repins WHERE likeid='$lpid' AND what='$whatisit'");
while($m=mysql_fetch_array($r)){
$cb=$m['count'];
$cb=$cb-1;
mysql_query("UPDATE repins SET count='$cb' WHERE likeid='$lpid' AND what='$whatisit'");
}

}


} //end $_post['lpid'];

?>
<?php
if($whatisit=='album'){$r='r';}
else{$r='';}

$ltype=$whatisit;
$wp_table='repin';
$likeid=$lpid;
$owner_c=$uidv;

include("stories/with_plugin.php");

if($ltype=="comment"){
echo $with;
}
else if($with!=""){
echo $with.' repinned this.'; 
}
else{
echo $with;	
}

include("end.php");
?>