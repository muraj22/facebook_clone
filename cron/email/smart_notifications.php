<?php
include("cron/settings.php");
include("functions/sbmail.php");
include("functions/sb_user.php");
include("functions/grs.php");
include("functions/tpl.php");

$two_days=time()-(24*60*60*2);
$nine_days=time()-(24*60*60*9);
$r=mysql_query("SELECT * FROM registered as r AND (SELECT COUNT(*) as c FROM sb_cron_emails as e WHERE e.id=r.id AND type='smart_notifications_recap' AND datetimep<$nine_days)=0 AND ( (SELECT COUNT(*) as freqs FROM friends WHERE id2=r.id AND confirmed='n')>0  )
");

while($m=mysql_fetch_array($r)){
$uidv=$m['id'];

$datetimepn=$m['datetimepn'];

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id2='$uidv' AND confirmed='n'"));
$c=$c['c'];
$m['freqs']=$c;
$ps=tpl($m['freqs']);

$p=array();
$uti=sb_user($m['id']);
$p['s']=$uti['f_name'].', you have notifications pending';

$p['m']='<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:98%" border="0"><tbody><tr><td style="font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="font-size:16px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;background:#3b5998;color:#ffffff;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:10px 38px 4px"><a style="text-decoration:none" href="http://www.subsbook.com/home.php" target="_blank"><span style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;font-size:16px;letter-spacing:-0.03em;text-align:left;vertical-align:baseline">upfrev</span></a></td></tr></tbody></table><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="border-right:1px solid #ccc;line-height:16px;font-size:11px;border-bottom:1px solid #ccc;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;border-top:1px solid #ccc;padding:10px 20px;border-left:1px solid #ccc"><table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px 20px;line-height:16px;width:620px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:13px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif">Hi Romero,</td></tr><tr><td style="font-size:13px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px 0 15px 0">Here\'s some activity you may have missed on Upfrev.</td></tr><tr><td height="1" style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;background-color:#ccc"></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:15px 20px 15px 0"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td valign="top" style="padding-right:5px;font-size:0px"><img src="https://www.subsbook.com/images/BwlAapiRmdD.png" style="border:0"></td><td valign="top" style="width:100%"><a href="http://www.subsbook.com/reqs.php" style="color:#3b5998;text-decoration:none;font-size:13px" target="_blank">'.$m['freqs'].' friend request'.$ps.'</a></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px 0 15px 0"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:1px solid #ccc;border-bottom:1px solid #ccc"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-right:10px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#29447e #29447e #1a356e;background-color:#5b74a8"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #8a9cc2"><a href="http://www.subsbook.com/home.php" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#fff;font-size:13px">Go To Upfrev</span></a></td></tr></tbody></table></td></tr></tbody></table></td><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#999 #999 #888;background-color:#eee"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #fff"><a href="http://www.subsbook.com/notifications.php" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#333;font-size:13px">See All Notifications</span></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr>';

// whenever the notifications email settings is ready <tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:15px">You are only receiving important updates and summary emails instead of individual notification emails.  You can <a href="http://www.subsbook.com/n/?settings&amp;tab=notifications&amp;tip=frequency&amp;clk_loc=8&amp;mid=799b615G5af3e5bd55c5G0Gd4&amp;bcode=1.1362082023.Abkmlg5O4ek5WQ7s&amp;n_m='.$uti['email'].'" style="color:#3b5998;text-decoration:none" target="_blank">turn individual email notifications back on</a> at any time.</td></tr>

$p['m'].='</tbody></table></td></tr></tbody></table></td></tr></tbody></table>{footer}<span style="width:620px"><img style="border:0;width:1px;min-height:1px"></span></td></tr></tbody></table>';
$p['t']=$uti['email'];
$p['f']='Upfrev';
$p['e']='update+'.grs(15).'@upfrevmail.com';
sbmail($p);

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM sb_cron_emails WHERE id='$uidv' AND type='smart_notifications_recap'"));
$c=$c['c'];
if($c==0){
mysql_query("INSERT INTO sb_cron_emails (id,type,datetimep) VALUES('$uidv','smart_notifications_recap',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE sb_cron_emails SET datetimep=UNIX_TIMESTAMP() WHERE id='$uidv' AND
 type='smart_notifications_recap'");
}

}
?>