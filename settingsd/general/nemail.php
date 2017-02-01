<?php include("start.php"); ?>
<?php
$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$pasbase=$m['password'];
}
if($action!=1){
	include("salt.php");
	$pass=crypt($pass,$salt);
	if($pass!=$pasbase){echo 'e3'; mysql_close($con); exit();}
	if(!empty($remove_emails)){
include("remove_emails.php");
include("set_primary_email.php");
echo 'ok';
mysql_close($con); exit();
}
include("set_primary_email.php");
echo 'ok';
}
else{
if($nemail==""){echo 'e'; mysql_close($con); exit();}

if(strlen($nemail)>74){echo 'e'; mysql_close($con); exit();}
if(!filter_var($nemail, FILTER_VALIDATE_EMAIL)){echo 'e'; mysql_close($con); exit();}

//You have already added this email address.
$r=mysql_query("SELECT * FROM contact_emails WHERE email='$nemail' AND confirmed='c' AND visibility='v'");
$c=mysql_num_rows($r);
if($c>0){echo 'e2'; mysql_close($con); exit();}

if(!isset($nopass)){ //comes from header link to change the very first time email
	include("salt.php");
	$pass=crypt($pass,$salt);
if($pass!=$pasbase){echo 'e3'; mysql_close($con); exit();}
}

	if(!empty($remove_emails)){
include("remove_emails.php");	
}

function genRandomString($length) {
	$characters=array();
    $characters[1]= 'abcdefghijklmnopqrstuvwxyz';
	$characters[2]= strtoupper($characters[1]);
	$characters[3]='23456789_';
	
    $string='';    

    for ($p = 0; $p < $length; $p++) {
		$ulv=rand(1,1000);
		if($ulv<=200){
		$ul=3;	
		}
		else if($ulv>200 AND $ulv<=710){
		$ul=2;
		}
		else{
		$ul=1;	
		}
		
        $string.= $characters[$ul][mt_rand(0, strlen($characters[$ul]) -1)];
    }

    return $string;
}

function genRandomStringn($length) {
    $characters = '23456789';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    $string=strtoupper($string);
    return $string;
}


include("set_primary_email.php");

mysql_select_db("modules");
$r=mysql_query("SELECT * FROM sb_emails WHERE email='$nemail' AND email_c='c'");
$c=mysql_num_rows($r);
if($c>0){echo $nemail.'<-ok'; mysql_close($con); exit();}


$gfid=grs(16);
$c=grsn(6);

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
mysql_query("INSERT INTO nemailk (id,email,nemailk,nemailkh,datetimep)
VALUES ('$uid','$nemail','$gfid','$c',UNIX_TIMESTAMP())");

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

mysql_query("UPDATE contact_emails SET visibility='d' WHERE id='$uid' AND confirmed='u' AND visibility='v'");
$privacy=0;
$privacyh="";
mysql_query("INSERT INTO contact_emails(id,email,primary2,confirmed,visibility,privacy,privacyh,datetimep) VALUES('$uid','$nemail','','u','v','$privacy','$privacyh',UNIX_TIMESTAMP())");

mysql_select_db("modules");
mysql_query("DELETE FROM sb_emails WHERE id='$uid' AND email_c='u'");
mysql_query("INSERT INTO sb_emails (id,email,email_p,email_c,datetimep) VALUES('$uid','$nemail','','u',UNIX_TIMESTAMP())");


//should be removed start - it has been removed
/*
mysql_select_db("modules");

$r=mysql_query("SELECT * FROM nemailk WHERE nemailk='$gfid' AND nemailkh='$c'");
while($m=mysql_fetch_array($r)){
$aemail=$m['email'];	
}

mysql_query("DELETE FROM nemailk WHERE nemailk='$gfid' AND nemailkh='$c'");

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

mysql_query("UPDATE contact_emails SET confirmed='c' WHERE id='$uid' AND email='$aemail' AND visibility='v'");
*/
//should be removed end

mysql_select_db("registered");

if(isset($nopass)){ //comes from changing email when first registered
mysql_query("UPDATE registered SET email='$nemail' WHERE id='$uid'");
mysql_query("UPDATE registration_keys SET email='$nemail' WHERE id='$uid'");
include("initial_confirmation_email.php"); 
}	
else{
include("confirmation_email.php"); 
}

echo $nemail.'->';

echo'ok';
}

?>
<?php include("end.php"); ?>