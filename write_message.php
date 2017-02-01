<?php  
include("start.php");
?>
<?php
$currentdir=getcwd(); 
$uidv=$uid; 

function genRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    $string=strtoupper($string);
    return $string;
}

if(isset($_POST['message'])){
$message=$_POST['message'];
$to=$_POST['to'];
$to2=$_POST['to2'];


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

include("chatupd.php");

if(strpos($to2,'_arroba_arroba_',0)>0){

$to2=str_replace("_arroba_arroba_","@",$to2);
$to2=str_replace("_punto_punto_",".",$to2);

$result = mysql_query("SELECT * FROM registered WHERE email='$to2'");
while($ms = mysql_fetch_array($result))
  {
$to=$ms['id'];
}
}

if($to==$uid){
$userstrip2 = substr("$to", 0, 22);
$userstrip = substr("$uid", 0, 22);
$finaluserstrip=$userstrip.'break'.$userstrip2.'m';

$msgid=genRandomString(25);

mysql_query("INSERT INTO $finaluserstrip (message, who, whos, msgid, datetimep, read2)
VALUES ('$message','$uid','$to','$msgid',UNIX_TIMESTAMP(),'read')");
}

else{



$userstrip2 = substr("$to", 0, 22);
$userstrip = substr("$uid", 0, 22);

$finaluserstrip=$userstrip.'break'.$userstrip2.'m';
$finaluserstrip2=$userstrip2.'break'.$userstrip.'m';

$dq = "CREATE TABLE IF NOT EXISTS $finaluserstrip 
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

mysql_query($dq);

$dq = "CREATE TABLE IF NOT EXISTS $finaluserstrip2
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
mysql_query($dq);

$uidv=$to;


$r=mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$uid' AND id2='$uidv'");
$m=mysql_fetch_array($r);
$c=$m['c'];

$r=mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$uidv' AND id2='$uid'");
$m=mysql_fetch_array($r);
$c2=$m['c'];


if($c==0){
mysql_query("INSERT INTO friends (id,id2,confirmed,confirmedrecently,removealert,datetimep,datetimepv,cv)
VALUES ('$uid','$uidv','sm','NULL','NULL',UNIX_TIMESTAMP(),UNIX_TIMESTAMP(),'1')");
}

if($c2==0){
mysql_query("INSERT INTO friends (id,id2,confirmed,confirmedrecently,removealert,datetimep,datetimepv,cv)
VALUES ('$uidv','$uid','sm','NULL','NULL',UNIX_TIMESTAMP(),UNIX_TIMESTAMP(),'1')");
}



$msgid=genRandomString(25);

mysql_query("INSERT INTO $finaluserstrip (message, who, whos, msgid, datetimep, read2)
VALUES ('$message','$uid','$to','$msgid',UNIX_TIMESTAMP(),'read')");

mysql_query("INSERT INTO $finaluserstrip2 (message, who, whos, msgid, datetimep, read2)
VALUES ('$message','$uid','$to','$msgid',UNIX_TIMESTAMP(),'none')");
}

mysql_close($con);

if(!isset($_POST['source'])){
$success='success';
}
else{
include("functions/checkforsmilies.php");
function turndate2($date){$date=tod($date);
  return date('F j \, Y', strtotime($date));
}
$date = new DateTime();
$date=$date->format('Y-m-d H:i:s');
$date=turndate2($date);
$message=str_replace("
","\\n",$message);
$message=checkforsmileys($message);
$success='
<table style="width:500px;border-top:1px solid #eeeeee;border-collapse:collapse;border-spacing:0;"><tr><td style="vertical-align:top;width:50px;padding-top:5px;padding-bottom:5px;"><a href="/'.$uid.'"><img src="/'.$uid.'/pics/'.$_POST['thepic'].'" style="width:50px;height:50px;"></a></td><td style="vertical-align:top;text-align:left;padding-left:3px;"><table style="text-align:left;width:325px;"><tr><td style="text-align:left;" class="senderlink"><a href="/'.$uid.'"><span style="font-size:11px;white-space:nowrap;line-height:16px;color:#3b5998;font-weight:bold;position:relative;bottom:0px;" class="lucida">'.$_POST['fullnamesender'].'</span></a></td></tr><tr><td style="color:#333333;width:100%;"><span style="position:relative;bottom:0px;">'.$message.'</span></td></tr></table></td><td style="vertical-align:top;color:rgb(170,170,170);text-align:right;width:110px;"><span style="position:relative;top:6px;">'.$date.'</span></td></tr></table>';
}

}
?>
<?php echo $success; ?>
<?php 
include("end.php");
?>