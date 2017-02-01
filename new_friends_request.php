<?php
$x=0;
$y=0;
$r=0;
$dname=array();
$demail=array();
$demail2=array();
$dfullname=array();
$dprofilepic=array();
$did=array();
foreach($contact as $remail => $rname) {
if($remail==$_POST['email']){}
else{$r++;}	
}
foreach($contact as $remail => $rname) {
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
if($remail==$_POST['email']){$found='';}
$result=mysql_query("SELECT * FROM registered WHERE email='$remail'");
while($ms=mysql_fetch_array($result)){
$didv=$ms['id'];
$result2=mysql_query("SELECT * FROM friends WHERE id='$uid' AND id2='$didv'");
$counti=mysql_num_rows($result2);
if($counti>0 OR $didv==$uid){}
else if(!isset($_POST['step3'])){
$demail[$x]=$ms['email'];
$dfullname[$x]=$ms['fullname'];
$dprofilepic[$x]=$ms['profilepict'];
$did[$x]=$ms['id'];
$x++;
}
$found='';	
}
if(isset($found)){unset($found);}
else{
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
$result=mysql_query("SELECT * FROM invited WHERE cemail='$remail'");
$counti=mysql_num_rows($result);
if($counti>0){}
else{
$dname[$y]=$rname;	
$demail2[$y]=$remail;
$y++;
}
}
}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
if($r>0){
if($x>0){
include("step2.php");
echo'{}';
if($y=="0"){$bd='';}
include("step3.php");
}
else{
if($y=="0"){if(isset($_POST['step3'])){$bd=''; include("step3.php");}else{echo'n2';}}
else{
include("step3.php");	
}
}
}
else{if(isset($_POST['step3'])){$bv=''; include("step3.php");}else{echo'n3';}}
?>