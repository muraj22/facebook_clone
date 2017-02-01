<?php include("start.php"); ?>
<?php  

include("start.php");
?>
<?php
if(isset($_COOKIE["login_cookie"])){
$uid=$_COOKIE["login_cookie"];
}else{$uid='none'; exit();}




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




$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$nusername=$_POST['nusername'];

$nusername=endsWith($nusername,$con);
	
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

function endsWith2($haystack,$ecode,$con)
{
$needle='.';
    if(substr($haystack, -strlen($needle))===$needle){echo 'e1{}'.$ecode[1]; mysql_close($con); exit();};

	return $haystack;
	}

$nusernamec=endsWith2($nusername,$ecode,$con);

if($count>0 AND $count!=$count2){
echo 'e2{}'.$ecode[2]; mysql_close($con); exit();	
}

if(strlen($nusername)>50){echo 'e9{}'.$ecode[9]; mysql_close($con); exit();}



$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$unv=$m['username'];	
}

$rusername=str_replace(".","",$nusername);
$r=mysql_query("SELECT * FROM registered WHERE REPLACE(username, '.', '')='$rusername'");
$c=mysql_num_rows($r);
if($c>0){$taken='';}

if($unv==$nusername){}
else if(file_exists("users/".$nusername) OR isset($taken)){echo'Username is not available';}
else{echo'Username is available';}

?>
<?php include("end.php"); ?>