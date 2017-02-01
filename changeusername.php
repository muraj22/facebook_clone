<?php  
include("start.php");

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$nusername=$_POST['nusername'];

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return !strncmp($haystack, $needle, strlen($needle));
}

function endsWith($haystack,$con)
{
	$extensions_array = array(".txt",".csv",".htm",".html",".xml", 
    "css",".doc",".xls",".rtf",".ppt",".pdf",".swf",".flv",".avi", 
    ".wmv",".mov",".jpg",".jpeg",".gif",".png",".bak",
".dat",
".php",
".ico",
".otf",
".zip",
".rar",
".7z",
".wma",
".mp3",
".mp4",
".srt",
".xls",
".docx",
".doc",
".bmp",
".bat"); 

	foreach($extensions_array as $k=>$needle){
    if(substr($haystack, -strlen($needle))===$needle){echo'Username is not available'; mysql_close($con); exit();};
	}
	return $haystack;
	}

	$nusername=endsWith($nusername,$con);

$ecode=array();
$ecode[1]='Contains misplaced special characters';
$ecode[2]='Contains invalid characters';
$ecode[9]='Max length exceeded';
$ecode[10]='Consecutive special characters disallowed';

function shorten($str) {
    return preg_replace_callback(
        '~(.)\1+~',
        function( $matches ) {
            return sprintf( '{}->%s->%s', $matches[1], strlen( $matches[0] ) );
        },
        $str
    );
}

$nusernamec=shorten($nusername);
if(strpos($nusernamec,'.')!==false){
$ala=explode("{}",$nusernamec);
foreach($ala as $k=>$v){
$alav=explode("->",$v);
$key=$alav[1];
$reps=$alav[2];
if($key=='.' AND $reps>1){echo 'e10{}'.$ecode[10]; mysql_close($con); exit();}
}
}

$nusername = preg_replace ("/ +/", " ", $nusername);
$nusername = preg_replace ("/^ +/", "", $nusername);
$nusername = preg_replace ("/ +$/", "", $nusername);
$nusernamec = preg_replace ("/ +/", "", $nusername);
$nusernamec=preg_replace('/[_\W+]/', '', $nusernamec,-1,$count);
$nusernamed=str_replace(".","",$nusername,$count2);

if(strlen($nusername)==0){echo''; mysql_close($con); exit();}

$nusername=str_ireplace("css","",$nusername,$count3a);
$nusername=str_ireplace("js","",$nusername,$count3b);
$nusername=str_ireplace("php","",$nusername,$count3c);
$tcount=$count3a+$count3b+$count3c;
if($tcount>0){
echo'Username is not available'; mysql_close($con); exit();	
}


if($count>0 AND $count!=$count2){
echo 'e2{}'.$ecode[2]; mysql_close($con); exit();	
}

if(strlen($nusername)>50){echo 'e9{}'.$ecode[9]; mysql_close($con); exit();}

function lowercase_lettersv($s) {
  $result = array( 'digit'=>0, 'lower'=>0, 'upper'=>0, 'punct'=>0,'spaces'=>0, 'others'=>0);
  for($i=0; $i<strlen($s); $i++) {
    $c = $s[$i];
    if ( ctype_digit($c) ) {
      $result['digit'] += 1;
    }
    else if ( ctype_lower($c) ) {
      $result['lower'] += 1;
    }
    else if ( ctype_upper($c) ) {
		$result['upper'] += 1;	
    }
    else if ( ctype_punct($c) ) {
		if($i==strlen($s)-1){		
      $result['punct'] = 'error';
		}
else{
      $result['punct'] += 1;
	}
	}
	else if(ctype_space($c)){
	$result['spaces']+=1;	
	}
    else {
      $result['others'] += 1;
    }
  }
  return $result;
}

$nusernamec=lowercase_lettersv($nusername);
if($nusernamec['punct']=='error' && $nusernamec['punct']!='0'){echo 'e1{}'.$ecode[1]; mysql_close($con); exit();}

$pass=$_POST['pass'];
include("salt.php");
$pass=crypt($pass,$salt);

$rusername=str_replace(".","",$nusername);
$r=mysql_query("SELECT * FROM registered WHERE REPLACE(username, '.', '')='$rusername'");
$c=mysql_num_rows($r);
if($c>0){echo 'big_error'; mysql_close($con); exit();}

$r=mysql_query("SELECT * FROM registered WHERE username='$nusername'");
$c=mysql_num_rows($r);
if($c>0){echo 'big_error'; mysql_close($con); exit();}

$result=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($ms=mysql_fetch_array($result)){
if($ms['password']==$pass){$goodtg='t';}	
$ccount=$ms['userc'];
$unv=$ms['username'];
}
//<2
if(isset($goodtg) && $ccount<2){
$ccount++;	
$fmkdir="users/".$nusername;
mkdir("$fmkdir");

$userp=$nusername;


if($ccount>1){
function rrmdir($dir) {
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            rrmdir($file);
        else
            unlink($file);
    }
    rmdir($dir);
}




	rrmdir("users/".$unv);
}

$ctimezone=$_COOKIE['tz'];
$cdaylight=$_COOKIE['dst'];

include("cookies_reset.php");

mysql_query("UPDATE registered SET userc='$ccount' WHERE id='$uid'");
mysql_query("UPDATE registered SET username='$nusername' WHERE id='$uid'");

if($ccount>=2){
	echo 'changeout->'.$nusername;
}
else{
	echo 'change->'.$nusername;	
}
}	
else{

if(isset($goodtg)){echo 'You have reached the limit for username changes.';}
else{echo 'The password entered was incorrect. Please check your password.';}
	
}
	mysql_close($con);

?>