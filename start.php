<?php  
if(!isset($start_included)){
$start_included="t";
if(!isset($_SESSION)){
session_start();
}
if(isset($ig_abort) && ($ig_abort=="t")){
ignore_user_abort(true); 
}
if(headers_sent()===false){
header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' ); 
}
if (!in_array('ob_gzhandler', ob_list_handlers())) {
    //it's being done
}    
if(strpos($_SERVER['PATH'],"C:")!==false){
$flocalhost="t";	
}
?>
<?php
$con=mysql_connect("127.0.0.1","root","xd22xd22");
mysql_select_db("registered");
$root=$_SERVER['DOCUMENT_ROOT'];
if(isset($_COOKIE["login_cookie"]) && isset($_SESSION['logged']) && $_SESSION['logged']==$_COOKIE["login_cookie"]){
$uid=$_COOKIE["login_cookie"];
$ctimezone=$_COOKIE['tz'];
include("cookies/cookies_renew.php");
}else if(isset($_COOKIE["login_cookie"]) && isset($_COOKIE["slt"])){
$uid=$_COOKIE["login_cookie"];
$slt=$_COOKIE["slt"];

$r=mysql_query("SELECT * FROM registered WHERE dsalt='$slt' AND id='$uid'");
$c=mysql_num_rows($r);

if($c>0){
$uid=$_COOKIE["login_cookie"];
if(!isset($_COOKIE['ts'])){$logitout="t";}
$r=mysql_query("SELECT * FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$logout_devices=$m['logout_devices'];	
}
if($logout_devices==1){
$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$logout_devices_time=$m['datetimepk'];
$logged_time=$_COOKIE['ts']; //timestored
if($logged_time<$logout_devices_time){
$logitout="t"; //set logoitout
}

}
}

if(!isset($logitout)){ //allow logitout to work
$ctimezone=$_COOKIE['tz'];

$rand=rand(1,1); //100% of the times they hook up again
if($rand==1){
if(!isset($_SESSION)){
session_start();
}
if(!isset($_SESSION['logged'])){
$strigger="t";	//this renews cookies in case they have just hooked up with their browser
}
session_write_close();
}

include("cookies/cookies_renew.php");
} //end if !isset logitout

}
else{$logitout="";}
}
else if(!isset($godmode)){$logitout="";}
if(isset($logitout)){
$uid='none'; include("logout.php");
}

if(isset($_COOKIE["login_cookie2"])){
$un=$_COOKIE["login_cookie2"];
}
else{$un=$uid;}

$con=mysql_connect("127.0.0.1","root","xd22xd22");
 mysql_select_db("registered");


include("php_safety.php");
//this is done for uidv_friends to be defined properly

foreach($_POST as $k=>$v){
${$k}=$v;
}

if(isset($_POST['unv'])){ //comes from tooltip hover card

$r=mysql_query("SELECT * FROM registered WHERE username='$unv'");
while($m=mysql_fetch_array($r)){
$uidv=$m['id'];
}

}

if(!isset($uidv)){//$uidv might have been set from $_GET via news_feed attempting to load a wall
$uidv=$_SERVER['REQUEST_URI'];

if(strpos($uidv,"?")!==false){
$uidvv=explode("?",$uidv);
$uidv=$uidvv[0];
}

$uidvv=explode("/",$uidv);
$uidv=$uidvv[1];
}

$r=mysql_query("SELECT COUNT(*) as c FROM registered WHERE username='$uidv'");

$uidv=str_replace("\\","/",$uidv);

$r=mysql_query("SELECT * FROM registered where id='$uidv'");
while($m=mysql_fetch_array($r)){
$flagtu='t';	
$unv=$m['username'];
}

if(!isset($flagtu)){
$r=mysql_query("SELECT * FROM registered where username='$uidv'");
while($m=mysql_fetch_array($r)){
$uidv=$m['id'];
$unv=$m['username'];	
}
}

if(!isset($unv)){
$uidv="";
$ruidv=$uid; //to restore and use at a later point the very original $uid, used on news_feed
}
else{
$ruidv=$uidv;	
}

$uidsc=$uid.'sc';
$uids=$uid.'s';
$uidms=$uid.'ms';
$uidc=$uid.'c';
$uidcc=$uid.'cc';
$uidf=$uid.'f';
$uidp='media';
$uidsd=$uid.'sd';
$uidac=$uid.'ac';
$uidt=$uid.'t';
$uida='albums';
$uidl=$uid.'l';
$uidwl='likew';
$uidml=$uid.'ml';
$uidtt=$uid.'tt';
$uidcr=$uid.'cr';
$uidu=$uid.'u';
$uidm=$uid.'m';
$uidcb=$uid.'cb';
$uidr=$uid.'r';
$uidor=$uid.'or';
$uidop=$uid.'op';
$uidabv=$uid.'abv';
$uidun=$uid.'un';
$uidnta=$uid.'nta';
include("uidvvariables.php");
include("functions/set_local_timezone.php");
?>
<?php
mysql_set_charset('utf8');
include("functions/last_primary.php");
include("functions/tod.php");
include("functions/td.php");
include("functions/sb_user.php");
include("functions/checkforsmilies.php");
include("functions/r_friends.php");
include("functions/grs.php");
include("functions/array_funcs.php");
include("functions/for_textarea.php");
include("functions/get_list_class.php");
include("functions/get_privacy_button_params.php");
include("functions/convert_relation.php");
include("browser_detect.php");
include("privacy/query_filter.php");
include("functions/sbmail.php");
include("functions/tpl.php");
include("functions/ua.php");
}
?>