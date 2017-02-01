<?php
if(!isset($nostart)){ //comes from settings change password
include("start.php");
} 
else{ //comes from forgotten password instead of settings change password
session_start();
include("php_safety.php");
foreach($_POST as $k=>$v){
${$k}=$v;	
}
if($u_0_1!=""){
$logout_devices=1;
}
else{
$logout_devices=0;	
}
$uid=$_POST['u'];
$dk=$_POST['n'];

}
?>
<?php
if(isset($nostart)){
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
$r=mysql_query("SELECT * FROM reset_password WHERE id='$uid' AND dk='$dk' AND visibility='v'");
$c=mysql_num_rows($r);
if($c==0){exit();}
}

$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$pass=$m['password'];	
}

//error function that also takes a key to notice js which type of error it is in order to fill any of the three divs
function error($w){
echo json_encode($w);
exit();
}

//error keys content

$error[1]["error"]='<span class="passwordn" style="display:inline-block;top: -17px;" id="colorerr4_6v"><span class="passwordnv"><i class="passwordnvv"></i>Your password was incorrect.</span></span>'; 
$error[4]["errorv"]='<span class="passwordn" style="display:inline-block;top: -17px;" id="colorerr4_5v"><span class="passwordnv"><i class="passwordnvv"></i>You cannot use a blank password.</span></span>';
$error[5]["errorv"]='<span class="passwordn" style="display:inline-block;top: -17px;" id="colorerr4_7v"><span class="passwordnv"><i class="passwordnvv"></i>Password must be at least 6 characters long.</span></span>';
$error[6]["errorv"]='<span class="passwordn" style="display:inline-block;top: -17px;" id="colorerr4_8v"><span class="passwordnv"><i class="passwordnvv"></i>Password must differ from old password.</span></span>';
$error[2]["errorvv"]='<span class="passwordn" style="display:inline-block;visibility:visible;top: -17px;" id="colorerr4_4v"><span class="passwordnv"><i class="passwordnvv"></i>You must enter the same password twice in order to confirm it.</span></span>';

if($npass==""){error($error[4]);}
if(strlen($npass)<6){error($error[5]);}
if($npass!=$npassr){error($error[2]);}

include("salt.php");
if(isset($nostart)){
$password=$npass; //store without being crypted as if it were entered by user for login
}
$npass=crypt($npass,$salt);

if(!isset($nostart)){
$opass=crypt($opass,$salt);
if($opass!=$pass){error($error[1]);}
}

if($npass==$pass){error($error[6]);}

mysql_query("UPDATE registered SET password='$npass' WHERE id='$uid'");
mysql_query("UPDATE optionsv SET dt_password_change=UNIX_TIMESTAMP() WHERE id='$uid'");

if(!isset($nostart)){
$dparams["ok"]="t";
echo json_encode($dparams);
}

if(isset($nostart)){
mysql_query("UPDATE reset_password SET visibility='d' WHERE id='$uid' AND dk='$dk'");
$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$email=$m['email'];	
}
$_POST['keep_me_logged_in']=1;
$keep_me_logged_in=1;
include("components/login.php");
}
?>
<?php include("end.php"); ?>