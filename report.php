<?php  
include("start.php");
?>
<?php
$uidv=$_POST['w'];
$likeid=$_POST['id'];
$whatisit=$_POST['i'];

$result=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($ms=mysql_fetch_array($result)){
$name=$ms['f_name'];
$unv=$ms['username'];
if($unv==""){$unv=$uidv;}	
}

if(isset($_GET['u4'])){
mysql_query("UPDATE hidden_stories SET hidden='0' WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");	
mysql_close($con);
exit();	
}

if(isset($_GET['u3'])){
mysql_query("UPDATE hidden_stories SET hidden='0' WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");	
$result=mysql_query("SELECT * FROM report WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uidv'");
$c=mysql_num_rows($result);
if($c==0){exit();}
while($ms=mysql_fetch_array($result)){
$count=$ms['count2'];
$count--;	
mysql_query("UPDATE report SET count2='$count' WHERE likeid='$likeid' AND whatisit='$whatisit'");
}

mysql_close($con);
exit();	
}

if(isset($_GET['u2'])){

$ids=explode(',',$likeid);
foreach($ids as $key=>$likeid){

if($likeid!=""){
mysql_query("UPDATE hidden_stories SET hidden='0' WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");	

if(isset($_POST['dc'])){

$result=mysql_query("SELECT * FROM report WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uidv'");
$c=mysql_num_rows($result);
if($c==0){exit();}

while($ms=mysql_fetch_array($result)){
$count=$ms['count2'];
$count--;	
mysql_query("UPDATE report SET count2='$count' WHERE likeid='$likeid' AND whatisit='$whatisit'");
}

}

}

}
mysql_close($con);
exit();	
}
if(isset($_GET['u']) || isset($_POST['u'])){

mysql_query("UPDATE hidden_stories SET hidden='0' WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");
$r=mysql_query("SELECT * FROM report WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uidv'");
$c=mysql_num_rows($r);
if($c==0){exit();}
while($ms=mysql_fetch_array($r)){
$count=$ms['count2'];
$count--;
mysql_query("UPDATE report SET count2='$count' WHERE likeid='$likeid' AND whatisit='$whatisit'");
}

mysql_close($con);
exit();	
}

echo $name.'{}'.$unv;

if(isset($_GET['p'])){

$ids=explode(',',$likeid);
foreach($ids as $key=>$likeid){

if($likeid!=""){

$r=mysql_query("SELECT * FROM hidden_stories WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO hidden_stories (id,hidden,likeid,whatisit,datetimep)
VALUES ('$uid','1','$likeid','$whatisit',UNIX_TIMESTAMP())");
}
else{
while($m=mysql_fetch_array($r)){
if($m['hidden']==1){exit();} //already hidded this story	
else{
mysql_query("UPDATE hidden_stories SET hidden='1' WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");	
}

}
}


$result=mysql_query("SELECT * FROM report WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uidv'");
$c=mysql_num_rows($result);
if($c==0){exit();}

while($ms=mysql_fetch_array($result)){
$count=$ms['count2'];
$count++;
if($count=="10"){
	$incp='delete/small_del/p.php';		
	include("$incp");
}
else{
mysql_query("UPDATE report SET count2='$count' WHERE likeid='$likeid' AND whatisit='$whatisit'");
}
}


}

}

mysql_close($con);
exit();	
}

if(isset($_GET['m'])){

$ids=explode(',',$likeid);
foreach($ids as $key=>$likeid){

if($likeid!=""){

$r=mysql_query("SELECT * FROM hidden_stories WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO hidden_stories (id,hidden,likeid,whatisit,datetimep)
VALUES ('$uid','1','$likeid','$whatisit',UNIX_TIMESTAMP())");
}
else{
while($m=mysql_fetch_array($r)){
if($m['hidden']==1){exit();} //already hidded this story	
else{
mysql_query("UPDATE hidden_stories SET hidden='1' WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");	
}

}
}	

}

}
mysql_close($con);
exit();
}


$r=mysql_query("SELECT * FROM hidden_stories WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO hidden_stories (id,hidden,likeid,whatisit,datetimep)
VALUES ('$uid','1','$likeid','$whatisit',UNIX_TIMESTAMP())");
}
else{
while($m=mysql_fetch_array($r)){
if($m['hidden']==1){exit();} //already hidded this story	
else{
mysql_query("UPDATE hidden_stories SET hidden='1' WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uid'");	
}

}
}

if(isset($_GET['o'])){
mysql_close($con);
exit();
}

$result=mysql_query("SELECT * FROM report WHERE likeid='$likeid' AND whatisit='$whatisit' AND id='$uidv'");
$c=mysql_num_rows($result);
if($c==0){exit();}

while($ms=mysql_fetch_array($result)){
$count=$ms['count2'];
$count++;
if($count=="10"){
	if($whatisit=='shared_album' OR $whatisit=='shared_photo' OR $whatisit=='shared_status_update' OR $whatisit=='shared_notes'){$incp='delete/small_del/s.php';}
	else if($whatisit=="photo"){
	$incp='delete/small_del/p.php';
	}
	else{
	$incp='delete/small_del/'.$whatisit.'.php';		
	}
	include("$incp");
}
else{
mysql_query("UPDATE report SET count2='$count' WHERE likeid='$likeid' AND whatisit='$whatisit'");
}
}

?>
<?php include("end.php"); ?>