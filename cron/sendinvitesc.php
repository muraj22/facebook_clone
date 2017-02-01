<?php  
include("cron/settings.php");
include("functions/sbmail.php");
?>
<?php
function td($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%d');
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
if(strlen($td)>1){
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
}
$tdv=$tdd->format('%R%h');
$tdv=str_replace('-','',$td);
$tdv=str_replace('+','',$td);
if(strlen($tdv)>1){
$pretdv=substr($tdv,0,1);
if($pretdv=='0'){if(substr($tdv,0,1)=="0"){$tdv=substr($tdv,1);}}
}
if($tdv!=0){ //we are looking to send these emails every time there is a match with our hourly cron in a 0 hour difference basis.
return 'n';
}
if($td==4 OR $td==8 OR $td==12){return $td;}
else if($td>12){return 'del';}
else{return 'n';}
}

$p=array();
$p['s']= "Check out my photos on Upfrev‏";
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
mysql_query("DELETE FROM invited WHERE times>3");
$result=mysql_query("SELECT * FROM invited");
while($ms=mysql_fetch_array($result)){

$cemail=$ms['cemail'];
$datee=$ms['datetimep'];
$inviteid=$ms['inviteid'];

$wtd=td($datee);
if(is_numeric($wtd)){ //that is ok, we got a day 4, 8 or 12 value

$times=$m['dtimes'];
if(($times==1 AND $wtd==4) OR ($times==2 AND $wtd==8) OR ($times==3 AND $wtd==12)){
$times++;
mysql_query("UPDATE invited SET dtimes='$times' WHERE cemail='$cemail'");
}
else{
continue;	
}

$uid=$ms['bywho'];
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$result2=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($ms2=mysql_fetch_array($result2)){
$fname=$ms['f_name'];
$fullname=$ms['fullname'];
$cuseremail=$ms['email'];	
$cprofilepic=$ms['profilepict'];
}

$p['f']=$fullname;
$p['e']=$cuseremail;
$p['t']=$cemail;

$p['m'] = '
<html>
<head>
<title>Upfrev</title>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:98%;">
<tr><td style="font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;">
<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:590px"><tr><td style="font-size:16px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;background:#3b5998;color:#FFFFFF;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:10px 20px 4px"><a target="_blank" style="text-decoration:none;" href="/"><span style="background:#3b5998;color:#FFFFFF;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;font-size:16px;letter-spacing:-0.03em;text-align:left;vertical-align:baseline;">upfrev</span></a></td></tr></table>
<table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:590px;"><tr><td style="padding:0;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none;"><table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse;"><tr><td style="font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;padding:0;width:590px;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%;padding:10px;"><tr><td style="font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;padding:20px 20px 15px;"><table style="border-collapse:collapse;" cellspacing="0" cellpadding="0"><tr><td valign="top" style="padding-right:10px;font-size:0px;"><a target="_blank" href="/" style="color:#3b5998;text-decoration:none;"><img width="100px" style="border:0;" src="/'.$uid.'/pics/'.$cprofilepic.'"></a></td><td valign="top"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;display:block;padding:0 5px 5px;"><tr><td style="font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;"><tr><td style="padding:0;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none;font-size:14px;font-weight:bold;">'.$fullname.' wants to share photos and updates with you.</td></tr></table></td></tr><tr><td style="font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;"></td></tr><tr><td style="font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:430px;"><tr><td style="padding:10px 0;background-color:#fff;border-left:none;border-right:none;border-top:solid 1px #ccc;border-bottom:none;">'.$fname.' has invited you to Upfrev. After you sign up, you\'ll be able to stay connected with friends by sharing photos and videos, posting status updates, sending messages and more.</td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table>
</td></tr>
<tr><td style="font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;padding:0;"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%;"><tr><td style="padding:10px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:1px solid #ccc;border-bottom:1px solid #ccc;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style="font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;padding:0 5px 0 125px;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style="border-width:1px;border-style:solid;border-color:#29447E #29447E #1a356e;background-color:#5b74a8;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style="font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;padding:2px 6px 4px;border-top:1px solid #8a9cc2;"><a target="_blank" style="color:#3b5998;text-decoration:none;" href="/"><span style="font-weight:bold;color:#fff;font-size:13px;">View '.$fname.'\'s Photos</span></a></td></tr></table></td></tr></table></td></tr></table></td></tr></table>
<table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:590px;"><tr><td style="padding:30px 20px;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none;font-size:11px;font-family:\'lucida grande\', tahoma, verdana, arial, sans-serif;color:#999999;border:none;">This message was sent to '.$cemail.'. If you don\'t want to receive these emails from Upfrev in the future or have your email address used for friend suggestions, please click:<a target="_blank" style="color:#3b5998;text-decoration:none;" rel="nofollow" href="http://www.subsbook.com/o.php?k='.$inviteid.'e='.$cemail.'">unsubscribe</a>.<br>Upfrev, Inc.</td></tr></table>
</td></tr>
</table>
</body>
</html>
';

sbmail($p);


}
else if($wtd=='del'){
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
mysql_query("DELETE FROM invited WHERE cemail='$cemail'");
}
else{}

}
?>
<?php include("end.php"); ?>