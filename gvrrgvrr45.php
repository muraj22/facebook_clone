<?php
if(isset($_GET['display'])){
include_once("index.php");
exit();
}
if(!isset($_SESSION)){
session_start();
}
include("php_safety.php");
include("functions/grs.php");

if(!isset($from_register)){
exit();	
}

foreach($_POST as $k=>$v){
${$k}=$v;
}

if(!isset($_POST['a'])){
exit();
}
if(!isset($_POST['sr'])){
exit();
}
if(!isset($_POST['srv'])){
exit();
}

$c=$_POST['a']; //register typycal key
//in order to bypass you must know a valid server session which also has a 0 as its sixth caracter and has a 1 as its 11th carachter, session which is never used, so
//it must be the only valid generated session for this reason - see security/provide_pass.php
//echo $_POST[$c].':'.$_SESSION[$c];

/* refix for chrome which has its errors
if(!isset($_POST[$c]) || !isset($_SESSION[$c]) || $_POST[$c]!=$_SESSION[$c]){
exit();
}
*/

$pos_one=substr($c,5,1);
$pos_two=substr($c,10,1);
if($pos_one!=0 || $pos_two!=1){
exit();
}

$sc=$c; //sc stands for special c see below on keys
$scv=$_POST['srv'];


if(!isset($_POST['publickey'])){
exit();
}
$publicKey = $_POST['publickey'];
$privateKey = 0.9;
$token = sha1( $publicKey * $privateKey + $privateKey );



if(!isset($_POST['token'])){
exit();
}
if($token!=$_POST['token']){
$exit();
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

date_default_timezone_set("UTC");

function genRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$string = '';

		for ($p = 0; $p < $length; $p++) {
				$string .= $characters[mt_rand(0, strlen($characters) -1)];
		}
		$string=strtoupper($string);
		return $string;
}

function genRandomStringn($length) {
		$characters = '3456789';
		$string = '';

		for ($p = 0; $p < $length; $p++) {
				$string .= $characters[mt_rand(0, strlen($characters) -1)];
		}
		$string=strtoupper($string);
		return $string;
}


if($gender_female=="1"){$gender=1; $wincognito='incognitof.gif';}
elseif($gender_male=="2"){$gender=2; $wincognito='incognitom.gif';}

$fullname=$_POST['f_name'].' '.$_POST['l_name'];

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$email=$_POST['email'];

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
mysql_query("DELETE FROM invited WHERE cemail='$email'");
mysql_query("DELETE FROM unsubscribed WHERE cemail='$email'");
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");



$fname=$_POST['f_name'];
$lname=$_POST['l_name'];

$aran=genRandomStringn(7);
$unv=strtolower($fname).'.'.strtolower($lname).'.'.$aran;
$unv=str_replace(".css",".",$unv);
$unv=str_replace(".js",".",$unv);
$unv=str_replace(".php",".",$unv);


$password=$_POST['password'];
$salt="822643343315848aca";
$ep=crypt($password,$salt); //variable swtich name due to login check afterwards with regular password string to be crypted in there as well

$dk=rand(15000,700000);
mysql_query("INSERT INTO registration_keys (id,email,dk,confirmed,datetimep) VALUES('','$email','$dk','0',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO registered (f_name,l_name,email,password,gender,month,day,year,id,profilepic,fullname,status,username,userc,profilepict,datetimepn,datetimepl,datetimepk,dsalt)
VALUES ('$f_name','$l_name','$email','$ep','$gender','$month','$day','$year','','$wincognito','$fullname','2','$unv','0','$wincognito',UNIX_TIMESTAMP(),UNIX_TIMESTAMP(),UNIX_TIMESTAMP(),'')");

$uid=mysql_insert_id();
if($uid==0){
exit();
}

$fmkdir="users/".$unv;
mkdir("$fmkdir");

mysql_query("UPDATE registered SET id='$uid' WHERE sbid='$uid'");
mysql_query("UPDATE registration_keys SET id='$uid' WHERE email='$email'");

mysql_select_db("modules");
mysql_query("INSERT INTO sb_emails (id,email,email_p,email_c,datetimep) VALUES('$uid','$email','p','ur',UNIX_TIMESTAMP())");
mysql_select_db("registered");

mysql_close($con);


mkdir("users/$uid");

$uidvpsc=$uid.'sc';
$uidvpc=$uid.'c';
$uidvpcc=$uid.'cc';
$uidvpac=$uid.'ac';


$userstrip1=substr($uid,0,22);
$uidvpmv=$userstrip1.'break'.$userstrip1.'m';

$uidvpcr=$uid.'cr';
$uidvpu=$uid.'u';
$uidvpm=$uid.'m';

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

$result=mysql_query("SELECT * FROM modules WHERE module='cb'");
$count=mysql_num_rows($result);
if($count=="0"){
$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
friends varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("INSERT INTO modules (module,dvals,predefined)
VALUES ('cb','$vals','$predefined')");
}
$result=mysql_query("SELECT * FROM modules WHERE module='c'");
$count=mysql_num_rows($result);
if($count=="0"){
$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
datetimep int(12),
who varchar(200),
whos varchar(200),
msg varchar(200),
msgid varchar(200)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("INSERT INTO modules (module,dvals,predefined)
VALUES ('c','$vals','$predefined')");
}
$result=mysql_query("SELECT * FROM modules WHERE module='cc'");
$count=mysql_num_rows($result);
if($count=="0"){
$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
datetimep int(12),
who varchar(200),
whos varchar(200),
istypying varchar(200)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("INSERT INTO modules (module,dvals,predefined)
VALUES ('cc','$vals','$predefined')");
}



$result=mysql_query("SELECT * FROM modules WHERE module='cr'");
$count=mysql_num_rows($result);
if($count=="0"){
$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
friends varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("INSERT INTO modules (module,dvals,predefined)
VALUES ('cr','$vals','$predefined')");
}

$result=mysql_query("SELECT * FROM modules WHERE module='u'");
$count=mysql_num_rows($result);
if($count=="0"){
$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
friends varchar(200),
what varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("INSERT INTO modules (module,dvals,predefined)
VALUES ('u','$vals','$predefined')");
}

$result=mysql_query("SELECT * FROM modules WHERE module='cb'");
$count=mysql_num_rows($result);
if($count=="0"){
$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
friends varchar(200),
what varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("INSERT INTO modules (module,dvals,predefined)
VALUES ('cb','$vals','$predefined')");
}

$result=mysql_query("SELECT * FROM modules WHERE module='m'");
$count=mysql_num_rows($result);
if($count=="0"){
$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
module varchar(200)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("INSERT INTO modules (module,dvals,predefined)
VALUES ('m','$vals','$predefined')");
}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
// Create table

$sql = "CREATE TABLE $uidvpm
(
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
module varchar(200)
)";

// Execute query
mysql_query($sql);

mysql_query("INSERT INTO $uidvpm (module)
VALUES ('m')");

mysql_query("INSERT INTO $uidvpm (module)
VALUES ('sc')");

mysql_query("INSERT INTO $uidvpm (module)
VALUES ('c')");

mysql_query("INSERT INTO $uidvpm (module)
VALUES ('cc')");

mysql_query("INSERT INTO $uidvpm (module)
VALUES ('ac')");


mysql_query("INSERT INTO $uidvpm (module)
VALUES ('cr')");

mysql_query("INSERT INTO $uidvpm (module)
VALUES ('u')");


// Create table
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

mysql_query("INSERT INTO optionsv (id,showsex,showbirthday,birthdayc,middlename,dt_password_change,logout_devices,sort_option,datetimep) VALUES('$uid','2','1','','','','1','0',UNIX_TIMESTAMP())");

include("geoip_city/geoipcity.inc");
include("geoip_city/geoipregionvars.php");

$gi=geoip_open("geoip_city/GeoIPCity.dat",GEOIP_STANDARD);
$record=geoip_record_by_addr($gi,$_SERVER['REMOTE_ADDR']); //aca iria remote_addr $ip=$_SERVER['REMOTE_ADDR'];
if($record!==NULL){
$region=$GEOIP_REGION_NAME[$record->country_code][$record->region];
mysql_query("INSERT INTO ipliving (id,countryc,countryn,city,continent,region,regionc,postal,datetimep) VALUES ('$uid','$record->country_code','$record->country_name','$record->city','$record->continent_code','$region','$record->region','$record->postal_code',UNIX_TIMESTAMP())");
}
else{
mysql_query("INSERT INTO ipliving (id,countryc,countryn,city,continent,region,regionc,postal,datetimep) VALUES ('$uid','','','','','','','',UNIX_TIMESTAMP())");	
}



// Execute query
mysql_query($sql);

//segundo character cero reservado para smart list de city code


function grsnv($l) {
		$characters = '123456789';
		$string = '';
		for ($p = 0; $p < $l; $p++) {
				if($p==1){$string.='0';}
		else{$string .= $characters[mt_rand(0, strlen($characters) -1)];}
		}
		return $string;
}

if(isset($region)){
$list=grsnv(13);
$regionn=$region.' Area';

$region=$record->city.$record->region.$record->country_code;

mysql_query("INSERT INTO lists (id,listn,descr,visibility,type,location,institution,favorites,datetimep) VALUES('$uid','$regionn','','v','location','$region','','2',UNIX_TIMESTAMP())");
}

$new_lists=array();
$new_lists[]='Close Friends';
$new_lists[]='Family';
$new_lists[]='Acquaintances';
$new_lists[]='Restricted';
$new_lists[]='Love';

foreach($new_lists as $k=>$v){
$vv=strtolower($v);
$vv=str_replace(" ","_",$vv);
if($v=="love"){$vis="h";}
else{
$vis="v";	
}
mysql_query("INSERT INTO lists (id,listn,descr,visibility,type,location,institution,favorites,datetimep) VALUES('$uid','$v','','$vis','$vv','','','2',UNIX_TIMESTAMP())");
}

// Execute query
mysql_query($sql);


$privacy=0;
$privacyh="";

mysql_query("INSERT INTO contact_emails (id,email,primary2,confirmed,visibility,privacy,privacyh,datetimep) VALUES('$uid','$email','p','u','v','$privacy','$privacyh',UNIX_TIMESTAMP())");

$gfid=grs(16);
$c=grsn(6);

$nemail=$email;

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

mysql_query("INSERT INTO nemailk (id,email,nemailk,nemailkh,datetimep)
VALUES ('$uid','$nemail','$gfid','$c',UNIX_TIMESTAMP())");
mysql_select_db("registered");

$sql = "CREATE TABLE $uidvpu
(
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
friends varchar(200),
what varchar(200),
datetimep int(12)
)";

// Execute query
mysql_query($sql);


// Create table
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$sql = "CREATE TABLE $uidvpcr
(
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
friends varchar(200),
datetimep int(12)
)";

// Execute query
mysql_query($sql);

$x=0;
while($x<=14){
mysql_query("INSERT INTO $uidvpcr (friends, datetimep)
VALUES ('NULL','NULL')");
$x++;
}

$sql = "CREATE TABLE $uidvpc
(
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
datetimep int(12),
who varchar(200),
whos varchar(200),
msg varchar(200),
msgid varchar(200)
)";

// Execute query
mysql_query($sql);


mysql_query("INSERT INTO sidebar (id, opened, datetimep)
VALUES ('$uid','0',UNIX_TIMESTAMP())");

$sql = "CREATE TABLE $uidvpmv
(
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
message varchar(200),
who varchar(200),
whos varchar(200),
msgid varchar(200),
datetimep int(12),
read2 varchar(200)
)";

// Execute query
mysql_query($sql);


$sql = "CREATE TABLE $uidvpcc
(
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
datetimep int(12),
who varchar(200),
whos varchar(200),
istypying varchar(200)
)";


$pinboard=1;

$albumn='Wall Photos';
$privacy=0;
$privacyh="";
mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp) VALUES('$uid','$albumn','','','v','','1','1','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),'')");

$albumn='Photos'; //stands for photos posted to anyone's wall
$privacy=0;
$privacyh="";
mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp) VALUES('$uid','$albumn','','','h','','-2','-2','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),'')");


$albumid=mysql_insert_id();
$likeid=$albumid;
$ltype='album';
include("stories/like_insert.php");


$pinboard=2;
$albumn='Wall Pins';
$privacy=0;
$privacyh="";
mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp) VALUES('$uid','$albumn','','','v','','1','1','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),'')");

$albumn='Pins'; //stands for photos posted to anyone's wall
$privacy=0;
$privacyh="";
mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp) VALUES('$uid','$albumn','','','h','','-2','-2','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),'')");


$albumid=mysql_insert_id();
$likeid=$albumid;
$ltype='album';
include("stories/like_insert.php");

$pinboard=1;
$albumn='Profile Pictures';
$privacy=0;
$privacyh="";
mysql_query("INSERT INTO albums (id,albumn,location,descr,visibility,album_cover,norder,oldorder,privacy,privacyh,pinboard,datetimep,datetimep_pp) VALUES('$uid','$albumn','','','v','','2','2','$privacy','$privacyh','$pinboard',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");




$privacy=0;
$privacyh="";
mysql_query("INSERT INTO options (id,lcords,tcords,hd,datetimep_hd,filter_operations,privacy,privacyh,user_timezone,original_user_timezone,user_timezone_daylight,datetimep_user_timezone,datetimep) VALUES('$uid','','','false',UNIX_TIMESTAMP(),'0','$privacy','$privacyh','$ctimezone','$octimezone','$cdaylight',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");


$aboutme="";
mysql_query("INSERT INTO about(id,about,datetimep) VALUES('$uid','$aboutme',UNIX_TIMESTAMP())");

$interested="";
mysql_query("INSERT INTO interested(id,interested,datetimep) VALUES('$uid','$interested',UNIX_TIMESTAMP())");

$quotations="";
mysql_query("INSERT INTO quotations(id,quotations,datetimep) VALUES('$uid','$quotations',UNIX_TIMESTAMP())");


mysql_query("INSERT INTO address(id,address,statec,countryc,cityc,zip,neighborhood,visibility,datetimep) VALUES('$uid','','','','','','','v',UNIX_TIMESTAMP())");

mysql_query("INSERT INTO website(id,website,visibility,datetimep) VALUES('$uid','','v',UNIX_TIMESTAMP())");

mysql_query("INSERT INTO chatopen (chatopen,id,datetimep) VALUES('','$uid',UNIX_TIMESTAMP())");	

$privacy=0;
$privacyh="";

//nice entering into privacy_last for 0 values to have a start on privacy disregardless of latest privacy setting used elsewhere

/*

mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','languages','','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','living','current_city','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','living','hometown','$privacy','$privacyh',UNIX_TIMESTAMP())");

mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','workedu','w','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','workedu','c','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','workedu','h','$privacy','$privacyh',UNIX_TIMESTAMP())");

mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','relipo','religion','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','relipo','political','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','inspirational','','$privacy','$privacyh',UNIX_TIMESTAMP())");

function was updated not to have to go through this kind of maintenance - all could possibly default to public if no previous privacy was set

*/

$privacy=1;
$privacyh="";
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','contact_emails','','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','contact_phones','0','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','contact_phones','1','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','contact_emails','','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','contact_im','','$privacy','$privacyh',UNIX_TIMESTAMP())");
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','address','','$privacy','$privacyh',UNIX_TIMESTAMP())");

mysql_query("INSERT INTO bank (id,amount) VALUES('$uid',0)");

$privacy=0;
$privacyh="";
mysql_query("INSERT INTO privacy_last (id,type,category,privacy,privacyh,datetimep) VALUES('$uid','friends','','$privacy','$privacyh',UNIX_TIMESTAMP())");

$fmkdir='/var/www/html/users/'.$uid.'/pics';
mkdir("$fmkdir");

$fmkdir='/var/www/html/users/'.$uid.'/vids';
mkdir("$fmkdir");
$thegender=$gender;
$file = '/var/www/html/images/incognitof.gif';
$newfile = "/var/www/html/users/".$uid."/pics/incognitof.gif";

if (!copy($file, $newfile)) {
		echo "failed to copy $file...\n";
}

$file = '/var/www/html/images/incognitom.gif';
$newfile = "/var/www/html/users/".$uid."/pics/incognitom.gif";

if (!copy($file, $newfile)) {
		echo "failed to copy $file...\n";
}

$_POST['login_email']=$email;
$_POST['login_password']=$password;
$_POST['keep_me_logged_in']='1';
$reginc='';

include("functions/sb_user.php");
include("functions/sbmail.php");
include("functions/grs.php");
include("settingsd/general/initial_confirmation_email.php");

$uti=sb_user($uid);
$p=array();
$p['s']='Welcome to Upfrev - get started now!';
$p['m']='<table cellpadding="0" cellspacing="0" border="0" width="620"><tbody><tr><td style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:16px;letter-spacing:-0.03em;text-align:left"><a style="color:#ffffff;text-decoration:none" href="http://www.subsbook.com/find_friends.php" target="_blank"><span style="color:#ffffff">upfrev</span></a></td><td style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:11px;text-align:right"></td></tr><tr><td colspan="2" style="border-right:1px solid #cccccc;border-bottom:1px solid #3b5998;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;padding:15px;border-left:1px solid #cccccc" valign="top"><table width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td width="470" style="font-size:12px" valign="top" align="left"><div style="margin-bottom:15px;font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif">Hi '.$uti['f_name'].',</div><div style="margin-bottom:15px">Your account has been created &#196; now it will be easier than ever to share and connect with your friends.</div><div style="margin-bottom:15px"><div style="font-weight:bold;margin-bottom:15px">Here are three ways for you to get the most out of it:</div><table><tbody><tr><td valign="top" style="padding-right:15px"><a href="http://www.subsbook.com/find_friends.php" style="color:#3b5998;text-decoration:none" target="_blank"><img src="http://www.subsbook.com/images/TgR7WGzB2KD.gif"></a></td><td valign="top" style="font-size:12px;padding:3px 0 15px 0"><div><a href="http://www.subsbook.com/find_friends.php" style="color:#3b5998;text-decoration:none;display:block;font-weight:bold" target="_blank">Find Friends</a></div>Find people you know on Subsbook using our simple tools.</td></tr><tr><td valign="top" style="padding-right:15px"><a href="http://www.subsbook.com/editprofile.php?sk=picture" style="color:#3b5998;text-decoration:none" target="_blank"><img src="http://www.subsbook.com/images/Btw6qZ0ihGS.gif"></a></td><td valign="top" style="font-size:12px;padding:3px 0 15px 0"><div><a href="http://www.subsbook.com/editprofile.php?sk=picture" style="color:#3b5998;text-decoration:none;display:block;font-weight:bold" target="_blank">Upload a Profile Photo</a></div>Personalize your profile and help your friends recognize you.</td></tr><tr><td valign="top" style="padding-right:15px"><a href="http://www.subsbook.com/editprofile.php" style="color:#3b5998;text-decoration:none" target="_blank"><img src="http://www.subsbook.com/images/oXpwcGCi58A.gif"></a></td><td valign="top" style="font-size:12px;padding:3px 0 0 0"><div><a href="http://www.subsbook.com/editprofile.php" style="color:#3b5998;text-decoration:none;display:block;font-weight:bold" target="_blank">Edit Your Profile</a></div>Describe personal interests, contact information, and affiliations.</td></tr></tbody></table><div style="margin:15px 0">';

//If you have any questions, reference our <a href="http://www.subsbook.com/n/?help%2Fnew_user_guide.php&amp;mid=7aa83c9G5af455d04fefG0G4b&amp;bcode=1.1363183259.Abnx2Qt_4xCGGQfX&amp;code=605739&amp;n_m=pabloc.elance%40gmail.com" style="color:#3b5998;text-decoration:none" target="_blank">New User Guide</a>.

$p['m'].='</div></div><div style="margin-bottom:15px"></div><div style="margin-bottom:15px;font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;margin:0">Thanks,<br>
The Upfrev Team</div></td><td valign="top" width="150" style="padding-left:15px" align="left"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px;background-color:#fff9d7;border-left:1px solid #e2c822;border-right:1px solid #e2c822;border-top:1px solid #e2c822;border-bottom:1px solid #e2c822"><div style="margin-bottom:15px;font-size:12px">Sign in to Upfrev and start connecting</div><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#3b6e22 #3b6e22 #2c5115;background-color:#69a74e"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #95bf82"><a href="http://www.subsbook.com/find_friends.php" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#fff;font-size:13px">Get Started</span></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td colspan="2" style="color:#999999;padding:10px;font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif">';

//Didn\'t sign up for Upfrev? <a href="http://www.subsbook.com/confirmemail.php?e=pabloc.elance%40gmail.com&amp;c=605739&amp;report=1" style="color:#3b5998;text-decoration:none" target="_blank">Please let us know.</a>

$p['m'].='This message was sent to <a href="mailto:'.$email.'" style="color:#3b5998;text-decoration:none" target="_blank">'.$email.'</a> at your request.<br>Upfrev, Inc.</td></tr></tbody></table>';

$p['t']=$email;
$p['f']='Upfrev';
$p['e']='confirm+'.grs(75).'@upfrevmail.com';

sbmail($p,false);

//aca mismo si alguien me invito agarrar su id y ahora pasar esa invitacion a friend request de parte de quien me invito, es un insert - hora

include("components/login.php");

?>