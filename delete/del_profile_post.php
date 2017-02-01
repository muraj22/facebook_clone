<?php  
ignore_user_abort(true);
include("start.php");
?>
<?php 
$id=$_POST['id'];
$taste=$_POST['taste'];



if($taste=='spokenl'){
if(strpos($id,",")!==false){
$id=explode(",",$id);
foreach($id as $k=>$v){
if($v!=''){
mysql_query("UPDATE languages SET visibility='h' WHERE sbid='$v' AND id='$uid'");	
}
}
}
else{
mysql_query("UPDATE languages SET visibility='h' WHERE sbid='$id' AND id='$uid'");	
}
}
else if($taste=='inspirations'){
if(strpos($id,",")!==false){
$id=explode(",",$id);
foreach($id as $k=>$v){
if($v!=''){
mysql_query("UPDATE inspirational SET visibility='h' WHERE sbid='$v' AND id='$uid'");
}
}
}
else{
mysql_query("UPDATE inspirational SET visibility='h' WHERE sbid='$id' AND id='$uid'");	
}
}
else if($taste=='living'){
mysql_query("UPDATE living SET visibility='h' WHERE id='$uid' AND sbid='$id'");
}
else if($taste=='relationship_s'){
mysql_query("UPDATE relationship SET visibility='h' WHERE sbid='$id' AND id='$uid'");	
}
else{
if(strpos($id,",")!==false){
$id=explode(",",$id);
foreach($id as $k=>$v){
if($v!=''){
mysql_query("UPDATE tastes SET visibility='h' WHERE sbid='$v' AND id='$uid'");		
}
}
}
else{
mysql_query("UPDATE tastes SET visibility='h' WHERE sbid='$id' AND id='$uid'");	
}
}

?>
<?php include("end.php"); ?>