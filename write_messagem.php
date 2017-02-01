<?php
include("start.php");
$currentdir=getcwd(); 
$uidv=$uid; 

if(isset($_POST['message'])){

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

include("chatupd.php");

$message=$_POST['message'];

$p=array();
$p['m']=$message;

if(isset($_POST['to'])){
$to=$_POST['to'];
}
else{
$to=$_POST['tags']; //sending as tagmsg random string [to allow for multiple instances]
}

$tov=explode(",",$to);

foreach($tov as $key=>$value){
if($value!=""){


if(strpos($value,'_arroba_arroba_')===false){
$valuev=$value;	
}
else{
$value=str_replace("_arroba_arroba_","@",$value);
$value=str_replace("_punto_punto_",".",$value);


$result = mysql_query("SELECT * FROM registered WHERE email='$value'");
while($ms = mysql_fetch_array($result)){
$valuev=$ms['id'];	
}
	
}

if(isset($valuev)){

$uidv=$valuev;

$read_id=1;
$read_idv=0;

if(isset($fundsv)){
if(!is_numeric($fundsv)){
exit();	
}

if($fundsv<1){
exit();	
}

$r=mysql_query("SELECT * FROM bank WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$amount=$m['amount'];	
}
if($fundsv>$amount){
exit();	
}

$fee=$fundsv/100*3;
$fundsvv=$fundsv; //original funds amount
$fundsv=$fundsv+($fundsv/100*3); //plus 3 percent
$new_amount=$amount-$fundsv;

mysql_query("UPDATE bank SET amount='$new_amount' WHERE id='$uid'");

mysql_query("INSERT INTO transactions (id,id2,amount,fee,datetimep) VALUES('$uid','$uidv','$fundsvv','$fee',UNIX_TIMESTAMP())");
$r=mysql_query("SELECT * FROM bank WHERE id='$uidv'");
while($m=mysql_fetch_array($r)){
$amount=$m['amount'];	
}

$new_amount=$amount+$fundsv;
mysql_query("UPDATE bank SET amount='$new_amount' WHERE id='$uidv'");


}

if($message!=""){
$dea=mysql_query("INSERT INTO commentsvv (id,id2,comment,dread_id,dread_id2,source,status_id,status_id2,visibility_id,visibility_id2,datetimep,datetimepr) VALUES('$uid','$uidv','$message','$read_id','$read_idv','0','0','0','v','v',UNIX_TIMESTAMP(),NULL)");
}
var_dump($dea);

unset($valuev);
}
else{
$uti=sb_user($uid);
$uti['s']="Conversation with ".$uti['fullname'];
$p['f']=$uti['fullname'];
$p['e']=$uti['email'];
$p['t']=$value;
sbmail($p);
}
}
	
}



mysql_close($con);
}



?>