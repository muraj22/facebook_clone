<?php  
if(!isset($_SESSION)){
session_start();	
}
unset($_SESSION["login_error_storage"]);
unset($_SESSION["login_error_email"]);
if(!isset($nostart)){ //comes from forgotten password
if(!isset($_POST['srv'])){
exit();
}
$c=$_POST['srv'];
 //login typycal key
//in order to bypass you must know a valid server session which also has a 0 as its sixth caracter and has a 1 as its 11th carachter, session which is never used, so
//it must be the only valid generated session for this reason - see security/provide_pass.php

/*re add later, conflict specifically in chrome

if(!isset($_POST[$c]) || !isset($_SESSION[$c]) || $_POST[$c]!=$_SESSION[$c]){
print_r($_SESSION);
exit();
}
*/
session_write_close();
$pos_one=substr($c,5,1);
$pos_two=substr($c,10,1);
if($pos_one!=0 || $pos_two!=1){
exit();	
}
$sc=$c; //sc stands for special c see below on keys
if(!isset($reginc)){
include("php_safety.php");
foreach($_POST as $k=>$v){
${$k}=$v;	
}
}

$email=$_POST['login_email'];
$password=$_POST['login_password'];

if(isset($_POST['keep_me_logged_in'])){
$keep_me_logged_in=$_POST['keep_me_logged_in'];
}else{$keep_me_logged_in='';}

}// end if !isset nostart

//echo $email.' '.$password;
?>
<?php
if(isset($_SESSION)){
session_write_close();
}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$salt="822643343315848aca";
$ep=crypt($password,$salt);


$r = mysql_query("SELECT * FROM registered WHERE email='$email' AND password='$ep' LIMIT 1");
$c=mysql_num_rows($r);
if($c==0){
$r=mysql_query("SELECT * FROM registered WHERE email='$email'");
$c=mysql_num_rows($r);
if($c==0){
session_start();	
$_SESSION["login_error"]="wrong";
session_write_close();
$dparams["error"]="wrong";
echo json_encode($dparams);
exit();	
}
else{
session_start();	
$_SESSION["login_error"]="wrong_password";
$dparams["error"]="wrong_password";
$_SESSION["login_error_email"]=$email;
session_write_close();
echo json_encode($dparams);
exit();	
}
}
while($ms = mysql_fetch_array($r))
  {
 if($ms['email']==$email && $ms['password']==$ep){
$uidv=$ms['id'];
$unv=$ms['username'];

$uid=$uidv;
$value=$uidv;

$r2=mysql_query("SELECT * FROM options WHERE id='$uidv'");
while($m2=mysql_fetch_array($r2)){
$sctimezone=$m2['user_timezone'];
$sdaylight=$m2['user_timezone_daylight'];
}

if($_POST['keep_me_logged_in']=="1"){
$time_f_cookie=60*60*24*14;
setcookie("keep_me_logged_in",$value, time()+$time_f_cookie,"/");
}
else{
$time_f_cookie=60*60*24*2;	
}


$timezone=$_POST['user_timezone'];
$cdaylight=$_POST['daylight'];

$ctimezone=$timezone;
$octimezone=$timezone;


$ctimezone=str_replace("-","",$ctimezone);

$hours=$ctimezone;

if(strpos($hours,".")===true){
$split=explode(".",$hours);
$minutesv=explode(".",$hours);
$minutesv=".".$minutesv[1];
$minutesv=floatval($minutesv); //.755555
$minutesv=$minutesv*60;
if(strlen($minutesv)==1){
$minutesv='0'.$minutesv;	
}
$ctimezone=$split[0].':'.$minutesv;
}
else{
$ctimezone=$hours.':00';	
}

if(substr($octimezone,0,1)=="-"){
$ctimezone="-".$ctimezone;
}else{$ctimezone="+".$ctimezone;}


if($ctimezone!=$sctimezone || $daylight!=$sdaylight){
mysql_query("UPDATE options SET user_timezone='$ctimezone',original_user_timezone='$octimezone',user_timezone_daylight='$cdaylight',datetimep_user_timezone=UNIX_TIMESTAMP() WHERE id='$uid'");
}


$uid=$value;
$nusername=$unv;

if(!isset($_SESSION)){
session_start();	
}
include("cookies_reset.php");
$_SESSION['logged']=$uid;
session_write_close();


if(isset($logout_devices)){ //gets set when resetting password cause forgotten
mysql_query("UPDATE registered SET datetimepk=UNIX_TIMESTAMP()");
mysql_query("UPDATE optionsv SET logout_devices='$logout_devices' WHERE id='$uid'");
}

mysql_query("UPDATE registered SET status='1' WHERE id='$uid'");
mysql_query("UPDATE registered SET datetimepn=UNIX_TIMESTAMP(),datetimepl=UNIX_TIMESTAMP() WHERE id='$uid'");



$xoffline=0;
$offline=array();
$result2=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($ms2=mysql_fetch_array($result2)){
		if($xoffline>50){break;}
$friend=$ms2['id2'];
$result3=mysql_query("SELECT * FROM registered WHERE id='$friend'");
while($ms3=mysql_fetch_array($result3)){
if($ms3['status']=='2'){
	$offline[$xoffline]=$ms3['id'];
	$xoffline++;
	}	

}
unset($friend);
}

$uidcr=$uid.'cr';

$offline=array_unique($offline);

$xtochat=1;
$total=15;
while($xtochat<=$total){
	mysql_query("UPDATE $uidcr SET friends='NULL' WHERE primary2='$xtochat'");
	$xtochat++;
}

$xtochat=1;
foreach($offline as $key => $valuev){
	if($xtochat>15){break;}
mysql_query("UPDATE $uidcr SET friends='$valuev' WHERE primary2='$xtochat'");
$xtochat++;
}

mysql_close($con);

if(!isset($reginc)){
$dparams["success"]="t";
echo json_encode($dparams);
//header("Location: /"); no more post, all ajaxified :)
}
else{
$dparams["success"]="t";
echo json_encode($dparams);	
}

 break;}

  }

?> 