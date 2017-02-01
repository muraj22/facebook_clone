<?php
ignore_user_abort(true);
//include("close_connection.php");
include("php_safety.php");
include("functions/grs.php");
include("functions/sb_user.php");
include("functions/sbmail.php");
foreach($_POST as $k=>$v){
${$k}=$v;
}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
$r=mysql_query("SELECT * FROM registered WHERE email='$email'");
while($m=mysql_fetch_array($r)){
$uid=$m['id'];	
}
$c=mysql_num_rows($r);
if($c==0){exit();}
$dk=grsn(6);

mysql_query("INSERT INTO reset_password(id,dk,email,visibility,datetimep) VALUES('$uid','$dk','$email','v',UNIX_TIMESTAMP())");

$r=mysql_query("(SELECT * FROM contact_emails WHERE id='$uid' AND confirmed='c' AND primary2!='p' AND visibility='v') UNION (SELECT * FROM contact_emails WHERE id='$uid' AND primary2='p' AND visibility='v')");

$uti=sb_user($uid);

while($m=mysql_fetch_array($r)){
$email=$m['email'];
$p=array();
$p['s']='You requested a new Upfrev password';
$p['m']='<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:98%" border="0"><tbody><tr><td style="font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="font-size:16px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;background:#3b5998;color:#ffffff;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px"><a style="text-decoration:none" href="https://www.facebook.com/recover/code?u=100003577943493&amp;n=504385" target="_blank"><span style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;font-size:16px;letter-spacing:-0.03em;text-align:left;vertical-align:baseline">upfrev</span></a></td></tr></tbody></table><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px" border="0" width="620px"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" width="620px" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:20px;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-bottom:6px">Hi '.$uti['f_name'].',<br><br>You recently asked to reset your Upfrev password.<a href="http://www.subsbook.com/code?u='.$uid.'&amp;n='.$dk.'" style="color:#3b5998;text-decoration:none" target="_blank"><br>Click here to change your password.</a><br><br>Alternatively, you can enter the following password reset code:</td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:6px;padding-bottom:6px;border-top:1px solid #e8e8e8"><div>504385</div></td></tr>';

///<tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:6px;border-top:1px solid #e8e8e8"><b>Didn\'t request this change?</b><br>If you didn\'t request a new password, <a href="https://www.subsbook.com/login/recover/disavow_reset_email.php?n=504385&amp;id=100003577943493" style="color:#3b5998;text-decoration:none" target="_blank">let us know immediately</a>.</td></tr>

$p['m'].='</tbody></table></td></tr></tbody></table></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%" border="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:7px 20px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:1px solid #ccc;border-bottom:1px solid #ccc"><table cellspacing="0" cellpadding="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-left:0px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#29447e #29447e #1a356e;background-color:#5b74a8"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #8a9cc2"><a href="https://www.facebook.com/recover/code?u=100003577943493&amp;n=504385" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#fff;font-size:11px">Change Password</span></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="border-right:none;color:#999999;font-size:11px;border-bottom:none;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;border:none;border-top:none;padding:30px 20px;border-left:none">This message was sent to <a href="mailto:collapablo2@gmail.com" style="color:#3b5998;text-decoration:none" target="_blank">'.$email.'</a> at your request.<br>Facebook, Inc., Attention: Department 415, PO Box 10005, Palo Alto, CA 94303</td></tr></tbody></table><span style="width:620px"><img style="border:0;width:1px;min-height:1px"></span></td></tr></tbody></table>';
$p['t']=$email;
$p['f']='Upfrev';
$p['e']='password+'.grs(15).'@upfrevmail.com';
sbmail($p,false);
}
$uti=sb_user($uid);

echo 'email='.$uti['email'];
//echo'&dk='.$dk;
?>