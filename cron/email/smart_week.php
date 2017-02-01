<?php
include("cron/settings.php");
include("functions/sbmail.php");
include("functions/sb_user.php");
include("functions/grs.php");
include("functions/tpl.php");

$seven_days=time()-(24*60*60*7);
$r=mysql_query("SELECT * FROM registered as r WHERE datetimepn<$seven_days AND (SELECT COUNT(*) as c FROM sb_cron_emails as e WHERE e.id=r.id AND type='smart_week_recap' AND datetimep<$seven_days)=0 AND ( (SELECT COUNT(*) as freqs FROM friends WHERE id2=r.id AND confirmed='n' AND datetimep>r.datetimepn )>0 OR (SELECT COUNT(*) AS tags FROM tags WHERE id3=r.id AND datetimep>r.datetimepn )>0 )
");

while($m=mysql_fetch_array($r)){
$o['msgs']=0;

$uidv=$m['id'];

$datetimepn=$m['datetimepn'];

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id2='$uidv' AND confirmed='n' AND datetimep>$datetimepn"));
$c=$c['c'];
$m['freqs']=$c;

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM tags WHERE id3='$uidv' AND datetimep>$datetimepn"));
$c=$c['c'];
$m['tags']=$c;

$p=array();
$uti=sb_user($m['id']);
$p['s']=$uti['f_name'].', you have ';

//tags
if($m['tags']>0){
$ps=tpl($m['tags']);
$p['s'].=$m['tags'].' photo tag'.$ps;
}

//messages
if($o['msgs']>0){
$ps=tpl($o['msgs']);

if($m['tags']>0 AND $m['freqs']>0){
$p['s'].=', ';	
}else if($m['tags']>0){
$p['s'].=' and ';	
}

$p['s'].=$o['msgs'].' message'.$ps;
}

//friend requests
if($m['freqs']>0){
$ps=tpl($m['freqs']);

if($m['tags']>0 OR $o['msgs']>0){
$p['s'].=' and ';
}
$p['s'].=$m['freqs'].' friend request'.$ps;	
	
}

$dpic=$uti['profilepic'];
$dpic=str_replace("a.","_s.",$dpic);
$p['m']='<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:98%" border="0"><tbody><tr><td style="font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="font-size:16px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;background:#3b5998;color:#ffffff;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px"><a style="text-decoration:none" href="http://www.subsbook.com/" target="_blank"><span style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;font-size:16px;letter-spacing:-0.03em;text-align:left;vertical-align:baseline">upfrev</span></a></td></tr></tbody></table><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px" border="0" width="620px"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" width="620px" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:20px;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td valign="top" style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-right:15px;text-align:left"><a href="http://www.subsbook.com/" style="color:#3b5998;text-decoration:none" target="_blank"><img src="http://www.subsbook.com/'.$uti['id'].'/pics/'.$dpic.'" style="border:0;max-width:70px;"></a></td><td valign="top" style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;width:100%;text-align:left"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-bottom:5px"><span style="color:#111111;font-size:14px;font-weight:bold">You have new notifications.</span></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:5px;padding-bottom:5px"><span style="color:#333333">A lot has happened on Upfrev since you last logged in. Here are some notifications you\'ve missed from your friends.</span></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:5px"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:10px 0px;background-color:#fff;border-left:none;border-right:none;border-top:1px solid #ccc;border-bottom:none"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:12px;padding:3px 10px 3px 0px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody>';


if($o['msgs']>0){
$ps=tpl($o['msgs']);
$p['m'].='<tr><td valign="top" style="padding-right:10px;font-size:0px"><a href="http://www.subsbook.com/" style="color:#3b5998;text-decoration:none" target="_blank"><img src="http://www.subsbook.com/images/I-6WhcLLGrb.gif" style="border:0"></a></td><td valign="top" style="width:100%"><a href="http://www.subsbook.com/" style="color:#3b5998;text-decoration:none" target="_blank"><b>'.$o['msgs'].'</b> message'.$ps.'</a></td></tr></tbody></table></td></tr>';
}

if($m['freqs']>0){
$ps=tpl($m['freqs']);
$p['m'].='<tr><td style="font-size:12px;padding:3px 10px 3px 0px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td valign="top" style="padding-right:10px;font-size:0px"><a href="http://www.subsbook.com/" style="color:#3b5998;text-decoration:none" target="_blank"><img src="http://www.subsbook.com/images/OpnXm-HZHKy.gif" style="border:0"></a></td><td valign="top" style="width:100%"><a href="http://www.subsbook.com/" style="color:#3b5998;text-decoration:none" target="_blank"><b>'.$m['freqs'].'</b> friend request'.$ps.'</a></td></tr></tbody></table></td></tr>';
}


if($m['tags']>0){
$ps=tpl($m['tags']);
$p['m'].='<tr><td style="font-size:12px;padding:3px 10px 3px 0px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td valign="top" style="padding-right:10px;font-size:0px"><a href="http://www.subsbook.com/" style="color:#3b5998;text-decoration:none" target="_blank"><img src="http://www.subsbook.com/images/StEh3RhPvjk.gif" style="border:0"></a></td><td valign="top" style="width:100%"><a href="http://www.subsbook.com/" style="color:#3b5998;text-decoration:none" target="_blank"><b>'.$m['tags'].'</b> photo tag'.$ps.'</a></td></tr>';	
}

$p['m'].='</tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%" border="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:7px 20px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:1px solid #ccc;border-bottom:1px solid #ccc"><table cellspacing="0" cellpadding="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-left:65px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#29447e #29447e #1a356e;background-color:#5b74a8"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #8a9cc2"><a href="http://www.subsbook.com/" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#fff;font-size:13px">View Notifications</span></a></td></tr></tbody></table></td></tr></tbody></table></td><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px 5px"></td><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:7px 0px 6px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#999 #999 #888;background-color:#eee"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #fff"><a href="http://www.subsbook.com/home.php" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#333;font-size:13px">Go to Upfrev</span></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>{footer}<span style="width:620px"><img style="border:0;width:1px;min-height:1px"></span></td></tr></tbody></table>';
$p['t']=$uti['email'];
$p['f']='Upfrev';
$p['e']='update+'.grs(15).'@upfrevmail.com';
sbmail($p);

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM sb_cron_emails WHERE id='$uidv' AND type='smart_week_recap'"));
$c=$c['c'];
if($c==0){
mysql_query("INSERT INTO sb_cron_emails (id,type,datetimep) VALUES('$uidv','smart_week_recap',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE sb_cron_emails SET datetimep=UNIX_TIMESTAMP() WHERE id='$uidv' AND
 type='smart_week_recap'");
}

}
?>