<?php  
include("start.php");
?>
<?php

$result=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($ms=mysql_fetch_array($result)){
$fname=$ms['f_name'];
$fullname=$ms['fullname'];
$cuseremail=$ms['email'];	
$cprofilepic=$ms['profilepict'];
}

$emails=$_POST['emails'];
$opm=$_POST['opm'];

$p=array();
$p['s']='Check out my photos on Upfrev';

$p['f']=$fullname;
$p['e']=$cuseremail;


$emailsv=explode(",",$emails);

$alreadyf=array();
$alreadysinv=array();
$sendinginv=array();
$sendinginvv=array();

$uidvs=array();
$alreadyfc=0;
$alreadysinvc=0;
$sendinginvc=0;
$sendinginvvc=0;
foreach($emailsv as $key=>$email){

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){}
else{


$result=mysql_query("SELECT * FROM registered WHERE email='$email'");
$count=mysql_num_rows($result);
if($count>0){
while($ms=mysql_fetch_array($result)){
$dfriend=$ms['id'];	
}
$result2=mysql_query("SELECT * FROM friends WHERE id='$uid' AND id2='$dfriend'");
$count2=mysql_num_rows($result2);
if($count2>0){
while($ms2=mysql_fetch_array($result2)){
$confirmed=$ms2['confirmed'];	
}
if($confirmed=='y'){
$alreadyf[]=$email;
$alreadyfc++;
}
else{
$alreadysinv[]=$email;
$alreadysinvc++;	
}
}
else{
$uidvs[]=$dfriend;
$sendinginv[]=$email;
$sendinginvc++;
}
}
else{
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
$result=mysql_query("SELECT * FROM invited WHERE cemail='$email'");
$count3=mysql_num_rows($result);

if($count3>0){
$alreadysinv[]=$email;
$alreadysinvc++;	
}
else{
$result=mysql_query("SELECT * FROM unsubscribed WHERE cemail='$email' AND unsubscribed='1'");
$count4=mysql_num_rows($result);
if($count4>0){
$alreadysinv[]=$email;
$alreadysinvc++;	
}
else{
$sendinginvv[]=$email;
$sendinginvvc++;	
}
}
}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
}
	
}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
if($alreadyfc>0){
echo '<div style="margin: 0px auto;margin-top:10px;width: 450px;padding:0;">
<div style="margin:0;padding:0;margin-bottom:5px;font-weight:bold;">'.$alreadyfc.' of the email addresses you entered matched someone you are already friends with on Upfrev:</div>';
foreach($alreadyf as $key=> $value){
echo'<li style="list-style-type: square;margin-left: 1.5em;">'.$value.'</li>';	
}
echo'</div>';
}

if($alreadysinvc>0){
if($alreadysinvc>1){$adsu='s';}
else{$adsu='';}
echo'<div style="margin: 0px auto;margin-top:10px;width: 450px;padding:0;">
<div style="margin:0;padding:0;margin-bottom:5px;font-weight:bold;">Invitations have already been sent to this person'.$adsu.':</div>';

foreach($alreadysinv as $key=>$value){
echo'<li style="list-style-type: square;margin-left: 1.5em;">'.$value.'</li>';		
}

echo'</div>';
}

if($sendinginvc>0){
if($sendinginvc>1){$adsu='s';}
else{$adsu='';}
echo '<div style="margin: 0px auto;margin-top:10px;width: 450px;padding:0;">
<div style="margin:0;padding:0;margin-bottom:5px;font-weight:bold;">'.$sendinginvc.' of the email addresses you entered matched someone who has already joined Upfrev. A friend request has been sent to the following person'.$adsu.':</div>';
	
foreach($sendinginv as $key=>$value){
echo'<li style="list-style-type: square;margin-left: 1.5em;">'.$value.'</li>';		
}

echo'</div>';

include("addfriends.php");
}

if($sendinginvvc>0){
if($sendinginvvc>1){$adsu='s';}
else{$adsu='';}
echo '
<div style="margin: 0px auto;margin-top:10px;width: 450px;padding:0;">
<div style="margin:0;padding:0;font-size:13px;">You successfully invited '.$sendinginvvc.' person'.$adsu.' to join Upfrev.</div>';

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
foreach($sendinginvv as $key=>$value){
echo'<li style="list-style-type: square;margin-left: 1.5em;font-size:13px;">'.$value.'</li>';

$inviteid=grs(25);
mysql_query("INSERT INTO invited (cemail,id,inviteid,dtimes,datetimep)
VALUES ('$value','$uid','$inviteid','1',UNIX_TIMESTAMP())");

$p['m'] = '
<html>
<head>
<title>Upfrev</title>
</head>
<body>
<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px;">
<tr><td style="font-size:16px;background:#3b5998;color:#FFFFFF;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:4px 8px;">
<a target="_blank" style="text-decoration:none;" href="/" rel="nofollow"><span style="background:#3b5998;color:#FFFFFF;font-weight:bold;vertical-align:middle;font-size:16px;letter-spacing:-0.03em;text-align:left;vertical-align:baseline;">upfrev</span></a></td></tr></table>
<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px;"><tr><td style="padding:10px;background-color:#fff;border-left:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;border-bottom:1px solid #ccc;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr valign="top"><td style="font-size:11px;padding-right:10px;">
<a href="/" style="color:#3b5998;text-decoration:none;" target="_blank" rel="nofollow"><img src="/images/imvFDe35FCg.png" style="border:0;" width="138"></a>
</td><td width="100%" style="font-size:11px;">
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse;">
<tr><td style="padding:5px 0px;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;" width="100%"><tr><td style="font-size:11px;padding:5px 0px;">Hi,</td></tr><tr><td style="font-size:11px;padding:5px 0px;">'.$fullname.' is inviting you to join Upfrev.</td></tr>
<tr><td style="font-size:11px;padding:5px 0px;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%;"><tr><td style="padding:5px;background-color:#f2f2f2;border-left:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;border-bottom:1px solid #ccc;border:0px;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td valign="top" style="padding-right:10px;font-size:0px;"><a href="/" target="_blank" rel="nofollow" style="color:#3b5998;text-decoration:none;"><img src="/'.$uid.'/pics/'.$cprofilepic.'" style="border:0;width:50px;height:50px;"></a></td><td valign="top"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td><a href="/ style="color:#3b5998;text-decoration:none;font-weight:bold;" target="_blank" rel="nofollow"><span class="">'.$fullname.'</span></a></td></tr>';



if($opm!=""){
$p['m'].='<tr><td>'.$opm.'</td></tr>';	
}
$p['m'].='
<tr><td style="color:#808080;">'.date("F j, Y").'</td></tr>
</table></td></tr></table></td></tr></table>
</td></tr>
<tr><td style="font-size:11px;padding:5px 0px;">
Once you join, you\'ll be able to see updates, photos and more from '.$fname.' and all your other friends... and share your own!</td></tr>
<tr><td style="font-size:11px;padding:5px 0px;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style="border-width:1px;border-style:solid;border-color:#999 #999 #888;background-color:#eee;"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;"><tr><td style="font-size:11px;padding:2px 6px 4px;border-top:1px solid #fff;"><a href="/" rel="nofollow" target="_blank" style="color:#3b5998;text-decoration:none;"><span style="font-weight:bold;color:#333;font-size:11px;">Join Upfrev</span></a></td></tr></table></td></tr></table></td></tr>
</td></tr></table>
</td></tr></table>
</td></tr></table>
</td></tr></table>
<table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:620px;"><tr><td style="padding:20px 0px;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none;font-size:11px;color:#999999;border:none;">This message was sent to <a target="_blank" rel="nofollow" href="mailto:'.$value.'"><span class="">'.$value.'.</span></a> If you don\'t want to receive these emails from Upfrev in the future or have your email address used for friend suggestions, please click: <a style="color:#3b5998;text-decoration:none;" href="http://www.subsbook.com/o.php?k='.$inviteid.'e='.$value.'" rel="nofollow" target="_blank"><span class="">unsubscribe</span></a>.<br>
Upfrev, Inc.</td></tr></table>
</body>
</html>
';

$p['t']=$value;
sbmail($p);

}

echo'</div>';
}

echo'<div style="border-top: 1px solid rgb(216, 223, 234);margin: 22px auto;padding:0;padding-top: 8px;text-align: right;margin: 0px auto;width: 450px;margin-top:22px;" class="invitemf">
<a href="invite.php">Invite More Friends</a><img src="/images/qilNUVD_BUm.gif" style="margin-left:5px;display:inline-block;border:0 none;">
</div>
';

?>
<?php if($sendinginvvc>0){include("end.php");} else{include("end.php");} ?>