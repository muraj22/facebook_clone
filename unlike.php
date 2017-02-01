<?php
ignore_user_abort(true);
//if(isset($_POST['fr']) && $_POST['fr']=="nf"){

header('HTTP/1.0 204 No Content');
header('Content-Length: 0',true);
header('Content-Type: text/html',true);
flush();		
include("start.php");
?>
<?php
$whatisit=$_POST['whatisit'];
$uidv=$_POST['uidv'];

if(isset($_POST['albumid'])){
$albumid=$_POST['albumid'];	
}else{$albumid='';}

if(isset($_POST['lpid'])){
$lpid=$_POST['lpid'];

$r=mysql_query("SELECT * FROM likew WHERE likeid='$lpid' AND what='$whatisit' AND id2='$uid' AND likes='1'");
$c=mysql_num_rows($r);

if($c>0){
mysql_query("UPDATE likew SET likes='0' WHERE likeid='$lpid' AND what='$whatisit' AND id2='$uid'");

$r=mysql_query("SELECT * FROM likes WHERE likeid='$lpid' AND what='$whatisit'");
while($m=mysql_fetch_array($r)){
$cb=$m['count'];
$cb=$cb-1;
mysql_query("UPDATE likes SET count='$cb' WHERE likeid='$lpid' AND what='$whatisit'");
}

}


} //end $_post['lpid'];

?>
<?php
if($whatisit=='album'){$r='r';}
else{$r='';}

$ltype=$whatisit;
$wp_table='like';
$likeid=$lpid;
$owner_c=$uidv;

include("stories/with_plugin.php");

if($tr==1 && $wp_me!="me"){
$ps='s';
}
else{$ps='';}

if($ltype=="comment"){
echo $with;
}
else if($with!=""){
echo $with.' like'.$ps.' this.'; 
}
else{
echo $with;	
}

include("end.php");
?>